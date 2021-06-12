<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Customers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;
use App\Imports\CustomerExport;
use App\Models\CustomersVotes;
use Illuminate\Support\Facades\App;

class CustomerController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        if ($request->isMethod('post')) {
            $rows = Excel::toArray(new CustomerImport, $request->file('sampledata') );
            $value = url('');
            
            $dataReturn = [];
            $flag = 0;
            foreach ($rows[0] as $row) 
            {
                
                if ($flag == 0) {
                    $row[] = 'link';
                } else {
                    $hashUrlId = hash('ripemd160', $row[0] . $row[2] . now());
                    $newData = new Customers();
                    $newData->bycode = $hashUrlId;
                    $newData->ctrl = $row[0];
                    $newData->shares = $row[1];
                    $newData->email = $row[2];
                    $newData->first = $row[3];
                    $newData->last = $row[4];
                    $newData->street = $row[5];
                    $newData->city = $row[6];
                    $newData->state = $row[7];
                    $newData->zip = $row[8];
                    $newData->link = $value. '/votes/' . $hashUrlId;
                    $newData->save();
                    $row[] = $value. '/votes/' . $hashUrlId;
                }
                $dataReturn[] = $row;
                $flag ++;
            }

            $export = new CustomerExport($dataReturn);
            return Excel::download($export, 'customer.xlsx');

            
        }
        return view(
            'admin.customer.list',
            compact([])
        );

    }


    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Customers::orderBy("id" , "DESC");
        if(@$request->name != '' ){
            $data = $data->where('email', 'like', '%'.$request->name.'%');
        }
        $count = $data->count();
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        $count = $count === 0 ? 1 : $count;
        $pageTotal = ceil($count/$this->limit);
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }
    function getListAll(Request $request) {
        $data = Customers::orderBy("id" , "DESC");
        $data = $data->all();
        return response()->json(['data'=>$data]);
    }

    function edit(Request $request,$id) {
        $message = [
            "message" => "",
            "status" => 0
        ];
        if ($request->isMethod('post')) {
            try {

                $newData = Customers::find($request->id);
                $newData->bycode = $request->bycode;
                $newData->ctrl = $request->ctrl;
                $newData->shares = $request->shares;
                $newData->email = $request->email;
                $newData->first = $request->first;
                $newData->last = $request->last;
                $newData->street = $request->street;
                $newData->city = $request->city;
                $newData->state = $request->state;
                $newData->zip = $request->zip;
                $newData->link = $request->link;
                $newData->save();

                $message = [
                    "message" => "Update Successfuly.",
                    "status" => 1
                ];
            } catch (Exception $e) {
//                 echo 'Message: ' .$e->getMessage();
// die;
                $message = [
                    "message" => "An error occurred while changing to the data.",
                    "status" => 2
                ];
            }
            
        }
        $data = Customers::find($request->id);
        $id = $request->id;
        return view(
            'admin.customer.edit',
            compact(['message' , 'data' , 'id'])
        );
    }

    function add(Request $request) {
        $message = [
            "message" => "",
            "status" => 0
        ];
        if ($request->isMethod('post')) {
            try {
                $data = new MailTemplate();
                $data->name = $request->name;
                $data->from_mail = $request->from_mail;
                $data->to_mail = $request->to_mail;
                $data->cc_mail = $request->cc_mail;
                $data->subject = $request->subject;
                $data->body = $request->body;
                $data->note = $request->note;
                $data->save();
                $message = [
                    "message" => "Đã thêm dữ liệu thành công.",
                    "status" => 1
                ];
            } catch (\Throwable $th) {
                $message = [
                    "message" => "Có lỗi xảy ra khi thêm vào dữ liệu.",
                    "status" => 2
                ];
            }
            
        }

        return view(
            'admin.customer.add',
            compact(['message'])
        );

    }

    function delete(Request $request,$id) {

        CustomersVotes::where('customers_id', $id)->delete();
        $data = Customers::find($id);
        $data->delete();

        return response()->json(['message'=>"Delete Customer Successfuly."]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Customers;
use App\Models\Votes;
use App\Models\CustomersVotes;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;
use App\Imports\CustomerExport;
use Illuminate\Support\Facades\App;
use DB;

class ListVoteController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
       
        return view(
            'admin.vote.list',
            compact([])
        );

    }


    function getList(Request $request) {
        $page = $request->page - 1;
        $data =  DB::table('customers_votes')
        ->leftJoin('customers', 'customers.id', '=', 'customers_votes.customers_id')
        ->select('customers.*', DB::raw('count(*) as total'))
        ->groupBy('customers.id');
        if(@$request->name != '' ){
            $data = $data->where('email', 'like', '%'.$request->name.'%');
        }
        $count = $data->count();
        $data = $data->groupBy('customers.id')->offset($page * $this->limit)->limit($this->limit)->get();
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
        
        $data = Customers::find($request->id);
        $allListVotes = Votes::all();
        foreach ($allListVotes as &$item) {
            $valVote = CustomersVotes::where('customers_id',$id)->where('votes_id',$item->id)->first();
            if ($valVote) {
                $item->type = $valVote->type;
            } else {
                $item->type = 0;
            }
            
        }
        unset($item);

        $id = $request->id;
        return view(
            'admin.vote.edit',
            compact(['message' , 'data' , 'id' , 'allListVotes'])
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
        $data = Customers::find($id);
        $data->delete();
        return response()->json(['message'=>"Delete Customer Successfuly."]);
    }

}

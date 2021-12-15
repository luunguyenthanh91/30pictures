<?php

namespace App\Http\Controllers\Admin;
use Mail;
use App\User;
use App\Models\Derector;
use App\Models\Story;
use App\Models\Blog;


use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\MailTemplate;
use NumberFormatter;

class BlogController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        return view(
            'admin.blog.list',
            compact([])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Blog::orderBy("id" , "DESC");
        if(@$request->name != '' ){
            $data = $data->where('title', 'like', '%'.$request->name.'%')->orWhere('title', 'like', '%'.$request->description.'%');
        }
        
        $count = $data->count();
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        $count = $count === 0 ? 1 : $count;
        $pageTotal = ceil($count/$this->limit);
        
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }
    function getListAll(Request $request) {
        $data = Blog::orderBy("id" , "DESC");
        $data = $data->all();
        return response()->json(['data'=>$data]);
    }

    function edit(Request $request,$id) {
        $message = [
            "message" => "",
            "status" => 0
        ];
        if ($request->isMethod('post')) {
            if ($request->isMethod('post')) {
                try {
                    $data = Blog::find($id);
                    $data->image_pc = $request->image_pc;
                    $data->image_mobile = $request->image_mobile;
                    $data->title = $request->title;
                    $data->shor_title = $request->shor_title;
                    $data->description = $request->description;
                    $data->category = $request->category;
                    if ($request->status) {
                        $data->status = $request->status;
                    } else {
                        $data->status = 0;
                    }
                    $data->date_start = $request->date_start;
                    $data->save();
                    
                    $message = [
                        "message" => "Đã thêm dữ liệu thành công.",
                        "status" => 1
                    ];
                } catch (Exception $e) {
                    $message = [
                        "message" => "Có lỗi xảy ra khi thêm vào dữ liệu.",
                        "status" => 2
                    ];
                }
                
            }
            
        }
        $data = Blog::find($request->id);
        return view(
            'admin.blog.edit',
            compact(['id' , 'data', 'message' ])
        );
    }

    function add(Request $request) {
        $message = [
            "message" => "",
            "status" => 0
        ];
        if ($request->isMethod('post')) {
            try {
                $data = new Blog();
                $data->image_pc = $request->image_pc;
                $data->image_mobile = $request->image_mobile;
                $data->title = $request->title;
                $data->shor_title = $request->shor_title;
                $data->description = $request->description;
                $data->category = $request->category;
                $data->slug = \App\Helpers\Helper::convertSlug($request->title);
                if ($request->status) {
                    $data->status = $request->status;
                } else {
                    $data->status = 0;
                }
                $data->date_start = $request->date_start;
                $data->save();

                $message = [
                    "message" => "Đã thêm dữ liệu thành công.",
                    "status" => 1
                ];
                return redirect('/admin/blog/edit/'.$data->id)->with('message','Đã thêm dữ liệu thành công.');
            } catch (Exception $e) {
                $message = [
                    "message" => "Có lỗi xảy ra khi thêm vào dữ liệu.",
                    "status" => 2
                ];
            }
            
        }

       
        return view(
            'admin.blog.add',
            compact(['message'])
        );

    }

    function delete(Request $request,$id) {
        $data = Blog::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Blog Thành Công."]);
    }

}

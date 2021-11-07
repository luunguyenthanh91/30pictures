<?php

namespace App\Http\Controllers\Admin;
use Mail;
use App\User;
use App\Models\Derector;
use App\Models\Story;


use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\MailTemplate;
use NumberFormatter;

class StorysController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        return view(
            'admin.storys.list',
            compact([])
        );

    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Story::orderBy("id" , "DESC");
        if(@$request->name != '' ){
            $data = $data->where('description', 'like', '%'.$request->name.'%');
        }
        
        $count = $data->count();
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();
        $count = $count === 0 ? 1 : $count;
        $pageTotal = ceil($count/$this->limit);
        
        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }
    function getListAll(Request $request) {
        $data = Story::orderBy("id" , "DESC");
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
                    $data = Story::find($id);
                    $data->name = $request->name;
                    $data->description = $request->description;
                    $data->slug = \App\Helpers\Helper::convertSlug($request->description);
                    $data->image_pc = $request->image_pc;
                    if ($request->active_video) {
                        $data->active_video = $request->active_video;
                    } else {
                        $data->active_video = 0;
                    }
                    // $data->slide_gif_pc = $request->slide_gif_pc;
                    // $data->slide_gif_mobile = $request->slide_gif_mobile;
                    $data->image_mobile = $request->image_mobile;
                    $data->khachhang = $request->khachhang;
                    $data->save();
                    if ($request->hasFile('file_gif')) {

                        $path = $request->file('file_gif')->store('public/files');
                        $data->slide_gif_pc = url('/').Storage::url($path);
                        $data->save();
                    }
                    if ($request->hasFile('file_gif_mobile')) {

                        $path = $request->file('file_gif_mobile')->store('public/files');
                        $data->slide_gif_mobile = url('/').Storage::url($path);
                        $data->save();
                    }
                    if ($request->filesData) {
                        foreach ($request->filesData as $item) {
                            if ($item['id'] != 'new') {
                                if ($item['type'] != 'delete' && $item['name'] != '') {
                                    $dataUpdate = Derector::find($item['id']);
                                    $dataUpdate->name = $item['name'];
                                    $dataUpdate->meme = $item['meme'];
                                    $dataUpdate->sor = $item['sor'];
                                    $dataUpdate->slug = \App\Helpers\Helper::convertSlug($item['name']);
                                    $dataUpdate->description = $item['description'];
                                    $dataUpdate->video = $item['video'];
                                    $dataUpdate->image_pc = $item['image_pc'];
                                    $dataUpdate->image_mobile = $item['image_mobile'];
                                    $dataUpdate->type_display = @$item['type_display'] ? $item['type_display'] : 0;
                                    $dataUpdate->link_video = $item['link_video'];
                                    $dataUpdate->link_youtube = $item['link_youtube'];
                                    $dataUpdate->save();
                                } else {
                                    Derector::where('id', $item['id'])->delete();
                                }
                            } else {
                                if ($item['type'] != 'delete' && $item['name'] != '') {
                                    $dataUpdate = new Derector();
                                    $dataUpdate->name = $item['name'];
                                    $dataUpdate->meme = $item['meme'];
                                    $dataUpdate->sor = $item['sor'];
                                    $dataUpdate->slug = \App\Helpers\Helper::convertSlug($item['name']);
                                    $dataUpdate->description = $item['description'];
                                    $dataUpdate->video = $item['video'];
                                    $dataUpdate->image_pc = $item['image_pc'];
                                    $dataUpdate->image_mobile = $item['image_mobile'];
                                    $dataUpdate->story_id = $data->id;
                                    $dataUpdate->type_display = @$item['type_display'] ? $item['type_display'] : 0;
                                    $dataUpdate->link_video = $item['link_video'];
                                    $dataUpdate->link_youtube = $item['link_youtube'];
                                    $dataUpdate->save();
                                }
                            }
                        }
                    } else {
                        // Derector::where('story_id',$id)->delete();
                    }
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
        $data = Story::find($request->id);
        $dataList = Derector::where('story_id',$id)->orderBy('sor')->get();
        $newArr = [];
        $newArr = array_pad($newArr, 20, null);
        return view(
            'admin.storys.edit',
            compact(['id' , 'data' , 'dataList' , 'newArr'])
        );
    }

    function add(Request $request) {
        $message = [
            "message" => "",
            "status" => 0
        ];
        if ($request->isMethod('post')) {
            try {
                $data = new Story();
                $data->name = $request->name;
                $data->description = $request->description;
                $data->slug = \App\Helpers\Helper::convertSlug($request->description);
                $data->image_pc = $request->image_pc;
                if ($request->active_video) {
                    $data->active_video = $request->active_video;
                } else {
                    $data->active_video = 0;
                }
                // $data->slide_gif_pc = $request->slide_gif_pc;
                // $data->slide_gif_mobile = $request->slide_gif_mobile;
                $data->image_mobile = $request->image_mobile;
                $data->khachhang = $request->khachhang;
                $data->save();

                if ($request->hasFile('file_gif')) {

                    $path = $request->file('file_gif')->store('public/files');
                    $data->slide_gif_pc = url('/').Storage::url($path);
                    $data->save();
                }
                if ($request->hasFile('file_gif_mobile')) {

                    $path = $request->file('file_gif_mobile')->store('public/files');
                    $data->slide_gif_mobile = url('/').Storage::url($path);
                    $data->save();
                }

                if ($request->filesData) {
                    foreach ($request->filesData as $item) {
                        if ($item['id'] != 'new') {
                            if ($item['type'] != 'delete' && $item['name'] != '') {
                                $dataUpdate = Derector::find($item['id']);
                                $dataUpdate->name = $item['name'];
                                $dataUpdate->slug = \App\Helpers\Helper::convertSlug($item['name']);
                                $dataUpdate->meme = $item['meme'];
                                $dataUpdate->sor = $item['sor'];
                                $dataUpdate->description = $item['description'];
                                $dataUpdate->video = $item['video'];
                                $dataUpdate->image_pc = $item['image_pc'];
                                $dataUpdate->image_mobile = $item['image_mobile'];
                                $dataUpdate->type_display = @$item['type_display'] ? $item['type_display'] : 0;
                                $dataUpdate->link_video = $item['link_video'];
                                $dataUpdate->link_youtube = $item['link_youtube'];
                                $dataUpdate->save();
                            } else {
                                Derector::where('id', $item['id'])->delete();
                            }
                        } else {
                            if ($item['type'] != 'delete' && $item['name'] != '') {
                                $dataUpdate = new Derector();
                                $dataUpdate->name = $item['name'];
                                $dataUpdate->meme = $item['meme'];
                                $dataUpdate->sor = $item['sor'];
                                $dataUpdate->slug = \App\Helpers\Helper::convertSlug($item['name']);
                                $dataUpdate->description = $item['description'];
                                $dataUpdate->video = $item['video'];
                                $dataUpdate->image_pc = $item['image_pc'];
                                $dataUpdate->image_mobile = $item['image_mobile'];
                                $dataUpdate->story_id = $data->id;
                                $dataUpdate->type_display = @$item['type_display'] ? $item['type_display'] : 0;
                                $dataUpdate->link_video = $item['link_video'];
                                $dataUpdate->link_youtube = $item['link_youtube'];
                                $dataUpdate->save();
                            }
                        }
                    }
                } else {
                    // Derector::where('story_id',$id)->delete();
                }
                $message = [
                    "message" => "Đã thêm dữ liệu thành công.",
                    "status" => 1
                ];
                return redirect('/admin/storys/edit/'.$data->id)->with('message','Đã thêm dữ liệu thành công.');
            } catch (Exception $e) {
                $message = [
                    "message" => "Có lỗi xảy ra khi thêm vào dữ liệu.",
                    "status" => 2
                ];
            }
            
        }

       $newArr = [];
       $newArr = array_pad($newArr, 20, null);
        return view(
            'admin.storys.add',
            compact(['message' ,'newArr'])
        );

    }

    function delete(Request $request,$id) {
        Derector::where('story_id' , $id)->delete();
        $data = Story::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Story Thành Công."]);
    }

}

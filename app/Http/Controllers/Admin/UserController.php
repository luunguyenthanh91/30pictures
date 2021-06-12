<?php

namespace App\Http\Controllers\Admin;
use App\Models\Provinces;
use App\Models\Admin;
use App\Models\Roles;
use App\Models\RolePermissions;
use App\Models\GroupPermissions;
use App\Models\Permissions;
use App\Models\UserPermissions;
use App\Models\UserRoles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'users';
        $menu_parent_active = 'users-group';
        return view(
            'admin.users.list',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );
    }

    function getList(Request $request) {
        $page = $request->page - 1;
        $users = Admin::orderBy("name" , "ASC");
        if(@$request->name != '' ){
            $users = $users->where('name', 'like', '%'.$request->name.'%');
        }
        if(@$request->email != '' ){
            $users = $users->Where('email', 'like', '%'.$request->email.'%');
        }
        
        $count = $users->count();
        $pageTotal = ceil($count/$this->limit);
        $users = $users->with('roles')->offset($page * $this->limit)->limit($this->limit)->get();
        return response()->json(['data'=>$users,'count'=>$count,'pageTotal' => $pageTotal]);
    }
    function convertCode($number){
        if($number < 10) {
            return '000'.$number;
        } else if($number < 100 && $number >= 10) {
            return '00'.$number;
        } else if($number < 1000 && $number >= 100) {
            return '0'.$number;
        } else {
            return $number;
        }
    }

    function add(Request $request) {
        $message = [
            "message" => "",
            "status" => 0
        ];
        if ($request->isMethod('post')) {
            $user = $request->all();

            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|unique:users',
                    'phone' => 'required|unique:users',
                    'password' => 'required|alpha_dash',
                    'referrer_id' => 'nullable|exists:users,id',
    
                ],
                [
                    'email.required' => 'Vui lòng nhập lại email!',
                    'email.unique' => 'Email này đã tồn tại!',
                    'phone.required' => 'Vui lòng nhập lại số điện thoại !',
                    'phone.unique' => 'Số điện thoại này đã tồn tại!',
                    'password.required' => 'Vui lòng nhập lại mật khẩu !',
                    'referrer_id.exists' => 'Mã Giới Thiệu Không Tồn Tại !',
                ]
            );
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput($request->input());
            }
            
            $user = new Admin();
            if ($request->birthday != '') {
                $request->birthday = \DateTime::createFromFormat('d/m/Y', $request->birthday);
                $user->birthday =  $request->birthday->format('Y-m-d');
            }
            $user->user_code = 'QTV';
            $user->referrer_id = $request->referrer_id;
            $user->password = Hash::make($request->password);
            $user->address = $request->address;
            // $user->role_id = $request->role_id;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->ward_id = $request->ward_id;
            $user->district_id = $request->district_id;
            $user->province_id = $request->province_id;
            $user->avatar = $request->avatar;
            $user->notification = $request->notification;
            $user->app_version = 1;
            $user->updated_at = date("Y-m-d");
            $user->created_at = date("Y-m-d");
            $user->save();
            $user->user_code = $user->user_code.$this->convertCode($user->id);
            $user->save();

            if($request->role){
                foreach ($request->role as $key => $value) {
                    $UR = new UserRoles();
                    $UR->user_id = $user->id;
                    $UR->role_id = $key;
                    $UR->save();

                    $thisGroup = RolePermissions::where('role_id', $key)->get();
                    foreach ($thisGroup as $key => $value) {
                        $checkRole = UserPermissions::where('permission_id',$value->permission_id)->where('user_id',$user->id)->first();
                        if(!$checkRole) {
                            $userPM = new UserPermissions();
                            $userPM->user_id = $user->id;
                            $userPM->permission_id = $value->permission_id;
                            $userPM->save();
                        }
                    }
                }
            }

            
            return redirect('/admin/user/edit/'.$user->id)->with('message-add','Thêm Thành Viên Thành Công!');
        }
        $listProvinces = Provinces::all();
        $listRoles = Roles::all();
        
        $menu_active = 'users';
        return view(
            'admin.users.add',
            compact([
                'menu_active',
                'listProvinces',
                'message',
                'listRoles'
            ])
        );

    }

    function edit(Request $request,$id) {
        $message = [
            "message" => "",
            "status" => 0
        ];
        if ($request->isMethod('post')) {
            
            $user = Admin::find($id);
            if ($request->birthday != '') {
                $request->birthday = \DateTime::createFromFormat('d/m/Y', $request->birthday);
                $user->birthday =  $request->birthday->format('Y-m-d');
            }
            if($request->password != ''){
                $user->password = Hash::make($request->password);
            }

            $user->address = $request->address;
            // $user->role_id = $request->role_id;
            $user->name = $request->name;
            $user->ward_id = $request->ward_id;
            $user->district_id = $request->district_id;
            $user->province_id = $request->province_id;
            $user->avatar = $request->avatar;
            $user->is_active = $request->is_active;
            $user->notification = $request->notification;
            $user->updated_at = date("Y-m-d");
            $user->save();
            if($request->role){
                UserRoles::where('user_id',$user->id)->delete();
                foreach ($request->role as $key => $value) {
                    $UR = new UserRoles();
                    $UR->user_id = $user->id;
                    $UR->role_id = $key;
                    $UR->save();
                }
            } else {
                UserRoles::where('user_id',$user->id)->delete();
            }

            $message = [
                "message" => "Thay Đổi Thông Tin Thành Công",
                "status" => 1
            ];
        }
        $listProvinces = Provinces::all();
        $listRoles = Roles::all();

        $listUR = UserRoles::where("user_id",$id)->get();
        $arrSp = [];
        foreach($listUR as $item){
            $arrSp[] = $item->role_id;
        }
        foreach($listRoles as &$item){
            if (in_array($item->id, $arrSp)) {
                $item->checked = 1;
            } else {
                $item->checked = 0;
            }
        }
        unset($item);
        $user = Admin::find($id);
        if ( $user->birthday != '') {
            $user->birthday = date("d/m/Y", strtotime($user->birthday) );
        }
        $menu_active = 'users';
        return view(
            'admin.users.edit',
            compact([
                'menu_active',
                'listProvinces',
                'message',
                'listRoles',
                'user'
            ])
        );
    }

    function checkListPermission(Request $request, $id) {
        
        $data = GroupPermissions::all();

        $thisGroup = UserPermissions::where('user_id', $id)->get();
        
        $arrGroup = [];
        foreach($thisGroup as $item){
            $arrGroup[] = $item->permission_id;
        }
        foreach($data as &$item){
            $item->childrent = Permissions::where('group_permission_id', $item->id)->get();
            $item->edit = 0;
            foreach($item->childrent as &$child) {
                if (in_array($child->id, $arrGroup)) {
                    $item->edit = 1;
                    $child->checked = 1;
                } else {
                    $child->checked = 0;
                }
            }
            unset($child);
        }
        unset($item);
        
        return response()->json(['data'=>$data]);
    }
    function addListPermission(Request $request, $id) {
        
        $data = $request->data;

        UserPermissions::where('user_id', $id)->delete();
        foreach($data as $item){
            if(@$item['childrent']) {
                foreach($item['childrent'] as $child) {
                    if (@$child['checked'] == 1) {
                        $newPer = new UserPermissions();
                        $newPer->user_id = $id;
                        $newPer->permission_id = $child['id'];
                        $newPer->save();
                    }
                }
            }
            
        }
        
        return response()->json(['message'=> "success update permission"]);
    }



    function delete(Request $request,$id) {
        $users = Admin::find($id);
        $users->delete();
        return response()->json(['message'=>"Xóa Thành Viên Thành Công."]);
    }

    function active(Request $request,$id) {
        $users = Admin::find($id);
        $users->is_active = 1 ;
        $users->save();
        return response()->json(['message'=>"Active Thành Viên Thành Công."]);
    }

    function deactive(Request $request,$id) {
        $users = Admin::find($id);
        $users->is_active = 0 ;
        $users->save();
        return response()->json(['message'=>"Deactive Thành Viên Thành Công."]);
    }

}

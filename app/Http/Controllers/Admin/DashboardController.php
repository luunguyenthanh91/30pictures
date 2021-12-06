<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;
use App\Models\VideoHome;
use Illuminate\Support\Facades\Storage;
use App\Models\Story;
use File;
use App\Models\Derector;

class DashboardController extends Controller
{
    private $limit = 20;
    function clearFileStorege(Request $request)
    {
        $files = Storage::disk('public')->allFiles('files');
        foreach ($files as $key => $file) {
            $data = Story::where("slide_gif_pc", "like", "%" . $file . "%")->orWhere("slide_gif_mobile", "like", "%" . $file . "%")->first();
            if (!$data) {
                Storage::delete('public/' . $file);
            }
        }
        print_r($files);
        die;
    }
    function clearFileIntro(Request $request)
    {
        $path = public_path('media/userfiles');
        $filesInFolder = File::allFiles($path);


        foreach ($filesInFolder as $key => $path) {
            $files = pathinfo($path);
            $allMedia[] = $files['basename'];
            $file = $files['basename'];
            $data = Setting::where("description", "like", "%" . $file . "%")->orWhere("file", "like", "%" . $file . "%")->orWhere("image_mobile", "like", "%" . $file . "%")->orWhere("image_pc", "like", "%" . $file . "%")->first();
            if (!$data) {
                $data = VideoHome::where("image", "like", "%" . $file . "%")->orWhere("video", "like", "%" . $file . "%")->orWhere("video_mobile", "like", "%" . $file . "%")->first();
                if (!$data) {
                    $data = Story::where("video", "like", "%" . $file . "%")->orWhere("description", "like", "%" . $file . "%")->orWhere("image_pc", "like", "%" . $file . "%")->orWhere("image_mobile", "like", "%" . $file . "%")->orWhere("background", "like", "%" . $file . "%")->first();
                    if (!$data) {
                        $data = Derector::where("video", "like", "%" . $file . "%")->orWhere("background", "like", "%" . $file . "%")->orWhere("description", "like", "%" . $file . "%")->orWhere("image_pc", "like", "%" . $file . "%")->orWhere("image_mobile", "like", "%" . $file . "%")->first();
                        if (!$data) {
                            File::delete($path);
                        }
                    }
                }
            }
        }
        print_r($allMedia);
        die;
    }
    function index(Request $request)
    {
        $menu_active = 'dashboard';
        $message = [];
        $introFile = Setting::find(6);
        $titleAllPage = Setting::find(1);
        $description = Setting::find(2);
        $logoRed = Setting::find(3);
        $logowhite = Setting::find(5);
        $imageSeo = Setting::find(4);


        $bgHome = Setting::find(17);
        $bgStory = Setting::find(18);
        $bgDirectory = Setting::find(19);
        $scriptFooter = Setting::find(20);

        if ($request->isMethod('post')) {
            $bgHome->description = $request->descriptionbgHome;
            $bgHome->save();

            $bgStory->description = $request->descriptionbgStory;
            $bgStory->save();

            $bgDirectory->description = $request->descriptionbgDirectory;
            $bgDirectory->save();


            $introFile->file = $request->file;
            $introFile->save();

            $titleAllPage->description = $request->descriptionTitle;
            $titleAllPage->save();

            $description->description = $request->descriptionPage;
            $description->save();

            $logoRed->image_pc = $request->imageLgR;
            $logoRed->save();

            $logowhite->image_pc = $request->imageLgW;
            $logowhite->save();

            $imageSeo->image_pc = $request->imageSeo;
            $imageSeo->save();

            $scriptFooter->description = $request->scriptFooter;
            $scriptFooter->save();



            $message['message'] = 'Thay đổi dữ liệu thành công.';
            $message['status'] = 1;
        }


        return view(
            'admin.home.index',
            compact([
                'menu_active',
                'message',
                'introFile',
                'imageSeo',
                'logowhite',
                'logoRed',
                'description',
                'titleAllPage',
                'bgHome',
                'bgStory',
                'bgDirectory',
                'scriptFooter',
            ])
        );
    }
    function homePage(Request $request)
    {
        $menu_active = 'home';
        $message = [];
        $homeConfig = Setting::find(7);

        if ($request->isMethod('post')) {
            $homeConfig->file = $request->file;
            $homeConfig->type = $request->type;
            $homeConfig->description = $request->description;
            $homeConfig->save();

            if ($request->filesHome) {
                foreach ($request->filesHome as $key => $item) {
                    if ($item['id'] != 'new') {
                        if ($item['type'] != 'delete') {
                            $dataUpdate = VideoHome::find($item['id']);
                            $dataUpdate->name = $item['name'];
                            $dataUpdate->sor = $item['sor'];
                            $dataUpdate->alt_seo = $item['alt_seo'];
                            $dataUpdate->link = $item['link'];
                            $dataUpdate->start_date = $item['start_date'];
                            $dataUpdate->name_contact = $item['name_contact'];
                            if ($request->hasFile('file_gif.' . $key)) {
                                $path = $request->file('file_gif.' . $key)->store('public/files');
                                $dataUpdate->image = url('/') . Storage::url($path);
                            }
                            if ($request->hasFile('file_gif_mb.' . $key)) {
                                $path = $request->file('file_gif_mb.' . $key)->store('public/files');
                                $dataUpdate->video_mobile = url('/') . Storage::url($path);
                            }
                            $dataUpdate->save();
                        } else {
                            VideoHome::where('id', $item['id'])->delete();
                        }
                    } else {
                        if ($item['type'] != 'delete') {
                            $dataUpdate = new VideoHome();
                            $dataUpdate->name = $item['name'];
                            $dataUpdate->link = $item['link'];
                            $dataUpdate->start_date = $item['start_date'];
                            $dataUpdate->alt_seo = $item['alt_seo'];
                            $dataUpdate->sor = $item['sor'];
                            $dataUpdate->name_contact = $item['name_contact'];
                            if ($request->hasFile('file_gif.' . $key)) {
                                $path = $request->file('file_gif.' . $key)->store('public/files');
                                $dataUpdate->image = url('/') . Storage::url($path);
                            }
                            if ($request->hasFile('file_gif_mb.' . $key)) {
                                $path = $request->file('file_gif_mb.' . $key)->store('public/files');
                                $dataUpdate->video_mobile = url('/') . Storage::url($path);
                            }
                            $dataUpdate->save();
                        }
                    }
                }
            } else {
                VideoHome::getQuery()->delete();
            }
            $message['message'] = 'Thay đổi dữ liệu thành công.';
            $message['status'] = 1;
        }

        $listVideoMobile = VideoHome::orderBy('sor')->get();
        return view(
            'admin.home.home',
            compact([
                'menu_active',
                'message',
                'homeConfig',
                'listVideoMobile'
            ])
        );
    }


    function aboutPage(Request $request)
    {
        $menu_active = 'home';
        $message = [];
        $aboutConfig = Setting::find(9);

        if ($request->isMethod('post')) {
            $aboutConfig->image_pc = $request->image_pc;
            $aboutConfig->image_mobile = $request->image_mobile;
            $aboutConfig->description = $request->description;
            $aboutConfig->save();


            $message['message'] = 'Thay đổi dữ liệu thành công.';
            $message['status'] = 1;
        }

        return view(
            'admin.home.about',
            compact([
                'menu_active',
                'message',
                'aboutConfig'
            ])
        );
    }

    function contactPage(Request $request)
    {
        $menu_active = 'home';
        $message = [];

        $pictures = Setting::find(10);
        $address = Setting::find(11);
        $phone = Setting::find(12);
        $email = Setting::find(13);
        $facebook = Setting::find(14);
        $vimeo = Setting::find(15);
        $youtube = Setting::find(16);

        $linkAddress = Setting::find(21);
        if ($request->isMethod('post')) {
            $pictures->description = $request->pictures;
            $pictures->save();
            $address->description = $request->address;
            $address->save();
            $phone->description = $request->phone;
            $phone->save();
            $email->description = $request->email;
            $email->save();
            $facebook->description = $request->facebook;
            $facebook->save();
            $vimeo->description = $request->vimeo;
            $vimeo->save();
            $youtube->description = $request->youtube;
            $youtube->save();

            $linkAddress->description = $request->linkAddress;
            $linkAddress->save();


            $message['message'] = 'Thay đổi dữ liệu thành công.';
            $message['status'] = 1;
        }

        return view(
            'admin.home.contact',
            compact([
                'menu_active',
                'message',
                'pictures',
                'address',
                'phone',
                'email',
                'facebook',
                'vimeo',
                'youtube',
                'linkAddress'

            ])
        );
    }
}

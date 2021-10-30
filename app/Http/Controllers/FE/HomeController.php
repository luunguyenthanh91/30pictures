<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Customers;
use App\Models\Votes;
use App\Models\CustomersVotes;
use App\Models\Products;
use App\Models\Posts;
use App\Models\Setting;

use App\Models\VideoHome;
use App\Models\Story;
use App\Models\Derector;

use App\Jobs\SendEmail;
use Session;
use DateTime;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;

class HomeController extends Controller
{

    function index(Request $request){
        $menu_active = 'home';
        $menu_parent_active = 'home';
        $slug = '';
        if ( @Session::get('slug') ) {
            $slug = @Session::get('slug');
        }
        return view(
            'fe.home.index',
            compact([
                'menu_active',
                'menu_parent_active',
                'slug'
            ])
        );
    }
    function home(Request $request){
        $menu_active = 'home';
        $menu_parent_active = 'home';
        $slug = '';
        
        if ( @Session::get('slug') ) {
            $slug = @Session::get('slug');
        }
        // $listVideos = VideoHome::all();
        $listStoryLimit = Story::whereNotNull('slide_gif_pc')->limit(8)->get();
        return view(
            'fe.home.home',
            compact([
                'menu_active',
                'menu_parent_active',
                'listStoryLimit',
                'slug'
            ])
        );
    }
    function story(Request $request){
        $slug = '';
        $listStory = Story::all();
        $bgStory = Setting::find(18);
        // if (count($listStory)%2 != 0 && count($listStory) > 0) {
        //     $listStory[] = $listStory[0];
        // }
        return view(
            'fe.home.story',
            compact([
                'slug',
                'bgStory',
                'listStory'
            ])
        );
    }
    function search(Request $request){
        $slug = '';
        $idWhere = 0;
        $bgDirectory = Setting::find(19);
        $storyBig = Derector::where('name', 'like' ,'%'. $request->key . '%')->with('story')->first();
        if ($storyBig) {
            $idWhere = $storyBig->id;
            $max_length = 340;
            $storyBig->description = strip_tags($storyBig->description);
            if (strlen($storyBig->description) > $max_length)
            {
                $offset = ($max_length - 3) - strlen($storyBig->description);
                $storyBig->description = substr($storyBig->description, 0, strrpos($storyBig->description, ' ', $offset)) . '...';
            }
            
        }
        $listStory = Derector::where('name', 'like' ,'%'. $request->key . '%')->where('id','!=' ,$idWhere)->with('story')->get();
        // if (count($listStory)%2 != 0 && count($listStory) > 0) {
        //     $listStory[] = $listStory[0];
        // }
        $listStoryS = Story::all();
        return view(
            'fe.home.search',
            compact([
                'slug',
                'listStory',
                'bgDirectory',
                'storyBig',
                'listStoryS'
            ])
        );
    }
    function director(Request $request , $id){
        $slug = '';
        $bgDirectory = Setting::find(19);
        
        $listStory = Derector::where('story_id', $id)->get();
        // if (count($listStory)%2 != 0 && count($listStory) > 0) {
        //     $listStory[] = $listStory[0];
        // }
        $story = Story::find($id);
        $listStoryS = Story::all();
        return view(
            'fe.home.director',
            compact([
                'slug',
                'listStory',
                'bgDirectory',
                'story',
                'listStoryS'
            ])
        );
    }

    function directorDetail(Request $request , $id){
        $slug = '';
        $listStory = Derector::find($id);
        $story = Story::find($listStory->story_id);
        $listStoryS = Story::all();
        return view(
            'fe.home.director-detail',
            compact([
                'slug',
                'listStory',
                'story',
                'listStoryS'
            ])
        );
    }
    function about(Request $request ){
        $slug = '';

        $listStory = Story::all();
        return view(
            'fe.home.about',
            compact([
                'slug',
                'listStory'
            ])
        );
    }

    function contact(Request $request ){
        $slug = '';
        $message = '';
        if ($request->isMethod('post')) {
            $message = 'Email has been sent to the administrator. Please check your email response. Thanks.';
            $admin = Helper::getSetting(13)->description;
            $body = [
                'type' => 'Send Mail',
                'task' => 'test',
                'name' => @$request->name ? $request->name : '',
                'email' => @$request->email ? $request->email : '',
                'phone' => @$request->phone ? $request->phone : '',
                'address' => @$request->address ? $request->address : '',
                'content' => @$request->content ? $request->content : '',
                'to_email' => $admin

            ];
            SendEmail::dispatch($body)->delay(now()->addMinute(1));
        }
        $listStory = Story::all();
        return view(
            'fe.home.contact',
            compact([
                'slug',
                'message',
                'listStory'
            ])
        );
    }


    function votes(Request $request , $slug){
        $menu_active = 'home';
        $menu_parent_active = 'home';
        $checkCustomer = Customers::where('bycode',$slug)->first();
        

        if (!$checkCustomer) {
            return redirect('/contact.html')->with('errors', 'Account does not exist. Please contact the administrator.');
        }else {
            return redirect('/')->with('slug', $slug);
        }

        return view(
            'fe.home.votes',
            compact([
                'menu_active',
                'menu_parent_active',
                'slug'
            ])
        );
    }

    function convertCondition( $str ) {
        if($str == 0){
            return "Tuần Này";
        } else if($str == 1){
            return "Tuần Trước";
        } else if($str == 2){
            return "Tháng Này";
        } else if($str == 3){
            return "Tháng Trước";
        } else if($str == 4){
            return "Năm Nay";
        } else if($str == 5){
            return "Năm Trước";
        }

    }
    function cryptocurrency()               {return view('admin.dashboard.cryptocurrency');}
    function campaign()                     {return view('admin.dashboard.campaign');}
    function ecommerce()                    {return view('admin.dashboard.ecommerce');}
}

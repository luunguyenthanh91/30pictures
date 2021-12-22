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
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Gallery;
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
        $listStoryLimit = VideoHome::orderBy('sor')->whereNotNull('image')->whereDate('start_date', '<=', Carbon::today())->get();
        $useragent=$_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
            foreach ($listStoryLimit as &$item) {
                $item->image = $item->video_mobile;
            }
            unset($item);
        }

        
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
    function blogs(Request $request){
        $listBlogs = Blog::whereDate('date_start', '<=', Carbon::today())->get();
        return view(
            'fe.home.blogs',
            compact([
                'listBlogs'
            ])
        );
    }
    function blogsDetail(Request $request , $slug){
       
        $blog = Blog::where("slug" , $slug)->first();
        return view(
            'fe.home.blog-detail',
            compact([
                'blog'
            ])
        );
    }
    function gallary(Request $request , $slug){
       
        
        $blog = Blog::where("slug" , $slug)->first();
        $listGalary = Gallery::where('blog_id', $blog->id)->orderBy('sor')->orderBy('id', 'DESC')->get();
        return view(
            'fe.home.gallary',
            compact([
                'listGalary'
            ])
        );
    }
    function search(Request $request){
        $slug = '';
        $idWhere = 0;
        $bgDirectory = Setting::find(19);
        
        $keySearch = $request->key;
        $listStory = Derector::where('name', 'like' , "%".$request->key."%")
        ->orWhere('description', 'like' ,"%".$request->key."%")
        ->orWhere('meme', 'like' ,"%".$request->key."%")->orWhereHas('story', function ($query) use ($keySearch) {
            $query->where('description', 'like', "%".$keySearch."%");
       })->get();
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
                'listStoryS'
            ])
        );
    }
    function director(Request $request , $slug){
        $bgDirectory = Setting::find(19);
        $key = $request->key;
        if (!$key) {
            $story = Story::where("slug" , $slug)->first();
            $listStory = Derector::where('story_id', $story->id)->with('story')->orderBy('sor')->get();
        } else {
            $story = Story::where("slug" , $slug)->first();
            $listStory = Derector::where('name', 'like' , '%'. $key . '%')->with('story')->get();
        }
        
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

    function directorDetail(Request $request , $slug,  $key){
        $listStory = Derector::where('slug',$key)->first();
        $story = Story::find($listStory->story_id);
        $listStoryS = Story::all();
        return view(
            'fe.home.director-detail',
            compact([
                'slug',
                'listStory',
                'story',
                'listStoryS',
                'key'
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
            // $admin = 'luunguyenthanh91@gmail.com';
            $body = [
                'type' => 'Send Mail',
                'task' => 'test',
                'name' => @$request->name ? $request->name : '',
                'email' => @$request->email ? $request->email : '',
                'phone' => @$request->phone ? $request->phone : '',
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

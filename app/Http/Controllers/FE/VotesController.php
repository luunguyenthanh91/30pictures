<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\User;
use App\Models\Customers;
use App\Models\Votes;
use App\Models\CustomersVotes;
use App\Models\Products;
use App\Models\Posts;
use App\Jobs\SendEmail;


use DateTime;
use App\Http\Controllers\Controller;

class VotesController extends Controller
{

    function check(Request $request , $slug){
        $menu_active = 'home';
        $menu_parent_active = 'home';
        $checkCustomer = Customers::where('bycode',$slug)->first();
        if (!$checkCustomer) {
            return redirect('/contact.html');
        } else {
            if ($checkCustomer->zip == '00000') {
                return redirect('/contact.html')->with('errors', 'Cannot confirm international accounts. Please contact the administrator.');
            } else {
                return redirect('/votes/confirm/'.$slug);
            }
        }
        
    }
    function updateZip(Request $request , $slug){
        $error = '';
        if ($request->isMethod('post')) {
            if ($request->zip_code != '') {
                $checkCustomer = Customers::where('bycode',$slug)->first();
                if (!$checkCustomer) {
                    $error = 'Account does not exist.';
                } else {
                    $checkCustomer->zip = $request->zip_code ;
                    $checkCustomer->save();
                    return redirect('/votes/confirm/'.$slug);
                }
            } else {
                $error = 'Zipcode cannot be empty.';
            }
        }
        return view(
            'fe.votes.update',
            compact([
                'slug',
                'error'
            ])
        );
    }
    function confirm(Request $request , $slug){
        $checkCustomer = Customers::where('bycode',$slug)->first();
        if (!$checkCustomer) {
            return redirect('/contact.html');
        }else {
            if ($checkCustomer->zip == '00000') {
                return redirect('/contact.html')->with('errors', 'Cannot confirm international accounts. Please contact the administrator.');
            }
        }
        $error = '';
        if ($request->isMethod('post')) {
            $checkCustomer = Customers::where('bycode',$slug)->first();
            if (!$checkCustomer) {
                $error = 'Account does not exist.';
            } else {
                if ($checkCustomer->last == $request->last && $checkCustomer->zip == $request->zip) {
                    return redirect('/votes/confirm-form/'.$slug);
                } else {
                    return redirect('/contact.html')->with('errors', 'You entered incorrect information. Please send Email to the administrator to assist in changing information.');
                }
            }
        }
        return view(
            'fe.votes.confirm',
            compact([
                'slug',
                'error'
            ])
        );
    }
    function sendMailUpdate(Request $request , $slug){
        $error = 'You entered incorrect information. Please send Email to the administrator to assist in changing information.';
        if ($request->isMethod('post')) {
            $error = 'Email has been sent to the administrator. Please check your email response. Thanks.';
            $checkCustomer = Customers::where('bycode',$slug)->first();
            if (!$checkCustomer) {
                $error = 'Account does not exist.';
            } else {
                $message = [
                    'type' => 'Update Customer Infomation',
                    'task' => 'test',
                    'content' => 'Update Customer Infomation',
                    'last_name' => $request->last,
                    'zipcode' => $request->zip,
                    'des' => $request->con_message,
                    'email' => $checkCustomer->email
    
                ];
                SendEmail::dispatch($message, $checkCustomer)->delay(now()->addMinute(1));
            }
            
        }
        return view(
            'fe.votes.mail-update',
            compact([
                'slug',
                'error'
            ])
        );
    }
    function startForm(Request $request , $slug){
        $checkCustomer = Customers::where('bycode',$slug)->first();
        

        if (!$checkCustomer) {
            return redirect('/contact.html');
        }else {
            if ($checkCustomer->zip == '00000') {
                return redirect('/votes/not-zip/'.$slug);
            }
        }
        $error = '';
        
        return view(
            'fe.votes.start-votes',
            compact([
                'slug',
                'error'
            ])
        );
    }
    function confirmForm(Request $request , $slug){
        $error = '';
        $checkCustomer = Customers::where('bycode',$slug)->first();
        

        if (!$checkCustomer) {
            return redirect('/contact.html');
        }else {
            if ($checkCustomer->zip == '00000') {
                return redirect('/votes/not-zip/'.$slug);
            }
        }
        $checkVote = CustomersVotes::where('customers_id', $checkCustomer->id)->first();
        $allListVotes = Votes::all();
        foreach ($allListVotes as &$item) {
            $item->type = explode(',',$item->type);
        }
        unset($item);
        if (!$checkVote) {
            
            if ($request->isMethod('post')) {
                foreach ($request->vote as $key => $itemVote) {
                    $dataNew = new CustomersVotes();
                    $dataNew->customers_id = $checkCustomer->id;
                    $dataNew->votes_id = $key;
                    $dataNew->type = $itemVote;
                    $dataNew->email_confirm = $request->email;
                    $dataNew->save();
                    
                }
                $error = 'Thank you for voting! You should receive a voting confirmation email shortly!';
            }
        } else {
            $error = 'You have participated in voting. Do not repeat this action. Thanks.';
        }
        
        
        return view(
            'fe.votes.vote',
            compact([
                'slug',
                'error',
                'allListVotes'
            ])
        );
    }

}

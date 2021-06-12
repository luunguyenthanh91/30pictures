<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\User;
use App\Models\Products;
use App\Models\Posts;


use DateTime;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    function index(Request $request){
        $menu_active = 'home';
        $menu_parent_active = 'home';
        return view(
            'fe.contact.index',
            compact([
                'menu_active',
                'menu_parent_active'
            ])
        );
    }

}

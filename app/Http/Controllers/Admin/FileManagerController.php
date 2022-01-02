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
use App\Models\Gallery;
use File;
use App\Models\Derector;

class FileManagerController extends Controller
{
    public function index(Request $request)
    {   
        return view('admin.home.files');
    }
}

<?php
namespace App\Helpers;
use App\Models\PostCategories;
use App\Models\Setting;
use App\Models\Story;
class Helper
{
    public static function getListStory()
    {
        $listStory = Story::all();
        
        return $listStory;
    }
    
    public static function getSetting( $id )
    {
        $detail = Setting::where('id','=', $id)->first();
        
        return $detail;
    }
    public static function getMenu()
    {
        $listMenu = [];
        
        $listMenu['home'] = ["url" => "/home", "name" => "WELCOME TO" , "description" => "Our Home", 'active' => 'home', 'childrent' => null ];
        $listMenu['about'] = ["url" => "/about-us", "name" => "ABOUT US" , "description" => "30 Pictures", 'active' => 'home', 'childrent' => null ];
        $listMenu['story'] = ["url" => "/story-sellers", "name" => "DIRECTORS" , "description" => "Find your Directors", 'active' => 'home', 'childrent' => null ];
        $listMenu['contact'] = ["url" => "/contact-us", "name" => "CONTACT" , "description" => "Connect with us", 'active' => 'home', 'childrent' => null ];

        return $listMenu;
    }
    public static function convertSlug($title) {
        $replacement = '-';
        $map = array();
        $quotedReplacement = preg_quote($replacement, '/');
        $default = array(
            '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
            '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
            '/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
            '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
            '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
            '/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
            '/đ|Đ/' => 'd',
            '/ç/' => 'c',
            '/ñ/' => 'n',
            '/ä|æ/' => 'ae',
            '/ö/' => 'oe',
            '/ü/' => 'ue',
            '/Ä/' => 'Ae',
            '/Ü/' => 'Ue',
            '/Ö/' => 'Oe',
            '/ß/' => 'ss',
            '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
            '/\\s+/' => $replacement,
            sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
        );
        //Some URL was encode, decode first
        $title = urldecode($title);
        $map = array_merge($map, $default);
        return strtolower(preg_replace(array_keys($map), array_values($map), $title));
    }
    public static function formatCurency($price)
    {
        return number_format($price, 0, '', ',') . 'đ';
    }
    

    
    

}
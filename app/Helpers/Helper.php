<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class Helper{

    public static function trangthai($trangthai = 1){
        return $trangthai == 1 ? '<span class="btn btn-success btn-sm">Yes</span>' :
         '<span class="btn btn-danger btn-sm">No</span>';
    }

    
}
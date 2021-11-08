<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    protected $fillable =[
        'tensach' ,
        'views' ,
        'tomtat',
        'kichhoat',
        'slug_sach',
        'hinhanh',
        'tukhoa',
        'views',
        'noidung',
        'created_at',
        'updated_at',

        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DanhMucTruyen;

class Truyen extends Model
{
    use HasFactory;

    protected $dates = [
        'updated_at',
        'created_at',
    ];

    protected $fillable =[
        'tentruyen' ,
        'tacgia' ,
        'mota',
        'kichhoat',
        'slug_truyen',
        'hinhanh',
        'truyennoibat',
        'danhmuc_id',
        'theloai_id',
        'tukhoa',
        'created_at',
        'updated_at',

        
    ];

    public function danhmuctruyen()
    {
        return $this->belongsTo(DanhMucTruyen::class , 'danhmuc_id' , 'id')
        ->withDefault();
    }
    // public function products()
    // {
    //     return $this->hasMany(SanPham::class, 'menu_id', 'id');
    // }
    public function chapter()
    {
        return $this->hasMary(Chapter::class , 'truyen_id' , 'id');
    }

    public function theloai()
    {
        return $this->belongsTo(TheLoai::class , 'theloai_id' , 'id')
        ->withDefault();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;

    protected $fillable =[
        'tentheloai' ,
        'mota',
        'kichhoat',
        'slug_theloai'

    ];

    public function truyen()
    {
        return $this->hasMary(Truyen::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable =[
        'truyen_id' ,
        'tieude',
        'kichhoat',
        'slug_chapter',
        'tomtat',
        'noidung'

        
    ];

    public function truyen()
    {
        return $this->hasOne(Truyen::class, 'id', 'truyen_id')
            ->withDefault(['name' => '']);
    }
}

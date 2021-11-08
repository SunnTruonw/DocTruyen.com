<?php

namespace App\Http\Services\TheLoai;

use App\Models\TheLoai;
use Illuminate\Support\Facades\Session;

class TheLoaiService{

    public function store($request)
    {
            $data  = $request->all();

            $TheLoai = TheLoai::create($data);

            Session::flash('success' , 'Thêm truyện thành công');
        

        return true;
    }

    public function getAll()
    {
        return TheLoai::orderByDesc('id')->paginate(20);
    }

    public function delete($id)
    {
        TheLoai::find($id)->delete();

        Session::flash('success' , 'Xóa thể loại thành công ');

    }

    public function update($request,$id)
    {
        try {
            $theloai = TheLoai::find($id);
            
            $theloai->tentheloai = (string) $request->input('tentheloai');
            $theloai->mota = (string) $request->input('mota');
            $theloai->slug_theloai = (string) $request->input('slug_theloai');
            $theloai->kichhoat = (int) $request->input('kichhoat');

            #dd($theloai);
             $theloai->save();
 
          Session::flash('success' , 'Cập nhật truyện truyện thành công');
 
         } catch (\Throwable $err) {
          Session::flash('error' , 'Cập nhật truyện truyện Lỗi');
          \Log::info($err -> getMessage());
 
          return false;
         }
 
         return true;
    }
}
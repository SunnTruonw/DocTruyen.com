<?php

namespace App\Http\Services\DanhMuc;
use App\Models\DanhMucTruyen;
use Illuminate\Support\Facades\Session;


class DanhMucService{
    
    public function store($request)
    {
        try {
            $request->except('_token');

            $data  = $request->all();

            $danhmuctruyen = DanhMucTruyen::create($data);

            Session::flash('success' , 'Thêm danh mục truyen thành công');
        } catch (\Throwable $err) {
            //throw $th;
            Session::flash('error' , 'Thêm danh mục Lỗi .Vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;

        }

        return true;
    }

    public function getAll()
    {
        return DanhMucTruyen::orderByDesc('id')->paginate(20);
    }

    public function delete($id)
    {
        DanhMucTruyen::find($id)->delete();

        Session::flash('success' , 'Xóa danh mục truyện thành công');

    }

   public function update($request ,$id)
   {
        try {
           $danhmuctruyen = DanhMucTruyen::find($id);

           $danhmuctruyen->tendanhmuc = (string) $request->input('tendanhmuc');
           $danhmuctruyen->mota = (string) $request->input('mota');
           $danhmuctruyen->slug_danhmuc = (string) $request->input('slug_danhmuc');
           $danhmuctruyen->kichhoat = (string) $request->input('kichhoat');
            #dd($danhmuctruyen);
            $danhmuctruyen->save();

         Session::flash('success' , 'Cập nhật danh mục truyện thành công');

        } catch (\Throwable $err) {
         Session::flash('error' , 'Cập nhật danh mục truyện Lỗi');
         \Log::info($err -> getMessage());

         return false;
        }

        return true;
   }
}

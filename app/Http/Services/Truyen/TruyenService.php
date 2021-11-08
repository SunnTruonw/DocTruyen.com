<?php

namespace App\Http\Services\Truyen;
use Carbon\Carbon;
use App\Models\Truyen;
use App\Models\DanhMucTruyen;
use Illuminate\Support\Facades\Session;


class TruyenService{

    //thêm
    public function store($request)
    {

            
            $data  = $request->all();

            $truyen = Truyen::create($data);

            Session::flash('success' , 'Thêm truyện thành công');
        

        return true;
    }

    #create
    public function getDanhMuc()
    {
        return DanhMucTruyen::orderByDesc('id')->get();
    }

    #list
    public function getAll()
    {
        return Truyen::with('danhmuctruyen' ,'theloai')->orderByDesc('id')->paginate(20);
    }

    #delete
    public function delete($id)
    {
        $truyen = Truyen::find($id);
        $path = $truyen->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }

        Truyen::find($id)->delete();
        

        Session::flash('success' , 'Xóa truyện thành công ');
    }

    public function update($request,$id)
    {
            try {
            $truyen = Truyen::find($id);
            
            $truyen->tentruyen = (string) $request->input('tentruyen');
            $truyen->tacgia = (string) $request->input('tacgia');
            $truyen->tukhoa = (string) $request->input('tukhoa');
            $truyen->danhmuc_id = (int) $request->input('danhmuc_id');
            $truyen->theloai_id = (int) $request->input('theloai_id');
            $truyen->mota = (string) $request->input('mota');
            $truyen->hinhanh = (string) $request->input('hinhanh');
            $truyen->slug_truyen = (string) $request->input('slug_truyen');
            $truyen->kichhoat = (int) $request->input('kichhoat');
            $truyen->truyennoibat = (int) $request->input('truyennoibat');
            $truyen->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

            #dd($truyen->updated_at);
             $truyen->save();
 
          Session::flash('success' , 'Cập nhật truyện truyện thành công');
 
         } catch (\Throwable $err) {
          Session::flash('error' , 'Cập nhật truyện truyện Lỗi');
          \Log::info($err -> getMessage());
 
          return false;
         }
 
         return true;
    }
}
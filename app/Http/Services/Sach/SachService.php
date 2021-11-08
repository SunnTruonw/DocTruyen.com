<?php

namespace App\Http\Services\Sach;
use Carbon\Carbon;
use App\Models\Sach;
use Illuminate\Support\Facades\Session;

class SachService{
    public function store($request)
    {
        $data = $request->all();

        $sach = Sach::create($data);

        Session::flash('success' , 'Thêm sách thành công');
    }

    public function getAll()
    {
        return Sach::orderByDesc('id')->paginate(20);
    }

    public function delete($id){
        $sach = Sach::find($id);
        $path = $sach->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }

        Sach::find($id)->delete();
        

        Session::flash('success' , 'Xóa truyện thành công ');

    }

    public function update($request,$id)
    {
            try {
            $sach = Sach::find($id);
            
            $sach->tensach = (string) $request->input('tensach');
            $sach->tomtat = (string) $request->input('tomtat');
            $sach->tukhoa = (string) $request->input('tukhoa');
            $sach->views = (string) $request->input('views');
            $sach->noidung = (string) $request->input('noidung');
            $sach->hinhanh = (string) $request->input('hinhanh');
            $sach->slug_sach = (string) $request->input('slug_sach');
            $sach->kichhoat = (int) $request->input('kichhoat');
            $sach->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

            #dd($sach);
             $sach->save();
 
          Session::flash('success' , 'Cập nhật truyện truyện thành công');
 
         } catch (\Throwable $err) {
          Session::flash('error' , 'Cập nhật truyện truyện Lỗi');
          \Log::info($err -> getMessage());
 
          return false;
         }
 
         return true;
    }
}
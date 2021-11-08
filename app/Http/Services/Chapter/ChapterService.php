<?php

namespace App\Http\Services\Chapter;
use App\Models\Truyen;
use App\Models\Chapter;
use Illuminate\Support\Facades\Session;


class ChapterService{

    public function getTruyen()
    {
        return Truyen::orderByDesc('id')->get();
    }

    public function store($request)
    {
        $data  = $request->all();

            $chapter = Chapter::create($data);

            Session::flash('success' , 'Thêm truyện thành công');
        

        return true;
    }

    public function get()
    {
        return Chapter::with('truyen')->orderByDesc('id')->paginate(20);
    }

    public function delete($id)
    {

         Chapter::find($id)->delete();

         Session::flash('success', 'Xóa Chapter thành công ');
    }

    public function update($request,$id)
    {
        try {
            $chapter = Chapter::find($id);
            
            $chapter->tieude =  $request->input('tieude');
            $chapter->truyen_id =  $request->input('truyen_id');
            $chapter->tomtat =  $request->input('tomtat');
            $chapter->noidung =  $request->input('noidung');
            $chapter->slug_chapter =  $request->input('slug_chapter');
            $chapter->kichhoat =  $request->input('kichhoat');

             $chapter->save();
 
          Session::flash('success' , 'Cập nhật truyện truyện thành công');
 
         } catch (\Throwable $err) {
          Session::flash('error' , 'Cập nhật truyện truyện Lỗi');
          \Log::info($err -> getMessage());
 
          return false;
         }
 
         return true;
    }
}
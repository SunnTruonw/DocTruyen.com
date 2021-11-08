<?php

namespace App\Http\Controllers;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\TheLoai;
use App\Models\Sach;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function tabdanhmuc(Request $request)
    {
        $data = $request->all();
        // echo $data['danhmuc_id'];
        $output = '';
        $truyens = Truyen::with('danhmuctruyen' ,'theloai')->where('danhmuc_id',$data['danhmuc_id'])->take(20)->get();

        foreach($truyens as $key => $truyen){
            $output .='
            <ul class="mucluctruyen">
                    <li><a href="'.url('/xem-truyen/'.$truyen->slug_truyen).'">'. $truyen->tentruyen .'</a></li>
                </ul>
            ';

           
        }
         return $output;
    }

    public function home(){
        $danhmuc = DanhMucTruyen::orderByDesc('id')->get();
        $theloai = TheLoai::orderByDesc('id')->get();
        $truyens = Truyen::orderByDesc('id')->where('kichhoat' , 1)->paginate(16);

        $sliders = Truyen::with('danhmuctruyen','theloai')->orderBy('id','ASC')->where('kichhoat' ,1)->take(6)->get();

        return view('page.home',[
            'danhmuc' => $danhmuc,
            'truyens' => $truyens,
            'theloai' => $theloai,
            'sliders' => $sliders,
        ]);
    }

    public function xemsach()
    {
        $danhmuc = DanhMucTruyen::orderByDesc('id')->get();
        $theloai = TheLoai::orderByDesc('id')->get();
        $sachs = Sach::orderByDesc('id')->where('kichhoat' , 1)->paginate(12);

        $sliders = Truyen::with('danhmuctruyen','theloai')->orderBy('id','ASC')->where('kichhoat' ,1)->take(6)->get();

        return view('page.sach',[
            'danhmuc' => $danhmuc,
            'sachs' => $sachs,
            'theloai' => $theloai,
            'sliders' => $sliders,
        ]);
    }

    public function xemsachnhanh(Request $request)
    {
        $sach_id = $request->sach_id;

        $sach = Sach::find($sach_id);
        $output['tieude_sach'] = $sach->tensach;
        $output['noidung_sach'] = $sach->noidung;

        return json_encode($output);
    }

    public function danhmuc($slug)
    {
        $theloai = TheLoai::orderByDesc('id')->get();
        $danhmuc = DanhMucTruyen::orderByDesc('id')->get();

        $danhmuc_id = DanhMucTruyen::where('slug_danhmuc' ,$slug)->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        $truyens = Truyen::orderByDesc('id')->where('danhmuc_id' , $danhmuc_id->id)->where('kichhoat' ,1)->paginate(16);

        return view('page.danhmuc',[
            'danhmuc' =>$danhmuc,
            'truyens' =>$truyens,
            'theloai' => $theloai,
            'tendanhmuc' => $tendanhmuc,

        ]);

    }

    public function theloai($slug)
    {
        $theloai = TheLoai::orderByDesc('id')->get();
        $danhmuc = DanhMucTruyen::orderByDesc('id')->get();

        
        $theloai_id = TheLoai::where('slug_theloai' ,$slug)->first();
        $tentheloai = $theloai_id->tentheloai;

        $truyens = Truyen::orderByDesc('id')->where('theloai_id' , $theloai_id->id)->where('kichhoat' ,1)->paginate(12);

        return view('page.theloai',[
            'danhmuc' =>$danhmuc,
            'truyens' =>$truyens,
            'theloai' => $theloai,
            'tentheloai' => $tentheloai,

        ]);

    }

    public function xemtruyen($slug)
    {
        $theloai = TheLoai::orderByDesc('id')->get();
        $danhmuc = DanhMucTruyen::orderByDesc('id')->get();

        $truyens = Truyen::where('slug_truyen' , $slug)
        ->with('danhmuctruyen','theloai')
        ->where('kichhoat' ,1)->first();//vd:$truyens -> id == 1

        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyens->id)->get();//id =2 : truyen thach sanh,
        //đk nếu truyen_id trong bảng chapter == $truyens->id lấy ra chapter thuoc truyen thach sanh 
        //do ra phan muc luc
        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyens->id)->first();
        // an vao link lay ra chapter dau tien
        $chapter_moinhat = Chapter::with('truyen')->orderBy('id', 'DESC')->where('truyen_id', $truyens->id)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen','theloai')
        ->where('danhmuc_id' , $truyens->danhmuctruyen->id)//(9,9)
        ->whereNotIn('id',[$truyens->id])//(1,1)->bỏ
        ->get();

        $truyennoibat = Truyen::where('truyennoibat', 1)->take(10)->get();
        $truyenxemnhieu = Truyen::where('truyennoibat', 2)->take(10)->get();

        return view('page.truyen',[
            'danhmuc' =>$danhmuc,
            'truyens' =>$truyens,
            'chapter' => $chapter,
            'chapter_dau' => $chapter_dau,
            'chapter_moinhat' => $chapter_moinhat,
            'cungdanhmuc' => $cungdanhmuc,
            'theloai' => $theloai,
            'truyennoibat' => $truyennoibat,
            'truyenxemnhieu' => $truyenxemnhieu,

        ]);

    }

    public function xemchapter($slug_truyen,$slug){
        $theloai = TheLoai::orderByDesc('id')->get();
        $danhmuc = DanhMucTruyen::orderByDesc('id')->get();

        $truyens = Chapter::where('slug_chapter', $slug)->first();
         //dd($truyens->truyen_id);//2

        //  breadcrumb 
        $truyen_breadcrumb = Truyen::where('id' , $truyens->truyen_id)->with('danhmuctruyen','theloai')->first();
        //end breadcrumb 

        
        $chapter = Chapter::with('truyen')->where('slug_chapter', $slug)->where('truyen_id', $truyens->truyen_id)->first();

        $next_chapter = Chapter::with('truyen')->where('truyen_id' , $truyens->truyen_id)->where('id' ,'>' , $chapter->id)->min('slug_chapter');//tap sau
        #dd($next_chapter);
        $previous_chapter = Chapter::with('truyen')->where('truyen_id' , $truyens->truyen_id)->where('id' ,'<' , $chapter->id)->max('slug_chapter');//tap trc
        #dd($previous_chapter);
        $max_id = Chapter::where('truyen_id' , $truyens->truyen_id)->orderBy('id' , 'DESC')->first();
        $min_id = Chapter::where('truyen_id' , $truyens->truyen_id)->orderBy('id' , 'ASC')->first();
       
        $allChapter = Chapter::with('truyen')->orderBy('id','ASC')
        ->where('truyen_id', $truyens->truyen_id)
        ->get();//laays tat ca chapter để add vào mục lục


        return view('page.chapter',[
            'danhmuc' => $danhmuc,
            'chapter' => $chapter,
            'allChapter' => $allChapter,
            'next_chapter' => $next_chapter,
            'previous_chapter' => $previous_chapter,
            'max_id' => $max_id,
            'min_id' => $min_id,
            'theloai' => $theloai,
            'truyen_breadcrumb' => $truyen_breadcrumb,

        ]);
    }

    public function timkiem(Request $request)
    {
        $theloai = TheLoai::orderByDesc('id')->get();
        $danhmuc = DanhMucTruyen::orderByDesc('id')->get();

        $data = $request->all();
        $tukhoa = $data['tukhoa'];

        $truyens = Truyen::with('danhmuctruyen' , 'theloai')
        ->where('tentruyen' , 'LIKE' , '%' . $tukhoa . '%' )
        ->Orwhere('tacgia' , 'LIKE' , '%' . $tukhoa . '%' )
        ->Orwhere('mota' , 'LIKE' , '%' . $tukhoa . '%' )
        ->get();

        return view('page.timkiem',[
            'danhmuc' =>$danhmuc,
            'truyens' =>$truyens,
            'theloai' => $theloai,
            'tukhoa' => $tukhoa,

        ]);
    }

    public function timkiem_ajax(Request $request)
    {
        $data = $request->all();
        
      
        if($data['keywords']){

            $truyens = Truyen::where('tentruyen' , 'LIKE' , '%'. $data['keywords'] . '%')->get();

            $output = '
            <ul class="dropdown-menu" style="display : block;margin-left : 800px">'
            ;
            foreach($truyens as $key => $tr){
                $output .='
                <li class="li_search_ajax dropdown-item">'.$tr->tentruyen.'</li>';
            }

            unset($truyens[$key]);
            $output .='</ul>';
            
            
            return $output;
        }
    }

    public function tag($tag)
    {
        $theloai = TheLoai::orderByDesc('id')->get();
        $danhmuc = DanhMucTruyen::orderByDesc('id')->get();

        
        $tags = explode('-',$tag);
        $truyens = Truyen::with('danhmuctruyen' , 'theloai')
        ->where(
            function ($query) use ($tags){
                for($i =0 ; $i< count($tags) ; $i++){
                    $query->orWhere('tukhoa' ,'LIKE' , '%'. $tags[$i] . '%');
                }
            }
        )->paginate(18);
        

        return view('page.tags',[
            'danhmuc' =>$danhmuc,
            'truyens' =>$truyens,
            'theloai' => $theloai,
            'tag' => $tag
            

        ]);
    }

    
    
}

@extends('../layout')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url('/the-loai/' . $truyen_breadcrumb->theloai->slug_theloai)}}">{{$truyen_breadcrumb->theloai->tentheloai}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('/danh-muc/' . $truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen_breadcrumb->tentruyen}}</li>
  </ol>
</nav>

<div class="row">
  <div class="col">
    <h3>{{$chapter->truyen->tentruyen}}</h3>
    <p>Chương hiên tại : {{$chapter->tieude}}</p>
    
    <div class="col-md-5">
      <style>
        .isDisabled{
            color : currentColor;
            pointer-events : none;
            opacity: 0.5;
            text-decoration : none;

        }
      </style>
      <div class="form-group">
        <p>
          <a name="" id="" class="btn btn-primary {{$chapter->id == $min_id->id ? 'isDisabled' : ''}}" 
            href="{{url('/xem-chapter/' .$chapter->truyen->slug_truyen . '/' .$previous_chapter)}}" role="button">Tập trước</a>
        </p>
          <label for="exampleInputEmail1">Chọn Chương</label>
          <select name="danhmuc_id" id="" class="custom-select select_chapter">
                @foreach($allChapter as $key => $chapters)
                  <option value="{{url('xem-chapter/'. $chapters->truyen->slug_truyen . '/' . $chapters->slug_chapter)}}">{{$chapters->tieude}}</option>
                @endforeach
          </select>
        
          
      </div>
      <p><a name="" id="" class="btn btn-primary {{$chapter->id == $max_id->id ? 'isDisabled' : ''}}" 
        href="{{url('/xem-chapter/' .$chapter->truyen->slug_truyen . '/' .$next_chapter)}}" role="button">Tập sau</a></p>
    </div>
    <div class="noidungtruyen">
      <p>{!! $chapter->noidung !!}</p>
    <div class="col-md-5">

      <div class="form-group">
        <label for="exampleInputEmail1">Chọn Chương</label>
        <select name="danhmuc_id" id="" class="custom-select select_chapter">
              @foreach($allChapter as $key => $chapters)
                <option value="{{url('xem-chapter/'.$chapters->slug_chapter)}}">{{$chapters->tieude}}</option>
              @endforeach
        </select>
    </div>
</div>
    </div>
    
  </div>
</div>


@endsection
@extends('../layout')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url('/danh-muc/' . $truyens->danhmuctruyen->slug_danhmuc)}}">{{$truyens->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyens->tentruyen}}</li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
                <img class="wishlist_img" src="{{$truyens->hinhanh}}"  alt="Product" width="100%">
            </div>
            <div class="col-md-9">
                <style>
                    .Info{
                        list-style : none;
                    }
                </style>

                <!-- Lấy biến wishlist lưu vào localStorage -->
                    <input type="hidden" value="{{$truyens->tentruyen}}" class="wishlist_title">
                    <input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
                    <input type="hidden" value="{{$truyens->id}}" class="wishlist_id">
                    <!-- <input type="hidden" value="{{$truyens->hinhanh}}" class="wishlist_img"> -->
                <!-- end -->

                <ul class="Info">
                    <li>Tên truyện : {{$truyens->tentruyen}}</li>
                    <li>Ngày đăng  : {{$truyens->created_at->diffForHumans()}}</li>
                    <li>Tác giả : {{$truyens->tacgia}}</li>
                    <li>Danh mục truyện :<a href="{{url('/danh-muc/' . $truyens->danhmuctruyen->slug_danhmuc)}}"> {{$truyens->danhmuctruyen->tendanhmuc}}</a></li>
                    <li>Thể loại truyện :<a href="{{url('/the-loai/' . $truyens->theloai->slug_theloai)}}"> {{$truyens->theloai->tentheloai}}</a></li>
                    <li>Số chapter : 200</li>
                    <li>Số lượt xem :2000</li>
                    <li><a href="#">Xem mục lục</a></li>

                    @if($chapter_dau)
                    <li>
                        <a class="btn btn-primary" 
                        href="{{url('/xem-chapter/' . $chapter_dau->truyen->slug_truyen. '/'. $chapter_dau->slug_chapter )}}" 
                        role="button">Đọc ngay</a>
                        <button type="button" class="btn btn-primary btn-thich_truyen">
                            <i class="fa fa-heart"></i>
                        </button>
                    </li>

                    <li>
                        <a class="btn btn-primary mt-2" 
                        href="{{url('/xem-chapter/' . $chapter_moinhat->truyen->slug_truyen. '/'. $chapter_moinhat->slug_chapter )}}" 
                        role="button">Đọc chương mới nhất</a>
                    </li>
                    @else
                        <li><a href="#" class="btn btn-primary">Chương đang cập nhật</a></li>
                    @endif
                    
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <p class="mt-2">{{$truyens->mota}}</p>  
                <hr>
                <style>
                    .tagcloud05 ul {
                        margin: 0;
                        padding: 0;
                        list-style: none;
                    }
                    .tagcloud05 ul li {
                        display: inline-block;
                        margin: 0 0 .3em 1em;
                        padding: 0;
                    }
                    .tagcloud05 ul li a {
                        position: relative;
                        display: inline-block;
                        height: 30px;
                        line-height: 30px;
                        padding: 0 1em;
                        background-color: #3498db;
                        border-radius: 0 3px 3px 0;
                        color: #fff;
                        font-size: 13px;
                        text-decoration: none;
                        -webkit-transition: .2s;
                        transition: .2s;
                    }
                    .tagcloud05 ul li a::before {
                        position: absolute;
                        top: 0;
                        left: -15px;
                        content: '';
                        width: 0;
                        height: 0;
                        border-color: transparent #3498db transparent transparent;
                        border-style: solid;
                        border-width: 15px 15px 15px 0;
                        -webkit-transition: .2s;
                        transition: .2s;
                    }
                    .tagcloud05 ul li a::after {
                        position: absolute;
                        top: 50%;
                        left: 0;
                        z-index: 2;
                        display: block;
                        content: '';
                        width: 6px;
                        height: 6px;
                        margin-top: -3px;
                        background-color: #fff;
                        border-radius: 100%;
                    }
                    .tagcloud05 ul li span {
                        display: block;
                        max-width: 100px;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                        overflow: hidden;
                    }
                    .tagcloud05 ul li a:hover {
                        background-color: #555;
                        color: #fff;
                    }
                    .tagcloud05 ul li a:hover::before {
                        border-right-color: #555;
                    }

                </style>
                <p>Từ khóa tìm kiếm :
                    @php
                        $tukhoa = explode(",",$truyens->tukhoa);
                    @endphp

                    <div class="tagcloud05">
                        <ul>
                            @foreach($tukhoa as $key => $tu)
                                <li><a href="{{url('/tag/'. \Str::slug($tu))}}"><span>{{$tu}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                </p>
                
                <h4>Muc luc</h4> 
                <ul class="mucluctruyen">
                    @if(count($chapter) > 0)
                    @foreach($chapter as $key => $chap)
                    <li><a href="{{url('/xem-chapter/'. $chap->truyen->slug_truyen . '/'. $chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
                    @endforeach

                    @else
                        <p>Hiện tại chưa cập nhật  mục lục....</p>
                    @endif
                </ul>


                <!-- facebook comment -->
                   
                <!-- End -->
                <h4>Truyện Cùng Danh Mục</h4>
                    <div class="row pt-2 mx-n2">
                        @foreach($cungdanhmuc as $key => $truyen)
                        <!-- Product-->
                        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                            <!-- Product-->
                            
                                <div class="card product-card-alt">
                                    <div class="product-thumb">
                                        <a href="{{url('/xem-truyen/'.$truyen->slug_truyen)}}">
                                            <img src="{{$truyen->hinhanh}}"  alt="Product" width="100%">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                <a href="{{url('/xem-truyen/'.$truyen->slug_truyen)}}" style="text-transform: uppercase;">
                                    <p class="product-title fs-sm mb-2">{{$truyen->tentruyen}} </p>
                                </a>
                                
                                </div>
                            
                        </div>

                        
                        @endforeach
                
                    </div>
        </div>
    </div>
    <div class="col-md-3">
        <h3 class=" card-header">Danh Mục Truyện</h3>
        @foreach($truyennoibat as $key => $noibat)

            <div class="row mt-2">
                <div class="col-md-5">
                    <a href="{{url('/xem-truyen/'.$noibat->slug_truyen)}}">
                        <img src="{{$noibat->hinhanh}}" alt="" width="100%">
                    </a>
                    
                </div>
                <div class="col-md-7">
                    <a href="{{url('/xem-truyen/'.$noibat->slug_truyen)}}" style="text-transform: uppercase;">
                        <p>{{$noibat->tentruyen}}</p>
                    </a>
                    
                </div>
            </div>
            @endforeach

        <h3 class=" mt-4 card-header">Danh Xem Nhiều</h3>
                @foreach($truyenxemnhieu as $key => $xemnhieu)

            <div class="row mt-2">
                <div class="col-md-5">
                    <a href="{{url('/xem-truyen/'.$xemnhieu->slug_truyen)}}" >
                        <img src="{{$xemnhieu->hinhanh}}" alt="" width="100%">
                    </a>
                    
                </div>
                <div class="col-md-7">
                    <a href="{{url('/xem-truyen/'.$xemnhieu->slug_truyen)}}" style="text-transform: uppercase;">
                        <p>{{$xemnhieu->tentruyen}}</p>
                    </a>
                    
                </div>
            </div>
            @endforeach

        <h3 class="mt-4 card-header">Truyện Yêu Thích</h3>
        <div id="yeuthich"></div>
    </div>
</div>

@endsection
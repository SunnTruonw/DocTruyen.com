@extends('../layout')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $tag }}</li>
  </ol>
</nav>


<div style="margin-top :60px">
        <h3>Nội dung bạn đang tìm kiếm : {{ $tag }}</h3>
        </div>
        <div class="row pt-2 mx-n2">
            @if(count($truyens) == 0)
                <p>Không tìm thấy tuyện....</p>
            @else
            @foreach($truyens as $key => $truyen)
            <!-- Product-->
            <div class="col-md-2">
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
            @endif
            
        </div>

        <!-- end Sách nên đọc -->


       
@endsection
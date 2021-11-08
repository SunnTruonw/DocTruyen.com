@extends('../layout')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tìm Kiếm</li>
  </ol>
</nav>


<div style="margin-top :60px">
        <h3>Nội dung bạn đang tìm kiếm :{{$tukhoa}}</h3>
        </div>
        <div class="row pt-2 mx-n2">
            @if(count($truyens) == 0)
                <p>Không tìm thấy tuyện....</p>
            @else
            @foreach($truyens as $key => $truyen)
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
                    <a href="{{url('/xem-truyen/'.$truyen->slug_truyen)}}">
                            <h5 class="product-title fs-sm mb-2">{{$truyen->tentruyen}} </h5>
                        </a>
                        <p>{{$truyen->mota}}</p>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="fs-sm me-2">
                                    <a  class="btn btn-danger" href="{{url('/xem-truyen/'.$truyen->slug_truyen)}}" role="button">Xem truyện</a>    
                            </div>
                            <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">
                             <i class="fas fa-eye"></i> :

                            </div>
                        </div>
                    </div>
                
            </div>

            
            @endforeach
            @endif
            
        </div>

        <!-- end Sách nên đọc -->


       
@endsection
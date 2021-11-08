@extends('../layout')

@section('content')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$tentheloai}}</li>
  </ol>
</nav>

<div style="margin-top :60px">
        <h3>{{$tentheloai}}</h3>
        </div>
        <div class="row pt-2 mx-n2">
            <div class="col-md-9">
            <h3>{{$tentheloai}}</h3>
                <div class="row pt-2 mx-n2">
                    @if(count($truyens) == 0)
                        <p>Truyện đang cập nhật....</p>
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
                                            <a href="{{url('/xem-truyen/'.$truyen->slug_truyen)}}" style="text-transform: uppercase;">
                                                <h6 class="product-title fs-sm mb-2">{{$truyen->tentruyen}} </h6>
                                            </a>
                                            
                                            </div>
                                        
                                    </div>
                    


                    
                    @endforeach
                    @endif
                </div>
            </div>
            
            <div class="col-md-3">
                <style>
                    .table{
                        width: 100%;
                            max-width: 100%;
                            margin-bottom: 1rem;
                            background-color: transparent;
                            border-collapse: collapse;
                    }
                    .table tr:first-child td {
                        border: none;
                        padding-top: 0;
                    }
                    .table td{
                        padding: 5px 10px;
                        text-transform: uppercase;
                        
                       
                    }
                    a.link-default {
                        color: #222;
                        line-height: 1.4;
                    }
                </style>
                <h3>THỂ LOẠI SÁCH, TRUYỆN</h3>
                @foreach($truyens as $key => $truyen)
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{url('/xem-truyen/'.$truyen->slug_truyen)}}" title="{{$truyen->tentruyen}}" 
                                    class="link-default">{{$truyen->tentruyen}}</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                @endforeach
            </div>

        </div>
        <div class="text-center">
            {{ $truyens->onEachSide(1)->links('pagination::bootstrap-4') }}
        </div>

       
@endsection
@extends('../layout')

@section('slide')
    @include('page.slide')
@endsection
@section('content')


<!-- Nav tabs -->
<ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
    
    @php    
        $i = 0;
    @endphp
    @foreach($danhmuc as $key => $tab_danhmuc)
    @php 
        $i++;
    @endphp
    <form action="">
        @csrf
        <li class="nav-item">
            <a data-danhmuc_id = "{{$tab_danhmuc->id }}" class="nav-link tabs_danhmuc" 
            id="{{$tab_danhmuc->slug_danhmuc}}-tab" data-toggle="tab" 
            href="#{{$tab_danhmuc->slug_danhmuc}}" role="tab" aria-controls="{{$tab_danhmuc->slug_danhmuc}}" aria-selected="true">{{$tab_danhmuc->tendanhmuc}}</a>
        </li>
        
    </form>
  @endforeach
</ul>

<!-- Tab panes -->
<div class="tab-content" id="myTabContent">
@foreach($danhmuc as $key => $tab_hienthi_danhmuc)

    <div class="tab-pane fade show " id="{{$tab_hienthi_danhmuc->slug_danhmuc}}" role="tabpanel" aria-labelledby="{{$tab_hienthi_danhmuc->slug_danhmuc}}-tab">
      <p class="mt-2">{{$tab_hienthi_danhmuc->tendanhmuc}}</p>
        <div id="tab_danhmuctruyen_{{$tab_hienthi_danhmuc->id}}">


                

        </div>
    </div>

  @endforeach

</div>



<div style="margin-top :60px">
        <h3 >Sách nên đọc</h3>
        </div>
        <div class="row pt-2 mx-n2">
            @foreach($truyens as $key => $truyen)
            <!-- Product-->
            <div class="col-md-2 col-sm-6 px-2 mb-grid-gutter">
                <!-- Product-->
                
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <a href="{{url('/xem-truyen/'.$truyen->slug_truyen)}}">
                                <img src="{{$truyen->hinhanh}}"  alt="Product" width="150px" height="225px">
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{url('/xem-truyen/'.$truyen->slug_truyen)}}" style="text-align : center;text-decoration: none; text-transform: uppercase;" >
                            <p class="product-title fs-sm mb-2">{{$truyen->tentruyen}} </p>
                        </a>
                    </div>
                
            </div>

            
            @endforeach

            
        </div>
        {{ $truyens->onEachSide(1)->links('pagination::bootstrap-4') }}
       
        <!-- end Sách nên đọc -->


        
@endsection


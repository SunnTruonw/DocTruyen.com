@extends('../layout')

@section('slide')
<style>
     
        
</style>
<div>
            <div class="truyenhot">
                <h3>Truyện Hot</h3>
                <select name="" class="select_slider custom-select">
                        <option value="#">Tất Cả</option>
                    @foreach($danhmuc as $key => $danh)
                        <option value="{{url('/danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row pt-2 mx-n2">
          @foreach($sliders as $key => $slider)
          <div class="col-md-2">
                <div class="card product-card-alt">
                    <div class="product-thumb">
                        <a href="{{url('/xem-truyen/'. $slider->slug_truyen)}}">
                            <img src="{{$slider->hinhanh}}" alt="Product" width="100%" height="225px">
                        </a>
                        
                    </div>
                    <a style="text-transform: uppercase;" href="{{url('/xem-truyen/'. $slider->slug_truyen)}}">{{$slider->tentruyen}}</a>
                </div>
              
            </div>

            @endforeach
          
        </div>

        

        @endsection
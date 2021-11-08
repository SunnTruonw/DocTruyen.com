@extends('../layout')


@section('content')




<div style="margin-top :60px">
        <h3 >Sách Mới Nhất</h3>
        </div>
        <div class="row pt-2 mx-n2">
            @foreach($sachs as $sach)
            <!-- Product-->
            <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-grid-gutter">
                <!-- Product-->
                
                    <div class="card product-card-alt">
                        <div class="product-thumb">
                            <a href="{{url('/xem-sach/'.$sach->slug_sach)}}">
                                <img src="{{$sach->hinhanh}}"  alt="Product" width="250px">
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{url('/xem-sach/'.$sach->slug_sach)}}">
                            <h5 class="product-title fs-sm mb-2">{{$sach->tensach}} </h5>
                        </a>
                        @php
                            $mota = substr($sach->tomtat,0,150);
                        @endphp
                        <p>{{$mota.'...'}}</p>
                        <!-- <p>{{$sach->tomtat}}</p> -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="fs-sm me-2">
                                <form>
                                    @csrf
                                
                                    <!-- Button trigger modal -->
                                    <button type="button" data-sach_id="{{$sach->id}}" class="btn btn-primary xemsachnhanh" data-toggle="modal" data-target="#exampleModalLong">
                                    Xem nhanh sách
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                <div id="tieude_sach"></div>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="noidung_sach"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>   
                                </form> 
                            </div>
                            <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">
                             <i class="fas fa-eye">{{$sach->views}}</i> 

                            </div>
                        </div>
                    </div>
                
            </div>

            
            @endforeach

            
        </div>
        {{ $sachs->onEachSide(1)->links('pagination::bootstrap-4') }}
        <!-- end Sách nên đọc -->


        
@endsection

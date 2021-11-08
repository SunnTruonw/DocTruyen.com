@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
        <div class="card">
                <div class="card-header">{{$title}}</div>

                @include('admin.alert')

                <div class="card-body">
                    <form action="{{route('sach.update',[$sachs->id])}}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sách</label>
                            <input type="text" class="form-control" value="{{$sachs->tensach}}" name="tensach" onkeyup="ChangeToSlug()" id="title" aria-describedby="emailHelp" placeholder="Nhập tên sách..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug sách</label>
                            <input type="text" class="form-control" value="{{$sachs->tensach}}" name="slug_sach" id="slug" aria-describedby="emailHelp" placeholder="Nhập Slug sách..">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ Khóa</label>
                            <input type="text" class="form-control" value="{{$sachs->tukhoa}}" name="tukhoa" aria-describedby="emailHelp" placeholder="Nhập từ khóa..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Lượt xem</label>
                            <input type="text" class="form-control" value="{{$sachs->views}}" name="views" aria-describedby="emailHelp" placeholder="Nhập từ khóa..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                            <textarea name="tomtat" rows="5" style="resize : none"  class="form-control">{{$sachs->tomtat}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea name="noidung" id="content" rows="5" style="resize : none"  class="form-control">{{$sachs->noidung}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh truyện</label>
                            <input type="file"  class="form-control" id="upload">
                            <div id="image_show">
                                <a href="{{$sachs->hinhanh}}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{$sachs->hinhanh}}" alt="{{$sachs->tensach}}" width="100px">
                                </a>
                            </div>
                            <input type="hidden" value="{{$sachs->hinhanh}}" name="hinhanh" id="thumb">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Trạng thái</label>

                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" value="1" {{$sachs->kichhoat == 1 ? 'checked' : ''}}>
                                <label class="form-check-label">
                                    Kích Hoạt
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" value="0" {{$sachs->kichhoat == 0 ? 'checked' : ''}}>
                                <label class="form-check-label">
                                Không Kích Hoạt
                                </label>
                            </div>
                        </div>

                    

                        <button type="submit" class="btn btn-primary">Cập Nhật Sách</button>
                    </form>

                </div>
    </div>
</div>
@endsection

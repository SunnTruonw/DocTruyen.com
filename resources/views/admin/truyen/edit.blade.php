@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
        <div class="card">
                <div class="card-header">{{$title}}</div>

                @include('admin.alert')

                <div class="card-body">
                    <form action="{{route('truyen.update',[$truyen->id])}}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->tentruyen}}" name="tentruyen" onkeyup="ChangeToSlug()" id="title" aria-describedby="emailHelp" placeholder="Nhập tên truyện..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tác Giả</label>
                            <input type="text" class="form-control" value="{{$truyen->tacgia}}" name="tacgia" aria-describedby="emailHelp" placeholder="Nhập tên tác giả..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ Khóa</label>
                            <input type="text" class="form-control" value="{{$truyen->tukhoa}}" name="tukhoa" aria-describedby="emailHelp" placeholder="Nhập từ khóa..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->slug_truyen}}" name="slug_truyen" id="slug" aria-describedby="emailHelp" placeholder="Nhập Slug truyện..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục truyện</label>
                            <select name="danhmuc_id" class="custom-select">
                                @foreach($danhmuc as $key => $danh)
                                    <option {{ $danh->id == $truyen->danhmuc_id ? 'selected' : ''}} value="{{$danh->id}}">{{$danh->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>  
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thể Loại truyện</label>
                            <select name="theloai_id" class="custom-select">
                                @foreach($theloai as $key => $the)
                                    <option {{ $the->id == $truyen->theloai_id ? 'selected' : ''}} value="{{$the->id}}">{{$the->tentheloai}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                            <textarea name="mota" id="content" rows="5" style="resize : none"  class="form-control">{{$truyen->mota}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh truyện</label>
                            <input type="file"  class="form-control" id="upload">
                            <div id="image_show">
                                <a href="{{$truyen->hinhanh}}" target="_blank">
                                    <img src="{{$truyen->hinhanh}}" width="100px">
                                </a>
                            </div>
                            <input type="hidden" value="{{$truyen->hinhanh}}" name="hinhanh" id="thumb">
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="1" 
                                {{$truyen->kichhoat == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="exampleRadios1">
                                    Kích Hoạt
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="0" 
                                {{$truyen->kichhoat == 0 ? 'checked' : ''}}>

                                <label class="form-check-label" for="exampleRadios1">
                                Không Kích Hoạt
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Truyện Nổi bật</label>

                            <div class="form-check">
                                <input class="form-check-input" name="truyennoibat" type="radio" value="0" 
                                {{$truyen->truyennoibat == 0 ? 'checked' : ''}}>
                                <label class="form-check-label">
                                    Truyện mới
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="truyennoibat" type="radio" value="1" 
                                {{$truyen->truyennoibat == 1 ? 'checked' : ''}}>
                                <label class="form-check-label">
                                Truyện nổi bật
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="truyennoibat" type="radio" value="2"  
                                {{$truyen->truyennoibat == 2 ? 'checked' : ''}}>
                                <label class="form-check-label">
                                Truyện xem nhiều
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập Nhật Truyện</button>
                    </form>

                </div>
    </div>
</div>
@endsection

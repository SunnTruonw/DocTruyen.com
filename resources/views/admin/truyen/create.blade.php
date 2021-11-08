@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
        <div class="card">
                <div class="card-header">{{$title}}</div>

                @include('admin.alert')

                <div class="card-body">
                    <form action="{{route('truyen.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên truyện</label>
                            <input type="text" class="form-control" value="{{old('tentruyen')}}" name="tentruyen" onkeyup="ChangeToSlug()" id="title" aria-describedby="emailHelp" placeholder="Nhập tên truyện..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug truyện</label>
                            <input type="text" class="form-control" value="{{old('slug_truyen')}}" name="slug_truyen" id="slug" aria-describedby="emailHelp" placeholder="Nhập Slug truyện..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tác Giả</label>
                            <input type="text" class="form-control" value="{{old('tacgia')}}" name="tacgia" aria-describedby="emailHelp" placeholder="Nhập tên tác giả..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ Khóa</label>
                            <input type="text" class="form-control" value="{{old('tukhoa')}}" name="tukhoa" aria-describedby="emailHelp" placeholder="Nhập từ khóa..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục truyện</label>
                            <select name="danhmuc_id" class="custom-select">
                                @foreach($danhmuc as $key => $danh)
                                    <option value="{{$danh->id}}">{{$danh->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>                        

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thể Loại truyện</label>
                            <select name="theloai_id" class="custom-select">
                                @foreach($theloai as $key => $the)
                                    <option value="{{$the->id}}">{{$the->tentheloai}}</option>
                                @endforeach
                            </select>
                        </div> 

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                            <textarea name="mota" id="content" rows="5" style="resize : none"  class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh truyện</label>
                            <input type="file"  class="form-control" id="upload">
                            <div id="image_show">
                                
                            </div>
                            <input type="hidden" name="hinhanh" id="thumb">
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Trạng thái</label>

                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" value="1" checked>
                                <label class="form-check-label">
                                    Kích Hoạt
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" value="0" >
                                <label class="form-check-label">
                                Không Kích Hoạt
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1">Truyện Nổi bật</label>

                            <div class="form-check">
                                <input class="form-check-input" name="truyennoibat" type="radio" value="0" checked>
                                <label class="form-check-label">
                                    Truyện mới
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="truyennoibat" type="radio" value="1" >
                                <label class="form-check-label">
                                Truyện nổi bật
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="truyennoibat" type="radio" value="2" >
                                <label class="form-check-label">
                                Truyện xem nhiều
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm Truyện</button>
                    </form>

                </div>
    </div>
</div>
@endsection

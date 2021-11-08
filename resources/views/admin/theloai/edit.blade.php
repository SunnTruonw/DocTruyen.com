@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
        <div class="card">
                <div class="card-header">{{$title}}</div>

                @include('admin.alert')

                <div class="card-body">
                    <form action="{{route('theloai.update',[$theloai->id])}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thể loại</label>
                            <input type="text" value="{{$theloai->tentheloai}}" class="form-control" name="tentheloai" onkeyup="ChangeToSlug()" id="title" aria-describedby="emailHelp" placeholder="Nhập tên thể loại..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug thể loại</label>
                            <input type="text" value="{{$theloai->slug_theloai}}" class="form-control" name="slug_theloai" id="slug" aria-describedby="emailHelp" placeholder="Nhập Slug thể loại..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả thể loại</label>
                            <input type="text"  value="{{$theloai->mota}}" class="form-control" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả thể loại..">
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="1" 
                                {{$theloai->kichhoat == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="exampleRadios1">
                                    Kích Hoạt
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="0" 
                                {{$theloai->kichhoat == 0 ? 'checked' : ''}}>
                                
                                <label class="form-check-label" for="exampleRadios1">
                                Không Kích Hoạt
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập Nhật Thể Loại</button>
                    </form>

                </div>
    </div>
</div>
@endsection

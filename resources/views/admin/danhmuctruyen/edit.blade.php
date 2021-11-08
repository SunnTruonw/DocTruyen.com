@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
        <div class="card">
                <div class="card-header">{{$title}}</div>

                @include('admin.alert')

                <div class="card-body">
                    <form action="{{route('danhmuc.update',[$danhmuc->id])}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{$danhmuc->tendanhmuc}}" class="form-control" name="tendanhmuc" onkeyup="ChangeToSlug()" id="title" aria-describedby="emailHelp" placeholder="Nhập tên danh mục..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug danh mục</label>
                            <input type="text" value="{{$danhmuc->slug_danhmuc}}" class="form-control" name="slug_danhmuc" id="slug" aria-describedby="emailHelp" placeholder="Nhập Slug danh mục..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả danh mục</label>
                            <input type="text" id="content" value="{{$danhmuc->mota}}" class="form-control" name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục..">
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="1" 
                                {{$danhmuc->kichhoat == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="exampleRadios1">
                                    Kích Hoạt
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="0" 
                                {{$danhmuc->kichhoat == 0 ? 'checked' : ''}}>
                                
                                <label class="form-check-label" for="exampleRadios1">
                                Không Kích Hoạt
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
                    </form>

                </div>
    </div>
</div>
@endsection

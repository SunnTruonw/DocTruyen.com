@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
        <div class="card">
                <div class="card-header">{{$title}}</div>

                @include('admin.alert')

                <div class="card-body">
                    <form action="{{route('chapter.update',[$chapter->id])}}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chapter</label>
                            <input type="text" class="form-control" value="{{$chapter->tieude}}" name="tieude" onkeyup="ChangeToSlug()" id="title" aria-describedby="emailHelp" placeholder="Nhập tên truyện..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug truyện</label>
                            <input type="text" class="form-control" value="{{$chapter->slug_chapter}}" name="slug_chapter" id="slug" aria-describedby="emailHelp" placeholder="Nhập Slug truyện..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thuộc truyện</label>
                            <select name="truyen_id" class="custom-select">
                                @foreach($truyens as $key => $truyen)
                                    <option {{ $truyen->id == $chapter->truyen_id ? 'selected' : ''}} 
                                        value="{{$truyen->id}}">{{$truyen->tentruyen}}</option>
                                @endforeach
                            </select>
                        </div>                        

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt chapter</label>
                            <input type="text" class="form-control"  value="{{$chapter->tomtat}}" name="tomtat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tóm tắt chapter..">
                        </div>

                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea name="noidung" class="form-control" id="content">{{ $chapter->noidung }}</textarea>
                        </div>
                        

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="1" 
                                {{$chapter->kichhoat == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="exampleRadios1">
                                    Kích Hoạt
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="0" 
                                {{$chapter->kichhoat == 0 ? 'checked' : ''}}>

                                <label class="form-check-label" for="exampleRadios1">
                                Không Kích Hoạt
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập Nhật Chapter</button>
                    </form>

                </div>
    </div>
</div>
@endsection

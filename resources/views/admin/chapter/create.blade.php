@extends('layouts.app')


@section('content')

@include('layouts.nav')
<div class="container">
        <div class="card">
                <div class="card-header">{{$title}}</div>

                @include('admin.alert')

                <div class="card-body">
                    <form action="{{route('chapter.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chapter</label>
                            <input type="text" class="form-control" value="{{old('tieude')}}" name="tieude" onkeyup="ChangeToSlug()" id="title" aria-describedby="emailHelp" placeholder="Nhập tên chapter..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug chapter</label>
                            <input type="text" class="form-control"  name="slug_chapter" id="slug" aria-describedby="emailHelp" placeholder="Nhập Slug chapter..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Truyện</label>
                            <select name="truyen_id" class="custom-select">
                                @foreach($truyens as $key => $truyen)
                                    <option value="{{$truyen->id}}">{{$truyen->tentruyen}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt chapter</label>
                            <input type="text" class="form-control"  value="{{old('tomtat')}}" name="tomtat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tóm tắt chapter..">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung Chapter</label>
                            <textarea name="noidung" id="content" rows="5" style="resize : none"  class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Kích Hoạt
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="kichhoat" type="radio" name="exampleRadios" id="exampleRadios1" value="0" >
                                <label class="form-check-label" for="exampleRadios1">
                                Không Kích Hoạt
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm Chapter</button>
                    </form>

                </div>
    </div>
</div>
@endsection

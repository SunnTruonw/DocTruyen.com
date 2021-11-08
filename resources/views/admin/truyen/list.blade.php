@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container-fluid">
    <div class="card-header">{{$title}}</div>

    <table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Tên truyện</th>
                <th>Tên tác giả</th>
                <th>Từ khóa</th>
                <th>Danh Mục</th>
                <th>Thể Loại</th>
                <th>Đường Dẫn</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Trạng Thái</th>
                <th>Ngày tạo</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($truyens as $key => $truyen)
            

        <tr>
            <td>{{ $truyen->id }}</td>
            <td>{{ $truyen->tentruyen }}</td>
            <td>{{ $truyen->tacgia }}</td>
            <td>{{ $truyen->tukhoa }}</td>
            <td>{{ $truyen->danhmuctruyen->tendanhmuc }}</td>
            <td>{{ $truyen->theloai->tentheloai }}</td>
            <td>{{ $truyen->slug_truyen }}</td>
            <td>{{ $truyen->mota }}</td>
            <td>
                <a href="{{$truyen->hinhanh}}" target="_blank" >
                    <img src="{{$truyen->hinhanh}}" style="width : 80px">
                </a>
            </td>
            
            <td>{!! \App\Helpers\Helper::trangthai($truyen->kichhoat) !!}</td>
            <td width="12%">
                @if($truyen->truyennoibat == 0)
                    <form action="">
                        @csrf
                        <select name="truyennoibat" data-truyen_id={{$truyen->id}} class="custom-select truyennoibat">
                            <option selected value="0">Truyện mới</option>
                            <option value="1">Truyện nổi bật</option>
                            <option value="2">Truyện xem nhiều</option>
                        </select>
                    </form>
                @elseif($truyen->truyennoibat == 1)
                    <form action="">
                        @csrf
                        <select name="truyennoibat" data-truyen_id={{$truyen->id}} class="custom-select truyennoibat">
                        <option  value="0">Truyện mới</option>
                        <option selected value="1">Truyện nổi bật</option>
                        <option value="2">Truyện xem nhiều</option>
                        </select>
                    </form>
                @else
                    <form action="">
                        @csrf
                        <select name="truyennoibat" data-truyen_id={{$truyen->id}} class="custom-select truyennoibat">
                        <option  value="0">Truyện mới</option>
                        <option  value="1">Truyện nổi bật</option>
                        <option selected value="2">Truyện xem nhiều</option>
                        </select>
                    </form>
                @endif
            </td>
             <td>{{ $truyen->created_at }}-{{$truyen->created_at->diffForHumans()}}</td>
            <td>{{ $truyen->updated_at }}-{{$truyen->updated_at->diffForHumans()}}</td>

            <td >
                <a class="btn btn-primary btn-sm" href="{{ route('truyen.edit',[ $truyen->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('truyen.destroy',[ $truyen->id] )}}" method="post">
                    @method('delete')
                    @csrf
                    <button  class="btn btn-danger btn-sm"
                    onclick="return confirm('Bạn có chắc muốn xóa danh mục này không ?');">
                        Delete
                    </button>
                </form>
                
            </td>
        </tr>

        @endforeach
    </tbody>
</table>


<div class="card-footer clearfix">
        {!! $truyens->links() !!}                              
    </div>

</div>
@endsection

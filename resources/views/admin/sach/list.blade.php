@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container-fluid">
    <div class="card-header">{{$title}}</div>

    <table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Tên sách</th>
                <th>Đường Dẫn</th>
                <th>Từ khóa</th>
                <th>Lượt xem</th>
                <th>Tóm tắt</th>
                <th>Hình ảnh</th>
                <th>Trạng Thái</th>
                <th>Ngày tạo</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($sachs as $key => $sach)
            

        <tr>
            <td>{{ $sach->id }}</td>
            <td>{{ $sach->tensach }}</td>
            <td>{{ $sach->slug_sach }}</td>
            <td>{{ $sach->tukhoa }}</td>
            <td>{{ $sach->views }}</td>
            <td>{{ $sach->tomtat }}</td>
            
            <td>
                <a href="{{$sach->hinhanh}}" target="_blank" >
                    <img src="{{$sach->hinhanh}}" style="width : 80px">
                </a>
            </td>
            
            <td>{!! \App\Helpers\Helper::trangthai($sach->kichhoat) !!}</td>
            
             <td>{{ $sach->created_at }}-{{$sach->created_at->diffForHumans()}}</td>
            <td>{{ $sach->updated_at }}-{{$sach->updated_at->diffForHumans()}}</td>

            <td >
                <a class="btn btn-primary btn-sm" href="{{ route('sach.edit',[ $sach->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('sach.destroy',[ $sach->id] )}}" method="post">
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
        {!! $sachs->links() !!}                              
    </div>

</div>
@endsection

@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="card-header">{{$title}}</div>

    <table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Tên danh mục</th>
                <th>Đường Dẫn</th>
                <th>Mô tả</th>
                <th>Trạng Thái</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($danhmuctruyen as $key => $danhmuc)
            

        <tr>
            <td>{{ $danhmuc->id }}</td>
            <td>{{ $danhmuc->tendanhmuc }}</td>
            <td>{{ $danhmuc->slug_danhmuc }}</td>
            <td>{{ $danhmuc->mota }}</td>
            
            <td>{!! \App\Helpers\Helper::trangthai($danhmuc->kichhoat) !!}</td>
            <td>{{ $danhmuc->updated_at }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('danhmuc.edit',[ $danhmuc->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('danhmuc.destroy',[ $danhmuc->id] )}}" method="post">
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
        {!! $danhmuctruyen->links() !!}                              
    </div>

</div>
@endsection

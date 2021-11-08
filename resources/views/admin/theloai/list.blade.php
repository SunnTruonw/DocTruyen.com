@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="card-header">{{$title}}</div>

    <table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Tên thể loại</th>
                <th>Đường Dẫn</th>
                <th>Mô tả</th>
                <th>Trạng Thái</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($theloais as $key => $theloai)
            

        <tr>
            <td>{{ $theloai->id }}</td>
            <td>{{ $theloai->tentheloai }}</td>
            <td>{{ $theloai->slug_theloai }}</td>
            <td>{{ $theloai->mota }}</td>
            
            <td>{!! \App\Helpers\Helper::trangthai($theloai->kichhoat) !!}</td>
            <td>{{ $theloai->updated_at }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('theloai.edit',[ $theloai->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('theloai.destroy',[ $theloai->id] )}}" method="post">
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
        {!! $theloais->links() !!}                              
    </div>

</div>
@endsection

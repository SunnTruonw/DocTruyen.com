@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="card-header">{{$title}}</div>

    <table class="table">
    <thead >
        <tr >
           
                <th >ID</th>
                <th>Tên chapter</th>
                <th>Thuộc truyện</th>
                <th>Đường Dẫn</th>
                <th>Tóm tắt Chapter</th>
                <th>Nội dung</th>
                <th>Trạng Thái</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
         
        </tr>
    </thead>
    
    <tbody>
        @foreach ($chapters as $key => $chapter)
            

        <tr>
            <td>{{ $chapter->id }}</td>
            <td>{{ $chapter->tieude }}</td>
            <td>{{ $chapter->truyen->tentruyen }}</td>
            <td>{{ $chapter->slug_chapter }}</td>
            <td>{{ $chapter->tomtat }}</td>
            <td>{{ $chapter->noidung }}</td>
            
            
            <td>{!! \App\Helpers\Helper::trangthai($chapter->kichhoat) !!}</td>
            <td>{{ $chapter->updated_at }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('chapter.edit',[ $chapter->id] )}}">
                    Edit
                </a>
                
                <form action="{{ route('chapter.destroy',[ $chapter->id] )}}" method="post">
                    @method('delete')
                    @csrf
                    <button  class="btn btn-danger btn-sm"
                    onclick="return confirm('Bạn có chắc muốn xóa chapter này không ?');">
                        Delete
                    </button>
                </form>
                
            </td>
        </tr>

        @endforeach
    </tbody>
</table>


<div class="card-footer clearfix">
        {!! $chapters->links() !!}                              
    </div>

</div>
@endsection

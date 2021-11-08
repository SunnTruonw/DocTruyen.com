<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Http\Services\DanhMuc\DanhMucService;
use App\Http\Requests\DanhMuc\DanhMucRequest;

class DanhMucController extends Controller
{
    protected $danhmuc;

    public function __construct(DanhMucService $danhmuc)
    {
        $this->danhmuc = $danhmuc;
    }
    

    public function index()
    {
        return view('admin.danhmuctruyen.list', [
            'title' => 'Liệt Kê Danh Mục Truyện',
            'danhmuctruyen' => $this->danhmuc->getAll()
        ]);
    }

    
    public function create()
    {
        return view('admin.danhmuctruyen.create', [
            'title' => 'Thêm Danh Mục Truyện',
        ]);
    }

    
    public function store(DanhMucRequest $request)
    {
        $this->danhmuc->store($request);


        return redirect()->back();



    }

   
    public function edit($id)
    {
            $danhmuc = DanhMucTruyen::find($id);

        return view('admin.danhmuctruyen.edit', [
            'title' => 'Cập Nhật Danh Mục Truyện : ' . $danhmuc->tendanhmuc,
            'danhmuc' => $danhmuc,
        ]);
    }

    
    public function update(DanhMucRequest $request, $id)
    {
        $result = $this->danhmuc->update($request,$id);

        if($result){
            return redirect('danhmuc');
        }
        return redirect()->back();
    }

   
    public function destroy($id)
    {
        $this->danhmuc->delete($id);


        return redirect()->back();
    }
}

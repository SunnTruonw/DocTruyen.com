<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Truyen\TruyenService;
use App\Models\Truyen;
use App\Models\TheLoai;

class TruyenController extends Controller
{
    protected $truyenService;

    public function __construct(TruyenService $truyenService)
    {
        $this->truyenService = $truyenService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.truyen.list', [
            'title' => 'Liệt Kê Danh Mục Truyện',
            'truyens' => $this->truyenService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = $this->truyenService->getDanhmuc();
        $theloai = TheLoai::orderByDesc('id')->get();

        return view('admin.truyen.create', [
            'title' => 'Thêm Danh Mục Truyện',
            'danhmuc' => $danhmuc,
            'theloai' => $theloai,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->truyenService->store($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truyen = Truyen::find($id);
        $danhmuc = $this->truyenService->getDanhmuc();
        $theloai = TheLoai::orderByDesc('id')->get();

        return view('admin.truyen.edit', [
            'title' => 'Cập Nhật Truyện : ' . $truyen->tentruyen,
            'truyen' => $truyen,
            'danhmuc' => $danhmuc,
            'theloai' => $theloai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->truyenService->update($request,$id);

        if($result){
            return redirect('truyen');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->truyenService->delete($id);

        return redirect()->back();
    }

    public function truyennoibat(Request $request){
        $data = $request->all();
        
        $truyen = Truyen::find($data['truyen_id']);
        $truyen->truyennoibat = $data['truyennoibat'];
        $truyen->save();
    }
}

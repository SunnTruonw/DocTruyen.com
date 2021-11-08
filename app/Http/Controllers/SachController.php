<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Sach\SachService;
use App\Models\Sach;

class SachController extends Controller
{
    protected $sachService;

    public function __construct(SachService $sachService)
    {
        $this->sachService = $sachService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sach.list', [
            'title' => 'Liệt Kê Danh Mục Truyện',
            'sachs' => $this->sachService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sach.create', [
            'title' => 'Thêm Danh Mục Sach',
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
        $this->sachService->store($request);

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
        $sachs = Sach::find($id);

        return view('admin.sach.edit', [
            'title' => 'Cập Nhật Truyện : ' . $sachs->tensach,
            'sachs' => $sachs,
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
        $result = $this->sachService->update($request,$id);

        if($result){
            return redirect('sach');
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
        $this->sachService->delete($id);

        return redirect()->back();
    }
}

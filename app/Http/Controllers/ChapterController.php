<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;
use App\Http\Services\Chapter\ChapterService;
use App\Http\Requests\ChapterRequest;


class ChapterController extends Controller
{
    protected $chapterService;

    public function __construct(chapterService $chapterService)
    {
        $this->chapterService = $chapterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = $this->chapterService->get();

        return view('admin.chapter.list', [
            'title' => 'Liệt kê Chapter Truyện',
            'chapters' => $chapters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyens = $this->chapterService->getTruyen();

        return view('admin.chapter.create', [
            'title' => 'Thêm Chapter Truyện',
            'truyens' => $truyens
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterRequest $request)
    {
        $this->chapterService->store($request);

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
        $chapter = Chapter::find($id);
        $truyens = $this->chapterService->getTruyen();

        return view('admin.chapter.edit', [
            'title' => 'Cập Nhật Chapter : ' . $chapter->tieude,
            'chapter' => $chapter,
            'truyens' => $truyens,
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
        $result = $this->chapterService->update($request,$id);

        if($result){
            return redirect('chapter');
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
        $this->chapterService->delete($id);

        return redirect()->back();
    }
}

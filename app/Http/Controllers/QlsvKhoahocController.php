<?php

namespace App\Http\Controllers;

use App\qlsv_khoahoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QlsvKhoahocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $title = "Danh sách khoá học";
        $search = $request->get('search')??"";
        $khoaHoc = DB::table('qlsv_khoahocs')->where('tenkhoahoc','like','%'.$search.'%')->where('deleted_at',0)->paginate(10);
        return view('admin.KhoaHoc.dskhoahoc', compact(['khoaHoc','title','search']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm khoá học";
        return view('admin.KhoaHoc.themkhoahoc',compact(['title']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $khoaHoc = new qlsv_khoahoc();
        $khoaHoc->tenkhoahoc = $request->tenkhoahoc;
        $khoaHoc->ghichu = $request->ghichu;
        $khoaHoc->nguoitao = "thanhduy";
        $khoaHoc->nguoisua = "thanhduy";
        $khoaHoc->deleted_at = "0";
        $khoaHoc->created_at = Carbon::now();
        $khoaHoc->save();
        return redirect()->route('qlsv_khoahoc.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qlsv_khoahoc  $qlsv_khoahoc
     * @return \Illuminate\Http\Response
     */
    public function show(qlsv_khoahoc $qlsv_khoahoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qlsv_khoahoc  $qlsv_khoahoc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Sửa khoá học";
        $khoaHoc = qlsv_khoahoc::find($id);
        return view('admin.KhoaHoc.suakhoahoc', compact(['khoaHoc','title']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qlsv_khoahoc  $qlsv_khoahoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $khoaHoc = qlsv_khoahoc::find($id);
        $khoaHocSua = $request->all();
        $khoaHoc->update(["updated_at" => Carbon::now()]);
        $khoaHoc->update($khoaHocSua);
        return redirect()->route('qlsv_khoahoc.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qlsv_khoahoc  $qlsv_khoahoc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $khoaHoc = DB::table('qlsv_khoahocs')->where('id',$id)->update(["deleted_at" => "1","updated_at" => Carbon::now()]);
        return redirect()->route('qlsv_khoahoc.index');
    }
}

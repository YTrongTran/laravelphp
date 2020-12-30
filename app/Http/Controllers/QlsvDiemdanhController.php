<?php

namespace App\Http\Controllers;

use App\qlsv_diemdanh;
use App\qlsv_lophoc;
use App\qlsv_sinhvien;
use App\qlsv_sinhvienlophoc;
use App\qlsv_thoikhoabieu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QlsvDiemdanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Danh sách điểm danh";
        $search = $request->get('search') ?? "";
        $diemDanh = DB::table('qlsv_diemdanhs')->where('deleted_at', 0)->paginate(10);
        return view('admin.DiemDanh.dsdiemdanh', compact(['diemDanh', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm điểm danh";
        $lopHoc = DB::table('qlsv_lophocs')->pluck('tenlophoc', 'id');
        $sinhVien = DB::table('qlsv_sinhviens')->pluck('hovaten', 'id');
        $thoiKhoaBieu = DB::table('qlsv_thoikhoabieus')->pluck('ngayhoc', 'id');
        return view('admin.DiemDanh.themdiemdanh', compact(['thoiKhoaBieu','lopHoc','sinhVien', 'title']));
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
        // $sinhVien = new qlsv_sinhvien();
        $diemDanh = new qlsv_diemdanh();
        $diemDanh->id_thoikhoabieu = $request->id_thoikhoabieu;
        $diemDanh->denlop = $request->denlop;
        $diemDanh->thuchanh = $request->thuchanh;
        $diemDanh->kienthuc = $request->kienthuc;
        $diemDanh->ghichu = $request->ghichu;
        $diemDanh->id_sinhvienlophoc = "90";
        $diemDanh->nguoitao = "thanhduy";
        $diemDanh->nguoisua = "thanhduy";
        $diemDanh->deleted_at = "0";
        $diemDanh->created_at = Carbon::now();
        if ($diemDanh->save()) {   
            $id_lophoc = $request->input('lophocs');
            $id_sinhvien = $request->input('sinhviens');
            foreach ($id_sinhvien as $svs) {  
                $sinhvienlophocs = new qlsv_sinhvienlophoc();   
                $sinhvienlophocs->id_lophoc = $id_lophoc;
                $sinhvienlophocs->id_sinhvien = $svs;
                $sinhvienlophocs->save();
            }
        }
        return redirect()->route('qlsv_diemdanh.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qlsv_diemdanh  $qlsv_diemdanh
     * @return \Illuminate\Http\Response
     */
    public function show(qlsv_diemdanh $qlsv_diemdanh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qlsv_diemdanh  $qlsv_diemdanh
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Sửa điểm danh";
        $diemDanh = qlsv_diemdanh::find($id);
        $sinhVien = qlsv_sinhvien::pluck('hovaten', 'id');
        $thoiKhoaBieu = qlsv_thoikhoabieu::pluck('ngayhoc', 'id');
        return view('admin.DiemDanh.suadiemdanh', compact(['diemDanh', 'sinhVien','thoiKhoaBieu', 'title']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qlsv_diemdanh  $qlsv_diemdanh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $diemDanh = qlsv_diemdanh::find($id);
        $diemDanhEdit = $request->all();
        $diemDanh->update(["updated_at" => Carbon::now()]);
        $diemDanh->update($diemDanhEdit);
        return redirect()->route('qlsv_diemdanh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qlsv_diemdanh  $qlsv_diemdanh
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $diemDanh = DB::table('qlsv_diemdanhs')->where('id', $id)->update(["deleted_at" => "1", "updated_at" => Carbon::now()]);
        return redirect()->route('qlsv_diemdanh.index');
    }
}

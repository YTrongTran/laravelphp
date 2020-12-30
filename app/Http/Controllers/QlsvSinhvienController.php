<?php

namespace App\Http\Controllers;

use App\qlsv_sinhvien;
use App\User;
use App\qlsv_lophoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QlsvSinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Danh sách sinh viên";
        $search = $request->get('search')??"";
        $sinhVien = DB::table('qlsv_sinhviens')->where('hovaten','like','%'.$search.'%')->where('deleted_at',0)->paginate(10);
        return view('admin.SinhVien.danhsachSinhvien', compact(['sinhVien','title','search']));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm sinh viên";
        $lopHoc = qlsv_lophoc::pluck('tenlophoc', 'id');
        return view('admin.SinhVien.addSinhvien',compact(['title','lopHoc']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sinhVien = new qlsv_sinhvien();
        $User= new User();
        $User->name= $request->name;
        $User->email= $request->email;
        $User->password = Hash::make($request->password);
        $User->save();

        $sinhVien->hovaten = $request->hovaten;
        $sinhVien->diachi = $request->diachi;
        $sinhVien->gioitinh = $request->gioitinh;
        $sinhVien->sodienthoaisinhvien = $request->sodienthoaisinhvien;
        $sinhVien->sodienthoaigiadinh = $request->sodienthoaigiadinh;
        $sinhVien->ghichu = $request->ghichu;
        $sinhVien->id_user = $User->id;
        $sinhVien->id_lophoc=$request->id_lophoc;
        $sinhVien->deleted_at = "0";
        $sinhVien->created_at = Carbon::now();
        $sinhVien->save();
       
        return redirect('/sinhvien/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qlsv_sinhvien  $qlsv_sinhvien
     * @return \Illuminate\Http\Response
     */
    public function show(qlsv_sinhvien $qlsv_sinhvien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qlsv_sinhvien  $qlsv_sinhvien
     * @return \Illuminate\Http\Response
     */
    public function edit(qlsv_sinhvien $qlsv_sinhvien,$id)
    {
        $title = "Sửa sinh viên";
        $sinhVien = qlsv_sinhvien::find($id);
        $lopHoc = qlsv_lophoc::pluck('tenlophoc', 'id');
        return view('admin.SinhVien.updateSinhvien', compact(['sinhVien','title','lopHoc']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qlsv_sinhvien  $qlsv_sinhvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qlsv_sinhvien $qlsv_sinhvien,$id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $sinhVien = qlsv_sinhvien::find($id);
        $sinhVien->hovaten = $request->hovaten;
        $sinhVien->diachi = $request->diachi;
        $sinhVien->gioitinh = $request->gioitinh;
        $sinhVien->sodienthoaisinhvien = $request->sodienthoaisinhvien;
        $sinhVien->sodienthoaigiadinh = $request->sodienthoaigiadinh;
        $sinhVien->ghichu = $request->ghichu;
        $sinhVien->id_lophoc=$request->id_lophoc;
        $sinhVien->save();
        return redirect('/sinhvien/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qlsv_sinhvien  $qlsv_sinhvien
     * @return \Illuminate\Http\Response
     */
    public function destroy(qlsv_sinhvien $qlsv_sinhvien,$id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $sinhVien = qlsv_sinhvien::find($id);
        $sinhVien = DB::table('qlsv_sinhviens')->where('id',$id)->update(["deleted_at" => "1","updated_at" => Carbon::now()]); 
        // $sinhVien->delete();
        return redirect('/sinhvien/index');
    }
}

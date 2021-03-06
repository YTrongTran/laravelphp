<?php

namespace App\Http\Controllers;

use App\qlsv_kieuthi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QlsvKieuthiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $title = "Danh sách Kiểu thi";
        $search = $request->get('search') ?? "";
        $qlsv_kieuthi = DB::table('qlsv_kieuthis')->where('kieuthi', 'like', '%' . $search . '%')->where("deleted_at", 0)->paginate(10);
        return view('admin/kieuthi/viewkieuthi', compact([
            'title', 'search', 'qlsv_kieuthi'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Thêm Kiểu thi";
        return view('admin/kieuthi/themkieuthi', compact([
            'title'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data  = new qlsv_kieuthi();
        $data->kieuthi = $request->kieuthi;
        $data->deleted_at = "0";
        $data->created_at = Carbon::now();
        $data->save();
        return redirect('/kieuthi/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qlsv_kieuthi  $qlsv_kieuthi
     * @return \Illuminate\Http\Response
     */
    public function show(qlsv_kieuthi $qlsv_kieuthi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qlsv_kieuthi  $qlsv_kieuthi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Sửa kiểu thi";
        $qlsv_kieuthi = qlsv_kieuthi::find($id);
        return view('admin.KieuThi.editkieuthi', compact(['title', 'qlsv_kieuthi']));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qlsv_kieuthi  $qlsv_kieuthi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qlsv_kieuthi $qlsv_kieuthi)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $data  = qlsv_kieuthi::find($request->id);
        $data->kieuthi = $request->kieuthi;
        $data->update(["updated_at" => Carbon::now()]);
        $data->save();
        return redirect('/kieuthi/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qlsv_kieuthi  $qlsv_kieuthi
     * @return \Illuminate\Http\Response
     */
    public function destroy(qlsv_kieuthi $qlsv_kieuthi, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $qlsv_kieuthi = DB::table('qlsv_kieuthis')->where('id', $id)->update(["deleted_at" => "1", "updated_at" => Carbon::now()]);
        return response()->json(['_typeMessage' => 'deleteSuccess']);
    }
}
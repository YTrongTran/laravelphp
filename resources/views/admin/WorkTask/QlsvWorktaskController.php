<?php

namespace App\Http\Controllers;

use App\qlsv_monhoc;
use App\qlsv_worktask;
use App\qlsv_worktaskdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QlsvWorktaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$title="Danh Sách WorkTask";
         $worktask = DB::table("qlsv_worktasks")->paginate(2);
		  $monhoc = DB::table("qlsv_monhocs")->pluck("tenmonhoc","id");
		  $worktaskdetail= DB::table("qlsv_worktaskdetails")->get();
        return view("dsworktask", ['worktask' => $worktask,'monhoc' => $monhoc,'worktaskdetail'=>$worktaskdetail,'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Đăng Ký WorkTask";
		$monhoc = DB::table("qlsv_monhocs")->pluck("tenmonhoc","id");
          return view("themworktask",['monhoc' => $monhoc,'title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $worktask = new qlsv_worktask();
       
        $worktask->tenworktask = $request->request->get("tenworktask");
		$worktask->id_monhoc=$request->request->get("id_monhoc");
		$worktask->thutu=$request->request->get("thutu");
		$worktask->nguoitao="haubeo";
		$worktask->nguoisua="haubeo";
		$worktask->deleted_at=0;
        $worktask->save();
		$worktaskdetail = new qlsv_worktaskdetail();
        $ten=$request->request->get("ten");
		//dd($ten);
		
		for($i=0;$i<count($ten);$i++){
		 
		 if($ten[$i]!=null){
	
		 $worktaskdetail->ten=$ten[$i];
		$worktaskdetail->id_worktask=$worktask->id;
		$worktaskdetail->nguoitao="haubeo";
		$worktaskdetail->nguoisua="haubeo";
		$worktaskdetail->deleted_at=0;
		
		//$worktaskdetail->sothutu=$i+1;
        $worktaskdetail->save();
		$worktaskdetail = new qlsv_worktaskdetail();
		
		 }
		}
		return redirect('/worktask/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qlsv_worktask  $qlsv_worktask
     * @return \Illuminate\Http\Response
     */
	 
	 public function search(qlsv_worktask $qlsv_worktask,Request $request)
    {
        $term =$request->request->get("tenworktask");
        $worktask = DB::table('qlsv_worktasks')->where('tenworktask','LIKE','%'.$term.'%')
                      ->paginate(2);
					  $title="Danh Sách WorkTask Tìm Được";
					    $worktask->withPath('/find?tenworktask='.$term);
						 $monhoc = DB::table("qlsv_monhocs")->pluck("tenmonhoc","id");
					   return view("dsworktask", ['worktask' => $worktask,'title' => $title,'monhoc' => $monhoc]);
    }
	 
	 
	 
    public function show(qlsv_worktask $qlsv_worktask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qlsv_worktask  $qlsv_worktask
     * @return \Illuminate\Http\Response
     */
    public function edit(qlsv_worktask $qlsv_worktask,$id)
    {
         $title="Sửa WorkTask";
         $worktask = qlsv_worktask::find($id);
		  $monhoc = DB::table("qlsv_monhocs")->pluck("tenmonhoc","id");
		  $worktaskdetail= DB::table("qlsv_worktaskdetails")->get();
        return view("editworktask", ['worktask' => $worktask,'monhoc' => $monhoc,'worktaskdetail'=>$worktaskdetail,'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qlsv_worktask  $qlsv_worktask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qlsv_worktask $qlsv_worktask,$id)
    {
         $worktaske = qlsv_worktask::find($id);

        $worktaske->tenworktask = $request->request->get("tenworktask");
		$worktaske->thutu=$request->request->get("thutu");
		$worktaske->id_monhoc=$request->request->get("id_monhoc");
        $worktaske->save();
		
		$worktaskdetail = new qlsv_worktaskdetail();
        
	     $ten=$request->request->get("ten");
		
		$worktaskdetail = DB::table("qlsv_worktaskdetails")->where('id_worktask',$worktaske->id)->get();
		
		foreach($worktaskdetail as $wdt){
		 DB::table('qlsv_worktaskdetails')->where('id',$wdt->id)->delete();
		 
		}
		for($i=0;$i<count($ten);$i++){
		 
		 if($ten[$i]!=null){
	    $worktaskdetail->ten=$ten[$i];
		$worktaskdetail->id_worktask=$worktaske->id;
		//$worktaskdetail->sothutu=$i+1;
		$worktaskdetail->nguoitao="haubeo";
		$worktaskdetail->nguoisua="haubeo";
		$worktaskdetail->deleted_at=0;
        $worktaskdetail->save();
		$worktaskdetail = new qlsv_worktaskdetails();
		
		 }
		}
		 return redirect('/worktask/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qlsv_worktask  $qlsv_worktask
     * @return \Illuminate\Http\Response
     */
    public function destroy(qlsv_worktask $qlsv_worktask,$id)
    {
        $worktask = qlsv_worktask::find($id);

        $worktask->deleted_at=1;
        $worktask->save();
        
         return redirect('/worktask/index');
    }
}

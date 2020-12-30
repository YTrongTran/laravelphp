 
 @extends('layouts.trangchu')

@section('content')

<head>
 
  <style>
        @media (max-width: 880px) {
            .plus-them {
                margin-left: 300px;
            }
        }
    </style>
</head>


 <body>
  <div class="container-fuild py-5" style="margin-top: 0px; margin-bottom: 1px;">
    <div class="row" style="background-color:#ddd; padding: 40px; padding-bottom: 80px;">
    
      <div class="col-md-10 mx-auto">
 
 <form action="<?= route("qlsv_worktask.chonmonhoc") ?>" method="get">
        <div class="col-sm-6">
              <label for="">Tên môn học</label>
              <select class="form-control" name="id" id="monhoc1">
                  @foreach($monhoc as $key=>$mh)
                  <option value={{$key}}> {{$mh}} </option>
                  @endforeach
               </select>
            </div>
			 <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i>Chọn Môn</button>
          <a type="button" href="{{route('qlsv_monhoc.index')}}" class="btn btn-primary px-4 float-right"> Danh sách Môn</a>
    </form>
	</body>
	</div>
    </div>
  </div>
    @endsection
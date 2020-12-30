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
        <form method="post" action="{{route('qlsv_monhoc.store')}}" id="monhoc">
          @csrf
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="">Tên môn học</label>
              <input type="text" class="form-control" id="" name="tenmonhoc" placeholder="nhập tên môn học" />
            </div>
            <div class="col-sm-6">
			
                            <label>ghi chú </label></br>
							<textarea rows="9" cols="40" name="ghichu" form="monhoc" placeholder="nhập ghi chú" > 
							</textarea>
              
            </div>
          </div>
          <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
          <a type="button" href="{{route('qlsv_monhoc.index')}}" class="btn btn-primary px-4 float-right"> Danh sách</a>
        </form>
      </div>
    </div>
	
	
	<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




  </div>
  
  
  
  @endsection
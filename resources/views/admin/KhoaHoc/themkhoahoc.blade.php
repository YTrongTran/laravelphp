@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#ddd;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="<?= route("qlsv_khoahoc.index") ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<div class="container-fluid py-5">
  <div class="row" style="background-color:#ddd; padding: 20px; padding-bottom: 50px;">

    <div class="col-md-10 mx-auto">
      <form method="post" action="{{route('qlsv_khoahoc.store')}}">
        @csrf
        <div class="form-group row">
          <div class="col-sm-6">
            <label for="inputFirstname">Tên khoá học</label>
            <input type="text" class="form-control" id="" name="tenkhoahoc" placeholder="nhập tên khoá học" />
          </div>
          <div class="col-sm-6">
            <label for="inputFirstname">Ghi chú</label>
            <input type="text" class="form-control" id="" name="ghichu" placeholder="nhập ghi chú" />
          </div>
        </div>
        <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
      </form>
    </div>
  </div>
</div>
@endsection
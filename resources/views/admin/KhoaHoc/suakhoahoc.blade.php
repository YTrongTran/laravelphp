@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#f3ecec;padding-top: 2px;">
  <a class="btn btn-primary btn-sm" href="<?= route("qlsv_khoahoc.index") ?>">
    <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<div class="container">
  <form method="post" action="{{ route('qlsv_khoahoc.update',[$khoaHoc->id])}} ">
    @csrf
    <div class="form-group">
      <!-- <label>Id:{{$khoaHoc->id}}</label> -->
      <input class="form-control" type="hidden" name="id" value="{{$khoaHoc->id}}" /><br>
    </div>

    <div class="form-group">
      <label>Tên khoa hoc :</label>
      <input class="form-control" type="text" name="tenkhoahoc" value="{{$khoaHoc->tenkhoahoc}}" /><br>
    </div>

    <div class="form-group">
      <label>Ghi chú:</label>
      <input class="form-control" type="text" name="ghichu" value="{{$khoaHoc->ghichu}}" /><br>
    </div>
    <input class="btn btn-primary" type="submit" value="Sửa" />
  </form>
</div>
</body>
@endsection
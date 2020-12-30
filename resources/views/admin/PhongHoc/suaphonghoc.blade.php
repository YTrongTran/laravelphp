@extends('layouts.trangchu')

@section('content')
  <div class="container"><br>
    <form method="post" action="{{ route('qlsv_phonghoc.update',[$phongHoc->id])}} ">
      @csrf
      <div class="form-group">
        <input class="form-control" type="hidden" name="id" value="{{$phongHoc->id}}" /><br>
      </div>

      <div class="form-group">
        <label>Tên phòng hoc :</label>
        <input class="form-control" type="text" name="tenphonghoc" value="{{$phongHoc->tenphonghoc}}" /><br>
      </div>

      <div class="form-group">
        <label>Ghi chú:</label>
        <input class="form-control" type="text" name="ghichu" value="{{$phongHoc->ghichu}}" /><br>
      </div>
      <input class="btn btn-primary" type="submit" value="Sửa"/>
    </form>
  </div>
@endsection
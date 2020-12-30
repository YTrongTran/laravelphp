@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#ddd;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="<?= route("qlsv_sinhvien.index") ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<body>
    <div class="container-fuild py-5" style="margin-top: 0px; margin-bottom: 1px;">
        <div class="row" style="background-color:#ddd; padding: 40px; padding-bottom: 80px;">
            <div class="col-md-10 mx-auto">
                <form method="post" action="{{ route('qlsv_sinhvien.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control" id="" name="hovaten" placeholder="nhập họ và tên" />
                        </div>
                        <div class="col-sm-6 ">
                            <label for="">Giới tính</label>
                            <select name="gioitinh" class="form-control">
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <option value="3">Khác</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" id="" name="diachi" placeholder="nhập địa chỉ" />
                        </div>
                        <div class="col-sm-6">
                            <label for="">Số điện thoại sinh viên</label>
                            <input type="text" class="form-control" id="" name="sodienthoaisinhvien" placeholder="nhập số điện thoại sinh viên" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Số điện thoại gia đình</label>
                            <input type="text" class="form-control" id="" name="sodienthoaigiadinh" placeholder="nhập số điện thoại gia đình" />
                        </div>
                        <div class="col-sm-6">
                            <label for="">Ghi chú</label>
                            <input type="text" class="form-control" id="" name="ghichu" placeholder="nhập ghi chú" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="" name="email" placeholder="nhập email" />
                        </div>
                        <div class="col-sm-6">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" id="" name="password" placeholder="nhập mật khẩu" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Tên Lớp học</label></label>
                            <select name="id_lophoc" class="form-control">
                                @foreach($lopHoc as $nd => $value)
                                <option value="{{$nd}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm
                        mới</button>
            </div>

        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    @endsection

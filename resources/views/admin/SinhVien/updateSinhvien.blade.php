@extends('layouts.trangchu')

@section('content')
        <div class="container"><br>
            <form method="post" action="{{ route('qlsv_sinhvien.update', [$sinhVien->id]) }} ">
                @csrf
                <div iv class="form-group">

                    <input type="hidden" class="form-control" value="{{ $sinhVien->id }}" name="id">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Họ và Tên:</label>
                    <input type="text" class="form-control" name="hovaten" value="{{ $sinhVien->hovaten }}"
                        placeholder="nhập họ và tên">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" name="diachi" value="{{ $sinhVien->diachi }}"
                        placeholder="nhập địa chỉ">
                </div>
                {{--  --}}

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Giới tính:</label>
                    <select name="gioitinh" class="form-control">
                        <option value="0" {{$sinhVien->gioitinh == 0 ? 'selected' : '' }} name="gioitinh"> Nam
                        </option>
                        <option value="1" {{$sinhVien->gioitinh == 1 ? 'selected' : ''}} name="gioitinh">Nữ</option>
                        <option value="2" {{$sinhVien->gioitinh == 2 ? 'selected' : ''}} name="gioitinh">Khác</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                    <input type="number" class="form-control" value="{{ $sinhVien->sodienthoaisinhvien }}"
                        name="sodienthoaisinhvien" placeholder="nhập số điện thoại sinh viên">
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Số điện thoại gia đình:</label>
                    <input type="text" class="form-control" value="{{ $sinhVien->sodienthoaigiadinh }}"
                        name="sodienthoaigiadinh" placeholder="nhập số điện thoại gia đình">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">ghi chú:</label>
                    <input type="text" class="form-control" value="{{ $sinhVien->ghichu }}" name="ghichu"
                        placeholder="nhập ghi chú">
                </div>
                <div class="form-group">
                    <label for="">Tên lớp học</label></label>
                    <select class="form-control" name="id_lophoc">
                        @foreach($lopHoc as $key=>$n)
                        <option value={{$key}} {{$key==$sinhVien->id_lophoc?"selected":""}}>{{$n}} </option>
                        @endforeach
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" value="Sửa" />
            </form>
        </div>
    </body>
@endsection

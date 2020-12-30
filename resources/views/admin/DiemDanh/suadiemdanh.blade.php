@extends('layouts.trangchu')

@section('content')
<div class="container"><br>
    <form method="post" action="{{ route('qlsv_diemdanh.update',[$diemDanh->id])}} ">
        @csrf
        <div class="form-group">
            <input class="form-control" type="hidden" name="id" value="{{$diemDanh->id}}" /><br>
        </div>

        <div class="form-group">
            <label>Tên sinh viên :</label>
            <select name="id_sinhvien" class="form-control">
                @foreach($sinhVien as $nd => $value)
                <option value="{{$nd}}" {{($nd == $diemDanh->id_sinhvien) ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Ngày học:</label>
            <select name="id_thoikhoabieu" class="form-control">
                @foreach($thoiKhoaBieu as $nd => $value)
                <option value="{{$nd}}" {{($nd == $diemDanh->id_thoikhoabieu) ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Đến lớp:</label>
            <label class="radio-inline"><input type="radio" value="1" {{$diemDanh->denlop == 1 ? 'checked' : ''}} name="denlop">Có</label>
            <label class="radio-inline"><input type="radio" value="2" {{$diemDanh->denlop == 2 ? 'checked' : ''}} name="denlop">Không</label>
        </div>
        <div class="form-group">
            <label>Thực hành:</label>
            <label class="radio-inline"><input type="radio" value="1" {{$diemDanh->thuchanh == 1 ? 'checked' : ''}} name="thuchanh">Có</label>
            <label class="radio-inline"><input type="radio" value="2" {{$diemDanh->thuchanh == 2 ? 'checked' : ''}} name="thuchanh">Không</label>
        </div>
        <div class="form-group">
            <label>Kiến thức:</label>
            <label class="radio-inline"><input type="radio" value="1" {{$diemDanh->kienthuc == 1 ? 'checked' : ''}} name="kienthuc">Có</label>
            <label class="radio-inline"><input type="radio" value="2" {{$diemDanh->kienthuc == 2 ? 'checked' : ''}} name="kienthuc">Không</label>
        </div>
        <div class="form-group">
            <label>Ghi chú </label></br>
            <input type="text" class="form-control" name="ghichu" value="{{$diemDanh->ghichu}}">
        </div>
        <input class="btn btn-primary" type="submit" value="Sửa" />
    </form>
</div>
</body>
@endsection
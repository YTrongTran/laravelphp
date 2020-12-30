@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#ddd;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="<?= route("qlsv_thoikhoabieu.index") ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<div class="container">
    <form method="post" action="{{ route('qlsv_thoikhoabieu.update',[$thoiKhoaBieu->id])}} ">
        @csrf
        <input class="form-control" type="hidden" name="id" value="{{$thoiKhoaBieu->id}}" /><br>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label for="">Buổi thứ</label>
                <input type="number" class="form-control" id="" name="buoithu" value="{{$thoiKhoaBieu->buoithu}}" />
            </div>
            <div class="col-sm-6 col-xs-6">
                <label for="">Ngày học</label>
                <input type="date" class="form-control" id="" name="ngayhoc" value="{{$thoiKhoaBieu->ngayhoc}}" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label>Ca học:</label>
                <label class="radio-inline"><input type="radio" value="1" {{$thoiKhoaBieu->cahoc == 1 ? 'checked' : ''}} name="cahoc">Sáng</label>
                <label class="radio-inline"><input type="radio" value="2" {{$thoiKhoaBieu->cahoc == 2 ? 'checked' : ''}} name="cahoc">Chiều</label>
                <label class="radio-inline"><input type="radio" value="3" {{$thoiKhoaBieu->cahoc == 3 ? 'checked' : ''}} name="cahoc">Tối</label>
                </label>
            </div>
            <div class="col-sm-6 col-xs-6">
                <label for="">Địa điểm học</label>
                <label class="radio-inline"><input type="radio" value="1" {{$thoiKhoaBieu->diadiemhoc == 1 ? 'checked' : ''}} name="diadiemhoc">Trường</label>
                <label class="radio-inline"><input type="radio" value="2" {{$thoiKhoaBieu->diadiemhoc == 2 ? 'checked' : ''}} name="diadiemhoc">Xưởng ô tô</label>
                <label class="radio-inline"><input type="radio" value="3" {{$thoiKhoaBieu->diadiemhoc == 3 ? 'checked' : ''}} name="diadiemhoc">Khác</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label>Giờ vào:</label>
                <input class="form-control" type="time" id="appt" name="giovao" value="{{$thoiKhoaBieu->giovao}}">
            </div>
            <div class="col-sm-6 col-xs-6">
                <label>Giờ bắt đầu:</label>
                <input class="form-control" type="time" id="appt" name="giobatdau" value="{{$thoiKhoaBieu->giobatdau}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label>Đánh giá giờ vào:</label>
                <label class="radio-inline"><input type="radio" value="1" {{$thoiKhoaBieu->danhgiagiovao == 1 ? 'checked' : ''}} name="danhgiagiovao">Đúng</label>
                <label class="radio-inline"><input type="radio" value="2" {{$thoiKhoaBieu->danhgiagiovao == 2 ? 'checked' : ''}} name="danhgiagiovao">Trế</label>
            </div>
            <div class="col-sm-6 col-xs-6">
                <label for="">Lý do giờ vào</label>
                <label class="radio-inline"><input type="radio" value="1" {{$thoiKhoaBieu->lydogiovao == 1 ? 'checked' : ''}} name="lydogiovao">Xong bài</label>
                <label class="radio-inline"><input type="radio" value="2" {{$thoiKhoaBieu->lydogiovao == 2 ? 'checked' : ''}} name="lydogiovao">Lớp đề nghị</label>
                <label class="radio-inline"><input type="radio" value="3" {{$thoiKhoaBieu->lydogiovao == 3 ? 'checked' : ''}} name="lydogiovao">Khác</label>
                </label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label>Giờ ra:</label>
                <input class="form-control" type="time" id="appt" name="giora" value="{{$thoiKhoaBieu->giora}}">
            </div>
            <div class="col-sm-6">
                <label for="">Đánh giá giờ ra</label>
                <label class="radio-inline"><input type="radio" value="1" {{$thoiKhoaBieu->danhgiagiora == 1 ? 'checked' : ''}} name="danhgiagiora">Sớm</label>
                <label class="radio-inline"><input type="radio" value="2" {{$thoiKhoaBieu->danhgiagiora == 2 ? 'checked' : ''}} name="danhgiagiora">Đúng</label>
                <label class="radio-inline"><input type="radio" value="3" {{$thoiKhoaBieu->danhgiagiora == 3 ? 'checked' : ''}} name="danhgiagiora">Trế</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label for="">Lý do giờ ra</label>
                <label class="radio-inline"><input type="radio" value="1" {{$thoiKhoaBieu->lydogiora == 1 ? 'checked' : ''}} name="lydogiora">Xong bài</label>
                <label class="radio-inline"><input type="radio" value="2" {{$thoiKhoaBieu->lydogiora == 2 ? 'checked' : ''}} name="lydogiora">Lớp đề nghị</label>
                <label class="radio-inline"><input type="radio" value="3" {{$thoiKhoaBieu->lydogiora == 3 ? 'checked' : ''}} name="lydogiora">Khác</label>
            </div>
            <div class="col-sm-6 col-xs-6">
                <label for="">Sĩ số</label>
                <input type="number" class="form-control" id="" name="siso" value="{{$thoiKhoaBieu->siso}}" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label for="">Kết quả thực hiện</label>
                <label class="radio-inline"><input type="radio" value="1" {{$thoiKhoaBieu->ketquathuchien == 1 ? 'checked' : ''}} name="ketquathuchien">Thực hiện tốt/hiểu bài</label>
                <label class="radio-inline"><input type="radio" value="2" {{$thoiKhoaBieu->ketquathuchien == 2 ? 'checked' : ''}} name="ketquathuchien">Không làm được/không hiểu</label>
            </div>
            <div class="col-sm-6 col-xs-6">
                <label for="">Lời nhắn Phòng Đào tạo(GV ghi lại tên xe thực hành-NẾU CÓ)</label>
                <input type="text" class="form-control" id="" name="loinhanphongdaotao" value="{{$thoiKhoaBieu->loinhanphongdaotao}}" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label for="">Đánh giá của giảng viên</label></label>
                <input type="text" class="form-control" id="" name="danhgiacuagiangvien" value="{{$thoiKhoaBieu->danhgiacuagiangvien}}" />
            </div>
            <div class="col-sm-6">
                <label for="">Chữ ký của giảng viên</label>
                <input type="text" class="form-control" id="" name="chukicuagiangvien" value="{{$thoiKhoaBieu->chukicuagiangvien}}" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label for="">Lời nhắn của giảng viên</label></label>
                <input type="text" class="form-control" id="" name="loinhancuagiangvien" value="{{$thoiKhoaBieu->loinhancuagiangvien}}" />
            </div>
            <div class="col-sm-6 col-xs-6">
                <label for="">Ghi chú</label></label>
                <input type="text" class="form-control" id="" name="ghichu" value="{{$thoiKhoaBieu->ghichu}}" />
            </div>

        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-xs-6">
                <label for="">Tên worktask</label></label>
                <select class="form-control" name="id_worktask">
                    @foreach($workTask as $key=>$tkb)
                    <option value={{$key}} {{$key==$thoiKhoaBieu->id_worktask?"selected":""}}> {{$tkb}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 col-xs-6">
                <label for="">Tên phòng học</label>
                <select class="form-control" name="id_phonghoc">
                    @foreach($phongHoc as $key=>$ph)
                    <option value={{$key}} {{$key==$thoiKhoaBieu->id_phonghoc?"selected":""}}> {{$ph}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Sửa" />
    </form>
</div>
</body>
@endsection
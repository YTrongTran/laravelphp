@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#f3ecec;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="#" onclick="$('#searcharea').toggle();return false;">
        <i class="glyphicon glyphicon-search"></i></a>
    <a class="btn btn-success btn-sm" href="<?= route("qlsv_giangvien.create") ?>">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>
<div id="searcharea" style="display:none">
    <form action="<?= route("qlsv_giangvien.index") ?>" method="get" class="form-inline pull-">
        <div class="form-group">
            <input style="width: 60%; margin-left: 80px;" id="" class="form-control" type="text" value="{{$search}}"
                name="search" placeholder="Tìm kiếm">
            <button style="margin-left: 160px; margin-top: 5px;" type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
</div>
<form method=get action="<?= route("qlsv_giangvien.index") ?>">
    <table>
        <thead class="andi">
            <tr>
                <th>STT</th>
                <th width=100%>Nội dung</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @if($giangVien->count())
            @foreach($giangVien as $i =>$cl )
            <tr>
                <input type="hidden" class="serdelete_val_id" value="{{$cl->id}}">
                <td>
                    {{$i+1}}
                </td>
                <td width=100%>
                    {{$cl->hovaten}}<br>
                    <i>{{$cl->gioithieu}}</i><br>
                </td>
                <td style="padding-left:0;line-height: 33px;">
                    <a class="btn-default btn-xs" href="edit/{{$cl->id}}">
                        <i class="glyphicon glyphicon-pencil"></i></a>
                    <a class="btn-default btn-xs servicedeletebtn" href="delete/{{$cl->id}}">
                        <i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $giangVien->appends(['sort' => 'id'])->links() }}
    </div>
</form>
<script>
$(document).ready(function() {
    $('.servicedeletebtn').click(async function(e) {
        e.preventDefault();
        var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();
        const isDelete = await swal(_swalConfig.deleteConfirm)
        if (!isDelete) return
        $.ajax(this.href)
            .done((resp) => {
                $(this).closest('tr').remove()
            });
    })
});
</script>

@endsection
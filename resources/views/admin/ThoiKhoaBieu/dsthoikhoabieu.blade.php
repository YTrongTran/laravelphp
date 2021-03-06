@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#f3ecec;padding: 4px;">
    <a class="btn btn-success btn-sm" href="<?= route("qlsv_thoikhoabieu.create") ?>">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>
<form method=get action="<?= route("qlsv_thoikhoabieu.index") ?>">
    <table>
        <thead class="andi">
            <tr>
                <th>STT</th>
                <th width=100%>Nội dung</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @if($thoiKhoaBieu->count())
            @foreach($thoiKhoaBieu as $i =>$cl )
            <tr>
                <td>
                    {{$i+1}}
                </td>
                <td width=100%>
                    {{--<i><?php echo \App\qlsv_worktask::find($cl->id_worktask)->tenworktask ?></i><br>--}}
                    <i>{{$cl->ngayhoc}}</i><br>
                    <i><?php echo \App\qlsv_lophoc::find($cl->id_lophoc)->tenlophoc ?></i><br>
                    <i><?php echo \App\qlsv_phonghoc::find($cl->id_phonghoc)->tenphonghoc ?></i><br>
                    <i>{{$cl->giovao}}</i><br>
                </td>
                <td style="padding-left:0;line-height: 33px;">
                    <a class="btn-default btn-xs" href="edit/{{$cl->id}}">
                        <i class="glyphicon glyphicon-pencil"></i></a>
                    <a class="btn-default btn-xs" href="delete/{{$cl->id}}">
                        <i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <!-- <div class="text-center">
        {{ $thoiKhoaBieu->appends(['sort' => 'id'])->links() }}
    </div> -->
</form>
@endsection
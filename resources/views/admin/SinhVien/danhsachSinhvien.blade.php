@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#f3ecec;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="#" onclick="$('#searcharea').toggle();return false;">
        <i class="glyphicon glyphicon-search"></i></a>
    <a class="btn btn-success btn-sm" href="{{route('qlsv_sinhvien.create')}}">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>
<div id="searcharea" style="display:none">
    <form action="{{route('qlsv_sinhvien.index')}}" method="get" class="form-inline pull-right">

            <div class="form-group">
                <input id="" class="form-control" type="text" value="{{$search ?? '' }}" name="search" placeholder="Tìm kiếm">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        
    </form>
</div>
<form method=get action="{{route('qlsv_sinhvien.index')}}">
    <table>
    <thead class="andi">
            <tr>
                <th>STT</th>
                <th width=100%>Nội dung</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @if($sinhVien->count())
            @foreach($sinhVien as $i =>$cl )
            <tr>
                <td>
                    {{$i+1}}
                </td>
                <td width=100%>
                    {{$cl->hovaten}}<br>
                    <i>{{$cl->sodienthoaisinhvien}}</i><br>
                    <i><?php echo \App\qlsv_lophoc::find($cl->id_lophoc)->tenlophoc?></i><br>
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
    <div class="text-center">
        {{ $sinhVien->appends(['sort' => 'id'])->links() }}
    </div>
</form>


@endsection
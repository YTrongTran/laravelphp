@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;background-color:#f3ecec;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="#" onclick="$('#searcharea').toggle();return false;">
        <i class="glyphicon glyphicon-search"></i></a>

    <a class="btn btn-success btn-sm" href="{{route('qlsv_worktask.create')}}">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>
<div id="searcharea" style="display:none">
    <form action="<?= route("qlsv_worktask.search") ?>" method="get" class="form-inline pull-right">
        <div class="form-group">
            <input id="" class="form-control" type="text" value="" name="tenworktask" placeholder="Tìm kiếm">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên worktask</th>
            <th>Tên môn học</th>
            <th>Thứ tự</th>
            <th>Tên worktask chi tiết</th>
        </tr>
    </thead>
    <tbody>
        @if($worktask->count())
        @foreach($worktask as $i =>$wt )
        <tr>
            <td>
                {{$i+1}}
            </td>
            <td>
                {{$wt->tenworktask}}


            </td>
            @foreach($monhoc as $key=>$mh)
            @if($key==$wt->id_monhoc)
            <td>{{$mh}}</td>
            @endif
            @endforeach
            <td>{{$wt->thutu}}</td>
            <td style="padding-left:0;line-height: 33px;">
                <a class="btn-default btn-xs" href="{{route('qlsv_worktask.edit',$wt->id)}}"">
                        <i class=" glyphicon glyphicon-pencil"></i></a>
                <a class="btn-default btn-xs" href="{{route('qlsv_worktask.destroy',$wt->id)}}">
                    <i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>

        @endforeach
        @endif
    </tbody>
</table>






<div class="text-center">
    {{ $worktask->appends(['sort' => 'id'])->links() }}
</div>


<script>
/*  $(function(e) {
        $("#chkCheckAll").click(function() {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
    });*/
</script>

<script type="text/javascript">
/*  $(document).ready(function() {


        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });


            if (allVals.length <= 0) {
                alert("Vui lòng chọn hàng");
            } else {


                var check = confirm("Bạn có chắc chắn muốn xóa hàng này không ? ");
                if (check == true) {


                    var join_selected_values = allVals.join(",");


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Rất tiếc, đã xảy ra lỗi !!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });


                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function(event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function(e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Rất tiếc, đã xảy ra lỗi !!');
                    }
                },
                error: function(data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });*/
</script>
@endsection
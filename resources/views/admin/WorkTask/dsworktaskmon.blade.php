@extends('layouts.trangchu')

@section('content')
<head>
 
  <style>
        @media (max-width: 880px) {
            .plus-them {
                margin-left: 300px;
            }
        }
    </style>
</head>

<body>
<div class="container-fuild py-5" style="margin-top: 0px; margin-bottom: 1px;">
    <div class="row" style="background-color:#ddd; padding: 40px; padding-bottom: 80px;">
    
      <div class="col-md-10 mx-auto">
         <table class="table">
          @csrf
            <tr>Tên môn học </tr>
          <tr> 
		  <td>{{$monhoc->tenmonhoc}}</td>
		  </tr>
		   </table>
		    <table class="table">
                          @if($worktask->count())
            @foreach($worktask as $i =>$wt )
                       
                      
                            <tr><?php static $k=0;$k=$k+1; echo "Task : ".$k; ?> </tr>
							 <tr> 
                          <td>{{$wt}}</td>
						   </tr> 
                     
                        
                      </table>
                       
					   
					   <table class="table">
   @csrf
		
							<thead>
                     <tr>
                    
                  <th>Tên công việc</th>
                      
                         </tr>
                     </thead>
					 <tbody>
					 @foreach($worktaskdetail as $j =>$wtl)
					 @if($wtl->id_worktask==$i)
                        <tr>
	                    
                     <td > 
					  {{$wtl->ten}}
                        </td>
						</tr>
						
						
						@endif
						@endforeach 
						
						
						
						
						
						</tbody>
						</table>
					  @endforeach
					   @endif
                        @csrf
                        
			
			
			
          </div>
         
          <a type="button" href="{{route('qlsv_worktask.index')}}" class="btn btn-primary px-4 float-right"> Danh sách worktask</a>
       
      </div>
    </div>
  </div>

    
	
	
	
	 
	 
	 
    </body>


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
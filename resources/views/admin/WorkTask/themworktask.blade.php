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
                <form method="post" action="{{route('qlsv_worktask.store')}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="">Tên worktask</label>
                            <input type="text" class="form-control" id="" name="tenworktask"
                                placeholder="nhập tên worktask" />
                        </div>
                        <div class="col-sm-6">
                            <label for="">Tên môn học</label>
                            <select class="form-control" name="id_monhoc" id="monhoc1">
                                @foreach($monhoc as $key=>$mh)
                                <option value={{$key}}> {{$mh}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Thứ tự worktask</label>
                            <input type="number" class="form-control" value={{$worktask}} id="thutu" name="thutu"
                                placeholder="nhập thứ tự worktask" />
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên công việc</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <input type="text" class="form-control" name="ten[]" value=""
                                            placeholder="Enter tên worktaskdetail">
                                    <td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>


                                        <input type="text" class="form-control" name="ten[]" value=""
                                            placeholder="Enter tên worktaskdetail">

                                    <td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>


                                        <input type="text" class="form-control" name="ten[]" value=""
                                            placeholder="Enter tên worktaskdetail">

                                    <td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>


                                        <input type="text" class="form-control" name="ten[]" value=""
                                            placeholder="Enter tên worktaskdetail">

                                    <td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>


                                        <input type="text" class="form-control" name="ten[]" value=""
                                            placeholder="Enter tên worktaskdetail">

                                    <td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>


                                        <input type="text" class="form-control" name="ten[]" value=""
                                            placeholder="Enter tên worktaskdetail">

                                    <td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>


                                        <input type="text" class="form-control" name="ten[]" value=""
                                            placeholder="Enter tên worktaskdetail">

                                    <td>
                                </tr>

                            </tbody>
                        </table>




                    </div>
                    <button type="submit" class="btn btn-success px-4 float-right"><i
                            class="glyphicon glyphicon-plus"></i> Thêm mới</button>
                    <a type="button" href="{{route('qlsv_worktask.chonmon')}}" class="btn btn-primary px-4 float-right">
                        Danh sách</a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#monhoc1").change(function(e) {
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            // var name = $("input[name='id_monhoc']").value;
            var name = document.getElementById("monhoc1").value;


            $.ajax({
                url: "{{ url('/worktask/show') }}",
                type: 'GET',
                data: {
                    _token: _token,
                    name: name
                },
                success: function(data) {

                    // alert(data.success);
                    document.getElementById("thutu").value = data.success;

                }
            });


        });
    });
    </script>
    @endsection
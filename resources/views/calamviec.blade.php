@extends('default')
@section('title','Ca làm việc')
@section('content')
<div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
        <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Ca làm việc</h4>
        <div class="mg-r-10">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class='fas fa-plus' style='font-size:15px;'></i>
                Thêm mới
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width:none;width:50em;vertical-align: top;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm mới ca làm việc</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" id="caLamViec" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Tên ca làm việc <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="tx-gray-800 tx-bold pt-3">Thời gian bắt đầu <span
                                                class="text-danger">*</span></label>
                                        <input type="time" name="start_time" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="tx-gray-800 tx-bold pt-3">Thời gian kết thúc <span
                                                class="text-danger">*</span></label>
                                        <input type="time" name="end_time" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold pt-3">Ghi chú</label>
                                        <textarea name="note" cols="30" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"></em>
                                    Lưu và thêm mới</button>
                                <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"></em>
                                    Lưu và đóng</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                        class="fa fa-close"></em> Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal chi tiết-->
            <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Ca làm việc</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="#" id="suaCalamViec" name="suaCalamViec" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="id" id="id">
                                        <label for="" class="tx-gray-800 tx-bold">Tên ca làm việc</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="tx-gray-800 tx-bold pt-3">Thời gian bắt đầu</label>
                                        <input type="time" name="start_time" class="form-control" id="start_time">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="tx-gray-800 tx-bold pt-3">Thời gian kết thúc</label>
                                        <input type="time" name="end_time" id="end_time" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold pt-3">Ghi chú</label>
                                        <textarea name="note" cols="30" rows="2" id="note"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                        class="fa fa-close"></em> Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
            <div class="row tx-gray-900">
                <div class="col-md-2 col-lg-2">
                    <label for="">Trạng thái</label>
                    <select name="" id="searchByStatus" class="form-control">
                        <option value="Hoạt động">Hoạt động</option>
                        <option value="Ngừng h.động">Ngừng hoạt động</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="">Từ khoá tìm kiếm</label>
                    <input id="searchBySupplier" type="text" class="form-control"
                        placeholder="Tìm kiếm theo tên ca làm việc">
                </div>
                <div class="col-md-2 align-self-end">
                    <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i class="fas fa-search"
                            style="padding: 3px"></i>Tìm kiếm</button>
                </div>
            </div>

            <div class="mg-t-20">
                <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary" style="color: white;width: 5%;">#</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 20%;">Tên ca làm việc</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 20%;">Thời gian</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 30%;">Ghi chú</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 12%;">Trạng thái</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 11%;"></th>
                        </tr>
                    </thead>
                    <tbody id="searchData"></tbody>
                </table>
            </div>
        </div><!-- row -->
    </div><!-- br-pagebody -->
</div>
<script>
    // Datepicker
      $(document).ready(function(){
        $(function(){
          let caLamViec = $("#caLamViec");
          if(caLamViec.length){
            caLamViec.validate({
              rules:{
                name: {
                  required: true
                },
                start_time: {
                  required: true
                },
                end_time: {
                  required: true
                }
              },
              messages:{
                name: {
                  required: 'Vui lòng nhập tên ca làm việc'
                },
                start_time: {
                  required: 'Vui lòng nhập trời gian bắt đầu'
                },
                end_time: {
                  required: 'Vui lòng nhập trời gian kết thúc'
                },
              },
              submitHandler: function(form) {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                $("#submit"). attr("disabled", true);
                $.ajax({
                  url: "{{ url('calamviec') }}",
                  type: "POST",
                  data: $('#caLamViec').serialize(),
                  success: function( response ) {
                    $('#submit').html('Lưu và thêm mới');
                    $('#data-table1').DataTable().ajax.reload();
                    $("#submit"). attr("disabled", false);
                    $("#submit").load(
                      $.toast({
                        text : "Thêm mới ca làm việc thành công",
                        position: "bottom-right",
                        icon:"success",
                        stack:1,
                        loader:false
                      }));
                    document.getElementById("caLamViec").reset();
                  }
                });
              }
            })
          }
        })
        $('.btn-work').on('click', function(){
          Swal.fire({
            title: 'Cảnh báo!',
            text: "Bạn chắc chắn muốn ngừng hoạt động ca làm việc này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý!'
          }).then((result) => {
            if (result.value) {
              var url = $(this).attr('href');
              window.location.href = url;
            }
          })
          return false;
        });

        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#searchData tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
          console.log('#myInput')
        });
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });
      });
      function searchDateTable(){
        $.fn.dataTable.ext.search.push(
		function (settings, data, dataIndex){
			if ( settings.nTable.id !== 'data-table1' ) {
				return true;
			}
			var supplierName = $("#searchBySupplier").val().toLowerCase();
			return (
				(~data[1].toLowerCase().indexOf(supplierName)) ||
				(~data[3].toLowerCase().indexOf(supplierName))
				) ? true : false;
		}
		);
        $('#data-table1').DataTable()
          .columns(4).search($("#searchByStatus").val())
          .draw();

    };
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var table1 = $('#data-table1').DataTable({
        processing: true,
        ordering: false,
        "language": {
        "processing": "Đang xử lý...",
        "sLengthMenu": " _MENU_ Bản ghi hiển thị",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
        "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
        "infoFiltered": "",
        "emptyTable": "Không có dữ liệu",
        "loadingRecords": "Đang tải...",
        "paginate": {
          "first": "Đầu tiên",
          "last": "Cuối cùng",
          "next": "Sau",
          "previous": "Trước"
        },
        },

        ajax: {
                    url: "{{ url('calamviec') }}",
                    // data: function(d) {
                    //     d.status = $('#searchByStatus').val()
                    //         d.search = $('input[type="search"]').val()
                    // }
                },
        columns: [
        { data: 'id', name: 'id'},
        { data: 'name', name: 'name' },
        { data: null,
            "render": function(data,type,row) {
                return data['start_time'] +'<span> - </span>'+data['end_time']
            }
        },
        { data: 'note', name: 'note' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action'},
        ]
      });
      searchDateTable();

    })
     $('#suaCalamViec').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        type:'POST',
        url: "{{ url('calamviec')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          $('#data-table1').DataTable().ajax.reload();
          $("#chiTiet").modal('hide');
          $("#chiTiet").load(
            $.toast({
              text : "Lưu dữ liệu thành công",
              position: "bottom-right",
              icon:"success",
              stack:1,
              loader:false
            }));
          var oTable = $('#data-table1').dataTable();
          oTable.fnDraw(false);
        },
        error: function(data){
          console.log(data);
        }
      });
    });
     function deleteFunc(id){
      Swal.fire({
        title: 'Cảnh báo!',
        text: "Bạn chắc chắn muốn xóa này?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type:"DELETE",
            url: "{{ url('calamviec/{id}') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $("#delete1").modal('hide');
              $('#data-table1').DataTable().ajax.reload();
              $("#delete1").load(
                $.toast({
                  text : "Xóa dữ liệu thành công",
                  position: "bottom-right",
                  icon:"success",
                  stack:1,
                  loader:false
                }));
              var oTable = $('#data-table1').dataTable();
              oTable.fnDraw(false);
            }
          });
        } else {
          swal("Cancelled Successfully");
          return false;
        }
      });
    }

    function editF(id){
      $.ajax({
        type:"GET",
        url: "{{ url('calamviec/{id}/edit') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#id').val(res.id)
          $('#name').val(res.name);
          $('#start_time').val(res.start_time);
          $('#end_time').val(res.end_time);
          $('#note').val(res.note);
        }
      });
    }
    function changeFunc(id){
      Swal.fire({
        title: 'Cảnh báo!',
        text: "Bạn chắc chắn muốn ngừng hoạt động ca làm việc này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type:"POST",
            url: "{{ url('calamviec/active') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#changeF').modal('hide');
              $('#data-table1').DataTable().ajax.reload();
              $('#changeF').load(
                $.toast({
                  text : "Dữ liệu đã ngừng hoạt động",
                  position: "bottom-right",
                  icon:"success",
                  stack:1,
                  loader:false
                }));
              var oTable = $('#data-table1').dataTable();
              oTable.fnDraw(false);
            }
          });
        } else {
          swal("Cancelled Successfully");
          return false;
        }
      });
    }

    function unChangeFunc(id){
      Swal.fire({
        title: 'Cảnh báo!',
        text: "Bạn chắc chắn muốn kích hoạt động ca làm việc này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type:"POST",
            url: "{{ url('calamviec/unactive') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#changeF').modal('hide');
              $('#data-table1').DataTable().ajax.reload();
              $('#changeF').load(
                $.toast({
                  text : "Dữ liệu đã kích hoạt thành công",
                  position: "bottom-right",
                  icon:"success",
                  stack:1,
                  loader:false
                }));
              var oTable = $('#data-table1').dataTable();
              oTable.fnDraw(false);
            }
          });
        } else {
          swal("Cancelled Successfully");
          return false;
        }
      });
    }
</script>
@endsection

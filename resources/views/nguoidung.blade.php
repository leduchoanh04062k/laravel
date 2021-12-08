@extends('default')
@section('title','Người dùng')
@section('content')
<div class="br-mainpanel">
  <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
    <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Người dùng</h4>
    <div class="d-flex">
      <div class="mg-r-10">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          <em class="fa fa-plus"></em> Tạo mới người dùng
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document" style="max-width:none;width:50em;vertical-align: top;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title tx-gray-900" id="">Tạo mới người dùng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" id="addCustomer" method="POST" autocomplete="off" >
                @csrf
                <div class="modal-body">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#nguoiDungNew">Thông tin người dùng</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#vaiTroNew">Vai trò <span class="badge rounded-pill bg-warning" style="font-size: 90%"><div aria-live="polite">1</div></span></a>
                    </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="nguoiDungNew" class="tab-pane active">
                      <div class="row">
                        <div class="col-md-12 pd-t-8">
                          <label for="" class="tx-gray-800 tx-bold">Trực thuộc nhà thuốc <span class="text-danger">(*)</span></label>
                          <input type="text" placeholder="Nhà thuốc Dược Thiện" disabled="disabled" class="form-control">
                        </div>
                      </div>
                      <div class="row mg-t-10" >
                        <div class="col-md-12">
                          <label for="" class="tx-gray-800 tx-bold">Tên đăng nhập <span class="text-danger">(*)</span></label>
                          <input type="text" id="taoTenDangNhap" autocomplete="nope" name="username" placeholder="Nhập tên đăng nhập" class="form-control">
                        </div>
                      </div>
                      <div class="row mg-t-10" >
                        <div class="col-md-12">
                          <label for="" class="tx-gray-800 tx-bold">Gói dịch vụ</label>
                          <select name="" id="" class="form-control select2" style="width:100%">
                            <option value="">Gói cước 12 tháng(2 account)</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mg-t-10" >
                        <div class="col-md-12">
                          <label for="" class="tx-gray-800 tx-bold">Ngày hết hạn</label>
                          <input type="text" placeholder="09/03/2022" class="form-control">
                        </div>
                      </div>
                      <div class="row mg-t-10" >
                        <div class="col-md-6">
                          <label for="" class="tx-gray-800 tx-bold">Họ <span class="text-danger">(*)</span></label>
                          <input type="text" name="surname" class="form-control">
                        </div>
                        <div class="col-md-6">
                          <label for="" class="tx-gray-800 tx-bold">Tên <span class="text-danger">(*)</span></label>
                          <input type="text" name="name" class="form-control">
                        </div>
                      </div>
                      <div class="row mg-t-10" >
                        <div class="col-md-12">
                          <label for="" class="tx-gray-800 tx-bold">Email <span class="text-danger">(*)</span></label>
                          <input type="email" name="email" class="form-control">
                        </div>
                      </div>
                      <div class="row mg-t-10" >
                        <div class="col-md-6">
                          <label for="" class="tx-gray-800 tx-bold">Mật khẩu <span class="text-danger">(*)</span></label>
                          <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                          <label for="" class="tx-gray-800 tx-bold">Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
                          <input type="password" name="confirm_password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div id="vaiTroNew" class="tab-pane fade tx-gray-800"><br>
                      <div id="jstreeMeo">
                        <ul>
                          <li data-value="1">Admin</li>
                          <li data-value="2">Quản lý</li>
                          <li data-value="3">Bán hàng</li>
                          <li data-value="4">Kho</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Lưu và thêm mới</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      <div>
        <button class="btn btn-info"><em class="far fa-file-excel"></em> Xuất file excel</button>
      </div>
    </div>
  </div>
  <div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="shadow-base bg-white pd-15">
      <div class="row tx-gray-900">
        <div class="col-md-10">
          <label>Từ khoá tìm kiếm</label>
          <input type="text" class="form-control" id="searchData" placeholder="Tìm kiếm theo tên tài khoản">
        </div>
        <div class="col-md-1 align-self-end">
          <button class="btn btn-info" id="searchButton"><em class="fa fa-search"></em> Tìm kiếm</button>
        </div>
      </div>

      <div class="mg-t-20">
        <label for="" id="info-data-table" class="tx-bold tx-gray-800"></label>
        <table id="data-table" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
          <thead>
            <tr>
              <th scope="col" class="bg-primary" style="color: white;">#</th>
              <th scope="col" class="bg-primary" style="color: white;">Tên đăng nhập</th>
              <th scope="col" class="bg-primary" style="color: white;">Vai trò</th>
              <th scope="col" class="bg-primary" style="color: white;">Gói cước</th>
              <th scope="col" class="bg-primary" style="color: white;">Ngày hết hạn</th>
              <th scope="col" class="bg-primary" style="color: white;">Lần cuối đăng nhập</th>
              <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
              <th scope="col" class="bg-primary" style="color: white;">Thao tác</th>
            </tr>
          </thead>
        </table>
      </div>
    </div><!-- row -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<div>
  <!-- Modal chi tiết-->
  <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title tx-gray-900" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#nguoiDung">Thông tin người dùng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#vaiTro">Vai trò <span class="badge rounded-pill bg-warning" style="font-size: 90%"><div aria-live="polite">1</div></span></a>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div id="nguoiDung" class="tab-pane active">
              <div class="row">
                <div class="col-md-12 pd-t-8">
                  <label for="" class="tx-gray-800 tx-bold">Trực thuộc nhà thuốc <span class="text-danger">(*)</span></label>
                  <input type="text" placeholder="Nhà thuốc Moriphar" disabled="disabled" class="form-control">
                </div>
              </div>
              <div class="row mg-t-10" >
                <div class="col-md-12">
                  <label for="" class="tx-gray-800 tx-bold">Tên đăng nhập <span class="text-danger">(*)</span></label>
                  <input type="text" id="username" disabled="disabled" class="form-control">
                </div>
              </div>
              <div class="row mg-t-10" >
                <div class="col-md-12">
                  <label for="" class="tx-gray-800 tx-bold">Gói dịch vụ</label>
                  <select name="" id="" class="form-control select2" style="width:100%">
                    <option value="">Gói cước 12 tháng(2 account)</option>
                  </select>
                </div>
              </div>
              <div class="row mg-t-10" >
                <div class="col-md-12">
                  <label for="" class="tx-gray-800 tx-bold">Ngày hết hạn</label>
                  <input type="text" placeholder="09/03/2022" disabled class="form-control">
                </div>
              </div>
              <div class="row mg-t-10" >
                <div class="col-md-6">
                  <label for="" class="tx-gray-800 tx-bold">Họ <span class="text-danger">(*)</span></label>
                  <input type="text" id="surname" name="surname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label for="" class="tx-gray-800 tx-bold">Tên <span class="text-danger">(*)</span></label>
                  <input type="text" id="name" name="name" class="form-control">
                  <input type="hidden" id="id">
                  <input type="hidden" id="idAdmin">
                </div>
              </div>
              <div class="row mg-t-10" >
                <div class="col-md-12">
                  <label for="" class="tx-gray-800 tx-bold">Email <span class="text-danger">(*)</span></label>
                  <input type="email" id="email" name="email" class="form-control">
                </div>
              </div>
            </div>
            <div id="vaiTro" class="tab-pane fade"><br>
              <div id="jstree">
                <ul>
                  <li data-value="1">Admin</li>
                  <li data-value="2">Quản lý</li>
                  <li data-value="3">Bán hàng</li>
                  <li data-value="4">Kho</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="luuThongTin"><em class="fa fa-save"></em> Lưu</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em> Đóng</button>
        </div>

      </div>
    </div>
  </div>
  <div class="modal fade" id="doiMatKhauAction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width:50%;vertical-align:top;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title tx-gray-900" id="doiMatKhauLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body" style="padding-bottom:5px;padding-top:7px;">
          <div class="row">
            <div class="col-sm-12">
              <label class="text-bold">Tên Đăng Nhập <span class="text-danger">(*)</span></label>
              <input type="text" id="tenDangNhap" disabled="" class="form-control" >
              <input type="hidden" id="idDoiMatKhau">
            </div>
          </div>
          <div class="row pd-t-8 pd-b-10">
            <div class="col-sm-6">
              <label class="text-bold">Mật khẩu mới <span class="text-danger">(*)</span></label>
              <input type="password" id="matKhauMoi" class="form-control" >
            </div>
            <div class="col-sm-6">
              <label class="text-bold">Nhập Lại Mật Khẩu <span class="text-danger">(*)</span></label>
              <input type="password" id="nhapLaiMatKhau" name="" class="form-control" >
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-close"></i> Huỷ</button>
            <button type="button" class="btn btn-primary" id="doiMatKhauButton"><i class="fa fa-save"></i> Lưu</button>
          </div>

        </div>
      </div>
    </div>
  </div>
  <style type="text/css">
    input[type='checkbox'] {
      font-size: 1.33333333em;
      line-height: .75em;
      vertical-align: -15%;
      cursor: pointer;
      vertical-align: middle!important;
      text-align: center!important;
    }
    input[disabled]{
      cursor: not-allowed;
    }
  </style>
  <!-- ########## END: MAIN PANEL ########## -->
  <script>
    function editFunc(id, check){
     $.ajax({
      type:"GET",
      url: "{{ url('nguoidung/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        if(check==0){
          $("#jstree").jstree(true).uncheck_all();
          $('#exampleModalLabel').text("Thông Tin Người Dùng: "+res[0].username);
          $('#username').val(res[0].username);
          $('#name').val(res[0].name);
          $('#surname').val(res[0].surname);
          $('#email').val(res[0].email);
          $('#id').val(res[0].id);
          $('#idAdmin').val(res[1]);
          $('#jstree').jstree(true)
          .select_node('j1_'+parseInt(res[0].roleId));
        }else{
          $('#tenDangNhap').val(res[0].username);
          $('#idDoiMatKhau').val(res[0].id);
          $('#doiMatKhauLabel').text("Đổi Mật Khẩu Người Dùng: "+res[0].username);
        }
      }
    });
   }

   function khoaTaiKhoan(id, check){
    if(check){
      Swal.fire({
        title: "Hệ thống sẽ khoá tài khoản này, Bạn muốn tiếp tục?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!',
        cancelButtonText: 'Không'
      }).then((result) => {
        if (result.value) {
         $.ajax({
          type:"PUT",
          url: "{{ url('nguoidung/khoataikhoan') }}",
          data: { id: id },
          success: function(suc){
            console.log(suc);
            if(suc){
              toastr.success('Khoá tài khoản thành công', {timeOut:2400});
              $('#data-table').DataTable().ajax.reload();
            }
          }
        });
       } else {
        swal("Cancelled Successfully");
      }
    });
    }else{
      Swal.fire({
        title: "Hệ thống sẽ mở khoá tài khoản này, Bạn muốn tiếp tục?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!',
        cancelButtonText: 'Không'
      }).then((result) => {
        if (result.value) {
         $.ajax({
          type:"PUT",
          url: "{{ url('nguoidung/mokhoataikhoan') }}",
          data: { id: id },
          success: function(suc){
            console.log(suc);
            if(suc){
              toastr.success('Khoá tài khoản thành công', {timeOut:2400});
              $('#data-table').DataTable().ajax.reload();
            }
          }
        });
       } else {
        swal("Cancelled Successfully");
      }
    });
    }
  }

  function deleteFunc(id){
    Swal.fire({
      title: "Hệ thống sẽ xoá khoá tài khoản này, Bạn muốn tiếp tục?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý!',
      cancelButtonText: 'Không'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:"DELETE",
          url: "{{ url('nguoidung') }}",
          data: { id: id },
          dataType: 'json',
          success: function(success){
            console.log(success);
            if(success){
              toastr.success('Xoá tài khoản thành công', {timeOut:2400});
              $('#data-table').DataTable().ajax.reload();
            }
          }
        });
      } else {
        swal("Cancelled Successfully");
      }
    });
  }

  $(document).ready(function(){
    setTimeout(function(){
      $('#taoTenDangNhap').val('');
      $('#searchData').val('');
      $('#password').val('');
      $('#matKhauMoi').val('');
    },1200);

    $('#doiMatKhauButton').click(function(){
      if($('#matKhauMoi').val()!=$('#nhapLaiMatKhau').val()){
        toastr.error('Mật khẩu lặp lại chưa đúng', {timeOut:2400});
      }else{
        $.ajax({
          type: "POST",
          url: "{{ url('nguoidung/doimatkhau') }}",
          data: {newPassword:$('#matKhauMoi').val(),id:$('#idDoiMatKhau').val()},
          success: function(response){
            $('#doiMatKhauAction').modal('toggle');
            toastr.success('Đổi mật khẩu cho tài khoản '+$('#tenDangNhap').val()+' thành công', {timeOut:2400});
          }
        })
      }
    })

    $('#exampleModal').on('shown.bs.modal', function () {
      $('#jstreeMeo').jstree(true)
      .select_node('j2_2');
    })

    $('#luuThongTin').click(function(){
      let roleId = $('#jstree').jstree("get_selected", true);

      if(roleId==''){
        toastr.error('Vai trò không được để trống', {timeOut:2400});
      }else if($('#id').val()==$('#idAdmin').val() && roleId[0].text != 'Admin'){
        toastr.error('Không được gán vai trò khác cho tài khoản quản trị', {timeOut:2400});
      }else if($('#surname').val()==''){
        $('#surname').focus();
        toastr.error('Họ không được để trống', {timeOut:2400});
      }else if($('#name').val()==''){
        $('#name').focus();
        toastr.error('Tên không được để trống', {timeOut:2400});
      }else if($('#email').val()==''){
        $('#email').focus();
        toastr.error('Email không được để trống', {timeOut:2400});
      }else{
        $.ajax({
          type: "PUT",
          url: "{{ url('nguoidung') }}",
          data: {model_id:$('#id').val(),role_id:roleId[0].data.value,email:$('#email').val(),surname:$('#surname').val(),name:$('#name').val()},
          success: function(res){
            if(res){
              $('#chiTiet').modal('toggle');
              /*location.reload();*/
              toastr.success('Thay đổi quyền cho tài khoản '+$('#username').val()+' thành công', {timeOut:2400});
            }
          }
        })
      }
    })

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var table = $('#data-table').DataTable({
      processing: true,
      responsive: true,
      "ordering": false,
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
        url: "{{ url('nguoidung') }}",
      },
      columns: [
      { data: 'id', name: 'id'},
      { data: 'username', name: 'username'},
      { data: null,
        "render": function(data,type,row){
          if(data['roleName']=='Admin'){
            return 'Admin'
          }
          if(data['roleName']=='Management'){
            return 'Quản lý'
          }
          if(data['roleName']=='Seller'){
            return 'Bán hàng'
          }
          if(data['roleName']=='Warehouse'){
            return 'Kho'
          }
        }

      },
      { data: 'id', name: 'id'},
      { data: null,
        "render": function(data,type,row){
          return "2021-12-31"
        }
      },
      { data: 'last_login_at', name: 'last_login_at'},
      { data: 'status', name: 'status'},
      { data: 'action', name: 'action'}
      ]
    });
    table.on('order.dt search.dt', function () {
      table.column(0).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
      });
    }).draw();

    $('#searchButton').click(function(){
     table
     .columns(1)
     .search($('#searchData').val().toLowerCase())
     .draw();
   })

    $(function(){
      let addCustomer = $("#addCustomer");
      if (addCustomer.length) {
        addCustomer.validate({
          rules:{
            username:{
              required:true,
              minlength:5,
            },
            password:{
              required:true,
              minlength:6
            },
            confirm_password:{
              required:true,
              equalTo: "#password",
              minlength:6
            },
            surname:"required",
            name:"required",
            email:{
              required:true,
              email:true
            }
          },
          messages:{
            username:{
              required:"Vui lòng điền đầy đủ thông tin",
              minlength:"Vui lòng nhập trên 4 kí tự"
            },
            password:{
              required:"Vui lòng điền đầy đủ thông tin",
              minlength:"Vui lòng nhập trên 5 kí tự"
            },
            confirm_password:{
              required:"Vui lòng điền đầy đủ thông tin",
              equalTo: 'Mật khẩu không trùng khớp',
              minlength:"Vui lòng nhập trên 5 kí tự"
            },
            surname:"Vui lòng điền đầy đủ thông tin",
            name:"Vui lòng điền đầy đủ thông tin",
            email:{
              required:"Vui lòng điền đầy đủ thông tin",
              email:"Email của bạn chưa đúng định dạng"
            }
          },
          submitHandler: function(form) {
            let roleAddNew = $('#jstreeMeo').jstree("get_selected", true);
            if(roleAddNew==''){
              toastr.error('Vai trò không được để trống', {timeOut:2400});
            }else{
              $.ajax({
                type: "POST",
                url: "{{ url('nguoidung') }}",
                data: addCustomer.serialize()+'&role_id='+roleAddNew[0].data.value,
                success: function( response ) {
                  console.log(response);
                  if(response){
                    toastr.info('Thêm mới người dùng thành công', {timeOut:2400});
                    table.ajax.reload();
                    $('#exampleModal').modal('toggle');
                  }
                },
                error: function(err){
                  console.log(err.responseJSON.messages);
                  if(err){
                    $('#taoTenDangNhap').focus();
                    toastr.error('Tên đăng nhập đã được sử dụng ', {timeOut:2400});
                  }
                }
              });
            }
          }
        })
      }
    })
    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });

    $('#jstree').jstree({
      "checkbox" : {
        "keep_selected_style" : false
      },
      "plugins" : [ "checkbox", "wholerow" ],
      core: {
        multiple: false
      }
    }
    ).on('ready.jstree', function(){ $(this).jstree('open_all') });

    $('#jstreeMeo').jstree({
      "checkbox" : {
        "keep_selected_style" : false
      },
      "plugins" : [ "checkbox", "wholerow" ],
      core: {
        multiple: false,
      }
    }
    ).on('ready.jstree', function(){ $(this).jstree('open_all') });

  });

</script>
@endsection

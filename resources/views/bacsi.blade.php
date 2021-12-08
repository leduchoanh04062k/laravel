@extends('default')
@section('title','Bác sỹ')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between" style="flex-wrap:wrap;">
        <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Bác sỹ</h4>
        <div class="d-flex" style="flex-wrap:wrap;">
            <div class="mg-r-10">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class='fas fa-plus' style='font-size:15px;'></i>
                    Thêm mới
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:80%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm mới bác sỹ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" id="thongTinBacSi" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active tx-gray-800" data-toggle="tab" href="#info">Thông
                                                tin bác sỹ</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="info">
                                            <div class="row mg-t-10">
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Mã bác sỹ</label>
                                                    <input type="text" class="form-control" placeholder="Mã tự động"
                                                        name="id">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Tên bác sỹ <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="tx-gray-800 tx-bold">Nơi công tác <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="workplace" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mg-t-10">
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Chuyên khoa</label>
                                                    <input type="text" class="form-control" list="chuyenKhoa"
                                                        name="specialist">
                                                    <datalist id="chuyenKhoa">
                                                        <option value="Chấn thương chỉnh hình">Chấn thương chỉnh hình
                                                        </option>
                                                        <option value="Cơ khớp xương">Cơ khớp xương</option>
                                                        <option value="Da liễu">Da liễu</option>
                                                    </datalist>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Trình độ</label>
                                                    <input type="text" class="form-control" list="trinhDo"
                                                        name="standard">
                                                    <datalist id="trinhDo">
                                                        <option value="Bác sỹ">Bác sỹ</option>
                                                        <option value="Giáo sư">Giáo sư</option>
                                                        <option value="Thạc sỹ">Thạc sỹ</option>
                                                    </datalist>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                                    <input type="text" class="form-control" name="phone">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Email</label>
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                            </div>
                                            <div class="row mg-t-10">
                                                <div class="col-md-12">
                                                    <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="address">
                                                </div>
                                            </div>
                                            <div class="row mg-t-10">
                                                <div class="col-md-12">
                                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                                    <textarea name="note" id="note" cols="30" rows="1"
                                                        class="form-control" name="note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="submit"><em
                                            class="fa fa-save"></em> Lưu và thêm mới</button>
                                    <button type="submit" class="btn btn-primary" id="submit"><em
                                            class="fa fa-save"></em> Lưu và đóng</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                            class="fa fa-close"></em> Đóng</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mg-r-10">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                    <i class='far fa-file-excel' style='font-size:15px'></i>
                    Thêm mới từ excel
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:80%;vertical-align: top;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nhập bác sỹ từ file excel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" id="importExcelForm" method="POST" enctype="multipart/form-data">
                                <div class="modal-body" style="padding-top:5px;padding-bottom:6px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold" style="cursor:none">File excel
                                                (Dung lượng không vượt quá 2mb)</label>
                                            <div class="form-control bg-light">
                                                <div class="row">
                                                    <div class="col-lg-4 text-center">
                                                        <label for="importExcelFile" id="hoverLabel"
                                                            class="form-control" style="width:100%;">Click để tải file
                                                            lên</label>
                                                        <input type="file" name="file" id="importExcelFile"
                                                            class="form-control"
                                                            accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                                                    </div>
                                                    <div class="col-lg-8" id="statusUploadFile" style="display:none">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mg-t-20">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab3">DS hợp lệ
                                                        <span class="badge rounded-pill bg-primary"
                                                            id="info-dataTableHopLe" style="font-size: 90%"></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab4">
                                                        DS không hợp lệ <span class="badge rounded-pill bg-danger"
                                                            id="info-dataTableKhongHopLe" style="font-size: 90%"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab3"><br>
                                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                        id="dataTableHopLe" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Thông tin bác sỹ</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Chuyên khoa</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Trình độ</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Nơi công tác</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Ghi chú</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Trạng thái</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Lỗi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="tab4"><br>
                                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                        id="dataTableKhongHopLe" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Thông tin bác sỹ</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Chuyên khoa</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Trình độ</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Nơi công tác</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Ghi chú</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Lỗi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body" style="border-top:1px solid #e9ecef;padding-top:8px">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <em class="iconImportBulb"></em> <span
                                                class="text-dark font-weight-bold">Tải file
                                                excel
                                                mẫu <a href="{{ url('./download/fileMauBacSy.xlsx') }}">tại
                                                    đây</a></span>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" class="btn btn-primary mg-r-6" id="submitImport"><em
                                                    class="fa fa-save"></em> Lưu hàng hoá</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                    class="fa fa-close"></em> Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- chi tiết --}}
                <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:80%;">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Bác sỹ</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#" id="suaThongTinBacSi" name="suaThongTinBacSi" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active tx-gray-800" data-toggle="tab" href="#inf">Thông
                                                tin bác sỹ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#history">Lịch sử giao dịch</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="inf">
                                            <div class="row mg-t-10">
                                                <div class="col-md-3">
                                                    <input type="hidden" name="id" id="id">
                                                    <label for="" class="tx-gray-800 tx-bold">Mã bác sỹ</label>
                                                    <input type="text" class="form-control" placeholder="Mã tự động">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Tên bác sỹ <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" id="name" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="tx-gray-800 tx-bold">Nơi công tác <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="workplace" id="workplace"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mg-t-10">
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Chuyên khoa</label>
                                                    <input type="text" class="form-control" list="chuyenKhoa">
                                                    <datalist id="chuyenKhoa">
                                                        <option value="Chấn thương chỉnh hình">Chấn thương chỉnh hình
                                                        </option>
                                                        <option value="Cơ khớp xương">Cơ khớp xương</option>
                                                        <option value="Da liễu">Da liễu</option>
                                                    </datalist>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Trình độ</label>
                                                    <input type="text" class="form-control" list="trinhDo">
                                                    <datalist id="trinhDo">
                                                        <option value="Bác sỹ">Bác sỹ</option>
                                                        <option value="Giáo sư">Giáo sư</option>
                                                        <option value="Thạc sỹ">Thạc sỹ</option>
                                                    </datalist>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                                    <input type="text" name="phone" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Email</label>
                                                    <input type="text" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mg-t-10">
                                                <div class="col-md-12">
                                                    <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mg-t-10">
                                                <div class="col-md-12">
                                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                                    <textarea name="note" id="note" cols="30" rows="1"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"><em
                                                        class="fa fa-save"></em> Lưu</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                        class="fa fa-close"></em> Đóng</button>
                                            </div>
                                        </div>
                                        <div id="history" class="tab-pane fade"><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Từ ngày</label>
                                                    <input type="date" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Tới ngày</label>
                                                    <input type="date" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Tìm kiếm theo mã phiếu">
                                                </div>
                                                <div class="col-md-2 align-self-end">
                                                    <button class="btn btn-info">
                                                        <i class="fas fa-search" style="padding: 3px"></i>
                                                        Tìm kiếm
                                                    </button>

                                                </div>
                                                <div class="mg-t-20 col-md-12">
                                                    <label for="" class="tx-bold tx-gray-800"
                                                        id="info-data-table3"></label>
                                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                        id="data-table3" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">#</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Mã hóa đơn</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Ngày kê</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Khánh hàng</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Bệnh nhân</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Cơ sở khám</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Tổng tiền</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="mg-t-10" style="text-align: end;">
                                                <button type="button" class="btn btn-info" id="exportExcelDBLotNo">
                                                    <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    <em class="fa fa-close"></em> Đóng
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-info" id="exportExcelDB">
                    <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                </button>
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
                        placeholder="Tìm kiếm mã bác sỹ hoặc tên bác sỹ">
                </div>
                <div class="col-md-2 align-self-end">
                    <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i class="fas fa-search"
                            style="padding: 3px"></i>Tìm kiếm</button>
                </div>
            </div>

            <div class="mg-t-20">
                <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1" style="with:100%">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary" style="color: white;width:4%">#</th>
                            <th scope="col" class="bg-primary" style="color: white;width:10%">Mã bác sỹ</th>
                            <th scope="col" class="bg-primary" style="color: white;width:10%">Tên bác sỹ</th>
                            <th scope="col" class="bg-primary" style="color: white;width:10%">Chuyên khoa</th>
                            <th scope="col" class="bg-primary" style="color: white;width:10%">Trình độ</th>
                            <th scope="col" class="bg-primary" style="color: white;width:10%">Nơi công tác</th>
                            <th scope="col" class="bg-primary" style="color: white;width:10%">Ghi chú</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 11%">Trạng thái</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 12%"></th>
                        </tr>
                    </thead>
                    <tbody id="searchData"></tbody>
                </table>
            </div>
        </div><!-- row -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<script>
    function searchDateTable(){
    $.fn.dataTable.ext.search.push(
      function (settings, data, dataIndex){
        if ( settings.nTable.id !== 'data-table1' ) {
          return true;
        }
        var supplierName = $("#searchBySupplier").val().toLowerCase();
        return (
          (~data[1].toLowerCase().indexOf(supplierName)) ||
          (~data[2].toLowerCase().indexOf(supplierName))
          ) ? true : false;
      }
      );
    $('#data-table1').DataTable()
    .columns(7).search($("#searchByStatus").val())
    .draw();

  };

  function decialNumber(number){
    return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
  }

  function checkRangeValue(value){
      if(value<10){
        return "00000"+value
      }else if(value<100){
        return "0000"+value
      }else{
        return "000"+value
      }
    }
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var table1 = $('#data-table1').DataTable({
      processing: true,
      "order": [[ 1, "desc" ]],
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
        url: "{{ url('bacsi') }}",
        data: function (d) {
          d.status = $('#searchByStatus').val(),
          d.search = $('input[type="search"]').val()
        }
      },
      columns: [
      { data: null , orderable: false, searchable: false},
      { data: null,
        "render": function(data,type,row) { return "BS"+checkRangeValue(data["id"])}
      },
      { data: 'name', name: 'name',orderable: false},
      { data:'specialist', name: 'specialist',orderable: false, searchable: false},
      { data: 'standard', name: 'standard',orderable: false, searchable: false },
      { data: 'workplace', name: 'workplace' ,orderable: false, searchable: false},
      { data: 'note', name: 'note' ,orderable: false, searchable: false},
      { data: 'status', name: 'status', orderable: false},
      { data: 'action', name: 'action',orderable:false,},
      ],
      dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, {
                extend: 'excelHtml5',
                title: 'DanhSachBacSy_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
                exportOptions: {
                    columns: [1, 2, 3,4,5,6]
                    },
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table1"]').appendTo('#exportExcelDB');

    $('#data-table1').DataTable().on('order.dt search.dt', function () {
     $('#data-table1').DataTable().column(0).nodes().each(function (cell, i) {
       cell.innerHTML = i + 1;
     });
   }).draw();
    searchDateTable();
  });
  function changeFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('bacsi/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
          title: "Bạn có muốn tạm dừng hoạt động bác sỹ ["+res.name+"] này không ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"POST",
              url: "{{ url('bacsi/active') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $("#data-table").load(
                  $.toast({
                    text : "Tạm dừng hoạt động bác sỹ",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                  }));
                $('#data-table1').DataTable().ajax.reload();
              }
            });
          } else {
            swal("Cancelled Successfully");
          }
        })
      }
    });
  }


  function changeFuncsua(id){
    $.ajax({
      type:"GET",
      url: "{{ url('bacsi/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
          title: "Bạn chắc chắn muốn kích hoạt bác sỹ ['"+res.name+"'] này không?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"POST",
              url: "{{ url('bacsi/active1') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $("#data-table").load(
                  $.toast({
                    text : "Tạm dừng hoạt động bác sỹ",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                  }));
                $('#data-table1').DataTable().ajax.reload();
              }
            });
          } else {
            swal("Cancelled Successfully");
          }
        })
      }
    });
  }
  function deleteFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('bacsi/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
          title: "Bạn chắc chắn muốn xóa thông tin bác sỹ ["+res.name+"] này không ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"DELETE",
              url: "{{ url('bacsi/{id}') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $("#data-table").load(
                  $.toast({
                    text : "Xóa dữ liệu thành công",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                  }));
                $('#data-table1').DataTable().ajax.reload();
              }
            });
          } else {
            swal("Cancelled Successfully");
          }
        })
      }
    });
  }

  function editFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('bacsi/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#id').val(res.id);
        $('#name').val(res.name);
        $('#workplace').val(res.workplace);

        $.ajax({
          type:"GET",
          url:"{{ url('bacsi/detail') }}",
          data: { id: id },
          dataType:'json',
          success: function(response){
            var table3 = $('#data-table3').DataTable({
                processing: true,
		    		responsive: true,
		    		"order": [[ 1, "desc" ]],
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
              aaData: response,
              columns: [
              { data: 'id', name: 'id'},
              { data: null,
                "render": function(data,type,row) { return "MHD0000"+data["id"]}
              },
              { data:'date', name: 'date' },
              { data: null,
                'render':function(data,type,row){
                  if (data['name']==null) {
                    return 'Khách lẻ';
                  }
                  return data['name'];
                }
              },
              { data: 'patient', name: 'patient' },
              { data: 'medical_facility', name: 'medical_facility' },
              { data: null,
                "render": function(data,type,row) {
                  return decialNumber(data['price_import'])
                }
              },
              ],
                dom: 'Blfrtip',
                buttons: [
                $.extend(true, {}, {
                extend: 'excelHtml5',
                title: 'DanhSachBacSy_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>'
                })
                ]
            });
            $('.dt-buttons a[aria-controls="data-table3"]').appendTo('#exportExcelDBLotNo');
            table3.on('order.dt search.dt', function () {
            table3.column(0).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
          }
        })
      }
    });
  }


  $('#suaThongTinBacSi').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ url('bacsi')}}",
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      success: (data) => {
        $("#chiTiet").modal('hide');
        $("#chiTiet").load(
          $.toast({
            text : "Lưu dữ liệu thành công",
            position: "bottom-right",
            icon:"success",
            stack:1,
            loader:false
          }));
        $('#data-table1').DataTable().ajax.reload();
      },
      error: function(data){
        console.log(data);
      }
    });
  });


</script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });

    $("#xuatTra").click(function(){
      $("#tab1").addClass("hidden");
      $("#tab2").removeClass("hidden");
    });

    $("#thoatXuatHuy2").click(function(){
      $("#tab1").removeClass("hidden");
      $("#tab2").addClass("hidden");
    });
    $(function(){
      let thongTinBacSi = $("#thongTinBacSi");
      if(thongTinBacSi.length){
        thongTinBacSi.validate({
          rules:{
            name:{
              required:true,
              minlength:5
            },
            workplace:{
              required:true,
              minlength:5
            }
          },
          messages:{
            name:{
              required:"Vui lòng nhập tên",
              minlength:"Vui lòng nhập trên 4 kí tự"
            },
            workplace:{
              required:"Vui lòng nhập nơi công tác",
              minlength:"Vui lòng nhập trên 4 kí tự"
            }
          },
          submitHandler: function(form) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $("#submit"). attr("disabled", true);

            $.ajax({
              url: "{{ url('bacsi') }}",
              type: "POST",
              data: $('#thongTinBacSi').serialize(),
              success: function( response ) {
                $('#data-table1').DataTable().ajax.reload();
                $('#submit').html('Lưu và thêm mới');
                $("#submit"). attr("disabled", false);
                $("#submit").load(
                  $.toast({
                    text : "Thêm mới bác sỹ thành công",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                  }));
                document.getElementById("thongTinBacSi").reset();
              }
            });
          }
        })
      }
    });



      // import excel

      $(document).ready(function(){
        let dataOk = [];
         $('#importExcelFile').change(function(){
        $('#statusUploadFile').css("display","block");
        var filename = $(this).val().replace(/C:\\fakepath\\/i, '');

        if(this.files[0].size > 2000000) {
            let divUpload = `<span class="text-danger" style="font-size:108%;padding-top:"><em class="fa fa-close"></em> Tải file lên thất bại <strong>${filename} (${(this.files[0].size/1000000).toFixed(2)}mb)</strong> .Dung lượng file vượt quá 2mb.</span>`;
            $('#statusUploadFile').html(divUpload);
            datatableHopLeImport();
            datatableKhongHopLeImport();
            $('#importExcelForm').trigger("reset");
        }else if(!filename.match(/.(?:xlsx|xls)$/)){
            let divUpload = `<span class="text-danger" style="padding-top:10px;font-size:108%"><em class="fa fa-close"></em> Tải file lên thất bại <strong>${filename}</strong> .Định dạng file ko hợp lệ.</span>`;
            $('#statusUploadFile').html(divUpload);
            datatableHopLeImport();
            datatableKhongHopLeImport();
            $('#importExcelForm').trigger("reset");
        }else{
            var form = $('#importExcelForm')[0];
            var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: "{{ url('bacsi/import') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#importExcelForm').trigger("reset");
                    let dataImport = [];
                    let dataError = [];
                    let dataImportArr = data['data'];
                    let dataNotOk = [];

                    data['errors'].forEach(item=>{
                        dataError.push({
                            'id': parseInt(item.row)-2,
                            'errors': item.errors[0]
                        })
                    });

                    for(let i=0;i<dataImportArr.length;i++){
                        dataImport.push({
                            'id': i,
                            'name': dataImportArr[i][1],
                            'specialist': dataImportArr[i][5],
                            'address': dataImportArr[i][2],
                            'phone':  dataImportArr[i][3],
                            'email':  dataImportArr[i][4],
                            'standard': dataImportArr[i][6],
                            'workplace': dataImportArr[i][7],
                            'note': dataImportArr[i][8],
                        })
                    }

                    dataError.forEach(item=>{
                        var flag = 0;
                        Object.keys(dataImport).forEach(function(key) {
                            if (dataImport[key]['id'] == item.id){
                                flag++;
                                if(flag==1){
                                    dataImport[key]['errors'] = item.errors;
                                }
                            }
                        });
                    });

                    dataImport.forEach(item=>{
                        if(item.errors || !item.name){
                            dataNotOk.push(item);
                        }else{
                            dataOk.push(item);
                        }
                    });

                    let divUpload = `<span style="color:#3ea44e">
                                    <em class="fa fa-check"></em> Tải file lên thành công
                                    <strong>${filename}.</strong></span><p style="margin:0px;padding-top:3px;color:#337ab7">Có <strong>${dataNotOk.length}</strong> bác sỹ không hợp lệ. Vui lòng kiểm tra lại</p>`;
                    $('#statusUploadFile').html(divUpload);

                    $('#dataTableHopLe').DataTable({
                        "destroy": true,
                        "ordering": false,
                        "pageLength": 5,
                        "lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
                        "pagingType": "full_numbers",
                        "language": {
                            "processing": "Đang xử lý...",
                            "sLengthMenu": " _MENU_ Bản ghi hiển thị",
                            "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                            "info": "_TOTAL_",
                            "infoEmpty": "0",
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
                        aaData: dataOk,
                        columns: [
                            { data: null,
                            "render": function(data,type,row){
                                if(data['errors']||data['address']==null||data['phone']==null||data['email']==null){
                                return "<span>Mã bác sỹ: </span>"+'BS'+checkRangeValue(data["id"])+
                                '</br><strong>Tên bác sỹ :</strong>'+(data['name'])+
                                '</br><strong>Địa chỉ:</strong>'+''+
                                '</br><strong>Số điện thoại :</strong>'+''+
                                '</br><strong>Email  :</strong>'+''+'</span>';
                                }else if(data['errors']||data['address']==null||data['phone']==null||data['email']==null){
                                    return "<span>Mã bác sỹ: </span>"+'BS'+checkRangeValue(data["id"])+
                                '</br><strong>Tên bác sỹ :</strong>'+(data['name'])+
                                '</br><strong>Địa chỉ:</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</span>';
                                }else if(data['name']){
                                return "<span>Mã bác sỹ: </span>"+'BS'+checkRangeValue(data["id"])+
                                '</br><strong>Tên bác sỹ :</strong>'+(data['name'])+
                                '</br><strong>Địa chỉ:</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</span>';
                                }else{
                                    return "<span class='text-danger'>Tên bác sỹ là bắt buộc</span>";
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['specialist'] == null){
                            return ''
                        }else{
                            return  data['specialist'];
                        }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['standard'] == null){
                            return ''
                        }else{
                            return  data['standard'];
                        }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(data['workplace']){
                                    return data['workplace'];
                                }else{
                                    return "<span class='text-danger'>Nơi công tác bắt buộc</span>";
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['note'] == null){
                            return ''
                        }else{
                            return  data['note'];
                        }
                            }
                        },

                        { data: null,
                            "render": function(data,type,row){
                                return "<span style='background-color:#f1c40f;color:white;height:15px;padding:5px;border-radius:5px'>Chờ xử lý</span>"
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            return  '';
                        }

                        },

                        ]
                    });
                    $('#dataTableHopLe_paginate').after($('#dataTableHopLe_length'));
                    $('#dataTableHopLe_length select').select2({
                      minimumResultsForSearch: -1
                  });
                    $('#info-dataTableHopLe').empty();
                    $('#dataTableHopLe_info').detach().appendTo('#info-dataTableHopLe');

                    $('#dataTableKhongHopLe').DataTable({
                        "destroy": true,
                        "ordering": false,
                        "pageLength": 5,
                        "lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
                        "pagingType": "full_numbers",
                        "language": {
                            "processing": "Đang xử lý...",
                            "sLengthMenu": " _MENU_ Bản ghi hiển thị",
                            "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                            "info": "_TOTAL_",
                            "infoEmpty": "0",
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
                        aaData: dataNotOk,
                        columns: [
                            { data: null,
                            "render": function(data,type,row){
                                if(data['errors']||data['address']==null||data['phone']==null||data['email']==null){
                                return "<span>Mã bác sỹ: </span>"+'BS'+checkRangeValue(data["id"])+
                                '</br><strong>Tên bác sỹ :</strong>'+(data['name'])+
                                '</br><strong>Địa chỉ:</strong>'+''+
                                '</br><strong>Số điện thoại :</strong>'+''+
                                '</br><strong>Email  :</strong>'+''+'</span>';
                                }else if(data['errors']||data['address']==null||data['phone']==null||data['email']==null){
                                    return "<span>Mã bác sỹ: </span>"+'BS'+checkRangeValue(data["id"])+
                                '</br><strong>Tên bác sỹ :</strong>'+(data['name'])+
                                '</br><strong>Địa chỉ:</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</span>';
                                }else if(data['name']){
                                return "<span>Mã bác sỹ: </span>"+'BS'+checkRangeValue(data["id"])+
                                '</br><strong>Tên bác sỹ :</strong>'+(data['name'])+
                                '</br><strong>Địa chỉ:</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</span>';
                                }else{
                                    return "<span class='text-danger'>Tên bác sỹ là bắt buộc</span>";
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['specialist'] == null){
                            return ''
                        }else{
                            return  data['specialist'];
                        }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['standard'] == null){
                            return ''
                        }else{
                            return  data['standard'];
                        }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(data['workplace']){
                                    return data['workplace'];
                                }else{
                                    return "<span class='text-danger'>Nơi công tác bắt buộc</span>";
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['note'] == null){
                            return ''
                        }else{
                            return  data['note'];
                        }
                            }
                        },
                         { data: null,
                            "render": function(data,type,row){
                                if(data['name'] == null){
                                return '';
                            }else{
                                return "<span class='text-danger' style='font-size:15px'>"+data['errors']+"</span>";
                              }
                                }
                        },

                        ]
                    });
                    $('#dataTableKhongHopLe_paginate').after($('#dataTableKhongHopLe_length'));
                    $('#dataTableKhongHopLe_length select').select2({
                      minimumResultsForSearch: -1
                    });
                    $('#info-dataTableKhongHopLe').empty();
                    $('#dataTableKhongHopLe_info').detach().appendTo('#info-dataTableKhongHopLe');
                },
                error: function(data) {
                }
            });
        }
     });
     $('#submitImport').click(function(){
                        if(dataOk.length==0){
                            toastr.info('Danh sách nhóm khách hàng hợp lệ là 0 xin vui lòng kiểm tra lại');
                        }else{
                        $.ajax({
                            type: 'POST',
                            url: '{{ url('bacsi/insertDataExcel') }}',
                            data: JSON.stringify(dataOk),
                            dataType:'json',
                            contentType: 'json',
                            contentType: 'application/json; charset=utf-8',
                            success: function(success){
                                dataOk = [];
                                $('#data-table1').DataTable().ajax.reload();
                                $('#exampleModal1').modal('hide');
                                toastr.success('Thêm mới hàng hoá thành công');
                                console.log(success);
                        }
                    });
                }
            });
    })


    $('#exampleModal1').on('shown.bs.modal', function () {
        $('#importExcelForm').trigger("reset");
        $('#statusUploadFile').empty();
        datatableHopLeImport();
        datatableKhongHopLeImport();
    });

    function datatableHopLeImport(){
        $('#dataTableHopLe').DataTable({
            "destroy": true,
            "ordering": false,
            "pageLength": 5,
            "lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
            "pagingType": "full_numbers",
            "language": {
                "processing": "Đang xử lý...",
                "sLengthMenu": " _MENU_ Bản ghi hiển thị",
                "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                "info": "_TOTAL_",
                "infoEmpty": "0",
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
            aaData: []
        });
        $('#dataTableHopLe_paginate').after($('#dataTableHopLe_length'));
        $('#dataTableHopLe_length select').select2({
          minimumResultsForSearch: -1
      });
        $('#info-dataTableHopLe').empty();
        $('#dataTableHopLe_info').detach().appendTo('#info-dataTableHopLe');
    }
    function datatableKhongHopLeImport(){
        $('#dataTableKhongHopLe').DataTable({
            "destroy": true,
            "ordering": false,
            "pageLength": 5,
            "lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
            "pagingType": "full_numbers",
            "language": {
                "processing": "Đang xử lý...",
                "sLengthMenu": " _MENU_ Bản ghi hiển thị",
                "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                "info": "_TOTAL_",
                "infoEmpty": "0",
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
            aaData: []
        });
        $('#dataTableKhongHopLe_paginate').after($('#dataTableKhongHopLe_length'));
        $('#dataTableKhongHopLe_length select').select2({
          minimumResultsForSearch: -1
      });
        $('#info-dataTableKhongHopLe').empty();
        $('#dataTableKhongHopLe_info').detach().appendTo('#info-dataTableKhongHopLe');
    }
  })
</script>
@endsection

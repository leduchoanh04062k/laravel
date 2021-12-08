@extends('default')
@section('title','Bảng giá')
@section('content')
<div class="br-mainpanel pos-relative">
  <div class="tab1">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
      <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Bảng giá</h4>
      <div class="d-flex">
        <div class="mg-r-10">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary inTab2" data-toggle="modal" data-target="#exampleModal">
            <i class='fas fa-plus' style='font-size:15px;'></i>
            Thêm mới
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
            <input id="searchBySupplier" type="text" class="form-control" placeholder="Tìm kiếm theo tên bảng giá">
          </div>
          <div class="col-md-2 align-self-end">
            <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i class="fas fa-search" style="padding: 3px"></i>Tìm kiếm</button>
          </div>
        </div>

        <div class="mg-t-20">
          <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
          <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1" style="width: 100%">
            <thead>
              <tr>
                <th scope="col" class="bg-primary" style="color: white;max-width:4%;">#</th>
                <th scope="col" class="bg-primary" style="color: white;max-width:15%;" >Tên bảng giá</th>
                <th scope="col" class="bg-primary" style="color: white;max-width:24%;" >Nhà thuốc áp dụng</th>
                <th scope="col" class="bg-primary" style="color: white;max-width:12%;" >Thời hạn</th>
                <th scope="col" class="bg-primary" style="color: white;max-width:12%;" >Trạng thái</th>
                <th scope="col" class="bg-primary" style="color: white;max-width:10%;"></th>
              </tr>
            </thead>
            <tbody id="searchData"></tbody>
          </table>
        </div>
      </div><!-- row -->
    </div><!-- br-pagebody -->
  </div>

  <!-- tab2 -->
  <div class="pos-absolute t-0 l-0 hidden tab2" style="width:100%;">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
      <div class="row">
        <h4 class="tx-gray-800 mg-b-5 col-6">Bảng giá > Tạo mới bảng giá</h4>
      </div>
    </div>

    <!-- nhập thông tin -->
    <div class="br-pagebody pd-x-20 pd-sm-x-30">
      <div class="shadow-base bg-white pd-15">
        <div class="mg-b-20">
          <form action="" id="submitbanggia">
            <div class="row">
              <div class="col-md-4 mg-t-10">
                <input type="hidden" name="id" class="id" id="idPrice" value="">
                <label for="" class="tx-bold tx-gray-800">Tên bảng giá</label>
                <span class="text-danger">*</span>
                <input type="text" name="name" id="namePrice" class="form-control name" autocomplete="off">
              </div>
              <div class="col-md-4 mg-t-10">
                <label for="" class="tx-bold tx-gray-800">Nhà thuốc áp dụng</label>
                <div class="">
                  <!-- Button nhà thuốc -->
                  <input type="button" class="form-control text-info" style="cursor:pointer;" name="apply_clinic" data-toggle="modal" data-target="#nhaThuoc" value="Nhà thuốc Morioka">

                  <!-- Modal nhà thuốc-->
                  <div class="modal fade" id="nhaThuoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Danh sách nhà thuốc trong chuỗi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="input-group hidden-xs-down transition align-items-center">
                                <input id="searchbox" type="text" class="form-control" placeholder="Tìm kiếm tên nhà thuốc theo mã">
                                <span class="input-group-btn">
                                  <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
                                </span>
                              </div><!-- input-group -->
                            </div>
                          </div>
                          <div class="row mg-t-10">
                            <div class="col-md-12">
                              <nav>
                                <div class="nav nav-tabs flex-column" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                  <a class="nav-item nav-link" id="nav-nhaThuoc-tab" data-toggle="tab" href="#nav-nhaThuoc" role="tab" aria-controls="nav-profile" aria-selected="false">Nhà thuốc Morioka</a>
                                </div>
                              </nav>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Chọn nhà thuốc</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mg-t-10">
                <label class="tx-bold tx-gray-800">Trạng thái</label>
                <select name="status" id="" class="form-control select2">
                  <option value="1">Hoạt động</option>
                  <option value="0">Ngừng hoạt động</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mg-t-10">
                <label for="" class="tx-bold tx-gray-800">Ngày bắt đầu áp dụng</label>
                <span class="text-danger">*</span>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                  <input type="text" name="start_date" class="form-control fc-datepicker start_date" value="<?php echo date("d/m/Y")?>" placeholder="dd/mm/YYYY">
                </div>
              </div>
              <div class="col-md-4 mg-t-10">
                <label for="" class="tx-bold tx-gray-800">Ngày kết thúc áp dụng</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                  <input type="text" name="end_date" class="form-control fc-datepicker end_date" placeholder="MM/DD/YYYY">
                </div>
              </div>
              <div class="col-md-4 mg-t-10">
                <label for="" class="tx-bold tx-gray-800">Ghi chú</label>
                <textarea name="note" id="" cols="30" rows="1" class="form-control note"></textarea>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="shadow-base bg-white pd-15 mg-t-25">
        <div >
          <label for="browser" class="tx-gray-900 tx-bold">Thêm hàng hoá vào phiếu</label>
          <div class="pos-relative">
            <input name="browser" class="form-control autosearchimage" autocomplete="off" >
            <button class="btn btn-primary pos-absolute r-0 t-0" data-toggle="modal" data-target="#timkiem">
              <i class="fa fa-plus-circle mg-r-5" aria-hidden="true"></i>
              Tìm kiếm nâng cao
            </button>
            <!-- Modal tìm kiếm nâng cao-->
            <div class="modal fade" id="timkiem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Tìm kiếm nâng cao</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-3">
                          <label for="" class="tx-gray-800 tx-bold">Loại hàng hoá</label>
                          <select name="" id="" class="form-control">
                            <option value="">Dược phẩm</option>
                            <option value="">Vật tư y tế</option>
                            <option value="">Hàng hoá khác</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label for="" class="tx-gray-800 tx-bold">Nhóm hàng</label>
                          <select name="" id="" class="form-control">
                            <option value="">Hô hấp</option>
                            <option value="">Tuần hoàn não</option>
                            <option value="">Hàng hoá khác</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label for="" class="tx-gray-800 tx-bold">Hạn sử dụng</label>
                          <select name="" id="" class="form-control">
                            <option value="">Sử dụng tốt</option>
                            <option value="">Sắp hết hạn</option>
                            <option value="">Đã hết hạn</option>
                          </select>
                        </div>
                        <div class="col-md-3">
                          <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm hàng tồn kho</label><br>
                          <div class="toggle-wrapper">
                            <div class="toggle toggle-modern primary" >
                              <div class="toggle-slide">
                                <div class="toggle-inner" style="width: 94px; margin-left: 0px;">
                                  <div class="toggle-on active" style="height: 26px; width: 47px; text-indent: -8.66667px; line-height: 26px;" ></div>
                                  <div class="toggle-blob" style="height: 26px; width: 26px; margin-left: -13px;"></div>
                                  <div class="toggle-off" style="height: 26px; width: 47px; margin-left: -13px; text-indent: 8.66667px; line-height: 26px;"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-9">
                          <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                          <input type="text" class="form-control" placeholder="Nhập từ khoá tìm kiếm, ấn enter để tìm">
                        </div>
                        <div class="col-md-2 align-self-end">
                          <button class="btn btn-primary">
                            <i class="fa fa-search mg-r-5" aria-hidden="true"></i>
                            Tìm kiếm
                          </button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#timKiem">Kết quả tìm kiếm</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#daChon">Đã chọn</a>
                            </li>
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div id="timKiem" class="tab-pane active"><br>
                              <label for="" class="tx-bold tx-gray-800" id="info-data-table2"></label>
                              <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table2" width="100%">
                                <thead>
                                  <tr>
                                    <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Tên</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Tồn kho</th>
                                    <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Số ĐK</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Quy cách đóng gói</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Hãng sản xuất</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Hoạt chất chính</th>
                                  </tr>
                                </thead>
                                <tbody>

                                </tbody>
                              </table>
                            </div>
                            <div id="daChon" class="tab-pane fade"><br>
                              <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                <thead>
                                  <tr>
                                    <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Tên</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Tồn kho</th>
                                    <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Số ĐK</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Quy cách đóng gói</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Hãng sản xuất</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Hàm lượng</th>
                                    <th scope="col" class="bg-primary" style="color: white;"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                    <td>Mark</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="submithanghoa2" class="btn btn-primary">Xong</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="shadow-base bg-white pd-15 mg-t-25">
        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3">
          <thead>
            <tr>
              <th scope="col" class="bg-primary" style="color: white;">#</th>
              <th scope="col" class="bg-primary" style="color: white;">Mã hàng hoá</th>
              <th scope="col" class="bg-primary" style="color: white;">Tên hàng hoá</th>
              <th scope="col" class="bg-primary" style="color: white;">Đơn vị tính</th>
              <th scope="col" class="bg-primary" style="color: white;">Giá chung</th>
              <th scope="col" class="bg-primary" style="color: white;">Giá mới</th>
              <th scope="col" class="bg-primary" style="color: white;"></th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>

      <div class="d-flex justify-content-end  mg-t-15">
        <button class="btn btn-primary mg-r-10" id="submitPhieuNhap"><i class="fa fa-save" style="font-size:13px" aria-hidden="true"></i> Lưu</button>
        <button class="btn btn-danger" id="outTab2"><i class="fa fa-reply" style="font-size:13px" aria-hidden="true"></i> Trở về</button>
      </div>
    </div>
  </div>
  <!-- end tab2 -->



</div><!-- br-mainpanel -->
<script>
  var DataTable_hanghoa = [];
  var dataimg = [];
  var hangHoa2 = [];
  var hangHoa1 = [];

  function checkTypeOf(value){
    if(typeof(value) === 'string'){
     return true;
   }else{
     return false;
   }
 }
 function replaceCurrency(number){
  if(checkTypeOf(number)){
   return number = number.replace(/,/g,'');
 }else{
   return number;
 }
}
$('.autosearchimage').typeahead({
  source: function(query, process) {
    return $.get("{{ url('nhaptunhacungcap/autosearchimage') }}", {
      query: query
    }, function(data) {
      return process(data);
    });
  },
  highlighter: function (item, data) {
    var parts = item.split('#'),
    html = '<div class="d-flex" style="white-space: pre-line">';
    html += '<div class="tx-center">';
    html += '<img src="{{ asset('image/medicine-default.jpg') }}" alt="" width=86em >';
    html += '</div>';
    html += '<div class="mg-l-10 align-self-center">';
    html += '<div>Tên: <strong>'+data.name+' -- '+data.unit+'</strong></div>';
    html += '<div>Mã HH: <strong>HH0000'+data.id+'</strong> | SĐK: <strong>'+data.reg_no+'</strong> | Hoạt chất: <strong>'+data.ingredient+'</strong></div>';
    html += '<div>Quy cách ĐG: <strong>'+data.packaging+'</strong> | Hãng SX: <strong>'+data.manufacture+'</strong></div>';
    html += '</div>';
    html += '</div>';
    return html;
  },
  updater: function(result) {
    result.stock_id = result.id;
    result.price_new = 0;
    result.dataunit = getDataUnitStock(result.stock_id);
    result.id = null;
    DataTable_hanghoa.push(result);
    loadData();
  }
});


function updateData(data) {
  var key = $(data).attr("data-id");
  var value = $(data).attr("data-name");
  DataTable_hanghoa[key][value] = $(data).val();
  loadData();
  console.log(DataTable_hanghoa);
}

function getDataImage(id){
  dataimg.forEach(item => {
    if(item.id == id){
      DataTable_hanghoa.push(item)
    }
  });
  dataimg = [];
  console.log(DataTable_hanghoa);
  loadData();
}

function removeData(index){
  DataTable_hanghoa.splice(index,1);
  console.log(DataTable_hanghoa);
  loadData();
}

function duplicatedData(index){
  DataTable_hanghoa.push({
    id: null,
    name: DataTable_hanghoa[index].name,
    unit: DataTable_hanghoa[index].unit,
    price_sell: DataTable_hanghoa[index].price_sell,
    price_new: DataTable_hanghoa[index].price_new,
  });
  loadData();
  console.log(DataTable_hanghoa);
}

function loadData(){
  var index=0;
  $('#data-table3').DataTable().clear().draw();
  DataTable_hanghoa.forEach(item=>{
    $('#data-table3').DataTable().row.add([
      '<div style="width:100%;border:0" data-name="id" data-id="'+index+'" class="form-control" >'+(index+1)+'</div>',
      '<div style="width:100%;color:black;font-weight:800;border:0" data-name="code" data-id="'+index+'" class="form-control" >HH'+checkRangeValue(item.stock_id)+'</div>',
      '<div style="width:100%;color:black;font-weight:800;border:0;" data-name="name" data-id="'+index+'" onclick="editInfoStock('+item.stock_id+')" class="form-control" >'+item.name+'</div>',
      '<input style="width:75%;border:0;background:#fff" class="form-control" data-name="unit" data-id="'+index+'" value="'+item.unit+'" readonly  />',
      '<input style="width:75%;border:0;background:#fff" class="form-control" data-name="price" data-id="'+index+'" value="'+item.price_sell+'" readonly />',
      '<input style="width:75%" class="form-control" type="text" data-name="price_new" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['price_new'] || 0)+'" onchange="updateData(this)" />',
      '<span class="fa fa-plus-square" style="color:#0753a1;cursor:pointer;font-size:125%" data-id="'+index+'" onclick="duplicatedData('+index+')"></span> <span class="fas fa-trash-alt" style="color:#bd2130;cursor:pointer;font-size:125%" data-id="'+index+'" onclick="removeData('+index+')"></span>'
      ]).draw( false );
    new AutoNumeric("input[data-name='price_new'][data-id='"+index+"']", {
     minimumValue: 0,
     modifyValueOnWheel: false,
     unformatOnHover: false
   });
    index++;
  });
}

$(document).ready(function(){
  var table2 = $('#data-table2').DataTable({
    processing: true,
    responsive: true,
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
    ajax: "{{ url('nhaptunhacungcap/gethanghoa') }}",
    columns: [
    { data: 'id', name: 'id'},
    { data: 'name', name: 'name' },
    { data: 'id', name: 'id' },
    { data: 'id', name: 'id' },
    { data: 'reg_no', name: 'reg_no' },
    { data: 'packaging', name: 'packaging' },
    { data: 'made_in', name: 'made_in' },
    { data: 'ingredient', name: 'ingredient' },
    ]
  });

  var table3 = $('#data-table3').DataTable({
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
  });

  $('#data-table2 tbody').on( 'click', 'tr', function () {
    $(this).toggleClass('selected');
  });

  $("#submithanghoa2" ).click(function() {
   $('#timkiem').modal('hide');
   hangHoa2 = table2.rows('.selected').data().toArray();
   console.log(hangHoa2);
   hangHoa2.forEach(item=>{
    DataTable_hanghoa.push(item);
  });
   table2.row('.selected').remove().draw( false);
   loadData();
 });
});

$("#submitPhieuNhap").click(function(){
  if(DataTable_hanghoa==''){
    $.toast({
     text : "Chưa có hàng hoá",
     position: "bottom-right",
     icon:"error",
     stack:1,
     loader:false
   })
  }else{
    for(let i =0;i<DataTable_hanghoa.length;i++){
     if($('.name').val()==''){
      $.toast({
       text : "Chưa nhập tên bảng giá",
       position: "bottom-right",
       icon:"error",
       stack:1,
       loader:false
     })
    }else if($('.start_date').val()==''){
      $.toast({
       text : "Ngày bắt đầu áp dụng không được để trống",
       position: "bottom-right",
       icon:"error",
       stack:1,
       loader:false
     })
      $('.start_date').focus();
    }else{
      $.ajax({
        url: "{{ url('banggia/submitbanggia') }}",
        type: "POST",
        data: $('#submitbanggia').serialize(),
        success: function( response ) {
          DataTable_hanghoa.forEach(item => {
            item.idha = response.id;
            item.price_new = replaceCurrency(item.price_new);
          });
          console.log(DataTable_hanghoa);
          $.ajax({
            url: "{{ url('banggia/submitphieunhap') }}",
            type: "POST",
            dataType:'json',
            contentType: 'json',
            data: JSON.stringify(DataTable_hanghoa),
            contentType: 'application/json; charset=utf-8',
            success: function( res ) {
              console.log(DataTable_hanghoa);
              $('#data-table1').DataTable().ajax.reload();
              $.toast({
                text : "Tạo phiếu thành công",
                position: "bottom-right",
                icon:"success",
                stack:1,
                loader:false
              });
              resetTab();
            }
          });
        }
      });
    }
  }
}
});

function getDataUnitStock(stock_id){
  var dataUnitStock = [];
  $.ajax({
    type: "GET",
    url: "{{ url('nhaptunhacungcap/getlistunitwithid') }}",
    data: {id:stock_id},
    async: false,
    success: function(response) {
      response.forEach(item=>{
        dataUnitStock.push({
          name : item.unit
        });
      });
    }
  });
  return dataUnitStock;
}

function changeFunc(id) {
  Swal.fire({
    title: 'Cảnh báo!',
    text: "Bạn chắc chắn muốn ngừng hoạt động này không?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Đồng ý!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: "POST",
        url: "{{ url('banggia/active') }}",
        data: {
          id: id
        },
        dataType: 'json',
        success: function(res) {
          $('#data-table1').DataTable().ajax.reload();
          $.toast({
            text: "Tạm dừng hoạt động xuất trả nhà cung cấp",
            position: "bottom-right",
            icon: "success",
            stack: 1,
            loader: false
          });
          var oTable = $('#data-table').dataTable();
          oTable.fnDraw(false);
        }
      });
    } else {
      swal("Cancelled Successfully");
      return false;
    }
  });
}

function unChangeFunc(id) {
  Swal.fire({
    title: 'Cảnh báo!',
    text: "Bạn chắc chắn muốn kích hoạt động này không?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Đồng ý!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: "POST",
        url: "{{ url('banggia/unactive') }}",
        data: {
          id: id
        },
        dataType: 'json',
        success: function(res) {
          $('#data-table1').DataTable().ajax.reload();
          $.toast({
            text: "Kích hoạt động thành công",
            position: "bottom-right",
            icon: "success",
            stack: 1,
            loader: false
          });
          var oTable = $('#data-table').dataTable();
          oTable.fnDraw(false);
        }
      });
    } else {
      swal("Cancelled Successfully");
      return false;
    }
  });
}

function editFunc(id){

  $.ajax({
    type:"GET",
    url: "{{ url('banggia/edit') }}",
    data: { id: id },
    dataType: 'json',
    success: function(res){
      $('.id').val(res.id);
      $('.name').val(res.name);
      $('.start_date').val(res.start_date);
      $('.end_date').val(res.end_date);
      $('.note').val(res.note);
      $.ajax({
        type:"GET",
        url: "{{ url('banggia/editstock') }}",
        data: { id: id },
        dataType: 'json',
        success: function(response){
          DataTable_hanghoa= response;
          console.log(DataTable_hanghoa);
          loadData();
                // console.log(response);

              }
            });
    }
  });
}
</script>
<script>
      // Datepicker
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
        .columns(4).search($("#searchByStatus").val())
            // .columns(1).search($("#searchBySupplier").val())
            .draw();
          }
          $(document).ready(function(){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            var table1 = $('#data-table1').DataTable({
              processing: true,
              responsive: true,
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
              ajax: "{{ url('banggia') }}",
              columns: [
              { data: 'id', name: 'id', orderable: false},
              { data: 'name', name: 'name',orderable: false },
              {
                data: null,orderable: false,
                "render": function(data,type,row) { return "<p style='cursor:pointer' class='text-primary'>Nhà thuốc Morioka</p>"}
              },
              { data: 'start_date', name: 'start_date' ,orderable: false},
              { data: 'status', name: 'status',orderable: false },
              { data: 'action', name: 'action',orderable: false},
              ]
            });

            $('#data-table1').DataTable().on('order.dt search.dt', function () {
              $('#data-table1').DataTable().column(0).nodes().each(function (cell, i) {
               cell.innerHTML = i + 1;
             });
            }).draw();

            searchDateTable();
            $('.fc-datepicker').datepicker({
              showOtherMonths: true,
              selectOtherMonths: true,
              dateFormat:'dd/mm/yy'
            });

            $(".inTab2").click(function(){
              resetTab();
              $(".tab1").addClass("hidden");
              $(".tab2").removeClass("hidden");
            })

            $("#outTab2").click(function(){
              if(DataTable_hanghoa!=''){
                Swal.fire({
                  title: 'Thông tin phiếu chưa được lưu, bạn có muốn trở về danh sách không ?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Có',
                  cancelButtonText: 'Không'
                })
              }else{
                resetTab();
              }
            })

        // $('.dataTables_info')
        // .detach()
        // .appendTo('#dsdulieu')
        // $("#outTab2").click(function(){
        //   $(".tab1").removeClass("hidden");
        //   $(".tab2").addClass("hidden");
        // })

        $('.toggle').toggles({
          on: true,
          height: 26
        });
        $("#searchProduct").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#searchData tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      })
          function resetTab(){
            $('#idPrice').val("")
            $('#namePrice').val("");
            $('#submitbanggia').trigger("reset");
            DataTable_hanghoa = [];
            loadData();
            $(".tab1").removeClass("hidden");
            $(".tab2").addClass("hidden");
          }
        </script>
        @endsection

@extends('default')
@section('title','Tạo sổ kiểm soát chất lượng định kỳ và đột xuất')
@section('content')

<div class="br-mainpanel pos-relative">
    <div class="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
            <h4 class="tx-gray-800 mg-b-5 tx-uppercase">SỔ KIỂM SOÁT CHẤT LƯỢNG ĐỊNH KỲ VÀ ĐỘT XUẤT</h4>
            <div class="d-flex">
                <div class="mg-r-10">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        id="inTab2">
                        <i class='fas fa-plus' style='font-size:15px;'></i>
                        Tạo sổ mới
                    </button>
                </div>
            </div>
        </div>
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <div class="row tx-gray-900">
                    <div class="col-md-3 col-lg-2">
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByStartDate"
                                value="<?php echo date("01/m/Y"); ?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByEndDate"
                                value="<?php echo date("d/m/Y"); ?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Nhà thuốc</label>
                        <div class="form-control">
                            <a href="#">Nhà thuốc Morioka</a>
                        </div>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-4">
                        <label for="">Nhà thuốc</label>
                        <input type="text" class="form-control"
                            placeholder="nhập mã hoặc tên hàng hóa, nhấn enter để tìm kiếm...">
                    </div>
                    <div class="col-md-8 row">
                        <div class="col-md-6">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control"
                                placeholder="Tìm kiếm theo mã hoá đơn, mã phiếu hoặc nhà cung cấp"
                                id="searchBySupplier">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" onclick="searchDateTable()"><i class="fa fa-search"
                                    aria-hidden="true"></i> Tìm kiếm</button>
                        </div>
                    </div>
                </div>

                <div class="mg-t-20">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                    <table id="data-table1" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;width:4%;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;min-width:150px;width:25%;">Tên
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;min-width:100px;width:30%;">Ngày
                                    thực hiện</th>
                                <th scope="col" class="bg-primary" style="color: white;min-width:100px;width:20%;">Lý Do
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;width:12%;">Ghi chú</th>
                                <th scope="col" class="bg-primary" style="color: white;width:11%;"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div><!-- row -->
        </div><!-- br-pagebody -->
    </div>

    <!-- tab2 -->
    <div class="pos-absolute t-0 l-0 hidden tab2" style="width:100%;">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Tạo sổ kiểm soát chất lượng định kì và đột xuất</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="mg-r-10">
                    </div>
                    <div>
                        {{-- <button class="btn btn-danger" id="outTab2"><i class='fas fa-reply' style='font-size:13px'></i>Trở về</button> --}}
                    </div>
                </div>
            </div>

        </div>
        <!-- Content -->
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <form id="submitsokiemsoat">
                <div class="shadow-base bg-white pd-15">
                    <div class="row tx-gray-900">
                        <div class="col-md-3 col-lg-2">
                            <input type="hidden" name="id" id="id">
                            <label for="">Loại thời gian</label>
                            <select class="js-example-basic-single form-control" id="ten" name="time" style="width:90%">
                                <option value="Ngày">Ngày</option>
                                <option value="Tháng">Tháng</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-lg-2">
                            <label for="">Thời gian thực hiện <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                <input onchange="myFunction()" name="date" type="text" id="time"
                                    class="form-control fc-datepicker" value="<?php echo date("d/m/Y"); ?>"
                                    placeholder="MM/DD/YYYY">
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-5">
                            <label for="">Tên</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="Sổ kiểm soát định kỳ chất lượng thuốc ngày :<?php echo date("d/m/Y"); ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="row tx-gray-900 mg-t-20">
                        <div class="col-md-4">
                            <label for="">Ghi chú</label>
                            <input type="text" class="form-control" name="note" id="detailnote">
                        </div>
                        <div class="col-md-7 row">
                            <div class="col-md-9">
                                <label for="">Lý do</label>
                                <input type="text" class="form-control" list="dinhky" name="reason" id="detailreason">
                                <datalist id="dinhky">
                                    <option value="Định kỳ">Định kỳ</option>
                                    <option value="Đột xuất">Đột xuất</option>
                                </datalist>
                                <datalist id="quality">
                                    <option value="Đạt" selected="selected">Đạt</option>
                                    <option value="Không đạt">Không đạt</option>
                                </datalist>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="shadow-base bg-white pd-15 mg-t-25">
                <div>
                    <label class="tx-gray-900 tx-bold">Thêm hàng hoá vào phiếu</label>
                    <div class="pos-relative">
                        <input autocomplete="off" onfocus="this.value=''" class="form-control" id="autoSearchImage">
                        <button class="btn btn-primary pos-absolute r-0 t-0" data-toggle="modal" data-target="#search">
                            <i class="fa fa-plus-circle mg-r-5" aria-hidden="true"></i>
                            Tìm kiếm nâng cao
                        </button>

                    </div>
                </div>
            </div>
            <div class="shadow-base bg-white pd-15 mg-t-25 col-md-12">
                <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary" style="color: white;">#</th>
                            <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                            <th scope="col" class="bg-primary" style="color: white;">Thông tin HH</th>
                            <th scope="col" class="bg-primary" style="color: white;">Số lô *</th>
                            <th scope="col" class="bg-primary" style="color: white;">HSD</th>
                            <th scope="col" class="bg-primary" style="color: white;">S.lg</th>
                            <th scope="col" class="bg-primary" style="color: white;">Dv tính</th>
                            <th scope="col" class="bg-primary"
                                style="color: white;min-width:50px;width:10%;text-align:center;">Lý do</th>
                            <th scope="col" class="bg-primary"
                                style="color: white;min-width:50px;width:10%;text-align:center;">NX chất Lượng *</th>
                            <th scope="col" class="bg-primary"
                                style="color: white;min-width:50px;width:10%;text-align:center;">Biện pháp sử lý</th>
                            <th scope="col" class="bg-primary" style="color: white;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end  mg-t-15">
                <button class="btn btn-info text-white submitPhieuNhap" style="margin-right: 10px">
                    <em class="fa fa-save"></em>
                    Lưu
                </button>
                <button class="btn btn-danger" id="outTab2"><i class='fas fa-reply' style='font-size:13px'></i>Trở
                    về</button>
            </div>
        </div><!-- row -->
    </div><!-- br-pagebody -->
    <!--  -->

    <!-- Modal tìm kiếm nâng cao-->
    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                                    <div class="toggle toggle-modern primary">
                                        <div class="toggle-slide">
                                            <div class="toggle-inner" style="width: 94px; margin-left: 0px;">
                                                <div class="toggle-on active"
                                                    style="height: 26px; width: 47px; text-indent: -8.66667px; line-height: 26px;">
                                                </div>
                                                <div class="toggle-blob"
                                                    style="height: 26px; width: 26px; margin-left: -13px;"></div>
                                                <div class="toggle-off"
                                                    style="height: 26px; width: 47px; margin-left: -13px; text-indent: 8.66667px; line-height: 26px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                                <input type="text" class="form-control"
                                    placeholder="Nhập từ khoá tìm kiếm, ấn enter để tìm">
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
                                        <a class="nav-link active" data-toggle="tab" href="#timKiem">Kết quả tìm
                                            kiếm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#daChon">Đã chọn</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="timKiem" class="tab-pane active"><br>
                                        <table id="data-table2" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Tên</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Tồn kho
                                                    </th>
                                                    <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Số ĐK</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Quy cách
                                                        đóng gói</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Hãng sản
                                                        xuất</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Hoạt chất
                                                        chính</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="daChon" class="tab-pane fade"><br>
                                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table2"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Tên</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Tồn kho
                                                    </th>
                                                    <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Số ĐK</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Quy cách
                                                        đóng gói</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Hãng sản
                                                        xuất</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Hàm lượng
                                                    </th>
                                                    <th scope="col" class="bg-primary" style="color: white;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="submitHangHoa2" class="btn btn-primary">Xong</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                class="fa fa-close"></em>Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal chi tiết-->
<div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết sổ kiểm soát chất lượng định kì và đột xuất</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">

                    <!-- Nav tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="inf" class="tab-pane active"><br>
                            <div class="row mg-t-10">
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Ngày thực hiện</label>
                                    <input class="form-control" id="detaildate" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Ngày tạo</label>
                                    <input class="form-control" disabled id="detailhour">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Tên</label>
                                    <input type="text" class="form-control" id="detailname" disabled>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                    <input type="text" class="form-control" id="detailnote" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Lý do</label>
                                    <input type="text" class="form-control" id="detailreason" disabled>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-12">
                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table4"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Hàng hóa</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Số đăng kí</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Số lô</th>
                                                <th scope="col" class="bg-primary" style="color: white;">HSD</th>
                                                <th scope="col" class="bg-primary" style="color: white;">S.Lg</th>
                                                <th scope="col" class="bg-primary" style="color: white;">DVT</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Lý do</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Nhận xét chất
                                                    lượng</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Biện pháp sử lý
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mg-t-10 " style="text-align: end;">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                        class="fa fa-close"></em>Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- end tab2 -->


</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<script>
    var DataTable_hanghoa = [];
    var DataTable_unit = [];
    var hangHoa2 = [];
    var hangHoa1 = [];
    var listLotNo = [];
    var listLotNoArr = [];
    var dataUnit = [];

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

function sumTwoNumber(a,b){
  a = replaceCurrency(a);
  b = replaceCurrency(b);
  return parseFloat(a || 0)+parseFloat(b || 0);
}
function substrac(a,b){
  return a-b;
}
function total(){

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
    $('#autoSearchImage').typeahead({
    source: function(query, process) {
      return $.get("{{ url('khachhangtralai/autosearchimage') }}", {
        query: query
    }, function(data) {
        let warehouse = [];
        dataWarehouse.forEach(function (a) {
           if (!this[a.lotno_id]) {
              this[a.lotno_id] = { lotno_id: a.lotno_id, qty: 0};
              warehouse.push(this[a.lotno_id]);
          }
          if((a.type==='import_from_supplier') || (a.type==='import_inventory') || (a.type==='return_from_customer')){
              this[a.lotno_id].qty += a.qty;
          }else{
              this[a.lotno_id].qty -= a.qty;
          }
      }, Object.create(null));
        console.log(warehouse);

        for(let i = 0; i< data.length;i++){
           for(let j = 0;j< warehouse.length;j++){
              if(data[i].lotno_id == warehouse[j].lotno_id){
                 data[i].qty = warehouse[j].qty;
             }
         }
     }
     return process(data);
 });
  },
  highlighter: function (item, data) {
      var parts = item.split('#'),
      html = '<div class="d-flex">';
      html += '<div class="tx-center">';
      html += '<img src="{{ asset('image/medicine-default.jpg') }}" alt="" width=80px>';
      html += '</div>';
      html += '<div class="mg-l-10 align-self-center">';
      html += '<div>Tên: <strong>'+data.name+'</strong></div>';
      html += '<div>Số lô: <strong>'+data.lot_no+'</strong> | HSD: <strong>'+data.exp_date+'</strong> | Số lượng: <strong>'+data.qty+'</strong> | Đon vị tính: <strong>'+data.unit+'</strong> | Giá vốn: <strong>'+data.price_import+'</strong></div>';
      html += '<div>Mã HH: <strong>'+checkRangeValue(data.id)+'</strong> | SĐK: <strong>'+(data.reg_no || '')+'</strong> | Hoạt chất: <strong style="white-space: pre-line">'+(data.ingredient || '')+'</strong></div>';
      html += '<div>Quy cách ĐG: <strong>'+(data.packaging || '')+'</strong> | Hãng SX: <strong>'+(data.made_in || '')+'</strong></div>';
      html += '</div>';
      html += '</div>';
      return html;
  },
  updater: function(result) {
    result.stock_id = result.id;
    result.discount = 0;
    result.dataunit = getDataUnitStock(result.stock_id);
    result.id = null;
    result.remedial = null;
    DataTable_hanghoa.push(result);
    loadData();
    $('#autoSearchImage').focus();
}
});


function updateData(data) {
            var key = $(data).attr("data-id");
            var value = $(data).attr("data-name");
            DataTable_hanghoa[key][value] = $(data).val();
            loadData();
            console.log(DataTable_hanghoa);
          }



          function removeData(index){
            DataTable_hanghoa.splice(index,1);
            console.log(DataTable_hanghoa);
            loadData();
          }

          function duplicatedData(index){
            DataTable_hanghoa.push({
             id : null,
             stock_id : DataTable_hanghoa[index].stock_id,
             quality_id : DataTable_hanghoa[index].quality_id,
             unit_id :DataTable_hanghoa[index].unit_id,
             lotno_id: DataTable_hanghoa[index].lotno_id,
             lot_no: DataTable_hanghoa[index].lot_no,
             exp_date: DataTable_hanghoa[index].exp_date,
             note :DataTable_hanghoa[index].note,
              name: DataTable_hanghoa[index].name,
              qty: DataTable_hanghoa[index].qty,
              unit: DataTable_hanghoa[index].unit,
              quality:DataTable_hanghoa[index].quality,
              remedial:DataTable_hanghoa[index].remedial
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
			    '<div style="width:100%;color:black;border:0" data-name="code" data-id="'+index+'" onclick="editInfoStock('+item.stock_id+')" class="form-control" >HH0000'+item.stock_id+'</div>',
			    '<div style="width:100%;color:black;border:0;" data-name="name" data-id="'+index+'" onclick="editInfoStock('+item.stock_id+')" class="form-control" >'+item.name+'</div>',
                '<input style="width:70%;" onfocus=this.value="" data-name="lot_no" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['lot_no'] || '')+'" onchange="updateData(this)" placeholder="Số lô" class="form-control" />',
               '<div style ="margin-top:10px" class="input-group"  class="form-control" type="text" data-name="exp_date" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['exp_date'] || '')+'" onchange="updateData(this)">'+item.exp_date+'</div>',
               '<input class="form-control" style="width:60%;" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['qty'] || 0)+'" onchange="updateData(this)"  />',
                '<select disabled style="width:100%;" data-name="unit" data-id="'+index+'" onchange="updateData(this)"><option value="'+item.unit+'">'+item.unit+'</option>',
                '<input class="form-control" style="width:80%;" list="dinhky" type="text" data-name="note" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['note'] || '')+'" onchange="updateData(this)"  />',
                '<input class="form-control" style="width:80%;" list="quality" type="text" data-name="quality" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['quality'] || '')+'" onchange="updateData(this)" />',
                '<input class="form-control" style="width:80%;" type="text" data-name="remedial" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['remedial'] || '')+'" onchange="updateData(this)" placeholder="Biện pháp sử lý" />',
                '<span class="fa fa-plus-square" style="color:#0753a1" data-id="'+index+'" onclick="duplicatedData('+index+')"></span> <span class="fas fa-trash-alt" style="color:#bd2130" data-id="'+index+'" onclick="removeData('+index+')"></span>'
                ]).draw( false );
                $("#data-table3 select[data-name='unit']").select2({
                  minimumResultsForSearch : -1
                });

            new AutoNumeric("input[data-name='qty'][data-id='"+index+"']", {
			minimumValue: 0,
			decimalPlaces: 0,
			modifyValueOnWheel: false,
			unformatOnHover: false
		});
        if(!(index in listLotNo)){
       listLotNo[index] = getlistlotno(item.stock_id);
   }
   $("input[data-name='lot_no']").on("click", function () {
    var id = $(this).attr("data-id");
    listLotNoArr = [];
    listLotNo[id].forEach(item=>{
        listLotNoArr.push({
            index : id,
            id : item.id,
            name : item.lot_no,
            exp_date : item.exp_date,
            price_import : item.price_import
        });
    });
    ev = $.Event("keydown")
    ev.keyCode = ev.which = 40
    $(this).trigger(ev)
    return true
});
   $("input[data-name='lot_no']").typeahead({
    minLength: 0,
    source: function(query, process) {
        return process(listLotNoArr);
    },
    highlighter: function (item, data) {
        var parts = item.split('#'),
        html = 'Số lô: '+data.name+' - HSD: '+data.exp_date+' - Giá nhập: '+data.price_import;
        return html;
    },
    updater: function(item) {
        DataTable_hanghoa[item.index].lot_no = item.name;
        DataTable_hanghoa[item.index].exp_date = item.exp_date;
        DataTable_hanghoa[item.index].price = item.price_import;
        return item;
    }
});

            index++;
            });
            }

function getdatawarehouse(){
  let dataWarehouse = [];
  $.ajax({
     type:"GET",
     url: "{{ url('hanghoa/getdatawarehouse') }}",
     dataType: 'json',
     async: false,
     success: function(res){
        dataWarehouse = res;
    }
});
  return dataWarehouse;
}
dataWarehouse = getdatawarehouse();

function getlistlotno(stock_id){
    var arrlotno = [];
    $.ajax({
        type: "GET",
        url: "{{ url('nhaptunhacungcap/getlistlotno') }}",
        data: {id:stock_id},
        async: false,
        success: function(success) {
            arrlotno = success
        }
    });
    return arrlotno;
}



getDataUnit();
function getDataUnit(){
	$.ajax({
		type:"GET",
		url: "{{ url('nhaptunhacungcap/getlistunit') }}",
		dataType: 'json',
		success: function(res){
			dataUnit = res;
		}
	})
}

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
					name : item.unit,
					unit_id: item.id
				});
			});
		}
	});
	return dataUnitStock;
}

function myFunction() {
    var x = document.getElementById("time").value;
    console.log(x);
    document.getElementById("name").value = "Sổ kiểm soát định kỳ chất lượng thuốc ngày : " + x;
    }

    function searchDateTable(){
    if($('#searchByStartDate').val()==''){
      $.toast({
       text : "Ngày tìm kiếm không được để trống",
       position: "bottom-right",
       icon:"error",
       stack:1,
       loader:false
   })
      $('#searchByStartDate').focus();
  }else if($('#searchByEndDate').val()==''){
      $.toast({
       text : "Ngày tìm kiếm không được để trống",
       position: "bottom-right",
       icon:"error",
       stack:1,
       loader:false
   })
      $('#searchByEndDate').focus();
  }else{
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex){
            if ( settings.nTable.id !== 'data-table1' ) {
                return true;
            }

            var minDay = $('#searchByStartDate').val().split("/");
            var maxDay = $('#searchByEndDate').val().split("/");
            var temp = data[2].split(" ");
            var tempDate =temp[0].split("/");

            date = new Date(tempDate[1] + '/' + tempDate[0] + '/' + tempDate[2])
            startDate = new Date(minDay[1] + '/' + minDay[0] + '/' + minDay[2]);
            endDate = new Date(maxDay[1] + '/' + maxDay[0] + '/' + maxDay[2]);

            return (
                (startDate === null && endDate === null) ||
                (startDate === null && date <= endDate) ||
                (startDate <= date && endDate === null ) ||
                (moment(date).isSameOrAfter(startDate) && moment(date).isSameOrBefore(endDate))
                ) ? true : false;
        }
        );

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
    // .columns(8).search($("#searchByStatus").val())
    // .columns(10).search($("#searchByStock").val())
    .draw();
}
};
      $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table1 = $('#data-table1').DataTable({
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
        ajax : {
            url: "{{ url('sokiemsoatdinhky') }}",
            "dataSrc" : function (json) {
        json['data'].forEach(item=>{
           item.total = total(item.qty,item.price_import,item.VAT,item.sale);
       });
        var newData = [], idArr = [];

        json['data'].forEach(function (a) {
           if (!this[a.id]) {
              this[a.id] = { id: a.id, total: 0 };
              idArr.push(this[a.id]);
          }
          this[a.id].total += parseFloat(a.total);
      }, Object.create(null));

        idArr.forEach(item=>{
           var flag = 0;
           Object.keys(json['data']).forEach(function(key) {
              if (json['data'][key]['id'] == item.id){
                 flag++;
                 if(flag==1){
                    json['data'][key]['total'] = item.total
                    newData.push(json['data'][key]);
                }
            }
        });
       })

        return newData;
    }
        },


        columns: [
        { data: 'id', name: 'id', orderable: false},
        { data: 'name', name: 'name',},
        { data: 'date', name: 'date',},
        { data: 'note', name: 'note',},
        { data: 'reason', name: 'reason',},
        { data: 'action', name: 'action'},
 ],

});

    table1.on('order.dt search.dt', function () {
        table1.column(0).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    searchDateTable();

        var table2 = $('#data-table2').DataTable({
      "responsive": true,
      "select": true,
      "lengthChange": false,
      "ordering": false,
      "info":     false,
      "pagingType": "full_numbers",
      "language": {
       "processing": "Đang xử lý...",
       "sLengthMenu": " _MENU_ Bản ghi hiển thị",
       "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
       "info": "Kết quả tìm kiếm (_TOTAL_ bản ghi) ",
       "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
       "infoFiltered": "",
       "emptyTable": "Không có dữ liệu",
       "loadingRecords": "Đang tải...",
       "select": {
        "rows": {
         "_": "Đã chọn (%d)"
     }
 },
 "paginate": {
    "first": "Đầu",
    "last": "Cuối",
    "next": "Sau",
    "previous": "Trước"
},
},
ajax : {
   url: "{{ url('khachhangtralai/autosearchimage') }}",
   "dataSrc" : function (data) {
    let warehouse = [];
    dataWarehouse.forEach(function (a) {
     if (!this[a.lotno_id]) {
      this[a.lotno_id] = { lotno_id: a.lotno_id, qty: 0};
      warehouse.push(this[a.lotno_id]);
  }
  if((a.type==='import_from_supplier') || (a.type==='import_inventory') || (a.type==='return_from_customer')){
      this[a.lotno_id].qty += a.qty;
  }else{
      this[a.lotno_id].qty -= a.qty;
  }
}, Object.create(null));
    console.log(warehouse);

    for(let i = 0; i< data.length;i++){
     for(let j = 0;j< warehouse.length;j++){
      if(data[i].lotno_id == warehouse[j].lotno_id){
       data[i].qty = warehouse[j].qty;
   }
}
}
return data;
}
},
columns: [
{ data: null,
   "render": function(data,type,row) { return "HH"+checkRangeValue(data["id"])}
},
{ data: 'name', name: 'name' },
{ data: null,
   "render": function(data,type,row) {
    if(data['qty']>0){
     return data["qty"]
 }else{
     return 0;
 }
}
},
{ data: 'unit', name: 'unit' },
{ data: 'reg_no', name: 'reg_no' },
{ data: 'packaging', name: 'packaging' },
{ data: 'made_in', name: 'made_in' },
{ data: 'ingredient', name: 'ingredient' },
]
});


        var table3 = $('#data-table3').DataTable({
		"ordering" : false,
		"paging":false,
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

    $("#submitHangHoa2" ).click(function() {
      hangHoa2 = table2.rows('.selected').data().toArray();
      table2.$('tr.selected').removeClass('selected');
      $('#search').modal('hide');
      hangHoa2.forEach(item=>{
       item.stock_id = item.id;
       item.discount = 0;
       item.id = null;
       item.price = 0;
       item.qty = 0;
       item.VAT = 0;
       item.dataunit = getDataUnitStock(item.stock_id);
       DataTable_hanghoa.push(item);
   });
      loadData();
  });


    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ui.autocomplete.prototype._renderMenu = function(ul, items) {
      var self = this;
      ul.append("<table class='table table-bordered tx-13 tx-gray-700 mg-b-0 bd'><thead><tr><th class='bg-primary' style='color: white;'>ID</th><th class='bg-primary' style='color: white;'>Tên thuốc</th><th class='bg-primary' style='color: white;'>SĐK</th><th class='bg-primary' style='color: white;'>Đơn vị tính</th><th class='bg-primary' style='color: white;'>Hoạt chất</th><th class='bg-primary' style='color: white;'>Quy cách</th><th class='bg-primary' style='color: white;'>Hãng sản xuất</th></tr></thead><tbody></tbody></table>");
      $.each( items, function( index, item ) {
        self._renderItemData(ul, ul.find("table tbody"), item );
    });
  };
  $.ui.autocomplete.prototype._renderItemData = function(ul,table, item) {
      return this._renderItem( table, item ).data( "ui-autocomplete-item", item );
  };
  $.ui.autocomplete.prototype._renderItem = function(table, item) {
      return $( "<tr class='ui-menu-item' role='presentation'></tr>" )

      .append( "<td>"+item.id+"</td>"+"<td>"+item.name+"</td>"+"<td>"+item.code+"</td>"+"<td>"+item.unit+"</td>"+"<td>"+item.main_ingredient+"</td>"+"<td>"+item.packaging+"</td>"+"<td>"+item.manufacture+"</td>" )
      .appendTo( table );
  };



  $(".submitPhieuNhap").click(function(){
    let checkLotNoName = [];
    for(let i=0;i<listLotNo.length;i++){
        checkLotNoName[i] = [];
        listLotNo[i].forEach(item=>{
            checkLotNoName[i].push(item.lot_no);
        });
    }

    if(DataTable_hanghoa==''){
      $.toast({
       text : "Chưa có hàng hoá",
       position: "bottom-right",
       icon:"error",
       stack:1,
       loader:false
   })
  }else{
    let haCheck = 0;
    for(let i =0;i<DataTable_hanghoa.length;i++){
        if(DataTable_hanghoa[i]['lot_no']==''){
            haCheck = 1;
            $.toast({
             text : "Số lô hàng hoá "+DataTable_hanghoa[i]['name']+" không được để trống",
             position: "bottom-right",
             icon:"error",
             stack:1,
             loader:false
         })
            $("input[data-name='lot_no'][data-id='"+i+"']").focus();

        }else if(!checkLotNoName[i].includes(DataTable_hanghoa[i]['lot_no'])){
            haCheck = 1;
            $.toast({
             text : "Số lô hàng hoá "+DataTable_hanghoa[i]['name']+" không tồn tại",
             position: "bottom-right",
             icon:"error",
             stack:1,
             loader:false
         })
        }else if(DataTable_hanghoa[i]['exp_date']==''){
            haCheck = 1;
            $.toast({
             text : "Hạn sử dụng hàng hoá "+DataTable_hanghoa[i]['name']+" ko được để trống",
             position: "bottom-right",
             icon:"error",
             stack:1,
             loader:false
         })
            $("input[data-name='exp_date'][data-id='"+i+"']").focus();
        }else if($("input[data-name='qty']").val()=='0'){
            haCheck = 1;
            $.toast({
               text : "Số lượng phải lớn hơn 0",
               position: "bottom-right",
               icon:"error",
               stack:1,
               loader:false
           })
            $("input[data-name='qty']").focus();
        }else if($("input[data-name='quality']").val()==''){
            haCheck = 1;
            $.toast({
               text : "Không để trống phần nhận xét chất lượng",
               position: "bottom-right",
               icon:"error",
               stack:1,
               loader:false
           })
            $("input[data-name='quality']").focus();
        }
    }
    if(haCheck==0){
        $.ajax({
          url: "{{ url('sokiemsoatdinhky/submitsokiemsoat') }}",
          type: "POST",
          data: $('#submitsokiemsoat').serialize(),
          success: function( response ) {
            DataTable_hanghoa.forEach(item => {
              item.idha = response.id;
              item.qty = replaceCurrency(item.qty);
          });
            $.ajax({
              url: "{{ url('sokiemsoatdinhky/submitphieunhap') }}",
              type: "POST",
              dataType:'json',
              contentType: 'json',
              data: JSON.stringify(DataTable_hanghoa),
              contentType: 'application/json; charset=utf-8',
              success: function( data ) {
                $('#data-table1').DataTable().ajax.reload();
                $("#submitPhieuNhap").load(
                  $.toast({
                    text : "Tạo phiếu thành công",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                }));
                resetTab();
            }
        });
        }
    });
    }

}

});


  });

  function deleteFunc(id) {
        $.ajax({
      type:"GET",
      url: "{{ url('sokiemsoatdinhky/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
            title: "Bạn chắc chắn muốn xóa nhà cung cấp["+res.name+"] này không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('sokiemsoatdinhky/{id}') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $("#data-table1").load(
                            $.toast({
                                text: "Xóa thành công nhà cung cấp",
                                position: "bottom-right",
                                icon: "success",
                                stack: 1,
                                loader: false
                            }));
                            $('#data-table1').DataTable().ajax.reload();
                    }
                });
            } else {
                swal("Cancelled Successfully");
                return false;
            }
        })
      }
        });
    }


function detailFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('sokiemsoatdinhky/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#detaildate').val(res.date);
        $('#detailhour').val(res.date);
        $('#detailname').val(res.name);
        $('#detailnote').val(res.note);
        $('#detailreason').val(res.reason);
    }
});
    $.ajax({
       type:"GET",
       url: "{{ url('sokiemsoatdinhky/editstock') }}",
       data: { id: id },
       dataType: 'json',
       success: function(response){
        var table4 = $('#data-table4').DataTable({
            "responsive": true,
            "destroy": true,
            "lengthChange": false,
            "ordering" : false,
            "paging": false,
            "info": false,
            aaData: response,
            columns: [
            { data: 'id', name: 'id'},
            { data: null,
                "render": function(data,type,row) {
                    return 'HH'+checkRangeValue(data['stock_id'])
                }
            },
            { data: 'name', name: 'name'},
            { data: 'reg_no', name: 'reg_no'},
            { data: 'lot_no', name: 'lot_no'},
            { data: 'exp_date', name: 'exp_date'},
            { data: 'qty', name: 'qty'},
            { data: 'unit', name: 'unit'},
            { data: 'note', name: 'note'},
            { data: 'quality', name: 'quality'},
            { data: 'remedial', name: 'remedial' },
               ],
               columnDefs: [
               {
                targets: 6,
                render: $.fn.dataTable.render.number(',', 0, '')
            }
            ],

        });
        table4.on('order.dt search.dt', function () {
          table4.column(0).nodes().each(function (cell, i) {
             cell.innerHTML = i + 1;
         });
      }).draw();

    }
});
}

function editFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('sokiemsoatdinhky/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#id').val(res.id);
        $('#detaildate').val(res.date);
        $('#detailhour').val(res.date);
        $('#detailname').val(res.name);
        $('#detailnote').val(res.note);
        $('#detailreason').val(res.reason);
        $.ajax({
          type:"GET",
          url: "{{ url('sokiemsoatdinhky/editstock') }}",
          data: { id: id },
          dataType: 'json',
          success: function(response){
                DataTable_hanghoa = response;
                loadData();
                console.log(response);

              }
    });
    }
});
}$(document).ready(function() {
    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      dateFormat:'dd/mm/yy'
    });
    $('.toggle').toggles({
			on: true,
			height: 26
		});
    $('#datepickerNoOfMonths').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      numberOfMonths: 2
    });

    $('#tpBasic').timepicker();
    $('#tpBasic1').timepicker();
    $('#tpBasic2').timepicker();

    $("#inTab2").click(function(){
      $(".tab1").addClass("hidden");
      $(".tab2").removeClass("hidden");
    })
})
      function resetTab(){
    $('#id').val("");
    $('.submitPhieuNhap').trigger("reset");
    $('#tenKhachHang').val("");
    $('#autoSearchImage').val("");
    DataTable_hanghoa = [];
    loadData();
    $(".tab1").removeClass("hidden");
    $(".tab2").addClass("hidden");
}

</script>
@endsection

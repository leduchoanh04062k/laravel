@extends('default')
@section('title','Tồn kho')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between" style="flex-wrap:wrap;">
            <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Tồn kho hàng hoá</h4>
            <div class="d-flex">
                <div>
                    {{-- <a class="btn btn-info" href="{{ 'tonkho/export' }}">
                    <i class='far fa-file-excel' style='font-size:14px;padding:0 2px'></i>Xuất excel file (F4)</a> --}}
                    {{-- <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example" type="button"><span>Excel</span></button> --}}
                    <button class="btn btn-info"><i class='far fa-file-excel' style='font-size:14px;padding:0 2px'></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
            <div class="row tx-gray-900">
                <div class="col-md-2 ">
                    <label for="">Từ ngày</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                        <input type="text" class="form-control fc-datepicker" id=""
                            value="<?php echo date("01/m/Y",strtotime("-1 month")); ?>" placeholder="MM/DD/YYYY">
                    </div>
                </div>
                <div class="col-md-2 ">
                    <label for="">Tới ngày</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                        <input type="text" class="form-control fc-datepicker" id="" value="<?php echo date("d/m/Y"); ?>"
                            placeholder="MM/DD/YYYY">
                    </div>
                </div>
                <div class="col-md-2 ">
                    <label for="">Trạng thái hàng hoá</label>
                    <select name="" id="" class="form-control">
                        <option value="">Tất cả</option>
                        <option value="">Kích hoạt</option>
                        <option value="">Tạm dừng</option>
                    </select>
                </div>
                <div class="col-md-2 ">
                    <label for="">Loại hàng hoá</label>
                    <select name="" id="" class="form-control">
                        <option value="">Dược phẩm</option>
                        <option value="">Vật tư y tế</option>
                        <option value="">Hàng hoá khác</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Nhóm hàng</label>
                    <select name="" id="" class="form-control">
                        <option value="">Dược phẩm</option>
                        <option value="">Vật tư y tế</option>
                        <option value="">Hàng hoá khác</option>
                    </select>
                </div>
            </div>
            <div class="row tx-gray-900 mg-t-20">
                <div class="col-md-2">
                    <label for="">Tồn kho</label>
                    <select name="" id="" class="form-control">
                        <option value="">Hàng còn tồn trong kỳ</option>
                        <option value="">Hàng đã hết</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Hạn sử dụng</label>
                    <select name="" id="" class="form-control">
                        <option value="">Sử dụng tốt</option>
                        <option value="">Sắp hết hạn</option>
                        <option value="">Đã hết hạn</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Nhà thuốc</label>
                    <div class="form-control">
                        <a href="#">Hộ Kinh Doanh Nhà thuốc Morioka</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Từ khoá tìm kiếm</label>
                    <input type="text" class="form-control" id="searchProduct"
                        placeholder="Tìm kiếm theo mã hàng hoá hoặc tên">
                </div>
                <div class="col-md-0 align-self-end">
                    <button class="btn btn-primary" id="searchData"><em class="fa fa-search"></em>Tìm kiếm</button>
                </div>
            </div>
            <div class="col-md-12 mg-t-10">
                <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                <div class="table table-scrollable" style="overflow-x:auto;margin: 5px 0 !important">
                    <table class="table table-bordered margin-bottom-0 tx-13 tx-gray-700 mg-b-0 bd display"
                        id="data-table1" style="width:100%;">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="bg-primary row-left-sticky"
                                    style="color: white;vertical-align: middle!important;position:sticky;left: 0;text-align: right;width: 33px;">
                                    #</th>
                                <th scope="col" rowspan="2" class="bg-primary row-left-sticky"
                                    style="color: white;min-width: 120px;vertical-align: middle!important;position: sticky;width: 120px;">
                                    Mã hàng hoá</th>
                                <th scope="col" rowspan="2" class="bg-primary row-left-sticky"
                                    style="color: white;min-width: 120px;vertical-align: middle!important;position: sticky;width: 120px;">
                                    Tên hàng hoá</th>
                                <th scope="col" rowspan="2" class="bg-primary row-left-sticky"
                                    style="color: white;min-width: 120px;vertical-align: middle!important;position: sticky;width: 120px;">
                                    Số lô</th>
                                <th scope="col" rowspan="2" class="bg-primary row-left-sticky"
                                    style="color: white;min-width: 120px;vertical-align: middle!important;position: sticky;width: 120px">
                                    Hạn dùng</th>
                                <th scope="col" rowspan="2" class="bg-primary"
                                    style="color: white;min-width: 80px;text-align: right;vertical-align: middle!important;position: sticky;">
                                    Đơn giá</th>
                                <th scope="col" rowspan="2" class="bg-primary"
                                    style="color: white;min-width: 70px;text-align: right;vertical-align: middle!important;position: sticky;">
                                    Đvt</th>
                                {{-- <th scope="col" rowspan="2" class="bg-primary" style="color: white;text-align: center;">Tồn hiện tại</th> --}}
                                <th scope="col" colspan="2" class="bg-primary"
                                    style="color: white;text-align: center;vertical-align: middle!important;position: sticky">
                                    Đã bán</th>
                                <th scope="col" colspan="2" class="bg-primary"
                                    style="color: white;text-align: center;vertical-align: middle!important;position: sticky">
                                    Nhập từ NCC</th>
                                <th scope="col" colspan="2" class="bg-primary"
                                    style="color: white;text-align: center;vertical-align: middle!important;position: sticky">
                                    Nhập tồn</th>
                                <th scope="col" colspan="2" class="bg-primary"
                                    style="color: white;text-align: center;vertical-align: middle!important;position: sticky">
                                    KH Trả lại</th>
                                <th scope="col" colspan="2" class="bg-primary"
                                    style="color: white;text-align: center;vertical-align: middle!important;position: sticky">
                                    Xuất Trả NCC</th>
                                <th scope="col" colspan="2" class="bg-primary"
                                    style="color: white;text-align: center;vertical-align: middle!important;position: sticky">
                                    Tổng tồn</th>
                            </tr>
                            <tr>
                                <th scope="col" class="bg-primary"
                                    style="color: white;border-left: 1px solid;min-width: 70px;text-align: right;vertical-align: middle!important;position: sticky">
                                    S.lg</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 80px;text-align: right;vertical-align: middle!important;position: sticky">
                                    Số tiền</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 70px;text-align: right;vertical-align: middle!important;position: sticky">
                                    S.lg</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 80px;text-align: right;vertical-align: middle!important;position: sticky">
                                    Số tiền</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 70px;text-align: right;vertical-align: middle!important;position: sticky">
                                    S.lg</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 80px;text-align: right;vertical-align: middle!important;position: sticky">
                                    Số tiền</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 70px;text-align: right;vertical-align: middle!important;position: sticky">
                                    S.lg</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 80px;text-align: right;vertical-align: middle!important;position: sticky">
                                    Số tiền</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 70px;text-align: right;vertical-align: middle!important;position: sticky">
                                    S.lg</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 80px;text-align: right;vertical-align: middle!important;position: sticky">
                                    Số tiền</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 70px;text-align: right;vertical-align: middle!important;position: sticky">
                                    S.lg</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width: 80px;text-align: right;vertical-align: middle!important;position: sticky">
                                    Số tiền</th>
                            </tr>
                        </thead>

                        {{-- <thead class="text-gray-dark">
              <tr class="thead-dark">
                <th scope="row" style="position: sticky;left: 0px;z-index: 10;width: 15px;background-color: white;">1</th>
                <td colspan="2" style="position: sticky;left: 33px;z-index: 10;background-color: white;">Tổng:</td>
                <td colspan="2" style="position: sticky;left: 273px;z-index: 10;background-color: white;border-right: 1px solid #ddd;"></td>
                <td colspan="3"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </thead> --}}

                    </table>
                    <div class="row">
                        <div class="col-md-8">
                            <div id="haoi"></div>
                        </div>
                        <div class="col-md-4">
                            <div style="width:94%; margin:20px 0;" class="text-right haoi">
                                <div class="fa fa-check-circle" style="color:#1caf9a;cursor:pointer"></div>
                                <label class="mg-r-8">Sử dụng tốt</label>

                                <div class="fa fa-exclamation-circle" style="color:#f0ad4e;cursor:pointer"></div>
                                <label class="mg-r-8">Sắp hết hạn</label>

                                <div class="fa fa-times-circle" style="color:#d9534f;cursor:pointer"></div>
                                <label>Quá hạn</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- row -->

        </div><!-- br-pagebody -->
        <!--  -->
    </div>
    {{-- chi tiết ton kho --}}
    <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:none;width:75%;">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">SỔ THEO DÕI XUẤT NHẬP THUỐC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="">

                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active tx-gray-800" data-toggle="tab" href="#inf">Thông tin chi tiết
                                    lô hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#history">Danh sách phiếu</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active mg-t-10" id="inf">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Mã hàng hóa </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="detailid"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Tên hàng hóa </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="detailname"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Loại hàng hóa </td>
                                            <td class="bold ng-binding"> <input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="stock_type"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Hãng sản xuất </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="manufacture"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Nước sản xuất </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="made_in"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Số đăng ký </td>
                                            <td class="bold ng-binding"> <input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="reg_no"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Hoạt chất chính </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="ingredient"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Hàm lượng </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="content"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Quy cách đóng gói </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="packaging"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Đơn vị tính cơ bản </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="unit_ct"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Số lô </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="lot_noct"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold middle" style="width: 25%;vertical-align: middle;"> Hạn sử
                                                dụng </td>
                                            <td class="bold middle" style="vertical-align: middle;">
                                                <div class="ng-binding"><input readonly type="text"
                                                        style=" border:none;outline:none;background:none; width:100%"
                                                        class="form-controller ng-binding ng-scope" id="exp_date"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 30%;">Tổng số tiền nhập </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="qty_tong"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 30%;">Tổng số lượng nhập </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="qty_ct"></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" style="width: 25%;">Giá vốn </td>
                                            <td class="bold ng-binding"><input readonly type="text"
                                                    style=" border:none;outline:none;background:none; width:100%"
                                                    class="form-controller ng-binding ng-scope" id="price_ct"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary"><em class="fa fa-file-excel-o"></em>
                                        Xuất Excel</button>
                                    <button type="button" class="btn btn-primary"><em class="fa fa-print"></em> In
                                        sổ</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                            class="fa fa-close"></em> Đóng lại</button>
                                </div>
                            </div>
                            <div id="history" class="tab-pane fade"><br>

                                <div class="mg-t-20 col-md-12">
                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table4"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" rowspan="2" class="bg-primary" style="color: white;">#
                                                </th>
                                                <th scope="col" rowspan="2" class="bg-primary"
                                                    style="color: white;vertical-align: middle!important;">Ngày nhập
                                                </th>
                                                <th scope="col" colspan="2" class="bg-primary"
                                                    style="color: white;text-align: center">Mã phiếu</th>
                                                <th scope="col" rowspan="2" class="bg-primary"
                                                    style="color: white;vertical-align: middle!important;">Diễn giả</th>
                                                <th scope="col" colspan="4" class="bg-primary"
                                                    style="color: white;text-align: center">Nhập</th>
                                                <th scope="col" colspan="4" class="bg-primary"
                                                    style="color: white;text-align: center">Xuất</th>
                                                <th scope="col" rowspan="2" class="bg-primary"
                                                    style="color: white;vertical-align: middle!important;">Tồn</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="bg-primary" style="color: white;">Nhập</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Xuất</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Số lượng</th>
                                                <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Giá</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Thành tiền</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Số lượng</th>
                                                <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Giá</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mg-t-10" style="text-align: end;">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"><em
                                                class="fa fa-file-excel-o"></em>Xuất Excel</button>
                                        <button type="button" class="btn btn-primary"><em class="fa fa-print"></em> In
                                            sổ</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                class="fa fa-close"></em> Đóng lại</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<script>
    function decialNumber(number){
    return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
  }

  function editFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('tonkho/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function([res,lotno,unit,qty]){
       $('#detailid').val("HH"+checkRangeValue(res.id));
       $('#detailname').val(res.name);
       $('#stock_type').val(res.stock_type);
       $('#manufacture').val(res.manufacture);
       $('#made_in').val(res.made_in);
       $('#reg_no').val(res.reg_no);
       $('#ingredient').val(res.ingredient);
       $('#content').val(res.content);
       $('#packaging').val(res.packaging);
       $('#lot_noct').val(lotno.lot_no);
       $('#exp_date').val(lotno.exp_date);
       $('#unit_ct').val(unit.unit);
       $('#qty_tong').val(decialNumber(qty.qty*qty.price));
       $('#qty_ct').val(new Intl.NumberFormat('en-US').format((qty.qty)));
       $('#price_ct').val(decialNumber(qty.price));

       $.ajax({
        type:"GET",
        url: "{{ url('tonkho/editstock') }}",
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
                if(data["dateSupplier"]!==null){
                  return data["dateSupplier"] +' '+data["hourSupplier"];
                }else if(data["dateCustomer"]!==null){
                  return data["dateCustomer"] +' '+data["hourCustomer"];
                }else if(data["dateInventorier"]!==null){
                  return data["dateInventorier"] +' '+data["hourInventorier"];
                }else if(data["dateDestruction"]!==null){
                  return data["dateDestruction"] +' '+data["hourDestruction"];
                }else if(data["dateSupplierReturn"]!==null){
                  return data["dateSupplierReturn"] +' '+data["hourSupplierReturn"];
                }else if(data["dateSell"]!==null){
                  return data["dateSell"] +' '+data["hourSell"];
                }else{
                  return '';
                }
              }
            },
            { data: null,
              'render':function(data,type,row){
                if (data['supplier_id']!=null) {
                  return 'PKK'+checkRangeValue(data['idSupplier']);
                }else if (data['sell_id']!=null) {
                  return 'HD'+checkRangeValue(data['idSell']);
                }else if (data['id_customer']!=null) {
                  return 'PKT'+checkRangeValue(data['idCustomer']);
                }else if (data['inventory_id']!=null) {
                  return 'PNT'+checkRangeValue(data['idInventorier']);
                }else{
                  return '';
                }
              }
            },
            { data: null,
              'render':function(data,type,row){
                if (data['destructions_id']!=null) {
                  return 'PKK'+checkRangeValue(data['idDestruction']);
                }else if (data['return_supplier_id']!=null) {
                  return 'PXH'+checkRangeValue(data['idSupplierReturn']);
                }else{
                  return '';
                }
              }
            },
            { data: 'id', name: 'id'},
                // { data: 'qty', name: 'id'},
                { data: null,
                  'render':function(data,type,row){
                    if (data['supplier_id']!=null) {
                      return +data['qty'];
                    }else if (data['sell_id']!=null) {
                      return +data['qty'];
                    }else if (data['id_customer']!=null) {
                      return +data['qty'];
                    }else if (data['inventory_id']!=null) {
                      return +data['qty'];
                    }else{
                      return '';
                    }
                  }
                },
                { data :"unit"},
                { data: null,
                  'render':function(data,type,row){
                    if (data['supplier_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price']);
                    }else if (data['sell_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price']);
                    }else if (data['id_customer']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price']);
                    }else if (data['inventory_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price']);
                    }else{
                      return '';
                    }
                  }
                },
                { data: null,
                  'render':function(data,type,row){
                    if (data['supplier_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price'] * data['qty']);
                    }else if (data['sell_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price'] * data['qty']);
                    }else if (data['id_customer']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price'] * data['qty']);
                    }else if (data['inventory_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price'] * data['qty']);
                    }else{
                      return '';
                    }
                  }
                },
                { data: null,
                  'render':function(data,type,row){
                    if (data['destructions_id']!=null) {
                      return new Intl.NumberFormat('en-US').format((data['qty']));
                    }else if (data['return_supplier_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['qty']);
                    }else{
                      return '';
                    }
                  }
                },
                { data :"unit"},
                { data: null,
                  'render':function(data,type,row){
                    if (data['destructions_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price']);
                    }else if (data['return_supplier_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price']);
                    }else{
                      return '';
                    }
                  }
                },
                { data: null,
                  'render':function(data,type,row){
                    if (data['destructions_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price'] * data['qty']);
                    }else if (data['return_supplier_id']!=null) {
                      return new Intl.NumberFormat('en-US').format(data['price'] * data['qty']);
                    }else{
                      return '';
                    }
                  }
                },
                { data: 'id', name: 'id'},
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
});

}

$(document).ready(function() {
  $('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    dateFormat:'dd/mm/yy'
  });

  var buttonCommon = {
    customize: function ( xlsx ) {
      var sheet = xlsx.xl.worksheets['sheet1.xml'];
    },
    exportOptions: {
      format: {
        header: function(data, columnindex, trDOM, node) {
          debugger;
          if(columnindex==7 || columnindex==8){
            return data + " (đã bán)";
          }else if(columnindex==9 || columnindex==10){
            return data + " (nhập từ NCC)";
          }else if(columnindex==11 || columnindex==12){
            return data + " (Nhập tồn)";
          }else if(columnindex==13 || columnindex==14){
            return data + " (KH trả lại)";
          }else if(columnindex==15 || columnindex==16){
            return data + " (xuất trả NCC)";
          }else if(columnindex==17 || columnindex==18){
            return data + " (tổng tồn)";
          }else{
            return data;
          }
        }
      }
    }
  };

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
    ajax : {
      url: "{{ url('tonkho') }}",
      "dataSrc" : function (result) {
        let data = result.data;
        let danhSachSoLo = [];
        let tonKho = [];

        data.forEach(function (a) {
          if (!this[a.lotno_id]) {
            this[a.lotno_id] = { lotno_id: a.lotno_id, qty: 0 ,arrLotno: [] };
            danhSachSoLo.push(this[a.lotno_id]);
          }
          if((a.type==='import_from_supplier') || (a.type==='import_inventory') || (a.type==='return_from_customer')){
            this[a.lotno_id].qty += parseInt(a.qty);
          }else{
            this[a.lotno_id].qty -= parseInt(a.qty);
          }
          this[a.lotno_id].arrLotno.push(a.type,a.qty);
        }, Object.create(null));

        for(let i=0;i<danhSachSoLo.length;i++){
          if(danhSachSoLo[i].arrLotno.length>2){
            for(let j=0;j<danhSachSoLo[i].arrLotno.length;j=j+2){
              for(let k=j+2;k<danhSachSoLo[i].arrLotno.length;k=k+2){
                if(danhSachSoLo[i].arrLotno[j]==danhSachSoLo[i].arrLotno[k]){
                  danhSachSoLo[i].arrLotno[j+1] = parseInt(danhSachSoLo[i].arrLotno[j+1])+ parseInt(danhSachSoLo[i].arrLotno[k+1]);
                  danhSachSoLo[i].arrLotno.splice(k,2);
                  k = k-2;
                }
              }
            }
          }
        }

        danhSachSoLo.forEach(item=>{
          var flag = 0;
          Object.keys(data).forEach(function(key) {
            if (data[key]['lotno_id'] == item.lotno_id){
              flag++;
              if(flag==1){
                data[key]['arrLotno'] = item.arrLotno;
                data[key]['qty'] = item.qty;
                tonKho.push(data[key]);
              }
            }
          });
        })

        return tonKho;
      }
    },
    columns: [
    { data: 'id', name: 'id', orderable: false},
    { data: null,
      "render": function(data,type,row) { return '<a onClick="editFunc('+data["stock_id"]+')" data-toggle="modal" data-target="#chiTiet" class="font-weight-bold" style="width:100%;color:#337ab7;cursor:pointer;text-decoration:underline">HH'+checkRangeValue(data['stock_id'])+'</a>'}
    },
    { data: null, orderable: false,
      "render": function(data,type,row) { return '<a onClick="editFunc('+data["stock_id"]+')" data-toggle="modal" data-target="#chiTiet" class="font-weight-bold" style="width:100%;color:#337ab7;cursor:pointer;text-decoration:underline">'+data['name']+'</a>'}
    },
    { data: 'lot_no', name: 'lot_no', orderable: false},
    { data: 'exp_date', name: 'exp_date', orderable: false},
    { data: null, orderable: false,
      "render": function(data,type,row){
        return decimalNumber(data['price_import'])
      }
    },
    { data: 'unit', name: 'unit', orderable: false},
    { data: null, orderable: false,
      "render": function(data,type,row) {
        if(data['arrLotno'].includes('sell')){
          let key = data['arrLotno'].indexOf('sell');
          return new Intl.NumberFormat('en-US').format(data['arrLotno'][key+1]);
        }else{
          return  0;
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row){
        if(data['arrLotno'].includes('sell')){
          let key = data['arrLotno'].indexOf('sell');
          return decimalNumber(data['arrLotno'][key+1]*data['price_import']);
        }else{
          return  decimalNumber(0);
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row) {
        if(data['arrLotno'].includes('import_from_supplier')){
          let key = data['arrLotno'].indexOf('import_from_supplier');
          return new Intl.NumberFormat('en-US').format(data['arrLotno'][key+1]);
        }else{
          return  0;
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row){
        if(data['arrLotno'].includes('import_from_supplier')){
          let key = data['arrLotno'].indexOf('import_from_supplier');
          return decimalNumber(data['arrLotno'][key+1]*data['price_import']);
        }else{
          return  decimalNumber(0);
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row) {
        if(data['arrLotno'].includes('import_inventory')){
          let key = data['arrLotno'].indexOf('import_inventory');
          return new Intl.NumberFormat('en-US').format(data['arrLotno'][key+1]);
        }else{
          return  0;
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row){
        if(data['arrLotno'].includes('import_inventory')){
          let key = data['arrLotno'].indexOf('import_inventory');
          return decimalNumber(data['arrLotno'][key+1]*data['price_import']);
        }else{
          return  decimalNumber(0);
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row) {
        if(data['arrLotno'].includes('return_from_customer')){
          let key = data['arrLotno'].indexOf('return_from_customer');
          return new Intl.NumberFormat('en-US').format(data['arrLotno'][key+1]);
        }else{
          return  0;
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row){
        if(data['arrLotno'].includes('return_from_customer')){
          let key = data['arrLotno'].indexOf('return_from_customer');
          return decimalNumber(data['arrLotno'][key+1]*data['price_import']);
        }else{
          return  decimalNumber(0);
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row) {
        if(data['arrLotno'].includes('return_from_supplier')){
          let key = data['arrLotno'].indexOf('return_from_supplier');
          return new Intl.NumberFormat('en-US').format(data['arrLotno'][key+1]);
        }else{
          return  0;
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row){
        if(data['arrLotno'].includes('return_from_supplier')){
          let key = data['arrLotno'].indexOf('return_from_supplier');
          return decimalNumber(data['arrLotno'][key+1]*data['price_import']);
        }else{
          return  decimalNumber(0);
        }
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row){
        return new Intl.NumberFormat('en-US').format(data['qty'])
      }
    },
    { data: null, orderable: false,
      "render": function(data,type,row){
        return decimalNumber(data['qty']*data['price_import'])
      }
    }
    ],
    dom: 'Blfrtip',
    buttons: [
    $.extend(true, {}, buttonCommon, {
      extend: 'excelHtml5',
      title: 'BaoCaoXuatNhapTon_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
      text:'<span class="text-light">Xuất file Excel</span>'
    }),
    ]
  });
table1.on('order.dt search.dt', function () {
  table1.column(0).nodes().each(function (cell, i) {
    cell.innerHTML = i + 1;
  });
}).draw();

$('.dt-buttons a[aria-controls="data-table1"]').detach().appendTo('.btn-info');

$("#searchProduct").keyup(function(event) {
  $("#searchData").click();
});

$("#searchData").click(function() {
  table1
  .columns(2)
  .search( $('#searchProduct').val())
  .draw();
});

});

</script>
<style>
    .haoi div {
        font-size: 120%;
    }

    .haoi label {
        font-size: 124%;
    }
</style>
@endsection

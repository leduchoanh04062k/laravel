@extends('default')
@section('title','Quản lý hóa đơn')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel" style="position:relative;">
    <div class="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between" id="inTab2"
            style="flex-wrap:wrap;">
            <h4 class="tx-gray-800 mg-b-5">Quản lý hoá đơn</h4>
            <div class="d-flex" style="flex-wrap:wrap;">
                <div class="dropdown show mg-r-10">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <em class="fa fa-file-excel-o"></em> Thêm mới từ file excel
                    </a>

                    <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary dropdown-item font-weight-bold" data-toggle="modal"
                            data-target="#exampleModal" style="color:#337ab7">
                            Bán không theo đơn
                        </button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary dropdown-item font-weight-bold" data-toggle="modal"
                            data-target="#exampleModal1" style="color:#337ab7">
                            Bán theo đơn
                        </button>
                    </div>

                    <!-- Modal bán khônng theo đơn-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: none;width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Nhập hoá đơn từ file
                                        excel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 tx-gray-900">
                                                <label for="">File excel (Dung lượng không vượt quá 10mb)</label>
                                                <div class="form-control bg-light">
                                                    <label for="upload-photo" class="form-control"
                                                        style="width:30%;">Chọn file hoặc khéo thả file vào đây để tải
                                                        nên</label>
                                                    <input type="file" name="photo" id="upload-photo"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                            <div class="mg-t-20 col-12">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#tab3">DS hợp
                                                            lệ</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#tab4">DS không hợp
                                                            lệ</a>
                                                    </li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content mg-t-10">
                                                    <div class="tab-pane active" id="tab3">
                                                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Trạng thái</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Ghi chú</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Mã HĐ</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Khách hàng</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Ngày bán</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Tổng giảm giá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Hàng hoá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">ĐVT</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Số lô</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">S.lg</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Đơn giá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">VAT</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Thành tiền</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane  fade" id="tab4">
                                                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Mã HĐ</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Khách hàng</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Ngày bán</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Giảm giá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Đơn thuốc</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Ghi chú</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Hàng hoá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Số lô</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">S.lg</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Đơn giá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">VAT</th>
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                class="fa fa-close"></em> Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal bán theo đơn-->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: none;width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Nhập hoá đơn bán theo đơn
                                        từ file excel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 tx-gray-900">
                                                <label for="">File excel (Dung lượng không vượt quá 10mb)</label>
                                                <div class="form-control bg-light">
                                                    <label for="upload-photo" class="form-control"
                                                        style="width:30%;">Chọn file hoặc khéothả file vào đây để tải
                                                        nên</label>
                                                    <input type="file" name="photo" id="upload-photo"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                            <div class="mg-t-20 col-12">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#tab5">DS hợp
                                                            lệ</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#tab6">DS không hợp
                                                            lệ</a>
                                                    </li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content mg-t-10">
                                                    <div class="tab-pane active" id="tab5">
                                                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Trạng thái</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Ghi chú</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Mã HĐ</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Khách hàng</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Ngày bán</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Tổng giảm giá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Hàng hoá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">ĐVT</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Số lô</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">S.lg</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Đơn giá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">VAT</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Thành tiền</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane  fade" id="tab6">
                                                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Mã HĐ</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Khách hàng</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Ngày bán</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Giảm giá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Đơn thuốc</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Ghi chú</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Hàng hoá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Số lô</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">S.lg</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">Đơn giá</th>
                                                                    <th scope="col" class="bg-primary"
                                                                        style="color: white;">VAT</th>
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                class="fa fa-close"></em> Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a class="btn btn-info" href="#"><i class='far fa-file-excel'
                            style='font-size:15px;padding:2px'></i> Xuất file excel</a>
                </div>
            </div>
        </div>
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <div class="row tx-gray-900">
                    <div class="col-md-3 col-xl-2">
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker"
                                value="<?php echo date("01/m/Y",strtotime("-1 month")); ?>" id="searchByStartDate"
                                placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-xl-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" value="<?php echo date("d/m/Y"); ?>"
                                id="searchByEndDate" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-xl-2">
                        <label for="">Trạng thái</label>
                        <select name="" id="searchByStatus" class="form-control">
                            <option value="Hoàn thành">Hoàn thành</option>
                            <option value="Đã hủy">Đã hủy</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-xl-2">
                        <label for="">Hoá đơn</label>
                        <select name="" id="" class="form-control">
                            <option value="">Tất cả</option>
                            <option value="">Bán theo đơn</option>
                            <option value="">Không bán theo đơn</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-xl-3">
                        <label for="">Nhà thuốc</label>
                        <div class="form-control">
                            <a href="#">Hộ Kinh Doanh Nhà thuốc Morioka</a>
                        </div>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-5">
                        <label for="">Tìm kiếm theo hàng hóa</label>
                        <input type="text" class="form-control" placeholder="Nhập tên hàng hóa để tìm kiếm"
                            id="searchByStock">
                    </div>
                    <div class="col-md-6 row">
                        <div class="col-md-10">
                            <label for="">Tìm kiếm theo thông tin hoá đơn</label>
                            <input type="text" id="searchBySupplier" class="form-control"
                                placeholder="Nhập mã hoá đơn hoặc tên khách hàng, chọn tìm kiếm hoặc ấn enter để tìm">

                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i
                                    class="fas fa-search" style="padding: 3px"></i>Tìm kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                    <table id="data-table1" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white" id="thID">#</th>
                                <th scope="col" class="bg-primary" style="color: white" id="thMa">Mã hoá đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;" id="thTenKH">Khách hàng</th>
                                <th scope="col" class="bg-primary" style="color: white;" id="thNgay">Ngày giờ bán hàng
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;" id="thTongTien">Tổng tiền</th>
                                <th scope="col" class="bg-primary" style="color: white;" id="thTongTien">Thanh toán</th>
                                <th scope="col" class="bg-primary" style="color: white;" id="thGhiChu">Ghi chú</th>
                                <th scope="col" class="bg-primary" style="color: white" id="thTrangThai">Trạng thái</th>
                                <th scope="col" class="bg-primary" style="color: white" id="thAction"></th>
                                <th style="display:none"></th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Modal chi tiết-->
                <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: none;width: 75%;vertical-align: top;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="labelDetailInvoice"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form>
                                <div class="modal-body" style="padding-top:10px">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Mã hoá đơn</label>
                                            <input type="hidden" id="detailIdSubmit">
                                            <input type="text" id="detailid" class="form-control"
                                                placeholder="Mã tự động" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Ngày bán</label>
                                            <input type="text" id="detaildate" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Trạng thái</label>
                                            <select name="" id="status" class="form-control select2 select2-container"
                                                disabled="disabled" style="width:100%">
                                                <option value="1">Hoàn thành</option>
                                                <option value="0">Đã hủy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Khách hàng</label>
                                            <input type="text" class="form-control" id="detailname" readonly="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Phương thức thanh toán</label>
                                            <select name="" id="" class="form-control select2 select2-container"
                                                style="width:100%">
                                                <option value="">Tiền mặt</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Người bán</label>
                                            <input type="text" id="detailNguoiBan" disabled='disabled'
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                            <input type="text" class="form-control" name="note" id="note1">
                                        </div>
                                        {{-- <div class="col-md-2">
                            <label for="" class="tx-gray-800 tx-bold">Bán theo đơn</label><br>
                            <div class="toggle-wrapper" id="banTheoDon">
                                <div class="toggle toggle-modern primary">
                                    <div class="toggle-slide">
                                        <div class="toggle-inner"
                                        style="width: 94px; margin-left: 0px;">
                                        <div class="toggle-on "
                                        style="height: 26px; width: 47px; text-indent: -8.66667px; line-height: 26px;">
                                    </div>
                                    <div class="toggle-blob"
                                    style="height: 26px; width: 26px; margin-left: -13px;">
                                </div>
                                <div class="toggle-off active"
                                style="height: 26px; width: 47px; margin-left: -13px; text-indent: 8.66667px; line-height: 26px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
                                    </div>
                                    <div class="mg-t-10">
                                        <ul class="nav nav-tabs" role="tablist" id="mytab">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#chiTietHoaDon"
                                                    id="rmActive">Chi tiết hoá đơn</a>
                                            </li>
                                            {{--    <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#donThuoc"
                id="nutDonThuoc">Đơn thuốc</a>
            </li> --}}
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content mg-t-10">
                                            <div class="tab-pane active" id="chiTietHoaDon">
                                                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                    id="data-table4" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" id="thDetailID" class="bg-primary"
                                                                style="color: white;">#
                                                            </th>
                                                            <th scope="col" id="thDetailName" class="bg-primary"
                                                                style="color: white;">Tên
                                                                hàng hoá</th>
                                                            <th scope="col" id="thDetailLotNo" class="bg-primary"
                                                                style="color: white;">Số
                                                                lô</th>
                                                            <th scope="col" id="thDetailQTY" class="bg-primary"
                                                                style="color: white;">Số
                                                                lượng</th>
                                                            <th scope="col" id="thDetailPrice" class="bg-primary"
                                                                style="color: white;">Đơn
                                                                giá</th>
                                                            <th scope="col" id="thDetailVAT" class="bg-primary"
                                                                style="color: white;">VAT
                                                            </th>
                                                            <th scope="col" id="thDetailDiscount" class="bg-primary"
                                                                style="color: white;">
                                                                Giảm giá</th>
                                                            <th scope="col" id="thDetailTotal" class="bg-primary"
                                                                style="color: white;">
                                                                Thành tiền</th>
                                                        </tr>
                                                    </thead>

                                                </table>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-4 col-md-push-8 d-flex"
                                                        style="margin-left: 66%;">
                                                        <div class="col-md-5 font-weight-bold">
                                                            Tổng tiền:
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input style=" border:none;outline:none;background:none;"
                                                                class="form-controller text-right ng-binding ng-scope font-weight-bold"
                                                                id="detailPrice" type="text" name="" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-4 col-md-push-8 d-flex"
                                                        style="margin-left: 66%;">
                                                        <div class="col-md-5 font-weight-bold">
                                                            Tổng VAT:
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input style=" border:none;outline:none;background:none;"
                                                                class="form-controller text-right ng-binding ng-scope font-weight-bold"
                                                                type="text" name="" id="detailVAT" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-4 col-md-push-8 d-flex"
                                                        style="margin-left: 66%;">
                                                        <div class="col-md-5 font-weight-bold">
                                                            Tổng giảm giá:
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input style=" border:none;outline:none;background:none;"
                                                                class="form-controller text-right ng-binding ng-scope font-weight-bold"
                                                                type="text" id="detailDiscount" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-4 col-md-push-8 d-flex"
                                                        style="margin-left: 66%;">
                                                        <div class="col-md-5 font-weight-bold">
                                                            Thành tiền:
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input style=" border:none;outline:none;background:none;"
                                                                class="form-controller text-right ng-binding ng-scope font-weight-bold"
                                                                type="text" name="" id="detailMoney" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-4 col-md-push-8 d-flex"
                                                        style="margin-left: 66%;">
                                                        <div class="col-md-5 font-weight-bold">
                                                            Khách trả:
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input style="border:none;outline:none;background:none;"
                                                                class="form-controller text-right ng-binding ng-scope font-weight-bold"
                                                                type="text" name="" id="detailPaid" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-4 col-md-push-8 d-flex"
                                                        style="margin-left: 66%;">
                                                        <div class="col-md-5 font-weight-bold">
                                                            Trả lại:
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text"
                                                                style="border:none;outline:none;background:none;"
                                                                class="form-controller text-right ng-binding ng-scope font-weight-bold"
                                                                id="detailDebt" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-4 col-md-push-8 d-flex"
                                                        style="margin-left: 66%;">
                                                        <div class="col-md-5 font-weight-bold">
                                                            Công nợ:
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input type="text"
                                                                style="border:none;outline:none;background:none;"
                                                                class="form-controller text-right ng-binding ng-scope font-weight-bold"
                                                                value="0.00" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="donThuoc">
                                                <div class="row mg-t-10">
                                                    <div class="col-md-3">
                                                        <label for="" class="tx-gray-800 tx-bold">Mã đơn thuốc</label>
                                                        <input type="text" class="form-control" id="checkbox">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="" class="tx-gray-800 tx-bold">Ngày kê đơn</label>
                                                        <input type="text" class="form-control fc-datepicker"
                                                            value="<?php echo date("d/m/Y"); ?>"
                                                            placeholder="MM/DD/YYYY">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="" class="tx-bold tx-gray-800">Bác sĩ kê đơn<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-12 pl-0">
                                                            <input type="hidden" name="id" id="id">
                                                            <input type="hidden" name="iddoctor" id="idDoctor">
                                                            <input type="text" name="doctor" autocomplete="off"
                                                                id="autoSearchDoctor" class="form-control"
                                                                placeholder="Nhập mã, tên, sđt để tìm kiếm nhà cung cấp">
                                                            <button type="button" id="buttonDoctor"
                                                                class="pos-absolute r-0 t-0 btn btn-primary tx-white"
                                                                data-toggle="modal" data-target="#bacsi">
                                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                            </button>
                                                            <div id="buttonDoctorClose"
                                                                class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                                    class="fa fa-times"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="" class="tx-gray-800 tx-bold">Cơ sở khám bệnh <span
                                                                style="color: red;">*</span></label>
                                                        <input type="text" class="form-control" id="medical_facility">
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-12">
                                                        <label for="" class="tx-gray-800 tx-bold">Chuẩn đoán</label>
                                                        <input type="text" class="form-control" id="diagnostic">
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-4">
                                                        <label for="" class="tx-gray-800 tx-bold">Bệnh nhân<span
                                                                style="color: red;">*</span></label>
                                                        <input type="text" class="form-control" id="patient">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="" class="tx-gray-800 tx-bold">Giới tính</label>
                                                        <div>
                                                            <input type="radio" id="nam" value="nam"
                                                                name="medical_facility"> <label for="nam"
                                                                class="tx-gray-800 ">Nam</label>
                                                            <input type="radio" id="nu" value="nu"
                                                                name="medical_facility"> <label for="nu"
                                                                class="tx-gray-800">Nữ</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="" class="tx-bold tx-gray-800">Cân nặng(kg)</label>
                                                        <input type="text" id="weight" class="form-control"
                                                            placeholder="0.0">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="" class="tx-bold tx-gray-800">Tuổi</label>
                                                        <input type="text" id="year_old" class="form-control"
                                                            placeholder="0">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="" class="tx-gray-800 tx-bold">Loại</label>
                                                        <div>
                                                            <input type="radio" id="tuoi" value="tuoi" name="species">
                                                            <label for="tuoi" class="tx-gray-800">Tuổi</label>
                                                            <input type="radio" id="thang" value="thang" name="species">
                                                            <label for="thang" class="tx-gray-800">Tháng</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-4">
                                                        <label for="" class="tx-gray-800 tx-bold">Địa chỉ<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="address">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="" class="tx-gray-800 tx-bold">Người dám hộ<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="guardian">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="" class="tx-bold tx-gray-800">CMND</label>
                                                        <input type="text" class="form-control" id="CMND">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="" class="tx-bold tx-gray-800">Điện thoại</label>
                                                        <input type="text" class="form-control" id="phone">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="" class="tx-gray-800 tx-bold">Thể BHYT</label>
                                                        <input type="text" class="form-control" id="BHYT">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mg-t-10 modal-footer" style="text-align: end;">
                                    <button type="button" id="buttonDetail" class="btn btn-primary"><em
                                            class="fa fa-save"></em>
                                        Lưu</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                            class="fa fa-close"></em> Đóng</button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- Modal chi tiết-->
            </div><!-- row -->
        </div><!-- br-pagebody -->
    </div>
    <!-- tab2 -->
    <div class="pos-absolute t-0 l-0 hidden tab2" style="width:100%;">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">KHÁCH HÀNG TRẢ LẠI > TẠO MỚI</h4>
            </div>
        </div>
        <!-- Modal thêm mới-->
        <div class="modal fade" id="exampleModal_kh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width:none;width:80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title tx-gray-800" id="labelThongTinKhachHang"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" name="thongTinKhachHang" id="thongTinKhachHang" method="post">
                        @csrf
                        <div class="modal-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#info">Thông tin khách hàng</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="info">
                                    <div class="row mg-t-10">
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Mã khách hàng</label>
                                            <input type="hidden" name="id" id="idUpdate">
                                            <input type="text" class="form-control" id="maKhachHang" readonly=""
                                                name="code" placeholder="Mã tự động">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Tên khách hàng <samp
                                                    class="text-danger">*</samp></label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Nhóm khách hàng</label>
                                            <select name="group_id" id="group_id" class="form-control select2"
                                                style="width:100%">
                                                @foreach (App\Models\CustomerGroup::all() as $groupid)
                                                <option value="{{ $groupid->id }}">
                                                    {{ $groupid->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Loại khách hàng</label>
                                            <div>
                                                <input type="radio" id="" name="customer_type" value="canhan" checked>
                                                <label for="canhan" class="tx-gray-800 mg-r-10">Cá nhân</label>
                                                <input type="radio" id="" name="customer_type" value="congty">
                                                <label for="congty" class="tx-gray-800">Công ty</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">CMND</label>
                                            <input type="text" class="form-control" id="ID_code" name="ID_code">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="" class="tx-gray-800 tx-bold">Tuổi</label>
                                            <input type="number" class="form-control" id="age" name="age">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="tx-gray-800 tx-bold">Loại</label>
                                            <div>
                                                <input type="radio" id="" name="age_type" value="tuoi" checked>
                                                <label for="tuoi" class="tx-gray-800 mg-r-10">Tuổi</label>
                                                <input type="radio" id="" name="age_type" value="thang">
                                                <label for="thang" class="tx-gray-800">Tháng</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Ngày sinh</label>
                                            <input type="date" class="form-control" id="dob" name="dob">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Giới tính</label>
                                            <div>
                                                <input type="radio" name="gender" id="gioiTinhNam" value="nam" checked>
                                                <label for="nam" class="tx-gray-800 mg-r-10">Nam</label>
                                                <input type="radio" id="gioiTinhNu" name="gender" value="nu">
                                                <label for="nu" class="tx-gray-800">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Mã số thuế</label>
                                            <input type="text" class="form-control" id="tax_number" name="tax_number">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                            <input type="number" class="form-control" id="phoneCustomer" name="phone">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Email</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Công ty</label>
                                            <input type="text" class="form-control" id="company" name="company">
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                            <input type="text" class="form-control" id="addressCustomer" name="address">
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                            <textarea cols="30" rows="1" class="form-control" id="noteCustomer"
                                                name="note"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu thông
                                tin</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                    class="fa fa-close"></em> Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal -->
        <div class="modal fade exampleModalText" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width:none;width:80%;vertical-align: top;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Hàng hoá</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="themHangHoaTong">
                        <div class="modal-body">
                            <div class="row mg-t-10">
                                <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Tên hàng hoá <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Mã hàng hoá</label>
                                    <input type="text" class="form-control" placeholder="Mã tự động">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Bán theo đơn</label><br>
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
                            <div class="row mg-t-10">
                                <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Loại hàng hoá</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Dược phẩm</option>
                                        <option value="">Vật tư y tế</option>
                                        <option value="">Hàng hoá khác</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Nhóm hàng hoá</label>
                                    <div class="pos-relative">
                                        <select name="" id="" class="form-control">
                                            <option value="">Hô hấp</option>
                                            <option value="">Vật tư y tế</option>
                                            <option value="">Hàng hoá khác</option>
                                        </select>
                                        <!-- Button cộng -->
                                        <button type="button" class="btn btn-primary pos-absolute r-0 t-0"
                                            data-toggle="modal" data-target="#cong">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>

                                    </div>

                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Số đăng ký <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="sodangky">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Hoạt chất</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Hàm lượng</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Quy cách đóng gói</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Hãng sản xuất</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Nước sản xuất</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">VAT(%)</label>
                                    <input type="number" class="form-control" placeholder="0.00">
                                </div>
                                <div class="col-md-12 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">Mô tả</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-12 tx-gray-800 tx-bold">Danh sách đơn vị tính</div>
                                <div class="col-md-12 ng-t-10">
                                    <table class="table table-borderless bd">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th scope="col" style="color: white;width: 20%;">Tên đơn vị <span
                                                        class="text-danger">*</span></th>
                                                <th scope="col" style="color: white;">Quy đổi <span
                                                        class="text-danger">*</span></th>
                                                <th scope="col" style="color: white;">Giá bán</th>
                                                <th scope="col" style="color: white;">Mã vạch</th>
                                                <th scope="col" style="color: white;">Bán hàng</th>
                                                <th scope="col" style="color: white;">Cảnh báo hết hàng</th>
                                                <th scope="col" style="color: white;">S.lg</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <select name="tendonvi" class=" form-control">
                                                        <option value="">Chọn đơn vị</option>
                                                        <option value="">Bánh</option>
                                                        <option value="">Bình</option>
                                                        <option value="">Bịch</option>
                                                    </select>
                                                </th>
                                                <td>
                                                    <input type="number" placeholder="1" disabled="disabled"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="1" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="Mã tự động" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="checkbox">
                                                </td>
                                                <td>
                                                    <input type="checkbox">
                                                </td>
                                                <td>
                                                    <input type="number" placeholder="1" class="form-control">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em>Lưu và thêm
                                mới</button>
                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em>Lưu và
                                đóng</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                    class="fa fa-close"></em>Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- nhập thông tin -->
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <form id="submitBanHang">
                    <div class="mg-b-20">
                        <div class="row">
                            <div class="col-md-4 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Khách hàng <span
                                                class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="idcustomer" id="idCustomer">
                                        <input type="text" name="name" autocomplete="off" class="form-control"
                                            id="autoSearch" placeholder="Nhập mã, tên, sđt để tìm kiếm nhà cung cấp">
                                        <button type="button" id="buttonSupplier"
                                            class="pos-absolute btn r-0 t-0 pd-7 bg-primary tx-white"
                                            data-toggle="modal" data-target="#exampleModal_kh" style="height:40px">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </button>
                                        <div id="buttonSupplierClose"
                                            class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                class="fa fa-times"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Tổng tiền</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="price_import" placeholder="0.00" class="form-control"
                                            id="totalPrice" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Tổng giảm giá</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="0.00" class="form-control" id='totalDiscount'
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Mã hoá đơn</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="id" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Ngày trả <span
                                                class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control fc-datepicker date"
                                            value="<?php echo date("Y/m/d"); ?>" name="date" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Giờ trả <span
                                                class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input id="tpBasic" type="text" value="<?php
                                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                                            echo date("H:i:s");?>" class="form-control hour" name="hour"
                                            placeholder="Set time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Tổng VAT</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="0.00" class="form-control haCurrency"
                                            id="totalVAT" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Thành tiền</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="0.00" class="form-control haCurrency"
                                            id="totalMoney" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Ngày bán</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="date" name="date" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Giờ bán</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="hour" name="hour" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Ghi chú</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="note" id="note" cols="30" rows="1"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Trả khách hàng</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="0.00" class="form-control haCurrency"
                                            id="totalPaid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Công nợ</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="0.00" class="form-control haCurrency"
                                            id="totalDebt" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Bác sĩ</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="doctor1" class="form-control" placeholder="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Bệnh nhân</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" disabled id="benhnhan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <div class="shadow-base bg-white pd-15 mg-t-25">
                <div>
                    <label for="browser" class="tx-gray-900 tx-bold">Thêm hàng hoá vào phiếu</label>
                    <div class="pos-relative">
                        <input autocomplete="off" onfocus="this.value=''" class="form-control" id="autoSearchImage">
                        <button class="btn btn-primary pos-absolute r-0 t-0" data-toggle="modal" data-target="#timKiem">
                            <i class="fa fa-plus-circle mg-r-5" aria-hidden="true"></i>
                            Tìm kiếm nâng cao
                        </button>

                    </div>
                </div>
            </div>

            <div class="shadow-base bg-white pd-15 mg-t-25 ">
                <div style="overflow-x: auto;">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:10px;width:2%;text-align:center;">#</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:50px;width:6%;text-align:center;">Mã HH</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:150px;width:18%;text-align:center;">Tên hàng hoá</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:8%;text-align:center;">Số lô(*)</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:60px;width:8%;text-align:center;">HSD</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white; min-width:60px;width:8%;text-align:center;">Đvt</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:8%;text-align:center;">S.lg trả(*)</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:9%;text-align:center;">S.tối đa</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:9%;text-align:center;">Đơn giá</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:8%;text-align:center;">Tổng giảm giá</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:5%;text-align:center;">VAT(%)</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:9%;text-align:center;">Thành tiền</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:9%;text-align:center;">Lý do trả</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:5px;width:6%;text-align:center;"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-end  mg-t-15">
                <button class="btn btn-primary mg-r-10 submitPhieuNhap"><i class='far fa-save'
                        style='font-size:13px;padding:2px'></i>Lưu</button>
                <button class="btn btn-danger" id="outTab2"><i class='fas fa-reply' style='font-size:13px'></i>Trở
                    về</button>
            </div>
        </div>
    </div>

    {{-- thêm mới bác sỹ --}}
    <!-- Modal -->
    <div class="modal fade" id="bacsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
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
                                <a class="nav-link active tx-gray-800" data-toggle="tab" href="#info">Thông tin bác
                                    sỹ</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="info">
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Mã bác sỹ</label>
                                        <input type="text" class="form-control" placeholder="Mã tự động" name="id">
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
                                        <input type="text" class="form-control" list="chuyenKhoa" name="specialist">
                                        <datalist id="chuyenKhoa">
                                            <option value="Chấn thương chỉnh hình">Chấn thương chỉnh hình</option>
                                            <option value="Cơ khớp xương">Cơ khớp xương</option>
                                            <option value="Da liễu">Da liễu</option>
                                        </datalist>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Trình độ</label>
                                        <input type="text" class="form-control" list="trinhDo" name="standard">
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
                                        <textarea name="note" id="" cols="30" rows="1" class="form-control"
                                            name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"></em>Lưu và
                            thêm mới</button>
                        <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"></em>Lưu và
                            đóng</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                class="fa fa-close"></em>Đóng</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Modal thanh toán và in hoá đơn-->
    <div class="modal fade" id="thanhToanInHd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:30%;vertical-align:top;">
            <div class="modal-content">
                <div class="modal-header bg-primary" style="border-radius: 0.3rem 0.3rem 0 0">
                    <h5 class="modal-title " id="exampleModalLabel" style="color:white;">Chọn mẫu in</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color:white" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idInHoaDon">
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="bg-info inHoaDon" id="inHoaDonBill"
                                style="padding: 8px 14px 7px 14px;color:white;border-radius:2px;cursor:pointer;">
                                In Hoá Đơn Bill
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <div class="bg-info inHoaDon" id="inHoaDonA4"
                                style="padding: 8px 14px 7px 14px;color:white;border-radius:2px;cursor:pointer;">
                                In Hoá Đơn A4
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"
                            aria-hidden="true"></em> Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- br-mainpanel -->
<script>
    var DataTable_hanghoa = [];
                    var DataTable_unit = [];
                    var hangHoa2 = [];
                    var hangHoa1 = [];
                    var listLotNo = [];
                    var listLotNoArr = [];
                    var dataUnit = [];
                    var searchLotNo = [];

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
                        a = replaceCurrency(a);
                        b = replaceCurrency(b);
                        return parseFloat(a || 0) - parseFloat(b || 0);
                    }
                    function total(a,b,c,d){
                        a = replaceCurrency(a);
                        b = replaceCurrency(b);
                        c = replaceCurrency(c);
                        d = replaceCurrency(d);
                        d = d/100;
                        var f;
                        var e;
                        if(d==0){
                            e = (b-c/a);
                        }else{
                            e = (b-c/a)+(b-c/a)*d;
                        }
                        f = (parseFloat(e*a) || 0).toFixed(2);
                        return f;
                    }
                    function qty(a,b){
                        a = replaceCurrency(a);
                        b = replaceCurrency(b);

                        return a=b;
                    }

                    function sum(arr){
                        var total = 0;
                        arr.forEach(item=>{
                            total+=parseFloat(item);
                        });
                        return total;
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

                    function checkRangeValuedoctor(value){
                        if(value == null){
                            return ""
                        }else{
                            return ""+value
                        }
                    }
                    function checkRangemedical_facility(value){
                        if(value == null){
                            return ""
                        }else{
                            return ""+value
                        }
                    }
                    function checkRangepatient(value){
                      if(value == null){
                       return ""
                   }else{
                       return ""+value
                   }
               }
               function checkRangeaddress(value){
                  if(value == null){
                   return ""
               }else{
                   return ""+value
               }
           }
           function decialNumber(number){
              return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
          }

          $('#searchByStock').typeahead({
              source: function(query, process) {
               return $.get("{{ url('nhaptunhacungcap/searchbystock') }}", {
                query: query
            }, function(data) {
                return process(data);
            });
           },
           highlighter: function (item, data) {
            var parts = item.split('#'),
            html = '<div class="d-flex" style="white-space: pre-line">';
            html += '<div class="tx-center">';
            html += '<img src="{{ asset('image/medicine-default.jpg') }}" alt="" width=80px>';
            html += '</div>';
            html += '<div class="mg-l-10 align-self-center">';
            html += '<div>Tên: <strong>'+data.name+'</strong></div>';
            html += '<div>SĐK: <strong>'+(data.reg_no || '')+'</strong> | Mã HH: <strong>HH'+checkRangeValue(data.id)+'</strong></div>';
            html += '<div>Quy cách ĐG: <strong>'+(data.packaging || '')+'</strong> | Hãng SX: <strong>'+(data.manufacture || '')+'</strong></div>';
            html += '</div>';
            html += '</div>';
            return html;
        },
        updater: function(result) {
           return result;
       }
   });

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
               result.qty = 0;
               result.dosage = 1;
               result.price = result.price_import;
               result.dataunit = getDataUnitStock(result.stock_id);
               result.id = null;
               DataTable_hanghoa.push(result);
               loadData();
               $('#autoSearchImage').focus();
           }
       });
          $('#autoSearch').typeahead({
            source:  function (query, process) {
                return $.get(
                    "{{ url('khachhangtralai/autosearch') }}",
                    { query: query },
                    function (data) {
                        data.forEach(item=>{
                            item.ten = item.name
                            item.name = item.name+' '+item.phone
                        })
                        return process(data);
                    });
            },
            highlighter: function (item, data) {
                if(data.phone){
                    var parts = item.split('#'),
                    html = '<div><strong>'+data.ten+' ('+data.phone+')'+'</strong></div>';
                }else{
                    var parts = item.split('#'),
                    html = '<div><strong>'+data.ten+'</strong></div>';
                }
                return html;
            },
            updater: function(item) {
                $('#idCustomer').val(item.id);
                inputCustomer();
                return item.ten;
            }
        });


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

          $('#autoSearchDoctor').typeahead({
              source:  function (query, process) {
               return $.get(
                "{{ url('banhang/autosearchdoctor') }}",
                { query: query },
                function (data) {
                 return process(data);
             });
           },
           updater: function(item) {
               console.log(item);
               $('#idDoctor').val(item.id);
               inputDoctor();
               return item;
           }
       });

          function inputDoctor(){
              $('#autoSearchDoctor').css({'color':'#23527c' });
              $("#buttonDoctor").addClass("hidden");
              $("#buttonDoctorClose").removeClass("hidden");
              $('#buttonDoctorClose').on('click', function(){
               $('#idDoctor').val("");
               $('#autoSearchDoctor').val("");
               $('#autoSearchDoctor').trigger('propertychange.typeahead');
               $('#autoSearchDoctor').removeAttr("style");
               $("#buttonDoctor").removeClass("hidden");
               $("#buttonDoctorClose").addClass("hidden");
           });
              $('#autoSearchDoctor').on('click', function(){
               if($('#autoSearch').val()!=''){
                $('#exampleModal').modal('show');
                $.ajax({
                 type: "GET",
                 url: "{{ url('bacsi/{id}/edit') }}",
                 data: {id:$("#idDoctor").val()},
                 success: function(res) {

                 }
             });
            }
        });
          }

          function inputCustomer(){
              $('#autoSearch').css({'color':'#23527c' , 'text-decoration':'underline', 'cursor':'pointer'});
              $("#autoSearch").addClass("font-weight-bold");
              $("#buttonSupplier").addClass("hidden");
              $("#buttonSupplierClose").removeClass("hidden");
              $('#buttonSupplierClose').on('click', function(){
               $('#idCustomer').val("");
               $('#autoSearch').val("");
               $('#idUpdate').val("");
               $("#autoSearch").removeClass("font-weight-bold");
               $('#autoSearch').trigger('propertychange.typeahead');
               $('#autoSearch').removeAttr("style");
               $("#buttonSupplier").removeClass("hidden");
               $("#buttonSupplierClose").addClass("hidden");
               $('#thongTinKhachHang').trigger("reset");
           });
              $('#autoSearch').on('click', function(){
                if($('#autoSearch').val()!='' && $('#idCustomer').val()!=''){
                    $('#exampleModal_kh').modal('show');
                    $.ajax({
                        type: "GET",
                        url: "{{ url('khachhang/{id}/edit') }}",
                        data: {id:$("#idCustomer").val()},
                        success: function(res) {
                            $('#labelThongTinKhachHang').text('');
                            $('#labelThongTinKhachHang').text('Thông tin khách hàng: '+res.name+' (KH'+checkRangeValue(res.id)+')')
                            $('#idUpdate').val(res.id);
                            $('#maKhachHang').val("KH"+checkRangeValue(res.id));
                            $('#name').val(res.name);
                            $('#group_id').val(res.group_id);
                            $('#ID_code').val(res.ID_code);
                            $('#age').val(res.age);
                            $('#dob').val(res.dob);
                            $('#tax_number').val(res.tax_number);
                            $('#phoneCustomer').val(res.phone);
                            $('#email').val(res.email);
                            $('#company').val(res.company);
                            $('#addressCustomer').val(res.address);
                            $('#noteCustomer').val(res.note);
                            if(res.customer_type=='canhan'){
                                $('input[value="canhan"]').attr('checked', true);
                            }else{
                                $('input[value="congty"]').attr('checked', true);
                            }
                            if(res.age_type=='tuoi'){
                                $('#thongTinKhachHang input[value="tuoi"]').attr('checked', true);
                            }else{
                                $('#thongTinKhachHang input[value="thang"]').attr('checked', true);
                            }
                            if(res.gender=='nam'){
                                $('#gioiTinhNam').attr('checked', true);
                            }else{
                                $('#gioiTinhNu').attr('checked', true);
                            }
                        }
                    });
                }
            });
          }
          $('#thongTinKhachHang').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('khachhang') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    $("#thongTinKhachHang").load(
                        $.toast({
                            text: "Lưu dữ liệu thành công",
                            position: "bottom-right",
                            icon: "success",
                            stack: 1,
                            loader: false
                        }));
                    $('#exampleModal_kh').modal('hide');
                    $('#thongTinKhachHang').trigger("reset");
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

          $('#buttonSupplier').click(function(){
            $('#labelThongTinKhachHang').text('');
            $('#labelThongTinKhachHang').text('Thêm mới khách hàng');
        })

          function updateData(data) {
              var key = $(data).attr("data-id");
              var value = $(data).attr("data-name");

              let inputDiscount = replaceCurrency($("input[data-name='discount'][data-id='"+key+"']").val());
              let inputTotal = replaceCurrency($("input[data-name='total'][data-id='"+key+"']").val());
              if(parseFloat(inputDiscount)>parseFloat(inputTotal)){
               $.toast({
                text : "Tổng giảm giá vượt quá thành tiền",
                position: "bottom-right",
                icon:"info",
                stack:1,
                loader:false
            })
               $("input[data-name='discount'][data-id='"+key+"']").val(0);
           }
           let qtyMax = replaceCurrency($("input[data-name='dosage'][data-id='"+key+"']").val());
           let qtyAllow = replaceCurrency($("input[data-name='qty'][data-id='"+key+"']").val());
           if(parseFloat(qtyAllow)>parseFloat(qtyMax)){
               $.toast({
                text : "Số lượng trả không được vượt quá số lượng mua",
                position: "bottom-right",
                icon:"info",
                stack:1,
                loader:false
            })
               $("input[data-name='qty'][data-id='"+key+"']").val($("input[data-name='dosage'][data-id='"+key+"']").val());
           }

           DataTable_hanghoa[key][value] = $(data).val();
           loadData();
           if(parseFloat(qtyAllow)>parseFloat(qtyMax)){
            $("input[data-name='qty'][data-id='"+key+"']").focus();
        }
        if(parseFloat(inputDiscount)>parseFloat(inputTotal)){
         $("input[data-name='discount'][data-id='"+key+"']").focus();
     }
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
   unit_id : DataTable_hanghoa[index].unit_id,
   lotno_id : DataTable_hanghoa[index].lotno_id,
   sell_id : DataTable_hanghoa[index].sell_id,
   name: DataTable_hanghoa[index].name,
   lot_no: DataTable_hanghoa[index].lot_no,
   exp_date: DataTable_hanghoa[index].exp_date,
   unit: DataTable_hanghoa[index].unit,
   dataunit: DataTable_hanghoa[index].dataunit,
   qty: DataTable_hanghoa[index].qty,
   dosage: DataTable_hanghoa[index].dosage,
   price: DataTable_hanghoa[index].price,
   discount: DataTable_hanghoa[index].discount,
   VAT: DataTable_hanghoa[index].VAT,
   VAT_sell: DataTable_hanghoa[index].VAT_sell,
   note: DataTable_hanghoa[index].note
});
  loadData();
}

function loadData(){
  var index=0;
  $('#data-table3').DataTable().clear().draw();
  DataTable_hanghoa.forEach(item=>{
   $('#data-table3').DataTable().row.add([
    '<div style="width:100%;border:0" data-name="id" data-id="'+index+'" class="form-control" >'+(index+1)+'</div>',
    '<div style="width:100%;color:black;font-size:15px;border:0" data-name="code" data-id="'+index+'" class="form-control font-weight-bold" >HH'+checkRangeValue(item.stock_id)+'</div>',
    '<div style="width:100%;color:black;font-size:15px;border:0;" data-name="name" data-id="'+index+'" class="form-control font-weight-bold" >'+item.name+'</div>',
    '<input style="width:70%;" onfocus=this.value="" data-name="lot_no" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['lot_no'] || '')+'" onchange="updateData(this)" placeholder="Số lô" class="form-control" />',
    '<div style ="margin-top:10px" class="input-group"  class="form-control" type="text" data-name="exp_date" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['exp_date'] || '')+'" onchange="updateData(this)">'+item.exp_date+'</div>',
    '<select style="width:100%;" onchange="updateData(this)" data-name="unit" data-id="'+index+'" >'+getUnit(DataTable_hanghoa[index].dataunit,DataTable_hanghoa[index].unit)+'</select>',
    '<input class="form-control" style="width:80%;" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['qty'] || 0)+'" onchange="updateData(this)" />',
    '<input class="form-control" style="width:80%;" type="text" data-name="dosage" data-id="'+index+'" value="'+DataTable_hanghoa[index]['dosage']+'" readonly/>',
    '<input class="form-control" style="width:80%;" type="text" data-name="price" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['price'] || 0)+'" onchange="updateData(this)" />',
    '<input class="form-control" style="width:80%;" type="text" data-name="discount" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['discount'] || 0)+'" onchange="updateData(this)"/>',
    '<input class="form-control" style="width:80%;" type="text" data-name="VAT" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['VAT'] || 0)+'" onchange="updateData(this)" />',
    '<input class="form-control" style="width:100%;border:0;background:none" type="text" data-name="total" data-id="'+index+'" value="'+new Intl.NumberFormat('en-US').format(total(DataTable_hanghoa[index].qty || 0,DataTable_hanghoa[index].price || 0,DataTable_hanghoa[index].discount || 0,DataTable_hanghoa[index].VAT || 0))+'" onchange="updateData(this)" disabled />',
    '<input  class="form-control" style="width:80%;" type="text" data-name="note" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['note'] || '')+'" onchange="updateData(this)" placeholder="Lý do" />',
    '<span class="fa fa-plus-square" style="color:#0753a1" data-id="'+index+'" onclick="duplicatedData('+index+')"></span> <span class="fas fa-trash-alt" style="color:#bd2130" data-id="'+index+'" onclick="removeData('+index+')"></span>'
    ]).draw( false );

   $("#data-table3 select[data-name='unit']").select2({
    minimumResultsForSearch : -1
});

   new DateTime($("input[data-name='exp_date'][data-id='"+index+"']"),{
    format: 'DD/MM/YYYY',
});
   new AutoNumeric("input[data-name='qty'][data-id='"+index+"']", {
    minimumValue: 0,
    decimalPlaces: 0,
    modifyValueOnWheel: false,
    unformatOnHover: false
});
   new AutoNumeric("input[data-name='price'][data-id='"+index+"']",{
    minimumValue: 0,
    modifyValueOnWheel: false,
    unformatOnHover: false
});
   new AutoNumeric("input[data-name='discount'][data-id='"+index+"']",{
    minimumValue: 0,
    modifyValueOnWheel: false,
    unformatOnHover: false
});
   new AutoNumeric("input[data-name='VAT'][data-id='"+index+"']",{
    minimumValue: 0,
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
     DataTable_hanghoa[item.index].lotno_id = item.id;
     DataTable_hanghoa[item.index].exp_date = item.exp_date;
     DataTable_hanghoa[item.index].qty = '0';
     DataTable_hanghoa[item.index].price = item.price_import;
     return item;
 }
});
index++;
});

var sumTotal = $("input[data-name='total']")
.map(function(){return replaceCurrency($(this).val());}).get();
var fixTotalMoney = new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(sum(sumTotal));
$('#totalMoney').val(fixTotalMoney);
const element = AutoNumeric.getAutoNumericElement('#totalPaid');
element.set(fixTotalMoney);


var sumDiscount = $("input[data-name='discount']")
.map(function(){return replaceCurrency($(this).val());}).get();
$('#totalDiscount').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(sum(sumDiscount)));

var sumQty = $("input[data-name='qty']")
.map(function(){return replaceCurrency($(this).val());}).get();
var sumPrice = $("input[data-name='price']")
.map(function(){return replaceCurrency($(this).val());}).get();
var sumArr = sumQty.map((a, i) => parseFloat(a)*parseFloat(sumPrice[i]));
$('#totalPrice').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(sum(sumArr)));

var tempMoney = parseFloat(replaceCurrency($('#totalMoney').val()));
var tempPrice = parseFloat(replaceCurrency($('#totalPrice').val()));
var tempDiscount = parseFloat(replaceCurrency($('#totalDiscount').val()));
var tempPaid = parseFloat(replaceCurrency($('#totalPaid').val()));
$('#totalVAT').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(tempMoney-tempPrice+tempDiscount));

$('#totalDebt').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(substrac(tempMoney,tempPaid)));
}

$('#totalPaid').change(function(){
    var tempMoney = parseFloat(replaceCurrency($('#totalMoney').val()));
    var tempPaid = parseFloat(replaceCurrency($('#totalPaid').val()));

    if(tempPaid>tempMoney){
        AutoNumeric.getAutoNumericElement('#totalPaid').set($('#totalMoney').val());
        $('#totalDebt').val('0.00');
    }else{
        $('#totalDebt').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(tempMoney-tempPaid));
    }
})





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
				var temp = data[3].split(" ");
				var tempDate =temp[0].split("/");

				date = new Date(tempDate[1] + '/' + tempDate[0] + '/' + tempDate[2])
				startDate = new Date(minDay[1] + '/' + minDay[0] + '/' + minDay[2]);
				endDate = new Date(maxDay[1] + '/' + maxDay[0] + '/' + maxDay[2]);

				return (
					(startDate === null && endDate === null) ||
					(startDate === null && date <= endDate) ||
					(startDate <= date && endDate === null ) ||
					(startDate <= date && date <= endDate )
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
					(~data[2].toLowerCase().indexOf(supplierName))
					) ? true : false;
			}
			);

		$('#data-table1').DataTable()
		.columns(7).search($("#searchByStatus").val())
		.columns(9).search($("#searchByStock").val())
		.draw();
	}
};

$(document).ready(function(){
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
			url: "{{ url('hoadon') }}",
			"dataSrc" : function (json) {
				json['data'].forEach(item=>{
					item.total = (item.VAT*item.price*item.qty/100)+(item.price*item.qty)
				});

				var newData = [], idArr = [];

				json['data'].forEach(function (a) {
					if (!this[a.id]) {
						this[a.id] = { id: a.id, total: 0,stockName : '' };
						idArr.push(this[a.id]);
					}
					this[a.id].total += parseFloat(a.total);
                    this[a.id].stockName += a.stockName + ' ';
                }, Object.create(null));

				idArr.forEach(item=>{
					var flag = 0;
					Object.keys(json['data']).forEach(function(key) {
						if (json['data'][key]['id'] == item.id){
							flag++;
							if(flag==1){
								json['data'][key]['total'] = item.total;
                                json['data'][key]['stockName'] = item.stockName;
                                newData.push(json['data'][key]);
                            }
                        }
                    });
				})
				console.log(newData);
				return newData;
			}
		},
		columns: [
		{ data: 'id', name: 'id', orderable: false},
		{ data: null,
			"render": function(data,type,row) {
             return "HD"+checkRangeValue(data["id"]);
         }
     },
     { data: null,orderable: false,
       "render": function(data,type,row) {
        if(data['name'] ==null){
         return 'Khách lẻ'
     }else{
         return data["name"]
     }
 }
},
{ data: null,orderable: false,
   "render": function(data,type,row) { return data["date"] + ' '+data["hour"]}
},
{ data: null, orderable: false,
   "render": function(data,type,row) { return decialNumber(data["total"])}
},
{ data: null, orderable: false,
   "render": function(data,type,row) {
    if(data["paid"]>data["total"]){
        return decialNumber(data["total"]);
    }else{
       return decialNumber(data["paid"]);
   }
}
},
{ data: 'note', name: 'note' , orderable: false},
{ data: 'status', name: 'status', orderable: false },
{ data: 'action', name: 'action',orderable: false},
{ data: 'stockName', name: 'stockName', orderable: false}
],columnDefs: [
{
   targets: 4,
   render: $.fn.dataTable.render.number(',', '')
},
{
   targets: 5,
   render: $.fn.dataTable.render.number(',', '')
},
{
    targets: [ 9 ],
    visible: false
}
],
});

	table1.on('order.dt search.dt', function () {
		table1.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();
	searchDateTable();


	$('.fc-datepicker').datepicker({
		dateFormat:'dd/mm/yy'
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

    table3.on('order.dt search.dt', function () {
      table3.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
       cell.innerHTML = i + 1;
   });
  }).draw();

    $("#inTab2").click(function() {
      $("#tab1").addClass("hidden");
      $("#tab2").removeClass("hidden");
      console.log("hello");
  })



    $("#outTab2").click(function(){
       if(DataTable_hanghoa!=''){
        Swal.fire({
         title: "Thông tin phiếu chưa được lưu, bạn có muốn trở về danh sách không ?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Đồng ý!'
     })
    }else{
        resetTab();
    }
})

    $('#datepickerNoOfMonths').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      numberOfMonths: 2,
  });
    $('.toggle').toggles({
      on: true,
      height: 26
  });
    $("#banTheoDon").click(function(){
      $("#nutDonThuoc").toggle();
  })

    $('#tpBasic').timepicker();
    $('#tpBasic1').timepicker();
    $('#tpBasic2').timepicker();
    $(function(){
      let formDonThuoc = $("#formDonThuoc");
      if(formDonThuoc.length){
       formDonThuoc.validate({
        rules:{
         doctor:{
          required:true
      },
      coSoKhamBenh:{
          required:true
      },
      benhNhan:{
          required:true
      },
      diaChi:{
          required:true
      },
      nguoiDamHo:{
          required:true
      }
  },
  messages:{
     doctor:{
      required:'Vui lòng điền thông tin'
  },
  coSoKhamBenh:{
      required:'Vui lòng điền thông tin'
  },
  benhNhan:{
      required:'Vui lòng điền thông tin'
  },
  diaChi:{
      required:'Vui lòng điền thông tin'
  },
  nguoiDamHo:{
      required:'Vui lòng điền thông tin'
  }
}
})
   }
})
})

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

function getUnit(list,selected){
	var unitList = [];
	if(Array.isArray(list)){
		list.forEach(item => {
			if(item.name == selected){
				unitList = unitList + '<option value="'+item.name+'" selected>'+item.name+'</option>';
			}else{
				unitList = unitList + '<option value="'+item.name+'">'+item.name+'</option>';
			}
		});
	}else{
		unitList = '<option value="'+list+'">'+list+'</option>';
	}
	return unitList;
}

// $('#submitHanghoa').submit(function(e) {
//   e.preventDefault();
//   var formData = new FormData(this);
//   $.ajax({
//     type:'POST',
//     url: "{{ url('banhang')}}",
//     data: formData,
//     cache:false,
//     contentType: false,
//     processData: false,
//     success: (data) => {
//       $('#data-table1').DataTable().ajax.reload();
//       $("input[name=note]").val('');
//       $("#thanhToan").load(
//         $.toast({
//           text : "Lưu dữ liệu thành công",
//           position: "bottom-right",
//           icon:"success",
//           stack:1,
//           loader:false
//         }));
//       var oTable = $('#data-table1').dataTable();
//       oTable.fnDraw(false);
//     },
//     error: function(data){
//       console.log(data);
//     }
//   });
// });

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
			text : "Hóa đơn đang trống, không thể thực hiện được thanh toán",
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
			}else if(parseInt(replaceCurrency(DataTable_hanghoa[i]['qty']))==0){
                haCheck = 1;
                $('input[data-name="qty"][data-id="'+i+'"]').focus();
                $.toast({
                    text : "Số lượng trả phải lớn hơn 0",
                    position: "bottom-right",
                    icon:"error",
                    stack:1,
                    loader:false
                })
            }
        }

        if(haCheck==0){
         $.ajax({
            url: "{{ url('khachhangtralai/submitkhachhang') }}",
            type: "POST",
            data: $('#submitBanHang').serialize()+"&medical_facility="+($('#medical_facility').val())+"&diagnostic="+($('#diagnostic').val())
            +"&patient="+($('#patient').val())+"&address="+($('#address').val())+"&guardian="+($('#guardian').val())
            +"&year_old="+($('#year_old').val())+"&weight="+($('#weight').val())+"&CMND="+($('#CMND').val())+"&phone="+($('#phone').val())+"&BHYT="+($('#BHYT').val())+"&checkbox="+($('#checkbox').val())+"&sale="+replaceCurrency($('#sale').val())+"&price_import="+replaceCurrency($('#price_import').val())
            +"&totalpaid="+replaceCurrency($('#totalPaid').val()),
            success: function( response ) {
             DataTable_hanghoa.forEach(item => {
              item.idha = response.id;
              item.qty = replaceCurrency(item.qty);
              item.price = replaceCurrency(item.price);
              item.discount = replaceCurrency(item.discount);
              item.VAT = replaceCurrency(item.VAT);
              item.type = "return_from_customer";
          });

             $.ajax({
              url: "{{ url('khachhangtralai/submitphieunhap') }}",
              type: "POST",
              dataType:'json',
              contentType: 'json',
              data: JSON.stringify(DataTable_hanghoa),
              contentType: 'application/json; charset=utf-8',
              success: function( response ) {
               console.log(DataTable_hanghoa);
               $.toast({
                text : "Tạo phếu thành công hóa đơn",
                position: "bottom-right",
                icon:"success",
                stack:1,
                loader:false
            });
               resetTab();
               dataWarehouse = getdatawarehouse();
           }
       });
         }
     })
     }
 }
});


function detailFunc(id){
	$.ajax({
		type:"GET",
		url: "{{ url('banhang/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
            $('#detailIdSubmit').val(res.id);
            $('#detailid').val("HD"+checkRangeValue(res.id));
            $('#detailname').val(res.name || "Khách lẻ");
            $('#labelDetailInvoice').text('');
            $('#labelDetailInvoice').text('Hoá đơn: '+$('#detailname').val()+' - '+$('#detailid').val());
            $('#detaildate').val(res.date);
            $('#autoSearchDoctor').val(res.doctor);
            $('#medical_facility').val(res.medical_facility);
            $('#patient').val(res.patient);
            $('#address').val(res.address);
            $('#guardian').val(res.guardian);
            $('#diagnostic').val(res.diagnostic);
            $('#weight').val(res.weight);
            $('#year_old').val(res.year_old);
            $('#CMND').val(res.CMND);
            $('#phone').val(res.phone);
            $('#BHYT').val(res.BHYT);
            $('#note1').val(res.note);
            /*if(res.male_female == 'nam'){
                document.getElementById("nam").checked = true;
            }else{
                document.getElementById("nu").checked = true;
            }
            if(res.species == 'tuoi'){
                document.getElementById("tuoi").checked = true;
            }else{
                document.getElementById("thang").checked = true;
            }*/
            $('#detailPaid').val(decialNumber(res.paid));
            $('#detailDiscount').val(decialNumber(res.sale));
            console.log(res);
            $.ajax({
              type:"GET",
              url: "{{ url('banhang/editstock') }}",
              data: { id: id },
              dataType: 'json',
              success: function(response){
                $('#detailNguoiBan').val(response[0].username);
                var detailPrice = response.reduce((a,b)=>
                    a+b.qty*parseFloat(b.price),0
                    );
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
                      return data['name'] +'</br><div class="font-weight-bold">HH'+checkRangeValue(data['stock_id'])+'</div>'
                  }
              },
              { data: null,
                 "render": function(data,type,row) {
                  return data['lot_no'] +'</br><span class="font-weight-bold">HSD: </span>'+data['exp_date']
              }
          },
          { data: null,
             "render": function(data,type,row) {
              return data['qty'] +' <span class="font-weight-bold">('+data['unit']+')'
          }
      },
      { data: null, orderable: false,
         "render": function(data,type,row) { return decialNumber(data["price"])}
     },
     { data: null,
        "render": function(data,type,row) {
            return data['VAT']+'%'
        }
    },
    { data: null,
     "render": function(data,type,row) {
      if(data['price'] == 0){
       return '0.00'
   }else{
       let chuMeo = data["price"]*data["qty"]+(data["price"]*data["qty"]*data['VAT']/100);
       let chuMeoCon = (chuMeo/detailPrice)*res.sale;
       return decialNumber(chuMeoCon);
   }
}
},
{ data: null,
 "render": function(data,type,row) {
    if(data['price'] == 0){
       return '0.00'
   }else{
    let chuMeo = data["price"]*data["qty"]+(data["price"]*data["qty"]*data['VAT']/100);
    let chuMeoCon = (chuMeo/detailPrice)*res.sale;
    return new Intl.NumberFormat('en-US',{
      style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
  }).format(chuMeo-chuMeoCon)}
}
},
],
columnDefs: [
{
 targets: 4,
 render: $.fn.dataTable.render.number(',', 0, '')
},
{
 targets: 6,
 render: $.fn.dataTable.render.number(',', '')
},
{
 targets: 5,
 render: $.fn.dataTable.render.number(',', 0, '')
}
],
});
table4.on('order.dt search.dt', function () {
    table4.column(0).nodes().each(function (cell, i) {
    cell.innerHTML = i + 1;
});
}).draw();

// var detailDiscount = response.reduce((a, b)=>
// 	parseFloat(a) + parseFloat(b.sale/2),0
// 	);
var detailVAT = response.reduce((a, b)=>
parseFloat(a) + parseFloat((b.qty*b.price*b.VAT/100)),0
);
var tempDiscount = parseFloat(replaceCurrency($('#detailDiscount').val()));
var detailMoney = response.reduce((a)=>
parseFloat((detailPrice - tempDiscount + detailVAT)),0
);
$('#detailPrice').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailPrice));
//    $('#detailDiscount').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailDiscount));
$('#detailVAT').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailVAT));
$('#detailMoney').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailMoney));
var tempMoney = parseFloat(replaceCurrency($('#detailMoney').val()));
var tempPrice = parseFloat(replaceCurrency($('#detailPrice').val()));

var tempPaid = parseFloat(replaceCurrency($('#detailPaid').val()));
$('#detailDebt').val(decialNumber(substrac(tempPaid,tempMoney)));
console.log(response);
}
    });
}
});
}



function changeFunc1(id) {
	Swal.fire({
		title: 'Cảnh báo!',
		title: "Hệ thống sẽ huỷ các phiếu chi có liên quan đến phiếu PN0000"+id+ " Bạn chắc chắn muốn huỷ phiếu này?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Đồng ý!'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: "{{ url('banhang/active') }}",
				data: {
					id: id
				},
				dataType: 'json',
				success: function(res) {
					$("#data-table1").load(
						$.toast({
							text: "Tạm hủy hóa đơn này",
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
	});
}

function printFunc(id){
    $('#idInHoaDon').val(id);
}

$('.inHoaDon').click(function(){
    $(this).data('clicked', true);
    $('#thanhToanInHd').modal('hide');
    $.ajax({
      type:"GET",
      url: "{{ url('banhang/edit') }}",
      data: { id: $('#idInHoaDon').val() },
      dataType: 'json',
      success: function(res){
        $('#detailPaid').val(decialNumber(res.paid));
        $('#detailDiscount').val(decialNumber(res.sale));
        console.log(res);
        $.ajax({
            type:"GET",
            url: "{{ url('banhang/editstock') }}",
            data: { id: $('#idInHoaDon').val() },
            dataType: 'json',
            success: function(response){
                var detailPrice = response.reduce((a,b)=>
                    a+b.qty*parseFloat(b.price),0
                    );
                    // var detailDiscount = response.reduce((a, b)=>
                    // parseFloat(a) + parseFloat(b.sale/2),0
                    // );
                    var detailVAT = response.reduce((a, b)=>
                        parseFloat(a) + parseFloat((b.qty*b.price*b.VAT/100)),0
                        );
                    var tempDiscount = parseFloat(replaceCurrency($('#detailDiscount').val()));
                    var detailMoney = response.reduce((a)=>
                        parseFloat((detailPrice - tempDiscount + detailVAT)),0
                     );
                    var tempPaid = parseFloat(replaceCurrency($('#detailPaid').val()));
                    var detailMoneyTotal = response.reduce((a)=>
                        parseFloat((tempPaid - detailMoney)),0
                     );
                    if($('#inHoaDonA4').data('clicked')) {
                        var mywindow = window.open('', 'PRINT', 'height=600,width=800');
                        mywindow.document.write(`
                            <table style="width:100%">
                            <tbody>
                            <tr>
                            <td class="text-uppercase"><strong>Hộ Kinh Doanh Nhà Thuốc Morioka</strong></td>
                            <td style="text-align:right">Mã:</td>
                            <td><strong>PD`+checkRangeValue(res.id)+`</strong></td>
                            </tr>
                            <tr>
                            <td>Địa chỉ:68 Ngõ 10 Nguyễn Thị Định</td>
                            <td style="text-align:right">Ngày:</td>
                            <td><strong>`+res.date +' '+ res.hour +`</strong></td>
                            </tr>
                            <tr>
                            <td>Số điện thoại:</td>
                            </tr>
                            </tbody>
                            </table>

                            <p style="text-align:center"><strong>HÓA ĐƠN</strong></p>

                            <table class="mg-b-0 tx-13 tx-gray-700" style="width:100%">
                            <tbody>
                            <tr>
                            <td>Họ và tên khách hàng:<strong>`+($('#autoSearch').val() || 'Khách lẻ')+`</strong></td>
                            <td style="text-align:right"></td>
                            <td>Mã hoá đơn:<strong></strong></td>
                            </tr>
                            <tr>
                            <td>Địa chỉ:<strong>`+(res.address || '')+`</strong></td>
                            <td style="text-align:right"></td>
                            <td>Ngày tạo:<strong></strong></td>
                            </tr>
                            <tr>
                            <td>Số điện thoại:<strong>`+(res.phone || '')+`</strong></td>
                            </tr>
                            <tr>
                            <td>&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>

                            <p>&nbsp;</p>

                            <table style="border-collapse:collapse;width:100%;font-size:90%;text-align: center" border="1" cellpadding="6" cellspacing="6">
                            <tbody>
                            <tr>
                            <th>#</th>
                            <th>Mã HH</th>
                            <th>Tên hàng hoá</th>
                            <th>Số lô</th>
                            <th>HSD</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Tổng giảm giá</th>
                            <th>VAT</th>
                            <th>Thành tiền</th>
                            </tr>`);

                        let dem = 0
                        response.forEach(item=>{
                          dem++;
                          mywindow.document.write(`
                             <tr>
                             <td class="center">`+dem+`</td>
                             <td>`+checkRangeValue(item.stock_id)+`</td>
                             <td>`+item.name+`</td>
                             <td>`+item.lot_no+`</td>
                             <td>`+item.exp_date+`</td>
                             <td>`+item.qty+' ('+item.unit+`)</td>
                             <td>`+decialNumber(item.price)+`</td>
                             <td>`+decialNumber(((item.price*item.qty+(item.price*item.qty*item.VAT/100))/detailPrice)*item.sale)+`</td>
                             <td>`+item.VAT+`%</td>
                             <td>`+decialNumber((item.price*item.qty+(item.price*item.qty*item.VAT/100))-(((item.price*item.qty+(item.price*item.qty*item.VAT/100))/detailPrice)*item.sale))+`</td>
                             </tr>`)
                      });
                        mywindow.document.write(`
                            <p>&nbsp;</p>
                            <table style="border-collapse:collapse;width:100%;font-size:90%;text-align: center" border="1" cellpadding="6" cellspacing="6">
                            <tbody>
                            <tr>
                            <th style="width:20%">Bác sỹ kê đơn :</th>
                            <th style="width-max:25%">`+checkRangeValuedoctor(res.doctor)+`</th>
                            <th style="width:20%">Tổng tiền trước thuế</th>
                            <th style="width:15%">`+decialNumber(detailPrice)+`</th>
                            </tr>`);
                        mywindow.document.write(`
                            <tr>
                            <td><strong>Cơ sở khám bệnh :</strong></td>
                            <td>`+checkRangemedical_facility(res.medical_facility)+`</td>
                            <td><strong>Tổng VAT:</strong></td>
                            <td><strong>`+decialNumber(detailVAT)+`</strong></td>
                            </tr>
                            <tr>
                            <td><strong>Bệnh nhân:</strong></td>
                            <td>`+checkRangepatient(res.patient)+`</td>
                            <td><strong>Giảm giá:</strong></td>
                            <td><strong>`+decialNumber(tempDiscount)+`</strong></td>
                            </tr>
                            <tr>
                            <td><strong>Địa chỉ:</strong> </td>
                            <td>`+checkRangeaddress(res.address)+`</td>
                            <td><strong>Tổng tiền :</strong></td>
                            <td><strong>`+decialNumber(detailMoney)+`</strong></td>
                            </tr>
                            <tr>
                            <td><strong>Giới tính:</strong></td>
                            <td></td>
                            <td><strong>Thanh toán:</strong></td>
                            <td><strong>`+decialNumber(tempPaid)+`</strong></td>
                            </tr>
                            <tr>
                            <td><strong>Tuổi: </strong></td>
                            <td></td>
                            <td><strong>Công nợ:</strong></td>
                            <td><strong>`+decialNumber(detailMoneyTotal)+` &ensp;</strong></td>
                            </tr>
                            <tr>
                            <td><strong>Cân nặng (kg):</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>

                            `);
                        mywindow.document.write(`

                          <p>&nbsp;</p>

                          <table class="mg-b-0 tx-13 tx-gray-700" style="width:100%;margin-top:10px">
                          <tbody>
                          <tr>
                          <td>Tổng số tiền(viết bằng chữ):</td>
                          </tr>
                          <tr>
                          <td>Ghi chú :</td>
                          </tr>
                          <tr style="text-align: center;">
                          <td style="margin-top:10px"><strong>Người mua </strong></td>
                          <td style="margin-top:10px"><strong> Người bán </strong></td>
                          </tr>
                          </tbody>
                          </table>`);
                        mywindow.document.close();
                        mywindow.focus();

                        mywindow.print();
                        mywindow.close();
                        $('#inHoaDonA4').data('clicked', false);
                    }
                    if($('#inHoaDonBill').data('clicked')) {
                        // alert("in Bill");
                        let mywindow = window.open('', 'PRINT', 'height=800,width=1100');

                            mywindow.document.write(`<p style="text-align:center"><strong>Hộ Kinh Doanh Nhà Thuốc Morioka</strong></p>

                            <p style="text-align:center">Số 68 Ngõ 10 Nguyễn Thị Định</p>

                            <p style="text-align:center">985982610</p>

                            <p style="text-align:center">************</p>

                            <p style="text-align:center"><strong>HO&Aacute; ĐƠN</strong></p>

                            <p style="text-align:center">M&atilde; QG:</p>

                            <table cellpadding="1" cellspacing="1" class=" mg-b-0 tx-13 tx-gray-700" style="width:100%">
                            <tbody>
                            <tr>
                            <td>Mã: HD`+checkRangeValue(res.id)+`</td>
                            <td rowspan="3"></td>
                            </tr>
                            <tr>
                            <td>Ngày bán: `+res.date +' '+ res.hour +`</td>
                            </tr>
                            <tr>
                            <td>Khách hàng: `+($('#autoSearch').val() || 'Khách lẻ')+`</td>
                            </tr>
                            </tbody>
                            </table>

                            <p>&nbsp;</p>

                            <table border="0" cellpadding="3" cellspacing="1" style="width:100%">
                            <tbody>
                            <tr>
                            <td colspan="2" rowspan="1" style="border-color:#ffffff; text-align:right; vertical-align:top">S.L</td>
                            <td style="text-align:center">ĐVT</td>
                            <td style="text-align:right">Đ.Gi&aacute;</td>
                            <td style="text-align:right">T.Tiền</td>
                            </tr>
                            <tr>
                            <td colspan="5" style="text-align:center; vertical-align:top">----------------------------------------------</td>
                            </tr>`)

                            let dem = 0
                            response.forEach(item=>{
                            dem++;
                            mywindow.document.write(`<tr>
                                <td colspan="5">`+item.name+`</td>
                                </tr>
                                <tr>
                                <td colspan="2" rowspan="1" style="text-align:right">`+item.qty+`</td>
                                <td style="text-align:center">`+item.unit+`</td>
                                <td style="text-align:right">`+decialNumber(item.price)+`</td>
                                <td style="text-align:right">`+decialNumber(parseFloat(item.price)*parseFloat(item.qty))+`</td>
                                </tr>`)
                            });

                            mywindow.document.write(`</tbody>
                            </table>

                            <p style="text-align:center">---------------------------------------------</p>

                            <table border="0" cellpadding="1" cellspacing="1" style="width:100%">
                            <tbody>
                            <tr>
                            <td style="text-align:left; vertical-align:top; width:30%"><strong>Tổng tiền:</strong></td>
                            <td style="text-align:right; vertical-align:top"><strong>${decialNumber(detailPrice)}</strong></td>
                            </tr>
                            <tr>
                            <td style="text-align:left; vertical-align:top; width:30%"><strong>Tổng VAT:</strong></td>
                            <td style="text-align:right; vertical-align:top"><strong>${decialNumber(detailVAT)}</strong></td>
                            </tr>
                            <tr>
                            <td style="text-align:left; vertical-align:top; width:30%"><strong>Giảm gi&aacute;:</strong></td>
                            <td style="text-align:right; vertical-align:top"><strong>${decialNumber(tempDiscount)}</strong></td>
                            </tr>
                            <tr>
                            <td style="text-align:left; vertical-align:top; width:30%"><strong>Th&agrave;nh tiền:</strong></td>
                            <td style="text-align:right; vertical-align:top"><strong>${decialNumber(detailMoney)}</strong></td>
                            </tr>
                            <tr>
                            <td style="text-align:left; vertical-align:top; width:30%"><strong>Thanh to&aacute;n:</strong></td>
                            <td style="text-align:right; vertical-align:top"><strong>${decialNumber(tempPaid)}</strong></td>
                            </tr>
                            <tr>
                            <td style="text-align:left; vertical-align:top; width:30%"><strong>Tiền thừa:</strong></td>
                            <td style="text-align:right; vertical-align:top"><strong>${decialNumber(detailMoneyTotal)}</strong></td>
                            </tr>
                            </tbody>
                            </table>

                            <p>&nbsp;</p>

                            <p style="text-align:center">Xin cảm ơn v&agrave; hẹn gặp lại qu&yacute; kh&aacute;ch!</p>`)
                            mywindow.document.close();
                            mywindow.focus();

                            mywindow.print();
                            mywindow.close();
                        $('#inHoaDonBill').data('clicked', false);
                    }
                }
            });
}
});
})

function editFunc(id){
	$.ajax({
		type:"GET",
		url: "{{ url('banhang/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$('#id').val(res.id);
			$('#id1').val(res.id);
			$('#idCustomer').val(res.idcustomer);
			$('#autoSearch').val(res.name);
			$('.date').val(res.date);
			$('.hour').val(res.hour);
			$('.total').val(res.price_import);
			// $('#paid').val(new Intl.NumberFormat('en-US',{
			// 	style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
			// }).format((res.paid)));
			$('#hour').val(res.hour);
			$('#date').val(res.date);
			$('#idDoctor').val(res.iddoctor);
			$('#doctor1').val(res.doctor);
			$('#benhnhan').val(res.name);
			$('#note').val(res.note);
            if(res.name){
                inputCustomer();
            }
            $.ajax({
                type:"GET",
                url: "{{ url('banhang/editstock') }}",
                data: { id: id },
                dataType: 'json',
                success: function(response){
                 response.forEach(item=>{
                  item.dataunit = getDataUnitStock(item.stock_id);
                  item.totalPaid = res.totalpaid
                  item.customer_id = null;
                  item.id = null;
                  item.dosage = item.qty;
              })
                 DataTable_hanghoa = response;
                 console.log(DataTable_hanghoa);
                 loadData();
             }
         });
        }
    });
}

function resetTab(){
   $('#idUpdate').val("");
   $('#idCustomer').val("");
   $('#autoSearch').val("");
   $('#id').val("");
   $('#submitBanHang').trigger("reset");
   $('#formDonThuoc').trigger("reset");
   $('#autoSearch').removeAttr("style");
   $("#autoSearch").removeClass("font-weight-bold");
   $("#buttonSupplier").removeClass("hidden");
   $("#buttonSupplierClose").addClass("hidden");
   $('#thongTinKhachHang').trigger("reset");
   DataTable_hanghoa = [];
   loadData();
   $(".tab1").removeClass("hidden");
   $(".tab2").addClass("hidden");
}


$(document).ready(function() {

    $('#buttonDetail').click(function(){
        $.ajax({
            type: "PUT",
            url: "{{ url('hoadon/updatehoadon') }}",
            data: {id:$('#detailIdSubmit').val(),note:$('#note1').val()},
            dataType: 'json',
            success: function(res){
                if(res){
                    $('#chiTiet').modal('toggle');
                    $('#data-table1').DataTable().ajax.reload();
                    $.toast({
                        text : "Lưu hoá đơn thành công",
                        position: "bottom-right",
                        icon:"success",
                        stack:1,
                        loader:false
                    })
                }
            }
        })
    })

    new AutoNumeric("#totalPaid",{
       minimumValue: 0,
       modifyValueOnWheel: false,
       unformatOnHover: false
   });
})
</script>
<style>
    #data-table1 #thID {
        width: 3% !important;
    }

    #data-table1 #thMa {
        width: 11% !important;
    }

    #data-table1 #thTenKH {
        width: 12% !important;
    }

    #data-table1 #thNgay {
        width: 16% !important;
    }

    #data-table1 #thTongTien {
        width: 12% !important;
    }

    #data-table1 #thGhiChu {
        width: 14% !important;
    }

    #data-table1 #thTrangThai {
        width: 12% !important;
    }

    #data-table1 #thAction {
        width: 8% !important;
    }

    #thDetailID {
        width: 5% !important;
    }

    #thDetailName {
        width: 18% !important;
    }

    #thDetailLotNo {
        width: 18% !important;
    }

    #thDetailQTY {
        width: 10% !important;
    }

    #thDetailPrice {
        width: 13% !important;
    }

    #thDetailVAT {
        width: 10% !important;
    }

    #thDetailDiscount {
        width: 13% !important;
    }

    #thDetailTotal {
        width: 13% !important;
    }

    label {
        cursor: pointer;
    }

    #upload-photo {
        opacity: 0;
        position: absolute;
        z-index: -1;
    }
</style>
@endsection

@extends('default');
@section('title', 'Kiểm kho')
@section('content')
<!-- ########## END: RIGHT PANEL ########## --->

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div class="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between" style="flex-wrap:wrap;">
            <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Kiểm kho</h4>
            <div class="d-flex" style="flex-wrap:wrap;">
                <div class="mg-r-10">
                    <button class="btn btn-primary" id="inTab2">
                        <i class='fas fa-plus' style='font-size:15px;'></i>
                        Kiểm kho</button>
                </div>
                <div>
                    <a class="btn btn-info" href="#" id="exportExcel">
                        <i class='far fa-file-excel' style='font-size:15px'></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <div class="row tx-gray-900">
                    <div class="col-md-3 col-lg-2">
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByStartDate"
                                value="<?php echo date("01/m/Y",strtotime("-1 month")); ?>" placeholder="MM/DD/YYYY">
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
                    <div class="col-md-3 col-lg-2">
                        <label for="">Trạng thái</label>
                        <select name="" id="searchByStatus" class="form-control">
                            <option value="">Tất cả</option>
                            <option value="Hoàn thành" selected="selected">Hoàn thành</option>
                            <option value="Đã hủy">Đã hủy</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <label for="">Nhà thuốc</label>
                        <div class="form-control">
                            <a href="#">Hộ Kinh Doanh Nhà thuốc Morioka</a>
                        </div>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-4">
                        <label for="">Tìm kiếm theo hàng hoá</label>
                        <input type="text" class="form-control" placeholder="Nhập mã hoặc tên hàng hoá"
                            id="searchByStock" autocomplete="off">
                    </div>
                    <div class="col-md-8 row">
                        <div class="col-md-8">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control"
                                placeholder="Tìm kiếm theo mã hoá đơn, mã phiếu hoặc nhà cung cấp"
                                id="searchBySupplier">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i
                                    class="fas fa-search"></i> Tìm kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 4%">#</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 11%">Mã phiếu</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 20%">Thời gian</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 32%">Ghi chú</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 12%">Trạng thái</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 10%"></th>
                            </tr>
                        </thead>
                        <tbody id="searchData"></tbody>
                    </table>
                </div>
            </div><!-- row -->
        </div><!-- br-pagebody -->
        <!--  -->
    </div>

    <!-- tab2 -->
    <div class="pos-absolute t-0 l-0 hidden tab2" style="width:100%;">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row justify-content-between">
                <div class="col-md-8">
                    <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase tx-18">Kiểm kho > Tạo mới phiếu kiểm kho</h4>
                </div>
                <div class="col-md-4" style="text-align: end;">
                    <div class="">
                        <!-- Button trigger modal nhập tồn từ excel-->
                        <button type="button" class="btn bg-info text-white" data-toggle="modal" data-target="#nhapHH">
                            Kiểm tất cả các mặt hàng(F2)
                        </button>
                        <button class="btn btn-danger" id="outTab1"><i class='fas fa-reply'
                                style='font-size:13px'></i>Trở về</button>
                        <!-- Modal nhập HH -->
                        <div class="modal fade" id="nhapHH" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="max-width:none;width: 50em;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Kiểm tất cả các hàng
                                            hoá </h5>
                                        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 tx-bold tx-gray-800">
                                                    <label for="">Loại hàng hoá</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="Tất cả">Tất cả</option>
                                                        <option value="Dược phẩm">Dược phẩm</option>
                                                        <option value="Vật tư y tế">Vật tư y tế</option>
                                                        <option value="Hàng hoá khác">Hàng hoá khác</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 tx-bold tx-gray-800">
                                                    <label for="">Nhóm hàng</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="Tất cả">Tất cả</option>
                                                        <option value="Dược phẩm">Dược phẩm</option>
                                                        <option value="Đông dược">Đông dược</option>
                                                        <option value="Hạ sốt">Hạ sốt</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mg-t-20">
                                                    <input type="checkbox" name="" id="">
                                                    <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm hàng còn tồn
                                                        kho</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Xong</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- nhập thông tin -->
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <form action="" id="submitkiemkho">
                    <div class="">
                        <div class="row">
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Ngày kiểm <span
                                                class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control fc-datepicker" id="dateImport"
                                            value="<?php echo date("d/m/Y"); ?>" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Giờ kiểm <span
                                                class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="time" class="form-control" id="hourImport" name="hour" value="<?php
                                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                                        echo date("H:i:s");?>" name="hour" placeholder="Set time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Tổng tiền</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control total" disabled value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Ghi chú</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="note" id="" cols="30" rows="1" class="form-control"></textarea>
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
                        <input autocomplete="off" class="form-control" id="autoSearchImage">
                        <button class="btn btn-primary pos-absolute r-0 t-0" data-toggle="modal" data-target="#search">
                            <i class="fa fa-plus-circle mg-r-5" aria-hidden="true"></i>
                            Tìm kiếm nâng cao
                        </button>

                    </div>
                </div>
            </div>

            <div class="shadow-base bg-white pd-15 mg-t-25" style="width:100%;">
                <div class="">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tatCa">Tất cả</a>
                        </li>
                        {{-- <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#daKiem">DS đã kiểm</a>
                                </li> --}}
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div style="overflow-x: auto;">
                            <div id="tatCa" class="tab-pane active"><br>
                                <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
                                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:10px;width:2%;text-align:center;">#</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:50px;width:6%;text-align:center;">Mã HH
                                            </th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:150px;width:18%;text-align:center;">Tên
                                                hàng hoá</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">Số
                                                lô(*)</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">HSD
                                            </th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">Trước
                                                kiểm</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">Thực
                                                tế(*)</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">Lệch
                                            </th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">Đv tính
                                            </th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">Lý do
                                            </th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">Biện
                                                pháp xử lý
                                            </th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">Ghi chú
                                            </th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:100px;width:8%;text-align:center;">Giá vốn
                                            </th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:150px;width:10%;text-align:center;">Chênh
                                                lệch</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width:50px;width:6%;text-align:center;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- <div id="daKiem" class="tab-pane fade "><br>
                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Tên hàng hoá</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Số lô(*)</th>
                                                <th scope="col" class="bg-primary" style="color: white;">HSD</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Trước kiểm</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Thực tế(*)</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Lệch</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Đv tính</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Lý do</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Biện pháp xử lý
                                                </th>
                                                <th scope="col" class="bg-primary" style="color: white;">Ghi chú</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Giá vốn</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Chênh lệch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div> --}}
                    </div>
                </div>
            </div>
            <!-- Modal tìm kiếm nâng cao-->
            <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: none;width: 80%;vertical-align: top;">
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
                                            <option value="">Tất cả</option>
                                            <option value="">Dược phẩm</option>
                                            <option value="">Vật tư y tế</option>
                                            <option value="">Hàng hoá khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Nhóm hàng</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Tất cả</option>
                                            <option value="">Hô hấp</option>
                                            <option value="">Tuần hoàn não</option>
                                            <option value="">Hàng hoá khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Hạn sử dụng</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Tất cả</option>
                                            <option value="">Sử dụng tốt</option>
                                            <option value="">Sắp hết hạn</option>
                                            <option value="">Đã hết hạn</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm hàng tồn
                                            kho</label><br>
                                        <div class="toggle-wrapper">
                                            <div class="toggle toggle-modern primary">
                                                <div class="toggle-slide">
                                                    <div class="toggle-inner" style="width: 94px; margin-left: 0px;">
                                                        <div class="toggle-on active"
                                                            style="height: 26px; width: 47px; text-indent: -8.66667px; line-height: 26px;">
                                                        </div>
                                                        <div class="toggle-blob"
                                                            style="height: 26px; width: 26px; margin-left: -13px;">
                                                        </div>
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
                                                <a class="nav-link active" data-toggle="tab" href="#timKiem">Kết quả
                                                    tìm kiếm</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#daChon">Đã chọn</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div id="timKiem" class="tab-pane active"><br>
                                                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                    id="data-table2" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="bg-primary" style="color: white;">Mã
                                                                HH</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">Tên
                                                            </th>
                                                            <th scope="col" class="bg-primary" style="color: white;">Tồn
                                                                kho</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">ĐVT
                                                            </th>
                                                            <th scope="col" class="bg-primary" style="color: white;">Số
                                                                ĐK</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">Quy
                                                                cách đóng gói</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">
                                                                Hãng sản xuất</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">
                                                                Hoạt chất chính</th>
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
                                                            <th scope="col" class="bg-primary" style="color: white;">Mã
                                                                HH</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">Tên
                                                            </th>
                                                            <th scope="col" class="bg-primary" style="color: white;">Tồn
                                                                kho</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">ĐVT
                                                            </th>
                                                            <th scope="col" class="bg-primary" style="color: white;">Số
                                                                ĐK</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">Quy
                                                                cách đóng gói</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">
                                                                Hãng sản xuất</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">Hàm
                                                                lượng</th>
                                                            <th scope="col" class="bg-primary" style="color: white;">
                                                            </th>
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
                                <button type="button" id="submitHangHoa2" class="btn btn-primary">Xong</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end  mg-t-15">
                <button class="btn btn-primary mg-r-10 submitPhieuNhap">
                    <i class='far fa-save' style='font-size:13px;padding:2px'></i>Lưu</button>
                <button class="btn btn-danger" id="outTab2"><i class='fas fa-reply' style='font-size:13px'></i>Trở
                    về</button>
            </div>
        </div>
    </div>
    <!-- end tab2 -->
    <!-- Modal chi tiết-->
    <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: none;width: 80%;vertical-align: top;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">PHIẾU KIỂM KHO </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="nhapTon" name="nhapTon" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="inf" class="tab-pane active"><br>
                                <div class="row mg-t-10">
                                    <div class="col-md-6">
                                        <label for="" class="tx-gray-800 tx-bold">Mã phiếu</label>
                                        <input type="text" id="detailid" disabled=disabled class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="tx-gray-800 tx-bold">Ngày tạo phiếu nhập</label>
                                        <input type="text" id="detaildate" disabled=disabled class="form-control">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                        <textarea name="note" id="note" cols="30" rows="1" class="form-control"
                                            readonly></textarea>
                                    </div>
                                </div>
                                <div class="shadow-base bg-white pd-15 mg-t-25">
                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table4">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Hàng hóa
                                                </th>
                                                <th scope="col" class="bg-primary" style="color: white;">Số lô</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Kiểm trước
                                                </th>
                                                <th scope="col" class="bg-primary" style="color: white;">Thực tế</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Lệch</th>
                                                <th scope="col" class="bg-primary" style="color: white;">ĐVT
                                                </th>
                                                <th scope="col" class="bg-primary" style="color: white;">Lý do</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Biện pháp xử lý
                                                </th>
                                                <th scope="col" class="bg-primary" style="color: white;">Ghi chú</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Giá trị</th>


                                            </tr>
                                        </thead>
                                    </table>
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
    {{-- end chi tiet --}}

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
    var searchLotNo = [];
    let dataStockGroup = [];


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

function qty_import(a,b,c){
    a = replaceCurrency(a);
    b = replaceCurrency(b);
    c = replaceCurrency(c);
    if(a==0){
        return a=b-c;
    }else{
        return a=b
    }
}

function total(a,b,c,d){
    a = replaceCurrency(a);
    b = replaceCurrency(b);
    c = replaceCurrency(c);
    d = replaceCurrency(d);
    var e;
    if(a==0){
        return a=((b-c)*d)
    }else{
        return a=b
    }
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
     html += '<div>SĐK: <strong>'+data.reg_no+'</strong> | Mã HH: <strong>HH0000'+data.id+'</strong></div>';
     html += '<div>Quy cách ĐG: <strong>'+data.packaging+'</strong> | Hãng SX: <strong>'+data.manufacture+'</strong></div>';
     html += '</div>';
     html += '</div>';
     return html;
 },
 updater: function(result) {
     return result;
 }
});
function getstockgroup(){
  let dataStockGroup = [];
  $.ajax({
     type:"GET",
     url: "{{ url('hanghoa/getstockgroup') }}",
     dataType: 'json',
     async: false,
     success: function(res){
        dataStockGroup = res;
    }
});
  return dataStockGroup;
}
dataStockGroup = getstockgroup();

$('#autoSearchImage').typeahead({
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
        html += '<img src="{{ asset('image/medicine-default.jpg') }}" alt="" width=80px>';
        html += '</div>';
        html += '<div class="mg-l-10 align-self-center">';
        html += '<div>Tên: <strong>'+data.name+' -- '+data.unit+'</strong></div>';
        html += '<div>Mã HH: <strong>'+data.id+'</strong> | SĐK: <strong>'+data.reg_no+'</strong> | Hoạt chất: <strong>'+data.ingredient+'</strong></div>';
        html += '<div>Quy cách ĐG: <strong>'+data.packaging+'</strong> | Hãng SX: <strong>'+data.manufacture+'</strong></div>';
        html += '</div>';
        html += '</div>';
        return html;
    },
    updater: function(result) {
        result.stock_id = result.id;
        result.discount = 0;
        result.price =0;
        result.qty =0;
        result.reasons =null;
        result.handling_measures=null;
        result.lot_no = '';
        result.reality = '';
        result.exp_date = '';
        result.dataunit = getDataUnitStock(result.stock_id);
        result.id = null;
        DataTable_hanghoa.push(result);
        loadData();
        return result;
    }
});


function updateData(data) {
    var key = $(data).attr("data-id");
    var value = $(data).attr("data-name");
    if(value=='unit'){
        DataTable_hanghoa[key]['unit_id'] = $('option:selected', data).attr('data-ha');
    }
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
      id: null,
      stock_id : DataTable_hanghoa[index].stock_id,
      unit_id : DataTable_hanghoa[index].unit_id,
      name: DataTable_hanghoa[index].name,
      lot_no: DataTable_hanghoa[index].lot_no,
      exp_date: DataTable_hanghoa[index].exp_date,
      qty: DataTable_hanghoa[index].qty,
      dataunit: DataTable_hanghoa[index].dataunit,
      reality: DataTable_hanghoa[index].reality,
      deviation: DataTable_hanghoa[index].deviation,
      unit: DataTable_hanghoa[index].unit,
      reasons: DataTable_hanghoa[index].reasons,
      handling_measures: DataTable_hanghoa[index].handling_measures,
      price:DataTable_hanghoa[index].price,
      total:DataTable_hanghoa[index].total,
      note: DataTable_hanghoa[index].note
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
        '<div data-toggle="modal" data-target=".exampleModalText" style="width:100%;color:black;font-size:15px;border:0" data-name="code" data-id="'+index+'" onclick="editInfoStock('+item.stock_id+')" class="form-control" >HH0000'+item.stock_id+'</div>',
        '<div data-toggle="modal" data-target=".exampleModalText" style="width:100%;color:black;font-size:15px;border:0;" data-name="name" data-id="'+index+'" onclick="editInfoStock('+item.stock_id+')" class="form-control" >'+item.name+'</div>',
        '<input style="width:70%;" onfocus=this.value="" data-name="lot_no" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['lot_no'] || '')+'" onchange="updateData(this)" placeholder="Số lô" class="form-control" />',
        '<div style ="margin-top:10px" class="input-group"  class="form-control" type="text" data-name="exp_date" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['exp_date'] || '')+'" onchange="updateData(this)">'+item.exp_date+'</div>',
        '<input class="form-control" style="width:80%;" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['qty'] || 0)+'" onchange="updateData(this)"  readonly  />',
        '<input class="form-control" style="width:80%;" type="text" data-name="reality" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['reality'] || '')+'" onchange="updateData(this)" />',
        '<input class="form-control" style="width:80%;" type="text" data-name="deviation" name="deviation" data-id="'+index+'" value="'+new Intl.NumberFormat('en-US').format(qty_import(DataTable_hanghoa[index]['deviation'] || 0,DataTable_hanghoa[index]['reality'] ||0,DataTable_hanghoa[index]['qty'] || 0))+'" onchange="updateData(this)" readonly />',
        '<select style="width:100%;" onchange="updateData(this)" data-name="unit" data-id="'+index+'">'+getUnit(DataTable_hanghoa[index].dataunit,DataTable_hanghoa[index].unit)+'</select>',
        '<input class="form-control" style="width:80%;" type="text" data-name="reasons" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['reasons'] || '')+'" onchange="updateData(this)" placeholder="Lý do"/>',
        '<input class="form-control" style="width:80%;" type="text" data-name="handling_measures" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['handling_measures'] || '')+'" onchange="updateData(this)" placeholder="biện pháp" />',
        '<input class="form-control" style="width:80%;" type="text" data-name="note" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['note'] || '')+'" onchange="updateData(this)"placeholder="Ghi chú" />',
        '<input class="form-control" style="width:80%;" type="text" data-name="price" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['price'] || 0)+'" onchange="updateData(this)" />',
        '<input class="form-control" style="width:85%;" type="text" data-name="total" data-id="'+index+'" value="'+new Intl.NumberFormat('en-US').format(total(DataTable_hanghoa[index]['deviation'] || 0,DataTable_hanghoa[index]['reality'] ||0,DataTable_hanghoa[index]['qty'] || 0,DataTable_hanghoa[index]['price'] || 0))+'" onchange="updateData(this)" readonly/>',
        '<span class="fa fa-plus-square" style="color:#0753a1" data-id="'+index+'" onclick="duplicatedData('+index+')"></span> <span class="fas fa-trash-alt" style="color:#bd2130" data-id="'+index+'" onclick="removeData('+index+')"></span>'
        ]).draw( false );

      $("#data-table3 select[data-name='unit']").select2({
        minimumResultsForSearch : -1
    });
      new DateTime($("input[data-name='exp_date'][data-id='"+index+"']"),{
          format: 'DD/MM/YYYY',
      });
      new AutoNumeric("input[data-name='price'][data-id='"+index+"']", {
        minimumValue: 0,
        decimalPlaces: 0,
        modifyValueOnWheel: false,
        unformatOnHover: false
    });
      new AutoNumeric("input[data-name='qty'][data-id='"+index+"']", {
        minimumValue: 0,
        decimalPlaces: 0,
        modifyValueOnWheel: false,
        unformatOnHover: false
    });
      new AutoNumeric("input[data-name='reality'][data-id='"+index+"']",{
        minimumValue: 0,
        modifyValueOnWheel: false,
        unformatOnHover: false
    });
      new AutoNumeric("input[data-name='deviation'][data-id='"+index+"']",{
                    // minimumValue: 0,
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
                qty : item.qty,
                price_import : item.price_import,
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
            let warehouse = [];
            dataStockGroup.forEach(function (a) {
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
            var parts = item.split('#'),
            html = 'Số lô: '+data.name+' - HSD: '+data.exp_date+'  - Tổng tồn: '+data.qty+' -  Giá nhập: '+data.price_import;
            return html;
        },
        updater: function(item) {
            DataTable_hanghoa[item.index].lot_no = item.name;
            DataTable_hanghoa[item.index].exp_date = item.exp_date;
            DataTable_hanghoa[item.index].qty = item.qty;
            DataTable_hanghoa[item.index].price = item.price_import;
            return item;
        }
    });

     index++;
 });
sumTotal = $("input[data-name='total']")
.map(function(){return replaceCurrency($(this).val());}).get();
$('.total').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(sum(sumTotal)))
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
    .columns(4).search($("#searchByStatus").val())
    .columns(6).search($("#searchByStock").val())
    .draw();
}
};

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
        ajax : {
            url: "{{ url('kiemkho') }}",
            "dataSrc" : function (json) {
                json['data'].forEach(item=>{
                    item.total = total(item.qty,item.price,item.discount,item.VAT);
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
                console.log(newData);
                return newData;
            }
        },
        columns: [
        { data: null, orderable: false},
        { data: null,
            "render": function(data,type,row) {
                if(data["id"]<10){
                    return "PKT00000"+data["id"]
                }else if(data["id"]<100){
                    return "PKT0000"+data["id"]
                }else{
                    return "PKT000"+data["id"]
                }
            }
        },
        { data: null, orderable: false,
            "render": function(data,type,row) { return data["date"] + ' '+data["hour"]}
        },
        { data: 'note', name: 'note',orderable: false},
        { data: 'status', name: 'status',orderable: false },
        { data: 'action', name: 'action',orderable: false},
        ],
        dom: 'Blfrtip',
        buttons: [
        {
            extend: 'excelHtml5',
            title: 'KiemKho_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
            text:'<span class="text-light">Xuất file Excel</span>',
            exportOptions: {
                columns: [1, 2, 3]
            },
        }
        ]
    });

    $('.dt-buttons a[aria-controls="data-table1"]').appendTo('#exportExcel');

    table1.on('order.dt search.dt', function () {
      table1.column(0).nodes().each(function (cell, i) {
         cell.innerHTML = i + 1;
     });
  }).draw();

    searchDateTable();

    var table2 = $('#data-table2').DataTable({
        "responsive": true,
        "select": true,
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
        { data: 'qty', name: 'qty' },
        { data: 'unit', name: 'unit' },
        { data: 'reg_no', name: 'reg_no' },
        { data: 'packaging', name: 'packaging' },
        { data: 'made_in', name: 'made_in' },
        { data: 'ingredient', name: 'ingredient' },
        ]
    });
    $( "#timKiemNangCao" ).click(function(){
        $('#data-table2').DataTable().search( $( "#inputTimKiemNangCao" ).val()).draw();
        console.log($( "#searchProduct" ).val());
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

    $("#submitHangHoa1" ).click(function() {
        $('.stock_type').attr('disabled', false);
        $('#themTuDM').modal('hide');
        hangHoa1 = [];
        hangHoa1 = $('#themHangHoa').serializeArray();

        $.ajax({
            url: "{{ url('hanghoa') }}",
            type: "POST",
            data: hangHoa1,
            success: function( response ) {
            }
        });

        $.ajax({
            url: "{{ url('hanghoa/submitunit') }}",
            type: "POST",
            dataType:'json',
            contentType: 'json',
            data: JSON.stringify(DataTable_unit),
            contentType: 'application/json; charset=utf-8',
            success: function( success ) {
            }
        });

        var hangHoa1Object = {};
        $.each(hangHoa1,
          function(i, v) {
            hangHoa1Object[v.name] = v.value;
        });


        hangHoa1Object.dataunit = getDataUnitStock(hangHoa1Object.stock_id);
        DataTable_hanghoa.push(hangHoa1Object);


        loadData();

        console.log(DataTable_hanghoa);
        document.getElementById("themHangHoa").reset();
        $('#data-table-unit').DataTable().clear().draw();
    });

    $("#submitHangHoa2" ).click(function() {
       $('#search').modal('hide');
       hangHoa2 = table2.rows('.selected').data().toArray();
       console.log(hangHoa2);
       hangHoa2.forEach(item=>{
        item.dataunit = getDataUnitStock(item.id);
        item.stock_id = item.id;
        item.discount = 0;
        item.id = null;
        item.reasons=null;
        item.handling_measures=null;
        DataTable_hanghoa.push(item);
    });

       table2.row('.selected').remove().draw( false);
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
      .append( "<td>"+item.id+"</td>"+"<td>"+item.name+"</td>"+"<td>"+item.reg_no+"</td>"+"<td>"+item.unit+"</td>"+"<td>"+item.ingredient+"</td>"+"<td>"+item.packaging+"</td>"+"<td>"+item.made_in+"</td>" )
      .appendTo( table );
  };


});

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
        if($('#dateImport').val()==''){
            haCheck = 1;
            $.toast({
               text : "Ngày nhập hàng không được để trống",
               position: "bottom-right",
               icon:"error",
               stack:1,
               loader:false
           })
            $('#dateImport').focus();
        }else if($('#hourImport').val()==''){
            haCheck = 1;
            $.toast({
               text : "Giờ nhập hàng không được để trống",
               position: "bottom-right",
               icon:"error",
               stack:1,
               loader:false
           })
            $('#hourImport').focus();
        }else if(!checkLotNoName[i].includes(DataTable_hanghoa[i]['lot_no'])){
            haCheck = 1;
            $.toast({
             text : "Số lô hàng hoá "+DataTable_hanghoa[i]['name']+" không tồn tại",
             position: "bottom-right",
             icon:"error",
             stack:1,
             loader:false
         })
        }else if(DataTable_hanghoa[i]['lot_no']==''){
            haCheck = 1;
            $.toast({
               text : "Số lô hàng hoá "+DataTable_hanghoa[i]['name']+" không được để trống",
               position: "bottom-right",
               icon:"error",
               stack:1,
               loader:false
           })
            $("input[data-name='lot_no'][data-id='"+i+"']").focus();
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
        }else if(DataTable_hanghoa[i]['reality']==''){
            haCheck = 1;
            $.toast({
               text : "Số lượng phải lớn hơn không",
               position: "bottom-right",
               icon:"error",
               stack:1,
               loader:false
           })
            $("input[data-name='reality'][data-id='"+i+"']").focus();
        }
    }
    if(haCheck==0){
        $.ajax({
          url: "{{ url('kiemkho/submitkiemkho') }}",
          type: "POST",
          data: $('#submitkiemkho').serialize(),
          success: function( response ) {
            DataTable_hanghoa.forEach(item => {
                item.type = "import_check_inventory";
                item.idha = response.id;
                item.qty = replaceCurrency(item.qty);
                item.reality = replaceCurrency(item.reality);
                item.deviation = replaceCurrency(item.deviation);
            });
            $.ajax({
                url: "{{ url('nhaptunhacungcap/submitlotno') }}",
                type: "POST",
                dataType:'json',
                contentType: 'json',
                data: JSON.stringify(DataTable_hanghoa),
                contentType: 'application/json; charset=utf-8',
                success: function( ress ) {
                    var i = 0;
                    DataTable_hanghoa.forEach(item => {
                        item.lotno_id = ress[i].id;
                        i++;
                    });
                    console.log(DataTable_hanghoa);
                    $.ajax({
                      url: "{{ url('kiemkho/submitphieunhap') }}",
                      type: "POST",
                      dataType:'json',
                      contentType: 'json',
                      data: JSON.stringify(DataTable_hanghoa),
                      contentType: 'application/json; charset=utf-8',
                      success: function( data ) {
                        $('#data-table1').DataTable().ajax.reload();
                        $.toast({
                            text : "Tạo phiếu thành công",
                            position: "bottom-right",
                            icon:"success",
                            stack:1,
                            loader:false
                        });
                        resetTab();
                        dataStockGroup = getstockgroup();
                    }
                });
                }
            });
        }
    });
    }
}
});

function getlistlotno(stock_id){
    var arrlotno = [];
    $.ajax({
        type: "GET",
        url: "{{ url('nhaptunhacungcap/editlotno') }}",
        data: {id:stock_id},
        async: false,
        success: function(success) {
            arrlotno = success
        }
    });
    return arrlotno;
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
            name : item.unit
        });
      });
    }
});
    return dataUnitStock;
}

function detailFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('kiemkho/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#detailid').val("PKK"+checkRangeValue(res.id));
        $('#detaildate').val(res.date);
        console.log(res);
    }
});
    $.ajax({
      type:"GET",
      url: "{{ url('kiemkho/editstock') }}",
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
                    return data['name'] +'</br><div class="font-weight-bold">HH'+checkRangeValue(data['stock_id'])+'</div>'
                }
            },
            { data: null,
                "render": function(data,type,row) {
                    return data['lot_no'] +'</br><span class="font-weight-bold">HSD: </span>'+data['exp_date']
                }
            },
            { data: 'qty', name: 'qty' },
            { data: 'reality', name: 'reality' },
            { data: null,
                "render": function(data,type,row) {
                    if(data['qty'] == 0){
                        return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format((data.reality))
                    }else{
                        return new Intl.NumberFormat('en-US').format( (data.reality - data.qty))}
                    }
                },
                { data: 'unit', name: 'unit' },
                { data: 'reasons', name: 'reasons' },
                { data: 'handling_measures', name: 'handling_measures' },
                { data: 'note', name: 'note' },
                { data: null,
                    "render": function(data,type,row) {
                        if(data['qty'] == 0){
                          return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format( (data.reality*data.price))
                      }else{
                        return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format( ((data.reality-data.qty)*data.price))}
                    }
                },

                ],
                columnDefs: [
                {
                 targets: 4,
                 render: $.fn.dataTable.render.number(',', 0, '')
             }
             ],
         });
        table4.on('order.dt search.dt', function () {
          table4.column(0).nodes().each(function (cell, i) {
             cell.innerHTML = i + 1;
         });
      }).draw();
        console.log(table4.rows().data());
    }
});
}

function deleteFunc(id) {
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
                type: "DELETE",
                url: "{{ url('kiemkho') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
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
function duplicatedFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('kiemkho/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('.autosearch').val(res.name);
        $('#dateImport').val(res.date);
        $('#hourImport').val(res.hour);
        $.ajax({
          type:"GET",
          url: "{{ url('kiemkho/editstock') }}",
          data: { id: id },
          dataType: 'json',
          success: function(response){
            response.forEach(item => {
                item.dataunit = getDataUnitStock(item.stock_id)
                item.check_inventory_id = null;
                item.id = null
            });
            DataTable_hanghoa = response;
            loadData();
            console.log(DataTable_hanghoa);
        }
    });
    }
});
}


function printFunc(id){
	$.ajax({
		type:"GET",
		url: "{{ url('kiemkho/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$.ajax({
				type:"GET",
				url: "{{ url('kiemkho/editstock') }}",
				data: { id: id },
				dataType: 'json',
				success: function(response){
					var detailPrice = response.reduce((a,b)=>
                        parseFloat(a) + parseFloat(b.qty),0
                        );
					var detailDiscount = response.reduce((a, b)=>
						parseFloat(a) + parseFloat(b.reality),0
						);
					var detailMoney = response.reduce((a, b)=>
                        parseFloat(a) + parseFloat(b.price),0
                        );
					var mywindow = window.open('', 'PRINT', 'height=600,width=800');
					mywindow.document.write(`
						<table style="width:100%">
						<tbody>
						<tr>
						<td class="text-uppercase"><strong>Hộ Kinh Doanh Nhà Thuốc Morioka</strong></td>
						<td style="text-align:right">Mã phiếu:</td>
						<td><strong>PN`+checkRangeValue(res.id)+`</strong></td>
						</tr>
						<tr>
						<td>Địa chỉ:68 Ngõ 10 Nguyễn Thị Định</td>
						<td style="text-align:right">Ngày:</td>
						<td><strong>`+res.date +' '+ res.hour +`</strong></td>
						</tr>
						</tbody>
						</table>

						<p style="text-align:center"><strong>PHIẾU KIỂM KHO</strong></p>

						<table class="mg-b-0 tx-13 tx-gray-700" style="width:100%">
						<tbody>
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
						<th>Thông tin hàng hoá </th>
						<th>Số lô</th>
						<th>HSD</th>
						<th>SL trước kiểm</th>
                        <th>SL thực tế</th>
                        <th>SL chênh lệch</th>
                        <th>Giá vốn</th>
                        <th>ĐVT</th>
                        <th>Lý do</th>
                        <th>Giá trị chênh lệch</th>
                        </tr>`);

					let dem = 0
					response.forEach(item=>{
						dem++;
						mywindow.document.write(`
							<tr>
							<td class="center">`+dem+`</td>
							<td>`+item.name+`</td>
							<td>`+item.lot_no+`</td>
							<td>`+item.exp_date+`</td>
							<td>`+item.qty+`</td>
							<td>`+item.	reality+`</td>
							<td>`+(item.reality-item.qty)+`</td>
							<td>`+item.price+`</td>
							<td>`+item.unit+`</td>
                            <td>`+item.reasons+`</td>
                            <td>`+decialNumber((+item.reality-item.qty)*item.price)+`</td>
                            </tr>`)
					});

					mywindow.document.write(`
						<p>&nbsp;</p>
						<table class="mg-b-0 tx-13 tx-gray-700" style="width:100%;margin-top:50px">
						<tbody>
						<tr>
						<td style="text-align:right"><strong>Tổng kiểm trước :&ensp;`+(detailPrice)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Tổng sau kiểm:&ensp;`+(detailDiscount)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Tổng chênh lệch:&ensp;`+decialNumber(detailDiscount-detailPrice)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Tổng giá trị chênh lệch:&ensp;`+decialNumber((detailDiscount-detailPrice)*detailMoney)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>NGƯỜI NHẬP</strong></td>
						</tr>
						</tbody>
						</table>`);
					mywindow.document.close();
					mywindow.focus();

					mywindow.print();
					mywindow.close();
				}
			});
		}
	});
}
function changeFunc(id) {
    Swal.fire({
        title:" Bạn chắc chắn muốn huỷ phiếu này PKK0000"+id+ "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "{{ url('kiemkho/active') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $("#data-table").load(
                        $.toast({
                            text: "Tạm dừng hoạt động kiểm kho",
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

</script>
<script>
    $(document).ready(function() {


        $(function() {
                // Datepicker
                $('.fc-datepicker').datepicker({
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    dateFormat:'dd/mm/yy'
                });
                $('#datepickerNoOfMonths').datepicker({
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    numberOfMonths: 2
                });
                $("#inTab2").click(function() {
                    $(".tab1").addClass("hidden");
                    $(".tab2").removeClass("hidden");
                    console.log("hello");
                })
                $("#outTab1").click(function() {
                    $(".tab1").removeClass("hidden");
                    $(".tab2").addClass("hidden");
                })
                $('.toggle').toggles({
                    on: true,
                    height: 26
                });
                let submitkiemkho = $("#submitkiemkho");
                if (submitkiemkho.length) {
                    submitkiemkho.validate({
                        rules: {
                            date: {
                                required: true
                            },
                            time: {
                                required: true
                            },
                        },
                        messages: {
                            date: {
                                required: 'Vui lòng điền ngày kiểm'
                            },
                            time: {
                                required: 'Vui lòng điền thời gian'
                            }
                        }
                    })
                }
            });
        $("#searchProduct").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#searchData tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#outTab2").click(function(){
          if(DataTable_hanghoa!=''){
            Swal.fire({
              title: "Thông tin phiếu chưa được lưu, bạn có muốn trở về danh sách không?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Đồng ý!'
          }).then((result) => {
              if (result.value) {
                resetTab();
            } else {
                resetTab();
            }
        });
      }else{
        resetTab();
    }
})
    })

    function resetTab(){
        $('#id').val("");
        $('#submitPhieuNhap').trigger("reset");
        DataTable_hanghoa = [];
        loadData();
        $(".tab1").removeClass("hidden");
        $(".tab2").addClass("hidden");
    }

</script>
@endsection

@extends('default')
@section('title', 'Khách hàng trả lại')
@section('content')
<!-- ########## END: RIGHT PANEL ########## --->

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div class="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between" style="flex-wrap:wrap;">
            <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Khách hàng trả lại</h4>
            <div class="d-flex" style="flex-wrap:wrap;">
                <div class="dropdown show mg-r-10">

                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fas fa-plus' style='font-size:15px;'></i>
                        Khách hàng trả lại (F2)
                    </a>

                    <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                        <!-- Button trigger modal -->
                        {{--  <button type="button" class="btn btn-primary dropdown-item font-weight-bold" data-toggle="modal"
                            data-target="#exampleModalLabhd" style="color:#337ab7" id="">
                            <em class="fa fa-reply-all" style="font-size:80%"></em>
                            Trả lại theo đơn hàng
                        </button> --}}

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary dropdown-item font-weight-bold" data-toggle="modal"
                            data-target="#exampleModal1" id="inTab2" style="color:#337ab7">
                            <i class='fas fa-plus' style='font-size:14px;'></i>
                            Trả lại theo hàng hoá
                        </button>
                    </div>

                    <!-- Modal trả theo đơn-->
                    <div class="modal fade" id="exampleModalLabhd" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLabhd" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: none;width: 80em;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title tx-gray-900" id="exampleModalLabelLabhd">DANH SÁCH HÓA ĐƠN
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form>
                                    <div class="modal-body">
                                        <div class="row tx-gray-900">
                                            <div class="col-md-3 col-lg-2">
                                                <label for="" class="tx-bold">Từ ngày</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                    <input type="text" class="form-control fc-datepicker"
                                                        value="<?php echo date("01/m/Y",strtotime("-1 month")); ?>"
                                                        placeholder="MM/DD/YYYY">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <label for="" class="tx-bold">Tới ngày</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                    <input type="text" class="form-control fc-datepicker"
                                                        value="<?php echo date("d/m/Y"); ?> " placeholder="MM/DD/YYYY">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <label for="" class="tx-bold">Trạng thái</label>
                                                <select name="" id="" class="form-control select2 select2-container"
                                                    style="width:100%">
                                                    <option value="">Hoàn thành</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <label for="" class="tx-bold">Hoá đơn</label>
                                                <select name="" id="" class="form-control select2 select2-container"
                                                    style="width:100%">
                                                    <option value="">Tất cả</option>
                                                    <option value="">Bán theo đơn</option>
                                                    <option value="">Không bán theo đơn</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row tx-gray-900 mg-t-20">
                                            <div class="col-md-6">
                                                <label for="">Tìm kiếm theo hàng hoá</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập mã hoặc ấn tên hàng hoá, ấn enter để tìm"
                                                    list="tenHH">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Tìm kiếm theo hoá đơn</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Tìm kiếm theo mã hóa đơn hoặc khách hàng">
                                                    <button class="input-group-addon bg-primary"><i
                                                            class="fas fa-search text-white"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mg-t-10">
                                            {{-- <div class="col-12 tx-gray-900">
                                        <label for="" class="tx-bold">File excel (Dung lượng không vượt quá
                                        10mb)</label>
                                        <input type="file" class="form-control">
                                    </div> --}}
                                            <div class="mg-t-20 col-12">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#tab1">Kết
                                                            quả tìm kiếm</a>
                                                    </li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content mg-t-10">
                                                    <div class="tab-pane active" id="tab1">
                                                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                            id="data-table-stock" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="bg-primary" id="thID"
                                                                        style="color: white;">Mã hoá đơn</th>
                                                                    <th scope="col" class="bg-primary" id="thMa"
                                                                        style="color: white;">Khách hàng</th>
                                                                    <th scope="col" class="bg-primary" id="thLoai"
                                                                        style="color: white;">Ngày giờ bán hàng</th>
                                                                    <th scope="col" class="bg-primary" id="thNgay"
                                                                        style="color: white;">Tổng tiền</th>
                                                                    <th scope="col" class="bg-primary" id="thDoi"
                                                                        style="color: white;">Trạng thái</th>
                                                                    <th scope="col" class="bg-primary" id="thChech"
                                                                        style="color: white;">Bán theo đơn</th>
                                                                    <th scope="col" class="bg-primary" id="thChech1"
                                                                        style="color: white;">Thao tác</th>
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
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a class="btn btn-info" href="#" id="exportExcel"> <i class='far fa-file-excel'
                            style='font-size:14px;padding:0 2px'></i></a>
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
                                placeholder="Tìm kiếm theo mã hoá đơn, mã phiếu hoặc khách hàng" id="searchBySupplier">
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
                                <th scope="col" class="bg-primary" style="color: white;max-width: 2%">#</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 8%">Mã phiếu</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 13%">Ngày tạo</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 10%">Mã hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 12%">Tên khách hàng
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 10%">Tổng tiền</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 12%">Trả lại khách
                                    hàng</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 10%">Ghi chú</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 10%">Trạng thái</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 8%"></th>
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
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6" id="labelTaoMoiPhieuTra"></h4>
            </div>
        </div>
        <!-- Modal thêm mới-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
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

        <!-- nhập thông tin -->
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <form id="submitkhachhang">
                    <div class="mg-b-20">
                        <div class="row">
                            <div class="col-md-4 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Khách hàng<span
                                                class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="id" id="id">
                                        <input type="hidden" name="idcustomer" id="idCustomer">
                                        <input type="text" name="name" autocomplete="off" class="form-control"
                                            id="autoSearch" placeholder="Nhập tên, số điện thoại để tìm khách hàng">
                                        <button type="button" id="buttonSupplier"
                                            class="pos-absolute r-0 t-0 pd-7 bg-primary tx-white btn"
                                            data-toggle="modal" data-target="#exampleModal" style="height: 40px">
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
                                        <input type="text" placeholder="0.00" class="form-control haCurrency"
                                            id="totalPrice" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Tổng giảm giá</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="0.00" class="form-control haCurrency"
                                            id='totalDiscount' disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Mã hoá đơn</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" disabled>
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
                                        <input type="text" class="form-control fc-datepicker" id="dateImport"
                                            value="<?php echo date("d/m/Y"); ?>" name="date" placeholder="MM/DD/YYYY">
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
                                        <input id="tpBasic" type="text" class="form-control" id="hourImport" value="<?php
                                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                                        echo date("H:i:s");?>" name="hour" placeholder="Set time">
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
                                        <input type="datetime" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Giờ bán</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="time" class="form-control" disabled>
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
                                        <textarea name="note" cols="30" rows="1" class="form-control note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Trả khách hàng</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="0.00" class="form-control" id="totalPaid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Công nợ</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="0.00" class="form-control" disabled
                                            id="totalDebt">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Bác sĩ</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Bệnh nhân</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" disabled>
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
                                    style="color: white;min-width:170px;width:18%;text-align:center;">Tên hàng hoá</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:8%;text-align:center;">Số lô(*)</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:60px;width:8%;text-align:center;">HSD</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white; min-width:60px;width:8%;text-align:center;">Đvt</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:100px;width:8%;text-align:center;">S.lg trả(*)</th>
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
                        style='font-size:13px;padding:2px'></i> Lưu</button>
                <a class="btn btn-danger text-white" id="outTab2"><i class="fa fa-reply" style="font-size:13px"
                        aria-hidden="true"></i> Trở về</a>
            </div>
        </div>
        {{-- </form> --}}
    </div>

    <!-- Modal tìm kiếm nâng cao-->
    <div class="modal fade" id="timKiem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title tx-gray-800" exampleModalLabel>Tìm kiếm nâng cao</h5>
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
                                    <option value="">Sỏi thận</option>
                                    <option value="">Sỏi mật</option>
                                    <option value="">Hô hấp</option>
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
                                <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm hàng còn tồn kho</label>
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
                        <div class="row mg-t-10">
                            <div class="col-md-9">
                                <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                                <input type="text" placeholder="Nhập từ khoá tìm kiếm, ấn enter để tìm"
                                    class="form-control">
                            </div>
                            <div class="col-md-2 align-self-end">
                                <button class="btn btn-info">
                                    <i class="fa fa-search" aria-hidden="true"></i>Tìm kiếm
                                </button>
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <div class="col-md-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-kqTimKiem-tab" data-toggle="tab"
                                            href="#nav-kqTimKiem" role="tab" aria-controls="nav-kq"
                                            aria-selected="true">KQ Tìm
                                            kiếm</a>
                                        <a class="nav-item nav-link" id="nav-daChon-tab" data-toggle="tab"
                                            href="#nav-daChon" role="tab" aria-controls="nav-daChon"
                                            aria-selected="false">Đã chọn</a>
                                    </div>
                                </nav>
                                <div class="tab-content mg-t-10" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-kqTimKiem" role="tabpanel"
                                        aria-labelledby="nav-kqTimKiem-tab">
                                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                            style="width:100%" id="data-table2">
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
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-daChon" role="tabpanel"
                                        aria-labelledby="nav-daChon-tab">
                                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
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
                                                </tr>
                                            </thead>
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
    <!-- Modal dropdown1-->
    <!-- chi tiet -->
    <div class="modal fade" id="dropdown1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Phiếu khách trả</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="nhapTuNhaCUngCap" name="nhapTuNhaCUngCap" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mg-t-10">
                            <div class="col-md-3">
                                <label for="" class="tx-gray-800 tx-bold">Mã phiếu</label>
                                <input type="text" id="detailid" disabled=disabled class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="tx-gray-800 tx-bold">Ngày nhập</label>
                                <input type="text" id="detaildate" disabled=disabled class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="tx-gray-800 tx-bold">Khách hàng</label>
                                <input type="text" id="detailname" disabled=disabled class="form-control">
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <div class="col-md-12">
                                <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                <textarea name="" id="detailNote" disabled="disabled" cols="30" rows="1"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="mg-t-10 ">
                            <table id="data-table4" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                <thead>
                                    <tr>
                                        <th scope="col" class="bg-primary" style="color: white;width:3%">#</th>
                                        <th scope="col" class="bg-primary" style="color: white;width:20%">Hàng hoá</th>
                                        <th scope="col" class="bg-primary" style="color: white;width:15%">Số lô</th>
                                        <th scope="col" class="bg-primary" style="color: white;width:15%">Đơn giá</th>
                                        <th scope="col" class="bg-primary" style="color: white;width:10%">S.lượng</th>
                                        <th scope="col" class="bg-primary" style="color: white;width:15%">Thành tiền
                                        </th>
                                        <th scope="col" class="bg-primary" style="color: white;width:22%">Lý do</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-5 font-weight-bold">
                                        Tổng tiền:
                                    </div>
                                    <div class="col-md-7">
                                        <input style=" border:none;outline:none;background:none;"
                                            class="font-weight-bold text-right ng-binding ng-scope" type="text" name=""
                                            id="detailPrice" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-5 font-weight-bold">
                                        Tổng giảm giá:
                                    </div>
                                    <div class="col-md-7">
                                        <input style=" border:none;outline:none;background:none;"
                                            class="font-weight-bold text-right ng-binding ng-scope" type="text"
                                            id="detailDiscount" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
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
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
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
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-5 font-weight-bold">
                                        Trả khách hàng:
                                    </div>
                                    <div class="col-md-7">
                                        <input style="border:none;outline:none;background:none;"
                                            class="form-controller text-right ng-binding ng-scope font-weight-bold"
                                            type="text" id="detailPaid" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-5 font-weight-bold">
                                        Công nợ:
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="text-right ng-binding ng-scope font-weight-bold"
                                            id="detailDebt" disabled style="border:none;background:none;outline:none"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger font-weight-bold text-uppercase"
                            data-dismiss="modal"><i class="fas fa-times"></i> Đóng</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    {{-- end chi tiet --}}
</div>


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
function price_import(a,b,c,d){
  a = replaceCurrency(a);
  b = replaceCurrency(b);
  c = replaceCurrency(c);
  d = replaceCurrency(d);
  d = d/100;
  if(d==0){
   e = ((b-c/a) || 0);
}else{
   e = (((b-c/a)+(b-c/a)*d) || 0);
}
e = isFinite(e) && e || 0;
return e.toFixed(2);
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
      html += '<div>Số lô: <strong>'+data.lot_no+'</strong> | HSD: <strong>'+data.exp_date+'</strong> | Số lượng: <strong>'+(data.qty || 0)+'</strong> | Đon vị tính: <strong>'+data.unit+'</strong> | Giá vốn: <strong>'+decialNumber(data.price_import)+'</strong></div>';
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
    result.price = result.price_import;
    result.VAT = result.VAT_sell;
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
  console.log(item);
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
          $('#exampleModal').modal('show');
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

if(value=='unit'){
    DataTable_hanghoa[key]['unit_id'] = $('option:selected', data).attr('data-ha');
}
DataTable_hanghoa[key][value] = $(data).val();
loadData();
if(parseFloat(inputDiscount)>parseFloat(inputTotal))
   $("input[data-name='discount'][data-id='"+key+"']").focus();

console.log(DataTable_hanghoa);
}


function removeData(index){
    DataTable_hanghoa.splice(index,1);
    listLotNo.splice(index,1);
    console.log(DataTable_hanghoa);
    loadData();
}

function duplicatedData(index){
    DataTable_hanghoa.push({
        id : null,
        stock_id : DataTable_hanghoa[index].stock_id,
        customer_id : DataTable_hanghoa[index].customer_id,
        unit_id : DataTable_hanghoa[index].unit_id,
        lotno_id : DataTable_hanghoa[index].lotno_id,
        name: DataTable_hanghoa[index].name,
        lot_no: DataTable_hanghoa[index].lot_no,
        exp_date: DataTable_hanghoa[index].exp_date,
        unit: DataTable_hanghoa[index].unit,
        dataunit: DataTable_hanghoa[index].dataunit,
        qty: DataTable_hanghoa[index].qty,
        price: DataTable_hanghoa[index].price,
        discount: DataTable_hanghoa[index].discount,
        VAT: DataTable_hanghoa[index].VAT,
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
        '<input style="width:70%;" data-name="lot_no" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['lot_no'] || '')+'" onchange="updateData(this)" placeholder="Số lô" class="form-control" />',
        '<div style ="margin-top:10px" class="input-group"  class="form-control" type="text" data-name="exp_date" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['exp_date'] || '')+'" onchange="updateData(this)">'+item.exp_date+'</div>',
        '<select style="width:100%;" onchange="updateData(this)" data-name="unit" data-id="'+index+'">'+getUnit(DataTable_hanghoa[index].dataunit,DataTable_hanghoa[index].unit)+'</select>',
        '<input class="form-control" style="width:80%;" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['qty'] || 0)+'" onchange="updateData(this)" />',
        '<input class="form-control" style="width:80%;" type="text" data-name="price" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['price'] || 0)+'" onchange="updateData(this)" />',
        '<input class="form-control"style="width:80%;" type="text" data-name="discount" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['discount'] || 0)+'" onchange="updateData(this)" />',
        '<input class="form-control" style="width:80%;" type="text" data-name="VAT" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['VAT'] || 0)+'" onchange="updateData(this)" />',
        '<input class="form-control" style="width:100%;border:0;background:none" type="text" data-name="total" data-id="'+index+'" value="'+new Intl.NumberFormat('en-US').format(total(DataTable_hanghoa[index].qty || 0,DataTable_hanghoa[index].price || 0,DataTable_hanghoa[index].discount || 0,DataTable_hanghoa[index].VAT || 0))+'" onchange="updateData(this)" disabled />',
        '<input class="form-control" style="width:80%;" type="text" data-name="note" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['note'] || '')+'" onchange="updateData(this)" placeholder="Lý do" />',
        '<span class="fa fa-plus-square" style="color:#0753a1;cursor:pointer;font-size:125%" data-id="'+index+'" onclick="duplicatedData('+index+')"></span> <span class="fas fa-trash-alt" style="color:#bd2130;cursor:pointer;font-size:125%" data-id="'+index+'" onclick="removeData('+index+')"></span>'
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
      new AutoNumeric("input[data-name='VAT'][data-id='"+index+"']", {
       maximumValue: 100,
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
        DataTable_hanghoa[item.index].lotno_id = item.id;
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
    .columns(8).search($("#searchByStatus").val())
    .columns(10).search($("#searchByStock").val())
    .draw();
}
};

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table_stock = $('#data-table-stock').DataTable({
      processing: true,
      responsive: true,
      "ordering": false,
      "info": false,
      "lengthChange": false,
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
     url: "{{ url('banhang') }}",
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
{ data: 'id', name: 'id'},
{ data: null,
 "render": function(data,type,row) {
    if(data['name'] ==null){
       return 'Khách lẻ'
   }else{
       return data["name"]
   }
}
},
{ data:'date', name: 'date'},
{ data: null, orderable: false,
    "render": function(data,type,row) { return new Intl.NumberFormat('en-US',{
        style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
    }).format(data["price_import"])}
},
{ data: 'status', name: 'status'},
{ data: 'checkbox', name: 'checkbox' },
{ data: 'action_kh', name: 'action_kh'},
],
columnDefs: [
{
 targets: 3,
 render: $.fn.dataTable.render.number(',', 0, '')
}
],
});

    table_stock.on('order.dt search.dt', function () {
      table_stock.column(0).nodes().each(function (cell, i) {
         cell.innerHTML = i + 1;
     });
  }).draw();



    $('#status').change(function(){
      $('#data-table-stock').DataTable().draw();
  });
    $('#checkbox').change(function(){
      $('#data-table-stock').DataTable().draw();
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
            url: "{{ url('khachhangtralai') }}",
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
        { data: 'id', name: 'id', orderable: false},
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
        { data: null, orderable: false,
            "render": function(data,type,row) { return "HD0000"+data["id"]}
        },
        { data: null, orderable: false,
         "render": function(data,type,row) {
            if(data['name'] ==null){
               return 'Khách lẻ'
           }else{
               return data["name"]
           }
       }
   },
   { data: null, orderable: false,
     "render": function(data,type,row) { return new Intl.NumberFormat('en-US',{
        style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
    }).format(data["total"])}
 },
 { data: null, orderable: false,
     "render": function(data,type,row) { return new Intl.NumberFormat('en-US',{
        style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
    }).format(data["totalpaid"])}
 },
 { data: 'note', name: 'note',orderable: false },
 { data: 'status', name: 'status',orderable: false},
 { data: 'action', name: 'action',orderable: false},
 ],
 dom: 'Blfrtip',
buttons: [
{
    extend: 'excelHtml5',
    title: 'KhangHangTraLai_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
    text:'<span class="text-light">Xuất file Excel</span>',
    exportOptions: {
        columns: [1, 2, 3, 4, 5, 6, 7]
    },
}
],
 columnDefs: [
 {
   targets: 6,
   render: $.fn.dataTable.render.number(',', 0, '')
}
],
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
   url: "{{ url('banhang/autosearchimage') }}",
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
      $('#timKiem').modal('hide');
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

});

function getUnit(list,selected){
	var unitList = [];
	if(Array.isArray(list)){
		list.forEach(item => {
			if(item.name == selected){
				unitList = unitList + '<option data-ha="'+item.unit_id+'" value="'+item.name+'" selected>'+item.name+'</option>';
			}else{
				unitList = unitList + '<option data-ha="'+item.unit_id+'" value="'+item.name+'">'+item.name+'</option>';
			}
		});
	}else{
		unitList = '<option data-ha="'+item.unit_id+'" value="'+list+'">'+list+'</option>';
	}
	return unitList;
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
        }
    }
    if(haCheck==0){
        $.ajax({
          url: "{{ url('khachhangtralai/submitkhachhang') }}",
          type: "POST",
          data: $('#submitkhachhang').serialize()+"&totalpaid="+replaceCurrency($('#totalPaid').val()),
          success: function( response ) {
            DataTable_hanghoa.forEach(item => {
              item.idha = response.id;
              item.qty = replaceCurrency(item.qty);
              item.price = replaceCurrency(item.price);
              item.discount = replaceCurrency(item.discount);
              item.VAT = replaceCurrency(item.VAT);
              item.type = "return_from_customer"
          });
            $.ajax({
              url: "{{ url('khachhangtralai/submitphieunhap') }}",
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



function detailFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('khachhangtralai/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
      $('#detailid').val("PKT"+checkRangeValue(res.id));
        $('#detailname').val(res.name);
        $('#detaildate').val(res.date);
        $('#detailNote').val(res.note);
      $('#detailPaid').val(decialNumber(res.totalpaid));
            console.log(res);

    $.ajax({
       type:"GET",
       url: "{{ url('khachhangtralai/editstock') }}",
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
            { data: null,
                "render": function(data,type,row) {
                    return decialNumber(data['price'])}
                },
                { data: null,
                    "render": function(data,type,row) {
                        return data['qty'] +' <span class="font-weight-bold">('+data['unit']+')'
                    }
                },
                { data: null,
                   "render": function(data,type,row) { return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(total(data["qty"],data["price"],data["discount"],data["VAT"]))}
               },
               { data: 'note', name: 'note' },
               ],
               columnDefs: [
               {
                targets: 3,
                render: $.fn.dataTable.render.number(',', 0, '')
            }
            ],
        });
         table4.on('order.dt search.dt', function () {
          table4.column(0).nodes().each(function (cell, i) {
             cell.innerHTML = i + 1;
         });
      }).draw();
        var detailPrice = response.reduce((a,b)=>
            a+b.qty*parseFloat(b.price),0
            );
        var detailDiscount = response.reduce((a, b)=>
            parseFloat(a) + parseFloat(b.discount),0
            );
        var detailMoney = response.reduce((a, b)=>
            parseFloat(a) + parseFloat(total(b.qty,b.price,b.discount,b.VAT)),0
            );

        $('#detailPrice').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailPrice));
        $('#detailDiscount').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailDiscount));
        $('#detailMoney').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailMoney));

        var tempMoney = parseFloat(replaceCurrency($('#detailMoney').val()));
        var tempPrice = parseFloat(replaceCurrency($('#detailPrice').val()));
        var tempDiscount = parseFloat(replaceCurrency($('#detailDiscount').val()));
        $('#detailVAT').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(tempMoney-tempPrice+tempDiscount));

        var tempPaid = parseFloat(replaceCurrency($('#detailPaid').val()));
        $('#detailDebt').val(new Intl.NumberFormat('en-US').format(substrac(tempMoney,tempPaid)));
        console.log(response);
    }
            });
        }
    });

}

function duplicatedFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('khachhangtralai/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#idCustomer').val(res.idcustomer);
        $('#autoSearch').val(res.name);
        $('#dateImport').val(res.date);
        $('#hourImport').val(res.hour);
        $('.note').val(res.note);
        if(res.name){
            inputCustomer();
        }
        $.ajax({
          type:"GET",
          url: "{{ url('khachhangtralai/editstock') }}",
          data: { id: id },
          dataType: 'json',
          success: function(response){
            response.forEach(item => {
                item.dataunit = getDataUnitStock(item.stock_id);
                item.customer_id = null;
                item.id = null
            });
            DataTable_hanghoa = response;
            console.log(DataTable_hanghoa);
            loadData();
        }
    });
    }
});
}
function changeFunc(id) {
    Swal.fire({
        title: "Hệ thống sẽ huỷ các phiếu chi có liên quan đến phiếu PKT0000 "+id+" Bạn chắc chắn muốn phiếu này?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "{{ url('khachhangtralai/active') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $("#data-table1").load(
                        $.toast({
                            text: "Tạm dừng hoạt động khách hàng trả lại",
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
	$.ajax({
		type:"GET",
		url: "{{ url('khachhangtralai/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$.ajax({
				type:"GET",
				url: "{{ url('khachhangtralai/editstock') }}",
				data: { id: id },
				dataType: 'json',
				success: function(response){
					var detailPrice = response.reduce((a,b)=>
						a+b.qty*parseFloat(b.price),0
						);
					var detailDiscount = response.reduce((a, b)=>
						parseFloat(a) + parseFloat(b.discount),0
						);
					var detailMoney = response.reduce((a, b)=>
						parseFloat(a) + parseFloat(total(b.qty,b.price,b.discount,b.VAT)),0
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

                        <p style="text-align:center"><strong>PHIẾU KHÁCH HÀNG TRẢ LẠI</strong></p>

                        <table class="mg-b-0 tx-13 tx-gray-700" style="width:100%">
                        <tbody>
                        <tr>
                        <td>Khách hàng:<strong>`+($('#autoSearch').val() || 'Khách lẻ')+`</strong></td>
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
							<td>`+decialNumber(item.discount)+`</td>
							<td>`+item.VAT+`%</td>
							<td>`+decialNumber(total(item.qty,item.price,item.discount,item.VAT))+`</td>
							</tr>`)
					});

					mywindow.document.write(`
						<p>&nbsp;</p>
						<table class="mg-b-0 tx-13 tx-gray-700" style="width:100%;margin-top:50px">
						<tbody>
						<tr>
						<td style="text-align:right"><strong>Tổng tiền hàng:&ensp;`+decialNumber(detailPrice)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Giảm giá:&ensp;`+decialNumber(detailDiscount)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Tổng tiền trước thuế:&ensp;`+decialNumber(detailPrice-detailDiscount)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right">Tổng VAT:<strong>&ensp;`+decialNumber(detailMoney-detailPrice-detailDiscount)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Tổng tiền:&ensp;`+decialNumber(detailPrice)+`</strong></td>
						</tr>
                        <tr>
                        <td style="text-align:right"><strong>Thanh toán:&ensp;`+decialNumber(detailPrice)+`</strong></td>
                        </tr>
                        <tr>
                        <td style="text-align:right"><strong>Công nợ: 0.00 &ensp;</strong></td>
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

function editFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('khachhangtralai/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#labelTaoMoiPhieuTra').html(`Khách hàng trả lại > Sửa phiếu: PKT${checkRangeValue(res.id)}`);
        $('#id').val(res.id);
        $('#idCustomer').val(res.idcustomer);
        $('#autoSearch').val(res.name);
        $('#dateImport').val(res.date);
        $('#hourImport').val(res.hour);
        $('.note').val(res.note);
        if(res.name){
            inputCustomer();
        }
        $.ajax({
          type:"GET",
          url: "{{ url('khachhangtralai/editstock') }}",
          data: { id: id },
          dataType: 'json',
          success: function(response){
            response.forEach(item=>{
              item.dataunit = getDataUnitStock(item.stock_id);
              item.totalPaid = res.totalpaid
          })
            DataTable_hanghoa = response;
            console.log(DataTable_hanghoa);
            loadData();

            AutoNumeric.getAutoNumericElement('#totalPaid').set(res.totalpaid);
            var tempMoney = parseFloat(replaceCurrency($('#totalMoney').val()));
            $('#totalDebt').val(new Intl.NumberFormat('en-US').format(tempMoney-res.totalpaid));
        }
    });
    }
});
}

function duplicatedFuncKh(id){
    $.ajax({
		type:"GET",
		url: "{{ url('banhang/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
            $('#id').val(res.id);
            $('#idCustomer').val(res.idcustomer);
            $('#autoSearch').val(res.name);
            $('#dateImport').val(res.date);
            $('#hourImport').val(res.hour);
            $('.note').val(res.note);
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
                    item.totalPaid = res.totalpaid;
                    item.customer_id = null;
                    item.id = null
                })
                    DataTable_hanghoa = response;
                    console.log(DataTable_hanghoa);
                    loadData();

					$('#exampleModalLabhd').modal('hide');
                    AutoNumeric.getAutoNumericElement('#totalPaid').set(res.totalpaid);
                    var tempMoney = parseFloat(replaceCurrency($('#totalMoney').val()));
                    $('#totalDebt').val(new Intl.NumberFormat('en-US').format(tempMoney-res.totalpaid));
				}
			});
		}
	});
}
</script>
<script>
    $(document).ready(function() {

        new AutoNumeric("#totalPaid",{
           minimumValue: 0,
           modifyValueOnWheel: false,
           unformatOnHover: false
       });
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

            $('#tpBasic').timepicker();

            $("#inTab2").click(function() {
                $(".tab1").addClass("hidden");
                $(".tab2").removeClass("hidden");
                $('#labelTaoMoiPhieuTra').html(`Khách hàng trả lại > Tạo mới`);
            })
            $('.toggle').toggles({
                on: true,
                height: 26
            });
            let taoPhieuNhapTon = $("#taoPhieuNhapTon");
            if (taoPhieuNhapTon.length) {
                taoPhieuNhapTon.validate({
                    rules: {
                        khachhang: {
                            required: true
                        },
                        date: {
                            required: true
                        },
                        time: {
                            required: true
                        },
                    },
                    messages: {
                        khachhang: {
                            required: 'Vui lòng điền thông tin khách hàng'
                        },
                        date: {
                            required: 'Vui lòng điền ngày trả'
                        },
                        time: {
                            required: 'Vui lòng điền thời gian trả'
                        }
                    }
                })
            }


            $(function(){
                let thongTinKhachHang = $("#thongTinKhachHang");
                if(thongTinKhachHang.length){
                    thongTinKhachHang.validate({
                        rules:{
                            name:{
                                required:true
                            }
                        },
                        messages:{
                            name:{
                                required:'Vui lòng điền thông tin'
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
                                url: "{{ url('khachhang') }}",
                                type: "POST",
                                data: $('#thongTinKhachHang').serialize(),
                                success: function( response ) {
                                    $("#submit").attr("disabled", false);
                                    $("#submit").load(
                                        $.toast({
                                            text : "Lưu thông tin khách hàng thành công",
                                            position: "bottom-right",
                                            icon:"success",
                                            stack:1,
                                            loader:false
                                        }));
                                                $('#exampleModal').modal('hide');
                                    document.getElementById("thongTinKhachHang").reset();
                                }
                            });
                        }
                    })
                }
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

        });

function resetTab(){
    $('#id').val("");
    $('#idUpdate').val("");
    $('.submitPhieuNhap').trigger("reset");
    $('#autoSearchImage').val("");
    DataTable_hanghoa = [];
    loadData();
    $(".tab1").removeClass("hidden");
    $(".tab2").addClass("hidden");
}


</script>
<style>
    #data-table-stock #thID {
        width: 12% !important;
    }

    #data-table-stock #thMa {
        width: 15% !important;
    }

    #data-table-stock #thLoai {
        width: 25% !important;
    }

    #data-table-stock #thNgay {
        width: 17% !important;
    }

    #data-table-stock #thDoi {
        width: 20% !important;
    }

    #data-table-stock #thChech {
        width: 15% !important;
    }

    #data-table-stock #thChech1 {
        width: 15% !important;
    }
</style>
@endsection


@extends('default')
@section('title','Bán hàng')
@section('content')
<style>
    @media screen and (max-width:767px) {
        .thanhToanHoaDon {
            padding: 0 !important;
            margin-top: 10px;
        }
    }
</style>
<div class="tab1">
    <div class="br-mainpanel" style="overflow-y: hidden;">
        <div class="pd-x-30 pd-t-30 d-flex justify-content-between">
            <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Bán hàng</h4>
            <div class="d-flex">
                <div class="mg-r-10">
                    <!-- Tạo phiếu khách trả -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"
                        title="Tạo phiếu khách trả">
                        <i class="fa fa-retweet" aria-hidden="true"></i>
                    </button>
                    <!-- Modal tạo phiếu khách trả-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document"
                            style="max-width:none;width: 80%;vertical-align: top;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title tx-gray-900 text-dark" >Sao chép hóa
                                        đơn</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="">
                                    <div class="modal-body">
                                        <div class="row tx-gray-900 ">
                                            <div class="col-md-3 col-lg-2">
                                                <label for="">Từ ngày</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control fc-datepicker"
                                                        value="<?php echo date("Y/m/d"); ?>" placeholder="MM/DD/YYYY">
                                                    <span class="input-group-addon"><i
                                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                </div>
                                            </div>
                                            <div class=" col-md-3 col-lg-2">
                                                <label for="">Tới ngày</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control fc-datepicker"
                                                        value="<?php echo date("Y/m/d"); ?>" placeholder="MM/DD/YYYY">
                                                    <span class="input-group-addon"><i
                                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                </div>
                                            </div>
                                            <div class=" col-md-3 col-lg-2">
                                                <label for="">Trạng thái</label>
                                                <select name="" id="status"
                                                    class="form-control select2 select2-container" style="width:100%">
                                                    <option value="1">Hoàn thành</option>
                                                    <option value="0">Đã hủy</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <label for="">Hoá đơn</label>
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
                                                    placeholder="Nhập mã hoặc ấn tên hàng hoá, ấn enter để tìm">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Tìm kiếm theo hoá đơn</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Tìm kiếm theo mã hóa đơn hoặc tên khách hàng">
                                                    <button class="input-group-addon"
                                                        style="background-color: #36c6d3;"><em
                                                            class="fa fa-search text-white"></em></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mg-t-20">
                                            <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                id="data-table1" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="bg-primary" style="color: white;">Mã hoá
                                                            đơn</th>
                                                        <th scope="col" class="bg-primary" style="color: white;">Khách
                                                            hàng</th>
                                                        <th scope="col" class="bg-primary" style="color: white;">Ngày
                                                            giờ bán hàng</th>
                                                        <th scope="col" class="bg-primary" style="color: white;">Tổng
                                                            tiền</th>
                                                        <th scope="col" class="bg-primary" style="color: white;">Trạng
                                                            thái</th>
                                                        <th scope="col" class="bg-primary" style="color: white;">Bán
                                                            theo đơn</th>
                                                        <th scope="col" class="bg-primary" style="color: white;">Thao
                                                            tác</th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Báo cáo doanh thu">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal"
                                data-target="#modalBaoCaoDoanhThu">
                                <em class="fa fa-book"></em>
                                Báo cáo doanh thu
                            </button>
                        </div>
                        <!-- Modal báo cáo doanh thu-->
                        <div class="modal fade" id="modalBaoCaoDoanhThu" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document"
                                style="max-width: none;width: 80%;vertical-align: top;">
                                <div class="modal-content pd-20">
                                    <div class="modal-body pd-t-5" style="box-shadow: 0 2px 3px 2px rgb(0 0 0 / 3%);">
                                        <div class="modal-header pd-0">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">Báo cáo doanh
                                                thu bán hàng theo nhân viên
                                            </h5>
                                            <button type="button" class="btn btn-info" id="exportExcelDBLotNo"><i
                                                    class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="row tx-gray-900 mg-t-15">
                                            <div class="col-md-3 col-lg-2">
                                                <label for="">Kiểu hiển thị</label>
                                                <select name="" id="" class="form-control select2 select2-container"
                                                    style="width:100%">
                                                    <option value="Tiền">Tiền</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <label for="">Người bán</label>
                                                <select name="" id="" class="form-control select2 select2-container"
                                                    style="width:100%">
                                                    <option value="Tiền">Admin</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <label for="">Loại thời gian</label>
                                                <select name="" id="" class="form-control select2 select2-container"
                                                    style="width:100%">
                                                    <option value="Năm">Năm</option>
                                                    <option value="Quý">Quý</option>
                                                    <option value="Tháng">Tháng</option>
                                                    <option value="Ngày">Ngày</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-lg-2">
                                                <label for="">Từ ngày</label>
                                                <input type="date" id="searchByStartDate" class="form-control"
                                                    value="<?php echo date('Y-m-d'); ?>" />
                                            </div>
                                            <div class=" col-md-3 col-lg-2">
                                                <label for="">Tới ngày</label>
                                                <input type="date" id="searchByEndDate" class="form-control"
                                                    value="<?php echo date('Y-m-d'); ?>" />
                                            </div>
                                        </div>
                                        <div class=" row tx-gray-900 mg-t-5">
                                            <div class="col-md-4">
                                                <label for="">Nhà thuốc</label>
                                                <input type="text" class="form-control"
                                                    value="Hộ kinh doanh nhà thuốc Morioka" disabled="">
                                            </div>
                                            <div class="col-md-8 row">
                                                <div class="col-10">
                                                    <label for="">Từ khoá tìm kiếm</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Tìm kiếm theo tên nhân viên" autocomplete="off" id="searchProduct">
                                                </div>
                                                <div class="col-2" style="align-self: flex-end;">
                                                    <button class="btn btn-info" id="searchBaoCao"><i
                                                            class="fas fa-search" style="padding: 3px"
                                                            aria-hidden="true"></i> Tìm
                                                        kiếm</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mg-t-20">
                                            <label for="" class="tx-bold tx-gray-800" id="info-ban-hang"></label>
                                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                id="ban-hang" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="bg-primary" style="color: white;"
                                                            id="thID">#</th>
                                                        <th scope="col" class="bg-primary" style="color: white;"
                                                            id="thMa">Nhân viên</th>
                                                        <th scope="col" class="bg-primary" style="color: white;"
                                                            id="thLoai">Thời gian</th>
                                                        <th scope="col" class="bg-primary" style="color: white;"
                                                            id="thNgay">Tổng tiền hoá đơn</th>
                                                        <th scope="col" class="bg-primary" style="color: white;"
                                                            id="thDoi">Tổng giảm giá hoá đơn</th>
                                                        <th scope="col" class="bg-primary" style="color: white;"
                                                            id="thChech">Tổng tiền khách trả lại</th>
                                                        <th scope="col" class="bg-primary" style="color: white;"
                                                            id="thSTT">Tổng giảm giá khách trả</th>
                                                        <th scope="col" class="bg-primary" style="color: white;"
                                                            id="thSolo">Doanh thu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="modal-footer pd-b-0">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                class="fa fa-close"></em> Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="br-pagebody pd-x-30 pd-b-30">
            <div class="row row-sm mg-t-20">
                <div class="col-xl-8 col-lg-6 col-md-4 bg-white shadow-base" style="overflow:hidden;">
                    <div class=" pd-15  ">
                        <div class="mg-b-20">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="input-group hidden-xs-down transition align-items-center">
                                        <input autocomplete="off" id="autoSearchImage" class="form-control"
                                            placeholder="Tìm kiếm tên hàng hoá theo tên">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#Don1">Đơn thuốc
                                                1</a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <form id="submitBanHang">
                                <div class="tab-content mg-t-10" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="Don1">
                                        <div>
                                            <input type="hidden" name="checkbox" value="0">
                                            <input type="checkbox" id="checkBoxTheoDon" name="checkbox" value="0">
                                            <label for="theoDon" id="checkBoxTheoDon" class="tx-gray-800">Bán theo
                                                đơn</label>
                                        </div>
                                        <!-- Table -->
                                        <div style="overflow-x: auto;">
                                            <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
                                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                id="data-table3">
                                                <thead>
                                                    <tr class="on-row">
                                                        <th scope="col" class="bg-light "
                                                            style="min-width:6px;width:2%;text-align:center;">#</th>
                                                        <th scope="col" class="bg-light "
                                                            style="min-width:280px;width:50%;text-align:center;">Tên
                                                            hàng</th>
                                                        <th scope="col" class="bg-light"
                                                            style="min-width:80px;width:8%;text-align:center;">Đơn vị
                                                            tính
                                                        </th>
                                                        <th scope="col" class="bg-light"
                                                            style="min-width:70px;width:8%;text-align:center;">Số lượng
                                                        </th>
                                                        <th scope="col" class="bg-light"
                                                            style="min-width:120px;width:10%;text-align:center;">Giá bán
                                                        </th>
                                                        <th scope="col" class="bg-light"
                                                            style="min-width:120px;width:10%;text-align:center;">Thành
                                                            tiền</th>
                                                        <th scope="col" class="bg-light"
                                                            style="min-width:10px;width:4%;text-align:center;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div id="mySidebar" class="sidebar bg-gray-400 hidden show-sidebar" style="width: 100%;position: absolute;
                            bottom: 0;left: 0;transition: 0.5s;height: 0;z-index: 1;">
                            <a href="javascript:void(0)" class="bg-gray-400 tx-center" id="toggleBar" style="position: absolute;
                            top: 0;left :50%;transform: translateX(-50%) translateY(-90%);font-size: 20px;padding: 10px 20px;
                            border-radius: 5px;">
                                <div class="tx-gray-800 tx-16">Thông tin đơn thuốc</div>
                            </a>
                            <div class="pd-10 ">
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Mã đơn thuốc</label>
                                        <div class="input-group hidden-xs-down transition align-items-center">
                                            <input id="searchbox" type="text" class="form-control"
                                                placeholder="Tìm kiếm tên hàng hoá theo tên, mã, mã vạch">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button"><i
                                                        class="fa fa-search"></i></button>
                                            </span>
                                        </div><!-- input-group -->
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-bold tx-gray-800">Ngày kê đơn</label>
                                        <input type="text" class="form-control fc-datepicker"
                                            value="<?php echo date("Y/m/d"); ?>" placeholder="MM/DD/YYYY">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-bold tx-gray-800">Bác sĩ kê đơn<span
                                                class="text-danger">*</span></label>
                                        <div class="col-12 pl-0">
                                            <input type="hidden" name="id" id="id">
                                            <input type="hidden" name="iddoctor" id="idDoctor">
                                            <input type="text" name="doctor" autocomplete="off" id="autoSearchDoctor"
                                                class="form-control"
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
                                        <label for="" class="tx-bold tx-gray-800">Cơ sở khám bệnh<span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="medical_facility"
                                            id="medical_facility" placeholder="Nhập cơ sở khám bệnh">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Chuẩn đoán</label>
                                        <input type="text" class="form-control" name="diagnostic" id="diagnostic">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Bệnh nhân<span
                                                style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="patient" id="patient"
                                            placeholder="Bệnh nhân">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="tx-gray-800 tx-bold">Giới tính</label>
                                        <div>
                                            <input type="radio" id="nam" value="nam" name="male_female" checked> <label
                                                for="nam" class="tx-gray-800 ">Nam</label>
                                            <input type="radio" id="nu" value="nu" name="male_female"> <label for="nu"
                                                class="tx-gray-800">Nữ</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="tx-bold tx-gray-800">Cân nặng(kg)</label>
                                        <input type="text" name="weight" id="weight" class="form-control" value="0"
                                            placeholder="0.0">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="tx-bold tx-gray-800">Tuổi</label>
                                        <input type="text" name="year_old" id="year_old" value="0" class="form-control"
                                            placeholder="0">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="tx-gray-800 tx-bold">Loại</label>
                                        <div>
                                            <input type="radio" id="tuoi" name="species" value="tuoi" checked> <label
                                                for="tuoi" class="tx-gray-800">Tuổi</label>
                                            <input type="radio" id="thang" name="species" value="thang"> <label
                                                for="thang" class="tx-gray-800">Tháng</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Địa chỉ <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="địa chỉ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Người dám hộ <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="guardian" name="guardian"
                                            placeholder="Người dám hộ">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="tx-bold tx-gray-800">CMND</label>
                                        <input type="text" class="form-control" name="CMND" id="CMND">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="tx-bold tx-gray-800">Điện thoại</label>
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="tx-gray-800 tx-bold">Thể BHYT</label>
                                        <input type="text" class="form-control" id="BHYT" name="BHYT">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- col-8 -->
                </div>
                <div class="col-xl-4 col-lg-6 col-md-8 col-sm-12 thanhToanHoaDon" style="width:400px;">
                    <div class="card bd-0 shadow-base pd-15">
                        <nav>
                            <div class="row nav nav-tabs">
                                <div class="col-md-6">
                                    <div class="" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                            href="#thanhToan" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Thanh toán</a>
                                    </div>
                                </div>
                                <div style="" class="col-md-6 mg-t-4">
                                    <input type="hidden" name="onlineSelling" value="0">
                                    <input type="checkbox" id="checkBoxTheoDonOnline" name="onlineSelling" value="0">
                                    <label for="theoDon" id="checkBoxTheoDonOnline" class="tx-gray-800">Bán Hàng
                                        Online</label>
                                </div>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="thanhToan" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="d-flex mg-t-10">
                                    <div class=" tx-14">
                                        <span><i class="fas fa-user-circle"></i></span>
                                        <span class="tx-gray-800">{{ Auth::user()->name }}</span>
                                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                                    </div>
                                    <div class="pd-l-10 d-flex">
                                        <input readonly="" type="text" class="form-control fc-datepicker" name="date"
                                            value="<?php echo date("d/m/Y"); ?>" placeholder="MM/DD/YYYY">
                                    </div>
                                    <div class="pd-l-10 d-flex">
                                        <input id="tpBasic" type="text" class="form-control hour" value="<?php
                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                            echo date("H:i:s");?>" name="hour" placeholder="Set time" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <div class="row mg-t-8">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800">Tên khách hàng</label>
                                        <div class="transition align-items-center">
                                            <div class="pos-relative">
                                                <input type="hidden" name="id" id="id">
                                                <input type="hidden" name="idcustomer" id="idCustomer">
                                                <input name="name" autocomplete="nope" class="form-control"
                                                    id="autoSearch"
                                                    placeholder="Tìm kiếm khách hàng theo tên hoặc số điện thoại">
                                                <button type="button" style="" id="buttonSupplier"
                                                    class="pos-absolute r-0 t-0 tx-white btn btn-primary"
                                                    data-toggle="modal" data-target="#timKiem1">
                                                    <i class="fa fa-plus-circle" style="margin:0px;padding:0px"
                                                        aria-hidden="true"></i>
                                                </button>
                                                <div id="buttonSupplierClose"
                                                    class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                        class="fa fa-times"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mg-t-10 seler-donthuoc "
                                    style="justify-content:space-between;">
                                    <div class="" style="width:50%;">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-tag" aria-hidden="true" style="padding:1px"></i>
                                            <select name="pricelist" id="pricelist"
                                                class="bd-gray-400 select2 select2-container"
                                                data-placeholder="Bảng giá mặc định" style="width:100%">
                                                <option value=""></option>
                                                @foreach (App\Models\PriceList::all() as $priceid)
                                                <option value="{{ $priceid->id }}">
                                                    {{ $priceid->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div style="width:50%;margin-left:5px;">
                                        <div class="d-flex align-items-center" style="width:100%;">
                                            <i class="far fa-file-alt"></i>
                                            <div class="donThuoc tx-gray-800 bd pos-relative"
                                                style="margin-left:10px;border:none;flex-grow:2;">
                                                <div class="donThuoc__tieuDe" style="width:100%">
                                                    <div class="donThuoc__click" style="cursor:default;">
                                                        <span class="donThuoc__tieuDe-chu" style="color: #aeb7c1;">Đơn
                                                            thuốc mẫu</span><i
                                                            class="multiselect dropdown-toggle btn bg-white"
                                                            aria-hidden="true"
                                                            style="position:absolute;right:0;top:50%;transform:translateY(-50%);"></i>
                                                    </div>
                                                    <div class="pos-absolute donThuoc__sub"
                                                        style="right:0;z-index:1;display:none;">
                                                        <ul class="donThuoc__noiDung"
                                                            style="list-style:none;border:none;box-shadow:5px 5px 5px 5px #eaeaea;background-color: #fff;min-width: 175px;padding:0 2px;margin-top:5px">
                                                            @foreach (App\Models\SamplePrescription::all() as $priceid)
                                                            <li style="margin:5px 0;" class="item active abc">
                                                                <label class="checkbox w-100" for="{{ $priceid->id }}"
                                                                    style="margin-bottom:0;height:30px"
                                                                    onClick="duplicatedFunc1({{ $priceid->id }})"><input
                                                                        style="margin-top:5px; margin-left:5px"
                                                                        type="checkbox"> {{ $priceid->name }}</label>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-5">
                                        <label for="" class="tx-gray-800">Tổng tiền hàng</label>
                                    </div>
                                    <div class="col-md-7" style="text-align: end;">
                                        <input style=" border:none;outline:none;background:none;font-size:110%"
                                            class="form-controller font-weight-bold text-right ng-binding ng-scope total"
                                            id="total" readonly placeholder="0.00">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-5">
                                        <label for="" class="tx-gray-800">Tổng giảm giá</label>
                                    </div>
                                    <div class="col-md-7" style="text-align: end;">
                                        <input
                                            style="border-width: 0 0 1px;border-color:#dee2e6;outline:none;background:none;"
                                            value="0.00" class="form-controller text-right ng-binding ng-scope sale"
                                            type="text" readonly id="sale" placeholder="0.00" data-container="body"
                                            data-toggle="popover" data-placement="right">
                                        <div id="popover-content" style="display: none;padding:9px 14px;">
                                            <div class="popper-content ng-scope" style="padding-top: 10px;">
                                                <div class="">
                                                    <div class="d-flex" style="justify-content:space-between;">
                                                        <div class="" style="width:55%">
                                                            <input class="form-control tx-right" type="text"
                                                                id="demo_button_one" value="0.00" autofocus="autofocus">
                                                        </div>
                                                        <span class="d-flex"
                                                            style="width:38%;justify-content:space-between;">
                                                            <button class="btn btn-primary" type="button">VND</button>
                                                            <button class="btn btn-primary" type="button">%</button>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="mt-3 tx-right">
                                                    <button class="btn btn-success" id="demo_button" type="button">Xác
                                                        nhận</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Hủy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-5">
                                        <label for="" class="tx-gray-800">Khách cần trả</label>
                                    </div>
                                    <div class="col-md-7" style="text-align: end;">
                                        <input
                                            style="border-width: 0 0 1px;border-color:#dee2e6;outline:none;background:none"
                                            class="form-controller text-right font-weight-bold ng-binding ng-scope total"
                                            id="price_import" type="text" placeholder="0.00" readonly>
                                    </div>

                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-5">
                                        <label for="" class="tx-gray-800">Khách thanh toán</label>

                                    </div>
                                    <div class="col-md-7" style="text-align: end;">
                                        <input
                                            style="border-width: 0 0 1px;border-color:#dee2e6;outline:none;background:none;"
                                            class="form-controller text-right ng-binding ng-scope" id="paid"
                                            onchange="haChange()" type="text" value="0.00">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-5">
                                        <label for="" class="tx-gray-800">Tiền thừa trả khách</label>
                                    </div>
                                    <div class="col-md-7" style="text-align: end;">
                                        <input id="thanhTien"
                                            style=" border:none;outline:none;background:none;font-size:110%"
                                            class="form-controller font-weight-bold text-right ng-binding ng-scope"
                                            type="text" placeholder="0.00" readonly>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800">Ghi chú</label>
                                        <textarea name="note" cols="30" rows="1" class="form-control"></textarea>
                                    </div>
                                </div>
                                </form>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" onclick="submitHoaDon()"
                                            style="width: 100%;font-size: 120%">Thanh toán</button>
                                    </div>
                                    <div class="col-md-12 mg-t-10">
                                        <button class="btn btn-info" onclick="submitHoaDon(1)" id="buttonInHoaDon"
                                            type="button" data-toggle="modal" style="width: 100%;font-size:120%">Thanh
                                            toán và in hoá đơn</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- card -->
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
                        <h5 class="modal-title" >Thêm mới bác sỹ</h5>
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
                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em>Lưu và
                                thêm mới</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                    class="fa fa-close"></em>Đóng</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- Modal thêm mới khách hàng-->
        <div class="modal fade" id="timKiem1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        <!-- Modal thanh toán và in hoá đơn-->
        <div class="modal fade" id="thanhToanInHd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="width:30%;vertical-align:top;">
                <div class="modal-content">
                    <div class="modal-header bg-primary" style="border-radius: 0.3rem 0.3rem 0 0">
                        <h5 class="modal-title " style="color:white;">Chọn mẫu in</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color:white" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <div class="chonMauIn bg-info"
                                    style="padding: 8px 14px 7px 14px;color:white;border-radius:2px;cursor:pointer;">
                                    In Hoá Đơn
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em>
                            Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- br-mainpanel -->
</div>
<!-- ########## END: MAIN PANEL ########## -->
<style>
    .show-sidebar {
        height: 350px !important;
    }

    .hidden1 {
        display: none;
    }

    #thanhToan .select2-selection--single {
        border: 1px solid white !important;
        margin-top: 0px;
    }

    .abc:hover {
        text-decoration: none;
        background-image: none;
        background-color: #f6f6f6;
        color: #555;
        filter: none;
    }

    .changeBackground {
        background-color: #337ab7;
        color: #fff;
    }

    input[readonly] {
        cursor: pointer;
    }
</style>
<script>
    function haChange(){
      let tongTienHang = $('#price_import').val() || 0;
      let khachThanhToan = $('#paid').val() || 0;
      let tienTraKhach = parseFloat(replaceCurrency(tongTienHang))-parseFloat(replaceCurrency(khachThanhToan));

      if(tienTraKhach<0){
         $('#thanhTien').val(new Intl.NumberFormat('en-US',{
            style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
        }).format(0-tienTraKhach));
     }else{
         $('#thanhTien').val(new Intl.NumberFormat('en-US',{
            style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
        }).format(0-tienTraKhach));
     }
 }
 function decialNumber(number){
  return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
}

$(document).ready(function(){

  $('.donThuoc__noiDung .item .checkbox').each(function(index,value){
     value.addEventListener('click',function(){
        if($(this).hasClass('changeBackground'))
        {
           $(this).removeClass('changeBackground');
           $('.donThuoc__noiDung .item .checkbox input')[index].removeAttribute('checked','checked');
       }
       else
       {
           $(this).addClass('changeBackground');
           $('.donThuoc__noiDung .item .checkbox input')[index].setAttribute('checked','checked');
       }
   })


 })
})
var DataTable_hanghoa = [];
var DataTable_unit = [];
var hangHoa2 = [];
var hangHoa1 = [];
var listLotNo = [];
var listLotNoArr = [];
var dataUnit = [];
var searchLotNo = [];

function replaceCurrency(number){
  if(checkTypeOf(number)){
     return number = number.replace(/,/g,'');
 }else{
     return number;
 }
}

function checkTypeOf(value){
  if(typeof(value) === 'string'){
     return true;
 }else{
     return false;
 }
}

function substrac(a,b){
  return a-b;
}
function sumTwoNumber(a,b){
  a = replaceCurrency(a);
  b = replaceCurrency(b);
  return parseFloat(a || 0)+parseFloat(b || 0);
}
function total(a,b,c,d){
  a = replaceCurrency(a);
  b = replaceCurrency(b);
  c = replaceCurrency(c);
  d = replaceCurrency(d);
  return e = (((a*b)+c-d) || 0);
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
$('.donThuoc__click').click(function(){
  $('.donThuoc__sub').toggle();
})

$('.chonMauIn').click(function(){
  $('#thanhToanInHd').modal('hide');
  let idKhachHang = 0;
  $.ajax({
     type:"GET",
     url: "{{ url('banhang/inhoadon') }}",
     dataType: 'json',
     async: false,
     success: function(res){
        idKhachHang = res;
    }
});
  idKhachHang = "KH"+checkRangeValue(idKhachHang);
  let tongTienChuaThue = 0;
  let tongVat = 0;
  DataTable_hanghoa.forEach(item=>{
     tongTienChuaThue += (parseFloat(item.price)*parseFloat(item.qty));
     tongVat += (parseFloat(item.VAT_sell)*parseFloat(item.qty)*parseFloat(item.price)/100);
 });

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
     <td>Mã: `+idKhachHang+`</td>
     <td rowspan="3"></td>
     </tr>
     <tr>
     <td>Ngày bán: `+$("input[name='date']").val()+' '+$("input[name='hour']").val()+`</td>
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

  DataTable_hanghoa.forEach(item=>{
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
     <td style="text-align:right; vertical-align:top"><strong>${decialNumber(tongTienChuaThue)}</strong></td>
     </tr>
     <tr>
     <td style="text-align:left; vertical-align:top; width:30%"><strong>Tổng VAT:</strong></td>
     <td style="text-align:right; vertical-align:top"><strong>${decialNumber(tongVat)}</strong></td>
     </tr>
     <tr>
     <td style="text-align:left; vertical-align:top; width:30%"><strong>Giảm gi&aacute;:</strong></td>
     <td style="text-align:right; vertical-align:top"><strong>${$('#sale').val()}</strong></td>
     </tr>
     <tr>
     <td style="text-align:left; vertical-align:top; width:30%"><strong>Th&agrave;nh tiền:</strong></td>
     <td style="text-align:right; vertical-align:top"><strong>${$('#price_import').val()}</strong></td>
     </tr>
     <tr>
     <td style="text-align:left; vertical-align:top; width:30%"><strong>Thanh to&aacute;n:</strong></td>
     <td style="text-align:right; vertical-align:top"><strong>${$('#paid').val()}</strong></td>
     </tr>
     <tr>
     <td style="text-align:left; vertical-align:top; width:30%"><strong>Tiền thừa:</strong></td>
     <td style="text-align:right; vertical-align:top"><strong>${$('#thanhTien').val()}</strong></td>
     </tr>
     </tbody>
     </table>

     <p>&nbsp;</p>

     <p style="text-align:center">Xin cảm ơn v&agrave; hẹn gặp lại qu&yacute; kh&aacute;ch!</p>`)
  mywindow.document.close();
  mywindow.focus();

  mywindow.print();
  mywindow.close();
  resetTab();
  return true;
})

$('#autoSearchImage').typeahead({
	source: function(query, process) {
		return $.get("{{ url('banhang/autosearchimage') }}", {
			query: query
		}, function(data) {
			let warehouse = [];
			let lotnoArr = [];
			data.forEach(function (a) {
				if (!this[a.lotno_id]) {
					this[a.lotno_id] = { lotno_id: a.lotno_id, qty: 0};
					lotnoArr.push(this[a.lotno_id]);
				}
				if((a.type=='import_from_supplier') || (a.type=='import_inventory') || (a.type=='return_from_customer')){
					this[a.lotno_id].qty += parseInt(a.qty);
				}else{
					this[a.lotno_id].qty -= parseInt(a.qty);
				}
			}, Object.create(null));

			lotnoArr.forEach(item=>{
				var flag = 0;
				Object.keys(data).forEach(function(key) {
					if (data[key]['lotno_id'] == item.lotno_id){
						flag++;
						if(flag==1){
							data[key]['qty'] = item.qty;
							warehouse.push(data[key]);
						}
					}
				});
			})

			return process(warehouse);
		});
	},
	highlighter: function (item, data) {
		var parts = item.split('#'),
		html = '<div class="d-flex">';
		html += '<div class="align-self-center" style="white-space: pre-line">';
		html += '<div><h4 style="font-size:18px">'+data.name+' -- '+data.unit+'</h4></div>';
		html += '<div style ="margin-top:-5px"> Số lô  :  <strong style="font-size: 110%">'+data.lot_no+'</strong> -- Hạn dùng : <strong><span style="color:#c49f47">'+data.exp_date+'</span></strong></div>';
		html += '<div style ="margin-top:px"> Tồn :<strong>'+(new Intl.NumberFormat('en-US').format(data.qty) || 0) +' ('+ data.unit+')-- Giá : <span>'+new Intl.NumberFormat('en-US').format(data.price_import)+'</span> </strong></div>';
		html += '<div>Hoạt chất chính : <span>'+(data.ingredient || '')+'</span></div>';
		html += '<div>Hãng sản xuất: <span>'+(data.manufacture || '')+'</span> - Quy cách đóng gói: <span>'+(data.packaging || '')+'</span></div>';
		html += '</div>';
		html += '</div>';
		return html;
	},
	updater: function(result) {
		result.stock_id = result.id;
		result.discount = 0;
		result.inventory = (result.qty || 0);
		result.qty = (result || 0)
		result.price = result.price_import;
		result.qty = 1;
		result.note =null;
		result.dosage =null;
		result.dataunit = getDataUnitStock(result.stock_id);
		result.id = null;
		DataTable_hanghoa.push(result);
		console.log(DataTable_hanghoa);
		loadData();
		$('#autoSearchImage').typeahead('val','');
	}
});

function updateData(data) {
	var key = $(data).attr("data-id");
	var value = $(data).attr("data-name");
	if(value=='unit'){
		DataTable_hanghoa[key]['unit_id'] = $('option:selected', data).attr('data-ha');
		DataTable_hanghoa[key]['price_import'] = $('option:selected', data).attr('data-price');
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
		sell_id : DataTable_hanghoa[index].sell_id,
		unit_id : DataTable_hanghoa[index].unit_id,
		lotno_id : DataTable_hanghoa[index].lotno_id,
		name: DataTable_hanghoa[index].name,
		lot_no: DataTable_hanghoa[index].lot_no,
		exp_date: DataTable_hanghoa[index].exp_date,
		unit: DataTable_hanghoa[index].unit,
		dataunit: DataTable_hanghoa[index].dataunit,
		dosage: DataTable_hanghoa[index].dosage,
		qty: DataTable_hanghoa[index].qty,
		inventory: (replaceCurrency(DataTable_hanghoa[index].inventory)-replaceCurrency(DataTable_hanghoa[index].qty)),
		price: DataTable_hanghoa[index].price,
		price_sell: DataTable_hanghoa[index].price_sell,
		discount:DataTable_hanghoa[index].discount,
		VAT: DataTable_hanghoa[index].VAT,
		VAT_sell: DataTable_hanghoa[index].VAT_sell,
		packaging:DataTable_hanghoa[index].packaging,
		note :DataTable_hanghoa[index].note,
	});
	loadData();
	console.log(DataTable_hanghoa);
}

	/*function getlistlotno(stock_id){
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
	}*/
	function loadData(){
		var index=0;
		$('#data-table3').DataTable().clear().draw();
		DataTable_hanghoa.forEach(item=>{
			$('#data-table3').DataTable().row.add([
				'<div style="width:100%;border:0" data-name="id" data-id="'+index+'" class="form-control" >'+(index+1)+'</div>',

				`<div>
				<div class="form-control" style="width:100%;border:0;padding:0px">
				<div style="width:100%;color:black;font-size:15px;border:0;margin-left:-10px;padding-top:3px;padding-bottom:0px" data-name="name" data-id="`+index+`" class="form-control" >`+item.name+`
				</div>
				<div style="width:100%;color:#999;font-size:13px;border:0;margin-left:-10px;padding-top:2px" data-name="name" data-id="`+index+`" class="form-control" >`+item.packaging+`
				</div>
				<div style="display: inline-block">
				<div class="margin-right-10" style="display: inline-block">
				<span data-name="lot_no" class="form-control" data-id="`+index+`" value="`+(DataTable_hanghoa[index]['lot_no'] || '')+`" style="color:#333;border:0;background:none;margin-left:-13px;margin-top:-10px;font-size:98%;cursor:pointer" >Số lô :  `+item.lot_no+` - HSD:  `+item.exp_date+`</span>

				</div>
				</div>
				<div>
				<div class="form-group form-md-line-input">
				<input class="form-control" style="padding-left:0px;margin-top:-10px;font-style:italic;width:92%" data-name="dosage" data-id="`+index+`" value="`+(DataTable_hanghoa[index]['dosage'] || '')+`" onchange="updateData(this)" placeholder="Liều dùng" />
				<div class="form-control-focus"> </div>
				</div>
				</div>
				</div>`,
				`<div><select style="width:100%;" onchange="updateData(this)" data-name="unit" data-id="`+index+`">`+getUnit(DataTable_hanghoa[index].dataunit,DataTable_hanghoa[index].unit)+`</select>
				<div class="mg-l-10" style="font-size:15px;margin-top:10px"><strong> Tồn: `+new Intl.NumberFormat('en-US').format(item.inventory)+`</strong>
				</div>
				</div>`,

				`<input class="form-control" style="width:70%" type="text" data-name="qty" data-id="`+index+`" value="`+DataTable_hanghoa[index]['qty']+`" onchange="updateData(this)" />

				<div data-toggle="popover" data-name="tonKho" data-id="`+index+`" data-trigger="hover" data-placement="top" data-content="Số lượng tồn kho không đủ">
				<span style="color:#c49f47!important;display:flex;padding-left:9px;margin-top:8px;" class="hidden" data-id="`+index+`" data-name="iconTonKho" >
				<em style="cursor:pointer" class="fa fa-warning"></em>
				</span>
				</div>
				`,

				`<input class="form-control" type="text" style="width:75%" data-name="price" data-id="`+index+`" value="`+(DataTable_hanghoa[index]['price'] || 0)+`" onchange="updateData(this)" />

				<div data-toggle="popover" data-name="giaVon" data-id="`+index+`" data-trigger="hover" data-placement="top" data-content="Giá bán đang nhỏ hơn giá vốn">
				<span style="color:#c49f47!important;display:flex;padding-left:9px;margin-top:8px;" class="hidden" data-id="`+index+`" data-name="iconGiaVon" >
				<em style="cursor:pointer" class="fa fa-warning"></em>
				</span>
				</div>
				`,

				'<div><input class="form-control font-weight-bold" type="text" data-name="total" data-id="'+index+'" value="'+decialNumber((replaceCurrency(DataTable_hanghoa[index]['VAT_sell'])*replaceCurrency(DataTable_hanghoa[index]['price'])*replaceCurrency(DataTable_hanghoa[index]['qty'])/100)+(parseFloat(replaceCurrency(DataTable_hanghoa[index].price))*parseFloat(replaceCurrency(DataTable_hanghoa[index].qty))))+'" onchange="updateData(this)" readonly /><strong><span style="display:flex;margin-top:9px">VAT:<input style="width:100%;border:0;background:none;margin-top:-10.6px;padding-left:2px;font-weight:bold;" type="text" data-name="VAT" onchange="updateData(this)" data-id="'+index+'" value="'+decialNumber(replaceCurrency(DataTable_hanghoa[index]['VAT_sell'])*replaceCurrency(DataTable_hanghoa[index]['price'])*replaceCurrency(DataTable_hanghoa[index]['qty'])/100)+'" class="form-control" readonly /></span><br><strong><span style="display:flex;margin-top:-27px">('+DataTable_hanghoa[index].VAT_sell+'%)</span></strong></strong></div>',
				'<span class="fa fa-plus-square" style="color:#0753a1;cursor:pointer;font-size:120%" data-id="'+index+'" onclick="duplicatedData('+index+')"></span> <span class="fas fa-trash-alt" style="color:#bd2130;cursor:pointer;font-size:120%" data-id="'+index+'" onclick="removeData('+index+')"></span>'
				]).draw( false );

$("#data-table3 select[data-name='unit']").select2({
	minimumResultsForSearch : -1
});
new DateTime($("input[data-name='exp_date'][data-id='"+index+"']"),{
	format: 'DD/MM/YYYY',
});
new AutoNumeric("input[data-name='qty'][data-id='"+index+"']", {
	minimumValue: 0,
	modifyValueOnWheel: false,
	unformatOnHover: false,
	decimalPlaces: 0,
});
new AutoNumeric("input[data-name='price'][data-id='"+index+"']",{
	minimumValue: 0,
	modifyValueOnWheel: false,
	unformatOnHover: false
});

			/*if(!(index in listLotNo)){
				listLotNo[index] = getlistlotno(item.stock_id);
			}*/

			if(DataTable_hanghoa[index].inventory-replaceCurrency(DataTable_hanghoa[index].qty)<0){
				$("[data-name='tonKho'][data-id='"+index+"']").popover();
				$("span[data-name='iconTonKho'][data-id='"+index+"']").removeClass("hidden");
			}

			if(replaceCurrency(DataTable_hanghoa[index].price)-replaceCurrency(DataTable_hanghoa[index].price_sell)<0){
				$("[data-name='giaVon'][data-id='"+index+"']").popover();
				$("span[data-name='iconGiaVon'][data-id='"+index+"']").removeClass("hidden");
			}

			/*$("button[data-name='lot_no']").on("click", function (e) {
				e.preventDefault();
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
			});*/

			/*$("button[data-name='lot_no']").typeahead({
				minLength: 0,
				source: function(query, process) {
					return process(listLotNoArr);
				},
				highlighter: function (item, data) {
					var parts = item.split('#'),
					html = 'Số lô: '+data.name+' - HSD: '+data.exp_date;
					return html;
				},
				updater: function(item) {
					DataTable_hanghoa[item.index].lot_no = item.name;
					DataTable_hanghoa[item.index].exp_date = item.exp_date;
					DataTable_hanghoa[item.index].price_import = item.price_import;
					return item;
				}
			});*/
			index++;
		});

sumTotal = $("input[data-name='total']")
.map(function(){return replaceCurrency($(this).val());}).get();
var fixTotalMoney = sum(sumTotal);
$('.total').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(fixTotalMoney));
AutoNumeric.getAutoNumericElement('#paid').set(fixTotalMoney);
$('#thanhTien').val("0.00")
}


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
					$('#idUpdate').val(res.id);
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
			$('#timKiem1').modal('show');
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


function getUnit(list,selected){
	var unitList = [];
	if(Array.isArray(list)){
		list.forEach(item => {
			if(item.name == selected){
				unitList = unitList + '<option data-price="'+item.price_sell+'" data-ha="'+item.unit_id+'" value="'+item.name+'" selected>'+item.name+'</option>';
			}else{
				unitList = unitList + '<option data-price="'+item.price_sell+'" data-ha="'+item.unit_id+'" value="'+item.name+'">'+item.name+'</option>';
			}
		});
	}else{
		unitList = '<option data-price="'+item.price_import+'" data-ha="'+item.unit_id+'" value="'+list+'">'+list+'</option>';
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
					name : item.unit,
					unit_id: item.id,
					price_sell: item.price_sell
				});
			});
		}
	});
	return dataUnitStock;
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
			$('#timKiem1').modal('hide');
			$('#thongTinKhachHang').trigger("reset");
		},
		error: function(data) {
			console.log(data);
		}
	});
});


$(document).ready(function(){
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
			url: "{{ url('banhang') }}",
			"dataSrc" : function (json) {
				json['data'].forEach(item=>{
					item.total = total(item.qty,item.price,item.VAT,item.sale);
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
					return ""+data["name"]
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
		{ data: 'action', name: 'action'},
		],
		columnDefs: [
		{
			targets: 3,
			render: $.fn.dataTable.render.number(',', 0, '')
		}
		],
	});

	table1.on('order.dt search.dt', function () {
		table1.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();

	function baoCaoDoanhThu(fromDate,toDate){
        $.ajax({
            "type": "GET",
            "url": "{{ url('banhang/baoCaoBanHang') }}",
            "dataType": "json",
            "data": {
             fromDate: fromDate,
             toDate: toDate
         },
         success: function(success){
            console.log(success);
            var ban_hang = $('#ban-hang').DataTable({
                "processing": true,
                "responsive": true,
                "destroy": true,
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

                aaData: success,
                columns: [
                { data: 'id', name: 'id', orderable: false,searchable: false },
                { data: null, searchable: false , orderable: false,
                    "render": function(data,type,row){
                        return "Admin";
                    }
                },
                { data: 'date', name: 'date', orderable: false},
                { data: null, searchable: false , orderable: false,
                    "render": function(data,type,row){
                        return decialNumber(parseInt(data['total'])+parseInt(data['totalSale']));
                    }
                },
                { data: null, searchable: false , orderable: false,
                    "render": function(data,type,row){
                        return decialNumber(data['totalSale']);
                    }
                },
                { data: null, searchable: false , orderable: false,
                    "render": function(data,type,row){
                        return "0.00";
                    }
                },
                { data: null, searchable: false , orderable: false,
                    "render": function(data,type,row){
                        return "0.00";
                    }
                },
                { data: null, searchable: false , orderable: false,
                    "render": function(data,type,row){
                        return decialNumber(data['total']);
                    }
                },
                ], 
                dom: 'Blfrtip',
                buttons: [
                $.extend(true, {}, xlsBuilder, {
                    extend: 'excelHtml5',
                    title: 'BaoCaoDanhThuBanHang_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                    text:'<span class="text-light">Xuất file Excel</span>',
                })
                ]
            });

            $('.dt-buttons a[aria-controls="ban-hang"]').appendTo('#exportExcelDBLotNo');
            ban_hang.on('order.dt search.dt', function () {
                ban_hang.column(0).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            $('#ban-hang_length select').select2({
                minimumResultsForSearch: -1
            });
            $('#ban-hang_paginate').after($('#ban-hang_length'));
            $("#info-ban-hang").empty();
            $('#ban-hang_info').detach().appendTo('#info-ban-hang');
        }
    })
    }
    $("#searchBaoCao").click(function() {
        baoCaoDoanhThu($("#searchByStartDate").val(),$("#searchByEndDate").val());
    });

    $("#modalBaoCaoDoanhThu").on("shown.bs.modal", function(e){
        baoCaoDoanhThu($("#searchByStartDate").val(),$("#searchByEndDate").val());
    });

    $('#status').change(function(){
    	$('#data-table1').DataTable().draw();
    });
    $('#checkbox').change(function(){
    	$('#data-table1').DataTable().draw();
    });

    $( "#searchData" ).click(function() {
    	$('#data-table1').DataTable().search( $( "#searchProduct" ).val()).draw();
    	console.log($( "#searchProduct" ).val());
    });

    var table3 = $('#data-table3').DataTable({
    	"ordering" : false,
    	"paging":false,
    	"language": {
    		"processing": "Đang xử lý...",
    		"sLengthMenu": " _MENU_ Bản ghi hiển thị",
    		"zeroRecords": "Không tìm thấy dữ liệu phù hợp",
    		"info": "Danh sách hàng hoá (_TOTAL_ bản ghi) ",
    		"infoEmpty": "Danh sách hàng hoá (0 bản ghi)",
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
});

function submitHoaDon(isInHoaDon = 0){
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
			if(replaceCurrency(DataTable_hanghoa[i].qty)>DataTable_hanghoa[i].inventory){
				haCheck = 1;
				$.toast({
					text : DataTable_hanghoa[i]['name']+" có lượng tồn kho không đủ",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$("input[data-name='qty'][data-id='"+i+"']").focus();
			}else if(replaceCurrency(DataTable_hanghoa[i]['qty'])==0){
				haCheck = 1;
				$.toast({
					text : "Số lượng hàng hoá phải lớn hơn 0",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$("input[data-name='qty'][data-id='"+i+"']").focus();
			}else if($('#checkBoxTheoDon').val()=='1'){
				if($('#autoSearchDoctor').val()==''){
					haCheck = 1;
					$.toast({
						text : "Bạn chưa chọn thông tin bác sĩ",
						position: "bottom-right",
						icon:"error",
						stack:1,
						loader:false
					})
					$('#autoSearchDoctor').focus();
				}else if($('#medical_facility').val()==''){
					haCheck = 1;
					$.toast({
						text : "Bạn chưa điền thông tin cơ sở khám bệnh",
						position: "bottom-right",
						icon:"error",
						stack:1,
						loader:false
					})
					$('#medical_facility').focus();
				}else if($('#patient').val()==''){
					haCheck = 1;
					$.toast({
						text : "Bạn chưa điền tên bệnh nhân",
						position: "bottom-right",
						icon:"error",
						stack:1,
						loader:false
					})
					$('#patient').focus();
				}else if($('#address').val()==''){
					haCheck = 1;
					$.toast({
						text : "Bạn chưa điền địa chỉ",
						position: "bottom-right",
						icon:"error",
						stack:1,
						loader:false
					})
					$('#address').focus();
				}else if($('#guardian').val()==''){
					haCheck = 1;
					$.toast({
						text : "Bạn chưa điền người dám hộ",
						position: "bottom-right",
						icon:"error",
						stack:1,
						loader:false
					})
					$('#guardian').focus();
				}
			}
		}
		if(haCheck==0){
			$.ajax({
				url: "{{ url('banhang/submitbanhang') }}",
				type: "POST",
				data: $('#submitBanHang').serialize()+"&price_import="+replaceCurrency($('#price_import').val())+"&sale="+replaceCurrency($('#sale').val())+"&paid="+replaceCurrency($('#paid').val())+"&thanhtien="+replaceCurrency($('#thanhTien').val()),
				success: function( response ) {
					DataTable_hanghoa.forEach(item => {
						item.idha = response.id;
						item.qty = replaceCurrency(item.qty);
						item.price = replaceCurrency(item.price);
						item.VAT = replaceCurrency(item.VAT);
						item.type = "sell"
					});
					$.ajax({
						url: "{{ url('banhang/submitphieunhap') }}",
						type: "POST",
						dataType:'json',
						contentType: 'json',
						data: JSON.stringify(DataTable_hanghoa),
						contentType: 'application/json; charset=utf-8',
						success: function( data ) {
							$.toast({
								text : "Thanh toán thành công",
								position: "bottom-right",
								icon:"success",
								stack:1,
								loader:false
							});
							if(isInHoaDon){
								$('#thanhToanInHd').modal('show');
							}else{
								resetTab();
							}
						}
					});
				}
			});
		}
	}
}

$('#thanhToanInHd').on('hidden.bs.modal', function (e) {
	resetTab();
})

$('#buttonSupplier').click(function(){
    $('#labelThongTinKhachHang').text('');
    $('#labelThongTinKhachHang').text('Thêm mới khách hàng');
})


function duplicatedFunc(id){
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
			$('#autoSearchDoctor').val(res.doctor);
			$('.date').val(res.date);
			$('.hour').val(res.hour);
			// $('#sale').val(res.sale);
			$('.total').val(res.price);
			$('#hour').val(res.hour);
			$('#date').val(res.date);
			$('#doctor1').val(res.doctor);
			$('#medical_facility').val(res.medical_facility);
			$('#patient').val(res.patient);
			$('#address').val(res.address);
			$('#guardian').val(res.guardian);
			$('#benhnhan').val(res.name);
			$('#diagnostic').val(res.diagnostic);
			$('#weight').val(res.weight);
			$('#year_old').val(res.year_old);
			$('#CMND').val(res.CMND);
			$('#phone').val(res.phone);
			$('#BHYT').val(res.BHYT);
			if(res.name){
				inputCustomer();
			}
			$.ajax({
				type:"GET",
				url: "{{ url('banhang/editstock') }}",
				data: { id: id },
				dataType: 'json',
				success: function(response){
					response.forEach(item => {
						item.inventory = item.qty;
						item.dataunit = getDataUnitStock(item.stock_id)
						item.sell_id = null;
						item.id = null;
						item.packaging =null
					});
					DataTable_hanghoa = response;
					loadData();
					$('#exampleModal').modal('hide');
					console.log(DataTable_hanghoa);
				}
			});
		}
	});
}
function duplicatedFunc1(id){
	$.ajax({
		type:"GET",
		url: "{{ url('donthuocmau/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$.ajax({
				type:"GET",
				url: "{{ url('donthuocmau/editstock') }}",
				data: { id: id },
				dataType: 'json',
				success: function(response){
					response.forEach(item => {
						item.inventory = item.qty;
						item.price = item.price_import;
						item.dataunit = getDataUnitStock(item.stock_id)
						item.sell_id = null;
						item.dosage =null;
						item.id = null;
						item.packaging = null
					});
					DataTable_hanghoa = response;
					loadData();
					$('#exampleModal').modal('hide');
					console.log(DataTable_hanghoa);
				}
			});
		}
	});
}


</script>
<script>
    $(document).ready(function(){
     
    // Datepicker
    $('.fc-datepicker').datepicker({
    	showOtherMonths: true,
    	selectOtherMonths: true
    });
    $('.toggle').toggles({
    	on: true,
    	height: 26
    });

    $("#checkBoxTheoDon").click(function(){
    	$("#mySidebar").toggleClass("hidden");
    });


    $('#checkBoxTheoDon').click(function(){
    	$(this).val(this.checked ? 1 : 0);
    });
    $('#checkBoxTheoDonOnline').click(function(){
    	$(this).val(this.checked ? 1 : 0);
    });

    $("#toggleBar").click(function(){
    	$("#mySidebar").toggleClass("show-sidebar");
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
    		})
    	}
    })
    $('.donThuoc__noiDung .item').click(function(){

    });


    new AutoNumeric.multiple(['#paid'],{
    	minimumValue: 0,
    	modifyValueOnWheel: false,
    	unformatOnHover: false
    });
    $('#sale').popover({
    	html: true,
    	content: function() { return $('#popover-content').html(); }
    });
    $(function () {
    	$('[data-toggle="popover"]').popover()
    })

    $(function() {
    	var inputs = $('[data-toggle="popover"]');

    	inputs.popover({
    		'content'   : $('#popover-content').html(),
    		'html'      : true,
    		'placement' : 'auto',
    	});

    	inputs.on('shown.bs.popover', function() {
    		var popover = $('#' + $(this).attr('aria-describedby'));
    		popover.one('click', '#demo_button', {
    			'$select'    : popover.find('input'),
    			'$input'     : $(this),
    		}, function(event) {
    			let tongTienHang = $('#total').val();
    			if(tongTienHang!=''){
    				var selected = event.data.$select.val();
    				event.data.$input
    				.val(selected)
    				.popover('hide');
    				let khachCanTra = parseFloat(replaceCurrency(tongTienHang))-parseFloat(replaceCurrency(selected));
    				if(khachCanTra<0){
    					$('#sale').val(tongTienHang);
    					$('#price_import').val('0.00');
    					$('#thanhTien').val('0.00');
    					AutoNumeric.getAutoNumericElement('#paid').set(0);
    				}else{
    					$('#price_import').val(new Intl.NumberFormat('en-US',{
    						style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
    					}).format(khachCanTra));
    					AutoNumeric.getAutoNumericElement('#paid').set(khachCanTra);
    					$('#thanhTien').val('0.00');
    				}
    			}else{
    				event.data.$input
    				.val("0.00")
    				.popover('hide');
    			}
    			$('#paid').focus();
    		});
    	});
    	$('[data-toggle="popover"]').on('shown.bs.popover', function() {
    		new AutoNumeric.multiple("#demo_button_one",{
    			minimumValue: 0,
    			modifyValueOnWheel: false,
    			unformatOnHover: false
    		});
    		$('.popover').find("#demo_button_one").focus().select();
    	});
    });
});

function resetTab(){
	$('#idCustomer').val("");
	$('#autoSearch').val("");
    $('#idUpdate').val("");
    $("#autoSearch").removeClass("font-weight-bold");
    $('#id').val("");
    $('#submitBanHang').trigger("reset");
    $('#checkBoxTheoDon').trigger("reset");
    $('#autoSearch').removeAttr("style");
    $("#buttonSupplier").removeClass("hidden");
    $("#buttonSupplierClose").addClass("hidden");
    DataTable_hanghoa = [];
    loadData();
    $(".tab1").removeClass("hidden");
    $(".tab2").addClass("hidden");
}

var xlsBuilder = {
    customize: function(xlsx) {
      var sheet = xlsx.xl.worksheets['sheet1.xml'];
      var downrows = 5;
      var clRow = $('row', sheet);
      var msg;

      clRow.each(function() {
        var attr = $(this).attr('r');
        var ind = parseInt(attr);
        ind = ind + downrows;
        $(this).attr("r", ind);
      });


      $('row c ', sheet).each(function() {
        var attr = $(this).attr('r');
        var pre = attr.substring(0, 1);
        var ind = parseInt(attr.substring(1, attr.length));
        ind = ind + downrows;
        $(this).attr("r", pre + ind);
      });

      function Addrow(index, data) {

        msg = '<row r="' + index + '">';
        for (var i = 0; i < data.length; i++) {
          var key = data[i].k;
          var value = data[i].v;
          msg += '<c t="inlineStr" r="' + key + index + '">';
          msg += '<is>';
          msg += '<t>' + value + '</t>';
          msg += '</is>';
          msg += '</c>';
        }
        msg += '</row>';
        return msg;
      }
      var r1 = Addrow(1, [{
        k: 'A',
        v: 'Hộ Kinh Doanh Nhà Thuốc Morioka'
      }
      ]);
      var r2 = Addrow(2, [{
        k: 'A',
        v: '68 Ngõ 10 Nguyễn Thị Định'
      }
      ]);
      var r3 = Addrow(3, [{
        k: 'D',
        v: 'BÁO CÁO DOANH THU BÁN HÀNG THEO NHÂN VIÊN'
      }
      ]);
    //   var r4 = Addrow(4, [{
    //     k: 'C',
    //     v: 'Từ ngày'
    //   }
    //   ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
    },
    exportOptions: {
      columns: [1, 2, 3, 4, 5, 6,7]
    },
  }
</script>
<style type="text/css">
    input[name="checkbox"] {
        height: 20px;
        width: 20px;
        vertical-align: middle;
        cursor: pointer;
    }

    input[name="onlineSelling"] {
        height: 20px;
        width: 20px;
        vertical-align: middle;
        cursor: pointer;
    }

    input[data-name="dosage"],
    input[data-name="qty"],
    input[data-name="price"] {
        border-width: 0 0 1px;
        border-color: #dee2e6;
        border-radius: 0 !important;
        padding-bottom: 0.3em !important;
    }

    input[data-name="total"] {
        width: 90%;
        padding-left: 0px !important;
        background: none !important;
        border-width: 0 0 1px;
        border-color: #dee2e6;
        border-radius: 0 !important;
        padding-bottom: 0.3em !important;
    }

    #price_import:focus,
    #sale:focus,
    #paid:focus {
        border-color: #36c6d3 !important;
        width: 75%;
    }

    #price_import,
    #sale,
    #paid {
        border-radius: 0 !important;
    }

    span[data-name='lot_no']:hover {
        text-decoration: underline;
    }

    .typeahead.dropdown-menu {
        max-height: 500px !important;
    }

    #ban-hang #thID {
        width: 3% !important;
    }

    #ban-hang #thMa {
        width: 10% !important;
    }

    #ban-hang #thLoai {
        width: 8% !important;
    }

    #ban-hang #thNgay {
        width: 15% !important;
    }

    #ban-hang #thDoi {
        width: 17% !important;
    }

    #ban-hang #thChech {
        width: 17% !important;
    }

    #ban-hang #thSTT {
        width: 18% !important;
    }

    #ban-hang #thSolo {
        width: 12% !important;
    }
</style>
@endsection

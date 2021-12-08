@extends('default')
@section('title','Sổ theo dõi sử lý khiếu nại')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Sổ theo dõi xử lý kiếu nại</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_in" style="padding-right:10px;">
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo">
                            <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="btn_excel" style="padding-right:10px;">
                        <form>
                            <button class="btn bg-primary text-white" onclick="window.print()"> <em
                                    class="fa fa-print"></em> In sổ</button>
                        </form>
                    </div>
                    <div class="mg-r-10">
                        <!-- Button thêm mới -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal"><em class="fa fa-plus"></em>
                            Thêm mới
                        </button>

                        <!-- Modal thêm mới-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title tx-gray-900 text-white" id="exampleModalLabel">Thêm sở
                                            theo dõi xử lý khiếu nạn</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="xuLyKhieuNai" name="xuLyKhieuNai" method="post">
                                        @csrf
                                        <div class="modal-body">

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="info">
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Ngày tạo<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control fc-datepicker"
                                                                    name="date" value="<?php echo date("d/m/Y"); ?>"
                                                                    placeholder="MM/DD/YYYY">
                                                                <span class="input-group-addon"><i
                                                                        class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Người nhận thông
                                                                tin <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name_tt">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Bệnh nhân <span
                                                                    class="text-danger">*</span></label>
                                                            {{-- <input type="hidden" name="id" id="id" > --}}
                                                            <input type="hidden" name="idcustomer" id="idCustomer">
                                                            <input type="text" name="patient" autocomplete="off"
                                                                class="form-control col-md-11" id="autoSearch"
                                                                placeholder="Nhập mã, tên, sđt để tìm kiếm bệnh nhân">
                                                            <button type="button" id="buttonSupplier"
                                                                class="pos-absolute r-0 t-0 pd-7 bg-primary tx-white btn"
                                                                data-toggle="modal" data-target="#khacHang"
                                                                style="height: 40px;margin-top:28px;margin-right:16px">
                                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                            </button>
                                                            <div id="buttonSupplierClose"
                                                                style="height: 40px;margin-top:28px;margin-right:16px"
                                                                class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                                    class="fa fa-times"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                                            <input type="text" class="form-control" name="address">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Số điện
                                                                thoại</label>
                                                            <input type="text" class="form-control" name="fax">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Email</label>
                                                            <input type="text" class="form-control" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Hàng hóa thu hồi
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class='pos-relative'>
                                                                <input type="text" name="name" id="autoSearchImage"
                                                                    class="form-control"
                                                                    placeholder="Nhập từ khoá tìm kiếm"
                                                                    autocomplete="off">
                                                                <div id="resetFormThemHangHoa"
                                                                    class="btn btn-danger pos-absolute r-0 t-0 "><i
                                                                        class="fa fa-times"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Số đăng ký</label>
                                                            <input type="text" class="form-control" name="reg_no"
                                                                id="reg_no" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Hoạt chất
                                                                chính</label>
                                                            <input type="text" class="form-control" name="ingredient"
                                                                id="ingredient" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Hàm lượng</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="content" id="content" readonly>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Hãng sản
                                                                xuất</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="manufacture" id="manufacture" readonly>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Nước sản
                                                                xuất</label>
                                                            <input type="text" class="form-control" readonly
                                                                name="made_in" id="made_in">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Quy cách đóng
                                                                gói</label>
                                                            <input type="text" class="form-control" readonly
                                                                name="packaging" id="packaging">
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-3 col-lg-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Số lô<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="lotno"
                                                                id="searchLotNo">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Hạn sử dụng<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                readonly name="exp_date" id="exp_date">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Số lượng <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="1"
                                                                name="qty">
                                                        </div>
                                                        <div class="col-md-3 col-lg-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Đơn vị tính<span
                                                                    class="text-danger">*</span></label>
                                                            <select
                                                                class="form-control unitfirst select2 select2-container"
                                                                style="width:100%" name="unit">
                                                                @foreach (App\Models\Unit::all() as $units)
                                                                <option value=""></option>
                                                                <option value="{{ $units->unit }}">
                                                                    {{ $units->unit }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <label id="unit-error" class="error" for="unit"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Nội dung khiếu nạn
                                                                <span class="text-danger">*</span></label>
                                                            <textarea class="form-control" rows="3"
                                                                name="reason"></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Hướng xử lý <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea class="form-control" rows="3"
                                                                name="reason_xl"></textarea>
                                                        </div>
                                                        <div class="col-md-4"><label for=""
                                                                class="tx-gray-800 tx-bold">Ghi chú</label>
                                                            <textarea class="form-control" rows="3"
                                                                name="note"></textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em>
                                                Lưu và thêm mới</button>
                                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em>
                                                Lưu và đóng</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                    class="fa fa-close" aria-hidden="true"></em> Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mg-r-10 btn_trove">
                        <a href="{{ route('baocao') }}">
                            <button type="button" class="btn btn-danger" id="inTab2">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                Trở về
                            </button>
                        </a>
                    </div>
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
                                value="<?php echo date("01/m/Y"); ?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByEndDate"
                                value="<?php echo date("d/m/Y"); ?> " placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-5 row">
                        <div class="col-md-10">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control"
                                placeholder="Tìm kiếm theo đơn bệnh nhân,tên hàng hóa...." id="searchBySupplier">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" onclick="searchDateTable()"><em class="fa fa-search"></em> Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="width:100%" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thời gian khiếu nại</th>
                                <th scope="col" class="bg-primary" style="color: white;">Bệnh nhân</th>
                                <th scope="col" class="bg-primary" style="color: white;">Địa chỉ</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thông tin hàng hóa</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lô</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lượng</th>
                                <th scope="col" class="bg-primary" style="color: white;">Người nhận thông tin</th>
                                <th scope="col" class="bg-primary" style="color: white;">Nội dung khiếu nại</th>
                                <th scope="col" class="bg-primary" style="color: white;">Hướng xử lý</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ghi chú</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end  mg-t-15">
                    <a href="{{ route('baocao') }}">
                        <button class="btn btn-danger" id="outTab2">
                            <i class="fa fa-reply" aria-hidden="true"></i>
                            Trở về
                        </button>
                    </a>
                </div>
            </div><!-- row -->
        </div><!-- br-pagebody -->
        <!--  -->
    </div>

    <!-- Modal thêm mới-->
    <div class="modal fade" id="khacHang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm mới khách hàng</h5>
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
                                        <input type="text" class="form-control" id="code" name="code"
                                            placeholder="Mã tự động">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Tên khách hàng<samp
                                                class="text-danger">*</samp></label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Nhóm khách hàng</label>
                                        <select name="group_id" id="" class="form-control">
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
                                        <input type="text" class="form-control" id="" name="ID_code">
                                    </div>
                                    <div class="col-md-1">
                                        <label for="" class="tx-gray-800 tx-bold">Tuổi</label>
                                        <input type="text" class="form-control" id="" name="age">
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
                                        <input type="date" class="form-control" id="" name="dob">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Giới tính</label>
                                        <div>
                                            <input type="radio" name="gender" value="nam" checked>
                                            <label for="nam" class="tx-gray-800 mg-r-10">Nam</label>
                                            <input type="radio" name="gender" value="nu">
                                            <label for="nu" class="tx-gray-800">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Mã số thuế</label>
                                        <input type="text" class="form-control" id="" name="tax_number">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                        <input type="text" class="form-control" id="" name="phone">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Email</label>
                                        <input type="email" class="form-control" id="" name="email">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Công ty</label>
                                        <input type="text" class="form-control" id="" name="company">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                        <input type="text" class="form-control" id="" name="address">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                        <textarea cols="30" rows="1" class="form-control" id="note"
                                            name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"></em> Lưu và
                            thêm mới</button>
                        <button type="submit" class="btn btn-primary" id="submitandclose"><em class="fa fa-save"></em>
                            Lưu và đóng</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em>
                            Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal thêm mới-->
    <div class="modal fade" id="chiTietKhieuNai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title tx-gray-900 text-white" id="exampleModalLabel">Chi tiết sổ theo dõi xử lý
                        khiếu nại</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="suaTheoDoiXuLyKhieuNai" name="suaTheoDoiXuLyKhieuNai" method="post">
                    @csrf
                    <div class="modal-body">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="info">
                                <div class="row mg-t-10">
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Ngày tạo<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="hidden" id="id" name="id">
                                            <input type="text" class="form-control fc-datepicker" name="date" id="date"
                                                value="<?php echo date("d/m/Y"); ?>" placeholder="MM/DD/YYYY">
                                            <span class="input-group-addon"><i
                                                    class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Người nhận thông tin <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name_tt" name="name_tt">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Bệnh nhân <span
                                                class="text-danger">*</span></label>
                                        {{-- <input type="hidden" name="id" id="id" > --}}
                                        <input type="hidden" name="idcustomer" id="idCustomer" class="idcustomer">
                                        <input type="text" name="patient" autocomplete="off"
                                            class="form-control col-md-11 patient" id="autoSearch"
                                            placeholder="Nhập mã, tên, sđt để tìm kiếm bệnh nhân">
                                        <button type="button" id="buttonSupplier"
                                            class="pos-absolute r-0 t-0 pd-7 bg-primary tx-white btn"
                                            data-toggle="modal" data-target="#khacHang"
                                            style="height: 40px;margin-top:28px;margin-right:16px">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </button>
                                        <div id="buttonSupplierClose"
                                            style="height: 40px;margin-top:28px;margin-right:16px"
                                            class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                class="fa fa-times"></i></div>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address" id="address">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                        <input type="text" class="form-control" name="fax" id="fax">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Email</label>
                                        <input type="text" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Hàng hóa thu hồi <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class='pos-relative'>
                                            <input type="text" name="name" id="autoSearchImage"
                                                class="form-control autoSearchImage" placeholder="Nhập từ khoá tìm kiếm"
                                                autocomplete="off" readonly>
                                            <div id="resetFormThemHangHoa" class="btn btn-danger pos-absolute r-0 t-0 ">
                                                <i class="fa fa-times"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Số đăng ký</label>
                                        <input type="text" class="form-control reg_no" name="reg_no" id="reg_no"
                                            readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Hoạt chất chính</label>
                                        <input type="text" class="form-control ingredient" name="ingredient"
                                            id="ingredient" readonly>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Hàm lượng</label>
                                        <input type="text" class="form-control content" placeholder="" name="content"
                                            id="content" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Hãng sản xuất</label>
                                        <input type="text" class="form-control manufacture" placeholder=""
                                            name="manufacture" id="manufacture" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Nước sản xuất</label>
                                        <input type="text" class="form-control made_in" readonly name="made_in"
                                            id="made_in">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Quy cách đóng gói</label>
                                        <input type="text" class="form-control packaging" readonly name="packaging"
                                            id="packaging">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-3 col-lg-3">
                                        <label for="" class="tx-gray-800 tx-bold">Số lô<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control searchLotNo" name="lotno"
                                            id="searchLotNo">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Hạn sử dụng<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control exp_date" placeholder="" readonly
                                            name="exp_date" id="exp_date">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Số lượng <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="1" name="qty" id="qty">
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                        <label for="" class="tx-gray-800 tx-bold">Đơn vị tính<span
                                                class="text-danger">*</span></label>
                                        <select class="form-control unitfirst select2 select2-container"
                                            style="width:100%" name="unit" id="unit">
                                            @foreach (App\Models\Unit::all() as $units)
                                            <option value="{{ $units->unit }}">
                                                {{ $units->unit }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label id="unit-error" class="error" for="unit"></label>
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Nội dung khiếu nạn <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3" name="reason" id="reason"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Hướng xử lý <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3" name="reason_xl"
                                            id="reason_xl"></textarea>
                                    </div>
                                    <div class="col-md-4"><label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                        <textarea class="form-control" rows="3" name="note" id="note"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu và thêm
                            mới</button>
                        <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu và đóng</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"
                                aria-hidden="true"></em> Đóng</button>
                    </div>
                </form>
            </div>
        </div>
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

    $('#autoSearchImage').typeahead({
    source: function(query, process) {
        return $.get("{{ url('khachhangtralai/autosearchimage') }}", {
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
        html += '<div>Tên: <strong>'+data.name+'| '+data.lot_no+'</strong></div>';
        html += '<div>SĐK: <strong>'+data.reg_no+'</strong> | Mã HH: <strong>HH0000'+data.id+'</strong></div>';
        html += '<div>Quy cách ĐG: <strong>'+data.packaging+'</strong> | Hãng SX: <strong>'+data.made_in+'</strong></div>';
        html += '</div>';
        html += '</div>';
        return html;
    },
    updater: function(item) {
        $('#reg_no').val(item.reg_no);
        $('#ingredient').val(item.ingredient);
        $('#content').val(item.content);
        $('#manufacture').val(item.manufacture);
        $('#made_in').val(item.made_in);
        $('#packaging').val(item.packaging);
        $('#autoSearchImage').focus();
        listLotNoArr = getlistlotno(item.id);
			listLotNoArr.forEach(item=>{
				item.name = item.lot_no
			});

			$("#searchLotNo").typeahead({
				minLength: 0,
				source: function(query, process) {
					return process(listLotNoArr);
				},
				highlighter: function (item, data) {
					var parts = item.split('#'),
					html = `${data.name} `
					return html;
				},
				updater: function(item) {
                    $('#exp_date').val(item.exp_date);
					return item;
				}
			});

			$("#searchLotNo").on("click", function(){
				ev = $.Event("keydown")
				ev.keyCode = ev.which = 40
				$(this).trigger(ev)
				return true
			});

			$.ajax({
				type: "GET",
				url: "{{ url('nhaptunhacungcap/getlistunitwithid') }}",
				data: {id:item.id},
				success: function(response) {
					$('.unitfirst').val(response[0].unit);
					DataTable_unit = response;
					loadDataUnit();
				}
			});
			// return false;

return item;
    }
});


    $('#autoSearch').typeahead({
    source:  function (query, process) {
      return $.get(
        "{{ url('khachhangtralai/autosearch') }}",
        { query: query },
        function (data) {
          return process(data);
            });
        },
        highlighter: function (item, data) {
            var parts = item.split('#'),
            html = '<div><strong>'+data.name+'</strong></div>';
            return html;
        },
        updater: function(item) {
        console.log(item);
        $('#idCustomer').val(item.id);
        $('#tenKhachHang').val(item.name);
        inputCustomer();
        return item;
        }
        });


function inputCustomer(){
    $('#autoSearch').css({'color':'#23527c' , 'text-decoration':'underline', 'cursor':'pointer'});
    $("#autoSearch").addClass("font-weight-bold");
    $("#buttonSupplier").addClass("hidden");
    $("#buttonSupplierClose").removeClass("hidden");
    $('#buttonSupplierClose').on('click', function(){
      $('#idCustomer').val("");
      $('#autoSearch').val("");
      $('#tenKhachHang').val("");
      $('#autoSearch').trigger('propertychange.typeahead');
      $('#autoSearch').removeAttr("style");
      $("#buttonSupplier").removeClass("hidden");
      $("#buttonSupplierClose").addClass("hidden");
  });
    $('#autoSearch').on('click', function(){
        if($('#autoSearch').val()!=''){
          $('#exampleModal').modal('show');
          $.ajax({
            type: "GET",
            url: "{{ url('khachhang/{id}/edit') }}",
            data: {id:$("#idCustomer").val()},
            success: function(res) {
              $('#idUpdate').val(res.id);
              $('#code').val(res.code);
              $('#name').val(res.name);
              $('#tax_number').val(res.tax_number);
              $('#group_id').val(res.group_id);
              $('#email').val(res.email);
              $('#phone').val(res.phone);
              $('#website').val(res.website);
              $('#address').val(res.address);
              $('#note').val(res.note);
          }
      });
      }
  });
}

function editFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('theodoisulykhieunai/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#id').val(res.id);
        $('#date').val(res.date);
        $('#name_tt').val(res.name_tt);
        $('.idcustomer').val(res.idcustomer);
        $('.patient').val(res.patient);
        $('#email').val(res.email);
        $('.autoSearchImage').val(res.name);
        $('.reg_no').val(res.reg_no);
        $('.ingredient').val(res.ingredient);
        $('.content').val(res.content);
        $('.manufacture').val(res.manufacture);
        $('.made_in').val(res.made_in);
        $('.packaging').val(res.packaging);
        $('.searchLotNo').val(res.lotno);
        $('#fax').val(res.fax);
        $('#reason').val(res.reason);
        $('#qty').val(res.qty);
        $('#unit').val(res.unit);
        $('#reason_xl').val(res.reason_xl);
        $('.exp_date').val(res.exp_date);
        $('#note').val(res.note);
      }
    });
  }



$('#suaTheoDoiXuLyKhieuNai').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ url('theodoisulykhieunai')}}",
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


  function deleteFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('theodoisulykhieunai/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
          title: "Bạn chắc chắn muốn xóa phiếu thu hồi: "+res.name+" này không ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"DELETE",
              url: "{{ url('theodoisulykhieunai/{id}') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $("#data-table1").load(
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
				var temp = data[1].split(" ");
				var tempDate = temp[0].split("/");

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
					(~data[2].toLowerCase().indexOf(supplierName))||
					(~data[4].toLowerCase().indexOf(supplierName))
					) ? true : false;
			}
			);

		$('#data-table1').DataTable()
		.draw();

	}
}
        // Datepicker
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
                url: "{{ url('theodoisulykhieunai') }}",
            },


                columns: [
                { data: 'id', name: 'id', orderable: false},
                { data: 'date', name: 'date', orderable: false},
                { data: 'patient', name: 'patient', orderable: false},
                { data: 'name_tt', name: 'name_tt', orderable: false},
                { data: null,
                "render": function(data,type,row) {
                    return "<strong>Tên hàng hóa :</strong>" +data['name'] +'</br><strong>Số đăng ký :</strong>'+(data['reg_no'])+
                    '</br><strong>Hàm lượng:</strong>'+(data['content'])+
                    '</br><strong>Hoạt chất chính :</strong>'+(data['ingredient'])+
                    '</br><div><strong>Hãng sản xuất :</strong>'+(data['manufacture'])+
                    '</br><div><strong>Nước sản xuất :</strong>'+(data['made_in'])+'</div>'
                }
                },
                { data: null,
                "render": function(data,type,row) {
                    return "<strong>Số lô :</strong>" +data['lotno'] +'</br><strong>HSD :</strong>'+(data['exp_date'])+'</div>'
                }
                },
                { data: 'qty', name: 'qty', orderable: false},
                { data: 'name_tt', name: 'name_tt', orderable: false},
                { data: 'reason', name: 'reason', orderable: false},
                { data: 'reason_xl', name: 'reason_xl', orderable: false},
                { data: 'note', name: 'note', orderable: false},
                { data: 'action', name: 'action'},
        ],
        dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'SoTheoDoiThuocTheoDon'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table1"]').appendTo('#exportExcelDBLotNo');
            table1.on('order.dt search.dt', function () {
                table1.column(0).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            searchDateTable();

            $('#resetFormThemHangHoa').click(function(){
            $('#exampleModal').attr('disabled', false);
            $('#autoSearchImage').attr('disabled', false);
            $('#xuLyKhieuNai').trigger("reset");
            DataTable_unit = [];
            loadDataUnit();
            })

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
            $('#tpBasic1').timepicker();
            $('#tpBasic2').timepicker();

            $("#inTab2").click(function () {
                $("#tab1").addClass("hidden");
                $("#tab2").removeClass("hidden");
            })
            $("#outTab2").click(function () {
                $("#tab1").removeClass("hidden");
                $("#tab2").addClass("hidden");
            })

            $(".themkhieunan").click(function () {
                // console.log($("#theodoikhieunan").val());
                if ($("#theodoikhieunan").val() == 0) {
                    $.toast({
                        text: "Vui lòng nhâp thông tin bệnh nhân",
                        position: "bottom-right",
                        icon: "error",
                        stack: 1,
                        loader: false
                    })
                }
            })
            $(".themkhieunan").click(function () {
                // console.log($("#theodoikhieunan").val());
                if ($("#benhnhan").val() == 0)
                    $.toast({
                        text: "Vui lòng nhâp thông tin bệnh nhân",
                        position: "bottom-right",
                        icon: "error",
                        stack: 1,
                        loader: false
                    })
            })

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
                                url: "{{ url('khachhang/save') }}",
                                type: "POST",
                                data: $('#thongTinKhachHang').serialize(),
                                success: function( response ) {
                                    $("#submit").attr("disabled", false);
                                    $("#submit").load(
                                        $.toast({
                                            text : "Thêm mới khách hàng thành công",
                                            position: "bottom-right",
                                            icon:"success",
                                            stack:1,
                                            loader:false
                                        }));
                                    document.getElementById("thongTinKhachHang").reset();
                                }
                            });
                        }
                    })
                }
            })
            $(function () {
                let xulykhiennan = $("#xulykhiennan");
                if (xulykhiennan.length) {
                    xulykhiennan.validate({
                        rules: {
                            nguoinhanthongtin: {
                                required: true
                            },
                            benhnhan: {
                                required: true
                            },
                            solo: {
                                required: true
                            },
                            noidungkhieunan: {
                                required: true
                            },
                            huongxuly: {
                                required: true
                            }
                        },
                        messages: {
                            nguoinhanthongtin: {
                                required: 'Vui lòng điền thông tin'
                            },
                            benhnhan: {
                                required: 'Vui lòng điền thông tin'
                            },
                            solo: {
                                required: 'Vui lòng điền thông tin'
                            },
                            noidungkhieunan: {
                                required: 'Vui lòng điền thông tin'
                            },
                            huongxuly: {
                                required: 'Vui lòng điền thông tin'
                            }
                        }
                    })
                }
            })

        });

        $(function(){
      let xuLyKhieuNai = $("#xuLyKhieuNai");
      if(xuLyKhieuNai.length){
        xuLyKhieuNai.validate({
          rules:{
            date:{
              required:true
            },
            name_tt:{
              required:true
            },
            patient:{
              required:true
            },
            name:{
              required:true
            },
            lotno:{
              required:true
            },
            reason:{
              required:true
            },
            reason_xl:{
              required:true
            },
            unit:{
              required:true
            },
          },
          messages:{
            date:{
              required:'Vui lòng chọn ngày bắt đầu'
            },
            name_tt:{
              required:'Vui lòng điền thông tin'
            },
            patient:{
                required:'Vui lòng điền thông tin'
            },
            name:{
                required:'Vui lòng điền thông tin'
            },
            lotno:{
                required:'Vui lòng điền thông tin'
            },
            reason:{
                required:'Vui lòng điền thông tin'
            },
            reason_xl:{
                required:'Vui lòng điền đơn vị tính'
            },
            unit:{
                required:'Vui lòng điền thông tin'
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
              url: "{{ url('theodoisulykhieunai') }}",
              type: "POST",
              data: $('#xuLyKhieuNai').serialize(),
              success: function( response ) {
                $('#data-table1').DataTable().ajax.reload();
                $("#submit").attr("disabled", false);
                $("#submit").load(
                  $.toast({
                    text : "Thêm mới sổ theo dõi thu hồi thuốc thành công",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                  }));
                document.getElementById("xuLyKhieuNai").reset();
              }
            });
          }
        })
      }
            });

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
        k: 'E',
        v: 'SỔ THEO DÕI XỬ LÝ KHIẾU NAỊ'
      }
      ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
    },
    exportOptions: {
      columns: [1, 2, 3, 4, 5, 6,7,8,9,10]
    },
  }
</script>
@endsection

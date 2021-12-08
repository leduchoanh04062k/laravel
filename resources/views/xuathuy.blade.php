@extends('default')
@section('title', 'Xuất hủy')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div class ="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between" style="flex-wrap:wrap;">
            <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Xuất huỷ</h4>
            <div class="d-flex" style="flex-wrap:wrap;">
                <div class="mg-r-10">
                    <button class="btn btn-primary" id="inTab2"><i class='fas fa-plus' style='font-size:15px;'></i> Xuất huỷ</button>
                </div>
                <div>
                    <a class="btn btn-info" href="#" id="exportExcel" >
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
                            <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                            id="searchByStartDate" value="<?php echo date("01/m/Y",strtotime("-1 month")); ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                            id="searchByEndDate" value="<?php echo date("d/m/Y"); ?> ">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Trạng thái</label>
                        <select name="" id="searchByStatus" class="form-control">
                            <option value="">Tất cả</option>
                            <option value="Hoạt động">Hoạt động</option>
                            <option value="Đã hủy">Đã hủy</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <label for="">Nhà thuốc</label>
                        <div class="form-control">
                            <a href="#">Hộ Kinh Doanh Nhà thuốc Morioka</a>
                        </div>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-6">
                        <label for="">Tìm kiếm theo hàng hoá</label>
                        <input type="text" class="form-control" placeholder="Nhập mã hoặc tên hàng hoá" id="searchByStock" autocomplete="off">
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <label for="">Từ khoá tìm kiếm</label>
                        <input type="text" class="form-control"
                        placeholder="Tìm kiếm theo mã phiếu" id="searchBySupplier">
                    </div>
                    <div class="col-md-2 col-lg-2 align-self-end">
                        <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"><i class="fas fa-search" style="padding: 3px"></i>Tìm kiếm</button>
                    </div>
                </div>
                <div class="mg-t-20">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                    <table id="data-table1" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;max-width:4%">#</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width:12%">Mã phiếu</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width:13%">Thời gian</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width:17%">Tổng tiền</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width:30%">Ghi chú</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width:12%">Trạng thái</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width:12%"></th>
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
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase tx-18">Xuất huỷ > Tạo mới phiếu xuất huỷ</h4>
            </div>
        </div>

        <!-- nhập thông tin -->
        {{-- <form id="submitxuathuy"> --}}
            <div class="br-pagebody pd-x-20 pd-sm-x-30">
                <form id="submitxuathuy">
                    <div class="shadow-base bg-white pd-15">
                        <div class="">
                            <div class="row">
                                <div class="col-md-2 mg-t-10">

                                    <div class="row">
                                        <div class="col-12">
                                            <label for="" class="tx-bold tx-gray-800">Ngày xuất <span
                                                class="text-danger">(*)</span></label>
                                            </div>
                                            <div class="col-12">
                                                {{-- <input type="date" class="form-control date" name="date"> --}}
                                                <div class="input-group">
                                                    <input type="hidden" name="id" class="id" value="">
                                                    <span class="input-group-addon"><i
                                                        class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                        <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="<?php echo date("d/m/Y"); ?>" name="date" id="dateImport">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mg-t-10">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="" class="tx-bold tx-gray-800">Giờ xuất <span>(*)</span></label>
                                                </div>
                                                <div class="col-12">
                                                    {{-- <input type="time" class="form-control hour" name="hour"> --}}
                                                    <div class="input-group">
                                                      <span class="input-group-addon"><i
                                                        class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                                        <input id="tpBasic" type="text" class="form-control hour" value="<?php
                                                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                                                        echo date("H:i:s");?>" name="hour" id="hourImport" placeholder="Set time">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mg-t-10">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="" class="tx-bold tx-gray-800">Ghi chú</label>
                                                </div>
                                                <div class="col-12">
                                                    <textarea name="" id="" cols="30" rows="1" name="note" class="form-control note"
                                                    placeholder="Ghi chú"> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mg-t-10">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="" class="tx-bold tx-gray-800">Tổng tiền</label>
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control" id="total" value="0.00" readonly>
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
                                    <input class="form-control autosearchimage">
                                    <button class="btn btn-primary pos-absolute r-0 t-0" data-toggle="modal"
                                    data-target="#search">
                                    <i class="fa fa-plus-circle mg-r-5" aria-hidden="true"></i>
                                    Tìm kiếm nâng cao
                                </button>

                            </div>
                        </div>
                    </div>
                    {{-- overflow-x: auto; --}}
                    <div class="shadow-base bg-white pd-15 mg-t-25" style="overflow-x: auto;">
                        <div style="width: 100%;">
                            <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3">
                                <thead>
                                    <tr>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 10px; width:3%">#</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 70px; width:5%">Mã HH</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 100px; width:20%">Tên hàng hoá</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 70px; width:10%">Số lô(*)</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 120px; width:8%">Hạn sử dụng(*)</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 80px; width:8%">Đvt</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 100px; width:7%">S.lg huỷ(*)</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 80px; width:10%">Lý do</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 80px; width:10%">Biện pháp xử lý</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 80px; width:10%">Ghi chú</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 120px; width:11%">Giá vốn</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 120px; width:10%">Thành tiền</th>
                                        <th scope="col" class="bg-primary" style="color: white;min-width: 40px; width:3%"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end  mg-t-15">
                        <button class="btn btn-primary mg-r-10 submitPhieuNhap">Lưu</button>
                        <a class="btn btn-danger text-white" id="outTab2">Trở về</a>
                    </div>
                </div>
            {{-- </form> --}}

        </div>
        <!-- end tab2 -->

        <!-- Thao tác => sửa -->
        <div class="pos-absolute t-0 l-0 hidden" id="thaoTacSua" style="width: 100%;">
            <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                <div class="row">
                    <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Xuất huỷ> sửa phiếu xuất huỷ</h4>
                    <div class="col-6 justify-content-end d-flex">
                    </div>
                </div>
            </div>

            <!-- nhập thông tin -->
            <div class="br-pagebody pd-x-20 pd-sm-x-30">
                <div class="shadow-base bg-white pd-15">
                    <div class="">
                        <div class="row">
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Ngày xuất <span
                                            class="text-danger">(*)</span></label>
                                        </div>
                                        <div class="col-12">
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mg-t-10">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="" class="tx-bold tx-gray-800">Giờ xuất <span
                                                class="text-danger">(*)</span></label>
                                            </div>
                                            <div class="col-12">
                                                <input type="time" class="form-control" name="hour">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mg-t-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="" class="tx-bold tx-gray-800">Ghi chú</label>
                                            </div>
                                            <div class="col-12">
                                                <textarea name="" id="" cols="30" rows="1" name="note" class="form-control"
                                                placeholder="Ghi chú"> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mg-t-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="" class="tx-bold tx-gray-800">Tổng tiền</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" class="form-control" value="0.00" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="shadow-base bg-white pd-15 mg-t-25">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="browser" class="tx-gray-900 tx-bold">Thêm hàng hoá vào phiếu</label>
                                    <div class="pos-relative">
                                        <input list="browsers" name="browser" id="browser" class="form-control">
                                        <datalist id="browsers">
                                            <option value="Edge">
                                                <option value="Firefox">
                                                    <option value="Chrome">
                                                        <option value="Opera">
                                                            <option value="Safari">
                                                            </datalist>

                                                            <div class="pos-absolute r-0 t-0">
                                                                <!-- Button tìm kiếm nâng cao -->
                                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#ttsTimKiemNangCao">
                                                                <i class="fa fa-search-plus" aria-hidden="true"></i>Tìm kiếm nâng cao
                                                            </button>
                                                        </div>

                                                        <!-- Modal tìm kiếm nâng cao-->
                                                        <div class="modal fade" id="ttsTimKiemNangCao" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document"
                                                        style="max-width: none;width: 80%;vertical-align: top;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title tx-gray-800" exampleModalLabel>Tìm kiếm nâng cao
                                                                </h5>
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
                                                                            <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm hàng còn
                                                                            tồn kho</label>
                                                                            <div class="toggle-wrapper">
                                                                                <div class="toggle toggle-modern primary">
                                                                                    <div class="toggle-slide">
                                                                                        <div class="toggle-inner"
                                                                                        style="width: 94px; margin-left: 0px;">
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
                                                            <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm
                                                            kiếm</label>
                                                            <input type="text"
                                                            placeholder="Nhập từ khoá tìm kiếm, ấn enter để tìm"
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
                                                                    <a class="nav-item nav-link active"
                                                                    id="nav-kqTimKiem-tab" data-toggle="tab"
                                                                    href="#nav-kqTimKiem" role="tab"
                                                                    aria-controls="nav-kq" aria-selected="true">KQ Tìm
                                                                kiếm</a>
                                                                <a class="nav-item nav-link" id="nav-daChon-tab"
                                                                data-toggle="tab" href="#nav-daChon" role="tab"
                                                                aria-controls="nav-daChon" aria-selected="false">Đã
                                                            chọn</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content mg-t-10" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-kqTimKiem"
                                                        role="tabpanel" aria-labelledby="nav-kqTimKiem-tab">
                                                        <table
                                                        class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="bg-primary"
                                                                style="color: white;text-align: center;">
                                                                <input type="checkbox">
                                                            </th>
                                                            <th scope="col" class="bg-primary"
                                                            style="color: white;">Mã HH</th>
                                                            <th scope="col" class="bg-primary"
                                                            style="color: white;">Tên</th>
                                                            <th scope="col" class="bg-primary"
                                                            style="color: white;">Tồn kho</th>
                                                            <th scope="col" class="bg-primary"
                                                            style="color: white;">ĐVT</th>
                                                            <th scope="col" class="bg-primary"
                                                            style="color: white;">Số ĐK</th>
                                                            <th scope="col" class="bg-primary"
                                                            style="color: white;">Quy cách đóng gói
                                                        </th>
                                                        <th scope="col" class="bg-primary"
                                                        style="color: white;">Hãng sản xuất</th>
                                                        <th scope="col" class="bg-primary"
                                                        style="color: white;">Hoạt chất chính
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-daChon" role="tabpanel"
                                    aria-labelledby="nav-daChon-tab">
                                    <table
                                    class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="bg-primary"
                                            style="color: white;">Mã HH</th>
                                            <th scope="col" class="bg-primary"
                                            style="color: white;">Tên</th>
                                            <th scope="col" class="bg-primary"
                                            style="color: white;">Tồn kho</th>
                                            <th scope="col" class="bg-primary"
                                            style="color: white;">ĐVT</th>
                                            <th scope="col" class="bg-primary"
                                            style="color: white;">Số ĐK</th>
                                            <th scope="col" class="bg-primary"
                                            style="color: white;">Quy cách đóng gói
                                        </th>
                                        <th scope="col" class="bg-primary"
                                        style="color: white;">Hãng sản xuất</th>
                                        <th scope="col" class="bg-primary"
                                        style="color: white;">Hàm lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
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

<div class="shadow-base bg-white pd-15 mg-t-25">
    <div style="overflow-x: scroll;">
        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd inTable" id="">
            <thead>
                <tr>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 10px;width: 3%;">#
                    </th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 100px;width: 7%;">Mã
                    HH</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 200px;width: 20%;">Tên
                    hàng hoá</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 120px;width: 10%;">Số
                    lô</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 120px;width: 8%;">Hạn
                    sử dụng</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 8%;">ĐVT
                    </th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 100px;width: 7%;">S.lg
                    huỷ</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 10%;">Lý
                    do</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 10%;">Biện
                    pháp xử lý</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 10%;">Ghi
                    chú</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 120px;width: 11%;">Giá
                    vốn</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 120px;width: 10%;">
                    Thành tiền</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 70px;width: 4%;"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td></td>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>@mdo</td>
                    <td></td>
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

<div class="d-flex justify-content-end  mg-t-15">
    <button class="btn btn-primary mg-r-10">Lưu</button>
    <button class="btn btn-danger dongThaoTac">Trở về</button>
</div>
</div>
</div>
<!-- Thao tác => sửa -->

<!-- Thao tác =>sao chép -->
<div class="pos-absolute t-0 l-0 hidden" id="thaoTacSaoChep" style="width: 100%;">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <div class="row">
            <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">xuất huỷ> tạo mới phiếu xuất huỷ</h4>
            <div class="col-6 justify-content-end d-flex">
            </div>
        </div>
    </div>

    <!-- nhập thông tin -->
    <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
            <div class="">
                <div class="row">
                    <div class="col-md-2 mg-t-10">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="tx-bold tx-gray-800">Ngày xuất <span
                                    class="text-danger">(*)</span></label>
                                </div>
                                <div class="col-12">
                                    <input type="date" class="form-control" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mg-t-10">
                            <div class="row">
                                <div class="col-12">
                                    <label for="" class="tx-bold tx-gray-800">Giờ xuất <span
                                        class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="time" class="form-control" name="time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Ghi chú</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="" id="" cols="30" rows="1" class="form-control"
                                        placeholder="Ghi chú"> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Tổng tiền</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shadow-base bg-white pd-15 mg-t-25">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="browser" class="tx-gray-900 tx-bold">Thêm hàng hoá vào phiếu</label>
                            <div class="pos-relative">
                                <input list="browsers" name="browser" id="browser" class="form-control">
                                <datalist id="browsers">
                                    <option value="Edge">
                                        <option value="Firefox">
                                            <option value="Chrome">
                                                <option value="Opera">
                                                    <option value="Safari">
                                                    </datalist>

                                                    <div class="pos-absolute r-0 t-0">
                                                        <!-- Button tìm kiếm nâng cao -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#ttsctimKiemNangCao">
                                                        <i class="fa fa-search-plus" aria-hidden="true"></i>Tìm kiếm nâng cao
                                                    </button>
                                                </div>

                                                <!-- Modal tìm kiếm nâng cao-->
                                                <div class="modal fade" id="ttsctimKiemNangCao" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document"
                                                style="max-width: none;width: 80%;vertical-align: top;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title tx-gray-800" exampleModalLabel">Tìm kiếm nâng cao
                                                        </h5>
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
                                                                    <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm hàng còn
                                                                    tồn kho</label>
                                                                    <div class="toggle-wrapper">
                                                                        <div class="toggle toggle-modern primary">
                                                                            <div class="toggle-slide">
                                                                                <div class="toggle-inner"
                                                                                style="width: 94px; margin-left: 0px;">
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
                                                    <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm
                                                    kiếm</label>
                                                    <input type="text"
                                                    placeholder="Nhập từ khoá tìm kiếm, ấn enter để tìm"
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
                                                            <a class="nav-item nav-link active"
                                                            id="nav-kqTimKiem-tab" data-toggle="tab"
                                                            href="#nav-kqTimKiem" role="tab"
                                                            aria-controls="nav-kq" aria-selected="true">KQ Tìm
                                                        kiếm</a>
                                                        <a class="nav-item nav-link" id="nav-daChon-tab"
                                                        data-toggle="tab" href="#nav-daChon" role="tab"
                                                        aria-controls="nav-daChon" aria-selected="false">Đã
                                                    chọn</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content mg-t-10" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-kqTimKiem"
                                                role="tabpanel" aria-labelledby="nav-kqTimKiem-tab">
                                                <table
                                                class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="bg-primary"
                                                        style="color: white;text-align: center;">
                                                        <input type="checkbox">
                                                    </th>
                                                    <th scope="col" class="bg-primary"
                                                    style="color: white;">Mã HH</th>
                                                    <th scope="col" class="bg-primary"
                                                    style="color: white;">Tên</th>
                                                    <th scope="col" class="bg-primary"
                                                    style="color: white;">Tồn kho</th>
                                                    <th scope="col" class="bg-primary"
                                                    style="color: white;">ĐVT</th>
                                                    <th scope="col" class="bg-primary"
                                                    style="color: white;">Số ĐK</th>
                                                    <th scope="col" class="bg-primary"
                                                    style="color: white;">Quy cách đóng gói
                                                </th>
                                                <th scope="col" class="bg-primary"
                                                style="color: white;">Hãng sản xuất</th>
                                                <th scope="col" class="bg-primary"
                                                style="color: white;">Hoạt chất chính
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Mark</td>
                                            <td>Mark</td>
                                            <td>Mark</td>
                                            <td>Mark</td>
                                            <td>Mark</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-daChon" role="tabpanel"
                            aria-labelledby="nav-daChon-tab">
                            <table
                            class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-primary"
                                    style="color: white;">Mã HH</th>
                                    <th scope="col" class="bg-primary"
                                    style="color: white;">Tên</th>
                                    <th scope="col" class="bg-primary"
                                    style="color: white;">Tồn kho</th>
                                    <th scope="col" class="bg-primary"
                                    style="color: white;">ĐVT</th>
                                    <th scope="col" class="bg-primary"
                                    style="color: white;">Số ĐK</th>
                                    <th scope="col" class="bg-primary"
                                    style="color: white;">Quy cách đóng gói
                                </th>
                                <th scope="col" class="bg-primary"
                                style="color: white;">Hãng sản xuất</th>
                                <th scope="col" class="bg-primary"
                                style="color: white;">Hàm lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
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

<div class="shadow-base bg-white pd-15 mg-t-25">
    <div style="overflow-x: scroll;">
        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd inTable" id="">
            <thead>
                <tr>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 10px;width: 3%;">#
                    </th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 100px;width: 7%;">Mã
                    HH</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 200px;width: 20%;">Tên
                    hàng hoá</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 120px;width: 10%;">Số
                    lô</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 120px;width: 8%;">Hạn
                    sử dụng</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 8%;">ĐVT
                    </th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 100px;width: 7%;">S.lg
                    huỷ</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 10%;">Lý
                    do</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 10%;">Biện
                    pháp xử lý</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 10%;">Ghi
                    chú</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 120px;width: 11%;">Giá
                    vốn</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 120px;width: 10%;">
                    Thành tiền</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 70px;width: 4%;"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td></td>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>@mdo</td>
                    <td></td>
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

<div class="d-flex justify-content-end  mg-t-15">
    <button class="btn btn-primary mg-r-10">Lưu</button>
    <button class="btn btn-danger dongThaoTac">Trở về</button>
</div>
</div>
</div>
<!-- Thao tác => sao chép -->

</div><!-- br-mainpanel -->
{{-- modal chi tiet --}}
<div>
    <!-- Modal chi tiết-->
    <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xuất Hủy > Chi tiết  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" >
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="inf" class="tab-pane active"><br>
                            <div class="row mg-t-10">
                                <div class="col-md-2 ml-2">
                                    <label for="" class="tx-gray-800 tx-bold">Mã phiếu</label>
                                    <input type="text" id="detailid" name="destruction_export_id"
                                    class="form-control" placeholder="Mã tự động" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="tx-gray-800 tx-bold">Ngày nhập</label>
                                    <input type="text" id="detaildate" name="date" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                    <input type="text" id="note" name="note" class="form-control"
                                    readonly>
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
                                            <th scope="col" class="bg-primary" style="color: white;">Số lượng
                                            </th>
                                            <th scope="col" class="bg-primary" style="color: white;">Lý do</th>
                                            <th scope="col" class="bg-primary" style="color: white;">Biện pháp xử lý
                                            giá</th>
                                            <th scope="col" class="bg-primary" style="color: white;">Ghi chú
                                            </th>
                                            <th scope="col" class="bg-primary" style="color: white;">Giá vốn</th>
                                            <th scope="col" class="bg-primary" style="color: white;">T.tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-3 font-weight-bold">
                                    Tổng tiền:
                                </div>
                                <div class="col-md-2">
                                    <input type="text" style="border: 0;background-color: #fff;" class="font-weight-bold" id="detailtotal" readonly>
                                </div>
                            </div>
                            <div class="modal-footer" style="text-align: end;">
                                <button type="button" class="btn btn-danger font-weight-bold text-uppercase" data-dismiss="modal"><i class="fas fa-times"></i> Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Modal tìm kiếm nâng cao-->
<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: none;width: 80%;vertical-align: top;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Tìm kiếm nâng cao</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- <form action=""> --}}
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
                            <a class="nav-link active" data-toggle="tab" href="#timKiem">Kết quả tìm kiếm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#daChon">Đã chọn</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="timKiem" class="tab-pane active"><br>
                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table2"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Tên</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Tồn kho</th>
                                    <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Số ĐK</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Quy cách đóng
                                    gói</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Hãng sản xuất
                                    </th>
                                    <th scope="col" class="bg-primary" style="color: white;">Hoạt chất chính
                                    </th>
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
                                    <th scope="col" class="bg-primary" style="color: white;">Quy cách đóng
                                    gói</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Hãng sản xuất
                                    </th>
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
        <button id="submitHangHoa2" class="btn btn-primary">Xong</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
    </div>
{{-- </form> --}}
</div>
</div>
</div>
<!-- ########## END: MAIN PANEL ########## -->
<style type="text/css">

</style>
<script>
    var DataTable_hanghoa = [];
    var dataimg = [];
    var hangHoa2 = [];
    var hangHoa1 = [];
    var listLotNo = [];
    var listLotNoArr = [];
    var dataUnit = [];
    var dataWarehouse=[];
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
    function substrac(a,b){
        return a-b;
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
    function total(a,b){
        a = replaceCurrency(a);
        b = replaceCurrency(b);
        // c = replaceCurrency(c);
        // d = replaceCurrency(d);
        // d = d/100;
        return a*b;
        // var f;
        // var e;
        // if(d==0){
        //     e = (b-c/a);
        // }else{
        //     e = (b-c/a)+(b-c/a)*d;
        // }
        // f = (parseFloat(e*a) || 0).toFixed(2);
        // return f;
    }
    // function price_import(a,b,c,d){
    //     a = replaceCurrency(a);
    //     b = replaceCurrency(b);
    //     c = replaceCurrency(c);
    //     d = replaceCurrency(d);
    //     d = d/100;
    //     if(d==0){
    //         e = ((b-c/a) || 0);
    //     }else{
    //         e = (((b-c/a)+(b-c/a)*d) || 0);
    //     }
    //     e = isFinite(e) && e || 0;
    //     return e.toFixed(2);
    // }
    function sum(arr){
        var total = 0;
        arr.forEach(item=>{
            total+=parseFloat(item);
        });
        return total;
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
        html += '<div>SĐK: <strong>'+data.reg_no+'</strong> | Mã HH: <strong>HH'+checkRangeValue(data.id)+'</strong></div>';
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
$('.autosearchimage').typeahead({
    source: function(query, process) {
        return $.get("{{ url('banhang/autosearchimage') }}", {
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
      html += '<div>Mã HH: <strong>'+data.id+'</strong> | SĐK: <strong>'+data.reg_no+'</strong> | Hoạt chất: <strong style="white-space: pre-line">'+data.ingredient+'</strong></div>';
      html += '<div>Quy cách ĐG: <strong>'+data.packaging+'</strong> | Hãng SX: <strong>'+data.made_in+'</strong></div>';
      html += '</div>';
      html += '</div>';
      return html;
  },
  updater: function(result) {
    result.stock_id = result.id;
    result.price = result.price_import;
    result.inventory = result.qty;
    result.reasons='';
    result.handling_measures='';
    result.note='';
    result.VAT = 0;
    result.dataunit = getDataUnitStock(result.stock_id);
    result.id = null;
    DataTable_hanghoa.push(result);
    loadData();
}
});

function updateData(data) {
    var key = $(data).attr("data-id");
    var value = $(data).attr("data-name");
    let inputDate = ($("input[data-name='exp_date'][data-id='"+key+"']").val()).split("/");
    if(parseInt(inputDate[0])>32){
        $.toast({
            text : "Ngày sử dụng hàng hoá "+DataTable_hanghoa[key]['name']+" không hợp lệ",
            position: "bottom-right",
            icon:"error",
            stack:1,
            loader:false
        })
        $("input[data-name='exp_date'][data-id='"+key+"']").val('');
    }else if(parseInt(inputDate[1])>13){
        $.toast({
            text : "Tháng sử dụng hàng hoá "+DataTable_hanghoa[key]['name']+" không hợp lệ",
            position: "bottom-right",
            icon:"error",
            stack:1,
            loader:false
        })
        $("input[data-name='exp_date'][data-id='"+key+"']").val('');
    }else if((parseInt(inputDate[2])<1900) || (parseInt(inputDate[2])>2100)){
        $.toast({
            text : "Năm sử dụng hàng hoá "+DataTable_hanghoa[key]['name']+" không hợp lệ",
            position: "bottom-right",
            icon:"error",
            stack:1,
            loader:false
        })
        $("input[data-name='exp_date'][data-id='"+key+"']").val('');
    }
    if(value=='unit'){
        DataTable_hanghoa[key]['unit_id'] = $('option:selected', data).attr('data-ha');
    }
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
      stock_id : DataTable_hanghoa[index].stock_id,
      destructions_id : DataTable_hanghoa[index].destructions_id,
      name: DataTable_hanghoa[index].name,
      lot_no: DataTable_hanghoa[index].lot_no,
      exp_date: DataTable_hanghoa[index].exp_date,
      unit_id: DataTable_hanghoa[index].unit_id,
      unit: DataTable_hanghoa[index].unit,
      dataunit: DataTable_hanghoa[index].dataunit,
      qty: DataTable_hanghoa[index].qty,
      reasons: DataTable_hanghoa[index].reasons,
      handling_measures: DataTable_hanghoa[index].handling_measures,
      note: DataTable_hanghoa[index].note,
      price: DataTable_hanghoa[index].price
  });
    loadData();
    console.log(DataTable_hanghoa);
}

function editInfoStock(idStock){
    $.ajax({
      type: "GET",
      url: "{{ url('nhaptunhacungcap/editinfostock') }}",
      data: {id:idStock},
      success: function(success) {
        $('#stockname').val(success[0].name);
        $('.stock_type').val(success[0].stock_type);
        $('.stock_type').attr('disabled',true);
        $('.reg_no').val(success[0].reg_no);
        $('.ingredient').val(success[0].ingredient);
        $('.manufacture').val(success[0].manufacture);
        $('.content').val(success[0].content);
        $('.made_in').val(success[0].made_in);
        $('.packaging').val(success[0].packaging);
        $('.VAT').val(success[0].VAT);
        $('.note').val(success[0].note);
    }
});
    $("#selectLotNo").select2();
    $.ajax({
      type:"GET",
      url: "{{ url('nhaptunhacungcap/editlotno') }}",
      data: {id:idStock},
      dataType: 'json',
      success: function(response){
        response.forEach(item=>{
          item.name = item.lot_no
      })
        console.log(response);
        response.forEach(item=>{
          var optionData = '<option value="'+item.id+'">Số lô: '+item.lot_no+' - HSD: '+item.exp_date+' - Giá nhập: '+item.price_import+'</option>';
          $('#selectLotNo').append(optionData);
      })
    }
});
}

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

function loadData(){
    var index=0;
    $('#data-table3').DataTable().clear().draw();
    DataTable_hanghoa.forEach(item=>{
     $('#data-table3').DataTable().row.add([
        '<div style="width:100%;border:0" data-name="id" data-id="'+index+'" class="form-control" >'+(index+1)+'</div>',
        '<div style="width:100%;color:black;font-weight:800;border:0" data-name="code" data-id="'+index+'" class="form-control" >HH'+checkRangeValue(item.stock_id)+'</div>',
        '<div style="width:100%;color:black;font-weight:800;border:0;" data-name="name" data-id="'+index+'" class="form-control" >'+item.name+'</div>',

        '<input style="width:75%;" class="form-control" data-name="lot_no" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['lot_no'] || '')+'" onchange="updateData(this)" placeholder="Số lô" />',

        '<div class="input-group"><input style="width:90px; border:0px;background:#fff" class="form-control" type="text" data-name="exp_date" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['exp_date'] || '')+'" onchange="updateData(this)" placeholder="DD/MM/YYYY" disabled /></div>',

        '<select style="width:100%;" onchange="updateData(this)" data-name="unit" data-id="'+index+'">'+getUnit(DataTable_hanghoa[index].dataunit,DataTable_hanghoa[index].unit)+'</select>',
        '<input style="width:75%" class="form-control" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['qty'] || 0)+'" onchange="updateData(this)" />',
        '<input style="width:75%" class="form-control" type="text" data-name="reasons" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['reasons'] || "")+'" onchange="updateData(this)" />',
        '<input style="width:75%" class="form-control" type="text" data-name="handling_measures" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['handling_measures'] || "")+'" onchange="updateData(this)" />',
        '<input style="width:75%" class="form-control" type="text" data-name="note" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['note'] || "")+'" onchange="updateData(this)" />',
        '<input style="width:75%" class="form-control" type="text" data-name="price" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['price'] || 0)+'" onchange="updateData(this)" />',
        '<input style="width:75%;border:0;background:none;" class="form-control" type="text" data-name="total" data-id="'+index+'" value="'+new Intl.NumberFormat('en-US').format(total(DataTable_hanghoa[index]['qty'] || 0,DataTable_hanghoa[index]['price'] || 0))+'" onchange="updateData(this)"/>',
                // '<div style="width:70%;border:0" data-name="total" data-id="'+index+'" onchange="updateData(this)" class="form-control" />'+total(DataTable_hanghoa[index]['qty'] || 0,DataTable_hanghoa[index]['price'] || 0)+'</div>',
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
          DataTable_hanghoa[item.index].qty = item.qty;
          DataTable_hanghoa[item.index].price = item.price_import;
          return item;
      }
  });

    index++;
});
sumTotal = $("input[data-name='total']")
.map(function(){return replaceCurrency($(this).val());}).get();
$('#total').val(new Intl.NumberFormat('en-US').format(sum(sumTotal)));
}

    // function total(a,b){
    //     return a*b;
    // }
    // function sum(arr){
    //     var total = 0.0;
    //     arr.forEach(item=>{
    //       total+=parseFloat(item);
    //   });
    //     return total;
    // }

    function searchDateTable() {
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

            $("#data-table1").DataTable()
            .columns(5).search($("#searchByStatus").val())
            .columns(1).search($("#searchBySupplier").val())
            .columns(7).search($("#searchByStock").val())
            .draw();
        }
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
        url: "{{ url('xuathuy') }}",
        "dataSrc" : function (json) {
           json['data'].forEach(item=>{
              item.total = total(item.qty,item.price);
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
   { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false,},
   { data: null,
    "render": function(data,type,row) { return "PXH"+checkRangeValue(data["id"]) }
},
{ data: null, orderable: false,
    "render": function(data,type,row) { return data["date"] +' '+data["hour"]}
},
{ data: null,orderable: false,
    "render": function(data,type,row) { return new Intl.NumberFormat('en-US').format(data['total'])}
},
{
    orderable: false,
    data: 'note',
    name: 'note'
},
{
    orderable: false,
    data: 'status',
    name: 'status'
},
{
    orderable: false,
    data: 'action',
    name: 'action'
},
],
dom: 'Blfrtip',
buttons: [
{
    extend: 'excelHtml5',
    title: 'XuatHuy_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
    text:'<span class="text-light">Xuất file Excel</span>',
    exportOptions: {
        columns: [1, 2, 3, 4]
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
            "lengthChange": false,
            "ordering": false,
            "info":     false,
            "pagingType": "full_numbers",
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
                "first": "Đầu",
                "last": "Cuối",
                "next": "Sau",
                "previous": "Trước"
            },
        },
        ajax: "{{ url('nhaptunhacungcap/gethanghoa') }}",
        columns: [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'reg_no',
            name: 'reg_no'
        },
        {
            data: 'reg_no',
            name: 'reg_no'
        },
        {
            data: 'note',
            name: 'note'
        },
        {
            data: 'ingredient',
            name: 'ingredient'
        },
        {
            data: 'ingredient',
            name: 'ingredient'
        },
        {
            data: 'ingredient',
            name: 'ingredient'
        },
        ]
    });
        $('#data-table3').DataTable({
            // responsive: true,
            "ordering" : false,
            "paging":false,
            // lengthMenu:false,
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
            $('#timkiem').modal('hide');
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
    });

$(".submitPhieuNhap").click(function(){
    let checkLotNoName = [];
    for(let i=0;i<listLotNo.length;i++){
        checkLotNoName[i] = [];
        listLotNo[i].forEach(item=>{
            checkLotNoName[i].push(item.lot_no);
        });
    }

    if (DataTable_hanghoa=='') {
        $.toast({
            text : "Chưa chọn hàng hóa",
            position: "bottom-right",
            icon:"error",
            stack:1,
            loader:false
        })
    }else{
        haCheck =0;
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
            }else if(DataTable_hanghoa[i]['qty']==0){
                haCheck = 1;
                $.toast({
                    text : "Số lượng phải lớn hơn không",
                    position: "bottom-right",
                    icon:"error",
                    stack:1,
                    loader:false
                })
                $("input[data-name='qty'][data-id='"+i+"']").focus();
            }else if(parseInt(replaceCurrency(DataTable_hanghoa[i]['qty']))>parseInt(replaceCurrency(DataTable_hanghoa[i]['inventory']))){
                haCheck = 1;
                $.toast({
                    text : "Hàng hoá "+DataTable_hanghoa[i]['name']+" có số lượng tồn kho không đủ",
                    position: "bottom-right",
                    icon:"error",
                    stack:1,
                    loader:false
                })
                $("input[data-name='qty'][data-id='"+i+"']").focus();
            }
        }
        if(haCheck==0){
            $.ajax({
                url: "{{ url('xuathuy/submitxuathuy') }}",
                type: "POST",
                data: $('#submitxuathuy').serialize(),
                success: function( response ) {
                    DataTable_hanghoa.forEach(item => {
                        item.idha = response.id;
                        item.type = "destruction_export";
                        item.price = replaceCurrency(item.price);
                        item.qty = replaceCurrency(item.qty);
                    });
                    $.ajax({
                        url: "{{ url('xuathuy/submitphieunhap') }}",
                        type: "POST",
                        dataType:'json',
                        contentType: 'json',
                        data: JSON.stringify(DataTable_hanghoa),
                        contentType: 'application/json; charset=utf-8',
                        success: function( response ) {
                            $('#data-table1').DataTable().ajax.reload();
                            $.toast({
                                text : "Tạo phiếu thành công",
                                position: "bottom-right",
                                icon:"success",
                                stack:1,
                                loader:false
                            })
                            resetTab();
                            dataWarehouse = getdatawarehouse();
                        }
                    });
                }
            });
        }
    }
});

function getUnit(list,selected){
    var unitList = [];
    if(Array.isArray(list)){
      list.forEach(item => {
        if(item.name == selected){
          unitList = unitList + '<option value="'+item.unit_id+'" selected>'+item.name+'</option>';
      }else{
         unitList = unitList + '<option value="'+item.unit_id+'">'+item.name+'</option>';
     }
 });
  }else{
   unitList = '<option data-ha="'+item.unit_id+'" value="'+list+'">'+list+'</option>';
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
            unit_id : item.id
        });
      });
    }
});
    return dataUnitStock;
}

function detailFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('xuathuy/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#detailid').val(res.id);
        $('#detaildate').val(res.date);
        $('#detailhour').val(res.hour);
        $('#note').val(res.note);
    }
});
    $.ajax({
        type:"GET",
        url: "{{ url('xuathuy/editstock') }}",
        data: { id: id },
        dataType: 'json',
        success: function(response){
            var detailtotal = response.reduce((a,b)=>
                a+parseFloat(b.price)*parseFloat(b.qty),0
                );
            console.log(detailtotal);
            $('#detailtotal').val(new Intl.NumberFormat('en-US').format(detailtotal));
            var table4 = $('#data-table4').DataTable({
                "ordering": false,
                "paging": false,
                'destroy': true,
                "info": false,
                aaData: response,
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
            columns: [
            { data: 'id', name: 'id'},
            { data: 'name', name: 'name' },
            { data:'lot_no', name: 'lot_no' },
            { data: 'qty', name: 'qty' },
            { data: 'reasons', name: 'reasons' },
            { data: 'handling_measures', name: 'handling_measures' },
            { data: 'note', name: 'note' },
            { data: 'price', name: 'price' },
            { data: null,
                "render": function(data,type,row) { return new Intl.NumberFormat('en-US').format(total(data["qty"],data["price"]))}
            },
            ],
            columnDefs: [
            {
                targets: 7,
                render: $.fn.dataTable.render.number(',', 0, '')
            }
            ],
        });
            console.log(response);
        }
    });
}

function editFunc(id){

    $.ajax({
      type:"GET",
      url: "{{ url('xuathuy/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('.id').val(res.id);
        $('.date').val(res.date);
        $('.hour').val(res.hour);
        $('.note').val(res.note);
        $.ajax({
          type:"GET",
          url: "{{ url('xuathuy/editstock') }}",
          data: { id: id },
          dataType: 'json',
          success: function(response){
            response.forEach(item=>{
              item.dataunit = getDataUnitStock(item.stock_id)
          });
            DataTable_hanghoa= response;
            loadData();
            console.log(response);

        }
    });
    }
});
}

function duplicatedFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('xuathuy/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('.date').val(res.date);
        $('.hour').val(res.hour);
        $('.note').val(res.note);
        $.ajax({
          type:"GET",
          url: "{{ url('xuathuy/editstock') }}",
          data: { id: id },
          dataType: 'json',
          success: function(response){
            response.forEach(item => {
              item.supplier_id = null;
              item.id = null;
              item.dataunit = getDataUnitStock(item.stock_id)
          });
            DataTable_hanghoa = response;
            loadData();
            console.log(DataTable_hanghoa);
        }
    });
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
                url: "{{ url('xuathuy/{id}') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#data-table1').dataTable();
                    oTable.fnDraw(false);
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
		url: "{{ url('xuathuy/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$.ajax({
				type:"GET",
				url: "{{ url('xuathuy/editstock') }}",
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

						<p style="text-align:center"><strong>PHIẾU XUẤT HỦY</strong></p>

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
        title: "Bạn chắc chắn muốn hủy phiếu PXH0000"+id+ " này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "{{ url('xuathuy/active') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#data-table1').DataTable().ajax.reload();
                    $.toast({
                        text: "Tạm dừng hoạt động xuất hủy",
                        position: "bottom-right",
                        icon: "success",
                        stack: 1,
                        loader: false
                    });
                    var oTable = $('#data-table1').dataTable();
                    oTable.fnDraw(false);
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
            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                dateFormat:"dd/mm/yy"
            });
            $('#datepickerNoOfMonths').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                numberOfMonths: 2
            });
            $("#inTab2").click(function() {
                resetTab();
                $(".tab1").addClass("hidden");
                $(".tab2").removeClass("hidden");
                console.log("hello");
            })
            // $("#outTab2").click(function() {
            //     $(".tab1").removeClass("hidden");
            //     $(".tab2").addClass("hidden");
            // })
            $('.toggle').toggles({
                on: true,
                height: 26
            });

            let taoMoiPhieuKiemKho = $("#taoMoiPhieuKiemKho");
            if (taoMoiPhieuKiemKho.length) {
                taoMoiPhieuKiemKho.validate({
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
                            required: 'Vui lòng điền ngày xuất'
                        },
                        time: {
                            required: 'Vui lòng điền thời gian'
                        }
                    }
                })
            }
            $("#searchProduct").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#searchData tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        })
    function resetTab(){
        $('#submitnhacungcap').trigger("reset");
        DataTable_hanghoa = [];
        loadData();
        $(".tab1").removeClass("hidden");
        $(".tab2").addClass("hidden");
    }
</script>
@endsection

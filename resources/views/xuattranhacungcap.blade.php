@extends('default')
@section('title', 'Xuất trả nhà cung cấp')
@section('content')
<!-- ########## END: RIGHT PANEL ########## --->

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div class="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between" style="flex-wrap: wrap;">
            <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Xuất trả nhà cung cấp</h4>
            <div class="d-flex">
                <div class="mg-r-10">
                    <button class="btn btn-primary" id="inTab2"><i class='fas fa-plus' style='font-size:15px;'></i> Xuất
                        trả nhà cung cấp</button>
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
                    <div class="col-md-4 col-xl-2 col-lg-4">
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByStartDate"
                                value="<?php echo date("01/m/Y",strtotime("-1 month")); ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-2 col-lg-4">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByEndDate"
                                placeholder="MM/DD/YYYY" value="<?php echo date("d/m/Y"); ?>" name="date">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xl-2 col-lg-4">
                        <label for="">Trạng thái</label>
                        <select name="" id="searchByStatus" class="form-control">
                            <option value="">Tất cả</option>
                            <option value="Hoạt động">Hoạt động</option>
                            <option value="Đã hủy">Đã hủy</option>
                        </select>
                    </div>
                    {{-- <div class="col-md-4 col-sm-6 col-xl-2 col-lg-4">
                            <label for="">Hoá đơn</label>
                            <select name="" id="" class="form-control">
                                <option value="">Tất cả</option>
                                <option value="">Bán theo đơn</option>
                                <option value="">Không bán theo đơn</option>
                            </select>
                        </div> --}}
                    <div class="col-md-6 col-sm-6 col-xl-4 col-lg-4">
                        <label for="">Nhà thuốc</label>
                        <div class="form-control">
                            <a href="#">Hộ Kinh Doanh Nhà thuốc Morioka</a>
                        </div>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-6">
                        <label for="">Tìm kiếm theo hàng hoá</label>
                        <input type="text" class="form-control" placeholder="Nhập mã hoặc tên hàng hoá"
                            id="searchByStock" autocomplete="off">
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <label for="">Từ khoá tìm kiếm</label>
                        <input type="text" class="form-control" placeholder="Tìm kiếm theo mã phiếu hoặc nhà cung cấp"
                            id="searchBySupplier">
                    </div>
                    <div class="col-md-2 col-lg-2 align-self-end">
                        <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"><i
                                class="fas fa-search" style="padding: 3px"></i> Tìm kiếm</button>
                    </div>
                </div>
                <div class="mg-t-20">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã phiếu</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày xuất</th>
                                <th scope="col" class="bg-primary" style="color: white;">Nhà cung cấp</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền</th>
                                <th scope="col" class="bg-primary" style="color: white;">Nhà cung cấp trả</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ghi chú</th>
                                <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                                <th scope="col" class="bg-primary" style="color: white;max-width: 11%"></th>
                            </tr>
                        </thead>
                        <tbody id="searchData"></tbody>
                    </table>
                </div>
            </div><!-- row -->
        </div><!-- br-pagebody -->
        <!--  -->
    </div>

    <!-- chitiet -->
    <!-- Modal dropdown1-->
    <div class="modal fade" id="dropdown1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết phiếu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="">
                    <div class="modal-body">
                        <div class="row mg-t-10">
                            <div class="col-md-3">
                                <label for="" class="tx-gray-800 tx-bold">Mã phiếu</label>
                                <input type="text" placeholder="PN00001" id="detailid" disabled=disabled
                                    class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="tx-gray-800 tx-bold">Ngày nhập</label>
                                <input type="text" placeholder="" id="detaildate" disabled=disabled
                                    class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="tx-gray-800 tx-bold">Nhà cung cấp</label>
                                <input type="text" placeholder="hoanh" id="detailname" disabled=disabled
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <div class="col-md-12">
                                <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                <textarea name="" id="" disabled="disabled" cols="30" rows="1"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="mg-t-10 ">
                            <label for="" class="tx-bold tx-gray-800" id="info-data-table4"></label>
                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table4">
                                <thead>
                                    <tr>
                                        <th scope="col" class="bg-primary" style="color: white;">#</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Hàng hoá</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Số lô</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Đơn giá</th>
                                        <th scope="col" class="bg-primary" style="color: white;">S.lượng</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Tổng giảm giá</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Tổng VAT</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--  <tr>
                                                <td colspan="9">
                                                    <div class="pos-relative">
                                                        <i class="fa fa-search pos-absolute l-0 t-0 pd-12"
                                                            aria-hidden="true"></i>
                                                        <input type="text" class="form-control pd-l-30"
                                                            placeholder="Tìm theo số lô, mã vạch, tên hàng hoá">
                                                    </div>
                                                </td>
                                            </tr>
                                            --}}
                                </tbody>
                            </table>
                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-6 font-weight-bold">
                                        Tổng tiền:
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="detailtotal"
                                            style="background: #fff;border: 0;font-weight: 800;" id="detailtotal"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-6 font-weight-bold">
                                        Tổng giảm giá:
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="detaildiscount"
                                            style="background: #fff;border: 0;font-weight: 800;" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-6 font-weight-bold">
                                        Tổng VAT:
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" style="background: #fff;border: 0;font-weight: 800;"
                                            id="detailvat">
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-6 font-weight-bold">
                                        Thành tiền:
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="into_money"
                                            style="background: #fff;border: 0;font-weight: 800;" disabled=disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-6 font-weight-bold">
                                        Thanh toán:
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" style="background: #fff;border: 0;font-weight: 800;"
                                            disabled=disabled class="pay_supplier">
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                                    <div class="col-md-6 font-weight-bold">
                                        Công nợ:
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="debt"
                                            style="background: #fff;border: 0;font-weight: 800;" disabled=disabled>
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

    <!--chitiet-->
    <!-- tab2 -->
    <div class="pos-absolute t-0 l-0 hidden tab2" style="width: 100%;">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase tx-18">Xuất trả nhà cung cấp > Tạo mới phiếu xuất trả
                    nhà
                    cung cấp</h4>
            </div>
        </div>
        <!-- Modal thêm mới-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title tx-gray-900" id="labelThemMoiNhaCC">Thêm mới nhà cung cấp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" name="thongTinNhaCungCap" id="thongTinNhaCungCap" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#info">Thông tin nhà cung
                                cấp</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="info">
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <input type="hidden" name="id" id="idUpdate">
                                        <label for="" class="tx-gray-800 tx-bold">Mã nhà cung cấp</label>
                                        <input type="text" class="form-control" id="supplier_id" readonly="" placeholder="Mã tự động">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="tx-gray-800 tx-bold">Tên nhà cung cấp <span
                                            class="text-danger">*</span></label>
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Mã số thuế <span
                                                class="text-danger"></span></label>
                                                <input type="text" id="tax_number" name="tax_number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mg-t-10">
                                            <div class="col-md-3">
                                                <label for="" class="tx-gray-800 tx-bold">Nhóm nhà cung cấp</label>
                                                <select name="group_id" id="group_id" class="form-control">
                                                    @foreach (App\Models\SupplierGroup::all() as $groupid)
                                                    <option value="{{ $groupid->id }}">
                                                        {{ $groupid->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="tx-gray-800 tx-bold">Email</label>
                                                <input type="email" class="form-control" name="email" id="email">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                                <input type="number" class="form-control" name="phone" id="phone">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="tx-gray-800 tx-bold">Website</label>
                                                <input type="text" class="form-control" id="website" name="website">
                                            </div>
                                        </div>
                                        <div class="row mg-t-10">
                                            <div class="col-md-12">
                                                <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                                <input type="text" class="form-control" id="address" name="address">
                                            </div>
                                        </div>
                                        <div class="row mg-t-10">
                                            <div class="col-md-12">
                                                <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                                <textarea name="note" id="note" cols="30" rows="3"
                                                class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="saveandclose" class="btn btn-primary">
                                    <i class='fas fa-plus' style='font-size:15px;'></i>
                                Lưu và đóng</button>
                                <button type="submit" class="btn btn-danger" data-dismiss="modal">
                                    <em class="fa fa-close"></em> Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <!-- nhập thông tin -->
        {{-- <form action="" id="taoPhieuXuatTraNhaCungCap"> --}}
        {{-- <form id="submitnhacungcap"> --}}
        {{-- @csrf --}}
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <form id="submitnhacungcap" method="post">
                    <div class="mg-b-20">
                        <div class="row">
                            <div class="col-md-6 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Nhà cung cấp <span
                                                class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="col-12" id="name-group">
                                        <input type="hidden" name="id" class="id" id="id" value="">
                                        <input type="hidden" name="idsupplier" id="idSupplier">
                                        <input type="hidden" id="tenNhaCungCap">
                                        <input type="text" class="form-control" id="autoSearch"
                                            placeholder="Nhập mã, tên, sđt để tìm kiếm nhà cung cấp" autocomplete="off"
                                            name="name">
                                        <button type="button" id="buttonSupplier"
                                            class="pos-absolute r-0 t-0 btn btn-primary tx-white" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </button>
                                        <div id="buttonSupplierClose"
                                            class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                class="fa fa-times"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Tổng tiền</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="price" value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Tổng giảm giá</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="discount" value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Mã phiếu</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" placeholder="Mã phiếu tự động">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Ngày xuất <span
                                                class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                            <input type="text" class="form-control fc-datepicker"
                                                placeholder="MM/DD/YYYY" value="<?php echo date("d/m/Y"); ?>"
                                                name="date" id="dateImport">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Giờ xuất <span
                                                class="text-danger">(*)</span></label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                        <input type="time" class="form-control hour" value="<?php
                                                            date_default_timezone_set("Asia/Ho_Chi_Minh");
                                                            echo date("H:i");?>" name="hour" id="hourImport"
                                            placeholder="Set time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Tổng VAT</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="VAT" value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Thành tiền</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="total" value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Mã hoá đơn</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Ngày xuất hoá đơn</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                            <input type="text" class="form-control fc-datepicker"
                                                placeholder="MM/DD/YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Giờ xuất hoá đơn</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="time" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Nhà cung cấp trả</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="pay_supplier" value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Công nợ</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="debt" value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="shadow-base bg-white pd-15 mg-t-25">
                <div>
                    <label for="browser" class="tx-gray-900 tx-bold">Thêm hàng hoá vào phiếu</label>
                    <div class="pos-relative">
                        <input name="browser" class="form-control" autocomplete="off" id="autoSearchImage">
                        <button class="btn btn-primary pos-absolute r-0 t-0" data-toggle="modal" data-target="#search">
                            <i class="fa fa-plus-circle mg-r-5" aria-hidden="true"></i>
                            Tìm kiếm nâng cao
                        </button>

                    </div>
                </div>
            </div>
            <div class="shadow-base bg-white pd-15 mg-t-25 col-md-12">
                <div style="overflow-x: auto;">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3"
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 6px; width:2%">#</th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 40px; width:6%">Mã HH
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 200px; width:15%">Tên
                                    hàng hoá</th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 100px; width:8%">Số
                                    lô(*)</th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 80px; width:8%">HSD
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 60px; width:7%">Đvt
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 80px; width:6%">S.lg
                                    trả(*)</th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 120px; width:10%">Đơn
                                    giá</th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 120px; width:10%">Tổng
                                    giảm giá</th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 50px; width:8%">VAT(%)
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 120px; width:15%">
                                    Thành tiền</th>
                                <th scope="col" class="bg-primary" style="color: white;min-width: 20px; width:5%"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end  mg-t-15">
                <button class="btn btn-primary mg-r-10" id="submitPhieuNhap"><i class='far fa-save'></i> Lưu</button>
                <a class="btn btn-danger text-white" id="outTab2"><i class='fa fa-reply'></i> Trở về</a>
            </div>
        </div>
        {{-- </form> --}}
    </div>
    <!-- end tab2 -->

    <!-- Thao tác => sửa -->
    <div class="pos-absolute t-0 l-0 hidden" id="thaoTacSua" style="width: 100%;">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6">Nhập từ nhà cung cấp>sửa phiếu nhập</h4>
                <div class="col-6 justify-content-end d-flex">
                </div>
            </div>
        </div>

        <!-- nhập thông tin -->
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <div class="mg-b-20">
                    <div class="row">
                        <div class="col-md-6 mg-t-10">
                            <label for="" class="tx-bold tx-gray-800">Nhà cung cấp</label>
                            <div class="pos-relative">
                                <input type="text" class="form-control"
                                    placeholder="Tìm kiếm nhà cung cấp theo mã, tên hoặc số điện thoại">
                                <div class="pos-absolute r-0 t-0 bg-primary">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#ttCongNhaCungCap">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ttCongNhaCungCap" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document"
                                            style="max-width: none;width: 80em;vertical-align: top;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm mới
                                                        nhà cung cấp</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" id="nhapNhaCungCap">
                                                    <div class="modal-body">
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="home-tab"
                                                                    data-toggle="tab" href="#thongTinNhaCungCap"
                                                                    role="tab" aria-controls="home"
                                                                    aria-selected="true">Thông tin nhà cung cấp</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content mg-t-10" id="myTabContent">
                                                            <div class="tab-pane fade show active"
                                                                 role="tabpanel"
                                                                aria-labelledby="home-tab">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label for="" class="tx-gray-800 tx-bold">Mã nhà
                                                                            cung cấp</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Mã tự động">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="" class="tx-gray-800 tx-bold">Tên
                                                                            nhà cung cấp <span
                                                                                style="color: red;">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            name="tenNhaCungCap">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="" class="tx-gray-800 tx-bold">Mã số
                                                                            thuế<span
                                                                                style="color: red;"></span></label>
                                                                        <input type="text" class="form-control"
                                                                            name="maSoThue">
                                                                    </div>
                                                                </div>
                                                                <div class="row mg-t-10">
                                                                    <div class="col-md-3">
                                                                        <label for="" class="tx-gray-800 tx-bold">Nhóm
                                                                            nhà cung cấp</label>
                                                                        <select name="" id=""
                                                                            class="form-control"></select>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for=""
                                                                            class="tx-gray-800 tx-bold">Email</label>
                                                                        <input type="email" class="form-control">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="" class="tx-gray-800 tx-bold">Số
                                                                            điện thoại</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for=""
                                                                            class="tx-gray-800 tx-bold">Website</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row mg-t-10">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="tx-gray-800 tx-bold">Địa
                                                                            chỉ</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row mg-t-10">
                                                                    <div class="col-md-12">
                                                                        <label for="" class="tx-gray-800 tx-bold">Ghi
                                                                            chú</label>
                                                                        <textarea name="" id="" cols="30" rows="1"
                                                                            class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Lưu và thêm
                                                            mới</button>
                                                        <button type="button" class="btn btn-primary">Lưu và
                                                            đóng</button>
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
                        <div class="col-md-3 mg-t-10">
                            <label for="" class="tx-gray-800 tx-bold">Tổng tiền</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-3 mg-t-10">
                            <label for="" class="tx-gray-800 tx-bold">Tổng giảm giá</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mg-t-10">
                            <label for="" class="tx-gray-800 tx-bold">Mã phiếu nhập</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-2 mg-t-10">
                            <label for="" class="tx-bold tx-gray-800">Ngày nhập</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"">
                                </div>
                            </div>
                            <div class=" col-md-2 mg-t-10">
                                <label for="" class="tx-bold tx-gray-800">Giờ nhập</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                    <input type="text" class="form-control setTime" placeholder="Set time">
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <label for="" class="tx-bold tx-gray-800">Tổng VAT</label>
                                <input type="text" placeholder="0.00" class="form-control">
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <label for="" class="tx-bold tx-gray-800">Thành tiền</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 mg-t-10">
                                <label for="" class="tx-gray-800 tx-bold">Mã hoá đơn</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <label for="" class="tx-bold tx-gray-800">Ngày nhập hoá đơn</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                    <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                                </div>
                            </div>
                            <div class=" col-md-2 mg-t-10">
                                <label for="" class="tx-bold tx-gray-800">Giờ nhập hoá đơn</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                    <input type="text" class="form-control setTime" placeholder="Set time">
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <label for="" class="tx-bold tx-gray-800">Thanh toán</label>
                                <input type="text" placeholder="0.00" class="form-control">
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <label for="" class="tx-bold tx-gray-800">Công nợ</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                <textarea name="" id="" cols="30" rows="1" class="form-control"></textarea>
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
                                        style="max-width: none;width: 80em;vertical-align: top;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title tx-gray-800" exampleModalLabel">Tìm kiếm nâng
                                                    cao</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Loại hàng
                                                                hoá</label>
                                                            <select name="" id="" class="form-control">
                                                                <option value="">Dược phẩm</option>
                                                                <option value="">Vật tư y tế</option>
                                                                <option value="">Hàng hoá khác</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Nhóm
                                                                hàng</label>
                                                            <select name="" id="" class="form-control">
                                                                <option value="">Sỏi thận</option>
                                                                <option value="">Sỏi mật</option>
                                                                <option value="">Hô hấp</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Hạn sử
                                                                dụng</label>
                                                            <select name="" id="" class="form-control">
                                                                <option value="">Sử dụng tốt</option>
                                                                <option value="">Sắp hết hạn</option>
                                                                <option value="">Đã hết hạn</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm
                                                                hàng còn tồn kho</label>
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
                                                                <i class="fa fa-search" aria-hidden="true"></i>Tìm
                                                                kiếm
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
                                                                        aria-controls="nav-kq" aria-selected="true">KQ
                                                                        Tìm kiếm</a>
                                                                    <a class="nav-item nav-link" id="nav-daChon-tab"
                                                                        data-toggle="tab" href="#nav-daChon" role="tab"
                                                                        aria-controls="nav-daChon"
                                                                        aria-selected="false">Đã chọn</a>
                                                                </div>
                                                            </nav>
                                                            <div class="tab-content mg-t-10" id="nav-tabContent">
                                                                <div class="tab-pane fade show active"
                                                                    id="nav-kqTimKiem" role="tabpanel"
                                                                    aria-labelledby="nav-kqTimKiem-tab">
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
                                                                                    style="color: white;">Tồn kho
                                                                                </th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">ĐVT</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Số ĐK</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Quy cách
                                                                                    đóng gói</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Hãng sản
                                                                                    xuất</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Hoạt chất
                                                                                    chính</th>
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
                                                                <div class="tab-pane fade" id="nav-daChon"
                                                                    role="tabpanel" aria-labelledby="nav-daChon-tab">
                                                                    <table
                                                                        class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Mã HH</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Tên</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Tồn kho
                                                                                </th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">ĐVT</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Số ĐK</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Quy cách
                                                                                    đóng gói</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Hãng sản
                                                                                    xuất</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                    style="color: white;">Hàm lượng
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
                                    <th scope="col" class="bg-primary" style="color: white;min-width: 50px;width: 3%;">#
                                    </th>
                                    <th scope="col" class="bg-primary" style="color: white;min-width: 90px;width: 7%;">
                                        Mã HH</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 150px;width: 20%;">Tên HH</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 110px;width: 10%;">Số lô</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width: 140px;width: 10%;">Hạn sử dụng</th>
                                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 10%;">
                                        ĐVT</th>
                                    <th scope="col" class="bg-primary" style="color: white;min-width: 100px;width: 8%;">
                                        S.lg</th>
                                    <th scope="col" class="bg-primary" style="color: white;min-width: 110px;width: 8%;">
                                        Đơn giá</th>
                                    <th scope="col" class="bg-primary" style="color: white;min-width: 110px;width: 8%;">
                                        Tổng giảm giá</th>
                                    <th scope="col" class="bg-primary" style="color: white;min-width: 70px;width: 4%;">
                                        VAT(%)</th>
                                    <th scope="col" class="bg-primary" style="color: white;min-width: 110px;width: 3%;">
                                        Giá nhập</th>
                                    <th scope="col" class="bg-primary" style="color: white;min-width: 100px;width: 4%;">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>

                                    </td>
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
            {{-- </form> --}}
        </div>
        <!-- end tab2 -->

        <!-- Thao tác => sửa -->
        <div class="pos-absolute t-0 l-0 hidden" id="thaoTacSua" style="width: 100%;">
            <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                <div class="row">
                    <h4 class="tx-gray-800 mg-b-5 col-6">Nhập từ nhà cung cấp>sửa phiếu nhập</h4>
                    <div class="col-6 justify-content-end d-flex">
                    </div>
                </div>
            </div>

            <!-- nhập thông tin -->
            <div class="br-pagebody pd-x-20 pd-sm-x-30">
                <div class="shadow-base bg-white pd-15">
                    <div class="mg-b-20">
                        <div class="row">
                            <div class="col-md-6 mg-t-10">
                                <label for="" class="tx-bold tx-gray-800">Nhà cung cấp</label>
                                <div class="pos-relative">
                                    <input type="text" class="form-control"
                                        placeholder="Tìm kiếm nhà cung cấp theo mã, tên hoặc số điện thoại">
                                    <div class="pos-absolute r-0 t-0 bg-primary">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#ttCongNhaCungCap">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="ttCongNhaCungCap" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document"
                                                style="max-width: none;width: 80em;vertical-align: top;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm
                                                            mới
                                                            nhà cung cấp</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="" id="nhapNhaCungCap">
                                                        <div class="modal-body">
                                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="home-tab"
                                                                        data-toggle="tab" href="#thongTinNhaCungCap"
                                                                        role="tab" aria-controls="home"
                                                                        aria-selected="true">Thông tin nhà cung cấp</a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content mg-t-10" id="myTabContent">
                                                                <div class="tab-pane fade show active"
                                                                    role="tabpanel"
                                                                    aria-labelledby="home-tab">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <label for="" class="tx-gray-800 tx-bold">Mã
                                                                                nhà
                                                                                cung cấp</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Mã tự động">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for=""
                                                                                class="tx-gray-800 tx-bold">Tên
                                                                                nhà cung cấp <span
                                                                                    style="color: red;">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="tenNhaCungCap">
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for="" class="tx-gray-800 tx-bold">Mã
                                                                                số
                                                                                thuế<span
                                                                                    style="color: red;">*</span></label>
                                                                            <input type="text" class="form-control"
                                                                                name="maSoThue">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mg-t-10">
                                                                        <div class="col-md-3">
                                                                            <label for=""
                                                                                class="tx-gray-800 tx-bold">Nhóm
                                                                                nhà cung cấp</label>
                                                                            <select name="" id=""
                                                                                class="form-control"></select>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for=""
                                                                                class="tx-gray-800 tx-bold">Email</label>
                                                                            <input type="email" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for="" class="tx-gray-800 tx-bold">Số
                                                                                điện thoại</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for=""
                                                                                class="tx-gray-800 tx-bold">Website</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mg-t-10">
                                                                        <div class="col-md-12">
                                                                            <label for=""
                                                                                class="tx-gray-800 tx-bold">Địa
                                                                                chỉ</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mg-t-10">
                                                                        <div class="col-md-12">
                                                                            <label for=""
                                                                                class="tx-gray-800 tx-bold">Ghi
                                                                                chú</label>
                                                                            <textarea name="" id="" cols="30" rows="1"
                                                                                class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Lưu và thêm
                                                                mới</button>
                                                            <button type="button" class="btn btn-primary">Lưu và
                                                                đóng</button>
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
                            <div class="col-md-3 mg-t-10">
                                <label for="" class="tx-gray-800 tx-bold">Tổng tiền</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-3 mg-t-10">
                                <label for="" class="tx-gray-800 tx-bold">Tổng giảm giá</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 mg-t-10">
                                <label for="" class="tx-gray-800 tx-bold">Mã phiếu nhập</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <label for="" class="tx-bold tx-gray-800">Ngày nhập</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                    <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"">
            </div>
        </div>
        <div class=" col-md-2 mg-t-10">
                                    <label for="" class="tx-bold tx-gray-800">Giờ nhập</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                        <input type="text" class="form-control setTime" placeholder="Set time">
                                    </div>
                                </div>
                                <div class="col-md-3 mg-t-10">
                                    <label for="" class="tx-bold tx-gray-800">Tổng VAT</label>
                                    <input type="text" placeholder="0.00" class="form-control">
                                </div>
                                <div class="col-md-3 mg-t-10">
                                    <label for="" class="tx-bold tx-gray-800">Thành tiền</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">Mã hoá đơn</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-2 mg-t-10">
                                    <label for="" class="tx-bold tx-gray-800">Ngày nhập hoá đơn</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                        <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <div class=" col-md-2 mg-t-10">
                                    <label for="" class="tx-bold tx-gray-800">Giờ nhập hoá đơn</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                        <input type="text" class="form-control setTime" placeholder="Set time">
                                    </div>
                                </div>
                                <div class="col-md-3 mg-t-10">
                                    <label for="" class="tx-bold tx-gray-800">Thanh toán</label>
                                    <input type="text" placeholder="0.00" class="form-control">
                                </div>
                                <div class="col-md-3 mg-t-10">
                                    <label for="" class="tx-bold tx-gray-800">Công nợ</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                    <textarea name="" id="" cols="30" rows="1" class="form-control"></textarea>
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
                                            style="max-width: none;width: 80em;vertical-align: top;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title tx-gray-800" exampleModalLabel">Tìm kiếm nâng
                                                        cao</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label for="" class="tx-gray-800 tx-bold">Loại hàng
                                                                    hoá</label>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="">Dược phẩm</option>
                                                                    <option value="">Vật tư y tế</option>
                                                                    <option value="">Hàng hoá khác</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="" class="tx-gray-800 tx-bold">Nhóm
                                                                    hàng</label>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="">Sỏi thận</option>
                                                                    <option value="">Sỏi mật</option>
                                                                    <option value="">Hô hấp</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="" class="tx-gray-800 tx-bold">Hạn sử
                                                                    dụng</label>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="">Sử dụng tốt</option>
                                                                    <option value="">Sắp hết hạn</option>
                                                                    <option value="">Đã hết hạn</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm
                                                                    hàng còn tồn kho</label>
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
                                                                    <i class="fa fa-search" aria-hidden="true"></i>Tìm
                                                                    kiếm
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="row mg-t-10">
                                                            <div class="col-md-12">
                                                                <nav>
                                                                    <div class="nav nav-tabs" id="nav-tab"
                                                                        role="tablist">
                                                                        <a class="nav-item nav-link active"
                                                                            id="nav-kqTimKiem-tab" data-toggle="tab"
                                                                            href="#nav-kqTimKiem" role="tab"
                                                                            aria-controls="nav-kq"
                                                                            aria-selected="true">KQ
                                                                            Tìm kiếm</a>
                                                                        <a class="nav-item nav-link" id="nav-daChon-tab"
                                                                            data-toggle="tab" href="#nav-daChon"
                                                                            role="tab" aria-controls="nav-daChon"
                                                                            aria-selected="false">Đã chọn</a>
                                                                    </div>
                                                                </nav>
                                                                <div class="tab-content mg-t-10" id="nav-tabContent">
                                                                    <div class="tab-pane fade show active"
                                                                        id="nav-kqTimKiem" role="tabpanel"
                                                                        aria-labelledby="nav-kqTimKiem-tab">
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
                                                                                        style="color: white;">Tồn kho
                                                                                    </th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">ĐVT</th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">Số ĐK</th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">Quy cách
                                                                                        đóng gói</th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">Hãng sản
                                                                                        xuất</th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">Hoạt chất
                                                                                        chính</th>
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
                                                                    <div class="tab-pane fade" id="nav-daChon"
                                                                        role="tabpanel"
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
                                                                                        style="color: white;">Tồn kho
                                                                                    </th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">ĐVT</th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">Số ĐK</th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">Quy cách
                                                                                        đóng gói</th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">Hãng sản
                                                                                        xuất</th>
                                                                                    <th scope="col" class="bg-primary"
                                                                                        style="color: white;">Hàm lượng
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
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 50px;width: 3%;">#
                                        </th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 90px;width: 7%;">
                                            Mã HH</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 150px;width: 20%;">Tên HH</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 110px;width: 10%;">Số lô</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 140px;width: 10%;">Hạn sử dụng</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 80px;width: 10%;">
                                            ĐVT</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 100px;width: 8%;">
                                            S.lg</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 110px;width: 8%;">
                                            Đơn giá</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 110px;width: 8%;">
                                            Tổng giảm giá</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 70px;width: 4%;">
                                            VAT(%)</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 110px;width: 3%;">
                                            Giá nhập</th>
                                        <th scope="col" class="bg-primary"
                                            style="color: white;min-width: 100px;width: 4%;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>

                                        </td>
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
            <div>
                <!-- Thao tác => sửa -->

                <!-- Thao tác =>sao chép -->
                <div class="pos-absolute t-0 l-0 hidden" id="thaoTacSaoChep" style="width: 100%;">
                    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                        <div class="row">
                            <h4 class="tx-gray-800 mg-b-5 col-6">Nhập từ nhà cung cấp>tạo mới phiếu nhập</h4>
                            <div class="col-6 justify-content-end d-flex">
                            </div>
                        </div>
                    </div>

                    <!-- nhập thông tin -->
                    <div class="br-pagebody pd-x-20 pd-sm-x-30">
                        <div class="shadow-base bg-white pd-15">
                            <div class="mg-b-20">
                                <div class="row">
                                    <div class="col-md-6 mg-t-10">
                                        <label for="" class="tx-bold tx-gray-800">Nhà cung cấp</label>
                                        <div class="pos-relative">
                                            <input type="text" class="form-control"
                                                placeholder="Tìm kiếm nhà cung cấp theo mã, tên hoặc số điện thoại">
                                            <div class="pos-absolute r-0 t-0 bg-primary">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#ttsCongNhaCungCap">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="ttsCongNhaCungCap" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document"
                                                        style="max-width: none;width: 80em;vertical-align: top;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title tx-gray-900"
                                                                    id="exampleModalLabel">
                                                                    Thêm mới nhà cung cấp</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="" id="nhapNhaCungCap">
                                                                <div class="modal-body">
                                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active" id="home-tab"
                                                                                data-toggle="tab" href="#
                                                " role="tab" aria-controls="home" aria-selected="true">Thông tin nhà
                                                                                cung
                                                                                cấp</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content mg-t-10" id="myTabContent">
                                                                        <div class="tab-pane fade show active"
                                                                             role="tabpanel"
                                                                            aria-labelledby="home-tab">
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <label for=""
                                                                                        class="tx-gray-800 tx-bold">Mã
                                                                                        nhà
                                                                                        cung cấp</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Mã tự động">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for=""
                                                                                        class="tx-gray-800 tx-bold">Tên
                                                                                        nhà
                                                                                        cung cấp <span
                                                                                            style="color: red;">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="tenNhaCungCap">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for=""
                                                                                        class="tx-gray-800 tx-bold">Mã
                                                                                        số
                                                                                        thuế<span
                                                                                            style="color: red;">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="maSoThue">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mg-t-10">
                                                                                <div class="col-md-3">
                                                                                    <label for=""
                                                                                        class="tx-gray-800 tx-bold">Nhóm
                                                                                        nhà
                                                                                        cung cấp</label>
                                                                                    <select name="" id=""
                                                                                        class="form-control"></select>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for=""
                                                                                        class="tx-gray-800 tx-bold">Email</label>
                                                                                    <input type="email"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for=""
                                                                                        class="tx-gray-800 tx-bold">Số
                                                                                        điện
                                                                                        thoại</label>
                                                                                    <input type="text"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for=""
                                                                                        class="tx-gray-800 tx-bold">Website</label>
                                                                                    <input type="text"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mg-t-10">
                                                                                <div class="col-md-12">
                                                                                    <label for=""
                                                                                        class="tx-gray-800 tx-bold">Địa
                                                                                        chỉ</label>
                                                                                    <input type="text"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mg-t-10">
                                                                                <div class="col-md-12">
                                                                                    <label for=""
                                                                                        class="tx-gray-800 tx-bold">Ghi
                                                                                        chú</label>
                                                                                    <textarea name="" id="" cols="30"
                                                                                        rows="1"
                                                                                        class="form-control"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Lưu và
                                                                        thêm mới</button>
                                                                    <button type="button" class="btn btn-primary">Lưu và
                                                                        đóng</button>
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
                                    <div class="col-md-3 mg-t-10">
                                        <label for="" class="tx-gray-800 tx-bold">Tổng tiền</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-3 mg-t-10">
                                        <label for="" class="tx-gray-800 tx-bold">Tổng giảm giá</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 mg-t-10">
                                        <label for="" class="tx-gray-800 tx-bold">Mã phiếu nhập</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-2 mg-t-10">
                                        <label for="" class="tx-bold tx-gray-800">Ngày nhập</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                            <input type="text" class="form-control fc-datepicker"
                                                placeholder="MM/DD/YYYY">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mg-t-10">
                                        <label for="" class="tx-bold tx-gray-800">Giờ nhập</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                            <input type="text" class="form-control setTime" placeholder="Set time">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mg-t-10">
                                        <label for="" class="tx-bold tx-gray-800">Tổng VAT</label>
                                        <input type="text" placeholder="0.00" class="form-control">
                                    </div>
                                    <div class="col-md-3 mg-t-10">
                                        <label for="" class="tx-bold tx-gray-800">Thành tiền</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 mg-t-10">
                                        <label for="" class="tx-gray-800 tx-bold">Mã hoá đơn</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-2 mg-t-10">
                                        <label for="" class="tx-bold tx-gray-800">Ngày nhập hoá đơn</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                            <input type="text" class="form-control fc-datepicker"
                                                placeholder="MM/DD/YYYY">
                                        </div>
                                    </div>
                                    <div class="col-md-2 mg-t-10">
                                        <label for="" class="tx-bold tx-gray-800">Giờ nhập hoá đơn</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                            <input type="text" class="form-control setTime" placeholder="Set time">
                                        </div>
                                    </div>
                                    <div class="col-md-3 mg-t-10">
                                        <label for="" class="tx-bold tx-gray-800">Thanh toán</label>
                                        <input type="text" placeholder="0.00" class="form-control">
                                    </div>
                                    <div class="col-md-3 mg-t-10">
                                        <label for="" class="tx-bold tx-gray-800">Công nợ</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                        <textarea name="" id="" cols="30" rows="1" class="form-control"></textarea>
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
                                                <i class="fa fa-search-plus" aria-hidden="true"></i>Tìm kiếm nâng
                                                cao
                                            </button>
                                        </div>
                                        <!-- Modal tìm kiếm nâng cao-->
                                        <div class="modal fade" id="ttsctimKiemNangCao" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document"
                                                style="max-width: none;width: 80em;vertical-align: top;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title tx-gray-800" exampleModalLabel>Tìm kiếm
                                                            nâng cao</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label for="" class="tx-gray-800 tx-bold">Loại
                                                                        hàng hoá</label>
                                                                    <select name="" id="" class="form-control">
                                                                        <option value="">Dược phẩm</option>
                                                                        <option value="">Vật tư y tế</option>
                                                                        <option value="">Hàng hoá khác</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="" class="tx-gray-800 tx-bold">Nhóm
                                                                        hàng</label>
                                                                    <select name="" id="" class="form-control">
                                                                        <option value="">Sỏi thận</option>
                                                                        <option value="">Sỏi mật</option>
                                                                        <option value="">Hô hấp</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="" class="tx-gray-800 tx-bold">Hạn sử
                                                                        dụng</label>
                                                                    <select name="" id="" class="form-control">
                                                                        <option value="">Sử dụng tốt</option>
                                                                        <option value="">Sắp hết hạn</option>
                                                                        <option value="">Đã hết hạn</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="" class="tx-gray-800 tx-bold">Chỉ
                                                                        tìm kiếm hàng còn tồn kho</label>
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
                                                                    <label for="" class="tx-gray-800 tx-bold">Từ
                                                                        khoá tìm kiếm</label>
                                                                    <input type="text"
                                                                        placeholder="Nhập từ khoá tìm kiếm, ấn enter để tìm"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-md-2 align-self-end">
                                                                    <button class="btn btn-info">
                                                                        <i class="fa fa-search"
                                                                            aria-hidden="true"></i>Tìm
                                                                        kiếm
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="row mg-t-10">
                                                                <div class="col-md-12">
                                                                    <nav>
                                                                        <div class="nav nav-tabs" id="nav-tab"
                                                                            role="tablist">
                                                                            <a class="nav-item nav-link active"
                                                                                id="nav-kqTimKiem-tab" data-toggle="tab"
                                                                                href="#nav-kqTimKiem" role="tab"
                                                                                aria-controls="nav-kq"
                                                                                aria-selected="true">KQ Tìm kiếm</a>
                                                                            <a class="nav-item nav-link"
                                                                                id="nav-daChon-tab" data-toggle="tab"
                                                                                href="#nav-daChon" role="tab"
                                                                                aria-controls="nav-daChon"
                                                                                aria-selected="false">Đã chọn</a>
                                                                        </div>
                                                                    </nav>
                                                                    <div class="tab-content mg-t-10"
                                                                        id="nav-tabContent">
                                                                        <div class="tab-pane fade show active"
                                                                            id="nav-kqTimKiem" role="tabpanel"
                                                                            aria-labelledby="nav-kqTimKiem-tab">
                                                                            <table
                                                                                class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;text-align: center;">
                                                                                            <input type="checkbox">
                                                                                        </th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">Mã
                                                                                            HH</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Tên</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Tồn kho</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            ĐVT</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">Số
                                                                                            ĐK</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Quy cách đóng gói</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Hãng sản xuất</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Hoạt chất chính</th>
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
                                                                        <div class="tab-pane fade" id="nav-daChon"
                                                                            role="tabpanel"
                                                                            aria-labelledby="nav-daChon-tab">
                                                                            <table
                                                                                class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">Mã
                                                                                            HH</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Tên</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Tồn kho</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            ĐVT</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">Số
                                                                                            ĐK</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Quy cách đóng gói</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Hãng sản xuất</th>
                                                                                        <th scope="col"
                                                                                            class="bg-primary"
                                                                                            style="color: white;">
                                                                                            Hàm lượng</th>
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
                                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 50px;width: 3%;">#</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 90px;width: 7%;">Mã HH</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 150px;width: 20%;">Tên HH</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 110px;width: 10%;">Số lô</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 140px;width: 10%;">Hạn sử dụng</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 80px;width: 10%;">ĐVT</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 100px;width: 8%;">S.lg</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 110px;width: 8%;">Đơn giá</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 110px;width: 8%;">Tổng giảm giá</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 70px;width: 4%;">VAT(%)</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 110px;width: 3%;">Giá nhập</th>
                                            <th scope="col" class="bg-primary"
                                                style="color: white;min-width: 100px;width: 4%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>

                                            </td>
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
                                    <div class="row">
                                        <div class="col-md-9">
                                            <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                                            <input type="text" class="form-control"
                                                placeholder="Nhập từ khoá tìm kiếm, ấn enter để tìm"
                                                id="inputTimKiemNangCao">
                                        </div>
                                        <div class="col-md-2 align-self-end">
                                            <button class="btn btn-primary" id="timKiemNangCao">
                                                <i class="fas fa-search" style="padding: 3px"></i>
                                                Tìm kiếm
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#timKiem">Kết
                                                        quả tìm kiếm</a>
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
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Mã
                                                                    HH</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Tên
                                                                </th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Tồn
                                                                    kho</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">ĐVT
                                                                </th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Số
                                                                    ĐK</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Quy
                                                                    cách đóng gói</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">
                                                                    Hãng sản xuất</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">
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
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Mã
                                                                    HH</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Tên
                                                                </th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Tồn
                                                                    kho</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">ĐVT
                                                                </th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Số
                                                                    ĐK</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Quy
                                                                    cách đóng gói</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">
                                                                    Hãng sản xuất</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Hàm
                                                                    lượng</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">
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
            </div><!-- br-mainpanel -->


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
                                                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                    style="width: 100%">
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
                                <button type="button" class="btn btn-primary">Xong</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- br-mainpanel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.1.0/autoNumeric.min.js"></script>
        <!-- ########## END: MAIN PANEL ########## -->
        <script>
            var DataTable_hanghoa = [];
    var dataimg = [];
    var hangHoa2 = [];
    var hangHoa1 = [];
    var listLotNo = [];
    var listLotNoArr = [];
    var dataUnit = [];
    var dataWarehouse = [];

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
    function checkRangeValue(value){
        if(value<10){
            return "00000"+value
        }else if(value<100){
            return "0000"+value
        }else{
            return "000"+value
        }
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
    $('#autoSearchImage').typeahead({
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
        result.discount = 0;
        result.price = result.price_import;
        result.qty = result.qty;
        result.inventory = result.qty;
        result.VAT = 0;
        result.dataunit = getDataUnitStock(result.stock_id);
        result.id = null;
        DataTable_hanghoa.push(result);
        loadData();
    }
});


    $('#autoSearch').typeahead({
        source:  function (query, process) {
          return $.get(
            "{{ url('nhaptunhacungcap/autosearch') }}",
            { query: query },
            function (data) {
              return process(data);
          });
      },
      highlighter: function (item, data) {
        if(data.tax_number){
            var parts = item.split('#'),
            html = '<div><strong>'+data.name+' ('+data.tax_number+')'+'</strong></div>';
        }else{
            var parts = item.split('#'),
            html = '<div><strong>'+data.name+'</strong></div>';
        }
        return html;
    },
    updater: function(item) {
        console.log(item);
        $('#idSupplier').val(item.id);
        $('#tenNhaCungCap').val(item.name);
        inputSupplier();
        return item;
    }
});
    $('#buttonSupplier').click(function(){
        $('#labelThemMoiNhaCC').text('');
        $('#labelThemMoiNhaCC').text('Thêm mới nhà cung cấp');
    })


    function inputSupplier(){
        $('#autoSearch').css({'color':'#23527c' , 'text-decoration':'underline', 'cursor':'pointer'});
        $("#autoSearch").addClass("font-weight-bold");
        $("#buttonSupplier").addClass("hidden");
        $("#buttonSupplierClose").removeClass("hidden");
        $('#buttonSupplierClose').on('click', function(){
          $('#idSupplier').val("");
          $('#autoSearch').val("");
          $('#tenNhaCungCap').val("");
          $('#idUpdate').val("");
     $("#autoSearch").removeClass("font-weight-bold");
          $('#autoSearch').trigger('propertychange.typeahead');
          $('#autoSearch').removeAttr("style");
          $("#buttonSupplier").removeClass("hidden");
          $("#buttonSupplierClose").addClass("hidden");
          $('#submitNhaCungCap').trigger("reset");
      });

        $('#autoSearch').on('click', function(){
            if($('#autoSearch').val()!='' && ($('#idSupplier').val()!='')){
              $('#exampleModal').modal('show');
              $.ajax({
                type: "GET",
                url: "{{ url('nhacungcap/{id}/edit') }}",
                data: {id:$("#idSupplier").val()},
                success: function(res) {
                  $('#labelThemMoiNhaCC').text('');
                  $('#labelThemMoiNhaCC').text('Thông tin nhà cung cấp: '+res.name)
                  $('#supplier_id').val("NCC"+checkRangeValue(res.id))
                  $('#idUpdate').val(res.id);
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
        if(parseFloat(inputDiscount)>parseFloat(inputTotal))
            $("input[data-name='discount'][data-id='"+key+"']").focus();

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
        listLotNo.splice(index,1);
        console.log(DataTable_hanghoa);
        loadData();
    }


    function duplicatedData(index){
        DataTable_hanghoa.push({
          id: null,
          stock_id : DataTable_hanghoa[index].stock_id,
          return_supplier_id : DataTable_hanghoa[index].return_supplier_id,
          unit_id : DataTable_hanghoa[index].unit_id,
          name: DataTable_hanghoa[index].name,
          lot_no: DataTable_hanghoa[index].lot_no,
          exp_date: DataTable_hanghoa[index].exp_date,
          unit: DataTable_hanghoa[index].unit,
          dataunit: DataTable_hanghoa[index].dataunit,
          qty: DataTable_hanghoa[index].qty,
          price: DataTable_hanghoa[index].price,
          discount: DataTable_hanghoa[index].discount,
          VAT: DataTable_hanghoa[index].VAT,
      });

        loadData();
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
            '<div style="width:100%;color:black;border:0;padding-right:0;padding-left:0" data-name="code" data-id="'+index+'" class="form-control font-weight-bold" >HH'+checkRangeValue(item.stock_id)+'</div>',
            '<div style="width:100%;color:black;border:0;" data-name="name" data-id="'+index+'" class="form-control font-weight-bold" >'+item.name+'</div>',

            '<input style="width:75%;" class="form-control" data-name="lot_no" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['lot_no'] || '')+'" onchange="updateData(this)" placeholder="Số lô" />',

            '<div class="input-group"><input style="width:90px;border:0;background:#fff" class="form-control" type="text" data-name="exp_date" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['exp_date'] || '')+'" onchange="updateData(this)" placeholder="DD/MM/YYYY" disabled/></div>',

            '<select style="width:100%;" onchange="updateData(this)" data-name="unit" data-id="'+index+'">'+getUnit(DataTable_hanghoa[index].dataunit,DataTable_hanghoa[index].unit)+'</select>',
            '<input style="width:75%" class="form-control" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['qty'] || 0)+'" onchange="updateData(this)" />',
            '<input style="width:75%" class="form-control priceHH" type="text" data-name="price" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['price'] || 0)+'" onchange="updateData(this)" />',
            '<input style="width:75%" class="form-control" type="text" data-name="discount" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['discount'] || 0)+'" onchange="updateData(this)" />',
            '<input style="width:55%" class="form-control" type="text" data-name="VAT" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['VAT'] || 0)+'" onchange="updateData(this)" />',
            '<input style="width:75%;border:0;background:none;" class="form-control" type="text" data-name="total" data-id="'+index+'" value="'+new Intl.NumberFormat('en-US').format(total(DataTable_hanghoa[index].qty || 0,DataTable_hanghoa[index].price || 0,DataTable_hanghoa[index].discount || 0,DataTable_hanghoa[index].VAT || 0))+'" onchange="updateData(this)" readonly />',
                // '<div style="width:70%;border:0" data-name="total" data-id="'+index+'" onchange="updateData(this)" class="form-control" />'+total(DataTable_hanghoa[index].qty || 0,DataTable_hanghoa[index].price || 0,DataTable_hanghoa[index].discount || 0,DataTable_hanghoa[index].VAT || 0)+'</div>',
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
            // sumTotal = $("input[data-name='total']")
            // .map(function(){return replaceCurrency($(this).val());}).get();

            // $('.total').val(new Intl.NumberFormat('en-US').format(sum(sumTotal)));
            var sumTotal = $("input[data-name='total']")
            .map(function(){return replaceCurrency($(this).val());}).get();
            var fixTotalMoney = new Intl.NumberFormat('en-US').format(sum(sumTotal));
            $('#total').val(fixTotalMoney);
            const element = AutoNumeric.getAutoNumericElement('#pay_supplier');
            element.set(fixTotalMoney);
            // console.log(sum(sumTotal));
            // console.log(sumTotal.toString());

            sumDiscount = $("input[data-name='discount']")
            .map(function(){return replaceCurrency($(this).val());}).get();
            $('#discount').val(new Intl.NumberFormat('en-US').format(sum(sumDiscount)));

            sumQty = $("input[data-name='qty']")
            .map(function(){return $(this).val();}).get();
            sumPrice = $("input[data-name='price']")
            .map(function(){return replaceCurrency($(this).val());}).get();
            var sumArr = sumQty.map((a, i) => parseFloat(a)*parseFloat(sumPrice[i]));
            $('#price').val(new Intl.NumberFormat('en-US').format(sum(sumArr)));

            var tempMoney = parseFloat(replaceCurrency($('#total').val()));
            var tempPrice = parseFloat(replaceCurrency($('#price').val()));
            var tempDiscount = parseFloat(replaceCurrency($('#discount').val()));
            var tempPaid = parseFloat(replaceCurrency($('#pay_supplier').val()));
            // $('#VAT').val((parseFloat($('#total').val())-parseFloat($('#price').val())+parseFloat($('#discount').val())).toFixed(2));
            $('#VAT').val(new Intl.NumberFormat('en-US').format(tempMoney-tempPrice+tempDiscount));
            $('#debt').val(new Intl.NumberFormat('en-US',{
                style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2
            }).format(substrac(tempMoney,tempPaid)));

            $('#pay_supplier').change(function(){
                var tempMoney = parseFloat(replaceCurrency($('#total').val()));
                var tempPaid = parseFloat(replaceCurrency($('#pay_supplier').val()));

                if(tempPaid>tempMoney){
                    AutoNumeric.getAutoNumericElement('#pay_supplier').set($('#total').val());
                    $('#debt').val(0);
                }else{
                    $('#debt').val(new Intl.NumberFormat('en-US').format(tempMoney-tempPaid));
                }
            })
        }


        function searchDateTable(){
            if ($('#searchByStartDate').val()=='') {
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
                .columns(7).search($("#searchByStatus").val())
                .columns(9).search($("#searchByStock").val())
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
            url: "{{ url('xuattranhacungcap') }}",
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

              return newData;
          }
      },
      columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false,},
      { data: null,
        "render": function(data,type,row) {
            if(data["id"]<10){
                return "PX00000"+data["id"]
            }else if(data["id"]<100){
                return "PX0000"+data["id"]
            }else{
                return "PX000"+data["id"]
            }
        }
    },
    { data: null, orderable: false,
        "render": function(data,type,row) { return data["date"] +' '+data["hour"]}
    },
    { data: 'name', name: 'name' ,orderable: false,},
    { data: null,orderable: false,
        "render": function(data,type,row) { return new Intl.NumberFormat('en-US').format(data['total'])}
    },
    { data: 'pay_supplier',orderable: false,},
    { data: 'name', name: 'status',orderable: false, },
    { data: 'status', name: 'status' ,orderable: false,},
    { data: 'action', name: 'action',orderable: false,},
    ],
    dom: 'Blfrtip',
    buttons: [
    {
        extend: 'excelHtml5',
        title: 'XuatTraNhaCungCap_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
        text:'<span class="text-light">Xuất file Excel</span>',
        exportOptions: {
            columns: [1, 2, 3, 4, 5, 6]
        },
    }
    ],
    columnDefs: [
    {
        targets: 5,
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

            $( "#timKiemNangCao" ).click(function(){
                $('#data-table2').DataTable().search( $( "#inputTimKiemNangCao" ).val()).draw();
                console.log($( "#searchProduct" ).val());
            });

            var table3 = $('#data-table3').DataTable({
            // responsive: true,
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

$("#submitPhieuNhap").click(function(){
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
            if($('#autoSearch').val()==''){
                haCheck = 1;
                $.toast({
                    text : "Chưa chọn nhà cung cấp",
                    position: "bottom-right",
                    icon:"error",
                    stack:1,
                    loader:false
                })
                $('#autoSearch').focus();
            }else if($('#tenNhaCungCap').val()==''){
                haCheck = 1;
                $.toast({
                    text : "Hãy chọn lại nhà cung cấp đã được lưu trong cơ sở dữ liệu hoặc tạo mới nhà cung cấp",
                    position: "bottom-right",
                    icon:"error",
                    stack:1,
                    loader:false
                })
                $('#autoSearch').focus();
            }else if($('#dateImport').val()==''){
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
            }else if(DataTable_hanghoa[i]['qty']=='0'){
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

        if (haCheck===0){
            $.ajax({
                url: "{{ url('xuattranhacungcap/submitnhacungcap') }}",
                type: "POST",
                data: $('#submitnhacungcap').serialize()+"&pay_supplier="+replaceCurrency($('#pay_supplier').val()),
                success: function( response ) {
                    DataTable_hanghoa.forEach(item => {
                        item.type = "return_from_supplier"
                        item.idha = response.id;
                        item.qty = replaceCurrency(item.qty);
                        item.price = replaceCurrency(item.price);
                        item.discount = replaceCurrency(item.discount);
                        item.VAT = replaceCurrency(item.VAT);
                    });
                    $.ajax({
                      url: "{{ url('xuattranhacungcap/submitphieunhap') }}",
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
                        });
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
            unit_id: item.id
        });
      });
    }
});
    return dataUnitStock;
}

function detailFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('xuattranhacungcap/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        console.log(res.id);
        $('#detailid').val("PXT"+checkRangeValue(res.id));
        $('#detailname').val(res.name);
        $('#detaildate').val(res.date);
            // var pay_supplier = res.pay_supplier;
            $('.pay_supplier').val(new Intl.NumberFormat('en-US').format(res.pay_supplier));
        }
    });
    $.ajax({
        type:"GET",
        url: "{{ url('xuattranhacungcap/editstock') }}",
        data: { id: id },
        dataType: 'json',
        success: function(response){
                // var detailvat = response.reduce((a, b)=>
                //     parseFloat(a) + parseFloat(total(b.qty,b.price,b.discount,b.VAT)),0
                //     );
                // var discount = response.reduce((a, b)=>
                //         parseFloat(a) + parseFloat(b.discount),0
                //     );

                // var detailtotal = response.reduce((a,b)=>
                //         a+b.qty*parseFloat(b.price),0
                //     );
                // var price = response.reduce((a,b)=>
                //         a+parseFloat(b.price),0
                //     );
                var detailPrice = response.reduce((a,b)=>
                    a+b.qty*parseFloat(b.price),0
                    );
                var detailDiscount = response.reduce((a, b)=>
                    parseFloat(a) + parseFloat(b.discount),0
                    );
                var detailMoney = response.reduce((a, b)=>
                    parseFloat(a) + parseFloat(total(b.qty,b.price,b.discount,b.VAT)),0
                    );
                $('#detailtotal').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailPrice));
                $('#detaildiscount').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailDiscount));
                $('#into_money').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(detailMoney));

                var tempMoney = parseFloat(replaceCurrency($('#into_money').val()));
                var tempPrice = parseFloat(replaceCurrency($('#detailtotal').val()));
                var tempDiscount = parseFloat(replaceCurrency($('#detaildiscount').val()));
                $('#detailvat').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(tempMoney-tempPrice+tempDiscount));

                var tempPaid = parseFloat(replaceCurrency($('#detailPaid').val()));
                $('.debt').val(new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(substrac(tempMoney,tempPaid)) || 0);
                console.log(response);

                // var into_money = detailtotal+detailvat-discount;
                // console.log(into_money)
                // var debt = parseFloat(into_money)-parseFloat(($('.pay_supplier').val()).replace(/,/gi,''));
                // // console.log(debt);
                // console.log(parseFloat($('.pay_supplier').val().replaceAll(/,/gi,'')));
                // $('#detailvat').val(detailvat);
                // $('#detaildiscount').val(new Intl.NumberFormat('en-US').format(discount));
                // $('#detailtotal').val(new Intl.NumberFormat('en-US').format(detailtotal));
                // $('#into_money').val(new Intl.NumberFormat('en-US').format(into_money));
                // $('.debt').val(new Intl.NumberFormat('en-US').format(debt));
                var table4 = $('#data-table4').DataTable({
                    'destroy': true,
                    aaData: response,
                    // "responsive": true,
                    responsive: true,
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
                columns: [
                { data: 'id', name: 'id'},
                { data: null,
                    "render": function(data,type,row) {
                        return data['name'] +'</br><div class="font-weight-bold">HH'+checkRangeValue(data['stock_id'])+'</div>'
                    }
                },
                    // { data: 'name', name: 'name' },
                    { data: null,
                        "render": function(data,type,row) {
                            return data['lot_no'] +'</br><span class="font-weight-bold">HSD: </span>'+data['exp_date']
                        }
                    },
                    { data: 'price', name: 'price' },
                    { data: null,
                        "render": function(data,type,row) {
                            return data['qty'] +' <span class="font-weight-bold">('+data['unit']+')'
                        }
                    },
                    { data: null,
                        "render": function(data,type,row) {
                            return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(data['discount'])}
                        },
                        { data: 'VAT', name: 'VAT' },
                        { data: null,
                            "render": function(data) { return new Intl.NumberFormat('en-US').format(total(data["qty"],data["price"],data["discount"],data["VAT"]))}
                        },
                        ],
                        columnDefs: [
                        {
                            targets: 3,
                            render: $.fn.dataTable.render.number(',', 0, '')
                        }
                        ],
                    });

                // table4.rows.add( response).draw( false );
                console.log($('#data-table4 tr td'));
            }
        });
}

function duplicatedFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('xuattranhacungcap/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#autoSearch').val(res.name);
        $('#idSupplier').val(res.idsupplier);
        $('#tenNhaCungCap').val(res.name);
        $('.date').val(res.date);
        $('.hour').val(res.hour);
        $.ajax({
          type:"GET",
          url: "{{ url('xuattranhacungcap/editstock') }}",
          data: { id: id },
          dataType: 'json',
          success: function(response){
            response.forEach(item => {
              item.return_supplier_id = null;
              item.id = null;
              item.dataunit = getDataUnitStock(item.stock_id)
          });
                // console.log(item)
                DataTable_hanghoa = response;
                loadData();
                console.log(DataTable_hanghoa);
            }
        });
    }
});
}

function editFunc(id){

    $.ajax({
      type:"GET",
      url: "{{ url('xuattranhacungcap/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#id').val(res.id);
        $('#idSupplier').val(res.idsupplier);
        $('#autoSearch').val(res.name);
        $('#tenNhaCungCap').val(res.name);
        $('.date').val(res.date);
        $('.hours').val(res.hour);
        inputSupplier();
        $.ajax({
          type:"GET",
          url: "{{ url('xuattranhacungcap/editstock') }}",
          data: { id: id },
          dataType: 'json',
          success: function(response){
                //  response.forEach(item=>{
                //       item.dataunit = getDataUnitStock(item.stock_id)
                //     })
                // DataTable_hanghoa= response;
                // loadData();
                // // console.log(response);
                response.forEach(item=>{
                    item.dataunit = getDataUnitStock(item.stock_id);
                    item.pay_supplier = res.pay_supplier
                })
                DataTable_hanghoa = response;
                console.log(DataTable_hanghoa);
                loadData();
                $('#pay_supplier').val(new Intl.NumberFormat('en-US').format(res.pay_supplier));
                var tempMoney = parseFloat(replaceCurrency($('#total').val()));
                $('#debt').val(new Intl.NumberFormat('en-US').format(tempMoney-res.pay_supplier) || 0);
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
                url: "{{ url('xuattranhacungcap/{id}') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#data-table1').DataTable().ajax.reload();
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
		url: "{{ url('xuattranhacungcap/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$.ajax({
				type:"GET",
				url: "{{ url('xuattranhacungcap/editstock') }}",
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

                        <p style="text-align:center"><strong>PHIẾU XUẤT TRẢ NHÀ CUNG CẤP</strong></p>

                        <table class="mg-b-0 tx-13 tx-gray-700" style="width:100%">
                        <tbody>
                        <tr>
                        <td>Khách hàng:<strong>`+res.name+`</strong></td>
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
function changeFunc(id) {
    Swal.fire({
        title: "Hệ thống sẽ huỷ các phiếu chi có liên quan đến phiếu PX0000"+id+ " Bạn chắc chắn muốn huỷ phiếu này??",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "{{ url('xuattranhacungcap/active') }}",
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
            dateFormat:'dd/mm/yy'

        });

        new AutoNumeric("#pay_supplier",{
            minimumValue: 0,
            modifyValueOnWheel: false,
            unformatOnHover: false
        });

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
            });
          }else{
              resetTab();
          }
      })
        //thêm nhà cung cấp
        $(function() {
            let thongTinNhaCungCap = $("#thongTinNhaCungCap");
            if (thongTinNhaCungCap.length) {
                thongTinNhaCungCap.validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 6
                        }
                    },
                    messages: {
                        name: {
                            required: "Vui lòng bạn nhập tên nhà cung cấp.",
                            minlength: "vui lòng bạn nhập tên trên 5 kí tự"
                        }
                    },
                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            }
                        });

                        $("#submit").attr("disabled", true);

                        $.ajax({
                            url: "{{ url('nhacungcap') }}",
                            type: "POST",
                            data: $('#thongTinNhaCungCap').serialize(),
                            success: function(response) {
                                $("#submit").attr("disabled", false);
                                $("#submit").load(
                                    $.toast({
                                        text: "Thêm mới nhà cung cấp thành công",
                                        position: "bottom-right",
                                        icon: "success",
                                        stack: 1,
                                        loader: false
                                    }));
                                document.getElementById("thongTinNhaCungCap").reset();
                                $('#exampleModal').modal('hide');
                            }
                        });
                    }
                })
            }
        })

        $('#datepickerNoOfMonths').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            numberOfMonths: 2
        });
        $("#inTab2").click(function() {
            resetTab();
            $(".tab1").addClass("hidden");
            $(".tab2").removeClass("hidden");
        })
        // $("#outTab2").click(function() {
        //     $(".tab1").removeClass("hidden");
        //     $(".tab2").addClass("hidden");
        // })
        $('.toggle').toggles({
            on: true,
            height: 26
        });
        let taoPhieuXuatTraNhaCungCap = $("#taoPhieuXuatTraNhaCungCap");
        if (taoPhieuXuatTraNhaCungCap.length) {
            taoPhieuXuatTraNhaCungCap.validate({
                rules: {
                    nhacungcap: {
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
                    nhacungcap: {
                        required: 'Vui lòng điện thông tin nhà cung cấp'
                    },
                    date: {
                        required: 'Vui lòng điền ngày xuất'
                    },
                    time: {
                        required: 'Vui lòng điền thời gian xuất'
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

    $('#idSupplier').val("");
    $('#autoSearch').val("");
    $('#id').val("");
    $('#tenNhaCungCap').val('');
    $('#submitnhacungcap').trigger("reset");
    $('#autoSearch').removeAttr("style");
    $("#buttonSupplier").removeClass("hidden");
    $("#buttonSupplierClose").addClass("hidden");
    DataTable_hanghoa = [];
    loadData();
    $(".tab1").removeClass("hidden");
    $(".tab2").addClass("hidden");
}
        </script>

        @endsection


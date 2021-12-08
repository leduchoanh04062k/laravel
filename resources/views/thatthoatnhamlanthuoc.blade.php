@extends('default')
@section('title','Thất thoát nhầm lẫn thuốc')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Báo cáo thất thoát nhầm lẫn thuốc kiểm soát đặc biệt
                </h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="mg-r-10">
                        <button type="button" class="btn btn-info" id="inTab2">
                            <em class="fa fa-file-excel-o"></em> Xuất ra file ecxel
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-danger"><a href="{{ route('baocao') }}" style="color: #fff">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                Trở về
                            </a></button>
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
                        <label for="">Trạng thái hàng hóa</label>
                        <select class="js-example-basic-single form-control" id="ten" name="state">
                            <option value="">Tất cả</option>
                            <option value="">Kích hoạt</option>
                            <option value="">Tạm dừng</option>
                        </select>
                    </div>
                    <div class="col-md-6 row">
                        <div class="col-md-8">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control"
                                placeholder="Tìm kiếm theo mã hoá đơn, mã phiếu hoặc nhà cung cấp" list="tenHH">
                            <datalist id="tenHH">
                                <option value="HH">HH</option>
                                <option value="HHH">HHH</option>
                            </datalist>
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info"><em class="fa fa-search"></em>Tìm kiếm</button>
                        </div>
                    </div>
                </div>

                <div class="mg-t-20">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã hàng hóa</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tên hàng hóa</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lô</th>
                                <th scope="col" class="bg-primary" style="color: white;">Hạn dùng</th>
                                <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thất thoát nhầm lẫn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thời gian</th>
                                <th scope="col" class="bg-primary" style="color: white;">Lý do</th>
                                <th scope="col" class="bg-primary" style="color: white;">Biện pháp sử lý</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end  mg-t-15">
                    <button class="btn btn-danger" id="outTab2">
                        <a href="{{ route('baocao') }}" style="color: #fff">
                            <i class="fa fa-reply" aria-hidden="true"></i>
                            Trở về
                        </a>
                    </button>
                </div>
            </div><!-- row -->
        </div><!-- br-pagebody -->
        <!--  -->
    </div>

    <!-- tab2 -->
    <div class="pos-absolute t-0 l-0 hidden" id="tab2">
    </div>
    <!-- end tab2 -->

</div>
{{-- script --}}
<script>
    // Datepicker
    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
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
    $(document).ready(function () {
      $('#ten').select2({
        width: "95%"
      });
    });
</script>
@endsection

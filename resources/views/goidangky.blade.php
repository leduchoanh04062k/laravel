@extends('default')
@section('title','Gói đăng ký')
@section('content')
  <link rel="stylesheet" href="../lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="../lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
          <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Đăng ký gói cước</h4>
          <div class="d-flex">
            <div class="mg-r-10">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Naptien">
                <em class="fa fa-money"></em> Nạp tiền
              </button>
              <div class="modal fade" id="Naptien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width:none;width:40em;vertical-align: top;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Nạp tiền</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="">
                      <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#goiCuoc" id=''>ViettelPay</a>
                          </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mg-t-5" style="background: #f3f5f9;">
                         <div class="row">
                             <div class="col-md-12" style="height:130px">
                                <div class="row">
                                 <div class="col-md-3 mg-t-10">
                                   <img src="image/viettelpay.png" alt="" width="80px" height="80px">
                                 </div>
                                 <div class="col-md-9 mg-t-20">
                                    <label class="text-dark">Số tiền nạp <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="0" style="height: 37px">
                                        <button class="input-group-addon mg-r-10" style="color: #fff;
                                        background-color: #36c6d3;
                                        border-color: #2bb8c4;height: 37px"><em class="fa fa-qrcode pd-5"></em>TẠO MÃ QR</button>
                                      </div>
                                </div>
                            </div>
                             </div>
                         </div>
                        </div>
                        <div class="text-center mg-l-120 mg-t-10" style="height:250px; width:250px;background-color:aliceblue" >
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em> Đóng</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="mg-r-10">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <em class="fa fa-medkit"></em> Đăng ký -Thanh toán gói cước
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width:none;width:80em;vertical-align: top;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title tx-gray-900" id="exampleModalLabel"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form  id="submitdangky">
                        @csrf
                      <div class="modal-body">
                          <input type="hidden" value="{{ Auth::user()->id }}" name="id_user" id="id_user">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#goiCuoc" id='goiCuoc1'>Gói cước</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#goiCuocBS" >Gói cước bổ sung</a>
                          </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div id="goiCuoc" class="tab-pane active bd" >
                            <div class="owl-carousel owl-theme pd-10" >
                            @foreach($news as $item)
                              <div class="item shadow-base bd tx-center bg-info" id="abc_{{$item->id }}">
                                <input type="hidden" name="data_id" value="" id="abc1">
                                <div class="" style="padding: 1.25rem; color: white;">
                                  <h5 class="card-title tx-white bd-b bd-white pd-b-5">{{ $item->name }}</h5>
                                  <h6 class="card-subtitle mb-2 tx-white tx-28 "><span class='tien'>{{$item->price}}</span> VNĐ</h6>
                                  <p class="card-text">{{ $item->time }} tháng</p>
                                </div>
                                <div class="bg-light" style="padding:1.25rem;">
                                  <p class="card-text tx-info bd-b bd-white pd-b-5 tenGoiCuoc">
                                    <input type="checkbox" checked disabled="disabled">
                                    Gói cước {{ $item->time }} tháng ({{ $item -> account }} account)
                                  </p>
                                  <p class="card-text tx-info soTaiKhoan">
                                    <input type="checkbox" checked disabled="disabled">
                                    Số tài khoản: {{ $item -> account }}  tài khoản
                                  </p>
                                </div>
                              </div>
                              @endforeach
                            </div>
                          </div>
                          <div id="goiCuocBS" class="tab-pane fade bd">
                            <div class="pd-10 owl-carousel owl-theme ">
                            <div class="item shadow-base bd tx-center bg-info" >
                                <div class="" style="padding: 1.25rem; color: white;">
                                  <h5 class="card-title tx-white bd-b bd-white pd-b-5">GBX</h5>
                                  <h6 class="card-subtitle mb-2 tx-white tx-28"><span class='tien'>30000</span> VNĐ</h6>
                                  <p class="card-text">1 tháng</p>
                                </div>
                                <div class="bg-light" style="padding:1.25rem;">
                                  <p class="card-text tx-info bd-b bd-white pd-b-5 tenGoiCuoc">
                                    <input type="checkbox" checked disabled="disabled">
                                    Gói cước 1 tháng bổ sung
                                  </p>
                                  <p class="card-text tx-info soTaiKhoan">
                                    <input type="checkbox" checked disabled="disabled">
                                    Số tài khoản: 1 tài khoản
                                  </p>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="row mg-t-20 tx-gray-800">
                          <div class="col-md-6"></div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">Tên gói cước:</div>
                              <div class="col-md-6 hienTenGoiCuoc" style="text-align: end;padding-right: 10px;"></div>
                            </div>
                            <div class="row mg-t-10">
                              <div class="col-md-6">Số lượng đăng ký:</div>
                              <div class="col-md-6" style="text-align: end;padding-right: 10px;">
                                <input type="number" name="qty" style='text-align:right;max-width:30%;' value='1' class='soLuongDangKy'>
                              </div>
                            </div>
                            <div class="row mg-t-10">
                              <div class="col-md-6">Thời gian sử dụng:</div>
                              <input type="hidden" class="thoiGianSuDung" id="thoiGianSuDung" value="" name="time">
                              <div class="col-md-6 thoiGianSuDung" style="text-align: end;padding-right: 10px;"></div>
                            </div>
                            <div class="row mg-t-10">
                              <div class="col-md-6">Tổng tiền:</div>
                              {{-- <input type="hidden" class="tongTien" id="tongTien" value="" name="total"> --}}
                              <div class="col-md-6" style="text-align: end;padding-right: 10px;"><span class='tongTien'>0</span> VNĐ</div>
                            </div>
                            <div class="row mg-t-10">
                              <div class="col-md-6">Số dư tài khoản:</div>
                              <div class="col-md-6" style="text-align: end;padding-right: 10px;">0 VNĐ</div>
                            </div>
                            <div class="row mg-t-10">
                                <input type="hidden" class="tongTienThanhToan" id="tongTienThanhToan" value="" name="total">
                              <div class="col-md-6 tx-bold">Tổng tiền thanh toán:</div>
                              <div class="col-md-6 tx-bold" style="text-align: end;padding-right: 10px;"><span class='tongTienThanhToan'>0</span> VNĐ</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary submitPhieuNhap" data-toggle="modal" data-target="#thanhToan"><em class="fa fa-money"></em> Thanh toán</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em> Đóng</button>
                      </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="thanhToan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width:none;width:80em;vertical-align: top;">
                  <div class="modal-content">
                    <form action="">
                      <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#goiCuoc" id=''>Thanh toán</a>
                          </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mg-t-5" style="background: #f3f5f9;">
                         <div class="row">
                             <div class="col-md-12" style="height:100%">
                                <div class="row">
                                 <div class="col-md-6 offset-md-3 mg-t-10 pd-10">
                                     <div style="text-align: center">
                                          <img src="image/download.png" alt="" width="250px" height="256px">
                                     </div>
                                 </div>
                                 <div class="col-md-6 mg-t-20">
                                    <div class="row mg-t-10">
                                       <div class="col-md-4">Tên gói cước:</div>
                                       <div class="col-md-6 hienTenGoiCuoc" style="text-align: end;padding-right: 10px;"></div>
                                   </div>
                                   <div class="row mg-t-10">
                                      <div class="col-md-4">Số lượng đăng ký:</div>
                                      <div class="col-md-6" style="text-align: end;padding-right: 10px;">
                                        <input type="number" name="qty" style='text-align:right;max-width:30%;' value='1' class='soLuongDangKy'>
                                      </div>
                                   </div>
                                   <div class="row mg-t-10">
                                    <div class="col-md-4">Thời gian sử dụng:</div>
                                    <div class="col-md-6 thoiGianSuDung" style="text-align: end;padding-right: 10px;"></div>
                                 </div>
                                 <div class="row mg-t-10">
                                    <div class="col-md-4">Tổng tiền:</div>
                                    <div class="col-md-6" style="text-align: end;padding-right: 10px;"><span class='tongTien'>0</span> VNĐ</div>
                                 </div>
                                 <div class="row mg-t-10">
                                    <div class="col-md-4">Số dư tài khoản:</div>
                                    <div class="col-md-6" style="text-align: end;padding-right: 10px;">0 VNĐ</div>
                                 </div>
                                 <div class="row mg-t-10">
                                    <div class="col-md-4">Tổng tiền thanh toán:</div>
                                    <div class="col-md-6 tx-bold" style="text-align: end;padding-right: 10px;"><span class='tongTienThanhToan'>0</span> VNĐ</div>
                                 </div>
                                </div>
                            </div>
                             </div>
                         </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em> Đóng</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <div class="mg-r-10">
              <button class="btn btn-info"><em class="fa fa-file-excel-o"></em> Xuất file excel</button>
            </div>
            <div class="mg-r-10">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" style="background-color: #F1C40F;
              border-color: #dab10d;">
                <em class="fa fa-list"></em> Danh sách gói cước
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width:none;width:80em;vertical-align: top;">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Danh sách gói cước đang sử dụng</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12 mg-t-20">
                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                              <thead>
                                <tr>
                                  <th scope="col" class="bg-primary" style="color: white;">Tên gói cước</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Ngày bắt đầu</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Ngày hết hạn</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Thời gian sử dụng</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em> Đóng</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
          <div class="shadow-base bg-white pd-15">
            <div class="row">
              <div class="col-md-2">
                <label for="" class="tx-bold tx-gray-800">Từ ngày</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                  <input type="text" class="form-control fc-datepicker" value="<?php echo date("01/m/Y",strtotime("-7 month")); ?>" placeholder="MM/DD/YYYY">
                </div>
              </div>
              <div class="col-md-2">
                <label for="" class="tx-bold tx-gray-800">Tới ngày</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                  <input type="text" class="form-control fc-datepicker" value="<?php echo date("d/m/Y"); ?> " placeholder="MM/DD/YYYY">
                </div>
              </div>
              <div class="col-md-3">
                <label for="" class="tx-bold tx-gray-800">Loại giao dịch</label>
                <select name="" id="" class="form-control select2 select2-container">
                  <option value="">Tất cả</option>
                  <option value="">Thanh toán</option>
                  <option value="">Nạp tiền</option>
                  <option value="">Cập nhật số dư</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="" class="tx-bold tx-gray-800">Nguồn</label>
                <select name="" id="" class="form-control select2 select2-container">
                  <option value="">Tất cả</option>
                  <option value="">Thẻ cào</option>
                  <option value="">Nạp tiền</option>
                  <option value="">Cập nhật số dư</option>
                </select>
              </div>
            </div>
            <div class="row tx-gray-900 mg-t-10">
              <div class="col-md-4 col-lg-2">
                <label for="" class="tx-gray-800 tx-bold">Trạng thái</label>
                <select name="" id="" class="form-control">
                  <option value="">Tất cả</option>
                  <option value="">Thành công</option>
                  <option value="">Thất bại</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                <input type="text" class="form-control" placeholder="Tìm kiếm theo mã hoặc tên nhóm khách hàng">
              </div>
              <div class="col-md-1 align-self-end">
                <button class="btn btn-info"><em class="fa fa-search"></em> Tìm kiếm</button>
              </div>
            </div>

            <div class="mg-t-20">
                <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
              <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1">
                <thead>
                  <tr>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 20px;width: 5%;">#</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 15%;">Ngày giao dịch</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 80px;width: 15%;">Tên giao dịch</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 50px;width: 15%;">Gía trị</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 70px;width: 15%;">Nguồn</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 50px;width: 10%;">Trạng thái</th>
                    <th scope="col" class="bg-primary" style="color: white;min-width: 100px;width: 15%;">Ghi chú hệ thống</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div><!-- row -->
        </div><!-- br-pagebody -->
      </div><!-- br-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->

      <script>
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
          function decialNumber(number){
            return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
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
        $(".submitPhieuNhap").click(function(){
            if($("input[name='data_id']").val()==''){
                $.toast({
                text : "Vui lòng chọn gói cước",
                position: "bottom-right",
                icon:"error",
                stack:1,
                loader:false
            })
  }else{
        $.ajax({
          url: "{{ url('goidangky/submitdangky') }}",
          type: "POST",
          data: $('#submitdangky').serialize()+"&id_user="+ $('#id_user').val()+"&data_id="+ $('#abc1').val()+"&time="+ $('#thoiGianSuDung').val()+"&total="+replaceCurrency($('#tongTienThanhToan')).val(),
          success: function( response ) {

          }
            });
  }
        });
        $(document).ready(function(){

       $("div[id^='abc_']").click(function(event) {
        event.preventDefault();
        id = event.currentTarget.attributes.id.value.replace('abc_', '');
        console.log(id);
        $('#abc1').val(id);
        console.log( $('#abc1').val())

        })

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
   ajax: {
    url: "{{ url('goidangky/data') }}",

  },
  columns: [
    { data: 'id', name: 'id',orderable:false},
    { data: 'created_at', name: 'created_at',orderable:false},
    { data: 'name', name: 'name',orderable:false},
  { data: null,
    "render": function(data,type,row) {
        return decialNumber(data['total'])}
    },
    { data: null,
    "render": function(data,type,row) { return "KH"+checkRangeValue(data["id"])}
  },
  { data: 'status', name: 'status',orderable:false},
  { data: null,
    "render": function(data,type,row) {
        return "Đăng ký gói cước " +data['time']  + " tháng " +'</br>'+data['account'] +' account'+'</br><span class="font-weight-bold">Hạn sử dụng: </span>'+data['Time']
    }
},
    ],

  });

  $('#data-table1').DataTable().on('order.dt search.dt', function () {
   $('#data-table1').DataTable().column(0).nodes().each(function (cell, i) {
     cell.innerHTML = i + 1;
   });
 }).draw();

        $(".submitPhieuNhap").click(function() {
                $("#exampleModal").addClass("hidden");
                $("#thanhToan").removeClass("hidden");
                console.log("hello");
            })

          // Datepicker
          $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
          });

          $("#goiCuoc1").click(function(){
            $("#goiCuocBS").removeClass('active');
          })
          $('.owl-carousel').owlCarousel({
            loop:false,
            margin:10,
            nav:false,
            responsive:{
              0:{
                  items:1
              },
              600:{
                  items:3
              },
              1000:{
                  items:3
              }
          }
          });

          var select =$('.owl-carousel .item');
          var tenGoiCuoc = $('.item .bg-light .tenGoiCuoc');
          var soTaiKhoan = $('.item .bg-light .soTaiKhoan');
          var hienTenGoiCuoc = $('.hienTenGoiCuoc');
          var thoiGianSuDung = $('.thoiGianSuDung');
          var tien = $('.tien');
          var tongTien = $('.tongTien');
          var tongTienThanhToan = $('.tongTienThanhToan');
          var date = new Date();

          var day = date.getDate();
          var month = date.getMonth() +1;
          var year = date.getFullYear();

          select.each(function(index,element){
            $(element).click(function(){
              select.each(function(){
                $(this).removeClass('bg-succsess');
                $(this).addClass('bg-info');
              })

              $(this).removeClass('bg-info');
              $(this).addClass('bg-success');

              //Hiện tên gói cước
              tenGoiCuoc.each(function(){
                $(this).removeClass('tx-succsess');
                $(this).addClass('tx-info');
              })
              tenGoiCuoc.eq(index).removeClass('tx-info');
              tenGoiCuoc.eq(index).addClass('tx-success');
              hienTenGoiCuoc.html(tenGoiCuoc.eq(index).text()) ;

              //Hiện số tài khoản
              soTaiKhoan.each(function(){
                $(this).removeClass('tx-succsess');
                $(this).addClass('tx-info');
              })
              soTaiKhoan.eq(index).removeClass('tx-info');
              soTaiKhoan.eq(index).addClass('tx-success');

              //Hiện ngày tháng năm
              var thangDangKy = tenGoiCuoc.eq(index).text().slice(83,85);
              let thoiGianTong = '';

              thoiGianTong = (month + Number(thangDangKy) <= 12 )? `${day}/${month + Number(thangDangKy)}/${year}`:
              ((month + Number(thangDangKy) - 12) <=12 ) ?  `${day}/${(month + Number(thangDangKy)-12)}/${year +1}` :
              `${day}/${(month + Number(thangDangKy)-24)}/${year + 2}`

              thoiGianSuDung.val(day +'/' + month + '/' + year + '-' + thoiGianTong);
              thoiGianSuDung.html(day +'/' + month + '/' + year + '-' + thoiGianTong);
              //Tổng tiền
              tongTien.html(tien.eq(index).text());
              tongTien.val(tien.eq(index).text());
              //Tổng thanh toán
              tongTienThanhToan.html(tien.eq(index).text());

            //   new AutoNumeric.multiple('.tongTien',
            //   {
            //         decimalPlaces: 0,
            //         modifyValueOnWheel: false,
    		// 	    unformatOnHover: false
            //   });
            //   new AutoNumeric.multiple('.tongTienThanhToan',
            //   {
            //         decimalPlaces: 0,
            //         modifyValueOnWheel: false,
    		// 	    unformatOnHover: false
            //   });
              //Số lượng đăng ký

              $('.soLuongDangKy').change(function(){
                let soLuongDangKy = $('.soLuongDangKy').val();
                //Tổng tiền
                tongTien.html(Number(tien.eq(index).text())*Number(soLuongDangKy));
                tongTien.val(Number(tien.eq(index).text())*Number(soLuongDangKy));
                //Tổng thanh toán
                tongTienThanhToan.html(Number(tien.eq(index).text())*Number(soLuongDangKy));
                tongTienThanhToan.val(Number(tien.eq(index).text())*Number(soLuongDangKy));

                // new AutoNumeric.multiple('.tongTien',
                // {
                //       decimalPlaces: 0,
                //       modifyValueOnWheel: false,
    			//       unformatOnHover: false
                // });
                // new AutoNumeric.multiple('.tongTienThanhToan',
                // {
                //       decimalPlaces: 0,
                //       modifyValueOnWheel: false,
    			//      unformatOnHover: false
                // });
                //   new AutoNumeric.multiple('.tien',
                // {
                //       decimalPlaces: 0,
                //       modifyValueOnWheel: false,
    			//      unformatOnHover: false
                // });
              })

            })
          });
        })

      </script>
@endsection

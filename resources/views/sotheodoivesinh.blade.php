@extends('default')
@section('title','Sổ theo dõi vệ sinh')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
      <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Sổ theo dõi vệ sinh</h4>
      <div class="d-flex">
        <div class="mg-r-10">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Thêm mới
          </button>

          <!-- Modal thêm mới--><!-- Modal chi tiết-->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Thêm mới phiếu theo dõi vệ sinh</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="">
                  <div class="modal-body">
                    <div class="shadow-base pd-10 mg-b-10">
                      <label for="start">Tháng Năm:</label>

                      <input type="month" id="start" name="start"
                      min="2018-03" value="2018-05">
                    </div>
                    <div class="tab-content">
                      <div id="inf" class="tab-pane active"><br>
                        <table class="table table-bordered tx-13 mg-b-0 bd">
                          <thead>
                            <tr>
                              <th  class="bg-primary" style="color: white;" >Ngày</th>
                              <th scope="col" class="bg-primary" style="color: white;" ></th>
                              <th scope="col" class="bg-primary" style="color: white;" >Lau nền</th>
                              <th scope="col" class="bg-primary" style="color: white;" >Lau tủ ra lẻ</th>
                              <th scope="col" class="bg-primary" style="color: white;" >Lau bàn, ghế</th>
                              <th scope="col" class="bg-primary" style="color: white;" >Lau quạt, máy điều hòa</th>
                              <th scope="col" class="bg-primary" style="color: white;" >Lau tủ, kệ</th>
                              <th scope="col" class="bg-primary" style="color: white;" >Lau quét tường, trần</th>
                              <th scope="col" class="bg-primary" style="color: white;" >LSắp xếp thuốc</th>
                              <th scope="col" class="bg-primary" style="color: white;" >Người thực hiện</th>
                              <th scope="col" class="bg-primary" style="color: white;" >Người kiểm tra</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td><input type="checkbox" onclick="CheckAll(this)"></td>
                              <td><input type="checkbox" onclick="CheckAll1(this)"></td>
                              <td><input type="checkbox" onclick="CheckAll2(this)"></td>
                              <td><input type="checkbox" onclick="CheckAll3(this)"></td>
                              <td><input type="checkbox" onclick="CheckAll4(this)"></td>
                              <td><input type="checkbox" onclick="CheckAll5(this)"></td>
                              <td><input type="checkbox" onclick="CheckAll6(this)"></td>
                            </tr>
                            <tr>
                              <td>02</td>
                              <td><input type="checkbox" ></td>
                              <td><input type="checkbox" name="ids[]"></td>
                              <td><input type="checkbox" name="id1s[]"></td>
                              <td><input type="checkbox" name="id2s[]"></td>
                              <td><input type="checkbox" name="id3s[]"></td>
                              <td><input type="checkbox" name="id4s[]"></td>
                              <td><input type="checkbox" name="id5s[]"></td>
                              <td><input type="checkbox" name="id6s[]"></td>
                              <td><input type="text"></td>
                              <td><input type="text"></td>
                            </tr>
                            <tr>
                              <td>01</td>
                              <td><input type="checkbox" ></td>
                              <td><input type="checkbox" name="ids[]"></td>
                              <td><input type="checkbox" name="id1s[]"></td>
                              <td><input type="checkbox" name="id2s[]"></td>
                              <td><input type="checkbox" name="id3s[]"></td>
                              <td><input type="checkbox" name="id4s[]"></td>
                              <td><input type="checkbox" name="id5s[]"></td>
                              <td><input type="checkbox" name="id6s[]"></td>
                              <td><input type="text"></td>
                              <td><input type="text"></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="mg-t-10 " style="text-align: end;">
                          <button type="button" class="btn btn-primary">Lưu</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                      </div>
                      <div id="history" class="tab-pane fade"><br>
                        <div class="row">
                          <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Từ ngày</label>
                            <input type="date" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Tới ngày</label>
                            <input type="date" class="form-control">
                          </div>
                          <div class="col-md-4">
                            <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control" placeholder="Tìm kiếm theo mã phiếu">
                          </div>
                          <div class="col-md-2 align-self-end">
                            <button class="btn btn-info">Tìm kiếm</button>
                          </div>
                          <div class="mg-t-20 col-md-12">
                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                              <thead>
                                <tr>
                                  <th scope="col" class="bg-primary" style="color: white;">#</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Mã phiếu</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Ngày thời gian</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Loại phiếu</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Giá trị</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Dư nợ</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>DCNCC000002</td>
                                  <td>25/03/2021 15:45</td>
                                  <td>Điều chỉnh công nợ nhà cung cấp</td>
                                  <td>111,111.00</td>
                                  <td>100,000.00</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="mg-t-10" style="text-align: end;">
                          <button class="btn btn-info">Xuất file excel</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="mg-r-10">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
            Thêm mới từ excel
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width:none;width:80em;vertical-align: top;">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Nhập từ file excel</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">File excel (Dung lượng không vượt quá 10mb)</label>
                        <input type="file" class="form-control">
                      </div>
                      <div class="col-md-12 mg-t-20">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#hopLe">DS hợp lệ</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#khongHopLe">DS không hợp lệ</a>
                          </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div id="hopLe" class="tab-pane active"><br>
                            <table class="table table-bordered tx-13 mg-b-0 bd">
                                    <thead>
                                      <tr>
                                        <th  class="bg-primary" style="color: white;" >Ngày</th>
                                        <th scope="col" class="bg-primary" style="color: white;" ></th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau nền</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau tủ ra lẻ</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau bàn, ghế</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau quạt, máy điều hòa</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau tủ, kệ</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau quét tường, trần</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >LSắp xếp thuốc</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Người thực hiện</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Người kiểm tra</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>

                          </div>
                          <div id="khongHopLe" class="tab-pane fade"><br>
                            <table class="table table-bordered tx-13 mg-b-0 bd">
                                    <thead>
                                      <tr>
                                        <th  class="bg-primary" style="color: white;" >Ngày</th>
                                        <th scope="col" class="bg-primary" style="color: white;" ></th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau nền</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau tủ ra lẻ</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau bàn, ghế</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau quạt, máy điều hòa</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau tủ, kệ</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau quét tường, trần</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >LSắp xếp thuốc</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Người thực hiện</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Người kiểm tra</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td><input type="checkbox" onclick="CheckAll(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll1(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll2(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll3(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll4(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll5(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll6(this)"></td>
                                      </tr>
                                      <tr>
                                        <td>01</td>
                                        <td><input type="checkbox" ></td>
                                        <td><input type="checkbox" name="ids[]"></td>
                                        <td><input type="checkbox" name="id1s[]"></td>
                                        <td><input type="checkbox" name="id2s[]"></td>
                                        <td><input type="checkbox" name="id3s[]"></td>
                                        <td><input type="checkbox" name="id4s[]"></td>
                                        <td><input type="checkbox" name="id5s[]"></td>
                                        <td><input type="checkbox" name="id6s[]"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                        <td>02</td>
                                        <td><input type="checkbox" ></td>
                                        <td><input type="checkbox" name="ids[]"></td>
                                        <td><input type="checkbox" name="id1s[]"></td>
                                        <td><input type="checkbox" name="id2s[]"></td>
                                        <td><input type="checkbox" name="id3s[]"></td>
                                        <td><input type="checkbox" name="id4s[]"></td>
                                        <td><input type="checkbox" name="id5s[]"></td>
                                        <td><input type="checkbox" name="id6s[]"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                      </tr>
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
          <button class="btn btn-danger">
            <a href="{{ asset('baocao')}}" style="color: #fff">
              <i class="fa fa-reply" aria-hidden="true"></i>
              Trở về
            </a></button>
          </div>
        </div>
      </div>
      <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
          <div class="row tx-gray-900">
            <div class="col-md-3 col-lg-2">
              <label for="">Từ ngày</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
              </div>
            </div>
            <div class="col-md-3 col-lg-2">
              <label for="">Tới ngày</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
              </div>
            </div>
            <div class="col-md-5">
              <label for="">Từ khoá tìm kiếm</label>
              <input type="text" class="form-control" placeholder="Tìm kiếm theo mã hoặc tên nhóm hàng hoá">
            </div>
            <div class="col-md-2 align-self-end">
              <button class="btn btn-info">Tìm kiếm</button>
            </div>
          </div>

          <div class="mg-t-20">
            <label for="" class="tx-bold tx-gray-800">Danh sách dữ liệu(0 bản ghi)</label>
            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
              <thead>
                <tr>
                  <th scope="col" class="bg-primary" style="color: white;">#</th>
                  <th scope="col" class="bg-primary" style="color: white;">Tháng</th>
                  <th scope="col" class="bg-primary" style="color: white;">Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>12/2000</td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        Thao tác
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- Button chi tiết -->
                        <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#chiTiet">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                          Chi tiết
                        </button>
                        <form>
                          <!-- <input type="button" value="in ra" onclick="window.print()">  -->
                          <!-- <button onclick="window.print()" >In ra</button> -->
                          <a class="dropdown-item" href="#" onclick="window.print()">
                            <i class="fa fa-print" aria-hidden="true"></i>
                            in ra
                          </a>
                        </form>
                        <a class="dropdown-item" href="#">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                          Xóa
                        </a>
                      </div>
                      <div>
                        <!-- Modal chi tiết-->
                        <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Phiếu theo dõi chi tiết nhiệt độ và độ ẩm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="">
                                <div class="modal-body">

                                  <!-- Tab panes -->
                                  <div id="inf" class="tab-pane active"><br>
                                  <table class="table table-bordered tx-13 mg-b-0 bd">
                                    <thead>
                                      <tr>
                                        <th  class="bg-primary" style="color: white;" >Ngày</th>
                                        <th scope="col" class="bg-primary" style="color: white;" ></th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau nền</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau tủ ra lẻ</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau bàn, ghế</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau quạt, máy điều hòa</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau tủ, kệ</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Lau quét tường, trần</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >LSắp xếp thuốc</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Người thực hiện</th>
                                        <th scope="col" class="bg-primary" style="color: white;" >Người kiểm tra</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td><input type="checkbox" onclick="CheckAll(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll1(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll2(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll3(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll4(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll5(this)"></td>
                                        <td><input type="checkbox" onclick="CheckAll6(this)"></td>
                                      </tr>
                                      <tr>
                                        <td>02</td>
                                        <td><input type="checkbox" ></td>
                                        <td><input type="checkbox" name="ids[]"></td>
                                        <td><input type="checkbox" name="id1s[]"></td>
                                        <td><input type="checkbox" name="id2s[]"></td>
                                        <td><input type="checkbox" name="id3s[]"></td>
                                        <td><input type="checkbox" name="id4s[]"></td>
                                        <td><input type="checkbox" name="id5s[]"></td>
                                        <td><input type="checkbox" name="id6s[]"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                        <td>01</td>
                                        <td><input type="checkbox" ></td>
                                        <td><input type="checkbox" name="ids[]"></td>
                                        <td><input type="checkbox" name="id1s[]"></td>
                                        <td><input type="checkbox" name="id2s[]"></td>
                                        <td><input type="checkbox" name="id3s[]"></td>
                                        <td><input type="checkbox" name="id4s[]"></td>
                                        <td><input type="checkbox" name="id5s[]"></td>
                                        <td><input type="checkbox" name="id6s[]"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                  <div class="mg-t-10" style="text-align: end;">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                      </div>
                                </div>

                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-end  mg-t-15">
            <button class="btn btn-danger" id="outTab2">
              <a href="{{ asset('baocao')}}" style="color: #fff">
                <i class="fa fa-reply" aria-hidden="true"></i>
                Trở về
              </a>
            </button>
          </div>
        </div><!-- row -->
      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <script>
      // Datepicker


      $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
      });
    </script>
@endsection

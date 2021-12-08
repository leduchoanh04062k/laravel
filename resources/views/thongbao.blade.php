@extends('default')
@section('title','thông báo')
@section('content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel pos-relative">
    <div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <div class="row">
          <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Thông báo</h4>
        </div>
      </div>
      <!-- Content -->
      <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
          <div class="row tx-gray-900">
            <div class="col-md-2">
              <label for="">Từ ngày</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
              </div>
            </div>
            <div class="col-md-2 ">
              <label for="">Tới ngày</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
              </div>
            </div>
            <div class="col-md-2">
              <label for="">Trạng thái</label>
              <select name="" id="" class="form-control">
                <option value="">Chưa đọc</option>
                <option value="">Đã đọc</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="">Tìm kiếm theo hàng hoá</label>
              <input type="text" class="form-control" placeholder="Tìm kiếm theo tiêu đề nội dung" list="search">
              <datalist id="search">
                <option value="HH">HH</option>
                <option value="HHH">HHH</option>
              </datalist>
            </div>
            <div class="col-md-1 align-self-end">
              <button class="btn btn-info">Tìm kiếm</button>
            </div>
          </div>
          <div class="mg-t-20">
            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
              <thead>
                <tr>
                  <th scope="col" class="bg-primary" style="color: white;">#</th>
                  <th scope="col" class="bg-primary" style="color: white;">Tiêu đề</th>
                  <th scope="col" class="bg-primary" style="color: white;">Nội dung</th>
                  <th scope="col" class="bg-primary" style="color: white;">Ngày tạo</th>
                  <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                  <th scope="col" class="bg-primary" style="color: white;"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>Mark</td>
                  <td>Otto</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div><!-- row -->
      </div><!-- br-pagebody -->
      <!--  -->
    </div>
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

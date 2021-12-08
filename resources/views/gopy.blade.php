@extends('default')
@section('title','Góp ý')
@section('content')
<div class="br-mainpanel pos-relative">
    <div >
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <div class="row">
          <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase" >Góp ý</h4>
        </div>
      </div>
      <!-- Content -->
      <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
          <h3 class="tx-gray-800 tx-center">Câu hỏi thường gặp</h3>
          <div class="mg-t-20 row pd-l-20 pd-r-20">
            <div class="col-md-3">
              <div class="card" >
                <div class="">
                  <h5 class="card-title bg-info tx-white pd-10">Thông tin nhân viên hỗ trợ</h5>
                  <div class="row pd-10 tx-center">
                    <div class="col-md-12 tx-center"><img src="./image/profile-default.png" class="wd-100" alt="avt"></div>
                    <div class="col-md-12 mg-t-10 tx-gray-800 tx-bold">
                      <label for="" >Họ tên:</label> Vũ Hoàng Anh
                    </div>
                    <div class="col-md-12 mg-t-10 tx-gray-800 tx-bold">
                      <label for="" >Điện thoại:</label> 0869.245.422
                    </div>
                    <div class="col-md-12 mg-t-10 tx-gray-800 tx-bold">
                      <label for="" >Email:</label> vhgah98@gmail.com
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card" >
                <div class="">
                  <h5 class="card-title bg-info tx-white pd-10">Góp ý</h5>
                  <div class="row pd-10 tx-center">
                    <div class="col-md-4 tx-center">
                      <label for="" class="tx-gray-800 tx-bold">Email của bạn</label>
                      <input type="email" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                      <input type="number" class="form-control">
                    </div>
                    <div class="col-md-2 align-self-end">
                      <button class="btn btn-info">Gửi</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <textarea name="editor" id="editor" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- row -->
      </div><!-- br-pagebody -->
      <!--  -->
    </div>

  </div><!-- br-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->


  <script src="../lib/ckeditor/ckeditor.js"></script>
  <script>
   CKEDITOR.replace('editor');

  </script>
@endsection

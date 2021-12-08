@extends('default')
@section('title','Hướng dẫn sử dụng')
@section('content')
<div class="br-mainpanel pos-relative">
    <div >
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <div class="row">
          <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase" >Hướng dẫn sử dụng</h4>
        </div>
      </div>
      <!-- Content -->
      <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
          <h3 class="tx-gray-800 tx-center">Câu hỏi thường gặp</h3>
          <div>
            <div id="accordion">
              <div class="card tx-gray-800">
                <div class="card-header bd-0" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link bd-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="box-shadow: none">
                      Bán hàng gặp lỗi "Có lỗi xảy ra trong quá trình xử lý" thì phải khắc phục thế nào ?
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="panel-collapse collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <p>Lỗi này xảy ra khi hệ thống cập nhật phiên bản mới, nhưng trình duyệt tại máy khách hàng vẫn cache phiên bản cũ.</p>
                    <p>Để khắc phục khách hàng cần xóa cache của trình duyệt đi, theo các bước sau:</p>
                    <h5>1.1. Trình duyệt Chrome</h5>

                    <p>Bước 1: Bật trình duyệt, đăng nhập vào hệ thống</p>
                    <p>Bước 2: Nhấn tổ hợp phím “Ctrl” “Alt” “Delete”</p>
                    <p>Bước 3: Xuất hiện hộp thoại “Xóa dữ liệu duyệt web”, Chọn vào mục “Cookie và các dữ liệu trang web khác”</p>
                    <p>Bước 4: Ấn nút “Xóa dữ liệu” để thực hiện xóa cache phiên bản cũ</p>

                    <h5>1.2. Trình duyệt FireFox</h5>
                    <p>Bước 1: Bật trình duyệt, đăng nhập vào hệ thống</p>
                    <p>Bước 2: Nhấn tổ hợp phím “Ctrl” “Alt” “Delete”</p>
                    <p>Bước 3: Xuất hiện hộp thoại “Xóa dữ liệu duyệt web”, Chọn vào mục “Cookies”</p>
                    <p>Bước 4: Ấn nút “Clear Now” để thực hiện xóa cache phiên bản cũ</p>

                    <h5>1.3. Trình duyệt Cốc Cốc</h5>
                    <p>Bước 1: Bật trình duyệt, đăng nhập vào hệ thống</p>
                    <p>Bước 2: Nhấn tổ hợp phím “Ctrl” “Alt” “Delete”</p>
                    <p>Bước 3: Xuất hiện hộp thoại “Xóa dữ liệu duyệt web”, Chọn vào mục “Cookie và các dữ liệu trang web khác”</p>
                    <p>Bước 4: Ấn nút “Xóa dữ liệu” để thực hiện xóa cache phiên bản cũ</p>

                    <p>Cám ơn quý khách, nếu có thắc mắc gì xin vui lòng gửi góp ý tại mục Liên hệ - Góp ý</p>
                  </div>
                </div>
              </div>
              <div class="card tx-gray-800">
                <div class="card-header bd-0" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed bd-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="box-shadow: none">
                      Làm sao biết hệ thống có liên thông dữ liệu lên hệ thống quốc gia ?
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <p>Hệ thống quản lý nhà thuốc MoriPhar là hệ thống đầu tiên kết nối lên hệ thống dữ liệu quốc gia .</p>
                    <p>Để kiểm tra xem nhà thuốc của quý khách đã kết nối với hệ thống quốc gia, quý khách vui lòng vào mục “Quản trị” - “Cài đặt” - “Cấu hình tài khoản liên thông” :</p>
                    <h5>1.1. Nếu muốn thay đổi tài khoản</h5>

                    <p>Bước 1: Nhập “Mã cơ sở” “Tài khoản” “Mật khẩu” của tài khoản mới</p>
                    <p>Bước 2: Nhấn nút “Lưu”</p>
                    <p>Bước 3: Xuất hiện hộp thoại, hệ thống sẽ đồng bộ dữ liệu hiện tại của quý khách lên tài khoản quốc gia</p>

                    <h5>1.2. Chưa có tài khoản</h5>
                    <p>Bước 1: Liên hệ với nhân viên hỗ trợ của MoriPhar để được tư vấn về thủ tục xin cấp tài khoản từ Sở y tế</p>
                    <p>Bước 2: Sau khi có được tài khoản . Nhập “Mã cơ sở” “Tài khoản” “Mật khẩu” của tài khoản mới</p>
                    <p>Bước 3: Nhấn nút “Lưu”</p>
                    <p>Bước 4: Xuất hiện hộp thoại, hệ thống sẽ đồng bộ dữ liệu hiện tại của quý khách lên tài khoản quốc gia</p>

                    <h5>1.3. Kiểm tra dữ liệu trên hệ thống quốc gia</h5>
                    <p>Bước 1: Bật trình duyệt, vào hệ thống quốc gia thông qua đường link https://duocquocgia.com.vn/</p>
                    <p>Bước 2: Đăng nhập bằng tài khoản quốc gia được cấp</p>
                    <p>Bước 3: Kiểm tra các Phiếu xuất nhập, hóa đơn đã được đồng bộ từ phần mềm quản lý nhà thuốc lên hệ thống quốc gia</p>
                    <p>Bước 4: Ấn nút “Xóa dữ liệu” để thực hiện xóa cache phiên bản cũ</p>

                    <p>Cám ơn quý khách, nếu có thắc mắc gì xin vui lòng gửi góp ý tại mục Liên hệ - Góp ý</p>
                  </div>
                </div>
              </div>
              <div class="card tx-gray-800">
                <div class="card-header bd-0" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed bd-0" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="box-shadow: none">
                      Làm thế nào reset dữ liệu, để nhập lại ?
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <p>Do hệ thống quản lý nhà thuốc được liên kết với hệ thống dữ liệu quốc gia.</p>
                    <p>Để reset dữ liệu nhà thuốc, quý khách vui lòng liên hệ với nhân viên hỗ trợ MoriPhar để yêu cầu được hỗ trợ, thông qua các kênh sau :</p>

                    <h5>1.1. Tổng đài hỗ trợ 0869 245 422</h5>
                    <h5>1.2. Nhân viên hỗ trợ trực tiếp, vào mục “Liên hệ - Góp ý” - “Thông tin liên hệ hỗ trợ”</h5>
                    <h5>1.3. Gửi email thông qua mục “Liên hệ - Góp ý”</h5>
                    <p>Cám ơn quý khách, nếu có thắc mắc gì xin vui lòng gửi góp ý tại mục Liên hệ - Góp ý</p>
                  </div>
                </div>
              </div>
              <div class="card tx-gray-800">
                <div class="card-header bd-0" >
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree" style="box-shadow: none">
                      Làm thế nào khi không quét được mã vạch ?
                    </button>
                  </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <p>Hiện tại trên thị trường có một số máy đọc mã vạch chỉ có thể đọc được mã vạch có độ dài ngắn từ 6-8 ký tự .</p>
                    <p>Để khắc phục khách hàng cần phải tạo mã vạch có độ dài phù hợp với máy đọc. Hiện tại hệ thống đã cung cấp tiện ích phục vụ quý khách hàng muốn chuyển đổi mã vạch cho phù hợp, quý khách vui lòng làm theo các bước sau:</p>

                    <h5>1.1. Đổi mã vạch bằng tiện ích</h5>
                    <p>Bước 1: Vào mục “Danh mục” - “Hàng hóa”</p>
                    <p>Bước 2: Ấn vào nút “Tiện ích”, chọn tiện ích “Chuyển đổi mã vạch”</p>
                    <p>Bước 3: Ấn lưu để hệ thống thực hiện chuyển đổi mã vạch của quý khách</p>
                    <h5>1.2. Lưu ý</h5>
                    <p>Sau khi chuyển đổi các tem in đã in từ trước với mã vạch cũ sẽ không sử dụng được nữa</p>
                    <p>Quý khách vui lòng in lại tem in mới với mã vạch mới</p>
                    <p>Quý khách vui lòng đọc kỹ trước khi thực hiện chuyển đổi mã vạch</p>
                    <p>Cám ơn quý khách, nếu có thắc mắc gì xin vui lòng gửi góp ý tại mục Liên hệ - Góp ý</p>
                  </div>
                </div>
              </div>
              <div class="card tx-gray-800">
                <div class="card-header bd-0" >
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree" style="box-shadow: none">
                      Làm thế nào để đổi mật khẩu tài khoản ?
                    </button>
                  </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <p>Để đổi mật khẩu tài khoản, quý khách có thể thực hiện theo hai cách sau :</p>

                    <h5>1.1. Đổi mật khẩu cho tài khoản đang đăng nhập</h5>
                    <p>Bước 1: Ấn vào tên tài khoản đang đăng nhập, ở góc bên trái trên cùng của màn hình</p>
                    <p>Bước 2: Chọn mục “Đổi mật khẩu”</p>
                    <p>Bước 3: Nhập mật khẩu hiện tại, và nhập mật khẩu mới, ấn lưu để thực hiện thay đổi</p>
                    <h5>1.2. Đổi mật khẩu cho tài khoản khác</h5>
                    <p>Bước 1: Vào mục “Quản trị” - “Người dùng”</p>
                    <p>Bước 2: Tìm kiếm tài khoản cần đổi mật khẩu</p>
                    <p>Bước 3: Chọn “Thao tác” - “Đổi mật khẩu”</p>
                    <p>Bước 4: Nhập mật khẩu mới, ấn lưu để thực hiện thay đổi</p>

                    <h5>1.3. Các trường hợp khác - Vui lòng liên hệ với nhân viên hỗ trợ</h5>
                    <p>Cám ơn quý khách, nếu có thắc mắc gì xin vui lòng gửi góp ý tại mục Liên hệ - Góp ý</p>
                  </div>
                </div>
              </div>
              <div class="card tx-gray-800">
                <div class="card-header bd-0" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree" style="box-shadow: none">
                      Làm thế nào khi có thắc mắc cần được hỗ trợ, yêu cầu về các chức năng mới ?
                    </button>
                  </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <p>Để được giải đáp thắc mắc và hỗ trợ các vấn đề phát sinh, quý khách vui lòng liên hệ với nhân viên hỗ trợ MoriPhar thông qua các kênh sau :</p>

                    <h5>1.1. Tổng đài hỗ trợ 0869 245 422</h5>
                    <h5>1.2. Nhân viên hỗ trợ trực tiếp, vào mục “Liên hệ - Góp ý” - “Thông tin liên hệ hỗ trợ”</h5>
                    <h5>1.3. Gửi email thông qua mục “Liên hệ - Góp ý”</h5>
                    <p>Cám ơn quý khách, nếu có thắc mắc gì xin vui lòng gửi góp ý tại mục Liên hệ - Góp ý</p>
                  </div>
                </div>
              </div>
              <div class="card tx-gray-800">
                <div class="card-header bd-0" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree" style="box-shadow: none">
                      Làm thế nào để cập nhật nhiệt độ - độ ẩm ?
                    </button>
                  </h5>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <p>Theo quy định nhà thuốc cập nhật nhiệt độ - độ ấm ít nhât một ngày 2 lần vào buổi sáng và buổi chiều. Để cập nhật nhiệt độ - độ ẩm, quý khách có thể thực hiện theo hai cách sau :</p>

                    <h5>1.1. Cập nhật từng buổi</h5>
                    <p>Bước 1: Ấn vào biểu tượng nhiệt độ - độ ẩm ở thanh tiện ích trên đầu của màn hình</p>
                    <p>Bước 2: Nhập nhiệt độ - độ ẩm hiện tại của nhà thuốc.</p>
                    <p>Bước 3: Ấn lưu để thực hiện lưu dữ liệu</p>
                    <p>Lưu ý: Nếu thời gian lưu từ 0h sáng đến 12h trưa thì hệ thống sẽ lưu dữ liệu nhiệt độ - độ ẩm của nhà thuốc vào khung giờ 9h sáng trong báo cáo, còn thời gian lưu từ 12h01 trưa đến 23h59 tối thì hệ thống sẽ lưu dữ liệu nhiệt độ - độ ẩm của nhà thuốc vào khung giờ 15h chiều trong báo cáo</p>
                    <h5>1.2. Cập nhật theo tháng</h5>
                    <p>Bước 1: Vào mục “Báo cáo” - “Sổ theo dõi nhiệt độ - độ ẩm”</p>
                    <p>Bước 2: Ấn vào nút “Thêm mới”</p>
                    <p>Bước 3: Chọn tháng cần tạo sổ theo dõi nhiệt độ - độ ẩm</p>
                    <p>Bước 4: Nhập thông tin nhiệt độ - độ ẩm trong tháng đấy</p>
                    <p>Bước 5: Ấn lưu để thực hiện lưu dữ liệu</p>
                    <h5>1.3. Cập nhật từ file excel của máy Elitech</h5>
                    <p>Bước 1: Vào mục “Báo cáo” - “Sổ theo dõi nhiệt độ - độ ẩm”</p>
                    <p>Bước 2: Ấn vào nút “Thêm mới từ file excel” - “Thêm mới từ file Elitech excel”</p>
                    <p>Bước 3: Chọn file được xuất ra từ máy Elitech</p>
                    <p>Bước 4: Ấn lưu để thực hiện lưu dữ liệu</p>
                    <h5>1.4. Cập nhật từ file excel mẫu của hệ thống</h5>
                    <p>Bước 1: Vào mục “Báo cáo” - “Sổ theo dõi nhiệt độ - độ ẩm”</p>
                    <p>Bước 2: Ấn vào nút “Thêm mới từ file excel” - “Thêm mới từ file excel”</p>
                    <p>Bước 3: Tải file mẫu từ hệ thống, điền thông tin theo mẫu</p>
                    <p>Bước 4: Upload file lên hệ thống</p>
                    <p>Bước 5: Ấn lưu để thực hiện lưu dữ liệu</p>

                    <p>Cám ơn quý khách, nếu có thắc mắc gì xin vui lòng gửi góp ý tại mục Liên hệ - Góp ý</p>
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
  <script>
    // Datepicker
    $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
      });

  </script>
@endsection

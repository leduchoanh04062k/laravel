<style>
 .iconOverviewVN{
  content: url('{{ url('/image/famfamfam-flags.png') }}');
  height: 0.86em;
  padding-right: 3px;
}
.iconOverviewEnglish{
  content: url('{{ url('/image/tong-lanh-su-quan-lien-hiep-vuong-quoc-anh-va-bac-ailen.png') }}');
  height: 0.86em;
  padding-left: 4px;
}
</style>
<div class="br-header-right" style="background-color:white;">
  <nav class="nav">
    <div class="dropdown">
      <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
        <div class="pd-2 mg-t-10">
          <em ng-class="vm.currentLanguage.icon" class="iconOverviewVN"></em>
          <i class="mg-l-3 fa fa-angle-down" aria-hidden="true"></i>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-header wd-200 pd-0" style="margin-top:4px">
        <ul class="list-unstyled user-profile-nav">
          <li><a href=""><em class="iconOverviewEnglish"></em><strong class="pd-5">English</strong></a></li>
        </ul>
      </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
    <div class="dropdown" >
      <a href="" class="nav-link pd-x-0 pos-relative" data-toggle="dropdown">
        <div class="pd-5 mg-t-7">
          <i class="fa fa-bell font-weight-bold" aria-hidden="true"></i>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
        <div class="d-flex align-items-center justify-content-between pd-y-15 pd-x-20 bd-b bd-gray-200 mg-t-2 bg-primary">
          <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0 text-white">Có 0 thông báo chưa đọc</label>
        </div><!-- d-flex -->

        <div class="media-list">
          <!-- loop starts here -->
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <em class="fa fa-info-circle mg-t-5" ng-class="{'font-green':notification.trangThai== 0}"></em>
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Công văn thu hồi thuốc không đạt chất lượng, thuốc không rõ xuất xứ</strong></p>
                <span class="tx-12"><i class="tx-13">03, 2017 8:45am</i></span> <span class="tx-13" style="float: right;">Sở y tế </span>
              </div>
            </div><!-- media -->
          </a>
          <!-- loop ends here -->
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <em class="fa fa-info-circle mg-t-5" ng-class="{'font-green':notification.trangThai== 0}"></em>
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Tăng cường biện pháp cấp bách phòng chống dịch Covid 19</strong></p>
                <span class="tx-12"><i class="tx-13">03, 2017 8:45am</i></span> <span class="tx-13" style="float: right;">Sở y tế </span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <em class="fa fa-info-circle mg-t-5" ng-class="{'font-green':notification.trangThai== 0}"></em>
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Công văn thu hồi thuốc không đạt chất lượng, thuốc không rõ xuất xứ</strong></p>
                <span class="tx-12"><i class="tx-13">03, 2017 8:45am</i></span> <span class="tx-13" style="float: right;">Sở y tế </span>
              </div>
            </div><!-- media -->
          </a>
          <div class="pd-y-10 tx-center bd-t bg-primary">
            <a href="" class="tx-13 text-white">Xem tất cả thông báo</a>
          </div>
        </div><!-- media-list -->
      </div><!-- dropdown-menu -->
    </div><!-- dropdown -->
    <div class="dropdown">
      <a href="" class="nav-link" data-toggle="dropdown">
        <div class="pd-5 mg-t-6">
          <i class="fas fa-inbox"></i>
          <span class="logged-name hidden-md-down" style="font: size 102%;">Tiện ích</span>
          <i class="fa fa-angle-down mg-l-0" style="font-size:104%" aria-hidden="true"></i>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-header wd-200 pd-0" style="margin-top:5px">
        <ul class="list-unstyled user-profile-nav">
          <li><a href=""><i class="far fa-address-book pd-5"></i><strong>Hướng dẫn sử dụng</strong></a></li>
          <li><a href=""><i class="far fa-envelope pd-5"></i><strong>Hỗ trợ</strong></a></li>
          <li><a href=""><i class="fas fa-desktop pd-5"></i><strong>Tải công cụ hỗ trợ từ xa</strong></a></li>
          <li><a href=""><i class="fa fa-refresh pd-5"></i><strong>Làm mới dữ liệu</strong></a></li>
        </ul>
      </div><!-- dropdown-menu -->
    </div><!-- dropdown -->

    <div class="dropdown">
      <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
        <span class="logged-name hidden-md-down mg-t-10 font-weight-bold" style="font-size:106%">{{ Auth::user()->name }}</span>
        <img src="./image/profile-default.png" class="wd-32 rounded-circle" alt="">
        <span class="square-10 bg-success"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-header wd-200">
        <ul class="list-unstyled user-profile-nav">
          <li><a href=""><i class="icon ion-ios-person"></i>Lịch sử đăng nhập</a></li>
          <li>
            <!-- Button trigger modal -->
            <a href="#" data-toggle="modal" data-target="#doiMatKhauLayOut" class="modalMatKhau">
              <i class="icon ion-ios-gear"></i>Đổi mật khẩu
            </a>
          </li>
          <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="icon ion-power"></i>
            {{ __('Đăng xuất') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div><!-- dropdown-menu -->
  </div><!-- dropdown -->
</nav>


</div><!-- br-header-right -->


<div id="activemenu" class="br-sideleft-menu">
    @can('Overview')
    <a href="{{asset('tongquan')}}" class="br-menu-link {{ (request()->is('tongquan')) ? 'active' : '' }}">
        <div class="br-menu-item">
            <em class="iconOverview"></em>
            <span class="menu-item-label d-lg-none">Tổng quan</span>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    @endcan
    @can('Seller')
    <a href="{{asset('banhang')}}" class="br-menu-link {{ (request()->is('banhang')) ? 'active' : '' }}">
        <div class="br-menu-item">
            <em class="iconSell"></em>
            <span class="menu-item-label d-lg-none">Bán hàng</span>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    @endcan
    @can('Invoice')
    <a href="{{asset('hoadon')}}" class="br-menu-link {{ (request()->is('hoadon')) ? 'active' : '' }}">
        <div class="br-menu-item">
            <em class="iconInvoice"></em>
            <span class="menu-item-label d-lg-none">Quản lý hóa đơn</span>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    @endcan
    @can('Seller')
    <a href="{{asset('khachhang')}}" class="br-menu-link {{ (request()->is('khachhang')) ? 'active' : '' }}">
        <div class="br-menu-item">
            <em class="customer"></em>
            <span class="menu-item-label d-lg-none">Khách hàng</span>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    @endcan

    @role('Seller')
    <a href="#" class="br-menu-link {{ (request()->is(array(
      'khachhangtralai',
      ))) ? 'show-sub active' : '' }}">
        <div class="br-menu-item">
            <em class="iconWarehouse"></em>
            <span class="menu-item-label d-lg-none">Quản lý kho</span>
            <i class="menu-item-arrow fa fa-angle-down d-lg-none"></i>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{asset('khachhangtralai')}}"
                class="nav-link {{ (request()->is('khachhangtralai')) ? 'active' : '' }}">Khách hàng trả lại</a></li>
    </ul>
    @else
    @can('Inventory')
    <a href="#" class="br-menu-link {{ (request()->is(array(
      'nhaptunhacungcap',
      'nhapton',
      'khachhangtralai',
      'xuattranhacungcap',
      'xuathuy',
      'kiemkho',
      'tonkho',
      ))) ? 'show-sub active' : '' }}">
        <div class="br-menu-item">
            <em class="iconWarehouse"></em>
            <span class="menu-item-label d-lg-none">Quản lý kho</span>
            <i class="menu-item-arrow fa fa-angle-down d-lg-none"></i>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{asset('nhaptunhacungcap')}}"
                class="nav-link {{ (request()->is('nhaptunhacungcap')) ? 'active' : '' }}">Nhập từ nhà cung cấp</a></li>
        <li class="nav-item"><a href="{{asset('nhapton')}}"
                class="nav-link {{ (request()->is('nhapton')) ? 'active' : '' }}">Nhập tồn</a></li>
        <li class="nav-item"><a href="{{asset('khachhangtralai')}}"
                class="nav-link {{ (request()->is('khachhangtralai')) ? 'active' : '' }}">Khách hàng trả lại</a></li>
        <li class="nav-item"><a href="{{asset('xuattranhacungcap')}}"
                class="nav-link {{ (request()->is('xuattranhacungcap')) ? 'active' : '' }}">Xuất trả nhà cung cấp</a>
        </li>
        <li class="nav-item"><a href="{{asset('xuathuy')}}"
                class="nav-link {{ (request()->is('xuathuy')) ? 'active' : '' }}">Xuất hủy</a></li>
        <li class="nav-item"><a href="{{asset('kiemkho')}}"
                class="nav-link {{ (request()->is('kiemkho')) ? 'active' : '' }}">Kiểm kho</a></li>
        <li class="nav-item"><a href="{{asset('tonkho')}}"
                class="nav-link {{ (request()->is('tonkho')) ? 'active' : '' }}">Tồn kho</a></li>
    </ul>
    @endcan
    @endrole

    @can('Partner')
    <a href="#" class="br-menu-link {{ (request()->is(array(
      'bacsi',
      'nhacungcap',
      ))) ? 'show-sub active' : '' }}">
        <div class="br-menu-item">
            <em class="iconPartner"></em>
            <span class="menu-item-label d-lg-none">Đối tác</span>
            <i class="menu-item-arrow fa fa-angle-down d-lg-none"></i>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{asset('bacsi')}}"
                class="nav-link {{ (request()->is('bacsi')) ? 'active' : '' }}">Bác sĩ</a></li>
        <li class="nav-item"><a href="{{asset('nhacungcap')}}"
                class="nav-link {{ (request()->is('nhacungcap')) ? 'active' : '' }}">Nhà cung cấp</a></li>
    </ul>
    @endcan
    @can('Warehouse')
    <a href="{{asset('soquy')}}" class="br-menu-link {{ (request()->is('soquy')) ? 'active' : '' }}">
        <div class="br-menu-item">
            <em class="iconFund"></em>
            <span class="menu-item-label d-lg-none">Sổ quỹ</span>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    @endcan
    @can('Category')
    <a href="#" class="br-menu-link {{ (request()->is(array(
      'nhomkhachhang',
      'nhomnhacungcap',
      'nhomhanghoa',
      'hanghoa',
      'banggia',
      'donthuocmau',
      'danhmucthuoc',
      'calamviec',
      ))) ? 'show-sub active' : '' }}">
        <div class="br-menu-item">
            <em class="iconCategory"></em>
            <span class="menu-item-label d-lg-none">Danh mục</span>
            <i class="menu-item-arrow fa fa-angle-down d-lg-none"></i>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ asset('nhomkhachhang') }}"
                class="nav-link {{ (request()->is('nhomkhachhang')) ? 'active' : '' }}">Nhóm khách hàng</a></li>
        <li class="nav-item"><a href="{{ asset('nhomnhacungcap') }}"
                class="nav-link {{ (request()->is('nhomnhacungcap')) ? 'active' : '' }}">Nhóm nhà cung cấp</a></li>
        <li class="nav-item"><a href="{{ route('nhomhanghoa') }}"
                class="nav-link {{ (request()->is('nhomhanghoa')) ? 'active' : '' }}">Nhóm hàng hóa</a></li>
        <li class="nav-item"><a href="{{ route('hanghoa') }}"
                class="nav-link {{ (request()->is('hanghoa')) ? 'active' : '' }}">Hàng hóa</a></li>
        <li class="nav-item"><a href="{{ route('banggia') }}"
                class="nav-link {{ (request()->is('banggia')) ? 'active' : '' }}">Bảng giá</a></li>
        <li class="nav-item"><a href="{{ route('donthuocmau') }}"
                class="nav-link {{ (request()->is('donthuocmau')) ? 'active' : '' }}">Đơn thuốc mẫu</a></li>
        <li class="nav-item"><a href="{{ route('danhmucthuoc') }}"
                class="nav-link {{ (request()->is('danhmucthuoc')) ? 'active' : '' }}">Danh mục thuốc</a></li>
        <li class="nav-item"><a href="{{ route('calamviec') }}"
                class="nav-link {{ (request()->is('calamviec')) ? 'active' : '' }}">Ca làm việc</a></li>
    </ul>
    @endcan
    @can('Report')
    <a href="{{asset('baocao')}}" class="br-menu-link {{ (request()->is('baocao')) ? 'active' : '' }}">
        <div class="br-menu-item">
            <em class="iconReport"></em>
            <span class="menu-item-label d-lg-none">Báo cáo</span>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    @endcan
    @can('Administration')
    <a href="#" class="br-menu-link {{ (request()->is(array(
      'goidangky',
      'vaitro',
      'nguoidung',
      'lichsuthaotac',
      'caidat',
      ))) ? 'show-sub active' : '' }}">
        <div class="br-menu-item">
            <em class="iconAdministrator"></em>
            <span class="menu-item-label d-lg-none">Quản trị</span>
            <i class="menu-item-arrow fa fa-angle-down d-lg-none"></i>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{asset('goidangky')}}"
                class="nav-link {{ (request()->is('goidangky')) ? 'active' : '' }}">Nạp tiền - Đăng ký gói cước</a></li>
        <li class="nav-item"><a href="{{asset('vaitro')}}"
                class="nav-link {{ (request()->is('vaitro')) ? 'active' : '' }}">Vai trò</a></li>
        <li class="nav-item"><a href="{{asset('nguoidung')}}"
                class="nav-link {{ (request()->is('nguoidung')) ? 'active' : '' }}">Người dùng</a></li>
        <li class="nav-item"><a href="{{ asset('lichsuthaotac') }}"
                class="nav-link {{ (request()->is('lichsuthaotac')) ? 'active' : '' }}">Lịch sử thao tác</a></li>
        <li class="nav-item"><a href="{{ asset('caidat') }}"
                class="nav-link {{ (request()->is('caidat')) ? 'active' : '' }}">Cài đặt</a></li>
    </ul>
    @endcan
    <a href="#" class="br-menu-link {{ (request()->is(array(
      'thongbao',
      'huongdansudung',
      'gopy',
      ))) ? 'show-sub active' : '' }}">
        <div class="br-menu-item">
            <em class="iconUtilities"></em>
            <span class="menu-item-label d-lg-none">Tiện ích</span>
            <i class="menu-item-arrow fa fa-angle-down d-lg-none"></i>
        </div><!-- menu-item -->
    </a><!-- br-menu-link -->
    <ul class="br-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ asset('thongbao') }}"
                class="nav-link {{ (request()->is('thongbao')) ? 'active' : '' }}">Thông báo</a></li>
        <li class="nav-item"><a href="{{ asset('huongdansudung') }}"
                class="nav-link {{ (request()->is('huongdansudung')) ? 'active' : '' }}">Hướng dẫn sử dụng</a></li>
        <li class="nav-item"><a href="{{ asset('gopy') }}"
                class="nav-link {{ (request()->is('gopy')) ? 'active' : '' }}">Góp ý</a></li>
    </ul>
</div><!-- br-sideleft-menu -->
<style type="text/css">
    .br-menu-item {
        padding-left: 0 !important;
        margin: 0.4em !important;
    }

    .menu-item-label {
        padding-left: 0.7em;
    }

    .iconOverview {
        content: url('{{ url('/image/overview.svg') }}');
        height: 2.2em;
    }

    .iconSell {
        content: url('{{ url('/image/sell.svg') }}');
        height: 2.5em;
    }

    .iconInvoice {
        content: url('{{ url('/image/invoice.svg') }}');
        height: 2.3em;
    }

    .customer {
        content: url('{{ url('/image/kyc.png') }}');
        height: 2.2em;
    }

    .iconWarehouse {
        content: url('{{ url('/image/warehouse.svg') }}');
        height: 2.2em;
    }

    .iconPartner {
        content: url('{{ url('/image/category.svg') }}');
        height: 2.3em;
    }

    .iconFund {
        content: url('{{ url('/image/fund.svg') }}');
        height: 2.4em;
    }

    .iconCategory {
        content: url('{{ url('/image/category.svg') }}');
        height: 2.3em;
    }

    .iconReport {
        content: url('{{ url('/image/report.svg') }}');
        height: 2.5em;
    }

    .iconAdministrator {
        content: url('{{ url('/image/tienich.svg') }}');
        height: 2.3em;
    }

    .iconUtilities {
        content: url('{{ url('/image/quantrixin.svg') }}');
        height: 2.4em;
    }

    .menu-item-label {
        font-size: 106%;
    }

    .br-menu-sub .nav-item {
        font-size: 115%;
    }
</style>

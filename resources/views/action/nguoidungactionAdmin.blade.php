<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-cog" aria-hidden="true"></i>
    Thao tác
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow:hidden">
    <!-- Button chi tiết -->
    <a onClick="editFunc({{ $id }} , 0)" href="#" class="dropdown-item" data-toggle="modal" data-target="#chiTiet"><i class="fas fa-user-edit"></i> Sửa
    </a>
    <a class="dropdown-item" onClick="editFunc({{ $id }} , 1)" data-toggle="modal" data-target="#doiMatKhauAction" href="#">
      <i class="fas fa-unlock-alt"></i> Đổi mật khẩu
    </a>
  </div>

</div>
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-cog" aria-hidden="true"></i>
  Thao tác
  </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: hidden;">

  <button type="button" onClick="editFunc({{ $id }})" class="btn btn-primary dropdown-item" data-toggle="modal"
  data-target="#chiTiet">
    <i class='far fa-edit'></i> Thông tin hàng hóa
  </button>
  <button onClick="editFunc({{ $id }} , 1)" class="dropdown-item" href="#" data-toggle="modal" data-target="#chiTiet" id="theKho">   <i class="fa fa-list" aria-hidden="true"></i> Thẻ kho</button>
  <button class="dropdown-item" href="#" data-toggle="modal" data-target="#barCodeModal" onClick="barCode({{ $id }})" >
    <i class="fa fa-barcode" aria-hidden="true"></i> In mã vạch
  </button>
  <button type="button" class="btn btn-primary dropdown-item" onClick="changeFunc({{ $id }})">
    <i class="fa fa-times" aria-hidden="true"></i> Ngừng hoạt động
  </button>
</div>

</div>
</div>
<script>
  $('.toggle').toggles({
    off: true,
    height: 26
  });
</script>

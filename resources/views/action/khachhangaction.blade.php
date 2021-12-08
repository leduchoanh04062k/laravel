<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog" aria-hidden="true"></i>
        Thao tác
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: hidden;">
        <!-- Button chi tiết -->
        <button type="button" onClick="editFunc({{ $id }})" href="javascript:void(0)"
            class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#chiTiet">
            <i class='far fa-edit'></i>
            Chi tiết
        </button>
        <!-- Button thanh toán -->
        <button type="button" onClick="editFuncdebt({{ $id }})" class="btn btn-primary dropdown-item"
            data-toggle="modal" data-target="#thanhToan">
            <i class="far fa-money-bill-alt"></i>
            Thanh toán
        </button>
        <!-- Button công nơj -->
        <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#congNo">
            <i class="far fa-money-bill-alt"></i>
            Điều chỉnh công nợ
        </button>
        <button type="button" class="btn btn-primary dropdown-item" onClick="changeFunc({{ $id }})">
            <i class="fa fa-times" aria-hidden="true"></i>
            Ngừng hoạt động
        </button>
        <button type="button" class="btn btn-primary dropdown-item" id="delete1" onClick="deleteFunc({{ $id }})">
            <i class="fas fa-trash-alt"></i>
            Xoá
        </button>
    </div>
</div>

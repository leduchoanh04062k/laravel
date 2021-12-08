<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog" aria-hidden="true"></i>
        Thao tác
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: hidden;">
        <button type="button" class="btn btn-primary dropdown-item">
            <em class="fa fa-print"></em>
            In
        </button>

        <!-- Button chi tiết -->
        <button type="button" onClick="editFunc({{ $id }})" class="btn btn-primary dropdown-item" data-toggle="modal"
            data-target="#chiTiet">
            <em class="fa fa-eye"></em>
            Chi tiết
        </button>

        <button type="button" class="dropdown-item btn-remove" onClick="deleteFunc({{ $id }})">
            <em class="fa fa-ban"></em>
            Hủy
        </button>
    </div>
</div>

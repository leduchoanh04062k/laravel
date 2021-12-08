<div class="dropdown">
    <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" type="button">
        <i aria-hidden="true" class="fa fa-cog">
        </i>
        Thao tác
    </button>
    <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="overflow: hidden;">
        <button class="btn btn-primary dropdown-item inTab3" data-toggle="modal" onclick="editFunc({{ $id }})" type="button">
            <i class="far fa-edit">
            </i>
            Chi tiết
        </button>
        <button class="btn btn-primary dropdown-item" onclick="unChangeFunc({{ $id }})" type="button">
            <i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>
            Hoạt động
        </button>
        <a class="dropdown-item" href="#" id="in">
            <i aria-hidden="true" class="fa fa-print">
            </i>
            In
        </a>
        <a class="dropdown-item" href="#">
            <i aria-hidden="true" class="fa fa-file-excel-o">
            </i>
            Xuất file excel
        </a>
    </div>
</div>
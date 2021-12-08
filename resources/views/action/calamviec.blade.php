<div class="dropdown">
    <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" type="button">
        <i aria-hidden="true" class="fa fa-cog">
        </i>
        Thao tác
    </button>
    <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="overflow:hidden">
        <!-- Button chi tiết -->
        <button class="btn btn-primary dropdown-item" data-target="#chiTiet" data-toggle="modal" onclick="editF({{ $id }})" type="button">
            <i class="far fa-edit">
            </i>
            Chi tiết
        </button>
        <button class="btn btn-primary dropdown-item" id="changeF" onclick="changeFunc({{ $id }})" type="button">
            <i aria-hidden="true" class="fa fa-times">
            </i>
            Ngừng hoạt động
        </button>
        <button class="btn btn-primary dropdown-item" id="delete1" onclick="deleteFunc({{ $id }})" type="button">
            <i class="fas fa-trash-alt">
            </i>
            Xoá
        </button>
    </div>
    <div>
    </div>
</div>

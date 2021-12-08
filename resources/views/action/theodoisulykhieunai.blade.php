
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog" aria-hidden="true"></i>
                Thao tác
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: hidden;">
                <!-- Button chi tiết -->
                <button type="button" onClick="editFunc({{ $id }})" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#chiTietKhieuNai">
                    <i class='far fa-edit'></i>
                  Cập nhật thông báo
                </button>

                <button type="button" class="dropdown-item btn-remove" onClick="deleteFunc({{ $id }})">
                <i class="fas fa-trash-alt"></i>
                    Xoá
                </button>
            </div>
          </div>

<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog" aria-hidden="true"></i>
        Thao tác
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: hidden;">
        <!-- Button chi tiết -->
        <button type="button" onClick="detailFunc({{ $id }})" href="javascript:void(0)"
            class="btn btn-primary dropdown-item pd-l-15" data-toggle="modal" data-target="#chiTiet">
            <i class='far fa-edit'></i>
            Chi tiết phiếu
        </button>
        <!-- Button dropdown2 -->
        <button type="button" onClick="duplicatedFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15 nutThaoTacSaoChep">
            <i class="fa fa-files-o" aria-hidden="true"></i>
            Sao chép phiếu
        </button>
        <!-- Button dropdown3 -->
        <button type="button" onClick="printFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15" id="in">
            <i class="fa fa-print" aria-hidden="true"></i>
            In phiếu
        </button>
        <!-- Button dropdown4 -->
        <button type="button" class="btn btn-primary dropdown-item pd-l-15">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
            Xuất excel
        </button>
        <button type="button" class="btn btn-primary dropdown-item pd-l-15" onClick="changeFunc({{ $id }})">
            <i class="fa fa-times" aria-hidden="true"></i>
            Hủy phiếu</button>
    </div>
    <div>
    </div>
    <script>
        $(document).ready(function() {
            $("#nutThaoTacSua").click(function() {
                $("#tab1").addClass("hidden");
                $("#thaoTacSua").removeClass("hidden");
            })
            //Thao tâc sao chep
            $(".nutThaoTacSaoChep").click(function() {
                $(".tab1").addClass("hidden");
                $(".tab2").removeClass("hidden");
            });
            //in phiếu
        })

    </script>

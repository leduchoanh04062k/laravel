<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog" aria-hidden="true"></i>
        Thao tác
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"  style="overflow: hidden;">
        <!-- Button dropdown1 -->
        <button type="button" onClick = "detailFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15" data-toggle="modal"
            data-target="#dropdown1">
            <i class="fa fa-eye" aria-hidden="true"></i>
            Chi tiết phiếu
        </button>
        <!-- Button dropdown2 -->
        <button type="button"  onClick = "editFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15 nutThaoTacSua">
            <i class='far fa-edit'></i>
            Sửa phiếu
        </button>
        <!-- Button dropdown3 -->
        <button type="button" onClick = "duplicatedFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15 nutThaoTacSaoChep" >
            <i class="fa fa-files-o" aria-hidden="true"></i>
            Sao chép phiếu
        </button>
        <button type="button" onClick="printFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15" id="in">
            <i class="fa fa-print" aria-hidden="true"></i>
            In phiếu
        </button>
        <button type="button" class="btn btn-primary dropdown-item pd-l-15" onClick="changeFunc({{ $id }})">
            <i class="fa fa-times" aria-hidden="true"></i>
            Hủy phiếu
        </button>
    </div>
</div>
    <script>
        $(document).ready(function() {
            $(".nutThaoTacSua").click(function() {
                $(".tab1").addClass("hidden");
                $(".tab2").removeClass("hidden");
            })
            //Thao tâc sao chep
            $(".nutThaoTacSaoChep").click(function() {
                $(".tab1").addClass("hidden");
                $(".tab2").removeClass("hidden");
            });
            //in phiếu
            $("#in").click(function() {
                $(".inTable").printThis({
                    importCSS: true, // import parent page css
                    importStyle: true, // import style tags
                    removeInline: false, // remove inline styles from print elements
                    loadCSS: [
                        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
                    ]
                });
            })
        })

    </script>

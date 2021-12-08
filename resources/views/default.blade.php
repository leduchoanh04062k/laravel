<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="MoriPhar">
    <meta name="twitter:description" content="Phần mềm quản lý nhà thuốc">
    <meta name="twitter:image" content="https://moriphar.com/image/logo.jpg">

    <!-- Facebook -->
    <meta property="og:url" content="https://moriphar.com/">
    <meta property="og:title" content="MoriPhar">
    <meta property="og:description" content="Phần mềm quản lý nhà thuốc">

    <meta property="og:image" content="https://moriphar.com/image/logo.jpg">
    <meta property="og:image:secure_url" content="https://moriphar.com/image/logo.jpg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="200">

    <!-- Meta -->
    <meta name="description" content="Phần mềm quản lý nhà thuốc">
    <meta name="author" content="MoriPhar">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../lib/Ionicons/css/ionicons.css">
    <link rel="stylesheet" href="../lib/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="../lib/jquery-switchbutton/jquery.switchButton.css">
    <link rel="stylesheet" href="../lib/highlightjs/github.css">


    <link rel="stylesheet" href="../lib/jquery-toast-plugin-master/src/jquery.toast.css">
    <link rel="stylesheet" href="../lib/hoanganh/toastr.min.css">
    <link rel="stylesheet" href="../lib/jquery-toggles/toggles-full.css">
    <link rel="stylesheet" href="../lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <link rel="stylesheet" href="../lib/datatables/jquery.dataTables.css">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../lib/select2/css/select2.min.css">
    <link rel="stylesheet" href="../lib/jt.timepicker/jquery.timepicker.css">
    <link rel="stylesheet" href="../lib/datatables/select.dataTables.min.css">
    <link rel="stylesheet" href="../lib/datatables-responsive/responsive.dataTables.scss">
    <link rel="stylesheet" href="../lib/morris.js/morris.css">
    <link rel="stylesheet" href="../lib/vakata-jstree-4a77e59/dist/themes/default/style.min.css">
    <link rel="stylesheet" href="../lib/datatables/dateTime.min.css">

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/hoanganh/JsBarcode.all.min.js"></script>
    <script src="../lib/typeahead/bootstrap3-typeahead.js"></script>
    <style>
        #data-table2_paginate {
            width: 100%;
            text-align: center;
        }

        button i {
            margin-top: 0;
            margin-left: 3px;
            margin-right: 3px;
            padding: 0 !important;
        }

        button em {
            margin-top: 0;
            margin-left: 3px;
            margin-right: 3px;
            padding: 0 !important;
        }

        a .far {
            margin-top: 0;
            margin-left: 3px;
            margin-right: 3px;
            padding: 0 !important;
        }

        a .fa {
            margin-top: 0;
            margin-left: 3px;
            margin-right: 3px;
            padding: 0 !important;
        }

        a i {
            margin-top: 0;
            margin-left: 3px;
            margin-right: 3px;
            padding: 0 !important;
        }

        .btn-danger {
            cursor: pointer;
        }

        .badge,
        .btn:not(.dropdown-item):not(.multiselect) {
            box-shadow: 0 1px 3px rgb(0 0 0 / 10%), 0 1px 2px rgb(0 0 0 / 18%);
        }
    </style>
</head>

<body class="collapsed-menu">

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href="{{asset('./')}}"><span>[</span>Moriphar<span>]</span></a></div>

    <div class="br-sideleft overflow-y-auto">
        <label class="sidebar-label pd-x-15 mg-t-20"></label>
        @include('layouts.slideleft_menu')

    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header" style="flex-wrap:wrap;">
        @include('layouts.header_left')
        @include('layouts.header_mid')
        @include('layouts.header_right')

    </div><!-- br-header -->
    @include('layouts.modal_pass')
    <!-- ########## END: HEAD PANEL ########## -->
    <!-- ########## START: RIGHT PANEL ########## -->

    <!-- ########## END: RIGHT PANEL ########## --->
    <!-- ########## START: MAIN PANEL ########## -->

    @yield('content')

    <!-- jQuery -->
    <!-- ########## END: MAIN PANEL ########## -->
    <link rel="stylesheet" href="../css/ha.css">
    <script src="../lib/font-awesome/a076d05399.js" crossorigin="anonymous"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/moment/moment.js"></script>
    <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="../lib/peity/jquery.peity.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/d3/d3.js"></script>
    <script src="../lib/rickshaw/rickshaw.min.js"></script>
    <script src="../lib/chart.js/Chart.js"></script>

    <script src="../js/bracket.js"></script>
    <script src="../js/ResizeSensor.js"></script>
    <script src="../lib/jt.timepicker/jquery.timepicker.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>

    <script src="../lib/jquery-toast-plugin-master/src/jquery.toast.js"></script>
    <script src="../lib/hoanganh/toastr.min.js"></script>
    <script src="../lib/autonumeric/autoNumeric.min.js"></script>

    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../lib/datatables/jquery.dataTables.select.js"></script>
    <script src="../lib/datatables/dataTables.fixedColumns.min.js"></script>

    <script src="../lib/datatables/jszip.min.js"></script>
    <script src="../lib/datatables/buttons.html5.min.js"></script>
    <script src="../lib/datatables/dataTables.buttons.min.js"></script>

    <script src="../lib/select2/js/select2.full.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../lib/spectrum/spectrum.js"></script>
    <script src="../lib/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script src="../lib/validate/jquery.validate.js"></script>
    <script src="../lib/sweetalert/sweetalert2@9.js"></script>
    <script src="../lib/raphael/raphael.min.js"></script>
    <script src="../lib/morris.js/morris.js"></script>
    <script src="../lib/vakata-jstree-4a77e59/dist/jstree.min.js"></script>
    <script src="../lib/datatables/dateTime.min.js"></script>
    <script src="../lib/hoanganh/ha.js"></script>

    <script>
        $(document).ready(function() {
			$('.br-pagebody .tx-gray-900 select').select2({
				minimumResultsForSearch: -1
			});
			$('div.dataTables_length select').select2({
				minimumResultsForSearch: -1
			});
			$('#data-table_paginate').after($('#data-table_length'));
			$('#data-table1_paginate').after($('#data-table1_length'));
			$('#data-table2_paginate').after($('#data-table2_length'));
			$('#data-table3_paginate').after($('#data-table3_length'));
			$('#data-table-lotno_paginate').after($('#data-table-lotno_length'));
			$('#data-table-select-lotno_paginate').after($('#data-table-select-lotno_length'));

			$('#data-table_info').detach().appendTo('#info-data-table');
			$('#data-table1_info').detach().appendTo('#info-data-table1');
			$('#data-table3_info').detach().appendTo('#info-data-table3');
			$('#data-table4_info').detach().appendTo('#info-data-table4');
			$('#data-table2_info').detach().appendTo('#info-data-table2');
			$('#data-table3_info').detach().appendTo('#info-data-table3');
		});
    </script>
    <style type="text/css">
        .dataTables_length .select2-container {
            width: 60px !important;
        }

        #hoverLabel {
            cursor: pointer;
        }

        #importExcelFile {
            opacity: 0;
            position: absolute;
            z-index: -1;
        }

        #hoverLabel:hover {
            background-color: #f0f0f0;
            box-shadow: 0 1px 3px rgb(0 0 0 / 10%), 0 1px 2px rgb(0 0 0 / 18%);
        }

        .iconImportBulb {
            content: url('{{ url('/image/lightbulb.png') }}');
            height: 1.6em;
        }
    </style>
</body>

</html>

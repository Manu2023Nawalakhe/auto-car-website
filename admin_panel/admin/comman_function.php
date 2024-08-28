<?php
include "../../db_connection.php";
?>

<?php
function meta()
{ ?>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Admin Panel</title>

<?php
}


function css()
{ ?>
  <link rel="icon" href="user_image/high_logo.jpg" type="image/x-icon">
  <!--material datepicker css-->
  <link rel="stylesheet" href="assets/plugins/material-datepicker/css/bootstrap-material-datetimepicker.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote-bs4.css" />
  <!--Select Plugins-->
  <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <!--inputtags-->
  <link href="assets/plugins/inputtags/css/bootstrap-tagsinput.css" rel="stylesheet" />
  <!--multi select-->
  <link href="assets/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
  <!--Bootstrap Datepicker-->
  <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
  <!--Touchspin-->
  <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css">

  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!--Data Tables -->
  <link href="assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet" />
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet" />

<?php
}

function footer()
{ ?>

  <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
  <!--Start footer-->
  <footer class="footer">
    <div class="container">
      <div class="text-center">
        ©Highclonoid Softec Pvt Ltd
      </div>
    </div>
  </footer>
  <!--End footer-->

<?php
}


function header_tag()
{ ?>

  <!-- Start wrapper-->
  <div id="wrapper">

    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
        <a href="index.php">
          <img src="../user_image/company.png" class="logo-icon" alt="dewinder.org" style="width:100px;height:50px;">

        </a>
      </div>
      <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">ADMIN PANEL</li>
        <li>
          <a href="index.php" class="waves-effect">
            <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>


        <li>
          <a href="javaScript:void();" class="waves-effect">
            <i class="zmdi zmdi-layers"></i>
            <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sidebar-submenu">

            <li><a href="view_main_services.php"><i class="zmdi zmdi-star-outline"></i>Main Services</a></li>
          </ul>
        </li>
        <li><a href="view_cars.php"><i class="zmdi zmdi-star-outline"></i>View Cars</a></li>

        <li><a href="view_blogs.php"><i class="zmdi zmdi-star-outline"></i>View Blog</a></li>


        <li><a href="view_cus_query.php"><i class="zmdi zmdi-star-outline"></i>View Customer Query</a></li>

        <li><a href="view_keyword.php"><i class="zmdi zmdi-star-outline"></i>View Keyword</a></li>

      </ul>

    </div>
    <!--End sidebar-wrapper-->

    <!--Start topbar header-->
    <header class="topbar-nav">
      <nav class="navbar navbar-expand fixed-top bg-white">
        <ul class="navbar-nav mr-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link toggle-menu" href="javascript:void();">
              <i class="icon-menu menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <form class="search-bar">
              <input type="text" class="form-control" placeholder="Enter keywords">
              <a href="javascript:void();"><i class="icon-magnifier"></i></a>
            </form>
          </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">

          <li class="nav-item">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="user_image/ava.png" class="img-circle" alt="user avatar"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item user-details">
                <a href="javaScript:void();">
                  <div class="media">
                    <div class="avatar"><img class="align-self-start mr-3" src="user_image/ava.png" alt="user avatar"></div>
                    <div class="media-body">
                      <h6 class="mt-2 user-title"><?php echo $_SESSION['admin_name']; ?></h6>

                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-divider"></li>
              <a href="logout.php">
                <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
              </a>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <!--End topbar header-->

    <div class="clearfix"></div>


  <?php
}


function  js()
{ ?>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- waves effect js -->
    <script src="assets/js/waves.js"></script>
    <!-- sidebar-menu js -->
    <script src="assets/js/sidebar-menu.js"></script>
    <!-- Custom scripts -->
    <script src="assets/js/app-script.js"></script>

    <!--Bootstrap Touchspin Js-->
    <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/js/bootstrap-touchspin-script.js"></script>
    <!--Select Plugins Js-->
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <!--Inputtags Js-->
    <script src="assets/plugins/inputtags/js/bootstrap-tagsinput.js"></script>

    <!--Bootstrap Datepicker Js-->
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
      $('#default-datepicker').datepicker({
        todayHighlight: true
      });
      $('#autoclose-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
      });

      $('#inline-datepicker').datepicker({
        todayHighlight: true
      });

      $('#dateragne-picker .input-daterange').datepicker({});
    </script>

    <!--Multi Select Js-->
    <script src="assets/plugins/jquery-multi-select/jquery.multi-select.js"></script>
    <script src="assets/plugins/jquery-multi-select/jquery.quicksearch.js"></script>

    <script>
      $(document).ready(function() {
        $('.single-select').select2();

        $('.multiple-select').select2();

        //multiselect start

        $('#my_multi_select1').multiSelect();
        $('#my_multi_select2').multiSelect({
          selectableOptgroup: true
        });

        $('#my_multi_select3').multiSelect({
          selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
          selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
          afterInit: function(ms) {
            var that = this,
              $selectableSearch = that.$selectableUl.prev(),
              $selectionSearch = that.$selectionUl.prev(),
              selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
              selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
              .on('keydown', function(e) {
                if (e.which === 40) {
                  that.$selectableUl.focus();
                  return false;
                }
              });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
              .on('keydown', function(e) {
                if (e.which == 40) {
                  that.$selectionUl.focus();
                  return false;
                }
              });
          },
          afterSelect: function() {
            this.qs1.cache();
            this.qs2.cache();
          },
          afterDeselect: function() {
            this.qs1.cache();
            this.qs2.cache();
          }
        });

        $('.custom-header').multiSelect({
          selectableHeader: "<div class='custom-header'>Selectable items</div>",
          selectionHeader: "<div class='custom-header'>Selection items</div>",
          selectableFooter: "<div class='custom-header'>Selectable footer</div>",
          selectionFooter: "<div class='custom-header'>Selection footer</div>"
        });



      });
    </script>

    <!--material date picker js-->
    <script src="assets/plugins/material-datepicker/js/moment.min.js"></script>
    <script src="assets/plugins/material-datepicker/js/bootstrap-material-datetimepicker.min.js"></script>
    <script src="assets/plugins/material-datepicker/js/ja.js"></script>

    <script>
      $(function() {

        // dat time picker
        $('#date-time-picker').bootstrapMaterialDatePicker({
          format: 'YYYY-MM-DD HH:mm'
        });

        // only date picker
        $('#date-picker').bootstrapMaterialDatePicker({
          time: false
        });

        // only time picker
        $('#time-picker').bootstrapMaterialDatePicker({
          date: false,
          format: 'HH:mm'
        });


      });
    </script>


    <!--Data Tables js-->
    <script src="assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
    <script src="assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

    <script>
      $(document).ready(function() {
        //Default data table
        $('#default-datatable').DataTable();


        var table = $('#example').DataTable({
          lengthChange: false,
          buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
          .appendTo('#example_wrapper .col-md-6:eq(0)');

      });
    </script>

    <!-- Chart js -->
    <script src="assets/plugins/Chart.js/Chart.min.js"></script>
    <!--Peity Chart -->
    <script src="assets/plugins/peity/jquery.peity.min.js"></script>
    <!-- Index js -->
    <script src="assets/js/index.js"></script>

    <script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
    <script>
      $('#summernoteEditor').summernote({
        height: 400,
        tabsize: 2
      });
    </script>

    <script>
      $('#summernoteEditor1').summernote({
        height: 400,
        tabsize: 2
      });
    </script>
    <script>
      $('#summernoteEditor2').summernote({
        height: 400,
        tabsize: 2
      });
    </script>
    <script>
      $('#summernoteEditor3').summernote({
        height: 400,
        tabsize: 2
      });
    </script>

    <script>
      // WRITE THE VALIDATION SCRIPT.
      function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
          return false;

        return true;
      }
    </script>


  <?php
}

  ?>
<?php
$mysql = "SELECT * FROM admin_account WHERE admin_id = '" . $_SESSION["id"] . "'";
$myquery = mysqli_query($conn, $mysql);
$myResult = mysqli_fetch_array($myquery);

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Administrator Phonic App by Aj.Aum</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        .pointer {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="index.php">
                    <!-- Logo icon -->
                    <b class="logo-icon p-l-10">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <!-- <img src="../img/logo.png" style="width: 100%;" alt="homepage" class="light-logo" /> -->
                        <h3 style="margin-top:10px; ">Phonic App</h3>
                    </span>

                    <!-- Logo icon -->
                    <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                    <!-- </b> -->
                    <!--End Logo icon -->
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li> -->
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <!-- <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a> -->
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Profile"><span class="btn btn-info btn-circle"><i class="ti-user"></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item view_dataProfile pointer" title="View Profile" id="<?php echo $_SESSION["id"]; ?>"><i class="ti-user m-r-5 m-l-5"></i><?php echo $myResult['admin_fullname']; ?></a>

                            <a class="dropdown-item pointer" data-toggle="modal" data-target="#dataModalProfileEdit"><i class="ti-settings m-r-5 m-l-5"></i>แก้ไขข้อมูลส่วนตัว</a>

                            <a class="dropdown-item pointer"  data-toggle="modal" data-target="#dataModalRepass"><i class="ti-key m-r-5 m-l-5"></i>เปลี่ยนรหัสผ่าน</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item pointer" href="../Admin/script/user_logout_script.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>

                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-checkerboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Manageadmin.php" aria-expanded="false"><i class="mdi mdi-account-star"></i><span class="hide-menu">จัดการข้อมูลผู้ดูแลระบบ</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Manageuser.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">จัดการข้อมูลผู้ใช้งาน</span></a></li>

                    <li class="sidebar-item"><a href="Manage-lesson.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">จัดการบทเรียนและคำศัพท์ </span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ManageQuiz.php" aria-expanded="false"><i class="mdi mdi-tooltip-edit"></i><span class="hide-menu">จัดการข้อมูล quiz</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ManageExam.php" aria-expanded="false"><i class="mdi mdi-tooltip-text"></i><span class="hide-menu">จัดการข้อมูล exam</span></a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

    <!-- Modal แสดง profile admin  -->
    <div class="modal fade" id="dataModalProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead" id="myModalLabel">Profile ผู้ดูแลระบบ</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <div class="row" id="employee_detailProfile">
                            <!-- แสดงข้อมูล -->
                        </div>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal แสดง profile admin  -->

    <!-- Modal แสดง editprofile admin  -->
    <div class="modal fade" id="dataModalProfileEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead" id="myModalLabel">แก้ไข Profile ผู้ดูแลระบบ</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <div class="text">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="script/EditProfileadmin_script.php?admin_id=<?php echo $_SESSION["id"]; ?>" method="post">
                                    <div class="form-group">
                                        <label for="">ชื่อผู้ใช้งาน : </label>
                                        <input type="text" id="admin_username" name="admin_username" class="form-control input-lg" placeholder="ชื่อผู้ใช้งาน" value="<?php echo $myResult['admin_username']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">ชื่อ - สกุล : </label>
                                        <input type="text" id="fname" name="fname" class="form-control input-lg" placeholder="ชื่อ - สกุล" value="<?php echo $myResult['admin_fullname']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">อีเมล์ : </label>
                                        <input type="text" id="email" name="email" class="form-control input-lg" placeholder="อีเมล์" value="<?php echo $myResult['admin_email']; ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">อัพเดทข้อมูล</button>
                                    <button type="reset" class="btn btn-danger btn-sm">ยกเลิก</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal แสดง editprofile admin  -->

    <!-- Modal เปลี่ยน password admin  -->
    <div class="modal fade" id="dataModalRepass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead" id="myModalLabel">เปลี่ยนรหัสผ่าน ผู้ดูแลระบบ</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text">
                        <div class="row" id="Repassadmin">
                            <div class="col-sm-12">
                                <form action="script/changepassAdminProfile_script.php?admin_id=<?php echo $_SESSION["id"]; ?>" onsubmit="return checkNewpass(this);" method="post">

                                    <div class="form-group">
                                        <label for="">ชื่อผู้ใช้งาน : </label>
                                        <input type="text" id="admin_username" name="admin_username" class="form-control input-lg" placeholder="ชื่อผู้ใช้งาน" value="<?php echo $myResult['admin_username']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">รหัสผ่านเดิม : </label>
                                        <input type="password" id="old_pass" name="old_pass" class="form-control input-lg" placeholder="รหัสผ่านเดิม"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">รหัสผ่านใหม่ : </label>
                                        <input type="password" id="new_pass" name="new_pass" class="form-control input-lg" placeholder="รหัสผ่านใหม่" onchange="checkPass();" required>
                                        <span id="txtCheck2"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">ยืนยันรหัสผ่าน : </label>
                                        <input type="password" id="new_pass2" name="new_pass2" class="form-control input-lg" placeholder="ยืนยันรหัสผ่าน"  required>
                                        <span id="txtCheck2"></span>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-sm">เปลี่ยนรหัสผ่าน</button>
                                    <button type="reset" class="btn btn-danger btn-sm">ยกเลิก</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal เปลี่ยน password admin    -->

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>

    <!-- แสดงข้อมูล modal -->
    <script type="text/javascript">
        $(document).on('click', '.view_dataProfile', function() {
            var admin_id = $(this).attr("id");
            if (admin_id != '') {
                $.ajax({
                    url: "script/showProfileadmin_script.php",
                    method: "POST",
                    data: {
                        id: admin_id
                    },
                    success: function(data) {
                        $('#employee_detailProfile').html(data);
                        $('#dataModalProfile').modal('show');
                    }
                });
            }
        });
    </script>
     <script>
        function checkPass() {

            str1 = document.getElementById("new_pass").value;
            str2 = document.getElementById("old_pass").value;

            if (str1.length < 8) {
                document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร</span>";
                document.getElementById("new_pass").focus();
            }
            if (str1 == str2) {
                document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านเดิมและรหัสผ่านใหม่ตรงกัน !!!</span>";
                document.getElementById("new_pass").focus();
                return false;
            } else {
                document.getElementById("txtCheck2").innerHTML = "";
            }
        }

        function checkNewpass(form) {

            str1 = document.getElementById("new_pass").value;
            str2 = document.getElementById("new_pass2").value;

            if (str1 == str2) {
                return true;
            } else {
                document.getElementById("txtCheck2").innerHTML = "<span style='color:red'>รหัสผ่านใหม่ไม่ตรงกัน !!!</span>";
                document.getElementById("new_pass2").focus();
                return false;
            }
        }
    </script>

</body>

</html>
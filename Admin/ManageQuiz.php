<?php
session_start();
include '../db_connection.php';
if ($_SESSION["loggedin"] != True) {
    //if not login redirect to login.php 
    header("location:login.php");
}
$sql = "SELECT * FROM quiz_detail ORDER BY create_date DESC ";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <title>Administrator Phonic App by Aj.Aum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">
        <!-- Topbar header - style you can find in pages.scss -->
        <?php include 'template/menu.php'; ?>
        <!-- End Topbar header -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">จัดการข้อมูล Quiz</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">จัดการข้อมูล Quiz</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- แสดงตารางข้อมูลผู้ใช้งาน -->
                <div class="card">
                    <!-- ปุ่มเพิ่มข้อมุล -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                            <a href="form-add-quiz.php" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> เพิ่มข้อมูล</a>
                            </div>
                            <div class="col-6">
                                <p style="text-align:right"><span style="color:red;" class="m-0 p-3">*หมายเหตุ</span> <i class="fas fa-square-full border border-secondary" style="color:#F4F2FE;border"></i> คำตอบเป็นข้อความ <i class="fas fa-square-full border border-secondary" style="color:#FEFAF2"></i> คำตอบเป็นภาพ <i class="fas fa-square-full border border-secondary" style="color:#F2FEF2"></i> คำตอบเป็นเสียง</p>

                            </div>
                        </div>
                    </div>
                    <!-- ปุ่มเพิ่มข้อมุล -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-bordered table-sm table-hover">
                                <thead class="table-secondary">

                                    <tr>
                                        <th width="20px" align="center">ลำดับ</th>
                                        <th>หัวข้อ คำถาม</th>
                                        <th width="150px">รูปแบบคำตอบ</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                        $ans_style = $result["answer_style"];
                                        if ($ans_style == 0) {
                                            $ans = 'คำตอบเป็นข้อความ';
                                            $color = '#F4F2FE';
                                        }
                                        if ($ans_style == 1) {
                                            $ans = 'คำตอบเป็นภาพ';
                                            $color = '#FEFAF2';
                                        }
                                        if ($ans_style == 2) {
                                            $ans = 'คำตอบเป็นเสียง';
                                            $color = '#F2FEF2';
                                        }
                                        ?>
                                        <tr style="background-color:<?= $color ?>">
                                            <td align="center"><?= number_format($i); ?></td>
                                            <td><?php echo $result["question_title"]; ?></td>
                                            <td><?= $ans; ?></td>

                                            <td width="65px;" align="center">
                                                <a href="#" style="color: gray;" title="view" class="view_data" id="<?php echo $result["quiz_id"]; ?>"><i class="fas fa-search"></i></a>
                                                <i class="far fa-edit"></i>
                                                <i class="fas fa-times-circle"></i>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>

                            </table>
                            <?php
                            mysqli_close($conn);
                            ?>

                        </div>
                    </div>
                </div>
                <!-- Sales chart -->
            </div>
            <!-- End Container fluid  -->

            <!-- Modal แสดงลายละเอียดข้อมูลผู้ใช้งาน -->
            <div class="modal fade" id="dataModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <p class="heading lead" id="myModalLabel">รายละเอียดข้อมูล</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <div class="text-left">
                                <div class="row" id="employee_detail1">
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

            <!-- Modal แสดงลายละเอียดข้อมูลผู้ใช้งาน -->

            <!-- footer -->
            <?php include 'template/footer.php'; ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>

    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /* Basic Table */
        $('#zero_config').DataTable();
    </script>

    <!-- แสดงข้อมูล modal -->
    <script type="text/javascript">
        $(document).on('click', '.view_data', function() {
            var quiz_id = $(this).attr("id");
            if (quiz_id != '') {
                $.ajax({
                    url: "script/showprocessQuiz_script.php",
                    method: "POST",
                    data: {
                        id: quiz_id
                    },
                    success: function(data) {
                        $('#employee_detail1').html(data);
                        $('#dataModal1').modal('show');
                    }
                });
            }
        });
    </script>
</body>

</html>
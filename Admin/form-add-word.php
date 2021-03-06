<?php 
session_start();
include '../db_connection.php';
if (!isset($_SESSION["loggedin"])){
    $_SESSION["loggedin"] == '';
    header("location:login.php");
}
if(isset($_GET['lesson_id'])){
    $lesson_id = $_GET['lesson_id'];
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- jquery link use for responce form add lesson and word -->

    <title>Administrator Phonic App by Aj.Aum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css for button_addword -->
    <style type="text/css">
        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button_addword {
            background-color: white;
            color: black;
            border: 2px solid #555555;

        }

        .button_showimg {

            color: black;
            border: 2px solid #555555;
            background-size: 65px;
            width: 85px;
            height: 58px;
        }

        /*shadow box*/
        .button:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 60%;
        }
        .center2 {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 25%;
            height: 30%;
        }
    </style>
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
                        <h4 class="page-title">เพิ่มบทเรียนและคำศัพท์</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">เพิ่มบทเรียนและคำศัพท์</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Example image -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">คำอธิบาย</h4>
                        <div class="row">
                            <img src="assets/images/sample/Capture1.PNG" alt="รูปภาพอธิบายตัวอย่าง" class="center2">
                        </div>
                        <br>
                        <h5 class="card-title">จากภาพข้างต้นสามารถอธิบายส่วนประกอบได้ดังนี้</h5>
                        <div class="row">
                            <img src="assets/images/sample/Capture2.PNG" alt="รูปภาพอธิบายตัวอย่าง" class="center">
                        </div>

                    </div>
                </div>
                <!-- End Example image -->
                <!-- Form for add lesson -->
                <div class="card">
                    <form class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title">เพิ่มหน้าที่แสดงและคำศัพท์</h4>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <div><a onclick=addpage() class="btn btn-success btn-sm" style="color:#fff"><i class="fas fa-plus-circle"></i> เพิ่มหน้าที่แสดง</a></div>
                                    <br>

                      
                                    <br>
                                    <div id="page"></div>


                                </div>
                            </div>
                            <!-- end form add word -->
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="button" onclick=goto_lesson() class="btn btn-primary btn-sm"><i class="fas fa-check"> บันทึกข้อมูล</i></button>
                                <button type="button" class="btn btn-danger btn-sm" onclick='window.history.back()'><i class="far fa-times-circle"> ยกเลิก</i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End form add lesson -->
                <!-- modal addword -->
                <div class="modal fade" id="modal_addword" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <!-- <h4 class="modal-title">Modal Header</h4> -->
                            </div>
                            <div class="modal-body">

                                <!-- <a href="#" ><span><i class="fa fa-plus-circle" aria-hidden="true"></i></span> เพิ่มคำศัพท์</a> -->
                                <!-- button add word -->
                                <!-- คำศัพท์ คำแรก -->
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">รูปคำศัพท์</label>
                                    <div class="col-sm-9">
                                        <input type="file" id="file" name="file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">ชื่อคำศัพท์</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="wordname" class="form-control" id="wordname" placeholder="ตัวอย่าง A a">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">เสียงคำศัพท์</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="wordsound" class="form-control" id="wordsound" placeholder="ตัวอย่าง ant">
                                    </div>
                                </div>
                             <!--    <div class="form-group row">
                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label"><b>Youtube</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="Youtube" class="form-control" id="Youtube" placeholder="ตัวอย่าง biiLK2VKo-w">
                                    </div>
                                </div> -->
                                <hr>
                            </div>
                            <div class="modal-footer">

                                <button id="but_upload" class="btn btn-success" data-dismiss="modal">บันทึก</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>

                            </div>

                        </div>

                    </div>
                </div>
                <!-- end modal -->

            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php include 'template/footer.php'; ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>

    <script>
        /* Basic Table */
        $('#zero_config').DataTable();
    </script>
    <!-- script for create html by javascript -->
    <script>
        //init page number 
        var page_number = 0;
        var word_number = 1;
        var lesson_id = "<?php echo $lesson_id ; ?>"; //from get variable 

        function goto_lesson(){
          document.location.href = "viewlesson.php?lesson_id=<?php echo $lesson_id ;?>";
        }

        function makeid(length) {
            //for make page id 
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        function addpage() {
            page_number++;
            word_number = 1;
            //random page id and use to locat page and word
            var page_id = makeid(4);
            var page_markup = "<div id='accordion'><div class='card'><div class='card-header  fas fa-book' style='background-color:#ffcc99;'><a class='card-link' data-toggle='collapse' href='#" + page_id + "'> หน้าที่ " + page_number + "</a></div><div class='card-body' style='background-color: #ffffcc;'><div id='" + page_id + "' class='collapse show' data-parent='#accordion'><div class='col-md-12' style='background-color: #ffffcc;'><a href='#' class='button button_addword' data-toggle='modal' data-target='#modal_addword'><span><i class='fa fa-plus-circle' aria-hidden='true'></i></span></a><i id='" + page_id + "'></i></div></div></div></div></div>";
            $("#page").append(page_markup);

            window.value = page_id;
        }
        //เพิ่มหน้า
        //ทำงานเมื่อเพิ่มคำศัพท์
        //add word
        $("#but_upload").click(function() {
            var wordname = $("#wordname").val();
            var wordsound = $("#wordsound").val();
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file', files);
            fd.append('wordname', wordname);
            fd.append('wordsound', wordsound);
            fd.append('lesson_id', lesson_id);
            fd.append('page_no', page_number);
            fd.append('word_no', word_number);
            if ($('#wordname').val() == "") {
                alert("กรุณากรอกชื่อ คำศัพท์");
            } else if ($('#wordsound').val() == "") {
                alert("กรุณากรอกเสียง คำศัพท์");
            }else if($('#file').val() == ""){
                alert("กรุณาเพิ่มรูปภาพ คำศัพท์");
            } else {
                $.ajax({
                    url: 'script/addword_script.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var page_id = window.value;
                        var image = '../img/word/' + files['name'];
                        var word_markup = "<button class='button button_showimg' style='background-image: url(" + image + ");'><span><i class='fa fa-pencil'  aria-hidden='true'></i></span></button>"
                        $("#" + page_id + "").append(word_markup);
                        word_number++;
                    },
                });
                //reset value modal 
                $("#file").val("");
                $("#wordname").val("");
                $("#wordsound").val("");
            }

        });
        //button upload lesson
        $('#btn_lesson').click(function() {
            var r = confirm("ยืนยันการเพิ่มบทเรียนนี้");
            if (r == true) {
                var lesson_no = $('#lesson_no').val(); //ลำดับ lesson
                var lesson_name = $('#lesson_name').val();
                var lesson_desc = $('#lesson_desc').val();
                var level = $('#level').val();
                var small_image = $('#small_image')[0].files[0];
                var maxpage = page_number;
                var youtube = $('#youtube').val();

                var fd = new FormData();
                fd.append('lesson_no', lesson_no);
                fd.append('lesson_name', lesson_name);
                fd.append('lesson_desc', lesson_desc);
                fd.append('lesson_id', lesson_id);
                fd.append('level', level);
                fd.append('small_image', small_image);
                fd.append('maxpage', maxpage);
                fd.append('youtube', youtube);

                $.ajax({
                    url: 'script/addlesson_script.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert('ทำรายการเรียบร้อยแล้ว');
                        location.href="Manage-lesson.php"
                        

                    },
                });
            } else {
                alert('ยกเลิกแล้ว');
            }

        });
    </script>



</body>

</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบค้นหารายชื่อด้วย jQuery AJAX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="jumbotron bg-primary text-light pt-3 pb-3">
        <h1 class="text-center">ค้นหารายชื่อและคะแนนน้ำใจ</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- สร้างแบบฟอร์มด้วย Bootstrap 4-->
            <div class="col-md-4">
                <div class="container">
                    <form name="search_user" id="search_user" method="POST" action="index.php">

                        <div class="form-group row">
                            <label for="fullname" class="col-sm-3 col-form-label">ชื่อ</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="fullname" name="fullname">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="nickname" class="col-sm-3 col-form-label">ชื่อเล่น</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="nickname" name="nickname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="province" class="col-sm-3 col-form-label">จังหวัด</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="province" name="province">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="province" class="col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-sm-9">
                            <input type="submit" class="btn btn-primary" id="submit" name="submit" value="ค้นหา">
                            <input type="button" class="btn btn-primary" id="resetform" name="resetform" value="ล้างข้อมูลการค้นหา">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <!-- สร้างตารางด้วย Bootstrap 4-->
            <div class="col-md-8">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th>#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Nickname</th>
                            <th class="text-center">Province</th>
                            <th class="text-center">Mpoint</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- การส่งข้อมูลด้วย jQuery AJAX เพื่อค้นหา ไปที่ไฟล์ search_result.php-->
    <script>
        $(function(){

            // ============================================================================
            // เริ่มต้นให้โหลดข้อมูลทั้งหมดออกมาแสดง โดยเรียกฟังก์ชัน all_users()
            all_users();

            // สร้างฟังก์ชันดึงข้อมูลจากตาราง user ทั้งหมด โดยอ่านจากไฟล์ all_users.php
            function all_users(){
                $.ajax({ 
                        url: 'all_users.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                                // กำหนดตัวแปรเก็บโครงสร้างแถวของตาราง
                                var trstring ="";
                                // ตัวแปรนับจำนวนแถว
                                var countrow = 1;

                                // วนลูปข้อมูล JSON ลงตาราง
                                $.each(data, function(key, value){
                                    // ทดสอบแสดงชื่อ
                                    // console.log(value.fullname);
                                    // แสดงค่าลงในตาราง
                                    trstring += `
                                    <tr>
                                        <td class="text-center">${countrow}</td>
                                        <td class="text-center">${value.fullname}</td>
                                        <td class="text-center">${value.nickname}</td>
                                        <td class="text-center">${value.province}</td>
                                        <td class="text-center">${value.mpoint}</td>
                                        <th class="text-center">${value.status}</th>
                                    </tr>`;
                                    $('table tbody').html(trstring);
                                    countrow++;
                        });
                    }
                });
            }

            // ============================================================================
            // เมื่อมีการ submit form
            $('form#search_user').submit(function(event) {
               event.preventDefault();

                // รับค่าจากฟอร์ม
                var fullname = $('input#fullname').val();
                var nickname = $('input#nickname').val();
                var province = $('input#province').val();

                // ส่งค่าไป search_result.php ด้วย jQuery Ajax
                $.ajax({
                    url: 'search_result.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        fullname:fullname,
                        nickname:nickname,
                        province:province
                    },
                    success: function(data){
                        if(data.length != 0){
                            // กรณีมีข้อมูล
                            // กำหนดตัวแปรเก็บโครงสร้างแถวของตาราง
                            var trstring ="";

                            // ตัวแปรนับจำนวนแถว
                            var countrow = 1;

                            // วนลูปข้อมูล JSON ลงตาราง
                            $.each(data, function(key, value){
                                // แสดงค่าลงในตาราง
                                trstring += `
                                    <tr>
                                        <td class="text-center">${countrow}</td>
                                        <td class="text-center">${value.fullname}</td>
                                        <td class="text-center">${value.nickname}</td>
                                        <td class="text-center">${value.province}</td>
                                        <td class="text-center">${value.mpoint}</td>
                                        <th class="text-center">${value.status}</th>
                                    </tr>`;
                                $('table tbody').html(trstring);
                                countrow++;
                            });


                        }else{
                            alert('ไม่พบข้อมูลที่ค้นหา');
                        }
                    }
                });
            });

            // ============================================================================
            // เมื่อกดปุ่มล้างข้อมูลการค้นหา
            $('input#resetform').click(function(){
                // ล้างค่าในฟอร์มทั้งหมด
                $("#search_user").trigger('reset');
                // โฟกัสช่องชื่อ
                $('input#fullname').focus();
                // เรียกแสดงผลข้อมูลทั้งหมด
                all_users();
            });

        });
    </script>
</body>
</html>
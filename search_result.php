<?php
include 'connectdb.php';

// รับค่าจาก jQuery
$fullname = $_POST['fullname'];
$nickname = $_POST['nickname'];
$province = $_POST['province'];

// เช็คว่าทั้ง 3 ช่องต้องไม่เป็นค่าว่าง
if(!empty($fullname) or !empty($nickname) or !empty($province)){
    $sql = "SELECT * FROM users WHERE fullname LIKE '%$fullname%' AND nickname LIKE '%$nickname%' AND province LIKE '%$province'";
    $qeury = mysqli_query($connect,$sql);

    // กำหนดตัวแปรไว้เก็บข้อมูลที่ค้นหาได้
    $search_data = array();
    // วนลูปค้นหาข้อมูล
    while($result = mysqli_fetch_assoc($qeury)){
        // เก็บข้อมูลที่ค้นหาได้ลงตัวแปร
        $search_data[] = $result;
    }

    // ทดสอบแสดงผลลัพธ์ที่ค้นเจอ
    /*
    echo "<pre>";
    print_r($search_data);
    echo "</pre>";
    */
    
    // แสดงข้อมูลออกเป็น JSON Data
    echo json_encode($search_data);
}

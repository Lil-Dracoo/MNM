<?php
session_start();

// 1. KIỂM TRA ĐĂNG NHẬP
if (isset($_SESSION['user1'])) {

    // 2. XỬ LÝ ĐĂNG XUẤT NGAY TẠI ĐÂY (Trước khi HTML được tải)
    if (isset($_GET['act']) && $_GET['act'] == "dangxuat") {
        unset($_SESSION['user1']);
        header('location: login.php');
        exit;
    }



    // 5. Include Header (Lúc này mới bắt đầu xuất HTML)
    include "./view/home/header.php";



    include "./view/home/footer.php";
} else {
    // Chưa đăng nhập thì chuyển về login
    header('location: login.php');
}
?>
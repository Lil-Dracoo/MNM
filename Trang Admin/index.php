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

    // 3. Include Models
    include "./model/pdo.php";
    include "./model/loai_phim.php";

    // 4. Load Global Data
    $loadloai = loadall_loaiphim();

    // 5. Include Header (Lúc này mới bắt đầu xuất HTML)
    include "./view/home/header.php";

    // 6. Điều hướng Controller
    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            // Module Loại Phim
            case "QLloaiphim":
            case "themloai":
            case "sualoai":
            case "xoaloai":
            case "updateloai":
                include "./controllers/c_loaiphim.php";
                break;
            default:
                include "./view/home.php";
                break;
            }
    } else {
        include "./view/home.php";
    }

    include "./view/home/footer.php";
} else {
    // Chưa đăng nhập thì chuyển về login
    header('location: login.php');
}
?>
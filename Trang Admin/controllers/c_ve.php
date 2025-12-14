<?php
switch ($act) {
    case "ve":
        if (isset($_POST['tk']) && ($_POST['tk'])) {
            $searchName = $_POST['ten'];
            $searchTieuDe = $_POST['tieude'];
            $searchid = $_POST['id_ve'];
        } else {
            $searchName = "";
            $searchTieuDe = "";
            $searchid = "";
        }
        $loadvephim = loadall_vephim1($searchName, $searchTieuDe, $searchid);
        include "./view/vephim/ve.php";
        break;

    case "suavephim":
        if (isset($_GET['idsua'])) {
            $loadve = loadone_vephim($_GET['idsua']);
        }
        include "./view/vephim/sua.php";
        break;

    case "updatevephim":
        if (isset($_POST['capnhat'])) {
            $id = $_POST['id'];
            $trang_thai = $_POST['trang_thai'];
            update_vephim($id, $trang_thai);
        }
        // Xử lý tìm kiếm lại sau khi update
        if (isset($_POST['tk']) && ($_POST['tk'])) {
            $searchName = $_POST['ten'];
            $searchTieuDe = $_POST['tieude'];
            $searchid = $_POST['id_ve'];
        } else {
            $searchName = "";
            $searchTieuDe = "";
            $searchid = "";
        }
        $loadvephim = loadall_vephim1($searchName, $searchTieuDe, $searchid);
        include "view/vephim/ve.php";
        break;

    case "chitiethoadon":
        include "./view/vephim/chitiethoadon.php";
        break;

    case "ctve":
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $loadone_ve =  loadone_vephim($_GET['id']);
        }
        include "view/vephim/ct_ve.php";
        break;

    case "capnhat_tt_ve":
        if (isset($_POST['tk']) && ($_POST['tk'])) {
            $searchName = $_POST['ten'];
            $searchTieuDe = $_POST['tieude'];
        } else {
            $searchName = "";
            $searchTieuDe = "";
        }
        // Lưu ý: Đoạn này trong code cũ bạn có logic hơi rối (include ve.php rồi include QTvien.php)
        // Mình giữ nguyên logic nhưng sắp xếp lại
        if (isset($_POST['capnhat'])) {
            capnhat_tt_ve();
        }
        $loadvephim = loadall_vephim1($searchName, $searchTieuDe);
        include "./view/user/QTvien.php"; 
        break;
}
?>
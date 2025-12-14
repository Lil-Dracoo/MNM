<?php
switch ($act) {
    case "QLloaiphim":
        include "./view/loaiphim/QLloaiphim.php";
        break;

    case "themloai":
        if (isset($_POST['gui'])) {
            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $error = "Tên thể loại không được để trống";
            }
            if (!isset($error)) {
                $name = $_POST['name'];
                them_loaiphim($name);
                $suatc = "THÊM THÀNH CÔNG";
            }
        }
        include "./view/loaiphim/them.php";
        break;

    case "sualoai":
        if (isset($_GET['idsua'])) {
            $loadone_loai = loadone_loaiphim($_GET['idsua']);
        }
        include "./view/loaiphim/sua.php";
        break;

    case "xoaloai":
        if (isset($_GET['idxoa'])) {
            xoa_loaiphim($_GET['idxoa']);
            $loadloai = loadall_loaiphim();
            include "./view/loaiphim/QLloaiphim.php";
        } else {
            include "./view/loaiphim/QLloaiphim.php";
        }
        break;

    case "updateloai":
        if (isset($_POST['capnhat'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            if ($name == '') {
                $error = "vui lòng điền đầy đủ thông tin";
                $loadone_loai = loadone_loaiphim($id);
                include "./view/loaiphim/sua.php";
            } else {
                update_loaiphim($id, $name);
                $suatc = "SỬA THÀNH CÔNG";
                $loadloai = loadall_loaiphim();
                include "./view/loaiphim/QLloaiphim.php";
            }
        } else {
            $loadloai = loadall_loaiphim();
            include "./view/loaiphim/QLloaiphim.php";
        }
        break;
}
?>
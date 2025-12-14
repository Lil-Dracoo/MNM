<?php
switch ($act) {
    case "QLphim":
        if (isset($_POST['tk1']) && ($_POST['tk1'])) {
            $searchName1 = $_POST['ten'];
            $searchLoai = $_POST['loai'];
        } else {
            $searchName1 = "";
            $searchLoai = "";
        }
        $loadphim = loadall_phim($searchName1, $searchLoai);
        include "./view/phim/QLphim.php";
        break;

    case "themphim":
        if (isset($_POST['gui'])) {
            $tieu_de = $_POST['tieu_de'];
            $daodien = $_POST['daodien'];
            $dienvien = $_POST['dienvien'];
            $quoc_gia = $_POST['quoc_gia'];
            $gia_han_tuoi = $_POST['gia_han_tuoi'];
            $thoiluong = $_POST['thoiluong'];
            $date = $_POST['date'];
            $link = $_POST['link'];
            $id_loai = $_POST['id_loai'];
            $mo_ta = $_POST['mo_ta'];
            $img = $_FILES['anh']['name'];
            $target_dir = "../Trang người dùng/imgavt/";
            $target_file = $target_dir . basename($_FILES['anh']['name']);
            
            if (move_uploaded_file($_FILES['anh']['tmp_name'], $target_file)) {
                // Upload thành công
            } else {
                // Upload thất bại
            }

            if ($tieu_de == '' || $daodien == '' || $dienvien == '' || $quoc_gia == '' || $gia_han_tuoi == '' || $img == '' || $mo_ta == '' || $thoiluong == '' || $date == '' || $id_loai == '') {
                $error =  "Vui lòng không để trống";
                include "./view/phim/them.php";
            } else {
                them_phim($tieu_de, $daodien, $dienvien, $img, $mo_ta, $thoiluong, $quoc_gia, $gia_han_tuoi, $date, $id_loai, $link);
                $suatc = "Thêm thành công";
                $loadphim = loadall_phim();
                include "./view/phim/them.php";
            }
        } else {
            $loadphim = loadall_phim();
            include "./view/phim/them.php";
        }
        break;

    case "xoaphim":
        if (isset($_GET['idxoa'])) {
            xoa_phim($_GET['idxoa']);
            $loadphim = loadall_phim();
            include "./view/phim/QLphim.php";
        }
        break;

    case "suaphim":
        if (isset($_GET['idsua'])) {
            $loadone_phim = loadone_phim($_GET['idsua']);
        }
        include "./view/phim/sua.php";
        break;

    case "QLcarou":
        include "./view/phim/sua.php";
        break;

    case "updatephim":
    if (isset($_POST['capnhat'])) {
        $id = $_POST['id'];
        $tieu_de = $_POST['tieu_de'];
        $daodien = $_POST['daodien'];
        $dienvien = $_POST['dienvien'];
        $quoc_gia = $_POST['quoc_gia'];
        $gia_han_tuoi = $_POST['gia_han_tuoi'];
        $thoi_luong = $_POST['thoiluong'];
        $date = $_POST['date'];
        $id_loai = $_POST['id_loai'];
        $mo_ta = $_POST['mo_ta'];
        
        // --- XỬ LÝ ẢNH (Logic giữ ảnh cũ) ---
        $img = $_FILES['anh']['name'];
        if ($img != "") {
            // Nếu có chọn ảnh mới thì upload và dùng tên ảnh mới
            $target_dir = "../Trang người dùng/imgavt/";
            $target_file = $target_dir . basename($_FILES['anh']['name']);
            move_uploaded_file($_FILES['anh']['tmp_name'], $target_file);
        } else {
            // Nếu KHÔNG chọn ảnh mới, thì lấy tên ảnh cũ (được gửi từ form qua input hidden)
            // Bạn nhớ kiểm tra trong view/phim/sua.php đã có input hidden name="hinh_cu" chưa nhé
            $img = $_POST['hinh_cu']; 
        }

        // Kiểm tra dữ liệu rỗng (không cần check ảnh vì đã xử lý ở trên)
        if ($tieu_de == '' || $daodien == '' || $dienvien == '' || $quoc_gia == '' || $gia_han_tuoi == '' || $mo_ta == '' || $thoi_luong == '' || $date == '' || $id_loai == '') {
            $error = "Vui lòng không để trống các trường thông tin";
            $loadone_phim = loadone_phim($id);
            include "./view/phim/sua.php";
        } else {
            // --- SỬA LỖI TẠI ĐÂY: TRUYỀN ĐỦ THAM SỐ ---
            // Bạn cần mở file model/phim.php xem hàm sua_phim() thứ tự nó như thế nào.
            // Dưới đây là thứ tự thường thấy, hãy chắc chắn nó khớp với Model của bạn:
            
            sua_phim($id, $tieu_de, $daodien, $dienvien, $img, $mo_ta, $thoi_luong, $quoc_gia, $gia_han_tuoi, $date, $id_loai);
            
            $suatc = "Cập nhật thành công";
            $loadphim = loadall_phim();
            include "./view/phim/QLphim.php";
        }
    } else {
        $loadphim = loadall_phim();
        include "./view/phim/QLphim.php";
    }
    break;
}
?>
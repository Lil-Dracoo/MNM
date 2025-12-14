<?php include "./view/home/sideheader.php"; ?>

<div class="content-body">

    <div class="row justify-content-between align-items-center mb-10">
        <?php if ($_SESSION['user1']['vai_tro'] == 2){ ?>
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Trang Chủ</h3>
            </div>
        </div><div class="col-12 col-lg-auto mb-20">
            <h1 id="real-time-clock"></h1>
        <?php }else{
            echo '<h1>Chào mừng '.$_SESSION['user1']['name'].' đến với trang làm việc của CinePass</h1>';
        } ?>
    </div></div><script>
    function updateClock() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        // Thêm số 0 đằng trước nếu giờ, phút hoặc giây chỉ có một chữ số
        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        // Hiển thị thời gian trong thẻ h1 có id là "real-time-clock"
        document.getElementById('real-time-clock').innerText = hours + ":" + minutes + ":" + seconds;

        // Cập nhật thời gian mỗi giây
        setTimeout(updateClock, 1000);
    }

    // Bắt đầu cập nhật thời gian khi trang web được tải
    updateClock();
</script>
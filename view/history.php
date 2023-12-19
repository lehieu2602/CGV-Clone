<?php
include_once("db/connect.php");
// session_start();
// $user = $_GET['user'];
$user = "annv@gmail.com";
?>





<div class="title-info" style="text-align: center;">
    <h3>LỊCH SỬ ĐẶT VÉ</h3>
</div>
<table id="historyBooking" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr style="background-color: red;">
            <th style="color: white;" scope="col">STT</th>
            <th style="color: white;" scope="col">Tên Phim</th>
            <th style="color: white;" scope="col">Ghế</th>
            <th style="color: white;" scope="col">Rạp</th>
            <th style="color: white;" scope="col">Loại Vé</th>
            <th style="color: white;" scope="col">Thời Gian Đặt</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 0;
        $sql_bookingH = mysqli_query($mysqli, "SELECT 
    movies.title,
    booking.booking_seat,
    booking.booking_ticket,
    booking.booking_time,
    cinemas.name
FROM 
    booking,
    users,
    movies,
    cinemas
WHERE 
    booking.booking_user = users.id 
    AND booking.booking_movie = movies.id 
    AND booking.booking_theater = cinemas.id 
    AND users.email = '$user'; ");
        while ($row_bookingH = mysqli_fetch_array($sql_bookingH)) {
        ?>
            <tr>
                <th scope="row"><?php echo $stt += 1; ?></th>
                <td><?php echo $row_bookingH['title']; ?></td>
                <td><?php echo $row_bookingH['booking_seat']; ?></td>
                <td><?php echo $row_bookingH['name']; ?></td>
                <td><?php echo $row_bookingH['booking_ticket']; ?></td>
                <td><?php echo $row_bookingH['booking_time']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="note">
    *Ghi Chú:
    <div>
        - Vé Phim 2D: Ở phòng số 1.
    </div>
    <div>
        - Vé Phim 3D: Ở phòng số 2.
    </div>
</div>
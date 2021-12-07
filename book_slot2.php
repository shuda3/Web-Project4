<?php

include('include/connect.php');

$user_id = $_GET['uid'];
$slot_date = $_POST['slot_date'];
$start_time = $_POST['start_time'];
$no_of_hr = $_POST['no_of_hr'];
$exit_time = date('H:i', strtotime($start_time . '+ ' . $no_of_hr . ' hour'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <style>
        .btn {
            border-radius: 0;
        }

        .btn-outline-primary,
        .btn-danger {
            margin-top: 25px;
            margin-bottom: 8px;
        }

        .container {
            padding-top: 20px;
        }

        body {
            position: auto;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Select slot</h3>
        <div class="row">
            <?php
            $sql_slot = "SELECT * FROM slot_master";
            $result_slot = mysqli_query($conn, $sql_slot);
            while ($data = mysqli_fetch_array($result_slot)) {
                if ($data['slot_status'] == 0) {
            ?>
                    <div class="col-lg-2">
                        <hr>
                        <a type=" button" class="btn btn-outline-primary btn-lg btn-block" href="inlcude/confirm_slot.php?slot_id=<?php echo $data['slot_id']; ?>&&uid=<?php echo 1; ?>">Slot
                            <?php echo $data['slot_id']; ?>
                        </a>
                    </div>
                    <?php } else if ($data['slot_status'] == 1) {
                    $sql_time = "SELECT * FROM parking_details";
                    $result_time = mysqli_query($conn, $sql_time);
                    $row_time = mysqli_fetch_assoc($result_time);

                    if (($start_time < $row_time['start_time'] && $exit_time <= $row_time['start_time']) ||
                        ($start_time >= $row_time['exit_time'] && $exit_time > $row_time['exit_time'])
                    ) {
                    ?>
                        <div class="col-lg-2">
                            <hr>
                            <a type=" button" class="btn btn-outline-primary btn-lg btn-block" href="inlude/confirm_slot2.php?slot_id=<?php echo $data['slot_id']; ?>&&uid=<?php echo 1; ?>">Slot
                                <?php echo $data['slot_id']; ?>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-2">
                            <hr>
                            <button type="button" class="btn btn-danger btn-lg btn-block" disabled>Slot
                                <?php echo $data['slot_id']; ?>
                            </button>
                        </div>
            <?php  }
                }
            } ?>
            <br>
            <p>
                <small>
                    <img src="images/red_block.png" height="20px" width="20px" style="border:1px solid;">
                    slot already booked<br>
                    <img src=" images/white_block.png" height="20px" width="20px" style="border:1px solid;">
                    slot available
                </small>
            </p>
        </div>
    </div>
</body>

</html>

<?php
$sql_user = "SELECT * FROM users WHERE uid='1'";
$result_user = mysqli_query($conn, $sql_user);
$row_user = mysqli_fetch_assoc($result_user);
$user_name = $row_user['uname'];
if (isset($_POST['submit'])) {
    $sql_check = "SELECT * FROM parking_details1 WHERE uid='1'";
    $result_check = mysqli_query($conn, $sql_check);
    if (mysqli_fetch_assoc($result_check) == 0) {
        $sql = "INSERT INTO `parking_details1`(`uname`,`uid`, `slot_date`, `start_time`,`no_of_hr`,`exit_time`) VALUES ($uname','$uid','$slot_date','$start_time','$no_of_hr','$exit_time')";

        $result = mysqli_query($conn, $sql);
    } else if (mysqli_fetch_assoc($result_check) == 1) {
        $sql = "UPDATE `parking_details1` SET `slot_date`='$slot_date',`start_time`='$start_time',`no_of_hr`='$no_of_hr',`exit_time`='$exit_time' WHERE $user_id='$user_id'";
        $result = mysqli_query($conn, $sql);
    }
}
?>

<?php

include('../include/connect.php');


$uid = 1];
$slot_id = $_GET['slot_id'];

$sql = "SELECT * FROM parking_details WHERE user_id=$user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$start_time = $row['start_time'];
$slot_date = $row['slot_date'];

$booking_code = $user_id . $slot_id . $slot_date . $start_time;
//."-". rand(10*45, 100*98)

$sql3 = "UPDATE `slot_master` SET `slot_status`=1 WHERE slot_id=$slot_id";


$result3 = mysqli_query($conn, $sql3);

$filename = $uid . $slot_id;

//ECHO $file2;exit;
$ecc = 'L';
$pixel_Size = 20;
$frame_Size = 5;


$sql2 = "UPDATE `parking_details` SET `slot_id`='$slot_id',`booking_code`='$booking_code' WHERE uid=$uid";
$result2 = mysqli_query($conn, $sql2);
//echo $sql2;exit;
$sql3 = "SELECT * FROM `users` WHERE `uid`='$uid'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);

//echo "<center><img src='".$file."'></center>"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Ticket</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .fa {
            color: black;
            padding: 10px;
        }

        .container {
            padding-top: 20px;
        }

        .card {
            border-radius: 0px;
        }

        .btn {
            border-radius: 0px;
        }

        h5 {
            font-size: 20px;
            padding: 10px;
        }

        small {
            font-size: 15px;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="alert alert-success" role="alert">
            Sucessfully confirmed!
        </div>


        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <center>
                    <div class="card" style="width: 22rem;">
                        <h5>ONLINE PARKING BOOKING</h5>
                        <small>**Address** <?php echo date("d-m-Y") . ' ' . date("h:iA"); ?></small>
                        <hr>
                        <img src="<?php echo $file ?>" class="card-img-top" style="width:200px;height:200px; margin-left: auto;margin-right: auto;" alt="booking qr">
                        <div class="card" style="padding:2px;border: 2px solid black;border-left:none;border-right:0px;border-radius:0px;">
                            TICKET NUMBER :
                            <?PHP echo $booking_code ?>
                        </div>
                        <ul class="list-group list-group-flush">
                            <h4 class="card-text"><?php echo strtoupper($row3['user_name']); ?></h4>
                            <li class="list-group-item">SLOT NUMBER : <?php echo $slot_id; ?></li>
                            <li class="list-group-item">DATE : <?php echo $row['slot_date']; ?></li>
                            <li class="list-group-item">TIME : <?php echo $row['start_time']; ?></li>
                            <li class="list-group-item">TOTAL PRICE : $<?php echo $row['no_of_hr'] * 10; ?></li>
                        </ul>
                    </div>

                </center>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    </div>


</body>

</html>

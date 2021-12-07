<?php 
    include('config.php'); 

    // connect to DB
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if (!$conn) {
        echo 'Connection error : ' . mysqli_connect_error();
        exit;
    }

    $sql = 'SELECT * FROM rental';
    $result = mysqli_query($conn, $sql);
    $rentals = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

    <div class="container">
        <h2 class="text-center">Car Rental</h2>

        <form class="form-rental">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="car_type">Car Type</label>

                    <select class="form-control" id="car_type" required>
                        <option selected value="">Choose...</option>

                        <?php foreach($rentals as $rental) { ?>
                            <option value=<?php echo $rental['price'] ?> ><?php echo $rental['car_type'] ?></option>
                        <?php } ?>
                    </select>               
                    
                </div>

                <div class="form-group col-md-6">
                    <label for="price">Price per week</label>
                    <input type="text" class="form-control" id="price" disabled>
                </div>
            </div>        

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pickup_date">Pick-Up Date</label>
                    <input type="date" class="form-control" id="pickup_date" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="return_date">Return Date</label>
                    <input type="date" class="form-control" id="return_date" required>
                </div>
            </div>    

            <hr>
            <button class="btn btn-primary btn-block" type="submit">Complete Reservation</button>

        </form>
    </div>


    <script src="js/rental.js"></script>
    
</body>

</html>

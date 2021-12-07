<?php

include('../include/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Slot</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script language="javascript">
        $(document).ready(function() {
            $("#txtdate").datepicker({});
        });
    </script>

    <style>
        .card {
            border: 1px solid black;
            border-radius: 0px;
        }

        .card-header {
            border-bottom: 1px solid black;
        }

        .form-control,
        .btn,
        .custom-select {
            border-radius: 0px;
        }

        .container {
            margin-top: 150px;
            position: auto;
        }

        #price {
            margin-top: 50px;
        }

        p {
            text-align: center;
            font-size: 15px;
        }

        #service_card {
            margin-top: 10px;
            margin-bottom: 10px;
            border-right: none;
            border-left: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Enter Details
                    </div>
                    <div class="card-body">
                        <form action="../book_slot2.php?user_id=<?php echo $_SESSION['user_id']; ?>" method="post">

                            <div class="form-label"><small><b>Date</b></small></div>
                            <input type="text" name="slot_date" id="txtdate" placeholder="MM/DD/YY" class="form-control" required>

                            <div class="form-label"><small><b>Start Time [hh:mm:AM/PM]</b></small></div>
                            <input type="time" id="time" name="start_time" class="form-control" required>

                            <div class="form-label"><small><b>Select Hours</b></small></div>
                            <select class="custom-select mr-sm-2" name="no_of_hr" required>
                                <option selected>Choose...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="8">8</option>
                                <option value="12">12</option>
                                <option value="24">24</option>
                            </select>
                            <div class="card" id="service_card">
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                     Low End Parking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                     Parking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                       VIP Parking
                                    </label>
                                </div>

                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Confirm</button>
                            <a href="../user_dashboard.php" class="btn btn-primary">Cancel</a>
                        </form>
                    </div>
                </div>
                <div id="price">
                    <p class="alert alert-dark">
                       Low-end Parking: $5/hr
                    </p>
                    <p class="alert alert-dark">
                         Parking: $10/hr
                    </p>
                    <p class="alert alert-dark">
                        VIP Parking: $125/hr
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>

</body>

</html>
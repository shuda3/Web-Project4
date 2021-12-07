<?php
    session_start();

    include('config.php'); 
    include('create_table.php');

    header("Content-Type: application/json");

    $payload = json_decode(file_get_contents("php://input"));

    // connect to DB
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if (!$conn) {
        $status = array("status" => "error", "message" => 'Connection error : ' . mysqli_connect_error());
        echo json_encode($status);
        exit;
    }

    $billing = $payload->billing;
    $street = mysqli_real_escape_string($conn, $billing->street);
    $city = mysqli_real_escape_string($conn, $billing->city);
    $state = mysqli_real_escape_string($conn, $billing->state);
    $phone = mysqli_real_escape_string($conn, $billing->phone);
    $zipcode = mysqli_real_escape_string($conn, $billing->zipcode);
    $country = mysqli_real_escape_string($conn, $billing->country);
    $cardCVV = mysqli_real_escape_string($conn, $billing->cardCVV);
    $cardExpiration = mysqli_real_escape_string($conn, $billing->cardExpiration);
    $cardName = mysqli_real_escape_string($conn, $billing->cardName);
    $cardNumber = mysqli_real_escape_string($conn, $billing->cardNumber);
    $totalOrder = $billing->totalOrder;

    $sql = "INSERT INTO orders(street, city, `state`, phone, zipcode, country, cardCVV, cardExpiration, cardName, cardNumber, totalOrder) VALUES('$street', '$city', '$state', '$phone', '$zipcode', '$country', '$cardCVV', '$cardExpiration', '$cardName', '$cardNumber', $totalOrder)";

    if (mysqli_query($conn, $sql)) {
        $order_id = mysqli_insert_id($conn);

        $products = $payload->cart;

        foreach($products as $item) {

            $product = $item->product;
            $price = $item->price;
            $quantity = $item->quantity;

            $sql = "INSERT INTO order_details(orderid, product, quantity, price) VALUES ( $order_id, '$product', $quantity, $price)";

            if (!mysqli_query($conn, $sql)) {
                $status = array("status" => "error", "message" => mysqli_errno($conn));
                echo $status;
                exit;
            }
        }

        $status = array("status" => "ok", "message" => 'Order number ' .  $order_id . ' created');

    } else {
        $status = array("status" => "error", "message" => mysqli_errno($conn));
    }

    
    mysqli_close($conn);
    
    echo json_encode($status);    
?>

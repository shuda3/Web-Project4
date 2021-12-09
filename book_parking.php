<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Available Parking
		</title>
			<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
		<style>
			a{
				font-size:25px;	
			}
			*{
					text-align:center;
			}
			html{
				background: url(slide5.jpg) no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 390px
			}
			table {
			 border-collapse: collapse; 
			}
			tr/*:nth-child(3)*/ {
			 border: solid thin;
			}
			table,tr,td{
				margin:auto;
			}
			
			.square-container {
				display: flex;
				flex-wrap: wrap;
				align-items: center;
				justify-content: center;
			}

			.square {
				position: relative;
				flex-basis: calc(2%);
				margin: 5px;
				border: 1px solid;
				box-sizing: border-box;
				
			}

			.square::before {
				content: '';
				display: block;
				padding-top: 100%;
			}

			.square .content {
				position: absolute;
				top: 0; left: 0;
				height: 10px;
				width: 10px;
			}
			
			.available {
				background-color: green;
			}
			
			.taken {
				background-color: red;
			}
		</style>
	</head>
	<body>
		<div>
			<ul>
				<li><a href="navigation.html"><i class="fa fa-desktop" aria-hidden="true"></i> Home </a></li>
			</ul>
		</div>
		<h2>AVAILABLE PARKING</h2>
		
		<div class="square-container">

		  <div class="square taken">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
			</div>
		  </div>

		  <div class="square taken">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
		  </div>
			</div>
		</div>
		<br>
		<div class="square-container">

		  <div class="square taken">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
			</div>
		  </div>

		  <div class="square taken">
			<div class="content">
			</div>
		  </div>

		  <div class="square taken">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
		  </div>
			</div>
		</div>
		<br>
		
		<div class="square-container">

		  <div class="square taken">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
		  </div>
			</div>
		</div>
		<br>
		
		<div class="square-container">

		  <div class="square available">
			<div class="content">
			</div>
		  </div>

		  <div class="square taken">
			<div class="content">
			</div>
		  </div>

		  <div class="square available">
			<div class="content">
			</div>
		  </div>

		  <div class="square taken">
			<div class="content">
			</div>
		  </div>

		  <div class="square taken">
			<div class="content">
		  </div>
			</div>
		</div>
		<br><br><br>
		
		<div class="square-container">

		  <div class="square available">
			<div class="content">
			</div>
		  </div>
			<h3> Available </h3>
		  <div class="square taken">
			<div class="content">
			</div>
		  </div>
		  <h3> Taken </h3>
		</div>
		
		<div text-align="center">
			<form>
				<label for="spot"> Spot Number: </label> <br><br>
				<input type="text" name="spot"><br><br>
				<input type="submit" value="Submit">
			</form>
		</div>
		
		<?php

					require_once('Database Connection file/mysqli_connect.php');
					
						$query="SELECT spot_no,type,price,available FROM parking_details where available = 1";
						
						$result = mysqli_query($dbc, $query);

							echo "<form action=\"book_parking_payment.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr>
							<th>Spot Number</th>
							<th>Type</th>
							<th>Price</th>
							<th>Availablity</th>
							<th>Select</th>
							</tr>";
							while($row = mysqli_fetch_row($result)) {
        						echo "<tr>
        						<td>".$row[0]."</td>
        						<td>".$row[1]."</td>
								<td>".$row[2]."</td>
								<td>".$row[3]."</td>
								<td><input type=\"radio\" name=\"select_parking\" value=\"".$row[0]."\"></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						?>
							<table cellpadding="5">
				<tr>
					<td class="fix_table">Enter the Number of Days</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="number" name="no_of_days" placeholder="Eg. 2" required></td>
				</tr>
			</table>
 							<?php

    						echo "<input type=\"submit\" value=\"Select Spot\" name=\"Select\">";
    						echo "</form>";
    					//}
					mysqli_close($dbc);
		?>
	</body>
</html>

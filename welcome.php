<?php
include_once 'includes/header.php';
require_once 'includes/database.php';
session_start();

$partitype = $_SESSION['participanttype'];


$sql = "SELECT * FROM regfees WHERE regtype = '$partitype'";
$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);


$dprice=$row['regprice']." ". $row['currency'];


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registered</title>
</head>
<body>
    <div class="content">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 boxStyle" style="padding-right: 0px!important;padding-left: 0px!important;">
		   <div class="panel-body" style="padding-right: 4px!important;padding-left: 4px!important;">
<span class="large-fontsize">
	<h3>Your Registration Details</h3>
	
	<div class="alert alert-success"><?= $_SESSION['message']?></div>
	<b> Name</b>:<span class="firstname"> <?= $_SESSION['firstname']." ". $_SESSION['surname']?></span><br />
	<b>Your Email Adress is:</b><span class="email"> <?= $_SESSION['email']?></span><br />
	<b>Participant type:</b><span class="participanttype"> <?= $_SESSION['participanttype']?></span><br />
	<b>Participant price:</b><span class="participanttype"> <?= $dprice?></span><br />
	<b>Address:</b><span class="address"> <?= $_SESSION['address']?></span><br />
	<b>Country:</b><span class="country"> <?= $_SESSION['country']?></span><br />
	<b>State:</b><span class="state"> <?= $_SESSION['state']?></span><br />
	<b>Phone No:</b><span class="phoneno"> <?= $_SESSION['phoneno']?></span><br />
	<b>Participant Type:</b><span class="participanttype"> <?= $_SESSION['participanttype']?></span><br />
	<b>Company:</b><span class="company"> <?= $_SESSION['company']?></span><br />
	<b>Company Address:</b><span class="companyaddress"> <?= $_SESSION['companyaddress']?></span><br />
	<b>Gender:</b><span class="gender"> <?= $_SESSION['gender']?></span><br />
	
	
	
	<p>Click here <a href="http://cicadi.covenantuniversity.edu.ng">here</a> to go to proceed</p>
		</span>
	</div>

	</div>
	</div>
	</div>
	</body>
	</html>
	
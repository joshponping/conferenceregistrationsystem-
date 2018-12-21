<?php
session_start();
$_SESSION['message']= '';
require_once 'includes/database.php';


//include_once 'includes/classes/partytype.php';
$count = 0;
if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $middlename = $_POST['middlename'];
    $title = $_POST['title'];
    $dietarypreference = $_POST['dietarypreference'];
 
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $phoneno = $_POST['phoneno'];
    $company = $_POST['company'];
    $pemail = $_POST['pemail'];
    $sponsor = $_POST['sponsor'];
    $companyaddress = $_POST['companyaddress'];
    $participanttype = $_POST['participanttype'];
    $specialneeds = $_POST['specialneeds'];
    
    
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    
    $sql = "SELECT COUNT(email) AS num FROM user WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':email', $email);
    
    $stmt->execute();
    
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row['num'] > 0){die('The registration cannot be completed because email already exists!');
    
    }
    
    $sql = "INSERT INTO user (firstname, surname, middlename, title, email, gender, address, country, state, phoneno, pemail, sponsor, company, companyaddress, participanttype, dietarypreference, specialneeds)
 VALUES (:firstname, :surname, :middlename, :title, :email, :gender, :address, :country, :state, :phoneno, :pemail, :sponsor, :company, :companyaddress, :participanttype, :dietarypreference, :specialneeds)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':firstname', $firstname);
    $stmt->bindValue(':surname', $surname);
    $stmt->bindValue(':middlename', $middlename);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':gender', $gender);
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':country', $country);
    $stmt->bindValue(':state', $state);
    $stmt->bindValue(':pemail', $pemail);
    $stmt->bindValue(':phoneno', $phoneno);
    $stmt->bindValue(':sponsor', $sponsor);
    $stmt->bindValue(':company', $company);
    $stmt->bindValue(':companyaddress', $companyaddress);
    $stmt->bindValue(':participanttype', $participanttype);
    $stmt->bindValue(':dietarypreference', $dietarypreference);
    $stmt->bindValue(':specialneeds', $specialneeds);
    $result = $stmt->execute();
    
    
    // More headers
   
    
    
        
    
    if($count > 0){
       
        $_SESSION['email'] = $email;
        
        
        
        
        
        $_SESSION['message'] = 'Thank you for completing your registration.';
        
//         $to = $email;
//         $subject = "Conference Registration";
//         $message = " Thank you for registering for the conference";
//     $headers = "From: cicadi@covenantuniversity.edu.ng \r\n";
//         $headers .= "Reply-To: ".strip_tags('cicadi@covenantuniversity.edu.ng')."\r\n";
//         $headers .= "MIME-Version: 1.0" . "\r\n";
//         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
//        mail($to,$subject,$message,$headers);
//         $price = 'Academics Registration-Regular = #30000.';
//         if($participanttype === 'Academics Registration-Regular'){
//             $_SESSION['message'] = 'Academics Registration-Regular = #30000.';
//         }

        
//         $id = '1';
//         $price = $conn->prepare ("SELECT regprice FROM regfees WHERE id = '$id'");
//         $result = $price->fetch(PDO::FETCH_ASSOC);
//         echo $result['regprice'];
       
        header("location:welcome.php");
        $_SESSION['message'] = 'Thank you for completing your registration.';
        
    }

    else{
        $_SESSION['message'] = "Your registration cannot be completed";
    }
    
   
    
}
?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="includes/header.css"/>
<meta charset="UTF-8">
<title>Register</title>

</head>

<script type="text/javascript">
	function val(){
		
		if(register.gender.value ==""){
			alert("Please select your gender.");
			return false;
			
		}
		if(register.country.value ==""){
			alert("Please select your country.");
			return false;
		}
		if(register.title.value ==""){
			alert("Please select your Title.");
			return false;
		}
		return true;
	}
	


</script>
  
<body>
        <div class="content">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 boxStyle" style="padding-right: 0px!important;padding-left: 0px!important;">
		   <div class="panel-body" style="padding-right: 4px!important;padding-left: 4px!important;">
						<h1>Register New Account</h1>
<form class="form" name="register" action="register.php" method="post" enctype="multipart/form-row" autocomplete="off">
<div class="alert alert-error"><? $_SESSION['message']?></div>
<div class="form-group">
			<label for="title">Title*</label>
			<select name="title" id="title" required >
			
			<option value="Mr">Mr</option>
			<option value="Mrs">Mrs</option>
			<option value="Miss">Miss</option>
			
			</select>
      		firstname:*<input type="text" id="firstname" placeholder="first name" name="firstname" required autofocus/>
      		
      		Surname:*<input type="text" id="surname" placeholder="surname" name="surname" required />
      		
     	 	Middlename:<input type="text" id="middlename" placeholder="middle name" name="middlename" />	
     
       Email:*<input type="email" id="email" placeholder="Email Address" name="email"  required/>
      Personal Email:<input type="email" id="pemail" placeholder="Personal Email" name="pemail"  />
     

      <div class="radios">
      <h4>Gender :*</h4>
      <input type="radio" name="gender" value="Male">
      <label for="">Male</label>
      <input type="radio" name="gender" value="Female">
      <label for="">Female</label>
      
  		 <br />Address:*<input type="text" id="address" placeholder="Enter address" name="address" required />
    
   
    Select your country:*<select class="form-control" id="country" name="country" class="form-control select2-default" data-placeholder="Select Your Country" >
    <option value=""> SELECT YOUR COUNTRY</option>
    <?php 
    $sql = "select distinct country, countrycode FROM countries order by countryid";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row['country']."'>".$row['country']."</option>";
    }
    
    ?>
    
   </select>

    
    Select your state:* <select class="form-control" id="state" name="state" class="form-control select2-default" data-placeholder="Select Your State" required >
    <option value=""> State/Province</option>
     <?php 
    $sql = "select distinct state_name, state_code FROM states order by state_code";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row['state_name']."'>".$row['state_name']."</option>";
    }
    ?>
    </select>

    
     Participant type:* <select class="form-control" id="participanttype" name="participanttype" class="form-control select2-default" data-placeholder="Select Your participant type"  required>
    <option value=""> SELECT PARTICIPANT TYPE</option>
    <?php 
    $sql = "select distinct regtype FROM regfees order by id";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row['regtype']."'>".$row['regtype']."</option>";
    }
    
    ?>
    
    </select>

    
Phone No:*<input type="tel" id="phoneno" placeholder="Phone no" name="phoneno" required />
Sponsor Information:<input type="text" id="sponsor" placeholder="Sponsor Information" name="sponsor"  />
Enter Your Company Name<input type="text" id="company" placeholder="Institution/Company Name" name="company"  />
</div>

   Enter Company Address: <input type="text" id="companyaddress" placeholder="Institution/Company Address" name="companyaddress"  />
	Dietary Preference:<input type="text" id="dietarypreference" placeholder="Dietary Preference" name="dietarypreference"  />
	Special Needs:<input type="text" id="specialneeds" placeholder="Special Needs" name="specialneeds"  />
    
</div>

      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" onclick="return val();" />
   
    
    </form>
  </div>
</div>
</div>
</div>
    </body>
</html>
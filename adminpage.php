<?php 



require_once 'includes/database.php';
include_once 'lib/password.php';
include_once 'includes/header.php';


$sql = "select * FROM user";


$stmt = $conn->prepare($sql);
$stmt->execute();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">	
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js 
	"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js 
	"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js 
	"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js 
	"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js "></script>
	
	
	
	
	<title>REGISTERED DATA</title>
	
	</head>
	<body>
	<div class="container-fluid">
        <div class="row">

        
        </div>
      
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                
                
                  <thead>
		<tr>
		
			<th>Title</th>
			<th>Firstname</th>
			<th>MiddleName</th>
			<th>Surname</th>
			<th>Password</th>
			<th>Gender</th>
			<th>Address</th>
			<th>Country</th>
			<th>State</th>
			<th>phone No</th>
			<th>Personal email</th>
			<th>Sponsor</th>
			<th>Company</th>
			<th>Company Address</th>
			<th>Participant Type</th>
			<th>Dietary Preference</th>
			<th>SpecialNeeds</th>
			<th>Confirmpassword</th>
		</tr>
		</thead>
		<tbody>
		
		<?php 
		while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
		    echo "<tr>";
		      echo "<td>".$rows['title']."</td>";
		      echo "<td>".$rows['firstname']."</td>";
		      echo "<td>".$rows['middlename']."</td>";
		      echo "<td>".$rows['surname']."</td>";
		      echo "<td>".$rows['password']."</td>";
		      echo "<td>".$rows['gender']."</td>";
		      echo "<td>".$rows['address']."</td>";
		      echo "<td>".$rows['country']."</td>";
		      echo "<td>".$rows['state']."</td>";
		      echo "<td>".$rows['phoneno']."</td>";
		      echo "<td>".$rows['pemail']."</td>";
		      echo "<td>".$rows['Sponsor']."</td>";
		      echo "<td>".$rows['company']."</td>";
		      echo "<td>".$rows['companyaddress']."</td>";
		      echo "<td>".$rows['participanttype']."</td>";
		      echo "<td>".$rows['dietarypreference']."</td>";
		      echo "<td>".$rows['specialneeds']."</td>";
		      echo "<td>".$rows['confirmpassword']."</td>";
		      
		      
		      echo "</tr>"; 
		    
		        
		}
		
		
		?>
		
		</tbody>
		</table>
		 </div>
            
        </div>
    </div>
    
	</body>

</html>





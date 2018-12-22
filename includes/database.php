<?php 
//$db= new PDO('mysql:host=localhost; dbname=cucrid_new; charset=utf8mb4', 'root', '');
//echo "hjhj";



/*$conString = 'mysql:dbname=cucrid_new;host=localhost';
		try{
			$db = new PDO($conString, "root", "", array (	
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
			));
			
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			echo $this->ExceptionLog($e->getMessage());
			die();
		}

		*/
		date_default_timezone_set("Africa/Lagos");
		//include_once('covenantportalfunctions.php');
		//include_once('covenantportalconfig.php');
		//include_once('myfunction.php');
		
		$servername = "localhost";
		$dbname= "accounts";
		$username= "root";
		$password= "";

			$db = "mysql:dbname=$dbname;host=$servername";
			try{
				$conn = new PDO($db, $username, $password ,array
					(PDO:: MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
				$conn -> setAttribute (PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
				//$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC_ARRAY);
			}
			catch (PDOException $e){
				echo $this -> ExceptionLog($e->getMessage());
				die();
			}
?>

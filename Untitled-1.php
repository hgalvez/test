<?php


// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
/*if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
*/

//$serverName = "localhost"; //serverName\instanceName
//$connectionInfo = array( "Database"=>"findmy_naigroupNWS", "UID"=>"findmy_naiUser", "PWD"=>"Comelon_26");
//$serialnumber= "WO-1351621-L3-25418-18024";//$_POST["SN"];
//$serialnumber= $_GET["serialNumber"];
///$case=0;

//$conn = mysqli_connect( $serverName, "findmy_naiUser", "Comelon_26", "findmy_naigroupNWS");

/*

if( $conn ) {
     //echo "<br />";
	 



}else{
     echo "Connection could not be established.<br />";
    die( print_r( mysqli_error(), true) );
}

//For getting Partnumber

$sql= "SELECT * FROM MultifiberResults where SerialNumber ='$serialnumber' LIMIT 0, 1";
$stmt = mysqli_query( $conn, $sql );

		if( $stmt === false ) {
			 die( print_r( mysqli_error(), true) );
		}

$row = mysqli_fetch_assoc($stmt);
$partnum = $row['PartNumber'];
$ILResult_1 = $row['ILResult_1'];
$ILResult_2 = $row['ILResult_2'];
$BRResult_1 = $row['BRResult_1'];
$BRResult_2 = $row['BRResult_2'];
$RLA1 = $row['RLA1'];
$RLB1 = $row['RLB1'];
$RLA2 = $row['RLA2'];
$RLB2 = $row['RLB2'];

//check if serialnumber exists
if ( empty($partnum) ) {
	header("location: notfound.php");
    exit;
}
*/
//////////////////////// JSON Code Starts ////////////////////

///// USING HTTP POST ////////
/*
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$conn = new mysqli("localhost", "findmy_naiUser", "Comelon_26", "findmy_naigroupNWS");
$stmt = $conn->prepare("SELECT * FROM MultifiberResults where SerialNumber ='$serialnumber' LIMIT 0, 1");
$stmt->bind_param("ss", $obj->table, $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

*/
////////////////////////////////////

///// USING HTTP GET ////////

///  Get all details from Serial number
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["serialNumber"], false);
$serialnumber= $_GET["serialNumber"];

$conn = new mysqli("localhost", "findmy_naiUser", "Comelon_26", "findmy_naigroupNWS");
//$stmt = $conn->prepare("SELECT * FROM MultifiberResults where SerialNumber ='$serialnumber'");
$stmt = $conn->prepare("SELECT * FROM MultifiberResults M INNER JOIN naiassembly A ON M.SerialNumber = A.serialnumber WHERE M.SerialNumber ='$serialnumber'");
$stmt->bind_param("ss", $obj->table, $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp1 = $result->fetch_all(MYSQLI_ASSOC);

$json1 = json_encode($outp1);

echo $json1;

mysqli_free_result( $stmt);


//////////////////////////////

///  GET ALL THE VALUES OF CABLE INFO FROM NAIASSEMBLY

/*
$stmt = $conn->prepare("SELECT * FROM naiassembly where serialnumber ='$serialnumber'");
$stmt->bind_param("ss", $obj->table, $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp2 = $result->fetch_all(MYSQLI_ASSOC);

$json2 = json_encode($outp2);

$outputs[] = json_decode($json1, true);
$outputs[] = json_decode($json2, true);
$json_merge = json_encode($outputs);

echo json_encode($outputs);
*/
//echo $json1;
//echo $json2; 



/*<?php echo $outp1; ?>
<?php echo $outp2; ?>
*/
//echo json_encode($outp); original

//mysqli_free_result( $stmt);






//////////////////////////////

//////////////////////// JSON Code Ends ///////////////////////
	
/*
mysqli_free_result( $stmt);



//GET ALL THE VALUES OF CABLE INFO FROM NAIASSEMBLY

$sql= "SELECT * FROM naiassembly where serialnumber ='$serialnumber' LIMIT 0, 1";
$stmt = mysqli_query( $conn, $sql );

		if( $stmt === false ) {
			 die( print_r( mysqli_error(), true) );
		}


$row = mysqli_fetch_assoc($stmt);
$descrip = $row['descrip'];
$wavelength = $row['wavelength'];
$connector = $row['connector'];
$il_limit = abs($row['il_limit']);
$rl_limit = abs($row['rl_limit']);
$creatorid = $row['creatorid'];
$creationdate = $row['creationdate'];
$testerid = $row['testerid'];


//SET FIBER TYPE
		if ($wavelength == 850) 
			$fibertype = "MM";

		if ($wavelength == 1310/1550 OR $wavelength == 1310) 
			$fibertype = "SM";
		
		
mysqli_free_result( $stmt);
   
			
			
			
			
			
		
			
			

//For 1310 case 1

		if ( !empty($ILResult_1) && empty($ILResult_2) ) {
			$case=1;
			$width =700;
			//echo "case:$case";

					$sql = "SELECT  ILResult_1, BRResult_1, BRResult_2 FROM MultifiberResults where SerialNumber ='$serialnumber'";
					$stmt = mysqli_query( $conn, $sql );
					if( $stmt === false) {
						die( print_r( mysqli_error(), true) );
					}

					
		}


//For 1310/1550 using BRresult, case 2

		if ( !empty($ILResult_1) && !empty($ILResult_2) && !empty($BRResult_1)  ) {
			$case=2;
			$width =850; //width for table
			//echo "case:$case";

					$sql = "SELECT  ILResult_1, ILResult_2, BRResult_1, BRResult_2, RLA2, RLB2 FROM MultifiberResults where SerialNumber ='$serialnumber'";
					$stmt = mysqli_query( $conn, $sql );
					if( $stmt === false) {
						die( print_r( mysqli_error(), true) );
					}

					
		}

//For 1310/1550 using RLA, case 3

		if ( !empty($ILResult_1) && !empty($ILResult_2) && !empty($RLA1)  ) {
			$case=3;
			$width =850; //width for table
			//echo "case:$case";

					$sql = "SELECT  ILResult_1, ILResult_2, RLA1, RLB1, RLA2, RLB2 FROM MultifiberResults where SerialNumber ='$serialnumber'";
					$stmt = mysqli_query( $conn, $sql );
					if( $stmt === false) {
						die( print_r( mysqli_error(), true) );
					}

					
		}



			?>






			<!-- This piece of PHP code defines the structure of the html table -->

			 

			<!DOCTYPE html>
			<html>
			<font face="verdana" color="black">


			


				<head>
					<title> NWS Results </title>
				</head>
				<header>
			   <h2>NWS Results </h2>
			   <p></p>
			   </header>
<img src="NWS.jpg" alt="NWS logo" style="width:180px;height:170px;" > <br />


			<?php
			echo "<b>PART#</b> $partnum<br /><br />";
			echo "<b>SERIALNUMBER:</b> $serialnumber<br /><br />";
			echo "<b>CABLE#</b> $descrip<b>    FIBER TYPE:</b> $fibertype<br /><br />";
			echo "<b>WAVELENGTH:</b> $wavelength<br /><br />";
			echo "<b>CONNECTOR TYPE:</b> $connector<br /><br /><br />";
			echo "<b>LOSS LIMIT:</b> ≤ $il_limit dB, <b>RL</b> > $rl_limit dB<br /><br />";
			 
			?>


				<body>

					<table width= "<?php "$width" ?>" border="2" cellpadding="2" cellspacing='1'>
					<tr bgcolor="#2ECCFA">
					
	<?php 
	


//**************************************************************CASE 1***************************************************************
if ($case == 1) {
						
							   
										 echo "<th>   Fiber #</th>";
										 echo "<th>IL 1310</th>";
										 echo "<th>RLIN, 1310</th>";
										 echo "<th>RLOUT, 1310</th>";
										 echo "<th>P/F  </th>";
										 echo "</tr>";

					// We use while loop to fetch data and display rows of date on html table -->


					

					$fiber=0;
					while ($course = mysqli_fetch_array($stmt, MYSQLI_ASSOC)){
					$fiber=$fiber+1;
					
		if ( $course['BRResult_1'] > 65)
			 $course['BRResult_1'] = 65;
		
		if ( $course['BRResult_2'] > 65)
			 $course['BRResult_2'] = 65;
		
		
		
							   echo "<tr>";
								   echo "<td>$fiber</td>";
								   echo "<td>".$course['ILResult_1']."</td>";
								   echo "<td>".$course['BRResult_1']."</td>";
								   echo "<td>".$course['BRResult_2']."</td>";
								   echo "<td>PASS  &ensp;</td>";
								   
							   echo "</tr>";

						 }
						 
			}
			
			
			//**************************************************************CASE 2***************************************************************
if ($case == 2) {
						
							   
										 echo "<th>   Fiber #</th>";
										 echo "<th>IL 1310</th>";
										 echo "<th>IL 1550</th>";
										 echo "<th>RLIN, 1310</th>";
										 echo "<th>RLOUT, 1310</th>";
										 echo "<th>RLIN, 1550</th>";
										 echo "<th>RLOUT, 1550</th>";
										 echo "<th>P/F  </th>";
										 echo "</tr>";

					// We use while loop to fetch data and display rows of date on html table -->

		 if ( $course['BRResult_1'] > 65)
			 $course['BRResult_1'] = 65;
		 
		 if ( $course['BRResult_2'] > 65)
			  $course['BRResult_2'] = 65;
		 
		 if ( $course['RLA2'] > 65)
			  $course['RLA2'] = 65;
		 
		 if ( $course['RLB2'] > 65)
			  $course['RLB2'] = 65;
		 
		 
					

					$fiber=0;
					while ($course = mysqli_fetch_array($stmt, MYSQLI_ASSOC)){
					$fiber=$fiber+1;




							   echo "<tr>";
								   echo "<td>$fiber</td>";
								   echo "<td>".$course['ILResult_1']."</td>";
								   echo "<td>".$course['ILResult_2']."</td>";
								   echo "<td>".$course['BRResult_1']."</td>";
								   echo "<td>".$course['BRResult_2']."</td>";
								   echo "<td>".$course['RLA2']."</td>";
								   echo "<td>".$course['RLB2']."</td>";
								   echo "<td>PASS  &ensp;</td>";
								   
							   echo "</tr>";

						 }
						 
			}
			
			
			
//**************************************************************CASE 3***************************************************************
if ($case == 3) {
						
							   
										 echo "<th>   Fiber #</th>";
										 echo "<th>IL 1310</th>";
										 echo "<th>IL 1550</th>";
										 echo "<th>RLIN, 1310</th>";
										 echo "<th>RLOUT, 1310</th>";
										 echo "<th>RLIN, 1550</th>";
										 echo "<th>RLOUT, 1550</th>";
										 echo "<th>P/F  </th>";
										 echo "</tr>";

					// We use while loop to fetch data and display rows of date on html table -->


					

					$fiber=0;
					while ($course = mysqli_fetch_array($stmt, MYSQLI_ASSOC)){
					$fiber=$fiber+1;

		 if ( $course['RLA1'] > 65)
			  $course['RLA1'] = 65;
		 
		 if ( $course['RLB2'] > 65)
			  $course['RLB2'] = 65;
		 
		 if ( $course['RLA2'] > 65)
			  $course['RLA2'] = 65;
		 
		 if ( $course['RLB2'] > 65)
			  $course['RLB2'] = 65;



							   echo "<tr>";
								   echo "<td>$fiber</td>";
								   echo "<td>".$course['ILResult_1']."</td>";
								   echo "<td>".$course['ILResult_2']."</td>";
								   echo "<td>".$course['RLA1']."</td>";
								   echo "<td>".$course['RLB2']."</td>";
								   echo "<td>".$course['RLA2']."</td>";
								   echo "<td>".$course['RLB2']."</td>";
								   echo "<td>PASS  &ensp;</td>";
								   
							   echo "</tr>";

						 }
						 
			}
			
			
			
			mysqli_free_result( $stmt);
			
					echo "</table>";
					echo "<br><br>";
					
					//WRITE THE ABOVE VALUES
					
			echo "<b>TESTS CONDUCTED BY:</b> $creatorid<br /><br />";
			echo "<b>TEST DATE:</b> $creationdate<br /><br />";
			echo "<b>TESTER:</b> $testerid<br /><br />";
			
					
					
					
					
					?>
					
					<form>
			  <input type="button" value="Return" onclick="history.back()">
			</form>

			   </body>
			</font>
			</html>
			


			*/
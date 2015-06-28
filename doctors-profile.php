<?php
include 'db/config.php';
//Get Category Id
if ( empty($_GET['doctors-id']) )
{
	
  header('Location: doctors.php');
  exit();
}else{
	
	$id = $_GET['doctors-id'];
	
}
$sql_doctors_profile = "SELECT
						doctors.doctors_id,
						doctors.doctors_name,
						doctors.doctors_email,
						doctors.doctors_phone,
						doctors.doctors_designation,
						doctors.doctors_bdmc_no,
						doctors.doctors_speciality,
						doctors.doctors_address,
						doctors_chamber.doctors_chambers_name,
						doctors_chamber.doctors_chambers_address,
						doctors_chamber.doctors_chambers_day,
						doctors_chamber.doctors_chembers_time,
						doctors_chamber.doctors_chambers_new_visit,
						doctors_chamber.doctors_chambers_fee,
						doctors_chamber.doctors_chambers_re_visit,
						doctors_chamber.doctors_chambers_phone,
						doctors.doctors_category
						FROM
						doctors
						INNER JOIN doctors_category ON doctors.doctors_category = doctors_category.doctors_category_id
						INNER JOIN doctors_chamber ON doctors.doctors_chambers = doctors_chamber.doctors_chambers_id
						WHERE
						doctors_id = '$id'";
						

$sql_doctors_category = "SELECT
					doctors.doctors_id,
					doctors.doctors_name,
					doctors.doctors_email,
					doctors.doctors_phone,
					doctors.doctors_designation,
					doctors.doctors_speciality,
					doctors.doctors_address
					FROM
					doctors
					WHERE
					doctors_id = '$id'";
					
$doc_category = mysql_query($sql_doctors_category, $conn) or die ('Problem with query' . mysql_error());

$doc_chamber_result = mysql_query($sql_doctors_profile, $conn) or die ('Problem with query' . mysql_error());



?>

<?php include 'templates/header.php'; ?>			
		
			<section class="shop-result doctors-profile">	
				
				<?php
					while ( $doctor = mysql_fetch_assoc($doc_chamber_result) )
					{						
						$doctors_id = $doctor['doctors_id'];
						$doctors_name = $doctor['doctors_name'];
						$doctors_email = $doctor['doctors_email'];
						$doctors_phone = $doctor['doctors_phone'];
						$doctors_designation = $doctor['doctors_designation'];
						$doctors_bdmc_no = $doctor['doctors_bdmc_no'];
						$doctors_speciality = $doctor['doctors_speciality'];
						$doctors_address = $doctor['doctors_address'];
						$doctors_chambers_name = $doctor['doctors_chambers_name'];
						$doctors_chambers_address = $doctor['doctors_chambers_address'];
						$doctors_chambers_day = $doctor['doctors_chambers_day'];
						$doctors_chembers_time = $doctor['doctors_chembers_time'];
						$doctors_chambers_new_visit = $doctor['doctors_chambers_new_visit'];
						$doctors_chambers_fee = $doctor['doctors_chambers_fee'];
						$doctors_chambers_re_visit = $doctor['doctors_chambers_re_visit'];
						$doctors_chambers_phone = $doctor['doctors_chambers_phone'];
						$doctors_category =	$doctor['doctors_category'];
						
						
						echo '<h3>' . $doctors_name . '\'s Profile (' .$doctors_designation .')</h3>';
						echo '<div class="row event-single">';
						echo '<div class="col-md-12">';
							echo '<h3><a href="doctors-profile.php?doctors-id='. $doctors_id .'">' . $doctors_name . '</a></h3>';
						echo '</div>';
						echo '<div class="col-md-4">';					
							echo '<h5>Designation: ' . $doctors_designation . '</h5>';								
							echo '<h5>Speciality: ' .  $doctors_speciality . '</h5>';
							echo '<h5>BDMC No: ' .  $doctors_bdmc_no . '</h5>';
												
						echo '</div>';
						echo '<div class="col-md-8">';
							echo '<h5>Email:' .  $doctors_email . '</h5>';						
							echo '<h5>Contact: ' .  $doctors_phone . '</h5>';
							echo '<h5>Address: ' .  $doctors_address  . '</h5>';	
							echo '</div>';
						}
						
						
						echo '<h3><b>Chamber<b></h3>';
						 echo '<table border="1" style="width:100%">';
						 echo ' <tr>';
							echo '<td>Day</td>';
							echo '<td>Address 1<br/>'.$doctors_chambers_name.'<br/>' . $doctors_chambers_address . '</td>';
							echo '<td>Address 2</td>';
							echo '<td>Address 3</td>';
						 echo ' </tr>';
						  echo '<tr>';
							echo '<td>' . $doctors_chambers_day . '</td>';
							echo '<td>'.$doctors_chembers_time.' PM </td>';
							echo '<td></td>';
							echo '<td></td>';						
						  echo '</tr>';
						  echo '<tr>';
						  echo '<td>FEE: </td>';		
						  echo '<td>' .$doctors_chambers_new_visit. ' </td>';		
						  echo '</tr>';
						echo '</table> ';
									
					  echo '</div>';

				?>
				
								
			</section>
			
		
		</div>

	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>
	
	
	
<?php include 'templates/footer.php';?>	
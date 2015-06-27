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



?>

<?php include 'templates/header.php'; ?>			
		
			<section class="shop-result medicine-result">	
				
				<?php
					while ( $doctor = mysql_fetch_assoc($doc_category) )
					{
						
						
						$doctors_id = $doctor['doctors_id'];	
						$doctors_name = $doctor['doctors_name'];	
						$doctors_designation = $doctor['doctors_designation'];	
						$doctors_speciality = $doctor['doctors_speciality'];
						$doctors_address = $doctor['doctors_address'];	
						$doctors_phone = $doctor['doctors_phone'];	
						$doctors_email = $doctor['doctors_email'];	
						
						echo '<h3>' . $doctors_name . '\'s Profile (' .$doctors_designation .')</h3>';
						echo '<div class="row event-single">';
						echo '<div class="col-md-12">';
							echo '<h3><a href="doctors-profile.php?doctors-id='. $doctors_id .'">' . $doctors_name . '</a></h3>';
						echo '</div>';
						echo '<div class="col-md-4">';					
							echo '<h5>' . $doctors_designation . '</h5>';								
							echo '<h5>' .  $doctors_speciality . '</h5>';
												
						echo '</div>';
						echo '<div class="col-md-8">';
							echo '<h5>Email:' .  $doctors_email . '</h5>';						
							echo '<h5>Contact: ' .  $doctors_phone . '</h5>';
							echo '<h5>Address: ' .  $doctors_address  . '</h5>';
							
						 echo '</div>';				
					  echo '</div>';
				  			  
						}

				?>
					
			</section>
		
		</div>

	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>
	
	
	
<?php include 'templates/footer.php';?>	
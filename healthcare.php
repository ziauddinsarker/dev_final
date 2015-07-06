<?php
include 'db/config.php';
//Get Category Id
if ( empty($_GET['company_cat_id']) )
{
	
  header('Location: index.php');
  exit();
}else{
	
	$id = $_GET['company_cat_id'];
	
}

$sql_doctors_category = "SELECT
						company.company_id,
						company.company_name,
						company.company_name_short,
						company.company_old_name,
						company.company_address,
						company.compnay_mobile,
						company.company_email,
						company_category.company_cat_name
						FROM
						company
						INNER JOIN company_category ON company.company_business_type = company_category.company_cat_id
						WHERE
						company_category.company_cat_id='$id'";
					
$doc_category = mysql_query($sql_doctors_category, $conn) or die ('Problem with query' . mysql_error());



?>

<?php include 'templates/header.php';?>			
		
			<section class="shop-result medicine-result">	
				<h3>Healthcare Center</h3>
				<?php
						
						
						
					while ( $doctor = mysql_fetch_assoc($doc_category) )
					{
						$company_id = $doctor['company_id'];	
						$company_name = $doctor['company_name'];	
						$company_cat_name = $doctor['company_cat_name'];	
						$company_old_name = $doctor['company_old_name'];
						$company_address = $doctor['company_address'];	
						$compnay_mobile = $doctor['compnay_mobile'];	
						$company_email = $doctor['company_email'];	
						
						echo '<div class="row event-single">';
						echo '<div class="col-md-12">';
							echo '<h3><a href="company-profile.php?company-id='. $company_id .'">' . $company_name . '</a></h3>';
						echo '</div>';
						echo '<div class="col-md-4">';					
							echo '<h5>' . $company_old_name . '</h5>';								
							echo '<h5>' .  $company_cat_name . '</h5>';
												
						echo '</div>';
						echo '<div class="col-md-8">';
							echo '<h5>Email:' .  $company_email . '</h5>';						
							echo '<h5>Contact: ' .  $compnay_mobile . '</h5>';
							echo '<h5>Address: ' .  $company_address  . '</h5>';
							
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
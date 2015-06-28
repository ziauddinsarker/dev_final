<?php
include 'db/config.php';
//Get Category Id
if ( empty($_GET['blog_category']) )
{
	
  header('Location: index.php');
  exit();
}else{
	
	$id = $_GET['blog_category'];
	
}
$sql_category = "SELECT
blog_category.blog_category_id,
blog_category.blog_category_name
FROM
blog_category";

$sql_article = "SELECT
blog_category.blog_category_name,
blog_category.blog_category_id,
blog.blog_title,
blog.blog_id,
blog.blog_description,
blog.blog_category
FROM
blog_category
INNER JOIN blog ON blog.blog_category = blog_category.blog_category_id
WHERE
blog_category.blog_category_id = '$id'";
					
$article = mysql_query($sql_article, $conn) or die ('Problem with query' . mysql_error());
$category_result = mysql_query($sql_category, $conn) or die ('Problem with query' . mysql_error());

?>

<?php include 'templates/header.php'; ?>			
		
			<section class="shop-result medicine-result">	
				
				<?php
				echo '<div class="row">';
					while ( $row = mysql_fetch_assoc($article) )
					{
						
						
						$blog_id = $row["blog_id"];	
						$blog_title = $row["blog_title"];	
						$blog_description = $row["blog_description"];
						
						
						
							echo '<div class="col-md-9">';
								echo '<h2> '.$blog_title.' </h2>';								
								
								echo '<p>'.$blog_description.' </p>';
							echo '</div>';
							}
														
							echo '<div class="3">';
									echo '<h3>Blog Category</h3>';
									echo '<ul>';
									while ( $row = mysql_fetch_assoc($category_result) )
										{
											$blog_category_id = $row["blog_category_id"];
											$blog_category_name = $row["blog_category_name"];
											
											
											echo '<li><a href="category.php?blog_category='.$blog_category_id.'">'.$blog_category_name .'</a></li>';
										}
									echo '</ul>';
							echo '</div>';
						
						echo '</div>';			
				
						

				?>
					
			</section>
		
		</div>

	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>
	
	
	
<?php include 'templates/footer.php';?>	
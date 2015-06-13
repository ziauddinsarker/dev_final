<?php 
include('connect-db.php');

if(isset($_POST['submit'])){	
		
	$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_pass = $_POST['user_password_hash'];

	
	$user_name = mysql_real_escape_string($user_name);
	$user_email = mysql_real_escape_string($user_email);
	
	mysql_query("INSERT INTO users (user_name,user_email,user_password_hash) VALUES ('$user_name','$user_email','$user_password_hash')") or die (mysql_error());
	$_SESSION['success'] = 'Page Added';
	header("Location: http://localhost/dev/deshboard/pages/index.php");
	exit();

}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Deshboard - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Bhalo-Achee Deshboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
           
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
              
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="medicine.php"><i class="fa fa-table fa-fw"></i> Medicine </a>
                        </li>
                        <li>
                            <a href="shop.php"><i class="fa fa-edit fa-fw"></i> Shop</a>
                        </li>
                        <li>
                            <a href="doctors.php"><i class="fa fa-wrench fa-fw"></i>Doctors</a>
                        </li>
						 <li>
                            <a href="users.php"><i class="fa fa-bar-chart-o fa-fw"></i> User</a>
                        </li>
                        <li>
                            <a href="blog.php"><i class="fa fa-sitemap fa-fw"></i> Blog</a>
                        </li>
                 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Edit Users</h1>
                </div>
				
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->		
			
             <div class="row">
                <div class="col-lg-12">
				 <form action="" method="post">
					 <input type="hidden" name="user_id" value="<?php echo $row->user_id;?>"/>
					 <div>					
						 <strong>User Name: *</strong> <input type="text" name="user_name" value="<?php echo $row->user_name;?>"/><br/>
						 <strong>User Email: *</strong> <input type="text" name="user_email" value="<?php echo $row->user_email;?>"/><br/>
						 <input type="submit" name="submit" value="Submit">
					 </div>
				 </form> 

                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
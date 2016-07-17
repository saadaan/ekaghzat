<?php

	include("inc/allclasses.inc.php");
	
	// DB connection 
	$dbconn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
  if ($dbconn->connect_errno) { printf("Connect failed: %s\n", $dbconn->connect_error); exit(); }

		if(isset($_POST['submitform']))
		{
		    $doc_name = $_POST['doc_name'];
//		    $upload_image = $_POST['upload_image'];

				// Uploaded file processing
				define("UPLOAD_DIR", "/var/www/html/ek/docs/");
				$file_name	=	$_FILES['formfile']['name'];
				$tmp	=	$_FILES['formfile']['tmp_name'];
		
				$file_name = "1.".$doc_name.".jpg";
				
		    // preserve file from temporary directory
		    $success = move_uploaded_file($tmp, UPLOAD_DIR . $file_name);
		    if (!$success) { echo "<p>Unable to save file.</p>"; exit; }	

        $sql = "INSERT into docs (user_id,doc_name,path,date)
                      VALUES ('1','$doc_name','/docs/$file_name',NOW())";
        $result = $dbconn->query($sql) or die($dbconn->error.__LINE__);
        $batch_id = $dbconn->insert_id;
				
			echo '<script type="text/javascript">alert("File uploaded successfully.");</script>';
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>e-Kaghzat</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!--Jquery UI CSS-->
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
    <!-- /TinyMCE -->
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <h1>e-Kaghzat</h1>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Saad</li>
                            <li><a href="#">Config</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey">Last Login: X hours ago</span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
            </ul>
        </div>
        <div class="clear">
        </div>
				<?php include('menu.php'); ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Create New Codes</h2>
                <div class="block">

                    <form name="input" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                    <table class="form">
												<tr>
                            <td>
                                <label>Please select the type of document</label>
                            </td>
                            <td>    
                            		<select id="select" name="doc_name">
                                    <option value="cnic_front">CNIC (Front side)</option>
                                    <option value="cnic_back">CNIC (Back side)</option>
                                    <option value="b_form">Form B</option>
                                    <option value="driving_license">Driving License</option>
                                    <option value="matric">Matric Certificate</option>
                                    <option value="graduation_certificate">Graduation Certificate</option>
                                </select>
                             </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Select the image file</label>
                            </td>
                            <td>
															<input type="file" class="form-control" required name="formfile" id="formfile">
														</td>
												</tr>
												<br>
                        <tr>
                            <td>
																<input type="submit" value="Upload" name="submitform">
                            </td>
                        </tr>
                    </table>
                    </form>

                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
            Copyright <a href="#">Aeon Technologies</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>

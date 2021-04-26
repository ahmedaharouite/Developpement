<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
	<title>Mon site PWS en PHP!</title>
</head>
<body>
	<?php include("./include/header.php"); ?>

    <?php include("./include/menus.php"); ?>
    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
        <pre><?php
			echo"Le tableau des dates de naissance:<br>";
			
			$tab = array ("20/09/2001", "01/06/1983", "07/12/1999", "24/06/2005", "12/12/2012");
			
			print_r($tab);
			
			echo"Le tableau des années de naissance:<br>";
			$tab = array (
			date_format(date_create_from_format("d/m/Y","20/09/2001"), "Y"), 
			date_format(date_create_from_format("d/m/Y","01/06/1983"), "Y"), 
			date_format(date_create_from_format("d/m/Y","07/12/1999"), "Y"), 
			date_format(date_create_from_format("d/m/Y","24/06/2005"), "Y"), 
			date_format(date_create_from_format("d/m/Y","12/12/2012"), "Y"));
			print_r($tab);
			
			
		?></pre>
            </div>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>
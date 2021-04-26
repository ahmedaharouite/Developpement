<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
	<title>Consulter les emplacements par année de construction</title>
</head>
<body>
	<?php include("./include/header.php"); ?>

    <?php include("./include/menus.php"); ?>
    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
                <h1>Consulter les emplacements par décennie de parution</h1>

                <br><br>
                <h4>Emplacements</h4>
                <br>

                <form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
                    <input type="radio" name="empl" value="2000" checked="  checked"/> Date de construction/rénovation antérieure à 2000   <br><br>
                    <input type="radio" name="empl" value="2009"/> Date de   construction/rénovation entre 2000 et 2009<br><br>
                    <input type="radio" name="empl" value="2010"/> Date de   construction/rénovation postérieure ou égale à 2010<br><br>
    
                    <input type="submit" name="send" value="Afficher"/><br><br><br>
                </form>

                <?php
                include("./InitTableaux.php");

                $titre_tab = array("Id Empl", "Type de l’emplacement", "Adresse de l’emplacement", "Année de construction");

                if(isset($_POST['empl'])) {

                    if($_POST['empl'] == 2000) {
                        echo "<h2>Emplacements antérieurs à ". $_POST['empl'] ."</h2>";
                        foreach ($TabEmplacement as $empl) {
                            if($empl['anneeConstruction'] < 2000) {
                                $final[] = $empl;
                            }
                        }
                    }
                    if($_POST['empl'] == 2009) {
                        echo "<h2>Emplacements antérieurs à ". $_POST['empl'] ."</h2>";
                        foreach ($TabEmplacement as $empl) {
                            if($empl['anneeConstruction'] >= 2000 && $empl['anneeConstruction'] <= 2009) {
                                $final[] = $empl;
                            }
                        }
                    }
                    if($_POST['empl'] == 2010) {
                        echo "<h2>Emplacements antérieurs à ". $_POST['empl'] ."</h2>";
                        foreach ($TabEmplacement as $empl) {
                            if($empl['anneeConstruction'] > 2010) {
                                $final[] = $empl;
                            }
                        }
                    }

                    echo '<table border 2>';
                    echo '<tr>';
                    foreach ($titre_tab as $titre) {
                        echo '<th>'.$titre.'</th>';
                    }
                    echo '</tr>';
                    foreach ($final as $empl) {
                        echo '<tr>';
                        foreach ($empl as $val) {
                            echo '<td>'.htmlspecialchars($val).'</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                ?>


            </div>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>

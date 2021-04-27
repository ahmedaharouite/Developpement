<div id="sidebar" class="sidebar-offcanvas">
    <div style="padding-top: 30px;" class="col-md-12">
        <ul class="nav nav-pills flex-column">
            
			<?php
				// on récupère le nom du script executé sans son chemin
				$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
				// echo $page;
				echo '<li class="nav-item">';
				if ($page == 'index.php') {
					echo '<a class="nav-link active" href="index.php">Accueil</a>';
				}
				else {
					echo '<a class="nav-link" href="index.php">Accueil</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'Exercice_1_1.php') {
					echo '<a class="nav-link active" href="Exercice_1_1.php">Exercice_1_1</a>';
				}
				else {
					echo '<a class="nav-link" href="Exercice_1_1.php">Exercice_1_1</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'page2.php') {
					echo '<a class="nav-link active" href="Exercice_1_2.php">Exercice_1_2</a>';
				}
				else {
					echo '<a class="nav-link" href="Exercice_1_2.php">Exercice_1_2</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'page3.php') {
					echo '<a class="nav-link active" href="Exercice_1_3.php">Exercice_1_3</a>';
				}
				else {
					echo '<a class="nav-link" href="Exercice_1_3.php">Exercice_1_3</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'Exercice_1_4.php') {
					echo '<a class="nav-link active" href="Exercice_1_4.php">Exercice_1_4</a>';
				}
				else {
					echo '<a class="nav-link" href="Exercice_1_4.php">Exercice_1_4</a>';
				}
				echo '</li>';	
				
				
				echo '<li class="nav-item">';
				if ($page == 'Exercice_1_5.php') {
					echo '<a class="nav-link active" href="Exercice_1_4.php">Exercice_1_5</a>';
				}
				else {
					echo '<a class="nav-link" href="Exercice_1_5.php">Exercice_1_5</a>';
				}
				echo '</li>';	
				
			?>
        </ul>
    </div>
</div>


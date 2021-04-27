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
				if ($page == 'page2.php') {
					echo '<a class="nav-link active" href="page2.php">Affecter Categories</a>';
				}
				else {
					echo '<a class="nav-link" href="page2.php">Affecter Categories</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'page3.php') {
					echo '<a class="nav-link active" href="page3.php">Affiche Titres</a>';
				}
				else {
					echo '<a class="nav-link" href="page3.php">Affiche Titres</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'page4.php') {
					echo '<a class="nav-link active" href="page4.php">Test Multiplie</a>';
				}
				else {
					echo '<a class="nav-link" href="page4.php">Test Multiplie</a>';
				}
				echo '</li>';	
			?>
        </ul>
    </div>
</div>


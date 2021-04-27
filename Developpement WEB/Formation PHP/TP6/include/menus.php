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
				if ($page == 'ConsultDate.php') {
					echo '<a class="nav-link active" href="ConsultDate.php">Consulter les emplacements par année de construction</a>';
				}
				else {
					echo '<a class="nav-link" href="ConsultDate.php">Consulter les emplacements par année de construction</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'ConsultType.php') {
					echo '<a class="nav-link active" href="ConsultType.php">Consulter les emplacements par type</a>';
				}
				else {
					echo '<a class="nav-link" href="ConsultType.php">Consulter les emplacements par type</a>';
				}
				echo '</li>';
				
				echo '<li class="nav-item">';
				if ($page == 'ajoutType.php') {
					echo '<a class="nav-link active" href="ajoutType.php">Ajouer un type</a>';
				}
				else {
					echo '<a class="nav-link" href="ajoutType.php">Ajouer un type</a>';
				}
				echo '</li>';

				echo '<li class="nav-item">';
				echo '<a class="nav-link" href="deconnexion.php">Déconnexion</a>';
				echo '</li>';

				if(isset($_COOKIE['login'])) {
					echo '<li class="nav-item">';
					echo '<a class="nav-link" href="detruireCookie.php">Détruire le cookie</a>';
					echo '</li>';
				}
				
			?>
        </ul>
    </div>
</div>


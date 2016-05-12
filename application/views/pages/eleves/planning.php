<div>
	<div id='planning_consult_nbr'>Nombre d'examens prévus : <?php echo count($exams); ?></div>

	<?php 

		foreach ($exams as $key => $value) {

			echo "<div class='planning_consult_title'>Titre : ".$value[0]->nom."</div>";
			echo "<div class='planning_consult_debut'>Date début : ".$value[0]->debutExamen."</div>";
			echo "<div class='planning_consult_fin'>Date fin : ".$value[0]->finExamen."</div>";
		}
	?>
</div>
<?php 
	if(empty($exams))
		echo "Vous n'avez pas encore d'examens prévus pour le moment.";
	else{

?>
	

		<div>
			<div id='planning_consult_nbr'>Nombre d'examens prévus : <?php echo count($exams); ?></div>

			<?php 

				foreach ($plannings as $planning) {
					echo "<div class='planning_consult_title'>Titre Examen : ".$planning->exam->nom."</div>";
					echo "<div class='planning_consult_debut'>Date début : ".$value[0]->debutExamen."</div>";
					echo "<div class='planning_consult_fin'>Date fin : ".$value[0]->finExamen."</div>";
				}
			?>
		</div>

<?php 
	}
?>
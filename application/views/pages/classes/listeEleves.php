<table>
	<tr><th>Nom Prénom</th><th>Note</th></tr>
<?php
$somme=0;
	foreach ($liste as $a_user) {
		echo "\t".'<tr><td><a href="'. base_url() . '/examens/corriger/'.$a_user->id.'/'.$id.'">'.$a_user->nom.' '.$a_user->prenom.'</a></td><td>'.$note[$a_user->id][0]->total.'</td></tr>'."\n";
		if(!empty($note[$a_user->id][0]->total))
		{
			$somme+=$note[$a_user->id][0]->total;
		}
	}
?>
</table>
<p>Moyenne : <b><?php  echo round($somme/count($note)*100)/100; ?></b></p>
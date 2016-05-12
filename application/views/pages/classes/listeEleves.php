<table>
	<tr><th>Nom Prénom</th><th>Note</th></tr>
<?php
	foreach ($liste as $a_user) {
		echo "\t".'<tr><td><a href="'. base_url() . '/examens/corriger/'.$a_user->id.'/'.$id.'">'.$a_user->nom.' '.$a_user->nom.'</a></td><td>'.$note[$a_user->id][0]->total.'</td></tr>'."\n";
	}
?>
</table>
<p>Moyenne : <b><?php  echo $somme/count($note); ?></b></p>
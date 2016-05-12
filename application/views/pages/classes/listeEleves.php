<table class="table-export">
	<tr><th>Nom</th><th> Prénom</th><th>Note</th></tr>
<?php
$somme=0;
	foreach ($liste as $a_user) {
		echo "\t".'<tr><td><a href="'. base_url() . '/examens/corriger/'.$a_user->id.'/'.$id.'">'.$a_user->nom.'</a></td><td><a href="'. base_url() . '/examens/corriger/'.$a_user->id.'/'.$id.'">'.$a_user->nom.'</a></td><td>'.$note[$a_user->id][0]->total.'</td></tr>'."\n";
		if(!empty($note[$a_user->id][0]->total))
		{
			$somme+=$note[$a_user->id][0]->total;
		}
	}
?>
</table>
<p>Moyenne : <b><?php  echo round($somme/count($note)*100)/100; ?></b></p>

<button id="exporter">Exporter</button>

<script>
//Export des etats sous format XLS (EXCEL)
    $('#exporter').on('click', function (e) {
        var data = {};
        data.table = "";
        $('.table-export').each(function () {
            data.table += $(this).html();
        });
        var texte = '<html><body><table>';
        texte += data.table + '<tr></tr><tr></tr><tr><td>Moyenne :</td><td>'+ <?php echo round($somme/count($note)*100)/100; ?>+ ' </tr></table></body></html>';
        window.open('data:application/vnd.ms-excel,' + texte);
        e.preventDefault();
    });
</script>
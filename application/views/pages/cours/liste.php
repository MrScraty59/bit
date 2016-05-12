<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="row">
            <h1 class="hr">Liste des cours</h1>
        </div>
        <div class="row">
            <div class="col-sm-offset-10 col-sm-2">
                <a href="<?php echo base_url('cours/creer'); ?>" class="btn btn-default">Créer un cours</a>
            </div>
        </div>
        <div class="row">
            <table width="100%">
                <thead>
                    <tr>
                        <th width="20%">Id</th>
                        <th width="20%">Intitulé</th>
                        <th width="10%" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cours as $cour): ?>
                        <tr>
                            <td><?= $cour->id; ?></td>
                            <td><?= $cour->intitule; ?></td>
                            <td style="text-align:center;"><i class="fa fa-cog"></i> <i class="fa fa-edit"></i> <a href="<?= base_url('cours/delete/'.$cour->id); ?>"<i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

</script>
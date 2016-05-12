<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="row">
            <h1 class="hr">Liste des examens</h1>
        </div>
        <div class="row">
            <div class="col-sm-offset-10 col-sm-2">
                <a href="<?php echo base_url('examens/creer'); ?>" class="btn btn-default">New examen</a>
            </div>
        </div>
        <div class="row">
            <table width="100%">
                <thead>
                    <tr>
                        <th width="40%">Titre</th>
                        <th width="40%">Cours</th>
                        <th width="20%" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($examens as $exam): ?>
                        <tr>
                            <td><?= $exam->nom; ?></td>
                            <td><?= $exam->cours->intitule; ?></td>
                            <td style="text-align:center;"><i class="fa fa-cog"></i> <i class="fa fa-edit"></i> <a href="<?= base_url('examens/delete/'.$exam->id); ?>"<i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

</script>
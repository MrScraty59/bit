<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="row">
            <h1 class="hr">Liste des professeurs</h1>
        </div>
        <div class="row">
            <div class="col-sm-offset-10 col-sm-2">
                <a href="<?php echo base_url('professeurs/creer'); ?>" class="btn btn-default">Créer un prof</a>
            </div>
        </div>
        <div class="row">
            <table width="100%">
                <thead>
                    <tr>
                        <th width="20%">Nom</th>
                        <th width="30%">Prénom</th>
                        <th width="30%">Email</th>
                        <th width="20%" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user->nom; ?></td>
                            <td><?= $user->prenom; ?></td>
                            <td><?= $user->mail; ?></td>
                            <td style="text-align:center;"><i class="fa fa-cog"></i> <i class="fa fa-edit"></i> <a href="<?= base_url('compte/delete_professeur/'.$user->id); ?>"<i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

</script>
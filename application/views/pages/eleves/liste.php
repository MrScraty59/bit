<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="row">
            <h1 class="hr">Liste des eleves</h1>
        </div>
        <div class="row">
            <div class="col-sm-offset-10 col-sm-2">
                <a href="<?php echo base_url('eleves/creer'); ?>" class="btn btn-default">Créer un éléve</a>
            </div>
        </div>
        <div class="row">
            <table width="100%">
                <thead>
                    <tr>
                        <th width="20%">Nom</th>
                        <th width="20%">Prénom</th>
                        <th width="30%">Email</th>
                        <th width="20%">Classe</th>
                        <th width="10%" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user->nom; ?></td>
                            <td><?= $user->prenom; ?></td>
                            <td><?= $user->mail; ?></td>
                            <td>Classe à rajouter</td>
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
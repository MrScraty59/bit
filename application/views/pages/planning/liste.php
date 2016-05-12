<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="row">
            <h1 class="hr">Liste des examens à venir</h1>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table width="100%">
                    <thead>
                        <tr>
                            <th width="30%">Titre</th>
                            <th width="45%">Cours</th>
                            <th width="15%">Date</th>
                            <th width="15%">Durée</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($plannings as $planning): ?>
                            <tr>
                                <td><?= $planning->examen->nom; ?></td>
                                <td><?= $planning->examen->cours->intitule; ?></td>
                                <td><?= date("d/m/Y", $planning->debut); ?></td>
                                <td><?= $planning->duree; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
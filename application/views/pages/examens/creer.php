<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12" style='margin-top:15px;'>
                <?= form_open(base_url('examens/creer/')); ?>                
                <div class="control-group row col-md-7">
                    <label class="control-label col-md-3 col-centered" for="nom">Titre *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="titre" type="text" placeholder="" class="form-control" value="<?php echo set_value('titre'); ?>" required>
                        <?php echo form_error('titre'); ?>
                    </div>
                </div>
                <div class="control-group row col-md-7">
                    <label class="control-label col-md-3 col-centered" for="cours">Cours *</label>
                    <div class="controls col-md-9 col-centered">
                        <select class='form-control' name='cours'>
                            <?php foreach($cours as $cour): ?>
                                <option value="<?= $cour->id; ?>" <?php echo set_select('cours', $cour->id ); ?>><?= $cour->intitule ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('cours'); ?>
                    </div>
                </div>
                <div class="control-group row col-md-7 question_block">
                    <label class="control-label col-md-3 col-centered" for="cours">Question *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="questions[]" type="text" placeholder="" class="form-control" value="<?php echo set_value('question'); ?>" required> ?
                        <?php echo form_error('questions'); ?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12' style='text-align:right;margin-top:30px;'>
                        <input type='submit' class="btn btn-success" value="Créer l'examen"/>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </section>
</section>
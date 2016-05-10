<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12" style='margin-top:15px;'>
                <?= form_open_multipart(base_url('examens/creer/')); ?>                
                <div class="control-group row col-md-7">
                    <label class="control-label col-md-3 col-centered" for="nom">Nom *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="nom" type="text" placeholder="" class="form-control" value="<?php echo set_value('nom'); ?>" required>
                        <?php echo form_error('nom'); ?>
                    </div>
                </div>
                <div class="control-group row col-md-7">
                    <label class="control-label col-md-3 col-centered" for="prenom">Prénom *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="prenom" name="prenom" type="text" placeholder="" class="form-control" value="<?php echo set_value('prenom'); ?>" required>
                        <?php echo form_error('prenom'); ?>
                    </div>
                </div>
                <div class="control-group row col-md-7">
                    <label class="control-label col-md-3 col-centered" for="metier">Métier *</label>
                    <div class="controls col-md-9 col-centered">
                        <select class='form-control' name='metier'>
                            <option value='veterinaire' <?php if(set_value('metier') == "veterinaire"){echo 'select';} ?>>Vétérinaire</option>
                            <option value='asv' <?php if(set_value('metier') == "asv"){echo 'selected';} ?>>ASV</option>
                        </select>
                        <?php echo form_error('metier'); ?>
                    </div>
                </div>
                <div class="control-group row col-md-7">
                    <label class="control-label col-md-3 col-centered" for="prenom">Informations * (Laisser vide pour supprimer)</label>
                    <div class="controls col-md-9 col-centered">
                        <div class='datas'>
                        <?php 
                        $datas = explode(';',set_value('data'));
                        if($datas){foreach($datas as $data){ ?>
                        <input name="data[]" type="text" placeholder="" class="form-control" value="<?php echo $data; ?>">
                        <?php }} ?>
                        </div>
                        <a class='add_datas btn btn-info'><i class='fa fa-plus-circle'></i>&nbsp;Ajouter un nouveau champs</a>
                        <?php echo form_error('data'); ?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12' style='text-align:right;margin-top:30px;'>
                        <input type='submit' class="btn btn-success" value='Créer le membre'/>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </section>
</section>
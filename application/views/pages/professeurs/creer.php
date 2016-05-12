<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <h4 class="hr">Créer un professeur</h4>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style='margin-top:15px;'>
                <?= form_open(base_url('professeurs/creer/')); ?>  
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="login">Identifiant *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="login" type="text" placeholder="" class="form-control" value="<?php echo set_value('login'); ?>" required>
                        <?php echo form_error('login'); ?>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="sexe">Sexe *</label>
                    <div class="controls col-md-9 col-centered">
                        <select name="sexe" class="form-control">
                            <option value="M">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                        <?php echo form_error('sexe'); ?>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="nom">Nom *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="nom" type="text" placeholder="" class="form-control" value="<?php echo set_value('nom'); ?>" required>
                        <?php echo form_error('nom'); ?>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="prenom">Prénom *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="prenom" type="text" placeholder="" class="form-control" value="<?php echo set_value('prenom'); ?>" required>
                        <?php echo form_error('prenom'); ?>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="email">Email *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="email" type="text" placeholder="" class="form-control" value="<?php echo set_value('email'); ?>" required>
                        <?php echo form_error('email'); ?>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="password">Mot de passe *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="password" type="password" placeholder="" class="form-control" value="<?php echo set_value('password'); ?>" required>
                        <?php echo form_error('password'); ?>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="password_confirm">Mot de passe * (confirmation)</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="password_confirm" type="password" placeholder="" class="form-control" value="<?php echo set_value('password_confirm'); ?>" required>
                        <?php echo form_error('password_confirm'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12' style='text-align:center;margin-top:30px;'>
                <input type='submit' class="btn btn-success" value="Créer le prof"/>
            </div>
        </div>
        <?= form_close(); ?>
    </section>
</section>
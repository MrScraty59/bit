<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <h4 class="hr">Créer un cours</h4>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style='margin-top:15px;'>
                <?= form_open(base_url('cours/creer/')); ?>  
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="intitule">Intitulé</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="intitule" name="intitule" type="text" placeholder="" class="form-control" value="<?php echo set_value('intitulé'); ?>" required>
                        <?php echo form_error('intitule'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12' style='text-align:center;margin-top:30px;'>
                <input type='submit' class="btn btn-success" value="Créer le cours"/>
            </div>
        </div>
        <?= form_close(); ?>
    </section>
</section>
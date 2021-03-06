<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <h4 class="hr">Créer une classe</h4>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style='margin-top:15px;'>
                <?= form_open(base_url('classes/creer/')); ?>  
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="intitule">Intitulé</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="intitule" name="intitule" type="text" placeholder="" class="form-control" value="<?php echo set_value('intitulé'); ?>" required>
                        <?php echo form_error('intitule'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3" style='margin-top:15px;'>
                <ul>
                <?php foreach ($cours as $key => $value) {
                    echo "<li>" . $value->intitule . "<input style='margin-left:5px;' value='" . $value->id . "' type='checkbox' name='coursIds[]'></li>";
                }?>
                </ul>
            </div>

        </div>
        <div class='row'>
            <div class='col-md-12' style='text-align:center;margin-top:30px;'>
                <input type='submit' class="btn btn-success" value="Créer la classe"/>
            </div>
        </div>
        <?= form_close(); ?>
    </section>
</section>
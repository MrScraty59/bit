<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <h4 class="hr">Modifier la classe</h4>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style='margin-top:15px;'>
                <?= form_open(base_url('classes/edit/')); ?>  
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="intitule">Intitulé</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="intitule" value="<?php echo $classe[0]->intitule ?>" name="intitule" type="text" placeholder="" class="form-control" value="<?php echo set_value('intitulé'); ?>" required>
                        <?php echo form_error('intitule'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3" style='margin-top:15px;'>
                <ul>
                <?php 
                $checked = "";
                foreach ($cours as $key => $value) {
                    foreach ($classe as $key => $val) {
                        if($checked != ""){
                            return false;
                        }else{
                            if(json_decode($val->coursIds) == $value->id ){
                                $checked = "checked";
                            }else{
                                $checked = "";
                            }
                        }
                    }
                    echo "<li>" . $value->intitule . "<input style='margin-left:5px;' " . $checked . "value='" . $value->id . "' type='checkbox' name='coursIds[]'></li>";
                }?>
                </ul>
            </div>

        </div>
        <div class='row'>
            <div class='col-md-12' style='text-align:center;margin-top:30px;'>
                <input type='submit' class="btn btn-success" value="Modifier"/>
            </div>
        </div>
        <?= form_close(); ?>
    </section>
</section>
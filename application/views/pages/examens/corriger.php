<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <h4 class="hr">Corriger l'examen de <?php echo $etudiant[0]->nom; ?></h4>
        </div>
        <?= form_open(base_url('examens/notation/')); ?>  
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3" style='margin-top:15px;'>
                <div class="control-group col-sm-12">
                    <label class="control-label col-sm-3 col-centered" for="nom">Titre</label>
                    <div class="controls col-sm-9 col-centered">
                        <?php echo $examen[0]->nom?>
                    </div>
                </div>
                <br/>
                <br/>
                <div class="control-group col-sm-12">
                    <label class="control-label col-sm-3 col-centered" for="cours">Cours </label>
                    <div class="controls col-sm-9 col-centered">
                        <?php echo $examen[0]->intitule  ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="groupQuestion col-sm-offset-3 col-sm-6">
                <?php 
                $total = 0;
                $noteMax = 0;
                foreach ($question as $key => $value) { ?>
                    <div class="col-sm-12">
                        <div class="control-group question_block">
                            <div class="col-sm-12">
                                <h5 class="hr"><?php echo $value->question; ?></h5>
                            </div>
                        </div>
                        <div class="row reponse_block">
                        <div class="col-sm-12">
                            <div class="content_rep">
                                <div class="col-sm-10">
                                    <?php 
                                    $reponse = json_decode($value->reponses);
                                    $points = 0;
                                    if($value->type == 'multiple'){
                                        foreach (json_decode($value->propositions) as $key => $val) {
                                            if($reponse[0] == $val){
                                                if($reponse[0] == json_decode($value->correction)[0]){
                                                    echo '<span style="color:green">'. $val . '</span><br>';
                                                    $points = $value->points;
                                                }else{
                                                    echo '<span style="color:red">'. $val . '</span><br>';
                                                }
                                            }else{
                                                echo '<span>'. $val . '</span><br>';
                                            }
                                        }
                                    }else{
                                        echo '<span>'. $reponse[0] . '</span><br>';
                                    }
                                    $total = $total + $points;
                                    $noteMax = $noteMax + $value->points;
                                    ?>
                                </div>
                                <div class="col-sm-2 pull-right">
                                    <input id="points" style="width:30px" name="points[<?php echo $value->id;?>]" type="text" value="<?php echo $points; ?>" required>
                                    <?php echo '/'.$value->points ?>
                                </div>                            
                            </div>
                        </div>
                <?php } ?>
            </div>
        </div>
        <hr>
        <div class='row'>
            <div class='col-sm-12' style='text-align:right;margin-top:30px;'>
                <div class="scoreTotal">
                    <?php echo 'Total : <span class="score">' . $total . '</span> / ' . $noteMax; ?>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-12' style='text-align:center;margin-top:30px;'>
                <input type='submit' class="btn btn-success" value="Valider la correction "/>
            </div>
        </div>
        <?= form_close(); ?>    
    </section>
</section>
<script>
    $(document).ready(function(){
       $('input').on('change',function(){
         var score = 0;
         $('input[id="points"]').each(function(i){
              score = score + parseFloat($(this).val());
              $('.score').html(score);
         }); 
       });
    });
</script>
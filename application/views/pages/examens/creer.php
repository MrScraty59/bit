<script>
        function voir_check(elem){
        if(elem.checked){
            var value = elem.parent().find('.response').val();
            console.log(value);
        }
    };
</script>
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <h4 class="hr">Créer un examen</h4>
        </div>
        <?= form_open(base_url('examens/creer/')); ?>  
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style='margin-top:15px;'>
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="nom">Titre *</label>
                    <div class="controls col-md-9 col-centered">
                        <input id="nom" name="titre" type="text" placeholder="" class="form-control" value="<?php echo set_value('titre'); ?>" required>
                        <?php echo form_error('titre'); ?>
                    </div>
                </div>
                <br/>
                <br/>
                <div class="control-group col-md-12">
                    <label class="control-label col-md-3 col-centered" for="cours">Cours *</label>
                    <div class="controls col-md-9 col-centered">
                        <select class='form-control' name='cours'>
                            <?php foreach ($cours as $cour): ?>
                                <option value="<?= $cour->id; ?>" <?php echo set_select('cours', $cour->id); ?>><?= $cour->intitule ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('cours'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="groupQuestion">
                <div class="col-md-5 col-md-offset-1 groupQuestionSimple" id="0">
                    <div class="control-group question_block">
                        <div class="col-md-12">
                            <h5 class="hr">Question 1 :</h5>
                        </div>
                        <div class="col-md-12 col-centered">
                            <select name="typeQuestion[0][]" id="typeQuestion" class="form-control typeQuestion" style="width:100%">
                                <option value="multiple">Choix multiple</option>
                                <option value="libre">Réponse libre</option>
                            </select>
                        </div>
                        <div class="controls col-md-12 col-centered">
                            <input id="nom" name="points[0][]" type="text" placeholder="Nombre de points de la question" class="form-control" required>
                            <?php echo form_error('points'); ?>
                        </div>
                        <div class="controls col-md-12 col-centered">
                            <input id="nom" name="questions[0][]" type="text" placeholder="Votre question" class="form-control" value="<?php echo set_value('question'); ?>" required>
                            <?php echo form_error('questions'); ?>
                        </div>
                    </div>
                    <div class="row reponse_block">
                        <div class="col-md-12">
                            <div class="content_rep">
                                <div class="col-md-11">
                                    <input type="text" name="reponse[0][]" placeholder="Choix1" class="form-control response">
                                    <input type="checkbox" onclick="voir_check(this)" class="bonne_reponse" name="bonne_reponse" value='1'> Bonne réponse?
                                </div>
                            </div>
                            <div class="col-md-1">
                                <i class="fa fa-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 center box_new_question">
                <a class="btn NewQuestion"><i class="fa fa-plus"></i><br/><br/>New question</a>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-12' style='text-align:center;margin-top:30px;'>
                <input type='submit' class="btn btn-success" value="Créer l'examen"/>
            </div>
        </div>
        <?= form_close(); ?>
    </section>
</section>

<script>
    $(function () {
        
        function checked(elem){
        if(elem[0].checked){
            var value = elem.parent().find('.response').val();
            console.log(value);
        }
    };
        
        $('body').on('click', '.fa-plus', function () {
            id = $(this).parents('.groupQuestionSimple').attr('id');
            if ($(this).parents('.reponse_block').find('.response').val() != '') {
                $(this).parents('.reponse_block').find('.content_rep').append('<div class="col-md-11"><input type="text" name="reponse[' + id + '][]" placeholder="Choix1" class="form-control">    <input type="checkbox" class="bonne_reponse" name="bonne_reponse"> Bonne réponse?</div>');
            } else {
                alert('Le champs précédent n\'est pas rempli!');
            }
        });

        $('body').on('change', '.typeQuestion', function () {
            id = $(this).parents('.groupQuestionSimple').attr('id');
            if ($(this).val() == "libre") {
                $(this).parents('.groupQuestionSimple').find('.reponse_block').html('');
            } else {
                $(this).parents('.groupQuestionSimple').find('.reponse_block').html('<div class="row reponse_block"><div class="col-md-12"><div class="content_rep"><div class="col-md-11"><input type="text" name="reponse[' + id + '][]" placeholder="Choix1" class="form-control response"><input type="checkbox" class="bonne_reponse" name="bonne_reponse"> Bonne réponse?</div></div><div class="col-md-1"><i class="fa fa-plus"></i></div></div></div>');
            }
            ;
        });
        $('body').on('click', '.box_new_question', function () {
            id = $('.groupQuestionSimple').last().attr('id');
            newid = parseInt(id) + 1;
            if (newid / 2 != Math.round(newid / 2)) {
                var offset = "";
                var div = '</div><div class="row">';
                $('.box_new_question').addClass('col-md-offset-1');
            } else {
                var offset = "col-md-offset-1";
                var div = '';
                $('.box_new_question').removeClass('col-md-offset-1');
            }
            $('.groupQuestion').append(div + '<div class="col-md-5 ' + offset + ' groupQuestionSimple" id="' + newid + '">\n\
                        <div class="control-group question_block">\n\
                            <div class="col-md-12">\n\
                                <h5 class="hr">Question ' + (newid + 1) + ' :</h5>\n\
                            </div>\n\
                            <div class="col-md-12 col-centered">\n\
                                <select name="typeQuestion[' + newid + '][]" id="typeQuestion" class="form-control typeQuestion" style="width:100%">\n\
                                    <option value="multiple">Choix multiple</option>\n\
                                    <option value="libre">Réponse libre</option>\n\
                                </select>\n\
                            </div>\n\
                            <div class="controls col-md-12 col-centered">\n\
                                <input id="nom" name="points[' + newid + '][]" type="text" placeholder="Nombre de points de la question" class="form-control" required>\n\
                            </div>\n\
                            <div class="controls col-md-12 col-centered">\n\
                                <input id="nom" name="questions[' + newid + '][]" type="text" placeholder="Votre question" class="form-control" required>\n\
                            </div>\n\
                        </div>\n\
                        <div class="row reponse_block">\n\
                            <div class="col-md-12">\n\
                                <div class="content_rep">\n\
                                    <div class="col-md-11">\n\
                                        <input type="text" name="reponse[' + newid + '][]" placeholder="Choix" class="form-control response">\n\
                                        <input type="checkbox" onclick="voir_check()" class="bonne_reponse" name="bonne_reponse"> Bonne réponse?\n\
                                    </div>\n\
                                </div>\n\
                                <div class="col-md-1">\n\
                                    <i class="fa fa-plus"></i>\n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
        ');
            return false;
        });
        
        

        $('.box_new_question').each(function () {
            var $this = $(this);
            $this.css('margin-top', ($this.parent().height() / 1.3) - $this.height());
        });
    });
</script>
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <h3 class="hr">Examen : <?= $examen->nom; ?></h3>
            <p class="citation"><?= $examen->cours->intitule; ?></p>
        </div>
        <div class="row">
            <h4 class="hr">Questions</h4>
        </div>
        <?= form_open(base_url('examens/passer/')); ?>
        <div class="row">
            <?php foreach($examen->questions as $question){ ?>
            <div class="col-md-12">
            <p class="citation"><?= $question->question; ?></p>
            <br/>
                <div class="reponses col-md-4 col-md-offset-4">
                    <?php if($question->type == "multiple"){ 
                            $propositions = json_decode($question->propositions);
                            foreach($propositions as $proposition){
                    ?>
                        <input type="checkbox" name="reponses[<?= $question->id; ?>][]" value="<?= $proposition; ?>"/>&nbsp; <?= $proposition; ?><br/>
                    <?php }}else if($question->type == "libre"){ ?>
                        <textarea rows="5" name="reponses[<?= $question->id; ?>][]"></textarea>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class='row'>
            <div class='col-md-12' style='text-align:center;margin-top:30px;'>
                <input type='submit' class="btn btn-success" value="Enregistrer vos réponses"/>
            </div>
        </div>
        <?= form_close(); ?>
    </section>
</section>
<script>
    $(function () {
        $('body').on('click', '.fa-plus', function () {
            id = $(this).parents('.groupQuestionSimple').attr('id');
            if ($(this).parents('.reponse_block').find('.response').val() != '') {
                $(this).parents('.reponse_block').find('.content_rep').append('<div class="col-md-11"><input type="text" name="reponse[' + id + '][]" placeholder="Choix1" class="form-control"></div>');
            } else {
                alert('Le champs précédent n\'est pas rempli!');
            }
        });

        $('body').on('change', '.typeQuestion', function () {
            id = $(this).parents('.groupQuestionSimple').attr('id');
            if ($(this).val() == "libre") {
                $(this).parents('.groupQuestionSimple').find('.reponse_block').html('');
            } else {
                $(this).parents('.groupQuestionSimple').find('.reponse_block').html('<div class="row reponse_block"><div class="col-md-12"><div class="content_rep"><div class="col-md-11"><input type="text" name="reponse[' + id + '][]" placeholder="Choix1" class="form-control response"></div></div><div class="col-md-1"><i class="fa fa-plus"></i></div></div></div>');
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
                                <h5 class="hr">Question ' + newid + ' :</h5>\n\
                            </div>\n\
                            <div class="col-md-12 col-centered">\n\
                                <select name="typeQuestion[' + newid + '][]" id="typeQuestion" class="form-control typeQuestion" style="width:100%">\n\
                                    <option value="multiple">Choix multiple</option>\n\
                                    <option value="libre">Réponse libre</option>\n\
                                </select>\n\
                            </div>\n\
                            <div class="controls col-md-12 col-centered">\n\
                                <input id="nom" name="points[' + newid + '][]" type="text" placeholder="Nombre de points de la question" class="form-control" value="1" required>\n\
                            </div>\n\
                            <div class="controls col-md-12 col-centered">\n\
                                <input id="nom" name="questions[' + newid + '][]" type="text" placeholder="Votre question" class="form-control" value="test" required>\n\
                            </div>\n\
                        </div>\n\
                        <div class="row reponse_block">\n\
                            <div class="col-md-12">\n\
                                <div class="content_rep">\n\
                                    <div class="col-md-11">\n\
                                        <input type="text" name="reponse[' + newid + '][]" placeholder="Choix" value="1" class="form-control response">\n\
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
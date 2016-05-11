<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!empty($error))
    echo $error;

if (!empty($inscription))
    echo $inscription;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>

        <style type="text/css">
            body { padding-top:30px; }
            .form-control { margin-bottom: 10px; }
        </style>
    </head>
    <body>

        <div class="container">    
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <?= form_open(base_url('connexion')); ?>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="login" value="" placeholder="username or email">                                        
                            <?= form_error('login'); ?>
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            <?= form_error('password'); ?>
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <input id="btn-login"  class="btn btn-success" type="submit" value="Login">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="padding-top:15px; font-size:85%" >
                                    Don't have an account! 
                                    <a href="#" onClick="$('#loginbox').hide('slow'); $('#signupbox').show('slow')">
                                        Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>    
                        </form>     



                    </div>                     
                </div>  
            </div>
            <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide('slow'); $('#loginbox').show('slow')">Sign In</a></div>
                    </div>  
                    <div class="panel-body" >
                        <div class="row">
                            <div class="col-md-12" style='margin-top:15px;'>
                                <?= form_open(base_url('eleves/creer/')); ?>  
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
                                <div class="control-group col-md-12">
                                    <label class="control-label col-md-3 col-centered" for="classe">Classe *</label>
                                    <div class="controls col-md-9 col-centered">
                                        <select name="classe" class="form-control">
                                            <option value="10">I4</option>
                                            <option value="20">I5</option>
                                        </select>
                                        <?php echo form_error('classe'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-12' style='text-align:center;margin-top:30px;'>
                                <input type='submit' class="btn btn-success" value="Créer mon compte"/>
                            </div>
                        </div>
                        <?= form_close(); ?>
                        </form>
                    </div>
                </div>




            </div> 
        </div>

    </body>
</html>
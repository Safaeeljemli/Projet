<?php
include 'dbh.inc.php';
include('head.php');
include('menu_dashboard.php');
include('header.php');

$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id' => $_SESSION['userId']]);
$user = $stmt->fetch();
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Profile</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Informations personnelles</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="images/user.png" style="margin-top: 30px;"  alt="Avatar" title="Change the avatar">
                                </div>
                            </div>


                            <br><br>


                            <button type="button" style="margin-left:30px;" class="btn btn-success" data-toggle="modal" data-target="#exampleModalTypCh">
                                <i class="fa fa-edit"></i>Modifier le profile
                            </button>

                            <div class="modal fade fixed" aria-labelledby="myModalLabel" id="exampleModalTypCh" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header well">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                            <h3>Modification du profil</h3>
                                        </div>
                                        <form class='form-horizontal' method="post" action="edit_profile.php">
                                            <div class='modal-body'>
                                                <center>
                                                    <div class='form-group'>
                                                        <label class='col-sm-4 control-label'> Login</label>
                                                        <div class='col-sm-6'>
                                                            <input type='text' class='form-control' name='uid' value="<?php echo $user['username']; ?>" />
                                                            <input type='hidden' class='form-control' name='id' value="<?php echo $user['id']; ?>" />
                                                        </div>
                                                    </div>

                                                    <div class='form-group'>
                                                        <label class='col-sm-4 control-label'> Nom complet</label>
                                                        <div class='col-sm-6'>
                                                            <input type='text' class='form-control' name='nomc' value="<?php echo $user['nom_complet']; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label class='col-sm-4 control-label'> Email</label>
                                                        <div class='col-sm-6'>
                                                            <input type='text' class='form-control' name='email' value="<?php echo $user['email']; ?>" />
                                                        </div>
                                                    </div>

                                                    <div class='form-group'>
                                                        <label class='col-sm-4 control-label'> GSM</label>
                                                        <div class='col-sm-6'>
                                                            <input type='text' class='form-control' name='tel' value="<?php echo $user['tel']; ?>" />
                                                        </div>
                                                    </div>
                                                </center>
                                            </div>
                                            <div class='modal-footer'>
                                                <div class='pull-right'>
                                                    <div id='envoyer'>
                                                        <button type='submit' class='btn btn-primary' name='edit_profile' style='float: right'>Enregistrer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>







                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <!-- start of user-activity-graph -->

                            <!-- end of user-activity-graph -->

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profil</a>
                                    </li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                        <!-- start recent activity -->
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <table class="data table-condensed table-hover table no-margin">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3">Informations Générales</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Nom complet :</td>
                                                        <td><b><?php echo $user['nom_complet']; ?></b></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Fonction :</td>
                                                        <td><b><?php echo $user['type']; ?></b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <table class="data table-condensed table-hover table no-margin">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3">Informations Contact</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Email :</td>
                                                        <td><i class="fa fa-envelope user-profile-icon"></i> <?php echo $user['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Téléphone :</td>
                                                        <td><i class="fa fa-phone user-profile-icon"></i> <?php echo $user['tel']; ?></td>
                                                    </tr>
                                            </table>

                                            <table class="data table-condensed table-hover table no-margin">
                                                <thead>
                                                    <tr>
                                                        <th colspan="5">Informations Connexion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>Login :</td>
                                                        <td><?php echo $user['username']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mot de passe :</td>
                                                        <td>**********</td>
                                                        <td>
                                                            <a style="color:darkred;" href="#modalLogin" title="Modifier" data-toggle="modal" data-target="#modalLogin">changer le mot de passe</a>

                                                        </td>
                                                    </tr>
                                            </table>



                                            <!-- Modal Changer Mot de passe-->
                                            <div id="modalLogin" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-sm">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <br>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h2 class="modal-title">Nouveau mot de passe</h2>
                                                        </div>
                                                        <form action="edit_profile.php" method="POST">
                                                            <div class="modal-body">
                                                                Veuillez renseigner les champs suivants: <br><br>
                                                                <label for="pays">Ancien Mot de Passe: </label>
                                                                <input type="password" class="form-control" name="a_password" maxlength="60" required>

                                                                <label for="pays">Nouveau Mot de Passe: </label>
                                                                <input type='hidden' class='form-control' name='id' value="<?php echo $user['id']; ?>" />

                                                                <input type="password" pattern=".{6,}" class="form-control" placeholder="minimum 6 caractères" name="password" maxlength="60" required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Annuler</button>
                                                                <button type="submit" name="edit_pwd" class="btn btn-sm btn-success">Changer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- end modal-->




                                        </div>
                                        <!-- end recent activity -->

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- start of user-activity-graph -->
                        <div id="graph_bar" style="width:100%; height:280px;"></div>
                        <!-- end of user-activity-graph -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php
include('footer.php');
include('script.php');
?>
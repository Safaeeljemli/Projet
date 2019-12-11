<?php
include('dbh.inc.php');
include('head.php');
include('menu_dashboard.php');
include('header.php');
?>
<html>
    <body>
        <div class="right_col" role="main">

            <!-- ** contunu ** -->
            <div class="">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i> <a href=""></a>
                            </li>
                            <li class="active">
                                <i class="fa fa-users"></i> Clients
                            </li>

                        </ol>
                    </div>
                </div>


                <div class="clearfix"></div>
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-bars"></i> Clients</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a  href="archive_clients.php">
                                    <button class="btn btn-s btn-info" title="ArchiveClients"><i class="fa fa-archive"></i>Archives</button>
                                </a>
                            </li>
                        </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <div id="myTabContent" class="tab-content">


                                        <div class="x_title">

                                            <ul class="nav navbar-right panel_toolbox">
                                                <li>
                                                    <button class="btn btn-xs btn-success" title="Ajouter" data-toggle="modal" data-target="#ModalAjoutClt"><i class="fa fa-plus"></i> Ajouter</button>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="x_content">
                                            <div class="table-responsive">
                                                <form method="post" action="delete.php">
                                                    <table id="datatable-buttons" class="table table-striped table-bordered " cellspacing="0" width="100%">

                                                        <thead style="background:#4B5F71;color:white;">

                                                            <tr>
                                                                <th>Nom </th>
                                                                <th>Prénom</th>
                                                                <th>Age</th>
                                                                <th>Sexe</th>
                                                                <th>P.d'id</th>
                                                                <th>Nationalité</th>
                                                                <th>Tel</th>
                                                                <th>Email</th>
                                                                <th>Situation fam</th>
                                                                <th width="25%"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!--loop-->
                                                            <?php
                                                            $stmt = $conn->prepare('SELECT * FROM clients WHERE statut=1');
                                                            $stmt->execute();
                                                            $clients = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                            foreach ($clients as $client) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $client['nom']; ?>
                                                                        <input type="hidden" name="idcli" value="<?php echo $client['idClient']; ?>" />
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $client['prenom']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $client['age']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $client['sexe']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $client['pieceIdentite']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $client['nationalite']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $client['numTel']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $client['email']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $client['situationFamiliale']; ?>
                                                                    </td>

                                                                    <td width="20%">
                                                                        <button name="archiveclient" class="btnSuppDept btn btn-xs btn-info pull-right" title="archiver">
                                                                            <i class="fa fa-archive"></i> Archiver
                                                                        </button>
                                                                        <button type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#exampleModalCli<?php echo $client['idClient']; ?>">
                                                                            <i class="fa fa-edit"></i>Modifier
                                                                        </button>

                                                                        <div class="modal fade fixed" aria-labelledby="myModalLabel" id="suppCli<?php echo $client['idClient']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header well">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                        <h3>Confirmation de suppression </h3>
                                                                                    </div>
                                                                                    <form class='form-horizontal' method="post" action="edit.php" >
                                                                                        <div class='modal-body'>
                                                                                            <center>
                                                                                                <label class='col-sm-6 control-label'> Êtes-vous sûr de vouloir supprimer <?php echo $client['nom']; ?>"</label>
                                                                                            </center>
                                                                                            <div class='pull-right'>
                                                                                                <div id='envoyer'>
                                                                                                    <button type='submit' class='btn btn-primary' name='deletecli' style='float: right'>Supprimer</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal fade fixed" aria-labelledby="myModalLabel" id="exampleModalCli<?php echo $client['idClient']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header well">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                        <h3>Modification d'un client</h3>
                                                                                    </div>
                                                                                    <form class='form-horizontal' method="post" action="edit.php">
                                                                                        <div class='modal-body'>

                                                                                            <center>
                                                                                                <div class='form-group'>
                                                                                                    <label class='col-sm-6 control-label'> Nom</label>
                                                                                                    <div class='col-sm-6'>
                                                                                                        <input type='text' class='form-control' name='nomcli' value="<?php echo $client['nom']; ?>" />
                                                                                                        <input type='hidden' class='form-control' name='idcl' value="<?php echo $client['idClient']; ?>" />
                                                                                                        <input type='hidden' class='form-control' name='idsession' value="<?php echo $_SESSION['userId']; ?>" />
                                                                                                    </div>
                                                                                                </div><br><br>
                                                                                                <div class='form-group'>
                                                                                                    <label class='col-sm-6 control-label'> Prenom</label>
                                                                                                    <div class='col-sm-6'>
                                                                                                        <input type='text' class='form-control' name='prenomcli' value="<?php echo $client['prenom']; ?>" />
                                                                                                    </div>
                                                                                                </div><br><br>
                                                                                                <div class='form-group'>
                                                                                                    <label class='col-sm-6 control-label'> Age</label>
                                                                                                    <div class='col-sm-6'>
                                                                                                        <input type='text' class='form-control' name='agecli' value="<?php echo $client['age']; ?>" />
                                                                                                    </div>
                                                                                                </div><br><br>
                                                                                                <div class='form-group'>
                                                                                                    <label class='col-sm-6 control-label'> Sexe</label>
                                                                                                    <div class='col-sm-6'>
                                                                                                        <select name='sexe' class='form-control' value='<?php echo $client['sexe']; ?>'>

                                                                                                            <option value='Femme'><?php echo $client['sexe']; ?></option>
                                                                                                            <option value='Homme'><?php if ($client['sexe'] == 'Femme') echo 'Homme';
                                                                    else echo 'Femme'; ?></option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <br><br>
                                                                                                <div class='form-group'>
                                                                                                    <label class='col-sm-6 control-label'> Pieces d'id </label>
                                                                                                    <div class='col-sm-6'>
                                                                                                        <input type='text' class='form-control' name='pieceidcli' value="<?php echo $client['pieceIdentite']; ?>" />
                                                                                                    </div>
                                                                                                </div><br><br>
                                                                                                <div class='form-group'>
                                                                                                    <label class='col-sm-6 control-label'> Nationalité</label>
                                                                                                    <div class='col-sm-6'>
                                                                                                        <input type='text' class='form-control' name='nationalite' value="<?php echo $client['nationalite']; ?>" />
                                                                                                    </div>
                                                                                                </div><br><br>
                                                                                                <div class='form-group'>
                                                                                                    <label class='col-sm-6 control-label'> Tel</label>
                                                                                                    <div class='col-sm-6'>
                                                                                                        <input type='text' class='form-control' name='telcli' value="<?php echo $client['numTel']; ?>" />
                                                                                                    </div>
                                                                                                </div><br><br>
                                                                                                <div class='form-group'>
                                                                                                    <label class='col-sm-6 control-label'> Email</label>
                                                                                                    <div class='col-sm-6'>
                                                                                                        <input type='email' class='form-control' name='emailcli' value="<?php echo $client['email']; ?>" />
                                                                                                    </div>
                                                                                                </div><br><br>
                                                                                                <div class='form-group'>
                                                                                                    <label class='col-sm-6 control-label'> Situation Fam</label>
                                                                                                    <div class='col-sm-6'>
                                                                                                        <select name='situationf' class='form-control' value='<?php echo $client['situationFamiliale']; ?>'>
                                                                                                            <option value='Celibataire'><?php echo $client['situationFamiliale']; ?>Célibataire</option>
                                                                                                            <option value='Marié'><?php if ($client['situationFamiliale'] == 'Célibataire')
                                                                        echo 'Marié';
                                                                    else
                                                                        echo 'Célibataire';
                                                                    ?>Marié</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <br><br><br>

                                                                                            </center>
                                                                                        </div>
                                                                                        <div class='modal-footer'>
                                                                                            <div class='pull-right'>
                                                                                                <div id='envoyer'>
                                                                                                    <button type='submit' class='btn btn-primary' name='editcli' style='float: right'>Enregistrer</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
<?php } ?>

                                                            <!--{% endfor %}-->
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <!--div class="clearfix"></div-->
                </div>
            </div>
        </div>
<?php
// include('modal_add.php');
include('footer.php');
?> 
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="../vendors/iCheck/icheck.min.js"></script>
        <!-- Datatables -->
        <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="../vendors/jszip/dist/jszip.min.js"></script>
        <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>


    </body>
</html> 

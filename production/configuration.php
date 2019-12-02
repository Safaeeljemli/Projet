<?php
include('dbh.inc.php');
include('head.php');
include('menu_dashboard.php');
include('header.php');
?>
<style>

</style>
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i> <a href=""></a>
                    </li>
                    <li class="active">
                        <i class="fa fa-cog"></i> Configuration
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Tables statiques
                    </li>
                </ol>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Configuration des tables statiques</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <button class="btn btn-s btn-info" title="Archives"><i class="fa fa-archive"></i> Archives</button>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Références</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Types de chambres</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Chambres</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Types de reservations</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    <div class="x_title">
                                        <h2>Références</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li>
                                                <button class="btn btn-xs btn-success" title="Ajouter" data-toggle="modal" data-target="#ModalAjoutRef"><i class="fa fa-plus"></i> Ajouter</button>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <form method="post" action="delete.php">
                                                <table id="datatable-button" class="table table-striped table-bordered " cellspacing="0" width="100%">
                                                    <thead style="background:#4B5F71;color:white;">
                                                        <tr>
                                                            <th>Nom </th>
                                                            <th> Couleur</th> 
                                                            <th width="25%"> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--{% for dep in dep %}-->
                                                        <?php
                                                        $references = array();
                                                        $stmt = $conn->prepare('select * from reference where statut=1');
                                                        $stmt->execute();
                                                        $references = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                        foreach ($references as $reference) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $reference['nom']; ?>
                                                                    <input type="hidden" name="idre" value="<?php echo $reference['id']; ?>" />
                                                                </td>
                                                                <td>
                                                                    <input disabled type="color" name="idre" value="<?php echo $reference['couleur']; ?>" />
                                                                </td>
                                                                <td width="20%">
                                                                    <button name="archiveref" class="btnSuppDept btn btn-xs btn-info pull-right" title="archiver">
                                                                        <i class="fa fa-archive"></i> Archiver
                                                                    </button>


                                                                    <button type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#exampleModal<?php echo $reference['id']; ?>">
                                                                        <i class="fa fa-edit"></i>Modifier
                                                                    </button>



                                                                    <div class="modal fade fixed" aria-labelledby="myModalLabel" id="exampleModal<?php echo $reference['id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header well">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    <h3>Modification d'une référence</h3>
                                                                                </div>
                                                                                <form class='form-horizontal' method="post" action="edit.php">
                                                                                    <div class='modal-body'>
                                                                                        <center>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'> Nom</label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='nomref' value="<?php echo $reference['nom']; ?>"/>
                                                                                                    <input type='hidden' class='form-control' name='idref' value="<?php echo $reference['id']; ?>"/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'> Couleur</label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input style="width:50px;" type='color' id="example-color-input" class='form-control' name='couleurref' value="<?php echo $reference['couleur']; ?>"/>
                                                                                                </div>
                                                                                            </div>
                                                                                        </center>
                                                                                    </div>
                                                                                    <div class='modal-footer'>
                                                                                        <div class='pull-right'>
                                                                                            <div id='envoyer'>
                                                                                                <button type='submit' class='btn btn-primary' name='editref' style='float: right'>Enregistrer</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>

                                                        <!--{% endfor %}-->
                                                    </tbody>
                                                </table>
                                            </form>                                                
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                    <div class="x_title">
                                        <h2>Types de Chambres</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li>
                                                <button class="btn btn-xs btn-success" title="Ajouter" data-toggle="modal" data-target="#ModalAjoutTypeChb"><i class="fa fa-plus"></i> Ajouter</button>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <form method="post" action="delete.php">
                                                <table id="table1" class="table table-striped table-bordered " cellspacing="0" width="100%">
                                                    <thead style="background:#4B5F71;color:white;">
                                                        <tr>
                                                            <th>Type </th>
                                                            <th>Nombre de chambres </th>
                                                            <th>Nombre max de pax </th>
                                                            <th width="25%"> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--{% for dep in dep %}-->
                                                        <?php
                                                        $stmt = $conn->prepare('select * from typechambre where statut=1');
                                                        $stmt->execute();
                                                        $typesCh = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                        foreach ($typesCh as $typeCh) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $typeCh['type']; ?>
                                                                    <input type="hidden" name="idtc" value="<?php echo $typeCh['idTc']; ?>" />
                                                                </td>
                                                                <td><?php echo $typeCh['nbrChambre']; ?>
                                                                </td>
                                                                <td><?php echo $typeCh['nbreMaxPax']; ?>
                                                                </td>
                                                                <td width="20%">
                                                                    <button name="archivetypech" class="btnSuppDept btn btn-xs btn-info pull-right" title="archiver">
                                                                        <i class="fa fa-archive"></i> Archiver
                                                                    </button>

                                                                    <button type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#exampleModal<?php echo $typeCh['idTc']; ?>">
                                                                        <i class="fa fa-edit"></i>Modifier
                                                                    </button>



                                                                    <div class="modal fade fixed" aria-labelledby="myModalLabel" id="exampleModal<?php echo $typeCh['idTc']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header well">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    <h3>Modification d'un type de chambre</h3>
                                                                                </div>
                                                                                <form class='form-horizontal' method="post" action="edit.php">
                                                                                    <div class='modal-body'>
                                                                                        <center>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'> Type</label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='typech' value="<?php echo $typeCh['type']; ?>"/>
                                                                                                    <input type='hidden' class='form-control' name='idtch' value="<?php echo $typeCh['idTc']; ?>"/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br><br>

                                                                                            <br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'> Nombre max de pax</label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='nbpx' value="<?php echo $typeCh['nbreMaxPax']; ?>"/>
                                                                                                </div>
                                                                                            </div>
                                                                                        </center>
                                                                                    </div>
                                                                                    <div class='modal-footer'>
                                                                                        <div class='pull-right'>
                                                                                            <div id='envoyer'>
                                                                                                <button type='submit' class='btn btn-primary' name='edittypech' style='float: right'>Enregistrer</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>

                                                        <!--{% endfor %}-->
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                    <div class="x_title">
                                        <h2 style="color:black;">Chambres</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li>
                                                <button class="btn btn-xs btn-success" title="Ajouter" data-toggle="modal" data-target="#ModalAjoutChambre"><i class="fa fa-plus"></i> Ajouter</button>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <form method="post" action="delete.php">
                                                <table id="table2" class="table table-striped table-bordered " cellspacing="0" width="100%">
                                                    <thead style="background:#4B5F71;color:white;">
                                                        <tr>
                                                            <th>Nom </th>
                                                            <th>Description</th>
                                                            <th>Type</th>
                                                            <th>Capacité</th>

                                                            <th width="25%"> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--{% for dep in dep %}-->
                                                        <?php
                                                        $stmt = $conn->prepare('select * from chambre where statut=1');
                                                        $stmt->execute();
                                                        $chambres = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                        foreach ($chambres as $chambre) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $chambre['nomCode']; ?>
                                                                    <input type="hidden" name="idcha" value="<?php echo $chambre['idChambre']; ?>" />
                                                                </td>
                                                                <td><?php echo $chambre['descriptif']; ?>
                                                                </td>
                                                                <td><?php
                                                                    $chb = array();
                                                                    $stmt = $conn->prepare('select * from typechambre where statut=1');
                                                                    $stmt->execute();
                                                                    $x = $chambre['idtypechambre'];


                                                                    $chb = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                                    foreach ($chb as $ch) {
                                                                        $y = $ch['idTc'];

                                                                        if ($x == $y) {
                                                                            echo $ch['type'];
                                                                            break;
                                                                        }
                                                                    }
                                                                    ?>

                                                                </td>
                                                                <td><?php echo $chambre['capacity']; ?>
                                                                </td>
                                                                <td width="20%">
                                                                    <button name="archivecha" class="btnSuppDept btn btn-xs btn-info pull-right" title="archiver">
                                                                        <i class="fa fa-archive"></i> Archiver
                                                                    </button>

                                                                    <button type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#exampleModalCh<?php echo $chambre['idChambre']; ?>">
                                                                        <i class="fa fa-edit"></i>Modifier
                                                                    </button>



                                                                    <div class="modal fade fixed" aria-labelledby="myModalLabel" id="exampleModalCh<?php echo $chambre['idChambre']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header well">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    <h3>Modification d'une chambre</h3>
                                                                                </div>
                                                                                <form class='form-horizontal' method="post" action="edit.php">
                                                                                    <div class='modal-body'>
                                                                                        <center>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-4 control-label'> Nom / Code</label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='nomcodecha' value="<?php echo $chambre['nomCode']; ?>"/>
                                                                                                    <input type='hidden' class='form-control' name='idch' value="<?php echo $chambre['idChambre']; ?>"/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-4 control-label'> Descriptif </label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='descriptifcha' value="<?php echo $chambre['descriptif']; ?>"/>
                                                                                                </div>
                                                                                            </div><br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-4 control-label'> Type</label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <select multiple class='form-control' name='typechamee'>
                                                                                                        <?php
                                                                                                        $chb = array();
                                                                                                        $stmt = $conn->prepare('select * from typechambre where statut=1');
                                                                                                        $stmt->execute();
                                                                                                        $chb = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                                                                        foreach ($chb as $ch) {
                                                                                                            ?>
                                                                                                            <option  value="<?php echo $ch['idTc']; ?>" ><?php echo $ch['type']; ?></option>
                                                                                                        <?php } ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-4 control-label'> Capacité </label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='capacitecham' value="<?php echo $chambre['capacity']; ?>"/>
                                                                                                </div>
                                                                                            </div><br><br>
                                                                                        </center>
                                                                                    </div>
                                                                                    <div class='modal-footer'>
                                                                                        <div class='pull-right'>
                                                                                            <div id='envoyer'>
                                                                                                <button type='submit' class='btn btn-primary' name='editcha' style='float: right'>Enregistrer</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>

                                                        <!--{% endfor %}-->
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                    <div class="x_title">
                                        <h2 style="color:black;">Types de reservations</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li>
                                                <button class="btn btn-xs btn-success" title="Ajouter" data-toggle="modal" data-target="#ModalAjoutTypeRes"><i class="fa fa-plus"></i> Ajouter</button>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <form method="post" action="delete.php">
                                                <table id="table3" class="table table-striped table-bordered " cellspacing="0" width="100%">
                                                    <thead style="background:#4B5F71;color:white;">
                                                        <tr>
                                                            <th>Type </th>
                                                            <th>Couleur </th>
                                                            <th width="25%"> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--{% for dep in dep %}-->
                                                        <?php
                                                        $stmt = $conn->prepare('select * from typereservation where statut=1');
                                                        $stmt->execute();
                                                        $typesres = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                        foreach ($typesres as $typeRes) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $typeRes['type']; ?>
                                                                    <input type="hidden" name="idtyperes" value="<?php echo $typeRes['id']; ?>" />
                                                                </td>
                                                                <td>
                                                                    <input disabled type="color" name="idre" value="<?php echo $typeRes['couleur']; ?>" />
                                                                </td>
                                                                <td width="20%">
                                                                    <button name="archivetyperes" class="btnSuppDept btn btn-xs btn-info pull-right" title="archiver">
                                                                        <i class="fa fa-archive"></i> Archiver
                                                                    </button>

                                                                    <button type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#exampleModalTypRes<?php echo $typeRes['id']; ?>">
                                                                        <i class="fa fa-edit"></i>Modifier
                                                                    </button>



                                                                    <div class="modal fade fixed" aria-labelledby="myModalLabel" id="exampleModalTypRes<?php echo $typeRes['id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header well">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    <h3>Modification d'un type de reservation</h3>
                                                                                </div>
                                                                                <form class='form-horizontal' method="post" action="edit.php">
                                                                                    <div class='modal-body'>
                                                                                        <center>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-4 control-label'> Type</label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='typeres' value="<?php echo $typeRes['type']; ?>"/>
                                                                                                    <input type='hidden' class='form-control' name='idtypere' value="<?php echo $typeRes['id']; ?>"/>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'> Couleur</label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input style="width:50px;" type='color' id="example-color-input" class='form-control' name='coultypere' value="<?php echo $typeRes['couleur']; ?>"/>
                                                                                                </div>


                                                                                            </div>


                                                                                            <br><br>
                                                                                        </center>
                                                                                    </div>
                                                                                    <div class='modal-footer'>
                                                                                        <div class='pull-right'>
                                                                                            <div id='envoyer'>
                                                                                                <button type='submit' class='btn btn-primary' name='edittyperes' style='float: right'>Enregistrer</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>

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
            </div>
            <div class="clearfix"></div>

            <!--div class="clearfix"></div-->
        </div>
    </div>
</div>


<!-- /page content -->
<?php
include('modal_add.php');
include('footer.php');
?>
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
<script src="../build/js/custom.js"></script>
<script>
    // $('#datatable-button2').DataTable( {
    //      responsive: true
    // } );
    // $('#datatable-button3').DataTable( {
    //      responsive: true
    // } );
    // $('#datatable-button4').DataTable( {
    //      responsive: true
    // } );
    // $('#datatable-button5').DataTable( {
    //      responsive: true
    // } );

    function init_DataTables()
    {

        console.log('run_datatables');

        if (typeof ($.fn.DataTable) === 'undefined') {
            return;
        }
        console.log('init_DataTables');

        var handleDataTableButtons = function () {
            if ($("#table1").length) {
                $("#table1").DataTable({
                    dom: "Blfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();
        TableManageButtons.init();
    }
    ;


    function init_DataTables1()
    {

        console.log('run_datatables1');

        if (typeof ($.fn.DataTable) === 'undefined') {
            return;
        }
        console.log('init_DataTables1');

        var handleDataTableButtons1 = function () {
            if ($("#table2").length) {
                $("#table2").DataTable({
                    dom: "Blfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons1();
                }
            };
        }();
        TableManageButtons.init();
    }
    ;


    function init_DataTables2()
    {

        console.log('run_datatables2');

        if (typeof ($.fn.DataTable) === 'undefined') {
            return;
        }
        console.log('init_DataTables2');

        var handleDataTableButtons2 = function () {
            if ($("#table3").length) {
                $("#table3").DataTable({
                    dom: "Blfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons2();
                }
            };
        }();
        TableManageButtons.init();
    }
    ;




</script>


</body>
</html>
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
                        <i class="fa fa-cog"></i> Configuration utilisateurs
                    </li>

                </ol>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Configuration des utilisateurs</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Utilisateurs</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Historique</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Utilisateurs bloqués</a>
                                </li>

                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    <div class="x_title">
                                        <h2>Listes des utilisateurs</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li>
                                                <button class="btn btn-xs btn-success" title="Ajouter" data-toggle="modal" data-target="#ModalAjoutUtilisateur"><i class="fa fa-plus"></i>Créer</button>
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
                                                            <th>Nom Complet</th>
                                                            <th>UserName</th> 
                                                            <th>Email</th>
                                                            <th>Connecté</th> 
                                                            <th>Tel</th>
                                                            <th>Admin</th> 
                                                            <th width="25%"> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--{% for dep in dep %}-->
                                                        <?php
                                                        $references = array();
                                                        $stmt = $conn->prepare('select * from users where blocked=0');
                                                        $stmt->execute();
                                                        $users = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                        foreach ($users as $user) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $user['nom_complet']; ?>
                                                                    <input type="hidden" name="iduser" value="<?php echo $user['id']; ?>" />
                                                                </td>
                                                                <td><?php echo $user['username']; ?>
                                                                </td>
                                                                <td><?php echo $user['email']; ?>
                                                                </td>
                                                                <td><?php if ($user['type'] == '1') echo 'En ligne'; else echo 'Hors ligne'; ?>
                                                                </td>
                                                                <td><?php echo $user['tel']; ?>
                                                                </td>
                                                                <td><?php if ($user['admin'] == '1') echo 'Admin'; else echo '-----'; ?> 
                                                                </td>
                                                                <td width="20%">
                                                                    <button name="archiveuser" class="btnSuppDept btn btn-xs btn-info pull-right" title="Blocker">
                                                                        <i class="fa fa-archive"></i> Blocker
                                                                    </button>


                                                                    <button type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#exampleModal<?php echo $user['id']; ?>">
                                                                        <i class="fa fa-edit"></i>Modifier
                                                                    </button>



                                                                    <div class="modal fade fixed" aria-labelledby="myModalLabel" id="exampleModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header well">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    <h3>Modification d'un utilisateur</h3>
                                                                                </div>
                                                                                <form class='form-horizontal' method="post" action="edit.php">
                                                                                    <div class='modal-body'>
                                                                                        <center>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'><center>  Nom Complet </center></label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='nomuser' value="<?php echo $user['nom_complet']; ?>"/>
                                                                                                    <input type='hidden' class='form-control' name='id' value="<?php echo $user['id']; ?>"/>
                                                                                                </div>
                                                                                            </div><br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'><center> UserName </center> </label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='username' value="<?php echo $user['username']; ?>"/>
                                                                                                </div>
                                                                                            </div><br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'><center> email </center>  </label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='emailuser' value="<?php echo $user['email']; ?>"/>
                                                                                                </div>
                                                                                            </div><br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'><center> Type </center></label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='typeuser' value="<?php echo $user['type']; ?>"/>
                                                                                                </div>
                                                                                            </div><br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'><center> Tél </center></label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='teluser' value="<?php echo $user['tel']; ?>"/>
                                                                                                </div>
                                                                                            </div><br><br>
                                                                                            <div class='form-group'>
                                                                                                <label class='col-sm-6 control-label'><center> Fonctionalité </center>  </label>
                                                                                                <div class='col-sm-6'>
                                                                                                    <input type='text' class='form-control' name='adminuser' value="<?php echo $user['admin']; ?>"/>
                                                                                                </div>
                                                                                            </div><br><br>

                                                                                        </center>
                                                                                    </div>
                                                                                    <div class='modal-footer'>
                                                                                        <div class='pull-right'>
                                                                                            <div id='envoyer'>
                                                                                                <button type='submit' class='btn btn-primary' name='edituser' style='float: right'>Enregistrer</button>
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
                                        <h2>Historique</h2>
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
                                        <h2>Utilisateurs bloqués</h2>
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
                                                            <th>Nom Complet</th>
                                                            <th>UserName</th> 
                                                            <th>Email</th>
                                                            <th>Connecté</th> 
                                                            <th>Tel</th>
                                                            <th>Admin</th> 
                                                            <th width="25%"> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--{% for dep in dep %}-->
                                                        <?php
                                                        $references = array();
                                                        $stmt = $conn->prepare('select * from users where blocked=1');
                                                        $stmt->execute();
                                                        $users = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                        foreach ($users as $user) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $user['nom_complet']; ?>
                                                                    <input type="hidden" name="iduser" value="<?php echo $user['id']; ?>" />
                                                                </td>
                                                                <td><?php echo $user['username']; ?>
                                                                </td>
                                                                <td><?php echo $user['email']; ?>
                                                                </td>
                                                                <td><?php if ($user['type'] == '1') echo 'En ligne'; else echo 'Hors ligne'; ?>
                                                                </td>
                                                                <td><?php echo $user['tel']; ?>
                                                                </td>
                                                                <td><?php if ($user['admin'] == '1') echo 'Admin'; else echo '-----'; ?> 
                                                                </td>
                                                                <td width="20%">
                                                                    
                                                                     <button name="unarchiveuser" class="btnSuppDept btn btn-xs btn-info pull-right" title="Desarchiver">
                                                                        <i class="fa fa-undo"></i> Deblocker
                                                                    </button>

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
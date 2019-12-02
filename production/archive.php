<?php
include('dbh.inc.php');
include('head.php');
include('menu_dashboard.php');
include('header.php');
?>

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
                        <i class="fa fa-archive"></i> Archive
                    </li>

                </ol>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Archive</h2>

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
                                                        $stmt = $conn->prepare('select * from reference where statut=0');
                                                        $stmt->execute();
                                                        $references = $stmt->fetchAll(PDO::FETCH_BOTH);
                                                        foreach ($references as $reference) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $reference['nom']; ?>

                                                                </td>
                                                                <td>
                                                                    <input disabled type="color" name="idre" value="<?php echo $reference['couleur']; ?>" />
                                                                </td>
                                                                <td width="20%">
                                                                    <button name="deleteref" class="btnSuppDept btn btn-xs btn-danger pull-right" title="Supprimer">
                                                                        <i class="fa fa-trash"></i> Supprimer
                                                                    </button>


                                                                    <button name="unarchiveref" class="btnSuppDept btn btn-xs btn-info pull-right" title="Desarchiver">
                                                                        <i class="fa fa-undo"></i> Desarchiver
                                                                    </button>
                                                                    <input type="hidden" name="idre" value="<?php echo $reference['id']; ?>" />
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
                                                        $stmt = $conn->prepare('select * from typechambre where statut=0');
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
                                                                <td width="20%">  <!--   name="deletetypechooooo" -->
                                                                    <ul class="nav navbar-right panel_toolbox">
                                                                       <!-- <button data-toggle="modal" data-target="#deletetypechooooo" class="btnSuppDept btn btn-xs btn-danger pull-right" title="Supprimer">
                                                                            <i class="fa fa-trash"></i> Supprimer
                                                                        </button>-->
                                                                        <button type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#supprModaltypCh<?php echo $typeCh['idTc']; ?>">
                                                                            <i class="fa fa-edit"></i>Modifier
                                                                        </button>
                                                                       <input type="button" name="supptypech" onclick="deletetype(<?php echo $typeCh['idTc']; ?>)" name="Delete" value="Delete">
                                                                        <ul class="nav navbar-right panel_toolbox">
                                                                            <button name="unarchivetypech" class="btnSuppDept btn btn-xs btn-info pull-right" title="Desarchiver">
                                                                                <i class="fa fa-undo"></i> Desarchiver
                                                                            </button>
                                                                        </ul>
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
                                                        $stmt = $conn->prepare('select * from chambre where statut=0');
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
                                                                    <button name="deletecha" class="btnSuppDept btn btn-xs btn-danger pull-right" title="Supprimer">
                                                                        <i class="fa fa-trash"></i> Supprimer
                                                                    </button>

                                                                    <button name="unarchivecha" class="btnSuppDept btn btn-xs btn-info pull-right" title="Desarchiver">
                                                                        <i class="fa fa-undo"></i> Desarchiver
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
                                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                                    <div class="x_title">
                                        <h2 style="color:black;">Types de reservations</h2>

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
                                                        $stmt = $conn->prepare('select * from typereservation where statut=0');
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
                                                                    <button name="deletetyperes" class="btnSuppDept btn btn-xs btn-danger pull-right" title="Supprimer">
                                                                        <i class="fa fa-trash"></i> Supprimer
                                                                    </button>

                                                                    <button name="unarchivetyperes" class="btnSuppDept btn btn-xs btn-info pull-right"  title="Desarchiver">
                                                                        <i class="fa fa-undo"></i> Desarchiver
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
<?php
include('footer.php');
?> 
<script language="javascript" >
function deletetype(idType){
    if(confirm("Do you want to ....")){
        window.location.href='modal_delete.php?del_id='+idType+'';
    }
}
</script>

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


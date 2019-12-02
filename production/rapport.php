<?php
include('dbh.inc.php');
include('head.php');
include('menu_dashboard.php');
include('header.php');
$date='';
?>

<div class="right_col" role="main">
	
	<!-- ** contunu ** -->
	
	
	<div class="row">
		<div class="col-lg-12" id="testdiv">
			<ol class="breadcrumb">
				<li><i class="fa fa-home"></i> <a href=""></a>
				</li>
				<li class="active"><i class="fa fa-cog"></i> Rapport d'occupation
				</li>
			</ol>
		</div>
	</div>
	<a id="dlink"  style="display:none;"></a>
<input type="button" onclick="tablesToExcel(['datatable','datatable-fixed-header','datatable-keytable'], ['first', 'second','third'], 'myfile.xls')" value="Export to Excel">
	
	<ul class="nav navbar-right panel_toolbox">
	
        <li>
			
			<form action="" method="post">
			<label for="dt">Date: </label>
			<input id="datep" name="dt" value='<?php echo $date;?>' type="date" class="date"/>
			<button class="btn btn-xs btn-info" name="select" title="Selectionner"><i class="fa fa-calendar"></i> Selectionner</button>
			</form>
        </li>
    </ul>
	<?php if(isset($_POST['select'])){
		echo "
				<div class='x_title'>
                <h1> Rapport d'occupation du ". $_POST['dt']."</h1>
			    <div class='clearfix'></div>
                </div>";
							
	} ?>
	<div class="clearfix"></div>
	<div class="container">
	
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				
					<div class="x_title">
						<h2>Arrivées</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
	<div class="x_content">
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Chambre</th>
					<th>Reference</th>
					<th>Nbre/Pax</th>
					<th>Date départ</th>
					<th>Observation</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(isset($_POST['select'])){
				$date=$_POST['dt'];
				$stmt = $conn->prepare("select cl.nom as nom, cl.prenom as prenom, ch.nomCode as code, ref.nom as refer, res.nbrePax as pax, res.dateDepart as dated, r.observation as obs from chambre ch, clients cl, reference ref, reservation res, reserver r where r.idReservation=res.idReservation AND r.idClient=cl.idClient AND r.idChambre=ch.idChambre AND res.idReference=ref.id AND res.dateArrivee='$date'  ");
				$stmt->execute();
				$arrivees = $stmt->fetchAll(PDO::FETCH_BOTH);
			
				foreach ($arrivees as $arrivee) {
			?>
				<tr>
					<td><?php echo $arrivee['nom']." ".$arrivee['prenom']; ?></td>
					<td><?php echo $arrivee['code']; ?></td>
					<td><?php echo $arrivee['refer']; ?></td>
					<td><?php echo $arrivee['pax']; ?></td>
					<td><?php echo $arrivee['dated']; ?></td>
					<td><?php echo $arrivee['obs']; ?></td>
				</tr>
			<?php
				}}
			?>
				
				
			</tbody>
		</table>
	</div>
</div>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<h2>Occupées</h2>
		<ul class="nav navbar-right panel_toolbox">
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		</li>
		<li><a class="close-link"><i class="fa fa-close"></i></a>
		</li>
		</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<table id="datatable-fixed-header" class="table table-striped table-bordered">
<thead>
<tr>
	<th>Nom</th>
					<th>Chambre</th>
					<th>Reference</th>
					<th>Nbre/Pax</th>
					<th>Date départ</th>
					<th>Observation</th>
</tr>
</thead>
<tbody>
<?php
if(isset($_POST['select'])){
				$date=$_POST['dt'];
				$stmt = $conn->prepare("select cl.nom as nom, cl.prenom as prenom, ch.nomCode as code, ref.nom as refer, res.nbrePax as pax, res.dateDepart as dated, r.observation as obs from chambre ch, clients cl, reference ref, reservation res, reserver r where r.idReservation=res.idReservation AND r.idClient=cl.idClient AND r.idChambre=ch.idChambre AND res.idReference=ref.id AND res.dateArrivee<'$date' AND res.dateDepart>'$date'");
				$stmt->execute();
				$arrivees = $stmt->fetchAll(PDO::FETCH_BOTH);
			
				foreach ($arrivees as $arrivee) {
			?>
				<tr>
					<td><?php echo $arrivee['nom']." ".$arrivee['prenom']; ?></td>
					<td><?php echo $arrivee['code']; ?></td>
					<td><?php echo $arrivee['refer']; ?></td>
					<td><?php echo $arrivee['pax']; ?></td>
					<td><?php echo $arrivee['dated']; ?></td>
					<td><?php echo $arrivee['obs']; ?></td>
				</tr>
			<?php
				}}
			?>


</tbody>
</table>
</div>
</div>
</div>




<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>Départs</h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>

<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">

<table id="datatable-keytable" class="table table-striped table-bordered">
<thead>
<tr>
<th>Nom</th>
					<th>Chambre</th>
					<th>Reference</th>
					<th>Nbre/Pax</th>
					<th>Date départ</th>
					<th>Observation</th>
</tr>
</thead>
<tbody>

<?php
if(isset($_POST['select'])){
				$date=$_POST['dt'];
				$stmt = $conn->prepare("select cl.nom as nom, cl.prenom as prenom, ch.nomCode as code, ref.nom as refer, res.nbrePax as pax, res.dateDepart as dated, r.observation as obs from chambre ch, clients cl, reference ref, reservation res, reserver r where r.idReservation=res.idReservation AND r.idClient=cl.idClient AND r.idChambre=ch.idChambre AND res.idReference=ref.id AND res.dateDepart='$date'");
				$stmt->execute();
				$departs = $stmt->fetchAll(PDO::FETCH_BOTH);
			
				foreach ($departs as $depart) {
			?>
				<tr>
					<td><?php echo $depart['nom']." ".$depart['prenom']; ?></td>
					<td><?php echo $depart['code']; ?></td>
					<td><?php echo $depart['refer']; ?></td>
					<td><?php echo $depart['pax']; ?></td>
					<td><?php echo $depart['dated']; ?></td>
					<td><?php echo $depart['obs']; ?></td>
				</tr>
			<?php
				}}
			?>

</tr>


</tbody>
</table>
</div>
</div>
</div>

</div>	

</div></div>



 </div>    
<?php
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
<!-- iCheck -->
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
<script src="~/Views/JS/JSExcel.js" type="text/javascript"></script>
		<script>
			var tablesToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>'
    , templateend = '</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head>'
    , body = '<body>'
    , tablevar = '<table>{table'
    , tablevarend = '}</table>'
    , bodyend = '</body></html>'
    , worksheet = '<x:ExcelWorksheet><x:Name>'
    , worksheetend = '</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>'
    , worksheetvar = '{worksheet'
    , worksheetvarend = '}'
    , base64 = function (s) { return window.btoa(unescape(escape(s))) }
    , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
    , wstemplate = ''
    , tabletemplate = '';

    return function (table, name, filename) {
        var tables = table;

        for (var i = 0; i < tables.length; ++i) {
            wstemplate += worksheet + worksheetvar + i + worksheetvarend + worksheetend;
            tabletemplate += tablevar + i + tablevarend;
        }

        var allTemplate = template + wstemplate + templateend;
        var allWorksheet = body + tabletemplate + bodyend;
        var allOfIt = allTemplate + allWorksheet;

        var ctx = {};
        for (var j = 0; j < tables.length; ++j) {
            ctx['worksheet' + j] = name[j];
        }

        for (var k = 0; k < tables.length; ++k) {
            var exceltable;
            if (!tables[k].nodeType) exceltable = document.getElementById(tables[k]);
            ctx['table' + k] = exceltable.innerHTML;
        }

        //document.getElementById("dlink").href = uri + base64(format(template, ctx));
        //document.getElementById("dlink").download = filename;
        //document.getElementById("dlink").click();

        window.location.href = uri + base64(format(allOfIt, ctx));

    }
})();

		
		
		</script>
		
</body>
</html>
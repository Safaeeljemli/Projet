<?php require_once 'dbh.inc.php'; ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />

        <title>H&B Web! | </title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Reservation</title>

        <link type="text/css" rel="stylesheet" href="media/layout.css" />

        <!-- helper libraries -->
        <script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>

        <!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

        <link type="text/css" rel="stylesheet" href="icons/style.css" />
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">        
        -->

    </head>
    <?php
    include('menu_dashboard.php');
    include('header.php');
    ?>

    <div class="right_col" role="main">

        <!-- ** contunu ** -->
        <div class="shadow"></div>
        <div class="hideSkipLink">
        </div>
        <?php
        $stmt = $conn->prepare("SELECT * FROM reference ");
        $stmt->execute();
        $result = $stmt->fetchAll();

        $stmt2 = $conn->prepare("SELECT * FROM chambre ");
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();


        $chb = array();
        $stmt3 = $conn->prepare('select * from typechambre where statut=1');
        $stmt3->execute();
        $result3 = $stmt3->fetchAll(PDO::FETCH_BOTH);
        ?>
        <div class="main">


            <!-- <div style="margin-left: 160px;"> -->
            <div >
                <!-- <?php
                $stmt = $conn->prepare("SELECT * FROM reference ");
                $stmt->execute();
                $refs = $stmt->fetchAll();
                ?> -->

                <center>
                    <table>
                        <tr >
                            <td>
                                <label for="" class="form-label">     </label>
                            </td>
                            <td>
                                <select multiple class='form-control' name='typechamee'>
                                    <?php
                                    foreach ($result3 as $ch) {
                                        ?>
                                        <option  value="<?php echo $ch['idTc']; ?>" ><?php echo $ch['type']; ?></option>
                                    <?php } ?>
                                </select>
                                <!--
                                                            <select id="filter" class="form-control">
                                                                <option value="0">Tous</option>
                                                                <option value="1">Single</option>
                                                                <option value="2">Double</option>
                                                                <option value="4">Family</option>
                                                            </select>
                                -->
                            </td>
                            <td>
                            <!-- <td rowspan="3">
                                <div id="detailR" style="border: 5px solid black;width: 231px;">
                                <strong>Réferences :</strong><br> 
                                <?php
                                foreach ($refs as $ref) {
                                    echo
                                    '<div class="row">
                                                        <div class="col">
                                                        <label for="">' . $ref['nom'] . '</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="color" name="favcolor" value="' . $ref['couleur'] . '" style="width: 22px;" disabled>
                                                        </div>
                                                        
                                                    </div>';
                                }
                                ?>
                                </div>
                            </td> -->
                            </td>
                            <td>

                                <input type="date" name="dateStart" id="dateStart" class="form-control"> 
                            </td>
                            <td>
                                <input type="date" name="dateEnd"   id="dateEnd"   class="form-control"> 
                            </td>
                            <td>
                                <button onclick="myFunction()" class="btn btn-primary">Chercher</button> 
                            </td>

                            <td style="">
                                <div id="detailR" style="position :relative;">

                                    <label for=""  >Type reservation: </label><br/>
                                    <label for=""  >Option :</label>

                                    <input type="color" name="favcolor" value="#FFA500" style="width: 22px;" disabled>

                                    <label for=""  >Reserver:</label>

                                    <input type="color" name="favcolor" value="#000000" style="width: 22px;" disabled>

                                    <label for=""  >Reserver pour cette chambre:</label>

                                    <input type="color" name="favcolor" value="#0000FF" style="width: 22px;"disabled>

                                    <label for=""  >Fermé:</label>

                                    <input type="color" name="favcolor" value="#808080" style="width: 22px;" disabled>
                                </div>

                            </td>
                        </tr>

                    </table>
                </center>
            </div>
        </div>

        <div id="dp"></div>

        <div class="space">
            <a href="#" id="add-room">Ajouter une chambre</a>
        </div>


        <div class="hide" style="display:none;">
            <form action="reservation.php" method="post" >
                <input type="hidden" name="chambre" id='chambre'>x
                <table id='t'>
                    <tr> 
                        <td>

                            <div class="form-group">

                                <select name="cham" id="cham" class="form-control">
                                    <option value='Null' disabled>Choisir Chambre</option>
                                    <?php
                                    foreach ($result2 as $rowC) {
                                        echo "<option value='" . $rowC['idChambre'] . "'>" . $rowC['nomCode'] . "</option>";
                                    }
                                    ?>
                                </select>                                            
                            </div>

                            <div class="form-group">

                                <select name="ref" id="ref" class="form-control">
                                    <option value='Null' disabled>Choisir Réference</option>
                                    <?php
                                    foreach ($result as $row) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['nom'] . "</option>";
                                    }
                                    ?>
                                </select>                                            
                            </div>
                        </td> 


                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">
                                        <select name="sexe" id="sexe" class="input-group-prepend">
                                            <option value="Homme">MR</option>
                                            <option value="Femme">MS</option>
                                        </select>
                                    </span>
                                </div>
                                <input type="text" class="form-control"  name="nom" id="nom" placeholder="Nom" required>
                            </div>
                        </td>


                        <td><div class="form-group"><input type="text" class="form-control"  name="prenom" id="prenom" placeholder="Prénom" required> </div></td>
                        <td><div class="form-group"><input type="text" class="form-control"  name="id" id="id" placeholder="Identification" required> </div></td>

                        <td>
                            <div class="form-group">
                                <input type="tel" pattern="[0]{1}[6]{1}[0-9]{8}" required class="form-control"  name="tel" id="tel" placeholder="Téléphone" required> 
                            </div>
                        </td>
                        <td><div class="form-group"><input type="email" class="form-control"  name="email" id="email" placeholder="Email" required> </div></td>

                    </tr>

                    <tr> 
                        <td>
                        </td> 
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">
                                        <select name="sexe" id="sexe" class="input-group-prepend" >
                                            <option value="Homme">MR</option>
                                            <option value="Femme">MS</option>
                                        </select>
                                    </span>
                                </div>
                                <input type="text" class="form-control"  name="nomMS" id="nomMS" placeholder="Nom">
                            </div>
                        </td>
                        <td><div class="form-group"><input type="text" class="form-control"  name="prenomMS" id="prenomMS" placeholder="Prénom"> </div></td>
                        <td><div class="form-group"><input type="text" class="form-control"  name="idMS" id="idMS" placeholder="Identification"> </div></td>
                        <td><div class="form-group"><input type="number" class="form-control"  name="AgeMS" id="AgeMS" placeholder="Age"> </div></td>
                    </tr>
                    <tr>
                        <td><input type="date" class="form-control  "  name="dated" id="dated" placeholder="Date debut"></td>
                        <td><input type="date" class="form-control  "  name="datef" id="datef" placeholder="Date fin"></td>
                        <td><input type="number" class="form-control  "  name="nbrNuit" id="nbrNuit" readonly placeholder="nembre nuit"></td>
                        <td> 
                            <select name="situation" id="situation" class="form-control  ">
                                <option value='Null' disabled>Situation familial</option>
                                <option value="Célibataire">Célibataire</option>
                                <option value="Marier">Marier</option>
                            </select>
                        </td>
                        <td>
                            <select name="situation" id="situation" class="form-control  ">
                                <option value="Null" disabled>Type Reservation</option> 
                                <option value="option">Option</option>
                                <option value="reservation">Reservation </option>
                                <option value="RPCC">Reservation pour cette chambre</option>
                                <option value="fermer">fermer</option>
                            </select>
                        </td>
                    </tr>
                    <tr >
                        <td ><label for="" >Accompagner: </label><input type="checkbox" class="form-control   Accompagner"  name="" id="Accompagner"></td>  
                        <td class="toogl"> <input type="number" class="form-control  "max=8 min=0 value="0" name="" id="num" placeholder="Nembre accompaghant"></<td>  


                    </tr>




                </table>
                <div class="form-group">
                    <td><input type="submit" value="Reserver" class="btn btn-success"></td>       
                </div>  
            </form>
        </div>



    </div>

</div>





<?php
include('footer.php');
?> 






<script>
    var dp = new DayPilot.Scheduler("dp");

    // dp.height = 250;


    dp.allowEventOverlap = false;

    //dp.scale = "Day";
    //dp.startDate = new DayPilot.Date().firstDayOfMonth();
    dp.days = dp.startDate.daysInMonth();
    loadTimeline(DayPilot.Date.today().firstDayOfMonth());


    function treatAsUTC(date) {
        var result = new Date(date);
        result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
        return result;
    }

    function daysBetween(startDate, endDate) {
        var millisecondsPerDay = 24 * 60 * 60 * 1000;
        return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
    }





    function myFunction() {
        //var start = document.getElementById("demo").innerHTML = "Hello World";
        var start = document.getElementById("dateStart").value;
        var end = document.getElementById("dateEnd").value;
        var numjour = daysBetween(start, end);
        // dp.days = dp.startDate.daysInMonth();
        dp.days = numjour;
        // console.log(dp.days)
        // loadTimeline(DayPilot.Date.today());
        var dateRecherche = document.getElementById('dateStart').value;
        // console.log(h+"fdvd")
        date = new DayPilot.Date(dateRecherche);

        dp.scale = "Manual";
        //dp.timeline = [];
        var start = date.getDatePart().addHours();
        for (var i = 0; i < dp.days + 1; i++) {
            dp.timeline.push({start: start.addDays(i), end: start.addDays(i + 1)});
        }

        // dp.cellWidthSpec = "Auto";
        dp.update();

    }

    //dp.eventDeleteHandling = "Update";

    dp.timeHeaders = [
        {groupBy: "Month", format: "MMMM yyyy"},
        {groupBy: "Day", format: "d"}
    ];

    dp.eventHeight = 60;
    dp.bubble = new DayPilot.Bubble({});

    dp.rowHeaderColumns = [
        {title: "Chambres :", width: 80}

    ];

    dp.treeEnabled = true;
    dp.treePreventParentUsage = true;
    dp.resources = [
        {name: "<?php foreach ($result2 as $rowC) {
            echo "<option value='" . $rowC['idChambre'] . "'>" . $rowC['nomCode'] . "</option>";
}
?>"
        },
        {name: "Single", id: "G2", expanded: true, children: [
                {name: "Person 1", id: "E"},
                {name: "Person 2", id: "F"},
                {name: "Person 3", id: "G"},
                {name: "Person 4", id: "H"}
            ]
        },
        {name: "Twin", id: "G3", expanded: true, children: [
                {name: "Tool 1", id: "I"},
                {name: "Tool 2", id: "J"},
                {name: "Tool 3", id: "K"},
                {name: "Tool 4", id: "L"}
            ]
        },
        {name: "Swites", id: "G4", expanded: true, children: [
                {name: "Resource 1", id: "R1"},
                {name: "Resource 2", id: "R2"},
                {name: "Resource 3", id: "R3"},
                {name: "Resource 4", id: "R4"}
            ]
        },
    ];

    dp.heightSpec = "Max";
    dp.height = 500;
    dp.separators = [
        {location: new DayPilot.Date(), color: "red"}
    ];

    dp.onBeforeResHeaderRender = function (args) {

        args.resource.areas = [{
                top: 3,
                right: 4,
                height: 14,
                width: 14,
                action: "JavaScript",
                js: function (r) {
                    var modal = new DayPilot.Modal();
                    modal.onClosed = function (args) {
                        loadResources();
                    };
                    modal.showUrl("room_edit.php?id=" + r.id);
                },
                v: "Hover",
                css: "icon icon-edit",
            }];
    };

    dp.onEventMoved = function (args) {
        $.post("backend_move.php",
                {
                    id: args.e.id(),
                    newStart: args.newStart.toString(),
                    newEnd: args.newEnd.toString(),
                    newResource: args.newResource
                },
                function (data) {
                    dp.message(data.message);
                });
    };

    dp.onEventResized = function (args) {
        $.post("backend_resize.php",
                {
                    id: args.e.id(),
                    newStart: args.newStart.toString(),
                    newEnd: args.newEnd.toString()
                },
                function () {
                    dp.message("Resized.");
                });
    };

    dp.onEventDeleted = function (args) {
        $.post("backend_delete.php",
                {
                    id: args.e.id()
                },
                function () {
                    dp.message("Deleted.");
                });
    };
    dp.contextMenu = new DayPilot.Menu({items: [
            {text: "Edit", onClick: function (args) {
                    dp.events.edit(args.source);
                }},
            {text: "Delete", onClick: function (args) {
                    dp.events.remove(args.source);
                }},
            {text: "-"},
            {text: "Select", onClick: function (args) {
                    dp.multiselect.add(args.source);
                }},
        ]});


    dp.onTimeRangeSelected = function (args) {
        var name = prompt("Nouvelle réservation:", "Event");
        if (!name)
            return;
        else
            print("rjjj");

        var modal = new DayPilot.Modal();
        modal.closed = function () {
            dp.clearSelection();

            var data = this.result;
            if (data && data.result === "OK") {
                loadEvents();
            }
        };
        modal.showUrl("new.php?start=" + args.start + "&end=" + args.end + "&resource=" + args.resource);

        $("div.hide").toggle();
        var str1 = args.start.value;
        var res1 = str1.split("T00:00:00", 1);
        var str2 = args.end.value;
        var res2 = str2.split("T00:00:00", 1);

        document.getElementById("dated").value = res1;
        document.getElementById("datef").value = res2;
        var numjour = daysBetween(res1, res2);
        document.getElementById("nbrNuit").value = numjour;
        document.getElementById("chambre").value = args.resource;
        // window.scrollBy(100, 900);


    };

    dp.onEventClick = function (args) {
        var modal = new ayPilot.Modal.prompt("New event name:", "New Event");
        modal.closed = function () {
            // reload all events
            var data = this.result;
            if (data && data.result === "OK") {
                loadEvents();
            }
        };
        modal.showUrl("editb.php?id=" + args.e.id());
    };
    dp.onBeforeEventRender = function (args) {
        // console.log(args.e.start)
        var start = new DayPilot.Date(args.e.start);
        var end = new DayPilot.Date(args.e.end);

        var today = DayPilot.Date.today();
        var now = new DayPilot.Date();

        args.e.html = '<strong style="font-size:15px;">' + args.e.text + '</strong>';

        switch (args.e.typerRs) {
            case "Reservation":
                args.e.barColor = 'red';
                break;
            case "RPCC":
                args.e.barColor = 'blue';
                break;
            case "option":
                args.e.barColor = 'orange';
                break;
            default:
                args.e.barColor = 'gray';
                break;
        }


        args.e.html = "<div>" + args.e.html + "<br /><span style='color:black;'></span></div>";

        var paid = args.e.paid;
        var paidColor = "#aaaaaa";

        args.e.areas = [
            {height: 16, bottom: 10, right: 4, html: "<div style='height: 16px ; font-size: 12pt;color:black;'>" + args.e.nomR + "</div>", v: "Visible"},
        ];

    };


    dp.init();

    loadResources();
    loadEvents();

    function loadTimeline(date) {
        dp.scale = "Manual";
        dp.timeline = [];
        var start = date.getDatePart().addHours();

        for (var i = 0; i < dp.days + 1; i++) {
            dp.timeline.push({start: start.addDays(i), end: start.addDays(i + 1)});
        }
        dp.update();
    }

    function loadEvents() {
        var start = dp.visibleStart();
        var end = dp.visibleEnd();

        $.post("backend_events.php",
                {
                    start: start.toString(),
                    end: end.toString()
                },
                function (data) {
                    dp.events.list = data;
                    // console.log(dp.events.list)
                    dp.cellWidth = 40;  // reset for "Fixed" mode
                    dp.rowMinHeight = 10;
                    dp.cellWidthSpec = "Auto";

                    dp.update();
                }
        );
    }

    function loadResources() {
        $.post("backend_rooms.php",
                {capacity: $("#filter").val()},
                function (data) {

                    dp.resources = data;

                    dp.update();
                });
    }

    $(document).ready(function () {
        $("#filter").change(function () {
            loadResources();
        });
    });

</script>

<div class="clear">
</div>
</body>
</html>


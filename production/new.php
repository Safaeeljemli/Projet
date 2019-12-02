<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nouvelle Reservation</title>
        <link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        // check the input
        //is_numeric($_GET['id']) or die("invalid URL");

        require_once '_db.php';

        $chambre = $conn->query('SELECT * FROM chambre');

        $start = $_GET['start']; // TODO parse and format
        $end = $_GET['end']; // TODO parse and format
        ?>
        <form id="f" action="backend_create.php" style="padding:20px;">
            <h1>Nouvelle Reservation</h1>
            <div>Nom: </div>( `code`, `dateRes`, `dateArrivee`, `dateDepart`, `nbreNuits`, `nbrePax`, `observation`, `idType`, `idReference`, `idchambre`, `iduser`)
            <div><input type="text" id="name" name="name" value="" /></div>
            <div>Debut:</div>
            <div><input type="text" id="start" name="start" value="<?php echo $start ?>" /></div>
            <div>Fin:</div>
            <div><input type="text" id="end" name="end" value="<?php echo $end ?>" /></div>
            <div>Nombre De Nuits: </div>
            <div><input type="number" id="name" name="nbreNuits" value="" /></div>
            <div>Nombre De Personnes: </div>
            <div><input type="number" id="name" name="nbrePax" value="" /></div>
            <div>Observation: </div>
            <div><input type="text" id="name" name="observation" value="" /></div>
            <div>Chambre:</div>
            <div>
                <select id="room" name="type">
                    <?php
                    foreach ($chambre as $room) {
                        $selected = $_GET['resource'] == $room['id'] ? ' selected="selected"' : '';
                        $id = $room['id'];
                        $name = $room['name'];
                        print "<option value='$id' $selected>$name</option>";
                    }
                    ?>
                </select>

            </div>
            <div>Chambre:</div>
            <div>
                <select id="room" name="reference">
                    <?php
                    foreach ($chambre as $room) {
                        $selected = $_GET['resource'] == $room['id'] ? ' selected="selected"' : '';
                        $id = $room['id'];
                        $name = $room['name'];
                        print "<option value='$id' $selected>$name</option>";
                    }
                    ?>
                </select>

            </div>
            <div>Chambre:</div>
            <div>
                <select id="room" name="room">
                    <?php
                    foreach ($chambre as $room) {
                        $selected = $_GET['resource'] == $room['id'] ? ' selected="selected"' : '';
                        $id = $room['id'];
                        $name = $room['name'];
                        print "<option value='$id' $selected>$name</option>";
                    }
                    ?>
                </select>

            </div>
            <div class="space"><input type="submit" value="Save" /> <a href="javascript:close();">annuler</a></div>
        </form>

        <script type="text/javascript">
            function close(result) {
                if (parent && parent.DayPilot && parent.DayPilot.ModalStatic) {
                    parent.DayPilot.ModalStatic.close(result);
                }
            }

            $("#f").submit(function () {
                var f = $("#f");
                $.post(f.attr("action"), f.serialize(), function (result) {
                    close(eval(result));
                });
                return false;
            });

            $(document).ready(function () {
                $("#name").focus();
            });

        </script>
    </body>
</html>

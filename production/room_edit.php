<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modifier la chambre</title>
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            // check the input
            is_numeric($_GET['id']) or die("invalid URL");
            
            require_once 'dbh.inc.php';
            
            $stmt = $conn->prepare('SELECT * FROM chambre WHERE id = :id');
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->execute();
            $room = $stmt->fetch();
        ?>
        <form id="f" style="padding:20px;">
            <input type="hidden" name="id" value="<?php print $_GET['id'] ?>" />
            <h1>Modifier la chambre</h1>
            <div>Nom: </div>
            <div><input type="text" id="name" name="name" value="<?php print $room['name'] ?>" /></div>
            <div>Capacité:</div>
            <div>
                <select id="capacity" name="capacity">
                    <?php 
                        $options = array(1, 2, 3,4,5,6,7,8);
                        foreach ($options as $option) {
                            $selected = $option == $room['capacity'] ? ' selected="selected"' : '';
                            $id = $option;
                            $name = $option;
                            print "<option value='$id' $selected>$name</option>";
                        }
                    ?>
                </select>                
            </div>
            <div>Status:</div>
            <div>
                <!-- <select id="status" name="status">
                    <?php 
                        $options = array("Disponible", "Nettoyer", "Sale");
                        foreach ($options as $option) {
                            $selected = $option == $room['status'] ? ' selected="selected"' : '';
                            $id = $option;
                            $name = $option;
                            print "<option value='$id' $selected>$name</option>";
                        }
                    ?>
                </select>                 -->
            </div>

            
            <div class="space"><input type="submit" value="Save" /> <a href="javascript:close();">Cancel</a></div>
        </form>
        
        <script type="text/javascript">
        function close(result) {
            DayPilot.Modal.close(result);
        }

        $("#f").submit(function () {
            var f = $("#f");
            $.post("backend_room_update.php", f.serialize(), function (result) {
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

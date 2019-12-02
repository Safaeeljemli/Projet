<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nouvelle chambre</title>
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />    
        <script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            // check the input
            //is_numeric($_GET['id']) or die("invalid URL");
            
            require_once 'dbh.inc.php';
            
            $chambre = $conn->query('SELECT * FROM chambre');
        ?>
        <form id="f" style="padding:20px;">
            <h1>Nouvelle chambre</h1>
            <div>Nom : </div>
            <div><input type="text" id="name" name="name" value="" /></div>
            <div>Nembre maximal :</div>
            <div> 
                <select id="capacity" name="capacity">
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='2'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                    <option value='8'>8</option>
                    
                </select>
            </div>
            <div class="space"><input type="submit" value="Save" /> <a href="javascript:close();">annuler</a></div>
        </form>
        
        <script type="text/javascript">
        function close(result) {
            DayPilot.Modal.close(result);
        }

        $("#f").submit(function () {
            var f = $("#f");
            $.post("backend_room_create.php", f.serialize(), function (result) {
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

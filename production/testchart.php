<html>
<?php


$con = mysqli_connect("localhost","root","","stage2");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $result = mysqli_query($con, "SELECT * FROM reference");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("label" => $row['id'] , "y" => $row['couleur']);
        
        array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>



<head>
    <title></title>
    
</head>
<body>

    <div id="chartContainer" style="width: 800px; height: 380px;"></div>

	<script src="jquery.js"></script>
    <script src="canvasjs.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $.getJSON("data.php", function (result) {

                var chart = new CanvasJS.Chart("chartContainer", {
                    data: [
                        {
                            dataPoints: result
                        }
                    ]
                });

                chart.render();
            });
        });
    </script>
</body>
</html>
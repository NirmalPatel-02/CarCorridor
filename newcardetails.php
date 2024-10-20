<?php
    include("connection.php");
    $carid = $_POST['carid'];
    $page=$_POST['page'];
    $query = "SELECT * FROM `carcorridor`.`cars` where id = $carid";
    $query_run = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($query_run);

    function moneyFormatIndia($num) {
        $explrestunits = "" ;
        if(strlen($num)>3) {
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++) {
                // creates each of the 2's group and adds a comma to the end
                if($i==0) {
                    $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                } else {
                    $explrestunits .= $expunit[$i].",";
                }
            }
            $thecash = $explrestunits.$lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            div{
                font-family: 'Trebuchet MS';
            }
            #carnamefame{
                width: 250px;
                height: 23px;
                border: 0px;
                margin-left: 30px;
                margin: 10px;
                font-size:medium;
            }
            #textonly{
                height:600px ;
                width: 230px;
                position: absolute;
                border: 0px;
                top: 60px;
                left: 55%;
            }
            #data{
                height:600px ;
                width: 230px;
                position: absolute;
                border: 0px;
                top: 60px;
                left: 67%;
            }
            #pricetext{
                position: absolute;
                top: 500px;
                left: 12%;
                width: 380px;
                height: 50px;
                border: 0px solid black;
                font-family:'Trebuchet MS';
                font-size: xx-large;
                text-align: center;
                font-weight: bold;
            }
            #closedetails{
                width:40px;
                height:40px;
                background-color:lightcoral;
                border-radius:5px;
                position:absolute;
                top:35px;
                right:45px;
                z-index:5;
                font-weight: bold;
                font-size: large;
            }
            #closedetails:hover{
                transform: scale(1.05);
            }
        </style>
    </head>
    <body style="background-color: silver;">
        <div id="panel" style="margin: 40px;width:1435px;height:650px;border-radius: 10px;box-shadow:2px 2px 4px;background-color:white;">
        <img src="<?php echo $row['img']; ?>" style="width:600px;height:350px;margin:30px;border:1px solid black;border-radius:5px;">
        <div id="pricetext"><?php echo "Rs ".moneyFormatIndia($row['price']);?></div>
        <div id="textonly">
            <div id="carnamefame">
                <a style="font-weight:bold;">Car Name :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Brand :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Engine :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Power :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Torque :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Transmission :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Mileage :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Fuel Type:</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Cylinder :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Sitting Capacity :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php if($row['fuel'] =='Petrol'){
                                                    echo "Fuel Capacity :";
                                                    } 
                                                    else if($row['fuel'] =='Battery Electric Vehicle'){
                                                        echo "Battery Capacity :";
                                                    }
                                                    else if($row['fuel'] =='Diesel'){
                                                        echo "Fuel Capacity :";
                                                    }
                                                    else{
                                                        echo "Fuel Capacity :";
                                                    } ?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Steering :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Airbag :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">Ac:</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php if($row['fuel'] =='Petrol'){
                                                    echo "Petrol Base Modal ";
                                                    } 
                                                    else if($row['fuel'] =='Diesel'){
                                                        echo "Diesel Base Modal ";
                                                    }
                                                    else{
                                                        echo "Base Modal ";
                                                    }?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">CNG Top Modal :</a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php if($row['fuel'] =='Petrol'){
                                                    echo "Petrol Top Modal ";
                                                    } 
                                                    else if($row['fuel'] =='Diesel'){
                                                        echo "Diesel Top Modal ";
                                                    }
                                                    else{
                                                        echo "Top Modal ";
                                                    }?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;">CNG Bace Modal :</a>
            </div>
        </div>
        <div id="data">
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['carname'];?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['brand'];?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php if($row['fuel'] =='Petrol'){
                                                    echo $row['engine']."cc";
                                                    } 
                                                    else if($row['fuel'] =='Battery Electric Vehicle'){
                                                        echo '-';
                                                    }
                                                    else if($row['fuel'] =='Diesel'){
                                                        echo $row['engine']."cc";
                                                    }
                                                    else{
                                                        echo $row['engine']."cc";
                                                    }?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['power']."bph";?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['torque']."Nm";?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['transmission'];?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php if($row['fuel'] =='Petrol'){
                                                    echo $row['mileage']."kmpl";
                                                    } 
                                                    else if($row['fuel'] =='Battery Electric Vehicle'){
                                                        echo $row['mileage']."km";
                                                    }
                                                    else if($row['fuel'] =='Diesel'){
                                                        echo $row['mileage']."kmpl";
                                                    }
                                                    else{
                                                        echo $row['mileage']."kmpl";
                                                    }?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['fuel'];?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['cylinder'];?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['capacity'];?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php if($row['fuel'] =='Petrol'){
                                                    echo $row['fuelcapacity']."liter";
                                                    } 
                                                    else if($row['fuel'] =='Battery Electric Vehicle'){
                                                        echo $row['fuelcapacity']."kwh";
                                                    }
                                                    else if($row['fuel'] =='Diesel'){
                                                        echo $row['fuelcapacity']."liter";
                                                    }
                                                    else{
                                                        echo $row['fuelcapacity']."liter";
                                                    }?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['steering'];?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['airbag'];?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo $row['ac'];?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo "Rs ".moneyFormatIndia($row['petrolbm']);?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo "---"?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo "Rs ".moneyFormatIndia($row['petroltm']);?></a>
            </div>
            <div id="carnamefame">
                <a style="font-weight:bold;"><?php echo "---"?></a>
            </div>
        </div>
        <?php if($page=="newcarpage"){
        ?>
            <a href="ExploreNewCars.php"><button id="closedetails">X</button></a>
        <?php
        } ?>
        <?php if($page=="Populer"){
        ?>  
            <form method="post" action="onlyspecificcars.php">
            <input name="status" value="Populer" style="visibility: hidden;position:absolute;">
            <a><button id="closedetails">X</button></a>
            <form>
        <?php
        } ?>
        <?php if($page=="Tranding"){
        ?>
            <form method="post" action="onlyspecificcars.php">
            <input name="status" value="Tranding" style="visibility: hidden;position:absolute;">
            <a><button id="closedetails">X</button></a>
            <form>
        <?php
        } ?>
        <?php if($page=="Electric"){
        ?>
            <form method="post" action="onlyspecificcars.php">
            <input name="status" value="Electric" style="visibility: hidden;position:absolute;">
            <a><button id="closedetails">X</button></a>
            <form>
        <?php
        } ?>
        </div>
    </body>
</html>
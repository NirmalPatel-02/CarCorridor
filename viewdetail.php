<?php
    $var = $_POST['id'];
    include("connection.php");
    $query = "SELECT * FROM `carcorridor`.`sellcars` where id = $var";
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
<html>
    <head>
        <title>Details</title>
        <style>
            label{
                font-family:monospace;
                font-size: x-large;
            }
            a{
                font-family: monospace;
                font-size: xx-large;
                font-weight: 600;
            }
            #label,#name{
                margin-left: 50%;
            }
            #price{
                position: absolute;
                top: 500px;
                left: 250px;
            }
            #money{
                position: absolute;
                left: 250px;
                top: 530px;
                border: 2px solid red;
                border-radius: 5px;
                padding: 10px;
            }
            #cancel:hover{
                transform: scale(1.05);
            }
        </style>
    </head>
    <body>
        <div id="cardetails" style="padding-top:60px;background-color: rgb(242, 242, 242);width: 99%;height: 91%;border-radius: 10px;box-shadow: 1px 1px 1px;">
            <a href="buyoldcars.php"><button id="cancel" style="width: 50px;height: 50px;background-color: lightcoral;border: 0px; border-radius: 2px;right: 18px;top:4px;position: absolute;box-shadow: 1px 1px 4px;font-size: large;">X</button></a>
            <img src="<?php echo $row['img']?>" style="width: 600px;height: 400px;position: absolute;top: 7 0px;left: 30px;">
            <label id="label">Car Name</label><br>
            <a id="name"><?php echo $row['carname']?></a><br><br>
            <label id="label">Car Brand</label><br>
            <a id="name"><?php echo $row['brand']?></a><br><br>
            <label id="label">Fuel Type</label><br>
            <a id="name"><?php echo $row['fuel']?></a><br><br>
            <label id="label">Registration Year</label><br>
            <a id="name"><?php echo $row['registrationyear']?></a><br><br>
            <label id="label">Car Ownership</label><br>
            <a id="name"><?php echo $row['carownership']?></a><br><br>
            <label id="label">Km</label><br>
            <a id="name"><?php echo $row['km']?></a><br><br>
            <label id="label">Location</label><br>
            <label id="label">City : </label>
            <a><?php echo $row['city']?></a>,
            <label >State :</label>
            <a ><?php echo $row['state']?></a><br><br>
            <label id="label">Mobile No</label><br>
            <a id="name">+91 <?php echo $row['mobile']?></a><br>
            <label id="price">Price</label><br>
            <?php $value =  moneyFormatIndia( $row['price']); ?>
            <a id="money">Rs <?php echo $value?></a>
        </div>
    </body>
</html>
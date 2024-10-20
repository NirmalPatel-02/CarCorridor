<?php
    session_start();
    $buyerid =$_SESSION['new'];
    $var = $_GET['id'];
    include("connection.php");
    $query = "SELECT * FROM `carcorridor`.`sellcars` where id = $var";
    $query_run = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($query_run);
    $sellerid = $row['seller'];
    $users ="SELECT * FROM `carcorridor`.`users` where id = $sellerid";
    $users_run = mysqli_query($conn,$users);
    $user = mysqli_fetch_array($users_run);
    $buyer_query ="SELECT * FROM `carcorridor`.`users` where id = $buyerid";
    $buyer_run = mysqli_query($conn,$buyer_query);
    $buyers = mysqli_fetch_array($buyer_run);

    if($_SERVER['REQUEST_METHOD']== "POST"){
        $carname = $_POST['carname'];
        $brand = $_POST['brand'];
        $offer = $_POST['offer'];
        $description = $_POST['description'];
        $seller_id = $_POST['seller_id'];
        $seller_mobile = $_POST['seller_mobile'];
        $buyer_id = $_POST['buyer_id'];
        $buyer_name = $_POST['buyer_name'];
        $buyer_mobile = $_POST['buyer_mobile'];
        $status = $_POST['status'];
        $sql ="INSERT INTO `carcorridor`.`trades` (`t_id`, `carname`, `brand`, `offer`,`description`,`seller_id`,`seller_mobile`,`buyer_id`,`buyer_name`,`buyer_mobile`,`trade_status`) VALUES (NULL, '$carname', '$brand', '$offer' ,'$description' ,'$seller_id','$seller_mobile','$buyer_id','$buyer_name','$buyer_mobile','$status')";
        mysqli_query($conn,$sql);    
    }

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
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
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
            #seller:hover{
                transform: scale(1.05);
            }
            #sellerinfo{
                position: absolute;
                width:600px;
                height: 320px;
                z-index: 2;
                background-color: white;
                top:200px;
                left:480px;
                border-radius: 5px;
                box-shadow: 2px 2px 5px;
                visibility: hidden;
                padding-top: 30px;
            }
            #tradeclose{
                position: absolute;
                width: 35px;
                height: 35px;
                top: -8px;
                right: -8px;
                border-radius: 5px;
                background-color: lightcoral;
                border: 0px;
                font-weight: bold;
                box-shadow: 1px 1px 2px;
            }
            #tradeclose:hover{
                transform: scale(1.05);
            }
            #title,#detail{
                margin-left: 10%;
            }
            #tradebutton{
                width:100px;
                height:30px;
                margin-left:42%;
                background-color:lightblue;
                border:1px solid black;
                border-radius:4px;
                box-shadow:1px 1px 2px;
                font-weight:bold;
            }
            #tradebutton:hover{
                transform: scale(1.05);
            }
        </style>
        <script>
            function show(){
                document.getElementById('sellerinfo').style.visibility ='visible';
            }
            function hide(){
                document.getElementById('sellerinfo').style.visibility ='hidden';
            }
        </script>
    </head>
    <body>
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        <div id="cardetails" style="padding-top:60px;background-color: rgb(242, 242, 242);width: 99%;height: 91%;border-radius: 10px;box-shadow: 1px 1px 1px;">
            <a href="buyoldcars.php"><button id="cancel" style="width: 50px;height: 50px;background-color: lightcoral;border: 0px; border-radius: 2px;right: 18px;top:4px;position: absolute;box-shadow: 1px 1px 4px;font-size: large;">X</button></a>
            <img src="<?php echo $row['img']?>" style="width: 600px;height: 400px;position: absolute;top: 7 0px;left: 30px;">
            <label id="label">Car Name</label><br>
            <a id="name"><?php echo $row['carname']?></a><br><br><br>
            <label id="label">Car Brand</label><br>
            <a id="name"><?php echo $row['brand']?></a><br><br><br>
            <label id="label">Fuel Type</label><br>
            <a id="name"><?php echo $row['fuel']?></a><br><br><br>
            <label id="label">Registration Year</label><br>
            <a id="name"><?php echo $row['registrationyear']?></a><br><br><br>
            <label id="label">Car Ownership</label><br>
            <a id="name"><?php echo $row['carownership']?></a><br><br><br>
            <label id="label">Km</label><br>
            <a id="name"><?php echo $row['km']?></a><br><br><br>
            <label id="label">Location</label><br>
            <label id="label">City : </label>
            <a><?php echo $row['city']?></a>,
            <label >State :</label>
            <a ><?php echo $row['state']?></a><br><br><br>
            <!-- <label id="label">Mobile No</label><br>
            <a id="name">+91 <?php //echo $row['mobile']?></a><br> -->
            <label id="price">Price</label><br>
            <?php $value =  moneyFormatIndia( $row['price']); ?>
            <a id="money">Rs <?php echo $value?></a>
            <button id="seller" onclick="show()" style="position: absolute;top:75px;right:200px;height:40px;background-color:white;border:0px;border-radius:20px;font-weight:bold;box-shadow:0px 0px 2px;">SellerInfo & Trade</button>
            <div id="sellerinfo">
                <button id="tradeclose" onclick="hide()">X</button>
                <label id="title">Seller Name</label><br>
                <a id="detail"><?php echo $user['username']; ?></a><br>
                <label id="title">Seller Email</label><br>
                <a id="detail"><?php echo $user['email']; ?></a><br>
                <label id="title">Seller MobileNo</label><br>
                <a id="detail" style="font-family: 'Trebuchet MS';font-size:medium;font-weight:bolder;">(Only Visible In Trde Section When Seller Accept Trade)</a><br><br>
                <label style="margin-left:40%;font-family: 'Trebuchet MS';font-weight:bold">Send Trade</label><br><br>
                <form method="post">
                    <input type="text" name="carname" value="<?php echo $row['carname']?>" style="visibility: hidden;position:absolute;z-index:-2;">
                    <input type="text" name="brand" value="<?php echo $row['brand']?>" style="visibility: hidden;position:absolute;z-index:-2;">
                    <input type="number" name="offer" placeholder="RS 00,00,000" style="width: 150px;height:30px;margin-left:60px;font-family:'Trebuchet MS';font-size:large;font-weight:bold;border:2px solid black;border-radius:4px;text-align:center;" >
                    <input type="text" name="description" placeholder="Enter Description Or Message" style="width: 320px;height:30px;font-family:'Trebuchet MS';font-size:large;font-weight:bold;border:2px solid black;border-radius:4px;"><br><br>
                    <input type="number" name="seller_id" value="<?php echo $sellerid;?>" style="visibility: hidden;position:absolute;z-index:-2;">
                    <input type="text" name="seller_mobile" value="<?php echo $row['mobile']?>" style="visibility: hidden;position:absolute;z-index:-2;">
                    <input type="number" name="buyer_id" value="<?php echo $buyerid;?>" style="visibility: hidden;position:absolute;z-index:-2;">
                    <input type="text" name="buyer_name" value="<?php echo $buyers['username'];?>" style="visibility: hidden;position:absolute;z-index:-2;">
                    <input type="text" name="buyer_mobile" value="<?php echo $buyers['mobile']?>" style="visibility: hidden;position:absolute;z-index:-2;">
                    <input type="text" name="status" value="Pending" style="visibility: hidden;position:absolute;z-index:-2;">
                    <button type="submit" id="tradebutton">Trade</button>
                </form>
            </div>
        </div>
    </body>
</html>
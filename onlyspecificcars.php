<?php   
    session_start();
    include("connection.php");
    $status = $_POST['status'];
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
        <title>CarConnect</title>
        <link rel="stylesheet" href="onlyspecificcar.css">
        <style>
            #populercarsfame{
                width: 1400px;
                height:fit-content;
                margin: 50px;
                margin-top: 80px;
            }
            #list{
                margin: 20px;
                width: 1350px;
                height: 180px;
                background-color: white;
                border-radius: 5px;
                box-shadow: 2px 2px 5px;
            }
            #carimage{
                margin: 10px;
                width: 260px;
                height: 160px;
                border-radius: 5px;
                border:2px solid black
            }
            #firsttextbox{
                position: relative;
                top: -175px;
                left: 320px;
                border: 0px solid black;
                width: 300px;
            }
            #secondtextbox{
                position: relative;
                top: -277px;
                left: 800px;
                border: 0px solid black;
                width: 300px;
            }
            #thirdtextbox{
                position: relative;
                top: -382px;
                left: 900px;
                border: 0px solid black;
                width: 300px;
            }
            #carname{
                border: 0px solid black;
                width: 250px;
                height: 25px;
                font-family:'Trebuchet MS';
                font-size: large;
                font-weight: bold;
                margin: 10px;
            }
            #carbrand{
                border: 0px solid black;
                width: 250px;
                height: 25px;
                font-family:'Trebuchet MS';
                font-size: large;
                font-weight: bold;
                margin: 10px;
            }
            #price{
                border: 0px solid black;
                width: 250px;
                height: 25px;
                font-family:'Trebuchet MS';
                font-size: large;
                font-weight: bold;
                margin: 10px;
            }
            #powertext,#power{
                border: 0px solid black;
                width: 250px;
                height: 25px;
                font-family:'Trebuchet MS';
                font-size: large;
                font-weight: bold;
                margin: 10px;
            }
            #torquetext,#torque{
                border: 0px solid black;
                width: 250px;
                height: 25px;
                font-family:'Trebuchet MS';
                font-size: large;
                font-weight: bold;
                margin: 10px;
            }
            #mileagetext,#mileage{
                border: 0px solid black;
                width: 250px;
                height: 25px;
                font-family:'Trebuchet MS';
                font-size: large;
                font-weight: bold;
                margin: 10px;
            }
            #viewdetails{
                border: 0px solid black;
                width: 980px;
                height: 30px;
                position: relative;
                top:-375px;
                left:320px;
                font-family:'Trebuchet MS';
                font-size: medium;
                text-align: center;
                border-radius: 5px;
                background-color: lightcoral;
                font-weight: bold;
                color: white;
                text-shadow: 1px 1px 1px black;
                box-shadow: 1px 1px 2px black;
            }
            #viewdetails:hover{
                transform: scale(1.02);
            }
            #back:hover{
                transform: scale(1.05);
            }
        </style>
    </head>
    <body>
    <div id="nevimage">
    <div id="nevbar">
            <div id="title"><h1><b style="color: red;">C</b>ar<b style="color: red;">C</b>orridor</h1></div>
            <div id="profilebox">
                <button id="Profile"></button>
                <div id="Account">
                    <label id="usernameText">USERNAME</label><br>
                    <div id="username" style="color:black;"><?php echo $_SESSION['username']?></div><br>
                    <label id="emailText" >EMAIL</label><br>
                    <div id="email" style="color:black;"><?php echo $_SESSION['email']?></div>
                    <form method="post" action="logout.php"><button id="logout">LogOut</button></form>
                </div>
            </div>
            <div id="tag">
                <a href="Main.php"><div id="HomeBG"><div id="Home" style="color:white;">Home</div></div></a>
                <div id="BuyBG"><div id="Buy">Buy Cars</div>
                    <div id="buyoption">
                        <a href="ExploreNewCars.php" style="text-decoration: none;color:black;"><option id="buynewcar">Buy New Cars</option><a><hr>
                        <a href="buyoldcars.php" style="text-decoration: none;color:black;"><option id="buyoldcar">Buy Old Cars</option></a><hr>
                        <a href="" style="text-decoration: none;color:black;"><option id="comparecar">Compare Cars</option></a><hr>
                        <a href="trade_history.php" style="text-decoration: none;color:black;"><option id="buyinghistory">Buying History</option></a>
                    </div>
                </div>
                <div id="SellBG"><div id="Sell">Sell Cars</div>
                    <div id="selloption">
                        <a href="sellmycars.php" style="text-decoration: none;color:black;"><option id="sellmycar">Seller Portal</option></a>
                    </div>
                </div>
                <div id="InfoBG"><div id="Info">Cars Info.</div></div>
                <div id="ServicesBG"><div id="Services">Services</div></div>
            </div>  
            <div id="hrline"></div> 
        </div>
    </div>
    <a href="ExploreNewCars.php"><button id="back" style="width: 80px;height:30px;background-color:white;border-radius:20px;position:absolute;top:150px;left:5px;border:0px;box-shadow:1px 1px 1px;font-weight:bold;font-family:'Trebuchet MS'"><-Back</button></a>
    <?php
        if($status == 'Populer'){
    ?>
    <a id="populertitle" style="font-family: 'Trebuchet MS';font-size:x-large;font-weight:bold;position:absolute;top:180px;left:80px;">Populer Cars</a>
    <?php
        }
        else if($status == 'Tranding'){
    ?>
    <a id="populertitle" style="font-family: 'Trebuchet MS';font-size:x-large;font-weight:bold;position:absolute;top:180px;left:80px;">Trending Cars</a>
    <?php
        }
        else if($status == 'Electric'){
    ?>
    <a id="populertitle" style="font-family: 'Trebuchet MS';font-size:x-large;font-weight:bold;position:absolute;top:180px;left:80px;">Electric Cars</a>
    <?php
        }
    ?>
    <div id="populercarsfame">
        <?php
                if($status == 'Electric'){
                    $query = "SELECT * FROM `carcorridor`.`cars` where status ='Electric' or fuel = 'Battery Electric Vehicle' ORDER BY RAND()";
                }
                else{
                    $query = "SELECT * FROM `carcorridor`.`cars` where status ='$status' ORDER BY RAND()";
                }
                $query_run = mysqli_query($conn,$query);
                $check_cars = mysqli_num_rows($query_run)>0;
                if($check_cars){
                    while($row =  mysqli_fetch_array($query_run)){
                    ?>        
                    <div id="list">
                        <img id="carimage" src="<?php echo $row['img'];?>">
                        <div id="firsttextbox">
                        <div id="carname"><?php echo $row['carname'];?></div>
                        <div id="carbrand"><?php echo $row['brand'];?></div>
                        <div id="price"><?php echo "Rs ".moneyFormatIndia($row['price']);?></div>
                        </div>
                        <div id="secondtextbox">
                        <div id="powertext">Power:</div>
                        <div id="torquetext">Torque:</div>
                        <div id="mileagetext">Mileage:</div>
                        </div>
                        <div id="thirdtextbox">
                        <div id="power"><?php echo $row['power']."bph";?></div>
                        <div id="torque"><?php echo $row['torque']."Nm";?></div>
                        <div id="mileage"><?php echo $row['mileage']."km";?></div>
                        </div>
                        <form method="post" action="newcardetails.php">
                        <input name="carid" type="text" style="visibility:hidden;position:absolute;" value="<?php echo  $row['id'];?>">
                        <input name="page" type="text" style="visibility:hidden;position:absolute;" value="<?php echo $status;?>">
                        <button id="viewdetails" type="submit">View Details</button>
                        </form>
                    </div>
            <?php
                }
            }
        ?>
    </div>
    </body>
</html>
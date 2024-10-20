<?php   
    session_start();
    include("connection.php");
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
        <link rel="stylesheet" href="Newcar.css">
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
    <a id="populerstatustitle">Populer Cars</a>
    <div id="populercarsfame">
        <?php
                $query = "SELECT * FROM `carcorridor`.`cars` where status ='Populer' ORDER BY RAND()";
                $query_run = mysqli_query($conn,$query);
                $check_cars = mysqli_num_rows($query_run)>0;
                $count = 0;
                if($check_cars){
                    while($row =  mysqli_fetch_array($query_run)){
                        if($count <=5){
                            $count++;
                    ?>        
                    <div id="list">
                        <img id="carimage" src="<?php echo  $row['img'];?>">
                        <div id="carname"><a><?php echo  $row['carname'];?></a></div>
                        <div id="brand"><a><?php echo  $row['brand'];?></a></div>
                        <div id="price"><a><?php echo  moneyFormatIndia($row['price']) . "Rs";?></a></div>
                        <form method="post" action="newcardetails.php">
                        <input name="carid" type="text" style="visibility:hidden;position:absolute;" value="<?php echo  $row['id'];?>">
                        <input name="page" type="text" style="visibility:hidden;position:absolute;" value="newcarpage">
                        <button id="viewdetails" type="submit">View Details</button>
                        </form>
                    </div>
            <?php
                        }
                }
            }
        ?>
    <form method="post" action="onlyspecificcars.php">
    </div>
    <input style="visibility: hidden;position:absolute;" value="Populer" name="status">
    <button id="viewallpopulercars">View All Populer Cars</button>
    </form>
    <a id="newrelesestatustitle">Tranding Cars</a>
    <div id="newrelesecarsfame">
        <?php
                $aquery = "SELECT * FROM `carcorridor`.`cars` where status ='Tranding' ORDER BY RAND()";
                $aquery_run = mysqli_query($conn,$aquery);
                $acheck_cars = mysqli_num_rows($aquery_run)>0;
                $count = 0;
                if($acheck_cars){
                    while($arow =  mysqli_fetch_array($aquery_run)){
                        if($count <=5){
                            $count++;
                    ?>        
                    <div id="list">
                        <img id="carimage" src="<?php echo  $arow['img'];?>">
                        <div id="carname"><a><?php echo  $arow['carname'];?></a></div>
                        <div id="brand"><a><?php echo  $arow['brand'];?></a></div>
                        <div id="price"><a><?php echo  moneyFormatIndia($arow['price']) . "Rs";?></a></div>
                        <form method="post" action="newcardetails.php">
                        <input name="carid" type="text" style="visibility:hidden;position:absolute;" value="<?php echo  $arow['id'];?>">
                        <input name="page" type="text" style="visibility:hidden;position:absolute;" value="newcarpage">
                        <button id="viewdetails" type="submit">View Details</button>
                        </form>
                    </div>
            <?php
                        }
                }
            }
        ?>
    <form method="post" action="onlyspecificcars.php">
    </div>
    <input style="visibility: hidden;position:absolute;" value="Tranding" name="status">
    <button id="viewallnewrelesecars">View All Tranding Cars</button>
    </form>
    <a id="electstatustitle">Electric Cars</a>
    <div id="electcarsfame">
        <?php
                $bquery = "SELECT * FROM `carcorridor`.`cars` where status ='Electric' or fuel ='Battery Electric Vehicle' ORDER BY RAND()";
                $bquery_run = mysqli_query($conn,$bquery);
                $bcheck_cars = mysqli_num_rows($bquery_run)>0;
                $count = 0;
                if($bcheck_cars){
                    while($brow =  mysqli_fetch_array($bquery_run)){
                        if($count <=5){
                            $count++;
                    ?>        
                    <div id="list">
                        <img id="carimage" src="<?php echo  $brow['img'];?>">
                        <div id="carname"><a><?php echo  $brow['carname'];?></a></div>
                        <div id="brand"><a><?php echo  $brow['brand'];?></a></div>
                        <div id="price"><a><?php echo  moneyFormatIndia($brow['price']) . "Rs";?></a></div>
                        <form method="post" action="newcardetails.php">
                        <input name="carid" type="text" style="visibility:hidden;position:absolute;" value="<?php echo  $brow['id'];?>">
                        <input name="page" type="text" style="visibility:hidden;position:absolute;" value="newcarpage">
                        <button id="viewdetails" type="submit">View Details</button>
                        </form>
                    </div>
            <?php
                        }
                }
            }
        ?>
    <form method="post" action="onlyspecificcars.php">
    </div> 
    <input style="visibility: hidden;position:absolute;" value="Electric" name="status">
    <button id="viewallelectcars">View All Electric Cars</button>
    </form>
    <a id="allcarsstatustitle">All New Cars</a>
    <div id="allcarsfame">
        <?php
                $cquery = "SELECT * FROM `carcorridor`.`cars` ORDER BY RAND()";
                $cquery_run = mysqli_query($conn,$cquery);
                $ccheck_cars = mysqli_num_rows($cquery_run)>0;
                if($ccheck_cars){
                    while($crow =  mysqli_fetch_array($cquery_run)){
                    ?>        
                    <div id="card">
                        <img id="carimage" src="<?php echo  $crow['img'];?>">
                        <div id="carname"><a><?php echo  $crow['carname'];?></a></div>
                        <div id="brand"><a><?php echo  $crow['brand'];?></a></div>
                        <div id="price"><a><?php echo  moneyFormatIndia($crow['price']) . "Rs";?></a></div>
                        <form method="post" action="newcardetails.php">
                        <input name="carid" type="text" style="visibility:hidden;position:absolute;" value="<?php echo  $crow['id'];?>">
                        <input name="page" type="text" style="visibility:hidden;position:absolute;" value="newcarpage">
                        <button id="viewdetails" type="submit">View Details</button>
                        </form>
                    </div>
            <?php
                }
            }
        ?>
    </div>
    <div style="width: 100px;height:300px;position:relative;top:1800px;">
        -
    </div>
    </body>
</html>
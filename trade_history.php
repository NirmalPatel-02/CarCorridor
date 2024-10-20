<?php
    session_start();
    $id =$_SESSION['new'];
    include("connection.php");

    if($_SERVER['REQUEST_METHOD']== "POST"){
        $trade_id = $_POST['trade_id'];
        $sql ="DELETE FROM `carcorridor`.`trades` where t_id = '$trade_id'";
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
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="trade_history.css">
      <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
      </script>
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
        <a id="header">Your Trades</a>
        <div style="position:absolute;top:250px;left:200px;">
        <div style="font-size: large;font-weight:bold;font-family:'Trebuchet MS';">Pending Trades</div><br>
            <div style="display: flex;flex-direction: row;font-weight:bold;font-family:'Trebuchet MS';">
                <a style="margin-left: 50px;"><u>Car Name</u> </a>
                <a style="margin-left: 140px;"><u>Brand</u></a>
                <a style="margin-left: 135px;"><u>Offered Price</u></a>
                <a style="margin-left: 130px;"><u>Seller Mobile No</u></a>
                <a style="margin-left: 130px;"><u>Status</u></a>
            </div>
        </div>
        <div id="adjust_box">
            <br>
            <?php
                $query = "SELECT * FROM `carcorridor`.`trades` where buyer_id = '$id'";
                $query_run = mysqli_query($conn,$query);
                $check_seller = mysqli_num_rows($query_run)>0;
                if($check_seller){
                    while($row = mysqli_fetch_array($query_run)){
                    ?>        
                    <div id="list">
                        <div id="carnamebox" style="width:220px;border:0px black solid;height:20px;margin-left:15px;overflow:hidden;">
                            <?php echo $row['carname']; ?>
                        </div>
                        <div id="carnamebox" style="width:160px;border:0px black solid;height:20px;margin-left:15px;overflow:hidden;">
                            <?php echo $row['brand']; ?>
                        </div>
                        <div id="carnamebox" style="width:160px;border:0px black solid;height:20px;margin-left:15px;overflow:hidden;">
                            Rs - <?php echo moneyFormatIndia($row['offer']); ?>
                        </div>
                        
                        <div id="carnamebox" style="width:250px;border:0px black solid;height:20px;margin-left:5px;overflow:hidden;text-align:center;">
                            <?php
                                if($row['trade_status'] == "Accepted"){
                                    echo $row['seller_mobile']; 
                                }else{
                                    echo "Seller Have To Accept Trade";
                                }
                            ?>
                        </div>
                        <div id="carnamebox" style="width:150px;border:0px black solid;height:20px;margin-left:15px;overflow:hidden;text-align:center;">
                            <?php echo $row['trade_status']; ?>
                        </div>
                        <form style="display: flex;flex-direction: row;" method="post">
                        <input name="trade_id" value="<?php echo $row['t_id']; ?>" style="visibility:hidden;position:absolute;">
                        <button id="accept" style="width:60px;border-radius:5px;border:0px;height:20px;margin-left:35px;background-color:lightcoral;font-weight:bold;">Cancel</button>
                        </form>
                    </div><br>
            <?php
                }
            }
            ?>
        </div>
        <div style="height:200px;position:absolute;top:700px;">
            -
        </div>
    </body>
</html>
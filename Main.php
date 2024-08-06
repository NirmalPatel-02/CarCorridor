<?php   
    // session_start();
    // if(isset($_SESSION['loggedin']) || ($_SESSION['loggedin'])!= true){
    //     header("location:CarCorridor.html");
    // }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CarConnect</title>
        <link rel="stylesheet" href="NevBar.css">
    </head>
    <body>
        <div id="nevbar">
            <div id="title"><h1><b style="color: red;">C</b>ar<b style="color: red;">C</b>orridor</h1></div>
            <div id="Name"><?php session_start(); echo $_SESSION['username']?></div>
            <div id="tag">
                <div id="HomeBG"><div id="Home" >Home</div></div>
                <div id="BuyBG"><div id="Buy">Buy Cars</div></div>
                <div id="SellBG"><div id="Sell">Sell Cars</div></div>
                <div id="InfoBG"><div id="Info">Cars Info.</div></div>
                <div id="ServicesBG"><div id="Services">Services</div></div>
            </div>
            
        </div>
        <hr style="position: relative;top: 125px;">
    </body>
</html>
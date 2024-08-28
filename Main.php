<?php   
    session_start();
    include("connection.php");
    $ver = $_SESSION['loggedin'];
    $email = $_SESSION['email'];
    $name = $_SESSION['username'];
    $id =$_SESSION['new'];
    if($ver != true){
        header("location:CarCorridor.php");
    }
    $sql = "SELECT * FROM `carcorridor`.`users` where id = '$id' ";
    $query = mysqli_query($conn,$sql);
    $check = mysqli_num_rows($query)>0;
    if($check){
        $row = mysqli_fetch_array($query);
    }
    $password = $row['pass'];
    $username = $row['username'];
    $newemail = $row['email'];
    $mobile = $row['mobile'];
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST['oldpass'] != "" &&  $_POST['newpass']!=""){
            $oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];
            if($oldpass == $password){
                $newsql = "UPDATE `carcorridor`.`users` SET pass = '$newpass' where id = '$id'";
                mysqli_query($conn,$newsql);
                $sql = "SELECT * FROM `carcorridor`.`users` where  id = '$id' ";
                $query = mysqli_query($conn,$sql);
                $check = mysqli_num_rows($query)>0;
                if($check){
                    $row = mysqli_fetch_array($query);
                }
                $password = $row['pass'];
                $username = $row['username'];
                $newemail = $row['email'];
                $mobile = $row['mobile'];
            }
        }
        else if($_POST['newname']!=""){
            $namepass = $_POST['namepass'];
            $newname = $_POST['newname'];
            if($password == $namepass){
                $newsql = "UPDATE `carcorridor`.`users` SET username = '$newname' where  id = '$id'";
                mysqli_query($conn,$newsql);
                $sql = "SELECT * FROM `carcorridor`.`users` where  id = '$id' ";
                $query = mysqli_query($conn,$sql);
                $check = mysqli_num_rows($query)>0;
                if($check){
                    $row = mysqli_fetch_array($query);
                }
                $password = $row['pass'];   
                $username = $row['username'];
                $newemail = $row['email'];
                $mobile = $row['mobile'];
            }
        }
        else if($_POST['newemail']!=""){
            $newemail = $_POST['newemail'];
            $emailpass = $_POST['emailpass'];
            if($password == $emailpass){
                $newsql = "UPDATE `carcorridor`.`users` SET email = '$newemail' where  id = '$id'";
                mysqli_query($conn,$newsql);
            }
            $sql = "SELECT * FROM `carcorridor`.`users` where  id = '$id' ";
            $query = mysqli_query($conn,$sql);
            $check = mysqli_num_rows($query)>0;
            if($check){
                $row = mysqli_fetch_array($query);
            }
            $password = $row['pass'];
            $username = $row['username'];
            $newemail = $row['email'];
            $mobile = $row['mobile'];
        }
        else if($_POST['newmobile']!=""){
            $newmobile = $_POST['newmobile'];
            $mobilepass = $_POST['mobilepass'];
            if($password == $mobilepass){
                $newsql = "UPDATE `carcorridor`.`users` SET mobile = '$newmobile' where  id = '$id'";
                mysqli_query($conn,$newsql);
                $sql = "SELECT * FROM `carcorridor`.`users` where  id = '$id' ";
                $query = mysqli_query($conn,$sql);
                $check = mysqli_num_rows($query)>0;
                if($check){
                    $row = mysqli_fetch_array($query);
                }
                $password = $row['pass'];
                $username = $row['username'];
                $newemail = $row['email'];
                $mobile = $row['mobile'];
            }
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CarConnect</title>
        <link rel="stylesheet" href="mainnevbar.css">
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
                <button id="Profile" onclick="visible()"></button>
                <div id="Account">
                    <label id="usernameText">USERNAME</label><br>
                    <div id="username" style="color:black;"><?php echo $username?></div>
                    <label id="emailText" >EMAIL</label>
                    <div id="email" style="color:black;"><?php echo $newemail?></div>
                    <form method="post" action="logout.php"><button id="logout">LogOut</button></form>
                </div>
            </div>
            <div id="tag">
                <div id="HomeBG"><div id="Home" >Home</div></div>
                <div id="BuyBG"><div id="Buy">Buy Cars</div>
                    <div id="buyoption">
                        <a href="ExploreNewCars.php" style="text-decoration: none;color:black;"><option id="buynewcar">Buy New Cars</option><a><hr>
                        <a href="buyoldcars.php" style="text-decoration: none;color:black;"><option id="buyoldcar">Buy Old Cars</option></a><hr>
                        <a href="" style="text-decoration: none;color:black;"><option id="comparecar">Compare Cars</option></a><hr>
                        <a href="" style="text-decoration: none;color:black;"><option id="buyinghistory">Buying History</option></a>
                    </div>
                </div>
                <div id="SellBG"><div id="Sell">Sell Cars</div>
                    <div id="selloption">
                        <a href="sellmycars.php" style="text-decoration: none;color:black;"><option id="sellmycar">Sell My Car</option></a><hr>
                        <a href="" style="text-decoration: none;color:black;"><option id="sellinghistory">Selling History</option></a>
                    </div>
                </div>
                <div id="InfoBG"><div id="Info">Cars Info.</div></div>
                <div id="ServicesBG"><div id="Services">Services</div></div>
            </div>  
            <div id="hrline"></div> 
        </div>
    </div>
    <div id="mainprofilebox">
        <div id="info">
        <label id="profiletext">Your Username</label><br>
        <input type="text" id="profileoutput" value="<?php echo $username ?>" readonly><br>
        <button id="usernamechange" onclick="changenamebox()">Change</button>
        <label id="profiletext">Your Email</label><br>
        <input type="text" id="profileoutput" value="<?php echo $newemail; ?>" readonly><br>
        <button id="emailchange" onclick="changeemailbox()">Change</button>
        <label id="profiletext">Your Password</label><br>
        <input type="password" id="profileoutput" value="<?php echo $password ?>" readonly><br>
        <button id="passchange" onclick="changepassbox()">Change</button>
        <label id="profiletext">Your MobileNo.</label><br>
        <input type="text" id="profileoutput" value="<?php echo $mobile ?>" readonly><br>
        <button id="mobilechange" onclick="changemobilebox()">Change</button>
        </div>
        <button id="close" onclick="divclose()">X</button>
    </div>
    <div id="changepassbox">
        <form method="post">
            <input id="oldpass" name="oldpass" placeholder="OLD PASSWORD"><br><br>
            <input id="newpass" name="newpass" placeholder="NEW PASSWORD"><br>
            <button type="submit" id="passsubmit">Change</button>
        <div id="passclose" onclick="changepassclose()">Close</div>
    </div>
    <div id="changeemailbox">
            <input id="oldpass" name="newemail" placeholder="NEW EMAIL"><br><br>
            <input id="newpass" name="emailpass" placeholder="PASSWORD"><br>
            <button type="submit" id="passsubmit">Change</button>
        <div id="passclose" onclick="changeemailclose()">Close</div>
    </div>
    <div id="changenamebox">
            <input id="oldpass" name="newname" placeholder="NEW USERNAME"><br><br>
            <input id="newpass" name="namepass" placeholder="PASSWORD"><br>
            <button type="submit" id="passsubmit">Change</button>
        <div id="passclose" onclick="changenameclose()">Close</div>
    </div>
    <div id="changemobilebox">
            <input id="oldpass" name="newmobile" placeholder="NEW MOBILENO."><br><br>
            <input id="newpass" name="mobilepass" placeholder="PASSWORD"><br>
            <button type="submit" id="passsubmit">Change</button>
        </form>
        <div id="passclose" onclick="changemobileclose()">Close</div>
    </div>
    <script>
        document.getElementById('mainprofilebox').style.visibility ='hidden';
        document.getElementById('changeemailbox').style.visibility ='hidden';
        document.getElementById('changenamebox').style.visibility ='hidden';
        document.getElementById('changemobilebox').style.visibility ='hidden';
        document.getElementById('changepassbox').style.visibility ='hidden';
        function visible(){
            document.getElementById('mainprofilebox').style.visibility ='visible';
        }

        function divclose(){
            document.getElementById('mainprofilebox').style.visibility ='hidden';
        }
        function changepassclose(){
            document.getElementById('changepassbox').style.visibility ='hidden';
        }
        function changepassbox(){
            document.getElementById('changepassbox').style.visibility ='visible';
        }
        function changeemailclose(){
            document.getElementById('changeemailbox').style.visibility ='hidden';
        }
        function changeemailbox(){
            document.getElementById('changeemailbox').style.visibility ='visible';
        }
        function changenameclose(){
            document.getElementById('changenamebox').style.visibility ='hidden';
        }
        function changenamebox(){
            document.getElementById('changenamebox').style.visibility ='visible';
        }
        function changemobileclose(){
            document.getElementById('changemobilebox').style.visibility ='hidden';
        }
        function changemobilebox(){
            document.getElementById('changemobilebox').style.visibility ='visible';
        }
    </script>
    </body>
</html>
<?php
    include("connection.php");
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $brand = $_POST['brand'];
        $carname = $_POST['carname'];
        $price = $_POST['price'];
        $engine = $_POST['engine'];
        $power = $_POST['power'];
        $torque = $_POST['torque'];
        $trans = $_POST['trans'];
        $mileage = $_POST['milege'];
        $fuel = $_POST['fuel'];
        $cylinder = $_POST['cylinder'];
        $capacity = $_POST['capacity'];
        $fuelcapacity = $_POST['fuelcapacity'];
        $steering = $_POST['steering'];
        $airbag = $_POST['airbag'];
        $ac = $_POST['ac'];
        $petrolbm = $_POST['petrolbm'];
        $cngbm = $_POST['cngbm'];
        $petroltm  = $_POST['petroltm'];
        $cngtm = $_POST['cngtm'];
        $status = $_POST['status'];
        $filename = $_FILES["uploadfile"]["name"];
        $tempfile = $_FILES["uploadfile"]["tmp_name"];
        $folder="newcarimages/".$filename;
        move_uploaded_file($tempfile,$folder);
        $sql = "INSERT INTO `carcorridor`.`cars` (`id`, `carname`, `brand`, `price`, `engine`, `power`, `torque`, `transmission`, `mileage`, `fuel`, `cylinder`, `capacity`, `fuelcapacity`, `steering`, `airbag`, `ac`, `petrolbm`, `cngbm`, `petroltm`, `cngtm`, `status`,`img`) VALUES (NULL, '$carname', '$brand', '$price', '$engine', '$power', '$torque', '$trans', '$mileage', '$fuel', '$cylinder', '$capacity', '$fuelcapacity', '$steering', '$airbag', '$capacity', '$petrolbm', '$cngbm', '$petroltm', '$cngtm', '$status','$folder')";
        mysqli_query($conn,$sql);
    }
?>
<html>
    <head>
    <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        function configureDropDownLists(brand, carname) {
              var Aston_Martin = ['DBS Superleggera', 'DB11', 'Vantage','DBX','Valkyrie'];
              var Audi = [
                'Select Car Name',
              'A3',
              'A4',
              'A6',
              'A7',
              'A8',
              'Q2',
              'Q3',
              'Q5',
              'Q7',
              'Q8',
              'S3',
              'S4',
              'S5',
              'S6',
              'S7',
              'S8',
              'RS3',
              'RS4',
              'RS5',
              'RS6',
              'RS7',
              'e-tron',
              'e-tron Sportback',
              'TT',
              'R8',
              ];
              var BMW = [
                'Select Car Name',
              '2 Series',
              '3 Series',
              '4 Series',
              '5 Series',
              '6 Series',
              '7 Series',
              '8 Series',
              'X1',
              'X2',
              'X3',
              'X4',
              'X5',
              'X6',
              'X7',
              'M2',
              'M3',
              'M4',
              'M5',
              'M6',
              'M8',
              'Z4',
              'i3',
              'i4',
              'iX3',
              'X5 xDrive45e',
              ];
              var Bugatti =[
                'Select Car Name',
                'Bugatti Chiron',
                 'Chiron Sport',
                 'Chiron Pur Sport',
                 'Chiron 110 Ans',
                 'Chiron Edition Noire',
                 'Chiron Sport ‘Les Légendes Du Ciel’',
                 'Chiron L’Ébé',
                 'Chiron Super Sport 300+',
                 'Divo',
                 'Centodieci',
                 'La Voiture Noire',
                 'Bolide',
                 'Mistral'];
                var Citroen = [
                'Select Car Name',
                'Citroën C3',
                'Citroën eC3 (Electric)',
                'Citroën C3 Aircross',
                'Citroën C5 Aircross',
                'Citroën Basalt (Upcoming)',
                'Citroën C3X (Upcoming)'
                ];
                var Datsun =[
                'Select Car Name',
                    'Go',
                    'Got',
                    'redi-Go'
                ];
                var Ferrari = [
                'Select Car Name',
                'Ferrari SF90 Stradale',
                'Ferrari SF90 Spider',
                'Ferrari 296 GTB',
                'Ferrari 296 GTS',
                'Ferrari 12Cilindri',
                'Ferrari 12Cilindri Spider',
                'Ferrari Purosangue',
                'Ferrari Roma',
                'Ferrari Roma Spider',
                'Ferrari 812 Competizione',
                'Ferrari 812 Competizione A',
                'Ferrari Daytona SP3',
                'Ferrari Monza SP1',
                'Ferrari Monza SP2',
                'Ferrari F8 Tributo',
                'Ferrari F8 Spider',
                'Ferrari Portofino',
                'Ferrari GTC4Lusso'
                ];
                var Fiat  =  [
                'Select Car Name',
                'Fiat 500',
                'Fiat Panda',
                'Fiat Tipo',
                'Fiat 500X',
                'Fiat 600 (2023)',
                'Fiat Ulysse',
                'Fiat E-Doblò',
                'Fiat Mobi',
                'Fiat Argo',
                'Fiat Cronos',
                'Fiat Pulse',
                'Fiat Fastback',
                'Fiat Strada',
                'Fiat Toro',
                'Fiat Fiorino',
                'Fiat Ducato'
                ];
                var Force = [
                'Select Car Name',
                'Gurkha',
                'Trax Cruiser',
                'Urbania',
                'Traveller',
                'Trax',
                'Toofan',
                'Cruiser',
                'Citiline',
                'Monobus'
                ];
                var Ford = [
                'Select Car Name',
                'Ford Mustang', 
                'Ford Mustang Mach-E',
                'Ford Maverick', 
                'Ford F-150 Lightning', 
                'Ford Bronco', 
                'Ford Bronco Sport', 
                'Ford Escape', 
                'Ford Explorer', 
                'Ford Expedition', 
                'Ford Ranger'
                ];
                var Haval= [
                'Select Car Name',
                'Haval H2',
                'Haval H6',
                'Haval H9',
                'Haval Jolion',
                'Haval F5',
                'Haval F7',
                'Haval F8',
                'Haval  Dargo',
                'Haval Vision 2025'
                ];
                var Honda = [
                'Select Car Name',
                'Honda Accord',
                'Honda Civic',
                'Honda CR-V',
                'Honda HR-V',
                'Honda Insight',
                'Honda Odyssey',
                'Honda Passport',
                'Honda Pilot',
                'Honda Ridgeline',
                'Honda City',
                'Honda Amaze',
                'Honda Elevate',
                'Honda WR-V'
                ];
                var Hyundai = [
                'Select Car Name',
                'Accent',
                'Elantra',
                'Sonata',
                'Loniq',
                'I30',
                'I20',
                'Elantra GT',
                'Hyundai Veloster N',
                'Hyundai I30 N',
                ];
                var Isuzu =[
                'Select Car Name',
                'Isuzu D-Max',
                'Isuzu MU-X',
                'Isuzu V-Cross',
                'Isuzu S-CAB',
                'Isuzu S-CAB Z',
                'Isuzu Hi-Lander'
                ];
                var Jaguar =[
                'Select Car Name',
                'Jaguar E-Pace',
                'Jaguar F-Pace',
                'Jaguar I-Pace',
                'Jaguar XE',
                'Jaguar XF',
                'Jaguar F-Type',
                'Jaguar XJ'
                ];
                var Jeep = [
                'Select Car Name',
                'Jeep Compass',
                'Jeep Wrangler',
                'Jeep Grand Cherokee',
                'Jeep Meridian',
                'Jeep Avenger (upcoming)'
                ];
                var Kia = [
                'Select Car Name',
                'Kia Sonet',
                'Kia Seltos',
                'Kia Carens',
                'Kia EV6'
                ];
                var Lamborghini =[
                'Select Car Name',
                'Lamborghini Huracán',
                'Lamborghini Huracán STO',
                'Lamborghini Huracán EVO RWD Spyder',
                'Lamborghini Urus',
                'Lamborghini Revuelto',
                'Lamborghini Urus SE'
                ];
                var Land_Rover =[
                'Select Car Name',
                'Land Rover Defender',
                'Land Rover Range Rover',
                'Land Rover Range Rover Velar',
                'Land Rover Range Rover Sport',
                'Land Rover Range Rover Evoque',
                'Land Rover Discovery',
                'Land Rover Discovery Sport'
                ];
                var Lexus =[
                'Select Car Name',
                'Lexus ES',
                'Lexus LS',
                'Lexus NX',
                'Lexus RX',
                'Lexus LX',
                'Lexus LC 500h',
                'Lexus LM',
                'Lexus UX',
                'Lexus RZ',
                'Lexus LBX',
                'Lexus GX'
                ];
                var Mahindra =[
                'Select Car Name',
                'Mahindra Thar',
                'Mahindra Thar Roxx',
                'Mahindra Scorpio',
                'Mahindra Scorpio N',
                'Mahindra XUV700',
                'Mahindra XUV 3XO',
                'Mahindra XUV400',
                'Mahindra Bolero',
                'Mahindra Bolero Neo',
                'Mahindra Bolero Neo Plus',
                'Mahindra Marazzo'
                ];
                var Maruti_Suzuki = [
                'Select Car Name',
                'Maruti Suzuki Alto K10',
                'Maruti Suzuki Alto 800',
                'Maruti Suzuki Swift',
                'Maruti Suzuki Dzire',
                'Maruti Suzuki Baleno',
                'Maruti Suzuki Celerio',
                'Maruti Suzuki Wagon R',
                'Maruti Suzuki Fronx',
                'Maruti Suzuki Brezza',
                'Maruti Suzuki Ertiga',
                'Maruti Suzuki Jimny',
                'Maruti Suzuki XL6',
                'Maruti Suzuki Invicto',
                'Maruti Suzuki S-Presso',
                'Maruti Suzuki Eeco',
                'Maruti Suzuki Ciaz',
                'Maruti Suzuki Grand Vitara',
                'Maruti Suzuki Scorpio'
                ];
                var Mercedes_Benz = [
                'Select Car Name',
                'Mercedes-Benz A-Class Limousine',
                'Mercedes-Benz C-Class',
                'Mercedes-Benz E-Class',
                'Mercedes-Benz S-Class',
                'Mercedes-Benz CLS',
                'Mercedes-Benz GLA',
                'Mercedes-Benz GLC',
                'Mercedes-Benz GLE',
                'Mercedes-Benz GLS',
                'Mercedes-Benz G-Class',
                'Mercedes-Benz EQB',
                'Mercedes-Benz EQE',
                'Mercedes-Benz EQS',
                'Mercedes-Benz AMG C43',
                'Mercedes-Benz AMG GLC 43',
                'Mercedes-Benz Maybach S-Class',
                'Mercedes-Benz Maybach GLS'
                ];
                var Nisaan = [
                'Select Car Name',
                'Nissan GT-R',
                'Nissan Magnite',
                'Nissan X-Trail',
                'Nissan Juke (upcoming)'
                ];
                var Porsche = [
                'Select Car Name',
                'Porsche 718',
                '718 Cayman',
                '718 Boxster',
                '718 Cayman GT4 RS',
                '718 Spyder RS',
                'Porsche 911',
                '911 Carrera',
                '911 Turbo',
                '911 GT3',
                '911 Targa',
                '911 Dakar',
                '911 S/T',
                'Taycan Cross Turismo',
                'Taycan Sport Turismo',
                'Porsche Panamera',
                'Panamera',
                'Panamera Executive',
                'Porsche Macan',
                'Macan',
                'Macan EV',
                'Macan Turbo',
                'Cayenne',
                'Cayenne Coupe'
                ];
                var Renault = [
                'Select Car Name',
                'Renault Kwid',
                'Renault Triber',
                'Renault Kiger'
                ];
                var Rolls_Royce = [
                'Select Car Name',
                'Phantom',
                'Ghost',
                'Cullinan',
                'Wraith',
                'Dawn',
                'Spectre'
                ];
                var Skoda = [
                'Select Car Name',
                'Kushaq',
                'Slavia',
                'Kodiaq',
                'Superb',
                'Enyaq',
                'Octavia'
                ];
                var Tata_Motors = [
                'Select Car Name',
                'Tata Punch',
                'Tata Altroz', 
                'Tata Tiago', 
                'Tata Tiago NRG',
                'Tata Tigor', 
                'Tata Tigor EV',
                'Tata Nexon', 
                'Tata Nexon EV Prime', 
                'Tata Safari', 
                'Tata Curvv EV',
                'Tata Punch EV', 
                'Tata Tiago EV'
                ];
                var Tesla = [
                'Select Car Name',
                'Model S',
                'Model X',
                'Model 3',
                'Model Y',
                'Tesla Semi',
                'Cybertruck'
                ];
                var Toyota = [
                'Select Car Name',
                'Camry',
                'Corolla',
                'RAV4',
                'Highlander',
                'Land Cruiser',
                'Avalon',
                'Prius',
                'Tacoma',
                'Tundra',
                'Sienna',
                '4Runner',
                'Sequoia',
                'Supra',
                'C-HR',
                'Venza'
                ];
                var Volvo =[
                'Select Car Name',
                'Volvo S60',
                'Volvo S90',
                'Volvo V60',
                'Volvo V90',
                'Volvo XC40',
                'Volvo XC60',
                'Volvo XC90',
                'Volvo EX30',
                'Volvo EX90'
                ];

                switch (brand.value) {
                case 'Aston Martin':
                carname.options.length = 0;
                  for (i = 0; i < Aston_Martin.length; i++) {
                    createOption(carname, Aston_Martin[i],Aston_Martin[i]);
                  }
                  break;
                case 'Audi':
                carname.options.length = 0;
                  for (i = 0; i < Audi.length; i++) {
                    createOption(carname, Audi[i], Audi[i]);
                  }
                  break;
                case 'BMW':
                carname.options.length = 0;
                  for (i = 0; i < BMW.length; i++) {
                    createOption(carname, BMW[i], BMW[i]);
                  }
                  break;
                  case 'Bugatti':
                carname.options.length = 0;
                  for (i = 0; i < Bugatti.length; i++) {
                    createOption(carname, Bugatti[i], Bugatti[i]);
                  }
                  break;
                  case 'Citroen':
                carname.options.length = 0;
                  for (i = 0; i < Citroen.length; i++) {
                    createOption(carname, Citroen[i], Citroen[i]);
                  }
                  break;
                  case 'Datsun':
                carname.options.length = 0;
                  for (i = 0; i < Datsun.length; i++) {
                    createOption(carname, Datsun[i], Datsun[i]);
                  }
                  break;
                  case 'Ferrari':
                carname.options.length = 0;
                  for (i = 0; i <Ferrari.length; i++) {
                    createOption(carname,Ferrari[i], Ferrari[i]);
                  }
                  break;
                  case 'Fiat':
                carname.options.length = 0;
                  for (i = 0; i < Fiat.length; i++) {
                    createOption(carname, Fiat[i], Fiat[i]);
                  }
                  break;
                  case 'Force':
                carname.options.length = 0;
                  for (i = 0; i <Force.length; i++) {
                    createOption(carname, Force[i], Force[i]);
                  }
                  break;
                  case 'Ford':
                carname.options.length = 0;
                  for (i = 0; i < Ford.length; i++) {
                    createOption(carname,Ford[i], Ford[i]);
                  }
                  break;
                  case 'Haval':
                carname.options.length = 0;
                  for (i = 0; i < Haval.length; i++) {
                    createOption(carname, Haval[i],Haval[i]);
                  }
                  break;
                  case 'Honda':
                carname.options.length = 0;
                  for (i = 0; i < Honda.length; i++) {
                    createOption(carname, Honda[i], Honda[i]);
                  }
                  break;
                  case 'Hyundai':
                carname.options.length = 0;
                  for (i = 0; i <Hyundai.length; i++) {
                    createOption(carname,Hyundai[i], Hyundai[i]);
                  }
                  break;
                  case 'Isuzu':
                carname.options.length = 0;
                  for (i = 0; i <Isuzu.length; i++) {
                    createOption(carname, Isuzu[i], Isuzu[i]);
                  }
                  break;
                  case 'Jaguar':
                carname.options.length = 0;
                  for (i = 0; i < Jaguar.length; i++) {
                    createOption(carname, Jaguar[i], Jaguar[i]);
                  }
                  break;
                  case 'Jeep':
                carname.options.length = 0;
                  for (i = 0; i <Jeep.length; i++) {
                    createOption(carname, Jeep[i], Jeep[i]);
                  }
                  break;
                  case 'Kia':
                carname.options.length = 0;
                  for (i = 0; i < Kia.length; i++) {
                    createOption(carname,Kia[i],Kia[i]);
                  }
                  break;
                  case 'Lamborghini':
                carname.options.length = 0;
                  for (i = 0; i < Lamborghini.length; i++) {
                    createOption(carname, Lamborghini[i],Lamborghini[i]);
                  }
                  break;
                  case 'Land Rover':
                carname.options.length = 0;
                  for (i = 0; i < Land_Rover.length; i++) {
                    createOption(carname, Land_Rover[i], Land_Rover[i]);
                  }
                  break;
                  case 'Lexus':
                carname.options.length = 0;
                  for (i = 0; i < Lexus.length; i++) {
                    createOption(carname, Lexus[i], Lexus[i]);
                  }
                  break;
                  case 'Mahindra':
                carname.options.length = 0;
                  for (i = 0; i < Mahindra.length; i++) {
                    createOption(carname, Mahindra[i], Mahindra[i]);
                  }
                  break;
                  case 'Maruti Suzuki':
                carname.options.length = 0;
                  for (i = 0; i < Maruti_Suzuki.length; i++) {
                    createOption(carname, Maruti_Suzuki[i], Maruti_Suzuki[i]);
                  }
                  break;
                  case 'Mercedes-Benz':
                carname.options.length = 0;
                  for (i = 0; i < Mercedes_Benz.length; i++) {
                    createOption(carname, Mercedes_Benz[i], Mercedes_Benz[i]);
                  }
                  break;
                  case 'Nissan':
                carname.options.length = 0;
                  for (i = 0; i < Nissan.length; i++) {
                    createOption(carname, Nissan[i], Nissan[i]);
                  }
                  break;
                  case 'Porsche':
                carname.options.length = 0;
                  for (i = 0; i <Porsche.length; i++) {
                    createOption(carname, Porsche[i], Porsche[i]);
                  }
                  break;
                  case 'Renault':
                carname.options.length = 0;
                  for (i = 0; i < Renault.length; i++) {
                    createOption(carname, Renault[i],Renault[i]);
                  }
                  break;
                  case 'Rolls-Royce':
                carname.options.length = 0;
                  for (i = 0; i < Rolls_Royce.length; i++) {
                    createOption(carname, Rolls_Royce[i], Rolls_Royce[i]);
                  }
                  break;
                  case 'Skoda':
                carname.options.length = 0;
                  for (i = 0; i < Skoda.length; i++) {
                    createOption(carname, Skoda[i], Skoda[i]);
                  }
                  break;
                  case 'Tata Motors':
                carname.options.length = 0;
                  for (i = 0; i < Tata_Motors.length; i++) {
                    createOption(carname, Tata_Motors[i], Tata_Motors[i]);
                  }
                  break;
                  case 'Tesla':
                carname.options.length = 0;
                  for (i = 0; i < Tesla.length; i++) {
                    createOption(carname, Tesla[i], Tesla[i]);
                  }
                  break;
                  case 'Toyota':
                carname.options.length = 0;
                  for (i = 0; i < Toyota.length; i++) {
                    createOption(carname, Toyota[i], Toyota[i]);
                  }
                  break;
                  case 'Volvo':
                carname.options.length = 0;
                  for (i = 0; i < Volvo.length; i++) {
                    createOption(carname, Volvo[i], Volvo[i]);
                  }
                  break;
                default:
                  ddl2.options.length = 0;
                  break;
              }
            }

            function createOption(ddl, text, value) {
              var opt = document.createElement('option');
              opt.value = value;
              opt.text = text;
              ddl.options.add(opt);
            }
    </script>
    </head>
    <body>
        <form id="form" method="post" enctype="multipart/form-data">
        <label id="brandtext">Select Brand</label>
                <select id="brand" onchange="configureDropDownLists(this,document.getElementById('carname'))" name="brand">
                    <option>Select Brand</option>
                    <option>Aston Martin</option>
                    <option>Audi</option>          
                    <option>BMW</option>
                    <option>Bugatti</option>
                    <option>Citroen</option>
                    <option>Datsun</option>
                    <option>Ferrari</option>
                    <option>Fiat</option>
                    <option>Force</option>
                    <option>Ford</option>
                    <option>Haval</option>
                    <option>Honda</option>
                    <option>Hyundai</option>
                    <option>Isuzu</option>
                    <option>Jaguar</option>
                    <option>Jeep</option>
                    <option>Kia</option>
                    <option>Lamborghini</option>
                    <option>Land Rover</option>
                    <option>Lexus</option>
                    <option>Mahindra</option>
                    <option>Maruti Suzuki</option>
                    <option>Mercedes-Benz</option>
                    <option>Nissan</option>
                    <option>Porsche</option>
                    <option>Renault</option>
                    <option>Rolls-Royce</option>
                    <option>Skoda</option>
                    <option>Tata Motors</option>
                    <option>Tesla</option>
                    <option>Toyota</option>
                    <option>Volvo</option>
                </select>
                <br>
                <label id="carnametext">Select Car Name</label>
                <select id="carname" name="carname">
                  <option>Select Car Name</option>
                </select>
                <br>
                <label>Engine :</label>
                <input type="text" id="engine" name="engine">
                <br>
                <label>Power :</label>
                <input type="text" name="power">
                <br>
                <label>Torque :</label>
                <input type="text" name="torque">
                <br>
                <label>transmission :</label>
                <input type="text" name="trans">
                <br>
                <label>mileage :</label>
                <input type="text" name="milege">
                <br>
                <label id="fueltext">Select Fuel Type</label>
                <select id="fuel" name="fuel">
                  <option>Select Fuel</option>
                  <option>Petrol</option>
                  <option>Diesel</option>
                  <option>CNG</option>
                  <option>LPG</option>
                  <option>Battery Electric Vehicle</option>
                  <option>Plug-in Hybrid Electric Vehicle</option>
                  <option>Hybrid Electric Vehicle</option>
                  <option>Racing Fuel</option>
                </select>
                <br>
                <label>Cylinger :</label>
                <input type="text" name="cylinder">
                <br>
                <label>Capacity :</label>
                <input type="text" name="capacity">
                <br>
                <label>Fuel Capacity :</label>
                <input type="text" name="fuelcapacity">
                <br>
                <label>Steering :</label>
                <input type="text" name="steering">
                <br>
                <label>Airbag :</label>
                <input type="text" name="airbag">
                <br>
                <label>Ac :</label>
                <input type="text" name="ac">
                <br>
                <label>PetrolBM :</label>
                <input type="text" name="petrolbm">
                <br>
                <label>CngBM :</label>
                <input type="text" name="cngbm">
                <br>
                <label>PetrolTM :</label>
                <input type="text" name="petroltm">
                <br>
                <label>cngTM :</label>
                <input type="text" name="cngtm">
                <br>
                <label id="imagetext">Uplode Image</label>
                <input type="file" name="uploadfile" id="file"><br>
                <label>Status :</label>
                    <select name="status">
                        <option>Normal</option>
                        <option>Populer</option>
                        <option>Tranding</option>
                        <option>NewRelese</option>
                        <option>Upcoming</option>
                    </select>
                <br>
                <label id="pricetext">Price</label>
                <input type="number" style="font-size: large;text-align:center;" id="price" placeholder="Rs 00,00,000" name="price" required><br><br>
                <button type="submit" id="button">Submit</button>
        </form>
    </body>
</html>
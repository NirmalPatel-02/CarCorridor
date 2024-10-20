<?php 
    session_start();
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
        <link rel="stylesheet" href="buyoldcars.css">
        <script>
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
            function showbox(){
                document.getElementById('cardetail').style.visibility = "visible";
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
            function configureDropDownListsstate(state, carname) {
              var Gujarat = [
              'Ahmedabad',
              'Surat',
              'Vadodara',
              'Rajkot',
              'Bhavnagar',
              'Jamnagar',
              'Junagadh',
              'Bhuj',
              'Gandhinagar',
              'Porbandar',
              'Anand',
              ];

              var Maharashtra = [
              'Mumbai',
              'Pune',
              'Nagpur',
              'Thane',
              'Nashik',
              'Navi Mumbai'
              ];
              
              var UttarPradesh = [
              'Agra',
              'Lucknow',
              'Varanasi',
              'Prayagraj',
              'Kanpur',
              'Mathura',
              'Vrindavan',
              'Noida',
              ];
              
              var Uttarakhand = [
              'Dehradun',
              'Haridwar',
              'Rishikesh',
              'Nainital',
              'Haldwani',
              'Roorkee',
              'Kashipur',
              'Pantnagar',
              'Mussoorie',
              'Uttarkashi'
              ];
              
              var Karnataka = [
              'Bengaluru',
              'Mysuru',
              'Mangaluru',
              'Belagavi',
              'Davanagere',
              'Ballari',
              'Shimoga'       
              ];
              
              var Odisha = [
              'Bhubaneswar',
              'Cuttack',
              'Rourkela',
              'Berhampur',
              'Sambalpur',
              'Puri',
              'Balasore',
              'Bhadrak',
              'Baripada'    
              ];
              
              var Nagaland = [
              'Kohima',
              'Dimapur',
              'Phek',
              'Mon',
              'Tuensang',
              'Longleng',
              'Kiphire'
              ];
              
              var Mizoram = [
              'Aizawl',
              'Lunglei',
              'Champhai',
              'Saiha',
              'Thenzawl',
              'Khawbung'    
              ];
              
              var Meghalaya = [
              'Shillong',
              'Tura',
              'Jowai',
              'Cherrapunji',
              'Nongstoin',
              'Nongpoh',
              'Dawki'    
              ];
              
              var Manipur = [
              'Imphal',
              'Ukhrul',
              'Churachandpur',
              'Thoubal',
              'Senapati',
              'Bishnupur',    
              ];
              
              var Madhya_Pradesh  = [
              'Indore',
              'Bhopal',
              'Gwalior',
              'Jabalpur',
              'Ujjain',
              'Mandu',
              'Sagar',
              'Orchha'
              ];
              
              var Kerala = [
              'Thiruvananthapuram',
              'Kochi',
              'Kozhikode',
              'Kollam',
              'Thrissur',
              'Kottayam',
              'Malappuram',
              'Kannur'  
              ];
              
              var Jharkhand = [
              'Ranchi',
              'Jamshedpur',
              'Dhanbad',
              'Bokaro',
              'Hazaribagh',
              'Giridih',
              'Deoghar'
              ];
              
              var Jammu_and_Kashmir = [
              'Srinagar',
              'Jammu',
              'Leh',
              'Gulmarg',
              'Pahalgam',
              'Anantnag',
              'Udhampur',
              'Baramulla',
              'Kathua',
              'Sopore'
              ];
              
              var Himachal_Pradesh = [
              'Shimla',
              'Manali',
              'Kufri',
              'Mandi',
              'Solan',
              'Bilaspur',
              'Chamba'
              ];
              
              var Haryana = [
              'Gurugram',
              'Faridabad',
              'Karnal',
              'Panchkula',
              'Ambala',
              'Panipat',
              'Hisar',
              'Rohtak',
              'Yamunanagar',
              'Bhiwani'
              ];
              
              var Goa = [
              'Panaji',
              'Vasco da Gama',
              'Margao',
              'Mapusa',
              'Ponda'
              ];
              
              var Chhattisgarh = [
              'Raipur',
              'Bhilai',
              'Bilaspur',
              'Durg',
              'Jagdalpur',
              'Korba',
              'Ambikapur'
              ];
              
              var Bihar = [
              'Patna',
              'Gaya',
              'Bhagalpur',
              'Darbhanga',
              'Sasaram',
              'Hajipur'
              ];
              
              var Assam = [
              'Guwahati',
              'Dibrugarh',
              'Jorhat',
              'Silchar',
              'Tezpur',
              'Nagaon'
              ];
              
              var Arunachal_Pradesh = [
              'Itanagar',
              'Pasighat',
              'Tawang',
              'Ziro',
              'Namsai',
              'Along'
              ];
              
              var Andhra_Pradesh = [
              'Visakhapatnam',
              'Vijayawada',
              'Tirupati',
              'Guntur',
              'Nellore'
              ];

                switch (state.value) {
                case 'Gujarat':
                city.options.length = 0;
                  for (i = 0; i < Gujarat.length; i++) {
                    createOptionstate(city, Gujarat[i],Gujarat[i]);
                  }
                  break;
                case 'Maharashtra':
                city.options.length = 0;
                  for (i = 0; i < Maharashtra.length; i++) {
                    createOptionstate(city, Maharashtra[i],Maharashtra[i]);
                  }
                  break;
                case 'UttarPradesh':
                city.options.length = 0;
                  for (i = 0; i < UttarPradesh.length; i++) {
                    createOptionstate(city, UttarPradesh[i],UttarPradesh[i]);
                  }
                  break;
                  case 'Uttarakhand':
                city.options.length = 0;
                  for (i = 0; i < Uttarakhand.length; i++) {
                    createOptionstate(city, Uttarakhand[i],GujarUttarakhandat[i]);
                  }
                  break;
                  case 'Karnataka':
                city.options.length = 0;
                  for (i = 0; i < Karnataka.length; i++) {
                    createOptionstate(city, Karnataka[i],Karnataka[i]);
                  }
                  break;
                  case 'Odisha':
                city.options.length = 0;
                  for (i = 0; i < Odisha.length; i++) {
                    createOptionstate(city, Odisha[i],Odisha[i]);
                  }
                  break;
                  case 'Nagaland':
                city.options.length = 0;
                  for (i = 0; i < Nagaland.length; i++) {
                    createOptionstate(city, Nagaland[i],Nagaland[i]);
                  }
                  break;
                  case 'Mizoram':
                city.options.length = 0;
                  for (i = 0; i < Mizoram.length; i++) {
                    createOptionstate(city, Mizoram[i],Mizoram[i]);
                  }
                  break;
                  case 'Meghalaya':
                city.options.length = 0;
                  for (i = 0; i < Meghalaya.length; i++) {
                    createOptionstate(city, Meghalaya[i],Meghalaya[i]);
                  }
                  break;
                  case 'Manipur':
                city.options.length = 0;
                  for (i = 0; i < Manipur.length; i++) {
                    createOptionstate(city, Manipur[i],Manipur[i]);
                  }
                  break;
                  case 'Madhya Pradesh':
                city.options.length = 0;
                  for (i = 0; i < Madhya_Pradesh.length; i++) {
                    createOptionstate(city, Madhya_Pradesh[i],Madhya_Pradesh[i]);
                  }
                  break;
                  case 'Kerala':
                city.options.length = 0;
                  for (i = 0; i < Kerala.length; i++) {
                    createOptionstate(city, Kerala[i],Kerala[i]);
                  }
                  break;
                  case 'Jharkhand':
                city.options.length = 0;
                  for (i = 0; i < Jharkhand.length; i++) {
                    createOptionstate(city, Jharkhand[i],Jharkhand[i]);
                  }
                  break;
                  case 'Jammu and Kashmir':
                city.options.length = 0;
                  for (i = 0; i < Jammu_and_Kashmir.length; i++) {
                    createOptionstate(city, Jammu_and_Kashmir[i],Jammu_and_Kashmir[i]);
                  }
                  break;
                  case 'Himachal Pradesh':
                city.options.length = 0;
                  for (i = 0; i < Himachal_Pradesh.length; i++) {
                    createOptionstate(city, Himachal_Pradesh[i],Himachal_Pradesh[i]);
                  }
                  break;
                  case 'Haryana':
                city.options.length = 0;
                  for (i = 0; i < Haryana.length; i++) {
                    createOptionstate(city, Haryana[i],Haryana[i]);
                  }
                  break;
                  case 'Goa':
                city.options.length = 0;
                  for (i = 0; i < Goa.length; i++) {
                    createOptionstate(city, Goa[i],Goa[i]);
                  }
                  break;
                  case 'Chhattisgarh':
                city.options.length = 0;
                  for (i = 0; i < Chhattisgarh.length; i++) {
                    createOptionstate(city, Chhattisgarh[i],Chhattisgarh[i]);
                  }
                  break;
                  case 'Bihar':
                city.options.length = 0;
                  for (i = 0; i < Bihar.length; i++) {
                    createOptionstate(city, Bihar[i],Bihar[i]);
                  }
                  break;
                  case 'Assam':
                city.options.length = 0;
                  for (i = 0; i < Assam.length; i++) {
                    createOptionstate(city, Assam[i],Assam[i]);
                  }
                  break;
                  case 'Arunachal Pradesh':
                city.options.length = 0;
                  for (i = 0; i < Arunachal_Pradesh.length; i++) {
                    createOptionstate(city, Arunachal_Pradesh[i],Arunachal_Pradesh[i]);
                  }
                  break;
                  case 'Andhra Pradesh':
                city.options.length = 0;
                  for (i = 0; i < Andhra_Pradesh.length; i++) {
                    createOptionstate(city, Andhra_Pradesh[i],Andhra_Pradesh[i]);
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
            function createOptionstate(ddl, text, value) {
              var opt = document.createElement('option');
              opt.value = value;
              opt.text = text;
              ddl.options.add(opt);
            }
        </script>
        <style>
            #submitfilter:hover{
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
        <div id="filter">
            <form method="post" style="padding: 40px;">
                <label id="brandtext" style="font-family: 'Trebuchet MS';">Select Car Brand</label><br>
                <select id="brand" style="width: 250px;height:30px;font-size:large;" onchange="configureDropDownLists(this,document.getElementById('carname'))" name="brandfilter">
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
                <label id="carnametext" style="font-family: 'Trebuchet MS';">Select Car Name</label><br>
                <select id="carname" name="carnamefilter"style="width: 250px;height:30px;font-size:large;" >
                  <option>Select Car Name</option>
                </select>
                <label style="font-family: 'Trebuchet MS';">Min_Price</label>
                <label style="font-family: 'Trebuchet MS';margin-left:55px;">Max_Price</label><br>
                <input type="number" id="minprice" name="minprice" style="width: 115px;height:20px;font-size:large;" placeholder="Rs 00,00,000">
                <input type="number" id="maxprice" name="maxprice" style="width: 115px;height:20px;font-size:large;" placeholder="Rs 00,00,000"><br><br>
                <button id="submitfilter" type="submit" onclick="filter()" style="background-color:cornflowerblue;border-radius:2px;border:1px solid black;width:250px;height:30px;color:white;font-size:large;">REFRESH</button>
            </form>
        </div>
        <div id="display" style="z-index: 0;">     
                <?php
                    include("connection.php");
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        if($_POST['carnamefilter']!= 'Select Car Name' && $_POST['brandfilter']!='Select Brand' && $_POST['minprice']=='' && $_POST['maxprice']==''){
                            $carname = $_POST['carnamefilter'];
                            $carbrand = $_POST['brandfilter'];
                            $query = "SELECT * FROM `carcorridor`.`sellcars` where carname = '$carname' AND brand = '$carbrand'";
                        }
                        else if($_POST['brandfilter']!='Select Brand' && $_POST['carnamefilter']=='Select Car Name' && $_POST['minprice']=='' && $_POST['maxprice']==''){
                            $carbrand = $_POST['brandfilter'];
                            $query = "SELECT * FROM `carcorridor`.`sellcars` where brand = '$carbrand'";
                        }
                        else if($_POST['brandfilter']=='Select Brand' && $_POST['carnamefilter']=='Select Car Name' && $_POST['minprice']!='' && $_POST['maxprice']!=''){
                            $minprice = $_POST['minprice'];
                            $maxprice = $_POST['maxprice'];
                            $query = "SELECT * FROM `carcorridor`.`sellcars` where price >= '$minprice' AND price<= '$maxprice'";
                        }
                        else if($_POST['brandfilter']!='Select Brand' && $_POST['carnamefilter']!='Select Car Name' && $_POST['minprice']!='' && $_POST['maxprice']!=''){
                            $minprice = $_POST['minprice'];
                            $maxprice = $_POST['maxprice'];
                            $carname = $_POST['carnamefilter'];
                            $carbrand = $_POST['brandfilter'];
                            $query = "SELECT * FROM `carcorridor`.`sellcars` where carname = '$carname' AND brand = '$carbrand' AND price >= '$minprice' AND price<= '$maxprice'";
                        }
                        else if($_POST['brandfilter']!='Select Brand' && $_POST['carnamefilter']=='Select Car Name' && $_POST['minprice']!='' && $_POST['maxprice']!=''){
                            $minprice = $_POST['minprice'];
                            $maxprice = $_POST['maxprice'];
                            $carbrand = $_POST['brandfilter'];
                            $query = "SELECT * FROM `carcorridor`.`sellcars` where price >= '$minprice' AND price<= '$maxprice' AND brand = '$carbrand'";
                        }
                        else if($_POST['brandfilter']=='Select Brand' && $_POST['carnamefilter']=='Select Car Name' && $_POST['minprice']!='' && $_POST['maxprice']==''){
                            $minprice = $_POST['minprice'];
                            $query = "SELECT * FROM `carcorridor`.`sellcars` where price >= '$minprice'";
                        }
                        else if($_POST['brandfilter']=='Select Brand' && $_POST['carnamefilter']=='Select Car Name' && $_POST['minprice']=='' && $_POST['maxprice']!=''){
                            $maxprice = $_POST['maxprice'];
                            $query = "SELECT * FROM `carcorridor`.`sellcars` where price<= '$maxprice'";
                        }
                        else if($_POST['brandfilter']!='Select Brand' && $_POST['carnamefilter']!='Select Car Name' && $_POST['minprice']!='' && $_POST['maxprice']==''){
                            $minprice = $_POST['minprice'];
                            $carname = $_POST['carnamefilter'];
                            $carbrand = $_POST['brandfilter'];
                            $query = "SELECT * FROM `carcorridor`.`sellcars` where price >= '$minprice' AND carname = '$carname' AND brand = '$carbrand'";
                        }
                        else if($_POST['brandfilter']!='Select Brand' && $_POST['carnamefilter']!='Select Car Name' && $_POST['minprice']=='' && $_POST['maxprice']!=''){
                            $maxprice = $_POST['maxprice'];
                            $carname = $_POST['carnamefilter'];
                            $carbrand = $_POST['brandfilter'];
                            $query = "SELECT * FROM `carcorridor`.`sellcars` where price <= '$maxprice' AND carname = '$carname' AND brand = '$carbrand'";
                        }
                        else{
                            $query = "SELECT * FROM `carcorridor`.`sellcars`";
                        }
                    }
                    else{
                        $query = "SELECT * FROM `carcorridor`.`sellcars`";  
                    }
                    $query_run = mysqli_query($conn,$query);
                    $check_car = mysqli_num_rows($query_run)>0;
                    if($check_car){
                        while($row = mysqli_fetch_array($query_run)){
                            ?>
                            <div id="card">
                                <form method="get" action="viewdetail.php">
                                <img src="<?php echo $row["img"]?>" style="width: 155px;height: 100px;margin: 5px;" id="image"><br>
                                <div style="white-space: nowrap;overflow:hidden;"><a id="carname" style="margin:8px;"><?php echo $row["carname"]; ?></a></div>
                                <a id="carbrand" style="margin: 8px;"><?php echo $row["brand"] ?></a><br>
                                <?php $value = moneyFormatIndia($row["price"])?>
                                <a id="price" style="margin: 8px;font-size: 25px;overflow:scroll;">Rs<?php echo $value ?></a><br>
                                <a id="city" style="margin: 8px;font-size: small;"><?php echo $row["city"] ?></a>,<a id="state" style="font-size: small;"><?php echo $row["state"] ?></a><br>
                                <button id="viewdetail" type="submit">View Detail</button>
                                <input name="id" value="<?php echo $row["id"]?>" style="visibility: hidden;">
                                </form> 
                            </div>  
                            <?php
                        }
                    }
                    else{
                        echo "no car found";
                    }
                ?>     
        </div>         
    </div>
    </body>
</html>
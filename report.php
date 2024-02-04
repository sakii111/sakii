<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
 require_once "config.php";
$opt="SELECT count(*) as total FROM `users` WHERE refcode='".$_SESSION['usercode']."' ";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
if($sum['total']==""){
    $users="0";
    
}else{
    $users=$sum['total'];
}
 $aopt="SELECT count(*) as atotal FROM `users` WHERE refcode='".$_SESSION['usercode']."' AND balance>0 ";
$aoptres=$conn->query($aopt);
$asum= mysqli_fetch_assoc($aoptres);
if($asum['atotal']==""){
    $ausers="0";
    
}else{
    $ausers=$asum['atotal'];
}

$opt1="SELECT SUM(balance) as total1 FROM `users` WHERE refcode='".$_SESSION['usercode']."' OR refcode1='".$_SESSION['usercode']."'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
if($sum1['total1']==""){
    $tbal=0;
    
}else{
    $tbal=$sum1['total1'];
} 



  
$query = "SELECT *FROM users WHERE refcode='".$_SESSION['usercode']."' OR refcode1='".$_SESSION['usercode']."' ORDER BY id DESC ";  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) {
    $date=date( 'd-m-Y',strtotime($row2[18]));
        $opt13="SELECT SUM(recharge) as total1 FROM `recharge` WHERE username='$row2[1]' AND status='successfull'";
$optres13=$conn->query($opt13);
$sum13= mysqli_fetch_assoc($optres13);
if($sum13['total1']==""){
    $st="Not Recharged";
    
}else{
    $st="Recharged";
} 
    $dataRow = $dataRow."
             <tr>
                        <td>$row2[4]</td>
                        <td>91$row2[1]</td>
                        <td>$st</td>
                        <td>$date</td>
                    </tr>
             

";
    
}

 
$query = "SELECT *FROM users WHERE refcode='".$_SESSION['usercode']."' OR refcode1='".$_SESSION['usercode']."' ORDER BY id DESC ";  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) {
    $user=$row2[1];
    $opt1="SELECT SUM(recharge) as total1 FROM `recharge` WHERE username='$user' AND status='successfull'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
if($sum1['total1']==""){
    $rbal=0;
    
}else{
    $rbal=$sum1['total1'];
} 
    $data = $data+"$rbal
            
             

";
    
}



$query5 = "SELECT *FROM users WHERE refcode='".$_SESSION['usercode']."' OR refcode1='".$_SESSION['usercode']."' ORDER BY id DESC ";  
$result5 = mysqli_query($conn, $query5);  
  
//display the retrieved result on the webpage  
while ($row25 = mysqli_fetch_array($result5)) {
    $user=$row25[1];
    $opt15="SELECT SUM(withdraw) as total1 FROM `withdraw` WHERE username='$user' AND status='successfull'";
$optres15=$conn->query($opt15);
$sum1= mysqli_fetch_assoc($optres15);
if($sum1['total1']==""){
    $wbal=0;
    
}else{
    $wbal=$sum1['total1'];
} 
    $data5 = $data5+"$wbal
            
             

";
    
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arbutus" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Report</title>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'handlers/l1UserListHandler',
                success: function (data) {
                    $("#users").html(data);
                }
            })
        });
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #248f24;
            height: 3.5em;
            color: aliceblue;
            opacity: 0.9;
            display: flex;
            align-items: center;
        }

        .container {
            width: 100%;
            display: grid;
            grid-template-columns: auto auto
        }

        .box {
            width: 99%;
            height: 100px;
            border: 2px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 55px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            display: flex;
            overflow-x: auto;
        }

        .nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 55px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            display: flex;
            overflow-x: auto;
        }

        .nav__link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            min-width: 50px;
            overflow: hidden;
            white-space: nowrap;
            font-family: sans-serif;
            font-size: 13px;
            color: #444444;
            text-decoration: none;
            -webkit-tap-highlight-color: transparent;
            transition: background-color 0.1s ease-in-out;
        }

        .nav__link:hover {
            background-color: rgba(196, 194, 194, 0.514);
        }

        .nav__link--active {
            color: #009578;
        }


        .nav__icon {
            font-size: 18px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: grey;
            text-decoration: none;
        }
    </style>
    <style type="text/css">
        @font-face {
            font-family: Roboto;
            src: url("chrome-extension://mcgbeeipkmelnpldkobichboakdfaeon/css/Roboto-Regular.ttf");
        }
    </style>
</head>

<body onselectstart="return false">
    <div class="header">
        <span onclick="window.location.href='me#'" style="margin-left:35px; "
            class="material-icons-outlined">arrow_back</span>
        <div style="margin-left:9px; font-size:19px; font-weight: bold;">Total Report</div>
    </div>
    <br>
    <div class="container">
        <div class="box" id="box1">
            <span class=""><?php echo $users;?></span>
            <span class="key">Total Users</span>
        </div>
        <div class="box" id="box2">
            <span class=""><?php echo $ausers;?></span>
            <span class="key">Active Users</span>
        </div>
        <div style="margin-top:2px" class="box" id="box3">
            <span class=""><?php echo $data;?></span>
            <span class="key">Recharge Amount</span>
        </div>
        <div style="margin-top:2px" class="box" id="box4">
            <span class=""><?php echo $data5;?></span>
            <span class="key">Withdraw Amount</span>
        </div>
        <div style="margin-top:2px" class="box" id="box5">
            <span class=""><?php echo $tbal;?></span>
            <span class="key">Team Balance</span>
        </div>
    </div>
    <br><br>
    <div id="users">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>

                        <th>
                            ID
                        </th>

                        <th>
                            Phone
                        </th>

                        <th>
                            Recharge Status
                        </th>

                        <th>
                            Join Date
                        </th>

                    </tr>
                </thead>
                <tbody>
                  
                <?php echo $dataRow;?>
                    
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
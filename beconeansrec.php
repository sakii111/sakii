<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login");
    exit;
}
 require_once "config.php";

                       

                       
$query =  "SELECT * FROM beconebetrec ORDER BY id DESC";


// result for method two 
$result = mysqli_query($conn, $query);


$dataRow = "";
$number_of_result = mysqli_num_rows($result);  
$results_per_page = 10;  

  
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

//determine which page number visitor is currently on  
if (!isset ($_GET['spage']) ) {  
    $spage = 1;  
} else {  
    $spage = $_GET['spage'];  
}  
 
//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($spage-1) * $results_per_page;  

//retrieve the selected results from database   
$query = "SELECT *FROM beconebetrec ORDER BY id DESC LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query);  
  
//display the retrieved result on the webpage  
while ($row2 = mysqli_fetch_array($result)) {
    if($row2[5]!=""){
        $vio=" <uni-view data-v-91f724d0='' class='round bg-purple' style='margin-right: 5px; width: 15px; height: 15px;'></uni-view>";
    } else {
        $vio="";
    } 
    $dataRow = $dataRow."
    <uni-view data-v-91f724d0=''>
    <uni-view data-v-91f724d0='' class=''>
        <uni-view data-v-91f724d0='' class='flex justify-between padding-xl solid-top'>
            <uni-view data-v-91f724d0='' style='margin-left: 10px;'>$row2[1]
            </uni-view>
            <uni-view data-v-91f724d0='' style='width: 157px; text-align: center;'>$row2[3]
            </uni-view>
            <uni-view data-v-91f724d0='' class='text-$row2[4]' style='font-size: 14px; margin-right: 26px; width: 52px; text-align: center;'>
                $row2[2]</uni-view>
            <uni-view data-v-91f724d0='' class='flex justify-center' style='width: 94px;'>
                <uni-view data-v-91f724d0='' class='round bg-$row2[4]' style='margin-right: 5px; width: 15px; height: 15px;'></uni-view>
                $vio
            </uni-view>
        </uni-view>
       
    </uni-view>
</uni-view>


";
    
}
    echo  '
   <uni-view data-v-91f724d0="" class="my-record-view bg-white shadow">
        <uni-button data-v-91f724d0="" class="cu-btn block bg-white lg">
                <uni-text data-v-91f724d0="" class="cuIcon-upstagefill my-space-x"><span></span></uni-text>
                <uni-view data-v-91f724d0="" class="my-textsize my-next-line">Sapre Record</uni-view>
        </uni-button>
        <uni-view data-v-91f724d0="" class="my-line-height block bg-blue"></uni-view>
        <uni-view data-v-91f724d0="">
                <uni-view data-v-91f724d0="" class="flex padding justify-between bg-white my-textsize">
                        <uni-text data-v-91f724d0="" style="padding-left: 26px;"><span>Period</span></uni-text>
                        <uni-text data-v-91f724d0="" style="padding-left: 41px;"><span>Price</span></uni-text>
                        <uni-text data-v-91f724d0="" style="padding-left: 10px;"><span>Number</span></uni-text>
                        <uni-view data-v-91f724d0="" style="padding-right: 20px;">Result</uni-view>
                </uni-view>
        </uni-view>
    
  
'. $dataRow.'';
              if ( $spage ==1 ) {  
    echo'  <uni-view data-v-91f724d0="" class="padding bg-white my-textsize solid-top" style="height: 52px;">
        <uni-view data-v-91f724d0="" class="my-lottery-info">
            <uni-text data-v-91f724d0="" class="my-textsize my-space-x"><span>'.(1+($spage-1)*10).'-'.($spage*10).' of
                    '.$number_of_page.'</span></uni-text>
                    <a href="#">
            <uni-button data-v-91f724d0="" class="cu-btn cuIcon  sm round my-space-x" data-type="down">
                <uni-text data-v-91f724d0="" class="cuIcon-back"><span></span></uni-text>
            </uni-button></a>
            <a href="/win?spage='.($spage+1).'">
            <uni-button data-v-91f724d0="" class="cu-btn cuIcon  sm round " data-type="up">
                <uni-text data-v-91f724d0="" class="cuIcon-right"><span></span></uni-text>
            </uni-button></a>
        </uni-view>
    </uni-view>
</uni-view>';
} else {  
     echo'
      <uni-view data-v-91f724d0="" class="padding bg-white my-textsize solid-top" style="height: 52px;">
        <uni-view data-v-91f724d0="" class="my-lottery-info">
            <uni-text data-v-91f724d0="" class="my-textsize my-space-x"><span>'.(1+($spage-1)*10).'-'.($spage*10).' of
                    '.$number_of_page.'</span></uni-text>
                    <a href="win?spage='.($spage-1).'">
            <uni-button data-v-91f724d0="" class="cu-btn cuIcon  sm round my-space-x" data-type="down">
                <uni-text data-v-91f724d0="" class="cuIcon-back"><span></span></uni-text>
            </uni-button></a>
            <a href="/win?spage='.($spage+1).'">
            <uni-button data-v-91f724d0="" class="cu-btn cuIcon  sm round " data-type="up">
                <uni-text data-v-91f724d0="" class="cuIcon-right"><span></span></uni-text>
            </uni-button></a>
        </uni-view>
    </uni-view>
</uni-view>


   ';
}  
             





?>


















                                   
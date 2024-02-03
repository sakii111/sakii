<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Bitter Mobile Template">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
<link rel="stylesheet" href="assets/css/inc/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/inc/owl-carousel/owl.theme.default.min.css">
<style>
body {
	font-family: -apple-system,BlinkMacSystemFont,Helvetica Neue,Helvetica,Segoe UI,Arial,Roboto,PingFang SC,Hiragino Sans GB,Microsoft Yahei,sans-serif;
}
.pleft {
	padding-left:3px;
}
.pright {
	padding-right:3px;
}
  .height{ height:40px; line-height:40px;}
.height .pageTitle{ line-height:2em;}
.st2 {
	position: absolute; 
	top: 50%; 
	left: 50%; 
	transform: translate(-50%, -50%);
}
.st1{
	width: 100%; 
	height: 500px; 
	position: relative;
}
.web_show[data-v-68d7bcd4] {
    height: 56px;
    width: 100%;
    padding: 0 15px;
    box-sizing: border-box;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    background: #eee;
    box-shadow: 0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12);
    will-change: padding-left,padding-right;
    position: relative;
}
.web_show .logo_box[data-v-68d7bcd4] {
    width: 36px;
    height: 36px;
}
.web_show .logo_box img[data-v-68d7bcd4] {
    width: 100%;
    height: 100%;
}
.web_show span[data-v-68d7bcd4] {
    display: inline-block;
    width: 74%;
    color: #616161;
    font-size: 20px;
    font-weight: 500;
    letter-spacing: .02em;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.web_show .download_box[data-v-68d7bcd4] {
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.web_show .download_box img[data-v-68d7bcd4] {
    width: 100%;
    height: 100%;
}
.index_title[data-v-68d7bcd4] {
    background: #fafafa;
}
.index_title .top_title[data-v-68d7bcd4] {
    text-align: center;
    padding: 17px 17px 0;
    color: #009688;
    font-size: 28px;
}
.index_title .bot_title[data-v-68d7bcd4] {
    text-align: center;
    padding: 0 17px 17px;
    color: #9a9a9a;
    font-size: 16px;
}
</style>
</head>

<body>
<?php include("include/connection.php");?>
<!-- Page loading -->

<!-- * Page loading --> 
<!--<a href="http://lottlucy.com/apk/lottlucy.apk">
 
<div class="appHeader1 height">
  <div class="text-center"> 
    <div class="pageTitle"><i class="icon ion-md-download"></i> Download App</div>
  </div>
  
  </div>
</a>-->
<!-- App Header -->
<div data-v-68d7bcd4 class="web_show">
	<div data-v-68d7bcd4="" class="logo_box">
		<img data-v-68d7bcd4="" src="assets/img/img6.png" alt="">
	</div>
	<span data-v-68d7bcd4="">Open with an app</span>
	<div data-v-68d7bcd4="" class="download_box">
		<a data-v-68d7bcd4="" target="_self" href="/testapp_1.0.0.apk" download="app.apk" style="color: rgb(78, 78, 78); font-size: 16px;">
			<img data-v-68d7bcd4="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAABYklEQVRoQ+3a3RGCMAwA4HQJh9AldAmf6SSek5Rnl9AldAiXqJcT7zi1JW0S4CC8eRd+voQWGnSwkM0txAEG6VfSe3/lVDaEcODsj/uKVKSD7Csv5maQXuasIn/GiN1aNkZsjCTmV5t+34mx50j/BrHniD1HficMGyOkMeK938YYN5Q3WufcCQCqX1FijGfieZ4hhMe/2OxgRwwAXABgRzmRYswdAI4pBGk9MgPMIIIEwaAJMSQEGTIRhowogoyMKUIUQ0bCFCOqIMqYKkQ1RAlTjWBBhDEsBBsihGEjRCBMjAhCDFKJEUOIQgoxoghxCBEjjlCBDGBUEGqQBEYNoQr5wuDP7HoCAzibSBcldwHdEgByiyIO4LOvOkTiIinHMAglS2PGrKMiTdNgm2c2W9u2ybbRUDsIPzvX9qukE5DtSBpEOt2E41lFsDHH+msGIctFIbmvv+uYfovSNXHwYiryAhi53DPcFIGeAAAAAElFTkSuQmCC" alt="">
		</a>
	</div>
</div>
<div data-v-68d7bcd4="" class="index_title">
	<p data-v-68d7bcd4="" class="top_title">Welcome Back</p>
	<p data-v-68d7bcd4="" class="bot_title">Quality Guarantee</p>
</div>
<!-- App Capsule -->
<div id="appCapsule"> 
  <!-- Card Overlay Carousel -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="owl-carousel owl-theme">
		<div class="item st1"><img src="assets/img/img1.jpg" class="st2" /></div>
		<div class="item st1"><img src="assets/img/img2.jpg" class="st2" /></div>
		<div class="item st1"><img src="assets/img/img3.jpg" class="st2" /></div>
		<div class="item st1"><img src="assets/img/img4.jpg" class="st2" /></div>
		<div class="item st1"><img src="assets/img/img5.jpg" class="st2" /></div>
	</div>  
  </div>
</div>
  <!-- * Card Overlay Carousel -->
  
  <div class="appContent">
    <div class="sectionTitle mb-2"> 
      
      <!-- post list -->
      <div class="vcard">
        <div class="row"> 
          <!-- item -->
          <?php
	$i=0;
  $productQuery=mysqli_query($con,"select * from `tbl_product` where `status`='1'");
  while($productResult=mysqli_fetch_array($productQuery)){$i++;?>
          <div class="col-6 <?php if(($i%2)==0){echo"pleft";}else{echo "pright";}?>">
            <div class="vcard card"> <a href="productdetails.php?pid=<?php echo encryptor('encrypt', $productResult['id']); ?>" class="postItem">
              <div class="imageWrapper"> <img src="<?php echo $productResult['images'];?>" alt="image" class="image"> </div>
              <p class="text-center"><?php echo $productResult['name'];?></p>
              <footer>₹ <?php echo number_format($productResult['price'], 2);?></footer>
              </a> </div>
          </div>
          <?php }?>
          <!-- * item --> 
          <!-- item -->
          
        </div>
      </div>
      <!-- * post list -->
      
      <div class="p-3"></div>
      
      <!-- * listview --> 
      
    </div>
    
    <!-- app Footer --> 
    
    <!-- * app Footer --> 
    
  </div>
</div>
<!-- * appCapsule -->

<?php include("include/footer.php");?>

<!-- ///////////// Js Files ////////////////////  --> 
<!-- Jquery --> 
<script src="assets/js/lib/jquery-3.6.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		dots: false,
		autoplay: true,
		autoplayTimeout: 2000,
		autoplaySpeed: 550,
		mouseDrag: false,
		touchDrag: false,
		pullDrag: false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})
</script>
</body>
</html>
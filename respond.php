<?PHP 
include("connect.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="business, corporate, corporate website, creative, html5, marketing, multipurpose, responsive, site templates">
<link rel="shortcut icon" href="img/favicon.png">
<title>Люмен Оптика</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	  <link href="css/ie_8.css" rel="stylesheet" />
      <script src="js/ie/html5shiv.js"></script>
      <script src="js/ie/respond.min.js"></script>
<![endif]-->

<!-- Add custom CSS here -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#ha-header">

<div class="navbar navbar-default navbar-fixed-top" id="ha-header">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand logo2" href="index.php"></a> </div>
    <div class="navbar-collapse collapse ">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php#top"><br>Главная</a></li>
        <li><a href="sale.php"><br>Акции</a></li>
        <li><a href="catalog.php"><br>Каталог</a></li>
        <li><a href="uinfo.php">Полезная<br>Информация</a></li>
        <li><a href="respond.php">Оставить<br>Отзыв</a></li>
        <li><a href="#"><br>О нас</a></li>
        <li><a href="index.php#contact"><br>Контакты</a></li>
        <li class="min-info">г. Ростов-на-Дону<br>8 (928) 779-44-79</li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>
<!-- End Fixed navbar --> 

<div id="respond" class="respond">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12">
        <div class=" container TitleSection">
          <header class="page-head">
            <h1>Ваши<small> // Отзывы</small></h1>
          </header>
        </div>

      <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12">
        <?php 
          $query=mysql_query("select* from responds where allowed='1'") or die(mysql_error());
          while($result=mysql_fetch_assoc($query)){
            echo"
              <div class='respond_event'>
              <div><span class='header-respond'>$result[name]</span></div>
              <div class='respond-time'>$result[time]</div>
              <div class='respond-container'>
              <div class='respond_text'><span>$result[text]</span>
              </div>
              </div>
              </div>
            ";
          }
        ?>

      </div>
      </div>


            <div class="contact_wrap" >
              <h3>Оставьте отзыв</h3>
              <form method="post" action="submit.php" id="passion_form">
                <div class="form-group">
                  <input type="text" size="50" name="contactname" id="InputName" value="" class="form-control" required placeholder="Ваше имя*"/>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" required rows="6" id="message"  placeholder="Ваш отзыв*"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Отправить</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-9 col-sm-12">
        <p>&nbsp;</p>
      </div>
      <div class="col-xs-12 col-md-3 col-sm-12">
        <ul class=" footer_social clearfix">
          <li><a href="https://vk.com/club72960834"><i class="fa fa-vk"></i></a></li>
          <li><a href="https://instagram.com/lumenoptica/"><i class="fa fa-instagram"></i></a></li>
          <li><a href="http://ok.ru/profile/226343630035"><i class="fa fa-odnoklassniki"></i></a></li>
          <li class="go_top"><a href="#top"><i class="fa fa-chevron-circle-up"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- /Footer --> 

<!-- JavaScript --> 
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/nicescroll.min.js"></script><!-- jquery nice scroll--> 
<script src="js/pace.min.js" ></script> <!--page load progress bar--> 
<script src="js/jquery.validate.min.js"></script><!--contact page--> 
<script src="http://maps.google.com/maps/api/js?sensor=true"></script><!--google map contact page--> 
<script src="js/gmaps.min.js"></script><!--google map contact page--> 
<script src="js/isotope.min.js"></script><!--Portfolio Filter--> 
<script src="js/flexslider.min.js"></script><!-- FlexSlider --> 
<script src="js/waypoints.min.js"></script><!--Header Effect--> 
<script src="js/custom_min.js"></script><!-- Custom JavaScript  -->

</body>
</html>
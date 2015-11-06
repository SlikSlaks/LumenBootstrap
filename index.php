<?php include('connect.php'); ?>
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

<!-- Fixed navbar -->
<?php include('header.php'); ?>
<!-- End Fixed navbar --> 

<!-- Full Page Image Header Area -->
<div id="top" class="header">
  <div class="flexslider">
    <ul class="slides">
      <?php 
          $query=mysql_query("select* from slider") or die(mysql_error());
          while($result=mysql_fetch_assoc($query)){
            echo"
            <li><img src='assets/".$result['img']."' alt='slider' /></li>
            ";
          }
      ?>
<!--       <li><img src="img/slider/1.jpg" alt="slider" /></li>
<li><img src="img/slider/2.jpg" alt="slider" /></li> -->
    </ul>
  </div>
</div>
<!-- /Full Page Image Header Area --> 

<!-- Services -->
<div id="services" class="services ha-waypoint"  data-animate-down="ha-header-small" data-animate-up="ha-header-large">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12">
        <div class=" container TitleSection">
          <header class="page-head">
            <h1>Наши<small> // Преимущества</small></h1>
          </header>
        </div>
        <div class="row">
          <div class="ser_wrap_3">
            <div class="col-xs-12 col-md-4 col-sm-6">
              <ul>
                <li>
                  <div class="icon_ser"><i class="fa fa-check"></i></div>
                  <div class="wrap">
                    <h3>Прямые договоры с производителями</h3>
                    <p>&nbsp;</p>
                  </div>
                </li>
                <li>
                  <div class="icon_ser"><i class="fa fa-check"></i></div>
                  <div class="wrap">
                    <h3>Оправы от 1 рубля</h3>
                    <p>&nbsp;</p>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-xs-12 col-md-4 col-sm-6">
              <ul>
                <li>
                  <div class="icon_ser"><i class="fa fa-check"></i></div>
                  <div class="wrap">
                    <h3>Бесплатная проверка зрения</h3>
                    <p>&nbsp;</p>
                  </div>
                </li>
                <li>
                  <div class="icon_ser"><i class="fa fa-check"></i></div>
                  <div class="wrap">
                    <h3>Более 15 тысяч видов товара</h3>
                    <p>&nbsp;</p>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-xs-12 col-md-4 col-sm-6">
              <ul>
                <li>
                  <div class="icon_ser"><i class="fa fa-check"></i></div>
                  <div class="wrap">
                    <h3>Быстрое и качественное изготовление очков</h3>
                    <p>&nbsp;</p>
                  </div>
                </li>
                <li>
                  <div class="icon_ser"><i class="fa fa-check"></i></div>
                  <div class="wrap">
                    <h3>Мы не первый год на рынке</h3>
                    <p>&nbsp;</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
</div> 


<div class="container video-container">
<div class="row">
  <div class="col-xs-3 col-md-3 col-sm-3">
  </div>
  <div class="col-xs-6 col-md-6 col-sm-6">
    <iframe class="video" width="100%" height="315" src="https://www.youtube.com/embed/fyJ8BKsW8A4" frameborder="0" allowfullscreen></iframe>
  </div>

</div>
</div>
<!--Contact -->
<div id="contact" class="contact">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12">
        <div class=" container TitleSection">
          <header class="page-head">
            <h1>Наши <small> // Контакты</small></h1>
          </header>
        </div>
        <div class="row for_contact">
                    <div class="col-xs-12 col-md-5 col-sm-12">
           
            <div class="for_map">
              <!-- <h3>Find the Address</h3> -->
              <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=6K_dM7tOuEeDqTJXpb6oyS0J-k12N4mu&width=100%&height=100%&lang=ru_RU&sourceType=constructor"></script></br>
            </div>
          </div>
          <div class="col-xs-12 col-md-7 col-sm-12">
            <div class="jumbotron">
              <address>
              <strong>г. Ростов-на-Дону, ул. Ворошиловский, 101</strong><br>
              <abbr title="Phone">Тел.:</abbr>8 (909) 436-95-12<br>
              </address>
            </div>
          </div>

        </div>

<div class="row for_contact">
            <div class="col-xs-12 col-md-5 col-sm-12">
           
            <div class="for_map">
              <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=-09bRc639VntjU7jbAIraDIKQSMUs95N&width=100%&height=100%&lang=ru_RU&sourceType=constructor"></script></br>
            </div>
          </div>
          <div class="col-xs-12 col-md-7 col-sm-12">
            <div class="jumbotron">
              <address>
              <strong>г. Ростов-на-Дону, пр-т. Ворошиловский, 75</strong><br>
              <abbr title="Phone">Тел.:</abbr>8 (863) 267-03-31<br>
              <abbr title="Phone">Мегафон:</abbr>8 (928) 779-44-79<br>
              <abbr title="Phone">МТС:</abbr>8 (988) 568-23-77<br>
              <abbr title="Phone">Билайн:</abbr>8 (903) 430-68-79<br>
              </address>
            </div>
          </div>

        </div>

        <div class="row for_contact">
            <div class="col-xs-12 col-md-5 col-sm-12">
           
            <div class="for_map">
              <!-- <h3>Find the Address</h3> -->
              <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=YfBD8A3mMT_VgQE_ioW8-dMNyRJ_T59k&width=100%&height=100%&lang=ru_RU&sourceType=constructor"></script></br>
            </div>
          </div>
          <div class="col-xs-12 col-md-7 col-sm-12">
            <div class="jumbotron">
              <address>
              <strong>г. Ростов-на-Дону, пр-т. Королева,12 «Б» ТЦ «Полюс»</strong><br>
              <abbr title="Phone">Тел.:</abbr>8 (863) 242-25-71<br>
              <abbr title="Phone">Мегафон:</abbr>8 (928) 956-11-36<br>
              <abbr title="Phone">МТС:</abbr>8 (989) 624-53-08<br>
              <abbr title="Phone">Билайн:</abbr>8 (903) 404-32-60<br>
              <abbr title="Phone">Теле2:</abbr>8 (904) 346-81-24<br>
              </address>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
<!-- /contact --> 

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
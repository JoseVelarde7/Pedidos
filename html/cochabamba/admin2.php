<?Php
session_start();
    if(isset($_SESSION['admin'])){
    $nombre=$_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Distribuidora Baesa</title>
		<meta name="description" content="Blueprint: Responsive Full Width Tabs" />
		<meta name="keywords" content="responsive tabs, full width tabs, template, blueprint" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../../favicon.ico">
		<link rel="stylesheet" href="../../css/font-awesome.css">
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../../css/component.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<style>
			.fullscreen-modal .modal-dialog {
			  margin: 0;
			  margin-right: auto;
			  margin-left: auto;
			  width: 95%;
			}
			.board{
   			 width: 90%;
			margin: 60px auto;
			height: 550px;
			background: #fff;
			/*box-shadow: 10px 10px #ccc,-10px 20px #ddd;*/
			}
			.board .nav-tabs {
			    position: relative;
			    /* border-bottom: 0; */
			    /* width: 80%; */
			    margin: 40px auto;
			    margin-bottom: 0;
			    box-sizing: border-box;

			}

			.board > div.board-inner{
			    background: #fafafa url(http://subtlepatterns.com/patterns/geometry2.png);
			    background-size: 30%;
			}

			p.narrow{
			    width: 60%;
			    margin: 10px auto;
			}

			.liner{
			    height: 2px;
			    background: #ddd;
			    position: absolute;
			    width: 80%;
			    margin: 0 auto;
			    left: 0;
			    right: 0;
			    top: 50%;
			    z-index: 1;
			}

			.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
			    color: #555555;
			    cursor: default;
			    /* background-color: #ffffff; */
			    border: 0;
			    border-bottom-color: transparent;
			}

			span.round-tabs{
			    width: 70px;
			    height: 70px;
			    line-height: 70px;
			    display: inline-block;
			    border-radius: 100px;
			    background: white;
			    z-index: 2;
			    position: absolute;
			    left: 0;
			    text-align: center;
			    font-size: 25px;
			}

			span.round-tabs.one{
			    color: rgb(34, 194, 34);border: 2px solid rgb(34, 194, 34);
			}

			li.active span.round-tabs.one{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: rgb(34, 194, 34);
			}

			span.round-tabs.two{
			    color: #febe29;border: 2px solid #febe29;
			}

			li.active span.round-tabs.two{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: #febe29;
			}

			span.round-tabs.three{
			    color: #3e5e9a;border: 2px solid #3e5e9a;
			}

			li.active span.round-tabs.three{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: #3e5e9a;
			}

			span.round-tabs.four{
			    color: #f1685e;border: 2px solid #f1685e;
			}

			li.active span.round-tabs.four{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: #f1685e;
			}

			span.round-tabs.five{
			    color: #999;border: 2px solid #999;
			}

			li.active span.round-tabs.five{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: #999;
			}

			.nav-tabs > li.active > a span.round-tabs{
			    background: #fafafa;
			}
			.nav-tabs > li {
			    width: 20%;
			}
			/*li.active:before {
			    content: " ";
			    position: absolute;
			    left: 45%;
			    opacity:0;
			    margin: 0 auto;
			    bottom: -2px;
			    border: 10px solid transparent;
			    border-bottom-color: #fff;
			    z-index: 1;
			    transition:0.2s ease-in-out;
			}*/
			.nav-tabs > li:after {
			    content: " ";
			    position: absolute;
			    left: 45%;
			   opacity:0;
			    margin: 0 auto;
			    bottom: 0px;
			    border: 5px solid transparent;
			    border-bottom-color: #ddd;
			    transition:0.1s ease-in-out;
			    
			}
			.nav-tabs > li.active:after {
			    content: " ";
			    position: absolute;
			    left: 45%;
			   opacity:1;
			    margin: 0 auto;
			    bottom: 0px;
			    border: 10px solid transparent;
			    border-bottom-color: #ddd;
			    
			}
			.nav-tabs > li a{
			   width: 70px;
			   height: 70px;
			   margin: 20px auto;
			   border-radius: 100%;
			   padding: 0;
			}

			.nav-tabs > li a:hover{
			    background: transparent;
			}

			.tab-content{
			}
			.tab-pane{
			   position: relative;
			padding-top: 50px;
			}
			.tab-content .head{
			    font-family: 'Roboto Condensed', sans-serif;
			    font-size: 25px;
			    text-transform: uppercase;
			    padding-bottom: 10px;
			}
			.btn-outline-rounded{
			    padding: 10px 40px;
			    margin: 20px 0;
			    border: 2px solid transparent;
			    border-radius: 25px;
			}

			.btn.green{
			    background-color:#5cb85c;
			    /*border: 2px solid #5cb85c;*/
			    color: #ffffff;
			}



			@media( max-width : 585px ){
			    
			    .board {
			width: 90%;
			height:auto !important;
			}
			    span.round-tabs {
			        font-size:16px;
			width: 50px;
			height: 50px;
			line-height: 50px;
			    }
			    .tab-content .head{
			        font-size:20px;
			        }
			    .nav-tabs > li a {
			width: 50px;
			height: 50px;
			line-height:50px;
			}

			.nav-tabs > li.active:after {
			content: " ";
			position: absolute;
			left: 35%;
			}

			.btn-outline-rounded {
			    padding:12px 20px;
			}
			#seccion{
					background-color: transparent;
					opacity: 0.5;
					padding-top: 0px;
					margin-top: -10px;
			}
			.mayuscula{
				text-transform:uppercase;
			}
			#home,.tab-content{
				background: #000;
			}
		</style>
	</head>
	<body class="cbp-spmenu-push">
		<div class="">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<div align="center">
						<a href="../admin.php">
							<i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
						</a>
					</div>
				</li>
				<li>
					<div class="btn-group">
					<a href="#" class="menombre dropdown-toggle" data-toggle="dropdown"><h4><?php echo $nombre; ?></h4></a>
					  <ul class="dropdown-menu" role="menu">
					    <li><a href="../../php/salirsesion.php" class="" id="opciones">Salir</a></li>
					  </ul>
					</div>
				</li>
			</ul>
		</div>
		<div class="containerm">
			<div class="" align="center">
				<h1>SUCURSALES</h1>
				<a href="cochabamba.php" class="btn1 btn-5 btn-5a icon-cart"><span>COCHABAMBA</span></a>
				<a href="../oruro/oruro.php" class="btn1 btn-5 btn-5a icon-cart"><span>ORURO</span></a>
			</div>
			<footer class="footer">
				<p class="info">(c) by Juan Jose for <br><a href="http://www.baesa.com.bo">www.baesa.com.bo</a></p>
			</footer>
		</div>
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/classie.js"></script>
	 <?PHP
        } 
        else {
            header("location:../index.html");
        }
    ?>
	</body>
</html>

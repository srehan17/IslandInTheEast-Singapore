<!Doctype html>
<html>
<head>
<title><?php echo GitWordPressLayout::$Viewbag['sTitle'] ?></title>
<link rel="stylesheet" type="text/css"
	href="//fonts.googleapis.com/css?family=Tangerine" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
	<div id="wrapper"
		class="<?php echo GitWordPressLayout::$Viewbag['sPage'] ?>">
		<div id="header">
			<div id="access" role="navigation">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle"
								data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span> <span
									class="icon-bar"></span> <span class="icon-bar"></span> <span
									class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo home_url(); ?>">SITE TITLE</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
			

   						<?php BootStrapMenusPlugin::displayMenu ();?>

				
				</nav>
			</div>
			<!-- #access -->
			<h1><?php echo GitWordPressLayout::$Viewbag['sTitle'] ?></h1>
		</div>
<?php GitWordPressLayout::renderBody(); ?>
<div id="delimiter"></div>
		<div id="footer">
			<h1>FOOTER</h1>
		</div>
	</div>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
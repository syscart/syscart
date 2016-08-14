<?php global $sysUrl; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo $sysUrl; ?>">
        <meta charset="utf-8">
        <title>error 404</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link href="media/css/error.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
		<script src="media/js/jquery/script/core/2.1.4/jquery.js"></script>
        
        <link rel="shortcut icon" href="media/img/error/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="media/img/error/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="media/img/error/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="media/img/error/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="media/img/error/apple-touch-icon-57-precomposed.png">
    </head>
    <body class="background-navy">
        <header>
        	<!--<div class="logo"><a href=""><img src="media/img/error/logo.png" class="logo" alt="" /></a></div>-->
        	<div class="ribbon"><img src="media/img/error/ribbon.png" alt="" /></div>
        </header>

        <section data-error="404" class="error">
        	<div class="number">
                <div id="n1"></div>
                <div id="n2"></div>
                <div id="n3"></div>
            </div>
        </section>
        
        <footer>
        	<div class="container">
	        	<ul class="social">
	        		<li><a href=""><img src="media/img/error/social-facebook.png" alt="" /></a></li>
	        		<li><a href=""><img src="media/img/error/social-twitter.png" alt="" /></a></li>
	        		<li><a href=""><img src="media/img/error/social-google-plus.png" alt="" /></a></li>
	        	</ul>
	        	<form action="?" method="post" class="search">
	        		<input type="text" class="field" name="query" />
	        		<input type="submit" class="button" name="submit" value="" />
	        	</form>
        	</div>
        </footer>
        
        <script src="media/js/error.js"></script>
    </body>
</html>
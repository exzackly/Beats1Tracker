<?php
require_once("detect.php");
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico" />
	<title>Beats 1 Tracker</title>   
	<!-- Bootstrap core -->
	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://www.getbootstrap.com/dist/js/bootstrap.min.js"></script>
	<!-- End Bootstrap core CSS -->

    <!-- Color Scheme
        #1A1A1A - BLACK
        #333333 - BLACK - 1
        #404040 - BLACK - 2
        #FE4A49 - RED
        #FED766 - YELLOW
        #2AB7CA - BLUE
        #6DB71F – GREEN
    -->
        
	<style type="text/css">
		.navbar,
		.navbar-toggle {
			background-color: #1A1A1A;
			border-color:#1A1A1A;
		}
			
		.navbar-default .navbar-nav>.active>a {
			background-color: #333333;
		}
		
		.navbar-default .navbar-nav>:hover,
		.navbar-default .navbar-nav>.active>a:hover,
		.navbar-default .navbar-nav>.open>a:hover {
			background-color: #404040;
		}
		#section1 {
			background-color: #FE4A49;
		}
		#section2 {
			background-color: #FED766;
		}
		#section3 {
			background-color: #2AB7CA;
		}
		#section4 {
			background-color: #6DB71F;
		}
		img.resizer { 
			margin-left:auto; 
			margin-right:auto; 
			display:block;
		}
		h1.resizer {
			text-align:center;
			font-size: 12vw;
			margin-top:0px;
		}
		h2.resizer {
			text-align:center;
			font-size: 8vw;
			margin-top:0px;
		}
		p.resizer {
			font-size: 5vmin;
			margin:auto;
		}
		
		table.resizer {width:100%; font-size:25px; table-layout:fixed; max-width:1000px; margin-left:auto; margin-right:auto;}
		table.resizer th {font-size:15px; text-align:center;}
		table.resizer td {height:130px;}
		
	<?php
		if ($browser == 'desktop') {
			echo <<<END
				img.resizer { 
					width:50%; 
				}
				p.resizer {
					max-width:70%;
				}
END;
		} else if ($browser == 'mobile') {
			echo <<<END
				img.resizer { 
					width:80%; 
				}
				p.resizer {
					max-width:80%;
				}
END;
		}
	
	?>
	</style>
</head>
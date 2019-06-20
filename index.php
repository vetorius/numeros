<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Previsión alumnos :: curso 2019-2020</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('document').ready(function() {

    $('#cursos a').click(function(event) {

    	var href = $(this).attr('href');

    	$('#lista').html('<img src="images/loader.gif" alt="loader">')
        $('#lista').load(href);
        event.preventDefault();
    	}); 
    });
 </script>
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Previsión de alumnos <small>Curso 2019-2020</small></a>
		</div>
	</div>
</nav>

<div class="container-fluid">
	<ul id="cursos" class="nav nav-tabs">
		<li><a href="datos.php?curso=1">1º E.S.O.</a></li>
		<li><a href="datos.php?curso=2">2º E.S.O.</a></li>
		<li><a href="datos.php?curso=3">3º E.S.O.</a></li>
		<li><a href="datos.php?curso=4">4º E.S.O.</a></li>
		<li><a href="datos.php?curso=5">1º Bachillerato</a></li>
		<li><a href="datos.php?curso=6">2º Bachillerato</a></li>
	</ul>
	<div id="lista" class="container">&nbsp;</div>
</div>

</body>
</html>

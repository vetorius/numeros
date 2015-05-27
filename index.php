

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Previsión alumnos :: curso 2016-2016</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Previsión de alumnos <small>Curso 2015-2016</small></a>
		</div>
	</div>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2">
			<ul id="cursos" class="nav nav-tabs">
				<li><a data-target="#lista" href="datos.php?curso=1">1º E.S.O.</a></li>
				<li><a data-target="#lista" href="datos.php?curso=2">2º E.S.O.</a></li>
				<li><a data-target="#lista" href="datos.php?curso=3">3º E.S.O.</a></li>
				<li><a data-target="#lista" href="datos.php?curso=4">4º E.S.O.</a></li>
				<li><a data-target="#lista" href="datos.php?curso=5">1º Bachillerato</a></li>
				<li><a data-target="#lista" href="datos.php?curso=6">2º Bachillerato</a></li>
			</ul>
		</div>
		<div class="tab-content col-sm-9 col-md-10">
			<h2 class="page-header">Alumnos por materias</h2>
			<div class="tab-pane" id="lista"></div>
		</div>
	</div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>

<script type="text/javascript">
	$(function() {
	  $("#cursos").tabs();
	});

	$(document).ready(function() {
	  $("#cursos").bind("show", function(e) {    
	    var contentURL = $(e.target).attr("href");
	    if (typeof(contentURL) != 'undefined')
	      $('#lista').load(contentURL, function(data){ $this.html(data); });
	  });
	});

</script>
</body>
</html>
<?php

/*
 * Gestion de matrículas
 *
 * Copyright (c) 2015 Victor manuel Sanchez
 *
   This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
 */

include 'include/config.php';

if (isset($_GET['curso'])) {

	require_once ('include/modelo.php');
	$base = new Modelo($sql_base, $sql_host, $sql_user, $sql_pass);
	$base->conectar() or die ('Error: ' . $base->Error);
	$resultado = $base->contaralumnos($_GET['curso']);
	echo '<pre>';
	print_r($resultado);
	echo '</pre>';
}
?>
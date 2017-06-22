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



function devuelveBarra ($totalAlumnos, $curso) {

    $ratio = array(30,30,30,30,35,35);

    $respuesta = '<div class="progress">';

    if ($totalAlumnos < $ratio[$curso - 1]) {
        $respuesta .= '<div class="progress-bar progress-bar-success" style="width: ';
        $respuesta .= $totalAlumnos;
        $respuesta .='%"><span class="sr-only">35% Complete (success)</span></div>';
    } elseif ($totalAlumnos < (2*$ratio[$curso - 1])) {
        $respuesta .= '<div class="progress-bar progress-bar-success" style="width: ';
        $respuesta .= $ratio[$curso - 1];
        $respuesta .='%"><span class="sr-only">35% Complete (success)</span></div>';
        $respuesta .= '<div class="progress-bar progress-bar-warning" style="width: ';
        $respuesta .= $totalAlumnos - $ratio[$curso - 1];
        $respuesta .='%"><span class="sr-only">35% Complete (success)</span></div>';
    } else {
        $respuesta .= '<div class="progress-bar progress-bar-success" style="width: ';
        $respuesta .= $ratio[$curso - 1];
        $respuesta .='%"><span class="sr-only">35% Complete (success)</span></div>';
        $respuesta .= '<div class="progress-bar progress-bar-warning" style="width: ';
        $respuesta .= $ratio[$curso - 1];
        $respuesta .='%"><span class="sr-only">35% Complete (success)</span></div>';
        $respuesta .= '<div class="progress-bar progress-bar-danger" style="width: ';
        $respuesta .= $totalAlumnos - (2 * $ratio[$curso - 1]);
        $respuesta .='%"><span class="sr-only">35% Complete (success)</span></div>';           
    }
    $respuesta .= '</div>';
    return $respuesta;
}

if (isset($_GET['curso'])) {

	require_once ('include/modelo.php');
	$base = new Modelo($sql_base, $sql_host, $sql_user, $sql_pass);
	$base->conectar() or die ('Error: ' . $base->Error);
	$resultado = $base->contaralumnos($_GET['curso']);
?>
<table class="table table-hover">
<tr><th>Materia</th><th>total</th><th>número de clases</th></tr>
<?php
    foreach ($resultado as $materia){
        echo '<tr><td class="col-md-6">'.$materia['materia'].'</td><td>'.$materia['total'].'</td><td>'.devuelveBarra($materia['total'],$_GET['curso']) .'</td></tr>';
    }
    echo '</table>';
}
?>

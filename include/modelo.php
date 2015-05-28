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

class Modelo {
	/* variables de conexión */
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	/* identificador de conexión y consulta */
	var $Conexion_ID = 0;
	var $Consulta_ID = 0;
	/* número de error y texto error */
	var $Errno = 0;
	var $Error = '';
	/* Método Constructor: Cada vez que creemos una
	variable de esta clase, se ejecutará esta función */
	function __construct($bd, $host, $user, $pass) {

		// asignar variables de conexión
		$this->BaseDatos = $bd;
		$this->Servidor = $host;
		$this->Usuario = $user;
		$this->Clave = $pass;
	}

	function conectar(){

		// establecemos la conexión
		$this->Conexion_ID = mysql_connect($this->Servidor, $this->Usuario, $this->Clave);
		if (!$this->Conexion_ID) {
			$this->Error = 'Ha fallado la conexión.';
			return 0;
		}
		//seleccionamos la base de datos
		if (!mysql_select_db($this->BaseDatos, $this->Conexion_ID)) {
			$this->Error = 'Imposible abrir '.$this->BaseDatos ;
			return 0;
		}
		return $this->Conexion_ID;
	}
	
	/* Ejecuta la consulta y devuelve un array asociativo*/
	function contaralumnos($curso){

		// verificamos que pasamos el parámetro
		if ($curso == '') {
		$this->Error = 'No ha especificado un curso';
			return 0;
		}
		// definimos la consulta
		$sql  = "SELECT ma.id_materia, CONVERT(ma.materia USING utf8), count(id_alumno) as total 
			FROM alu_mat am INNER JOIN materias ma USING(id_materia)
			WHERE ma.id_curso=$curso GROUP BY ma.id_materia";

		//ejecutamos la consulta
		mysql_set_charset('utf8');
		$this->Consulta_ID = mysql_query($sql, $this->Conexion_ID);

		if (!$this->Consulta_ID) {
			$this->Errno = mysql_errno();
			$this->Error = mysql_error();
		}
//		return mysql_errno() . ' ' . mysql_error();
		// construimos el array asociativo
		$i = 0;
		while ($fila = mysql_fetch_array($this->Consulta_ID)) { 
			$datos[$i]= $fila;
			$i++;
		}
		return $datos;
	}
}
?>
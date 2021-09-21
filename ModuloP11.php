 <?php 
include "conexion.php";
?>
<html>
<head>
<title>Modulo de Residencias</title> 
<link rel="stylesheet" href="estilo.css">

</head>
<body>
<header>
	<img src="logo1.jpeg" align="left" > <img src="logo3.jpeg"> <img src="logo1.jpeg" align="right">
</header>
<fieldset><h1 align=center>Modulo de Residencias</h1></fieldset>
	

 
<br>
<br>
<br/>
<br>
<form action="#" method="POST"  />
<fieldset aling-text="center">
<h2>Formulario</h2>
<label>Numero de Control:</label><br>
<input type="text" name="NoControl" placeholder="Numero de Control" maxlength="8" required/><br><br>
<label>Periodo:</label><br>
<input type="text" name="PeriodoEsco" placeholder="Periodo" maxlength="20"required /><br><br>
<label>Nombre del Proyecto:</label><br>
<input type="text" name="NomProyecto" maxlength="150" placeholder="Nombre del Proyecto"required /><br><br>
<label>Empresa:</label><br>
<input type="text" name="Empresa" maxlength="200" placeholder="Empresa"required/><br><br>
<label>Departamento:</label><br>
<input type="text" name="Departamento" maxlength="100" placeholder="Departamento"required/><br><br>
<label>Asesor Externo:</label><br>
<input type="text" name="AsesorExt" maxlength="70"placeholder="Asesor Externo"required /><br><br>
<label>Periodo de Realizacion:</label><br>
de:<input type="date" name="PeriodoRede"/><br>
a:&nbsp;&nbsp;<input type="date" name="PeriodoRea"/><br><br>
<label>Nombre del Alumno:</label><br>
<input type="text" name="NomAlumno" maxlength="70"placeholder="Nombre del Alumno"required/></p>
</fieldset>
<fieldset>
<p><input type="submit" name="enviar" value="Comprobar el formulario"> 
   <input type="reset" value="borrar todo"></p>
   </fieldset>

</form>
</body>
</html>
<?php
    
    if (isset($_POST["enviar"])) {
    	
    

	include "conexion.php"; 
		$id_alumno=rand(1,99);
		$NoControl=$_POST["NoControl"];
		$PeriodoEsco=$_POST["PeriodoEsco"];
		$NomProyecto=$_POST["NomProyecto"];
		$Empresa=$_POST["Empresa"];
		$Departamento=$_POST["Departamento"];
		$AsesorExt=$_POST["AsesorExt"];
		$PeriodoRede=$_POST["PeriodoRede"];
		$PeriodoRea=$_POST["PeriodoRea"];
		$NomAlumno=$_POST["NomAlumno"];
		$califica=0;

		$Datos = "INSERT INTO modulo VALUES
		('$id_alumno',
		  '$NoControl',
		  '$PeriodoEsco',
		  '$NomProyecto',
		  '$Empresa',
		  '$Departamento',
		  '$AsesorExt',
		  '$PeriodoRede',
		  '$PeriodoRea',
		  '$NomAlumno',
		  '$califica') ";

		  $query=pg_query($con,$Datos);

		  echo "<script>alert('Se a actualizado con exito la Calificacion')</script>";;

		  if (!$query) {
		  	echo"Error al enviar el formulario";
		  }
		}
	
?>
<html>
	<footer>
	<img src="logo2.jpeg" width="90px" height="90px"><br>
	<a href="logout.php">cerrar sesion</a>
</footer>
</html>
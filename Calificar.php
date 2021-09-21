<?php 
include "conexion.php";

        $id= $_GET["id"];	
		$select = "SELECT * FROM modulo WHERE id_alumno='$id'";
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

<br/>
<br>
<br>
<br>

<?php 

 ?>
 <form action="#" method="POST"/>
<fieldset>
	<table border>
		<tr>
			<th scope="row">ID</th>
			<th>Numero de Control</th>
			<th>Periodo</th>
			<th>Nombre del Proyecto</th>
			<th>Empresa</th>
			<th>Departamento</th>
			<th>Asesor Externo</th>
			<th>Periodo de:</th>
			<th>A:</th>
			<th>Nombre del Alumno</th>
			<th>Calificacion</th>
			<th>Calificar</th>
		</tr>
<?php 
 $resultado= pg_query($con,$select);
 while ($row=pg_fetch_assoc($resultado)) {?>
 
<div>
		<tr>
			<th><?php echo $row["id_alumno"]?></th>
			<th><?php echo $row["NoControl"]?></th>
			<th><?php echo $row["PeriodoEsco"]?></th>
			<th><?php echo $row["NomProyecto"]?></th>
			<th><?php echo $row["Empresa"]?></th>
			<th><?php echo $row["Departamento"]?></th>
			<th><?php echo $row["AsesorExt"]?></th>
			<th><?php echo $row["PeriodoRede"]?></th>
			<th><?php echo $row["PeriodoRea"]?></th>
			<th><?php echo $row["NomAlumno"]?></th>
			<th><input type="text" value="<?php echo $row["califica"]?>" name="califica"></th>
			<th><input type="submit" name="actualizar" value="Actualizar"></th>
			<th><a href="archivo.php?id=<?php echo $row["id_alumno"]?>">Imprimir</a></th>
		</tr>
		<tr>
			<th><a href="ModuloP2.php">Regresar</a></th>
			
		</tr>

	<?php } pg_free_result($resultado) ?>

	</div>
	</form>

		<?php 
if (isset($_POST["actualizar"])) {
	$califica=$_POST["califica"];
$actualizar1="UPDATE modulo SET califica='$califica' WHERE id_alumno='$id'";

	$resultado= pg_query($con,$actualizar1);

	if ($resultado) {
		echo "<script>alert('Se a actualizado con exito la Calificacion');window.location='ModuloP2.php';</script>";

	}else{
		echo "hubo un error";
	}
}
    


           
/*
        if (!$query) {
        	echo "Error en la consulta";
        }else{
        	if ($rows<1) {
        		echo "sin filas";
        	}else{
        	
        		
        	
        			
        		for ($i=0; $i <=$gp; $i++) {
        			echo '
        			<tr>
			<th scope="row">ID</th>
			<th>Numero de Control</th>
			<th>Periodo</th>
			<th>Nombre del Proyecto</th>
			<th>Empresa</th>
			<th>Departamento</th>
			<th>Asesor Externo</th>
			<th>Periodo de:</th>
			<th>A:</th>
			<th>Nombre del Alumno</th>
		</tr>
        			<tr>
        			   
        			   <td>'.$gp[0].'</td>
        			   <td>'.$gp[1].'</td>
        			   <td>'.$gp[2].'</td>
        			   <td>'.$gp[3].'</td>
        			   <td>'.$gp[4].'</td>
        			   <td>'.$gp[5].'</td>
        			   <td>'.$gp[6].'</td>
        			   <td>'.$gp[7].'</td>
        			   <td>'.$gp[8].'</td>
        			   <td>'.$gp[9].'</td>

        			</tr>
        			';
        			echo'<th><label>Calificacion:</label>
        			<input type="text" name="califica" maxlength="200" placeholder="Calificacion"/></th>
			<th><input type="submit" name="enviar" value="Enviar Calificacion"></th>
			<th>'.$gp[10].'</th>
			<th><label><input type="checkbox" name="checkbox" value="'.$gp[0].'">'.$gp[0].'</label></th>';


        			$gp= pg_fetch_array($query);
        			
        		$rows = pg_num_rows($query);
        		}

        		}
        	}
                    
        	if (isset($_POST["enviar"])) {
        		$califica=$_POST["califica"];
        		$inser = "UPDATE modulo 
        		         SET califica='$califica' WHERE id='.$gp[0].'";
        		$query=pg_query($con,$inser);
        		echo "Se ha enviado tu formulario";

		  if (!$query) {
		  	echo"Error al enviar el formulario";
		  }

		}

        

       */
       
        
            ?>
	</table>
	
</fieldset>

</form>

</body>
</html>
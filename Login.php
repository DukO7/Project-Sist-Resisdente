<?php 

include "conexion.php";

 	?>
 	<fieldset><h1 align=center>Modulo de Residencias</h1></fieldset><br><br>
 	<center><table border=3 width="300" bgcolor="#EFDDF5">
 		<form method="POST" action="validar.php">
 			<tr>
 				<td>Usuario:</td> <td><input type="text" name="user" required></td>
 			</tr>
 			<tr>
 				<td>Contraseña:</td> <td><input type="password" name="pass" required></td>
 			</tr>
 			<tr>
 				<td align="center" colspan="2"><input type="submit"></td>
 			</tr>

 		</form>

 	</table></center>

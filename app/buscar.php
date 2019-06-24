<?php
//Este codifgo dara pena a cualquier desarrollador que lo vea :(
//Conexion a la base de datos
$mysqli = new mysqli('localhost','root','','ci_php');
$salida = "";
$query = "SELECT * FROM usuarios";

if(isset($_POST['consulta'])){
    $busqueda = $mysqli->real_escape_string($_POST['consulta']);
    $query="SELECT id_usuario,nombre,apellido FROM usuarios WHERE nombre LIKE '%".$busqueda."%' OR apellido LIKE '%".$busqueda."%' OR id_usuario LIKE '%".$busqueda."%'";
}
$resultado = $mysqli->query($query);

if($resultado->num_rows>0){
    ?>
   <br><br>
    <table class="tabla_datos">
        <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($fila = $resultado->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $fila['id_usuario'] ?></td>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['apellido'] ?></td>
            </tr>
        <?php
        } ?>
        </tbody>
    </table>
<?php
}else{
    ?>
    <BR><BR>
    <table class="tabla_datos">
        <thead>
        <th>Ahh perro traes omnitrix</th>
        </thead>
    </table>
<?php
}
$mysqli->close();
?>

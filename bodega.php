<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    // Obtiene los datos del formulario POST y los escapa para evitar problemas de seguridad
    $Id_Bodega= mysqli_real_escape_string($conexion, $_POST["Id_Bodega"]);
    $Nombre = mysqli_real_escape_string($conexion, $_POST["Nombre"]); 
    $Telefono = mysqli_real_escape_string($conexion, $_POST["Telefono"]);
    // Consulta SQL con valores escapados
    $sql = "INSERT INTO tbl_bodega(Id_Bodega,Nombre,Telefono)
            VALUES ('$Id_Bodega', '$Nombre',  '$Telefono')";
    
    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        echo "Los datos se insertaron correctamente.";
    } else {
        echo "Problemas al insertar datos: " . mysqli_error($conexion);
    }
    
    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "No se han enviado datos a través del formulario ";
}

?>
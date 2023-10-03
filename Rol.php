<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    // Obtiene los datos del formulario POST y los escapa para evitar problemas de seguridad
    $Id_Rol = mysqli_real_escape_string($conexion, $_POST["Id_Rol"]);
    $Rol = mysqli_real_escape_string($conexion, $_POST["Rol"]); 
    // Consulta SQL con valores escapados
    $sql = "INSERT INTO tbl_rol(Id_Rol,Rol)
            VALUES ('$Id_Rol', '$Rol')";
    
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

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    // Obtiene los datos del formulario POST y los escapa para evitar problemas de seguridad
    $Id_Empleado = mysqli_real_escape_string($conexion, $_POST["Id_Empleado"]);
    $Nombre = mysqli_real_escape_string($conexion, $_POST["Nombre"]); // Corregir el nombre aquí
    $Apellido = mysqli_real_escape_string($conexion, $_POST["Apellido"]);
    $Telefono = mysqli_real_escape_string($conexion, $_POST["Telefono"]);
    $Id_Rol = mysqli_real_escape_string($conexion, $_POST["Id_Rol"]);
    // Consulta SQL con valores escapados
    $sql = "INSERT INTO tbl_usuarios(Id_Empleado,Nombre,Apellido,Telefono,Id_Rol)
            VALUES ('$Id_Empleado', '$Nombre', '$Apellido', '$Telefono', '$Id_Rol')";
    
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

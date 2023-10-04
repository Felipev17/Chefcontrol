<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    // Obtiene los datos del formulario POST y los escapa para evitar problemas de seguridad
    $Id_Receta = mysqli_real_escape_string($conexion, $_POST["Id_Receta"]);
    $Nombre = mysqli_real_escape_string($conexion, $_POST["Nombre"]); 
    $Descripcion = mysqli_real_escape_string($conexion, $_POST["Descripcion"]); 
    $Costo_Total = mysqli_real_escape_string($conexion, $_POST["Costo_Total"]);
    $Contribucion = mysqli_real_escape_string($conexion, $_POST["Contribucion"]);
    // Consulta SQL con valores escapados
    $sql = "INSERT INTO tbl_receta(Id_Receta,Nombre,Descripcion,Costo_Total,Contribucion)
            VALUES ('$Id_Receta', '$Nombre','$Descripcion','$Costo_Total','$Contribucion')";
    
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

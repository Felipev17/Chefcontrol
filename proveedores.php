<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    // Obtiene los datos del formulario POST y los escapa para evitar problemas de seguridad
    echo $NIT_Proveedor = mysqli_real_escape_string($conexion, $_POST['NIT_Proveedor' ]);
   echo $Razon_Social = mysqli_real_escape_string($conexion, $_POST["Razon_Social"]);
   echo $Direccion = mysqli_real_escape_string($conexion, $_POST["Direccion"]);
   echo $Telefono = mysqli_real_escape_string($conexion, $_POST["Telefono"]);
    echo $Municipio = mysqli_real_escape_string($conexion, $_POST["Municipio"]);
    // Consulta SQL con valores escapados
    $sql = "INSERT INTO tbl_proveedores (NIT_Proveedor, Razon_Social, Direccion, Telefono, Municipio)
            VALUES ('$NIT_Proveedor', '$Razon_Social', '$Direccion', '$Telefono', '$Municipio')";
            echo "nit".var_dump($NIT_Proveedor);
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

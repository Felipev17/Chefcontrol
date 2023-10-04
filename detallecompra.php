<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    $Consecutivo = mysqli_real_escape_string($conexion, $_POST["Consecutivo"]);
    $Nro_Factura = mysqli_real_escape_string($conexion, $_POST["Nro_Factura"]); // Corregir el nombre aquí
    $Cod_Producto = mysqli_real_escape_string($conexion, $_POST["Cod_Producto"]);
    $Cantidad = mysqli_real_escape_string($conexion, $_POST["Cantidad"]);
    $Costo = mysqli_real_escape_string($conexion, $_POST["Costo"]);
    $Total_Linea = mysqli_real_escape_string($conexion, $_POST["Total_Linea"]);
    
    
    $sql = "INSERT INTO tbl_detallecompra(Consecutivo,Nro_Factura,Cod_Producto,Cantidad,Costo,Total_Linea)
            VALUES ('$Consecutivo', '$Nro_Factura', '$Cod_Producto', '$Cantidad', '$Costo', '$Total_Linea')";
    
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
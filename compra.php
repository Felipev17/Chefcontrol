<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    // Obtiene los datos del formulario POST y los escapa para evitar problemas de seguridad
    $Consecutivo = mysqli_real_escape_string($conexion, $_POST["Consecutivo"]);
    $Nro_Factura = mysqli_real_escape_string($conexion, $_POST["Nro_Factura"]); // Corregir el nombre aquí
    $Id_Bodega = mysqli_real_escape_string($conexion, $_POST["Id_Bodega"]);
    $Fecha = mysqli_real_escape_string($conexion, $_POST["Fecha"]);
    $NIT_Proveedor = mysqli_real_escape_string($conexion, $_POST["NIT_Proveedor"]);
    $Id_Empleado = mysqli_real_escape_string($conexion, $_POST["Id_Empleado"]);
    $Neto_Compra = mysqli_real_escape_string($conexion, $_POST["Neto_Compra"]);
    $Impuestos = mysqli_real_escape_string($conexion, $_POST["Impuestos"]);
    
    // Consulta SQL con valores escapados
    $sql = "INSERT INTO tbl_compra(Consecutivo,Nro_Factura,Id_Bodega,Fecha,NIT_Proveedor,Id_Empleado,Neto_Compra,Impuestos)
            VALUES ('$Consecutivo', '$Nro_Factura', '$Id_Bodega', '$Fecha', '$NIT_Proveedor', '$Id_Empleado', '$Neto_Compra', '$Impuestos')";
    
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
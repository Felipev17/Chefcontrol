<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    // Obtiene los datos del formulario POST y los escapa para evitar problemas de seguridad
    $Cod_Producto= mysqli_real_escape_string($conexion, $_POST["Cod_Producto"]);
    $Nombre = mysqli_real_escape_string($conexion, $_POST["Nombre"]); 
    $Stock_Minimo = mysqli_real_escape_string($conexion, $_POST["Stock_Minimo"]);
    $Stock_Maximo = mysqli_real_escape_string($conexion, $_POST["Stock_Maximo"]);
    $Fecha_Vencimiento = mysqli_real_escape_string($conexion, $_POST["Fecha_Vencimiento"]);
    $Costo = mysqli_real_escape_string($conexion, $_POST["Costo"]);
    $Cod_Tipo = mysqli_real_escape_string($conexion, $_POST["Cod_Tipo"]);
    $Ubicacion = mysqli_real_escape_string($conexion, $_POST["Ubicacion"]);
    $Cod_UMedida = mysqli_real_escape_string($conexion, $_POST["Cod_UMedida"]);
    $Precio_Venta = mysqli_real_escape_string($conexion, $_POST["Precio_Venta"]);
    $Existencia = mysqli_real_escape_string($conexion, $_POST["Existencia"]);
    $IVA = mysqli_real_escape_string($conexion, $_POST["IVA"]);
    // Consulta SQL con valores escapados
    $sql = "INSERT INTO tbl_producto(Cod_Producto,Nombre,Stock_Minimo,Stock_Maximo,Fecha_Vencimiento,Costo,Cod_Tipo,Ubicacion,Cod_UMedida,Precio_Venta,Existencia,IVA)
            VALUES ('$Cod_Producto','$Nombre','$Stock_Minimo','$Stock_Maximo','$Fecha_Vencimiento','$Costo','$Cod_Tipo','$Ubicacion','$Cod_UMedida','$Precio_Venta','$Existencia','$IVA')";
    
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
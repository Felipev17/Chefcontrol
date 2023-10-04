<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    $Factura_Nro= mysqli_real_escape_string($conexion, $_POST["Factura_Nro"]);
    $Fecha= mysqli_real_escape_string($conexion, $_POST["Fecha"]); 
    $Id_Cliente= mysqli_real_escape_string($conexion, $_POST["Id_Cliente"]); 
    $Id_Bodega= mysqli_real_escape_string($conexion, $_POST["Id_Bodega"]); 
    $Neto= mysqli_real_escape_string($conexion, $_POST["Neto"]); 
    $IVA= mysqli_real_escape_string($conexion, $_POST["IVA"]);
    $Forma_Pago= mysqli_real_escape_string($conexion, $_POST["Forma_Pago"]);  
    $sql = "INSERT INTO tbl_ventas(Factura_Nro,Fecha,Id_Cliente,Id_Bodega,Neto,IVA,Forma_Pago)
            VALUES ('$Factura_Nro','$Fecha','$Id_Cliente','$Id_Bodega','$Neto','$IVA','$Forma_Pago')";

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
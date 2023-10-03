<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    $Cod_UMedida= mysqli_real_escape_string($conexion, $_POST["Cod_UMedida"]);
    $Unidad_Medida= mysqli_real_escape_string($conexion, $_POST["Unidad_Medida"]); 
    $sql = "INSERT INTO tbl_umedida(Cod_UMedida,Unidad_Medida)
            VALUES ('$Cod_UMedida','$Unidad_Medida')";

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
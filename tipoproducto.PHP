<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include("conexion.php"); 
    $Cod_Tipo= mysqli_real_escape_string($conexion, $_POST["Cod_Tipo"]); 
    $Tipo= mysqli_real_escape_string($conexion, $_POST["Tipo"]);
    $sql = "INSERT INTO tbl_tipoproducto(Cod_Tipo,Tipo)
            VALUES ('$Cod_Tipo','$Tipo')";

    if (mysqli_query($conexion, $sql)) {
        echo "Los datos se insertaron correctamente.";
    } else {
        echo "Problemas al insertar datos: " . mysqli_error($conexion);
    }
    
    mysqli_close($conexion);
} else {
    echo "No se han enviado datos a través del formulario ";
}

?>
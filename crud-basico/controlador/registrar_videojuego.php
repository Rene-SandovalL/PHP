<?php
$mensaje_estado = "";


if(!empty($_POST["btnguardar"])) {    
    $nombre_videojuego = trim($_POST["nombre"] ?? '');
    $genero = trim($_POST["genero"] ?? '');
    $calificacion = (int)($_POST["calificacion"] ?? 0); 
    $descripcion = trim($_POST["descripcion"] ?? '');

    if(!empty($nombre_videojuego) and !empty($genero) and $calificacion !== 0 and !empty($descripcion)) {
        
        if ($calificacion < 1 || $calificacion > 10) {
             $mensaje_estado = "La calificación debe ser un valor entre 1 y 10.";
        } else {
                        
            $sql_insert = "INSERT INTO videojuego (nombre_videojuego, genero, descripcion, calificacion) VALUES (?, ?, ?, ?)";
            
            $stmt = $conexion->prepare($sql_insert);
            
            if ($stmt) {
                $stmt->bind_param("sssi", $nombre_videojuego, $genero, $descripcion, $calificacion);
                
                if ($stmt->execute()) {
                    $mensaje_estado = "**$nombre_videojuego** registrado correctamente!";

                } else {
                    $mensaje_estado = "ERROR al guardar en la base de datos: " . $stmt->error;

                }
                
                $stmt->close();
            } else {
                $mensaje_estado = "Fallo al preparar la sentencia SQL.";
            }
        }

    } else {
        $mensaje_estado = "Debes llenar todos los campos del formulario";
    }
}
?>


<?php
    if (!empty($_GET["id"])){
        $id = $_GET["id"];
        $sql=$conexion->query("delete from videojuego where id_videojuego = $id");

        if ($sql == 1){
            echo '<div> Videojuego eliminado correctamente </div>';
        }else{  
            echo '<div> Error al eliminar</div>';
        }
    }
?>
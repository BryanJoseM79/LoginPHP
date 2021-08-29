<?php

    $conexion = mysqli_connect("localhost", "root", "", "bd_prueba");

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fecha = $_POST["fecha"];

        if($_FILES["archivo"]){

            $nombre_base = basename($_FILES["archivo"] ["name"]);
            $nombre_final = date(m-d-y). date(H-i-s). "-", $nombre_base;
            $ruta = "archiovos/" . $nombre_final;
            $subirarchivo = move_uploaded_file($_FILES["archivo"] ["tmp_name"], $ruta);
                    if($subirarchivo){
                        $insertarSQL = "INSERT INTO informes(nombre, apellidos, fecha, archivo) VALUES ('$nombre', '$apellidos', '$fecha', '$ruta')";
                        $resultado = mysqli_query($conexion, $insertarSQL);
                        
                        if($resultado){
                            echo "<script>alert('Se ha enviado su informe correctamente'); window.location='index.html' </script>";
                        }else{
                            print("Errormenssage: %s\n", mysqli_error($conexion));
                        }
                    }
                 } else{
                        echo "Error al subir archivo";
                 }

?>
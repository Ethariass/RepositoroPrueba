<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['nombre'], $_POST['email'], $_POST['password']) && isset($_FILES['foto'])) {
        $conn = new mysqli("localhost", "root", "", "app_usuarios");

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Manejar la imagen
        $foto = $_FILES['foto'];
        $foto_nombre = uniqid() . "_" . basename($foto['name']);
        $foto_ruta = "uploads/" . $foto_nombre;

        if (move_uploaded_file($foto['tmp_name'], $foto_ruta)) {
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, foto) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nombre, $email, $password, $foto_ruta);
            
            if ($stmt->execute()) {
                echo "Registro exitoso.";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error al subir la imagen.";
        }

        $conn->close();
    } else {
        echo "Faltan campos en el formulario.";
    }
} else {
    echo "Acceso no permitido.";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="menu.html"><button type="button">VOLVER</button></a>
</body>
</html>
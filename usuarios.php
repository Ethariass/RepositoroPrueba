<?php
$conn = new mysqli("localhost", "root", "", "app_usuarios");
$result = $conn->query("SELECT nombre, email, password, foto FROM usuarios");

echo "<h1>Usuarios registrados:</h1><table border='1'>";
echo "<tr><th>Nombre</th><th>Email</th><th>Contraseña</th><th>Foto</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
    echo "<td>" . htmlspecialchars($row['password']) . "</td>";
    echo "<td><img src='" . htmlspecialchars($row['foto']) . "' width='60'></td>";
    echo "</tr>";
}

echo "</table>";
$conn->close();
?>
<?php
$conn = new mysqli("localhost", "root", "", "app_usuarios");

    $stmt = $conn->prepare("SELECT * FROM usuarios ");
    $stmt->execute();

    $result = $stmt->get_result();

    ?>

    <table>
    <tr>
     <th> Nombres </th>
     <th> Emails </th>
     <th> Contraseñas </th>
     <th> Fotos </th>
    </tr> 
    

   <?php
foreach ($result as $valor) {

    echo "<tr>";
    echo "<td>".$valor["nombre"]."</td>";
    echo "<td>".$valor["email"]."</td>";
    echo "<td>".$valor["password"]."</td>";
    echo "<td><img src='".$valor["foto"]."' width='150' alt='Foto de perfil'></td>";
    echo "</tr>";
}

 

    $conn->close();

?>

<html>
  <form action="menu.html" method="get">
        <button type="submit">Regresar</button>
</html>

</table>
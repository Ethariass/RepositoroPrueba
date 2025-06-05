<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?></h2>
    <p>Email: <?php echo htmlspecialchars($usuario['email']); ?></p>
    <?php if (!empty($usuario['foto'])): ?>
        <img src="<?php echo htmlspecialchars($usuario['foto']); ?>" width="150" alt="Foto de perfil"><br>
    <?php endif; ?>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
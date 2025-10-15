<?php include 'config.php'; ?>

<?php
if($_POST){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Verificar si usuario existe
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    
    if($stmt->rowCount() == 0){
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        echo "Usuario registrado. <a href='login.php'>Login</a>";
    } else {
        echo "Usuario o email ya existe";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">🛍️ JAJIntegratedS - Registro</div>
        </div>
    </div>

    <div class="container">
        <h2>Registro de Usuario</h2>
        <form method="POST" style="max-width: 400px;">
            <div class="form-group">
                <label>Usuario:</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Registrarse</button>
        </form>
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>
</body>
</html>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>JAJIntegratedS - Inicio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">🛍️ JAJIntegratedS</div>
            <div class="nav-links">
                <a href="index.php">Inicio</a>
                <a href="products.php">Productos</a>
                <a href="about.php">Nosotros</a>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="cart.php">Carrito</a>
                    <a href="logout.php">Salir</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="register.php">Registro</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Bienvenido a JAJIntegratedS</h1>
        <p>Tu tienda de tecnología de confianza</p>
        
        <h2>Productos Populares</h2>
        <div class="product-grid">
            <?php
            $stmt = $pdo->query("SELECT * FROM products LIMIT 4");
            while($product = $stmt->fetch()):
            ?>
            <div class="product-card">
                <div class="product-image"><?php echo $product['image']; ?></div>
                <h3><?php echo $product['name']; ?></h3>
                <p>$<?php echo $product['price']; ?></p>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" class="btn">Agregar al Carrito</button>
                    </form>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
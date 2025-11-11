<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de ventas</title>
    
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/principal.css'); ?>">
</head>
<body>
    <header class="bg-dark text-white py-3">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo d-flex align-items-center">
                
                <!-- Enlace que redirige al inicio -->
                
                <a href="<?= base_url('principio/index'); ?>" class="d-flex align-items-center text-decoration-none">
                <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" alt="Logo de la empresa" class="rounded-circle me-3" style="width: 50px; height: auto;">
                
                <h1 class="h4 m-0 text-white">UNLa</h1>
                </a>
            </div>
        </div>
    </header>
    
    <!-- Enlace a Bootstrap JS (Opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
/**
 * Lógica para conectar a la base de datos (simulando includes/database.php)
 * Nota: Debes reemplazar 'root' y 'root' con tus credenciales de MySQL.
 */
function conectarDB() : mysqli {
    try {
        // hostname, username, password, database
        $db = new mysqli('localhost', 'root', 'root', 'cafeteria');
        $db->set_charset('utf8');
        return $db;
    } catch (\Throwable $th) {
        // Manejo de errores de conexión
        echo "Error al conectar a la base de datos: " . $th->getMessage();
        // Detiene la ejecución si falla la conexión (como un 'require' estricto)
        exit; 
    }
}

/**
 * Lógica para obtener los productos (simulando includes/funciones.php)
 */
function obtenerProductos() : mysqli_result {
    $db = conectarDB();
    
    // 2. Consulta SQL: Seleccionar los campos necesarios de la tabla 'productos'
    $query = "SELECT imagen, nombre, precio, descripcion FROM productos";
    
    // 3. Realizar la consulta
    $consulta = mysqli_query($db, $query);

    // 5. Cerrar la conexion (opcional, pero buena práctica)
    mysqli_close($db);

    // Retornar el resultado de la consulta para ser iterado
    return $consulta;
}

// 1. Llamar a la función para obtener los productos antes de la vista
$productos = obtenerProductos();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafetería MiExpress - Saborea el Momento</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Estilos personalizados para el fondo del hero */
        .hero-bg {
            background-image: url('assets/images/cafeteriaBackground.png'); /* Cambia por tu imagen de café */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-amber-900">Delicioso</a>
            
            <div class="hidden md:flex space-x-6">
                <a href="#inicio" class="text-gray-600 hover:text-amber-700 transition duration-300">Inicio</a>
                <a href="#menu" class="text-gray-600 hover:text-amber-700 transition duration-300">Menú</a>
                <a href="#ubicacion" class="text-gray-600 hover:text-amber-700 transition duration-300">Ubicación</a>
                <a href="#contacto" class="text-gray-600 hover:text-amber-700 transition duration-300">Contacto</a>
            </div>

            <button class="md:hidden text-gray-600 hover:text-amber-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </nav>
    </header>

    <section id="inicio" class="hero-bg h-96 flex items-center justify-center text-center">
        <div class="bg-black bg-opacity-50 p-8 rounded-lg">
            <h1 class="text-4xl sm:text-6xl font-extrabold text-white mb-4">El Mejor Café de la Ciudad</h1>
            <p class="text-lg text-gray-200 mb-6">Un espacio para relajarse y disfrutar.</p>
            <a href="#menu" class="inline-block bg-amber-700 text-white font-bold py-3 px-8 rounded-full hover:bg-amber-800 transition duration-300 transform hover:scale-105">Ver Menú</a>
        </div>
    </section>

    <section id="menu" class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center text-amber-900 mb-10">Nuestro Menú</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while($producto = mysqli_fetch_assoc($productos)): ?>
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                        <img src="assets/images/<?php echo $producto['imagen']; ?>.png" alt="<?php echo $producto['nombre']; ?>" class="w-full h-50 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold text-gray-900"><?php echo $producto['nombre']; ?></h3>
                        <p class="text-amber-700 font-bold mt-2">$<?php echo number_format($producto['precio'], 2); ?></p>
                        <p class="text-gray-600 mt-1"><?php echo $producto['descripcion']; ?></p>
                    </div>
                <?php endwhile; ?>
                </div>
            
            <div class="text-center mt-10">
                <a href="#" class="inline-block border border-amber-700 text-amber-700 font-bold py-3 px-8 rounded-full hover:bg-amber-700 hover:text-white transition duration-300">Menú Completo</a>
            </div>
        </div>
    </section>
    
    <section id="ubicacion" class="bg-amber-900 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Visítanos</h2>
            <p class="text-xl mb-4"> Calle Falsa 123, Ciudad de los Sabores.</p>
            <p class="text-xl mb-8">Horario: Lun-Vie 7:00am - 8:00pm | Sáb-Dom 8:00am - 6:00pm</p>
            <a href="mailto:info@delicioso.com" id="contacto" class="text-lg underline hover:text-amber-300 transition duration-300">info@delicioso.com</a>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto px-6 text-center text-sm">
            <p>&copy; 2025 Cafetería Delicioso. Todos los derechos reservados.</p>
            <div class="mt-2 space-x-4">
                <a href="#" class="hover:text-amber-500">Política de Privacidad</a>
                <a href="#" class="hover:text-amber-500">Términos de Servicio</a>
            </div>
        </div>
    </footer>

</body>
</html>
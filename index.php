<?php
// Habilitar la visualización de errores para desarrollo (Opcional)
// En un entorno de producción, es recomendable desactivar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Estudiante</title>
    <!-- Estilos CSS Integrados -->
    <style>
        /* Estilos Generales */
        body {
            font-family: 'Roboto', sans-serif; /* Fuente moderna */
            background-color: #ffffff; /* Fondo blanco */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Centrado horizontal */
            align-items: center; /* Centrado vertical */
            height: 100vh; /* Altura completa de la ventana */
            color: #2c3e50; /* Color de texto oscuro para buena legibilidad */
        }

        /* Contenedor del Formulario */
        .form-container {
            background-color: #ffffff; /* Fondo blanco */
            padding: 40px 50px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Sombra suave */
            width: 100%;
            max-width: 500px; /* Ancho máximo */
            box-sizing: border-box;
        }

        /* Título del Formulario */
        .form-container h2 {
            text-align: center;
            color: #2c3e50; /* Texto oscuro */
            margin-bottom: 10px;
            font-size: 28px;
        }

        /* Texto Adicional: Instancia número # */
        .form-container .instancia {
            text-align: center;
            color: #7f8c8d; /* Texto gris para diferenciación */
            margin-bottom: 30px;
            font-size: 18px;
        }

        /* Etiquetas de los Campos */
        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #34495e; /* Color de texto gris oscuro */
            font-weight: 600;
            font-size: 16px;
        }

        /* Campos de Entrada */
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #bdc3c7; /* Borde gris claro */
            border-radius: 5px; /* Bordes redondeados */
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            font-size: 16px;
            color: #2c3e50; /* Texto oscuro */
            background-color: #ecf0f1; /* Fondo gris muy claro */
        }

        /* Placeholder de los Campos */
        .form-container input::placeholder {
            color: #95a5a6; /* Color de placeholder gris */
        }

        /* Enfoque en Campos de Entrada */
        .form-container input[type="text"]:focus,
        .form-container input[type="number"]:focus,
        .form-container select:focus,
        .form-container textarea:focus {
            border-color: #3498db; /* Borde azul brillante al enfocar */
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5); /* Sombra azul */
            outline: none; /* Quitar el contorno predeterminado */
            background-color: #ffffff; /* Fondo blanco al enfocar */
        }

        /* Botones del Formulario */
        .form-container .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Botón Enviar */
        .form-container .button-group .submit-button {
            background-color: #27ae60; /* Verde */
            color: #ffffff; /* Texto blanco */
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form-container .button-group .submit-button:hover {
            background-color: #1e8449; /* Verde oscuro */
            transform: scale(1.05);
        }

        /* Botón Cancelar */
        .form-container .button-group .cancel-button {
            background-color: #c0392b; /* Rojo oscuro */
            color: #ffffff; /* Texto blanco */
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form-container .button-group .cancel-button:hover {
            background-color: #992d22; /* Rojo más oscuro */
            transform: scale(1.05);
        }

        /* Botón Ver Estudiantes */
        .form-container .view-button {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #3498db; /* Azul */
            color: #ffffff; /* Texto blanco */
            padding: 14px 0;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 20px;
        }

        .form-container .view-button:hover {
            background-color: #2980b9; /* Azul oscuro */
            transform: scale(1.02);
        }

        /* Mensaje de Respuesta */
        #respuesta {
            text-align: center;
            margin-top: 25px;
            font-weight: 600;
            color: #27ae60; /* Verde para éxito */
            font-size: 18px;
        }

        /* Tabla de Estudiantes */
        .table-container {
            max-width: 900px; /* Ancho máximo de la tabla */
            margin: 60px auto; /* Centrado */
            background-color: #ffffff; /* Fondo blanco */
            padding: 25px 30px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        /* Título de la Tabla */
        .table-container h2 {
            text-align: center;
            color: #2c3e50; /* Texto oscuro */
            margin-bottom: 25px;
            font-size: 28px;
        }

        /* Tabla */
        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th,
        .table-container td {
            padding: 14px 20px;
            border: 1px solid #bdc3c7; /* Borde gris claro */
            text-align: left;
            font-size: 16px;
            color: #2c3e50; /* Texto oscuro */
        }

        .table-container th {
            background-color: #3498db; /* Azul */
            color: #ffffff; /* Texto blanco */
        }

        .table-container tr:nth-child(even) {
            background-color: #ecf0f1; /* Fondo gris muy claro en filas pares */
        }

        .table-container tr:hover {
            background-color: #d0d7de; /* Fondo gris al pasar el cursor */
        }

        /* Botón Eliminar */
        .delete-button {
            background-color: #e74c3c; /* Rojo */
            color: #ffffff; /* Texto blanco */
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .delete-button:hover {
            background-color: #c0392b; /* Rojo oscuro */
            transform: scale(1.05);
        }

        /* Botón Volver al Formulario */
        .back-button {
            display: block;
            width: 220px;
            margin: 25px auto;
            background-color: #95a5a6; /* Gris */
            color: #ffffff; /* Texto blanco */
            text-align: center;
            padding: 14px 0;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .back-button:hover {
            background-color: #7f8c8d; /* Gris oscuro */
            transform: scale(1.02);
        }

        /* Mensaje de Eliminación */
        #mensaje {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            color: #e74c3c; /* Rojo para errores */
            font-size: 18px;
        }

        #mensaje.exito {
            color: #27ae60; /* Verde para éxito */
        }

        #mensaje.error {
            color: #e74c3c; /* Rojo para errores */
        }
    </style>
    <!-- Enlazar Google Fonts para una tipografía mejorada (Opcional) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <h2>Ingresar Datos del Estudiante</h2>
        <!-- Nuevo Texto: Instancia número # -->
        <div class="instancia">
            Instancia número 1
        </div>
        <form id="estudianteForm" action="procesar_datos.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingrese el apellido" required>
            
            <label for="carnet">Carnet:</label>
            <input type="text" id="carnet" name="carnet" placeholder="Ingrese el carnet" required>
            
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" placeholder="Ingrese el curso" required>
            
            <label for="nota">Nota:</label>
            <input type="number" step="0.01" id="nota" name="nota" placeholder="Ingrese la nota" required>
            
            <div class="button-group">
                <input type="submit" value="Enviar" class="submit-button">
                <button type="button" class="cancel-button" id="cancelarBtn">Cancelar</button>
            </div>
            
            <!-- Botón "Ver Estudiantes" -->
            <a href="ver_estudiante.php" class="view-button">Ver Estudiantes</a>
        </form>
        
        <!-- Mensaje de Respuesta -->
        <div id="respuesta">
            <?php
                if (isset($_GET['mensaje'])) {
                    $mensaje = htmlspecialchars($_GET['mensaje']);
                    echo "<p>$mensaje</p>";
                }
            ?>
        </div>
    </div>
    
    <!-- JavaScript Integrado -->
    <script>
        // Manejar el botón "Cancelar"
        document.getElementById('cancelarBtn').addEventListener('click', function () {
            document.getElementById('estudianteForm').reset();
            const respuestaDiv = document.getElementById('respuesta');
            if (respuestaDiv) {
                respuestaDiv.textContent = '';
                respuestaDiv.className = '';
            }
        });
    </script>
</body>
</html>

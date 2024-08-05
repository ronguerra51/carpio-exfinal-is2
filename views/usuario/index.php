<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Usuario y País</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .card-custom {
            border-radius: 0.5rem;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card-custom .card-body {
            padding: 1.5rem;
        }
        .btn-custom {
            margin-top: 1rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5 form-container">
        <h1 class="text-center mb-4">Información de Usuario y País</h1>
        
        <!-- Contenedor principal -->
        <div class="card card-custom">
            <div class="card-body">
                <form id="userForm" class="mb-4">
                    <h5 class="card-title">Consultar Usuario en GitHub</h5>
                    <div class="form-group">
                        <label for="username">Nombre de Usuario en GitHub:</label>
                        <input type="text" id="usuario_nombre" name="usuario_nombre" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom">Obtener Información</button>
                    <div id="userInfo" class="mt-4"></div>
                </form>
                
                <form id="countryForm" class="mb-4">
                    <h5 class="card-title">Seleccionar País</h5>
                    <div class="form-group">
                        <label for="country">Selecciona un País:</label>
                        <select id="country" name="country" class="form-control" required>
                            <option value="">Seleccione un país</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom">Obtener Código de Marcación</button>
                    <div id="countryInfo" class="mt-4"></div>
                </form>
                
                <form id="contactForm" class="d-none">
                    <h5 class="card-title">Información de Contacto</h5>
                    <div class="form-group">
                        <label for="usuario_telefono">Número de Teléfono:</label>
                        <input type="tel" id="usuario_telefono" class="form-control" placeholder="Número de Teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario_correo">Correo Electrónico:</label>
                        <input type="usuario_correo" id="usuario_correo" class="form-control" placeholder="Correo Electrónico" required>
                    </div>
                    <input type="hidden" id="dialCode">
                    <input type="hidden" id="countryName">
                    <button type="submit" id="BtnEnviar" class="btn btn-success btn-custom">Enviar Información</button>
                </form>
                <div id="contactInfo" class="mt-4"></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 table-responsive">
            <h2 class="text-center">Listado de Usuarios</h2>
            <table class="table table-bordered table-hover" id="tablaUsuarios">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay Usuarios registrados</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../src/css/funcion.js"></script>
</body>

</html>

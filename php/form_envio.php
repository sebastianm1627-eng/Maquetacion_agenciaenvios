<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Envío</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="contenedor">
    <h2>Registrar un envío ✍️</h2>

    <!-- FORMULARIO CON VALIDACIÓN -->
    <form id="envioForm" action="guardar_envio.php" method="POST" novalidate>

        <label for="nombre">Nombre del remitente:</label>
        <input type="text" id="nombre" name="nombre" required>
        <span class="error" id="err-nombre"></span>

        <label for="apellido">Apellido del remitente:</label>
        <input type="text" id="apellido" name="apellido" required>
        <span class="error" id="err-apellido"></span>

        <label for="cedula">Cédula:</label>
        <input type="text" id="cedula" name="cedula" required>
        <span class="error" id="err-cedula"></span>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>
        <span class="error" id="err-direccion"></span>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required>
        <span class="error" id="err-ciudad"></span>

        <label for="peso">Peso del paquete (kg):</label>
        <input type="number" step="0.1" id="peso" name="peso" required>
        <span class="error" id="err-peso"></span>

        <label for="descripcion">Descripción del paquete:</label>
        <textarea id="descripcion" name="descripcion" rows="3" placeholder="Escribe aquí una descripción..." required></textarea>
        <span class="error" id="err-descripcion"></span>

        <button type="submit" class="btn">Registrar envío</button>
    </form>

    <a href="../inicio.php" class="volver">⬅ Volver al panel</a>
</div>

<!-- ESTILOS PARA ERRORES → corregido -->
<style>
  .error {
    .success-input {
    border-color: #0e8c41 !important;
    box-shadow: 0 0 0 3px rgba(14,140,65,0.15);
}

    color: #b00020;
    font-size: 0.9rem;
    display: block;
    margin-top: 4px;       /* separa del input */
    margin-bottom: 12px;   /* evita que se encime con el siguiente label */
  }

  input.error-input,
  textarea.error-input {
    border-color: #b00020;
    box-shadow: 0 0 0 3px rgba(176,0,32,0.08);
  }
</style>

<!-- SCRIPT DE VALIDACIÓN -->
<script>
(function(){
  const form = document.getElementById('envioForm');
  const qs = id => document.getElementById(id);

  const showError = (fieldId, msg) => {
    qs('err-' + fieldId).textContent = msg;
    qs(fieldId).classList.add('error-input');
    qs(fieldId).classList.remove('success-input');
  };

  const showSuccess = fieldId => {
    qs('err-' + fieldId).textContent = '';
    qs(fieldId).classList.remove('error-input');
    qs(fieldId).classList.add('success-input');
  };

  const clearStyling = fieldId => {
    qs('err-' + fieldId).textContent = '';
    qs(fieldId).classList.remove('error-input');
    qs(fieldId).classList.remove('success-input');
  };

  function validarNombre(val) { return val.length >= 2; }
  function validarCedula(val) { return /^[0-9]{6,12}$/.test(val); }
  function validarPeso(val)   { return !isNaN(val) && Number(val) > 0; }
  function validarDescripcion(val) { return val.length > 0 && val.length <= 1000; }

  const campos = ['nombre','apellido','cedula','direccion','ciudad','peso','descripcion'];

  // Validación en tiempo real
  campos.forEach(id => {
    qs(id).addEventListener('input', ()=> {
      const val = qs(id).value.trim();

      let valido = false;
      if (id === 'nombre' || id === 'apellido') valido = validarNombre(val);
      if (id === 'cedula') valido = validarCedula(val);
      if (id === 'peso') valido = validarPeso(val);
      if (id === 'descripcion') valido = validarDescripcion(val);
      if (id === 'direccion') valido = val.length >= 3;
      if (id === 'ciudad') valido = val.length >= 2;

      if (val === '') {
        clearStyling(id);
        return;
      }

      valido ? showSuccess(id) : showError(id, '');
    });
  });

  // Validación al enviar
  form.addEventListener('submit', function(e){
    e.preventDefault();
    let valid = true;

    campos.forEach(clearStyling);

    if (!validarNombre(qs('nombre').value.trim())){
      showError('nombre', 'Ingresa un nombre válido (mín. 2 caracteres).'); valid = false;
    } else showSuccess('nombre');

    if (!validarNombre(qs('apellido').value.trim())){
      showError('apellido', 'Ingresa un apellido válido.'); valid = false;
    } else showSuccess('apellido');

    if (!validarCedula(qs('cedula').value.trim())){
      showError('cedula', 'Cédula inválida: solo números (6 a 12 dígitos).'); valid = false;
    } else showSuccess('cedula');

    if (qs('direccion').value.trim().length < 3){
      showError('direccion', 'Ingresa una dirección válida.'); valid = false;
    } else showSuccess('direccion');

    if (qs('ciudad').value.trim().length < 2){
      showError('ciudad', 'Ingresa una ciudad válida.'); valid = false;
    } else showSuccess('ciudad');

    if (!validarPeso(qs('peso').value.trim())){
      showError('peso', 'El peso debe ser mayor a 0.'); valid = false;
    } else showSuccess('peso');

    if (!validarDescripcion(qs('descripcion').value.trim())){
      showError('descripcion', 'Escribe una descripción (máx. 1000 caracteres).'); valid = false;
    } else showSuccess('descripcion');

    if (valid) form.submit();
  });
})();
</script>


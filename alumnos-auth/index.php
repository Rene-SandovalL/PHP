<?php

require __DIR__.'/inc/auth.php';

require __DIR__.'/config.php';

$msg = null;
$err = null;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $accion = $_POST['accion'] ?? '';

  // ALTA (crear)
  if ($accion === 'crear') {
    
    if ($_SESSION['rol'] !== 'admin') {
      $err = 'Acción no autorizada. Solo los administradores pueden crear registros.';
    } else {
      $nombre = trim($_POST['nombre'] ?? '');
      $correo = trim($_POST['correo'] ?? '');
      $genero = trim($_POST['genero'] ?? '');
      $fnac = trim($_POST['fecha_nacimiento'] ?? '');
      $carrera = trim($_POST['carrera'] ?? '');
      $sem = isset($_POST['semestre']) ? (int)$_POST['semestre'] : null;
      $hobbies = $_POST['pasatiempos'] ?? [];
      if (!is_array($hobbies)) $hobbies = [$hobbies];
      $pasatiempos = implode(',', array_map(fn($v)=>substr(trim($v),0,50), $hobbies));
      $comentarios = trim($_POST['comentarios'] ?? '');

      if ($nombre === '') {
        $err = 'El nombre es obligatorio.';
      } elseif ($correo !== '' && ! filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $err = 'Correo no válido.';
      } else {
        try {
          $pdo = db();
          $sql = "INSERT INTO alumnos (nombre, correo, genero, fecha_nacimiento, carrera, semestre, pasatiempos, comentarios)
                  VALUES (:n, :c, :g, :f, :ca, :s, :p, :co)";
          $st = $pdo->prepare($sql);
          $st->execute([
            ':n' => $nombre, ':c' => ($correo ?: null), ':g' => ($genero ?: null),
            ':f' => ($fnac ?: null), ':ca' => ($carrera ?: null), ':s' => (is_int($sem) ? $sem : null),
            ':p' => ($pasatiempos ?: null), ':co' => ($comentarios ?: null),
          ]);
          $msg = 'Registro guardado.';
        } catch (Throwable $e) {
          $err = 'Error al guardar: '.$e->getMessage();
        }
      }
    }
  }

  if ($accion === 'eliminar') {
    
    if ($_SESSION['rol'] !== 'admin') {
      $err = 'Acción no autorizada. Solo los administradores pueden eliminar.';
    } else {
      $id = (int)($_POST['id'] ?? 0);
      if ($id > 0) {
        try{
          $pdo = db();
          $st = $pdo->prepare("DELETE FROM alumnos WHERE id = :id");
          $st->execute([':id' => $id]);
          $msg = 'Registro eliminado (#'.$id.').';
        }catch(Throwable $e) {
          $err = 'No se pudo eliminar: '.$e->getMessage();
        }
      }
    }
  }
}


try{
  $pdo = db();
  $rows = $pdo->query("SELECT * FROM alumnos ORDER BY id DESC")->fetchAll();
}catch(Throwable $e) {
  http_response_code(500);
  exit('Error de conexión: '.$e->getMessage());
}


?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alumnos</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
</head>
<body class="dark bg-gray-900 text-gray-200">

  <div class="max-w-5xl mx-auto p-4">

    <nav class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-white">Alumnos</h1>
      <div>
        <span class="text-gray-400 mr-4">
          Hola, <strong class="font-medium text-gray-200"><?= h($_SESSION['user']) ?></strong>
          (Rol: <?= h($_SESSION['rol']) ?>)
        </span>
        <a 
          href="logout.php" 
          class="text-sm text-blue-400 hover:text-blue-300"
        >
          Cerrar Sesión
        </a>
      </div>
    </nav>

    <?php if ($msg): ?>
      <div class="bg-green-800 border border-green-700 text-green-200 px-4 py-3 rounded mb-4" role="alert">
        <?= h($msg) ?>
      </div>
    <?php endif; ?>
    <?php if ($err): ?>
      <div class="bg-red-800 border border-red-700 text-red-200 px-4 py-3 rounded mb-4" role="alert">
        <?= h($err) ?>
      </div>
    <?php endif; ?>

    <?php if ($_SESSION['rol'] === 'admin'): ?>
      <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold text-white mb-4">Alta de alumno</h2>
        
        <form method="post" class="space-y-4">
          <input type="hidden" name="accion" value="crear">

          <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Nombre:</label>
            <input name="nombre" required class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white">
          </div>
          
          <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Correo:</label>
            <input type="email" name="correo" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white">
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-400 mb-1">Género:</label>
              <select name="genero" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white">
                <option value="">(Selecciona)</option>
                <option>Femenino</option>
                <option>Masculino</option>
                <option>Otro</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-400 mb-1">Fecha de nacimiento:</label>
              <input type="date" name="fecha_nacimiento" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white">
            </div>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-400 mb-1">Carrera:</label>
              <input name="carrera" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-400 mb-1">Semestre:</label>
              <input type="number" name="semestre" min="1" max="12" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white">
            </div>
          </div>

          <fieldset class="border border-gray-600 p-4 rounded">
            <legend class="text-sm font-medium text-gray-400 px-2">Pasatiempos</legend>
            <div class="flex space-x-4 mt-2">
              <label class="flex items-center space-x-2">
                <input type="checkbox" name="pasatiempos[]" value="Música" class="bg-gray-700 border-gray-600 rounded"> <span>Música</span>
              </label>
              <label class="flex items-center space-x-2">
                <input type="checkbox" name="pasatiempos[]" value="Deporte" class="bg-gray-700 border-gray-600 rounded"> <span>Deporte</span>
              </label>
              <label class="flex items-center space-x-2">
                <input type="checkbox" name="pasatiempos[]" value="Lectura" class="bg-gray-700 border-gray-600 rounded"> <span>Lectura</span>
              </label>
            </div>
          </fieldset>

          <div>
            <label class="block text-sm font-medium text-gray-400 mb-1">Comentarios:</label>
            <textarea name="comentarios" rows="3" class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white"></textarea>
          </div>

          <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Guardar
            </button>
          </div>
        </form>
      </div>
    <?php endif; ?> <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">
      <h2 class="text-2xl font-semibold text-white mb-4">Listado</h2>
      
      <?php if(!$rows): ?>
        <p class="text-gray-400">No hay registros todavía.</p>
      <?php else: ?>
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-750">
              <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">ID</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Nombre</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Correo</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Carrera</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Comentarios</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase"></th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
              <?php foreach($rows as $a): ?>
              <tr>
                <td class="px-4 py-3 text-sm"><?= (int)$a['id'] ?></td>
                <td class="px-4 py-3 text-sm font-medium text-white"><?= h($a['nombre']) ?></td>
                <td class="px-4 py-3 text-sm"><?= h($a['correo']) ?></td>
                <td class="px-4 py-3 text-sm"><?= h($a['carrera']) ?></td>
                <td class="px-4 py-3 text-sm"><?= nl2br(h($a['comentarios'])) ?></td>
                <td class="px-4 py-3 text-sm">
                  
                  <?php if ($_SESSION['rol'] === 'admin'): ?>
                    <form method="post" onsubmit="return confirm('¿Eliminar registro #<?= (int)$a['id'] ?>?')">
                      <input type="hidden" name="accion" value="eliminar">
                      <input type="hidden" name="id" value="<?= (int)$a['id'] ?>">
                      <button type="submit" class="text-red-400 hover:text-red-300 font-medium">
                        Eliminar
                      </button>
                    </form>
                  <?php endif; ?>
                  
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>

  </div></body>
</html>
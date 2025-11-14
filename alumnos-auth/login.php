<?php

session_start();

if (isset($_SESSION['uid'])) {
  header('Location: index.php');
  exit;
}

require __DIR__.'/config.php';

$err = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = $_POST['usuario'] ?? '';
  $pass = $_POST['pass'] ?? '';

  if (empty($usuario) || empty($pass)) {
    $err = 'Debes ingresar usuario y contraseña.';
  } else {
    try {
      $pdo = db();
      $st = $pdo->prepare('SELECT id, usuario, pass_hash, rol FROM usuarios WHERE usuario = :u');
      $st->execute([':u' => $usuario]);
      $u = $st->fetch();

      if ($u && password_verify($pass, $u['pass_hash'])) {
        
        
        session_regenerate_id(true);
        
        $_SESSION['uid'] = $u['id'];
        $_SESSION['user'] = $u['usuario'];
        $_SESSION['rol'] = $u['rol'];
        
        header('Location: index.php');
        exit;
        
      } else {
        $err = 'Usuario o contraseña incorrectos.';
      }

    } catch (Throwable $e) {
      $err = 'Error de conexión: '.$e->getMessage();
    }
  }
}

?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Alumnos</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
</head>
<body class="dark bg-gray-900 text-gray-200 flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md">
    
    <form method="post" class="bg-gray-800 border border-gray-700 rounded-lg p-8 shadow-lg">
      <h1 class="text-3xl font-bold text-center text-white mb-6">Iniciar Sesión</h1>
      <p class="text-center text-gray-400 mb-6">Acceso al panel de Alumnos</p>

      <?php if ($err): ?>
        <div class="bg-red-800 border border-red-700 text-red-200 px-4 py-3 rounded mb-4" role="alert">
          <?= h($err) ?>
        </div>
      <?php endif; ?>

      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-400 mb-2">Usuario:</label>
        <input 
          type="text" 
          name="usuario" 
          required
          class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white"
        >
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-400 mb-2">Contraseña:</label>
        <input 
          type="password" 
          name="pass" 
          required
          class="w-full bg-gray-700 border border-gray-600 rounded p-2 text-white"
        >
      </div>

      <div>
        <button 
          type="submit" 
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
          Entrar
        </button>
      </div>
      
      <p class="text-xs text-gray-500 text-center mt-6">
        Usuarios demo: (admin/admin) o (consulta/consulta)
      </p>

    </form>
  </div>

</body>
</html>
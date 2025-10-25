<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Videojuegos - Oscuro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            opacity: 1;
            height: auto;
        }
        
        .table-description {
            white-space: normal;
            word-break: break-word;
            max-width: 150px;
        }

        .table-fixed-layout {
            table-layout: fixed;
            width: 100%;
        }
        .table-fixed-layout th, .table-fixed-layout td {
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">

    <div class="min-h-screen flex flex-col">
        <h1 class="text-3xl md:text-4xl font-bold text-center py-6 md:py-8 text-indigo-400">Gestión de Videojuegos</h1>

        <div class="flex flex-col md:flex-row flex-grow p-4 gap-6">

            <div class="md:w-1/3">
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg h-full"> <h2 class="text-2xl font-semibold mb-5 text-indigo-300">Agregar Nuevo Videojuego</h2>
                    
                    <form action="#" method="POST" class="space-y-4">
                        
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-300">Nombre</label>
                            <input type="text" id="nombre" name="nombre" 
                                   class="p-2 mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                   placeholder="Ej: Cyberpunk 2077" required>
                        </div>

                        <div>
                            <label for="genero" class="block text-sm font-medium text-gray-300">Género</label>
                            <input type="text" id="genero" name="genero" 
                                   class="p-2 mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                   placeholder="Ej: RPG de Acción" required>
                        </div>

                        <div>
                            <label for="calificacion" class="block text-sm font-medium text-gray-300">Calificación Personal (1-10)</label>
                            <input type="number" id="calificacion" name="calificacion" 
                                   class="p-2 mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                   min="1" max="10" value="5" required>
                        </div>

                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-300">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="4" 
                                      class="p-1 mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                      placeholder="Una breve descripción del juego..."></textarea>
                        </div>

                        <div>
                            <button type="submit" 
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Guardar Videojuego
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="md:w-2/3 flex-grow">
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg h-full flex flex-col">
                    <h2 class="text-2xl font-semibold mb-5 text-indigo-300">Lista de Videojuegos</h2>
                    
                    <div class="flex-grow overflow-hidden">
                        <table class="table-fixed-layout min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col" class="w-1/5 px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col" class="w-1/6 px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Género
                                    </th>
                                    <th scope="col" class="w-1/12 px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Calif.
                                    </th>
                                    <th scope="col" class="w-5/12 px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Descripción
                                    </th>
                                    <th scope="col" class="w-1/6 px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 divide-y divide-gray-700">
                                
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-100">
                                        The Witcher 3: Wild Hunt
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-300">
                                        RPG
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-300">
                                        10/10
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-300 table-description">
                                        Una obra maestra del RPG, con una historia profunda y un mundo vibrante.
                                    </td>
                                    <td class="px-4 py-3 text-sm font-medium">
                                        <a href="#" class="text-indigo-400 hover:text-indigo-300">Editar</a>
                                        <a href="#" class="text-red-500 hover:text-red-400 ml-3">Eliminar</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-100">
                                        Hades
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-300">
                                        Roguelike
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-300">
                                        9/10
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-300 table-description">
                                        Un roguelike con excelente narrativa, arte y jugabilidad adictiva.
                                    </td>
                                    <td class="px-4 py-3 text-sm font-medium">
                                        <a href="#" class="text-indigo-400 hover:text-indigo-300">Editar</a>
                                        <a href="#" class="text-red-500 hover:text-red-400 ml-3">Eliminar</a>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-100">
                                        Hollow Knight
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-300">
                                        Metroidvania
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-300">
                                        10/10
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-300 table-description">
                                        Un metroidvania con arte precioso, excelente combate y secretos a descubrir.
                                    </td>
                                    <td class="px-4 py-3 text-sm font-medium">
                                        <a href="#" class="text-indigo-400 hover:text-indigo-300">Editar</a>
                                        <a href="#" class="text-red-500 hover:text-red-400 ml-3">Eliminar</a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
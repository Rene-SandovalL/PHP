<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Videojuegos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-4 md:p-8">
        <h1 class="text-3xl md:text-4xl font-bold text-center mb-8 text-gray-900">🎮 Gestión de Videojuegos</h1>

        <div class="flex flex-col md:flex-row gap-8">

            <div class="md:w-1/3">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold mb-5">Agregar Nuevo Videojuego</h2>
                    
                    <form action="#" method="POST" class="space-y-4">
                        
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="nombre" name="nombre" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                   placeholder="Ej: Elden Ring" required>
                        </div>

                        <div>
                            <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
                            <input type="text" id="genero" name="genero" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                   placeholder="Ej: RPG de Acción" required>
                        </div>

                        <div>
                            <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación Personal (1-10)</label>
                            <select id="calificacion" name="calificacion" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                    required>
                                <option value="" disabled selected>Selecciona una calificación</option>
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>

                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="4" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
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

            <div class="md:w-2/3">
                <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
                    <h2 class="text-2xl font-semibold mb-5">Lista de Videojuegos</h2>
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Género
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Calificación
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    The Legend of Zelda: Tears of the Kingdom
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    Aventura
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    10/10
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700 max-w-xs truncate" title="Una secuela increíble que expande Hyrule a los cielos.">
                                    Una secuela increíble...
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    <a href="#" class="text-red-600 hover:text-red-900 ml-4">Eliminar</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    Stardew Valley
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    Simulador de Granja
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    9/10
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700 max-w-xs truncate" title="Simulador de vida en la granja relajante y adictivo.">
                                    Relajante y adictivo.
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    <a href="#" class="text-red-600 hover:text-red-900 ml-4">Eliminar</a>
                                </td>
                            </tr>

                            </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
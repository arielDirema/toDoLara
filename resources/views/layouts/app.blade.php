<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <!--
    Barre de navigation
    //route('tasks.index') }}
    -->
    <nav class="bg-white shadow border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-4 px-6">
            <!-- Logo ou lien d'accueil -->
            <a href="{{ route('tasks.index') }}" class="text-lg font-bold">To Do List</a>

            <!-- Boutons pour filtrer les tâches -->
            <div class="flex space-x-4">
                <!-- Bouton pour afficher toutes les tâches -->
                <a
                    href="{{ route('tasks.index') }}"
                    class="bg-blue-500 text-white px-5 py-3.5 rounded-lg hover:bg-blue-600 transition duration-300">
                    Toutes les Tâches
                </a>

                <!--   Bouton pour afficher les tâches complétées -->
                <a
                    href="{{ route('tasks.completed') }}"
                    class="bg-green-500 text-white px-5 py-3.5 rounded-lg hover:bg-green-600 transition duration-300">
                    Tâches Complétées
                </a>
            </div>
        </div>
    </nav>


    <!--
    Contenu principal
    //route('tasks.create') }}
    -->
    <section>
        <div class="container mx-auto py-4 px-6">
            @yield('content')
        </div>
    </section>



    <!-- Pied de page -->
    <footer class="bg-white rounded-lg shadow px-4 py-6 dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
            &copy; {{ date('Y') }} Mon Application Laravel. All Rights Reserved.
        </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Github</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <script>
        function toggleTaskCompletion(checkbox) {
            const taskId = checkbox.getAttribute('data-task-id');
            const completed = checkbox.checked;

            // Envoyer une requête AJAX pour mettre à jour la tâche
            fetch(`/tasks/${taskId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ completed: completed })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Tâche mise à jour avec succès');
                    } else {
                        console.error('Erreur lors de la mise à jour de la tâche');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                });
        }
    </script>

</body>
</html>

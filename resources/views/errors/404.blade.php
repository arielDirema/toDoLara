<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Non Trouvée - 404</title>
    <!-- Inclure Tailwind CSS (si tu utilises Tailwind) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
<!-- Barre de Navigation -->
<nav class="bg-white shadow border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('tasks.index') }}" class="text-lg font-bold">Accueil</a>
    </div>
</nav>

<!-- Contenu de la Page 404 -->
<div class="min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md text-center">
        <h1 class="text-6xl font-bold text-gray-800 mb-4">404</h1>
        <p class="text-2xl text-gray-600 mb-8">Oups ! La page que vous cherchez n'existe pas.</p>
        <a
            href="{{ route('tasks.index') }}"
            class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300"
        >
            Retour à l'Accueil
        </a>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Users</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-dark">
        <div class="container">
            <h1 class="text-center mt-4 text-white">Eloquent</h1>
            <h5 class="text-center text-secondary">Relaciones</h5>
            <h6 class="text-center text-light">Listado de usuarios</h6>
            <ul class="list-group mt-4">
                @forelse ($users as $item)
                    <a href="{{ route('profile',$item->id) }}" class="list-group-item list-group-item-action list-group-item-secondary">
                        {{ $item->name }}
                    </a>
                @empty
                    <p class="text-center text-primary">No hay usuarios.</p>
                @endforelse            
            </ul>
        </div>
    </body>
</html>

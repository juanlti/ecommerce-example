<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')

    <title>{{$title ?? config('app.name')}}</title>
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
<!-- Cuando renderizas un componente de manera directa 'name('shop-page');', la vista de show page se va a renderizar bajo el nombre de $slot, es decir que la variable $slot contiene la view de shop page, y la pagina encargada de renderizar el $slot, por defecto es Layouts.app-->
{{ $slot }}
@fluxScripts
</body>
</html>

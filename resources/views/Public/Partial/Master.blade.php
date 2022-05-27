<!DOCTYPE html>
<html lang="es">

<head>
    @include('Public.Partial.Data')
    @include('Public.Partial.Style')
</head>

<body>
    @include('Public.Partial.Menu')
    @include('Public.Partial.Head')
    @yield('content')
    <!-- @include('Public.Partial.Footer') -->
</body>

</html>

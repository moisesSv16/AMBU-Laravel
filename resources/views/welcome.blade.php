<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema Claro/Oscuro</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('css/light-mode.css') }}">
</head>
<body>
    <div class="container text-center mt-5">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="theme-toggle">
            <label class="custom-control-label" for="theme-toggle">Modo Oscuro/Claro</label>
        </div>
    </div>

    <!-- Incluir jQuery y Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                $('#theme-style').attr('href', '{{ asset('css/dark-mode.css') }}');
                $('#theme-toggle').prop('checked', true);
            } else {
                $('#theme-style').attr('href', '{{ asset('css/light-mode.css') }}');
                $('#theme-toggle').prop('checked', false);
            }

            $('#theme-toggle').change(function() {
                if ($(this).is(':checked')) {
                    $('#theme-style').attr('href', '{{ asset('css/dark-mode.css') }}');
                    localStorage.setItem('theme', 'dark');
                } else {
                    $('#theme-style').attr('href', '{{ asset('css/light-mode.css') }}');
                    localStorage.setItem('theme', 'light');
                }
            });
        });
    </script>
</body>
</html>

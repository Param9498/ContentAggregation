<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome to CrackEngineering</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Amatic+SC" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <style>
        html, body{
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="app-classroom">
        <classroom></classroom>
    </div>

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]) ?>
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
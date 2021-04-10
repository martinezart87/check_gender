<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Zadanie e-point') }}</title>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/home.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .red {
            color: red;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/">Check Gender</a>
    </nav>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-8">
                @empty($countries)
                    <p class="bg-danger text-white p-1">REST COUNTRIES API ERROR. Check Log file in strogae/logs/laravel.log
                    </p>
                @endempty
            </div>
            <div id="gender" class="col-8">&nbsp;</div>
            <div class="col-8">
                <form>
                    <div class="form-group">
                        <label for="name">Name <span class="red">*</span></label>
                        <input type="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country <span class="red">*</span></label>
                        <select id="country" name="country" class="form-control" required>
                            <option value="">--- select ---</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country['alpha2Code'] }}">{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="sendData" type="button" class="btn btn-primary">Check Gender</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '#sendData', function() {
            name = $('#name').val();
            code = $('#country').val();
            sendData(name, code);
        });

    </script>
</body>

</html>

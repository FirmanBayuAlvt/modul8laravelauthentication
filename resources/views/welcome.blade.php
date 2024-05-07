<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to My Profile</title>
    @vite('resources/sass/app.scss')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Biodata Mahasiswa</div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img class="img-thumbnail" src="{{ Vite::asset('resources/images/bayu.png') }}" alt="image">
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">NAMA:</label>
                            <div class="col-md-6">
                                <span class="form-control-plaintext">FIRMAN BAYU ALVIANTO</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="umur" class="col-md-4 col-form-label text-md-right">NIM:</label>
                            <div class="col-md-6">
                                <span class="form-control-plaintext">1204220033</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="umur" class="col-md-4 col-form-label text-md-right">KELAS:</label>
                            <div class="col-md-6">
                                <span class="form-control-plaintext">IS-05-04</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="umur" class="col-md-4 col-form-label text-md-right">PRODI:</label>
                            <div class="col-md-6">
                                <span class="form-control-plaintext">SISTEM INFORMASI</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="umur" class="col-md-4 col-form-label text-md-right">FAKULTAS:</label>
                            <div class="col-md-6">
                                <span class="form-control-plaintext">REKAYASA INDUSTRI</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="umur" class="col-md-4 col-form-label text-md-right">KAMPUS:</label>
                            <div class="col-md-6">
                                <span class="form-control-plaintext">TELKOM UNIVERSITY SURABAYA</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kalkulator</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
</head>

<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-9 col-md-9 d-flex justify-content-center">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title text-center">Kalkulator</h5>
                        <br>
                        <!-- Formulir Kalkulator -->
                        <form action="{{ route('hitung') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <!-- Input Number 1 -->
                                        <input type="number" class="form-control" name="number_1"
                                            placeholder="Masukkan Angka" value="@if(!empty($nilai_riwayat)){{ $nilai_riwayat->hasil }}@endif" required>
                                    </div>
                                    <div class="col">
                                        <!-- Input Operasi -->
                                        <select class="form-select" name="operasi">
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                            <option value="*">x</option>
                                            <option value="÷">÷</option>
                                            <option value="mod">mod</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <!-- Input Number 2 -->
                                        <input type="number" class="form-control" name="number_2"
                                            placeholder="Masukkan Angka" value="" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Kirim Form -->
                            <button type="submit" class="btn btn-success" style="width:100%">Hitung</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Menampilkan Hasil -->
            @if ($hasil || $hasil == 0)
                <div class="col-12 col-sm-9 col-md-9 d-flex justify-content-center mt-3">
                    <div class="alert alert-info text-center" role="alert" style="padding: 0.5rem; width: 100%">
                        Hasilnya : {{ $hasil }}
                    </div>
                </div>
            @endif
            <!-- Menampilkan Riwayat -->
            <div class="col-12 col-sm-9 col-md-9 d-flex justify-content-center mt-3">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title text-center">Riwayat</h5>
                        <br>
                        <table class="table table-stripped text-center">
                            <tbody>
                                @foreach ($riwayat as $row)
                                    <tr>
                                        <td>{{ $row->number_1 }} {{ $row->operasi }} {{ $row->number_2 }}</td>
                                        <td> = </td>
                                        <td>{{ $row->hasil }}</td>
                                        <!-- Tombol Menampilkan Hasil Riwayat  -->
                                        <td>
                                             <a href="{{ route('ambil_riwayat', ['id' => $row->id]) }}" class="btn btn-sm btn-success" style="font-weight: 700">+</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

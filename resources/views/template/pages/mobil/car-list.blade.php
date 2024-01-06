<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/template1/css/soft-ui-dashboard.css?v=1.0.3') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/template1/css/custom.css') }}" rel="stylesheet" />
    <title>Daftar Mobil</title>
  </head>

  <body>
    <div class="container mt-4">
      <h3 class="px-4 text-xl font-weight-light">DAFTAR MOBIL</h3>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($cars as $car)
          <div class="col">
            <div class="p-4 bg-white rounded shadow-md">
              @if ($car->merk == 'TOYOTA')
                <img src="{{ asset('images/toyota.jpeg') }}" alt="Mobil 1"
                  class="object-cover mb-4 rounded w-100 h-52">
              @elseif ($car->merk == 'HONDA')
                <img src="{{ asset('images/honda.jpeg') }}" alt="Mobil 1" class="object-cover mb-4 rounded w-100 h-52">
              @else
                <img src="{{ asset('images/default.jpeg') }}" alt="Mobil 1"
                  class="object-cover mb-4 rounded w-100 h-52">
              @endif
              <h2 class="text-lg font-bold">{{ $car->merk . ' - ' . $car->model }}</h2>
              <p class="text-gray-600">Harga : {{ 'Rp. ' . number_format($car->tarif, 0, ',', '.') . '/Hari' }}</p>
              <button class="mt-2 btn btn-primary" onclick="window.location='{{ route('sewa.mobil', $car->id) }}'">Sewa
                Sekarang</button>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </body>

</html>

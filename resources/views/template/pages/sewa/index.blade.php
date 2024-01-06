<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/template1/css/soft-ui-dashboard.css?v=1.0.3') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/template1/css/custom.css') }}" rel="stylesheet" />
    <title>Form Sewa
    </title>
  </head>

  <body>
    <form method="POST" action="{{ route('sewa.mobil.store') }}">
      @csrf
      <input type="hidden" name="carId" value="{{ Request::segment(2) }}" id="carId">
      <div class="px-6 mb-4">
        <label for="dateStart" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" name="dateStart" id="dateStart" required>
      </div>
      <div class="px-6 mb-4">
        <label for="dateEnd" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" name="dateEnd" id="dateEnd" required>
      </div>

      <div class="d-flex justify-content-center px-6 pb-0.5">
        <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
      </div>
    </form>
  </body>

</html>

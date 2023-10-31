<!doctype html>
<html lang="hu" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}">Rick and Morty</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">{{__('Home')}}</a>
          </li>
        </ul>
        <!-- A keresési paraméterek megjelenítése -->
        <form action="{{route('home')}}" class="d-flex" role="search">
          <!-- Dátumok beállítása -->
          @php
          $from = date('Y-m-d',strtotime($dates["from"]));
          $to = date('Y-m-d',strtotime($dates["to"]));
          @endphp
          <input class="form-control me-2" type="date" aria-label="From date" value="{{ Request::get('from') }}" name="from" min="{{$from}}" max="{{$to}}">
          <input class="form-control me-2" type="date" aria-label="To data" value="{{ Request::get('to') }}" name="to" min="{{$from}}" max="{{$to}}">
          <!-- Rejtett mező az oldalszámhoz -->
          <input type="hidden" name="page" value="1">
          <!-- Keresés gomb -->
          <button class="btn btn-outline-success" type="submit">Search</button>
          <!-- Törlés gomb -->
          <button class="btn btn-outline-danger del" type="button">Töröl</button>
        </form>
      </div>
    </div>
  </nav>

  @yield('content')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script>
    //Szinkronizáció folyamatban...
    if (document.querySelector('.awaiting'))
      document.querySelector('.awaiting').onclick = e => {

        document.body.style.pointerEvents = 'none'

        const msgToggler = (e) => {
          const op1 = "{{__('Do not reload page...')}}",
            op2 = "{{__('Please wait...')}}";
          e.target.innerText = e.target.innerText !== op2 ? op2 : op1;
          setTimeout(() => msgToggler(e), 6000);
        }

        msgToggler(e)
      }

    // Töröl gomb - minden dátum mező törlése, majd űrlap beküldése
    document.querySelector('.del').onclick = () => {
      document.querySelectorAll('[type="date"]').forEach(el => el.value = null)
      setTimeout(() => document.forms[0].submit(), 100)
    }
  </script>
</body>

</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:300,400,500,700&display=swap&subset=japanese" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <!-- Scripts -->
  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
  <!-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> -->
  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script> -->

</head>
<body class="bg-white vh-100 min-vh-100 mh-100">
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-dark text-white shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">
                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <i class="material-icons mt-2 mr-2">
                        notifications
                        </i>
                      </li>
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">ユーザー{{ __('Login') }}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('admin.login') }}">管理者{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('admin.register') }}">管理者登録</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                              <div class="shadow dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="d-flex justify-content-start align-items-center dropdown-item py-2" href=""><i class="material-icons mr-2">people_alt</i>ユーザー一覧</a>
                                  <a class="d-flex justify-content-start align-items-center dropdown-item py-2" href=""><i class="material-icons mr-2">person_add</i>新規ユーザー登録</a>
                                  <a class="d-flex justify-content-start align-items-center dropdown-item py-2" href="/gakko/edit"><i class="material-icons mr-2">subject</i>学校基本情報</a>
                                  <a class="d-flex justify-content-start align-items-center dropdown-item py-2" href=""><i class="material-icons mr-2">help</i>ヘルプセンター</a>
                                  <a class="d-flex justify-content-start align-items-center dropdown-item py-2" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      ログアウト
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
              </div>
          </div>
      </nav>

      <main>
          @yield('content')
      </main>
  </div>
@yield('footer')
</body>
</html>

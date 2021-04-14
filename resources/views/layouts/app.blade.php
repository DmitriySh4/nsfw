<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            @include('layouts.top')
            <div class="row bg-white shadow">
                @include('layouts.header')    
            </div>
            @if(session('contactsent'))
                <div class="alert alert-success">
                    <span class="close" data-dismiss="alert">&times;</span>
                    <h4>{{ session('contactsent') }}</h4>
                </div> 
            @endif
            <div class="row">
                <div class="col-md-2 sidebar-left p-0">
                    @include('banner.left') 
                </div>    
                <div class="col-md-8 p-0">
                    <main class="py-4">
                        @yield('content')
                    </main>    
                </div>
                <div class="col-md-2 sidebar-right p-0">
                    @include('banner.right')    
                </div>    
            </div>
            <div class="row bg-white shadow">
                @include('layouts.footer')    
            </div>     
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Contact From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" id="ContactForm" action="{{ route('contactsSubmit') }}">
                @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Text') }}</label>

                        <div class="col-md-8">
                            <textarea id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text" value="{{ old('text') }}" autocomplete="text" rows="4" autofocus></textarea>
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-11 text-md-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send') }}
                            </button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal end -->

    </div>
</body>
</html>

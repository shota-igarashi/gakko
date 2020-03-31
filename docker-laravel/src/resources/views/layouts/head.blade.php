@extends('layouts.app')

@section('head')
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
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script> -->
  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script> -->
  
@endsection

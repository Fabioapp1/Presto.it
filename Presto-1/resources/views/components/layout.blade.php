<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>{{ $title ?? '' }} {{ config('app.name') }}</title>

      @livewireStyles
      @vite(['resources/css/app.css', 'resources/js/app.js'])

   </head>

   <body class="d-flex flex-column min-vh-100 justify-content-between m-auto">

      {{ $slot }}

      <x-footer/>
   
      @livewireScripts
 
   </body>

   

</html>
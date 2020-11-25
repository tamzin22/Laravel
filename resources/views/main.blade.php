
<!doctype html>
<html lang="en">

 <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  @include('partials/_head')

</head>

    <body>
     @include('partials._nav')

      <div class="container">

      @include('partials._messages')
      	
     @yield('content')

     @include('partials._javascript')

   </body>

   @include('partials._footers')

   @yield('scripts')
</html>





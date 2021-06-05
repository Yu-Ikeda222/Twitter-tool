<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @yield('css')
  
  <title>Best-follow</title>
</head>
<body>
  <h1>
    <a href="{{route('index')}}">
      Best-Follow
    </a>
  </h1>
  
  @yield('content')
</body>
</html>

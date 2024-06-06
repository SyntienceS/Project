<!-- resources/views/layouts/app.blade.php or a similar layout file -->
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('style2.css') }}">
</head>
<body>
<div class="container">
  <nav>
    <ul class="bar">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('auctions') }}">Our Products</a></li>
      <li><a href="{{ route('contact_information') }}">Contact Information</a></li>
      <li><a href="{{ route('survey') }}">Survey</a></li>
      <li><a href="{{ route('about_us') }}">About Us</a></li>
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
    </ul>
  </nav>
</div>
</body>
</html>
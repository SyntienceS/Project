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
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/auctions') }}">Our Products</a></li>
        <li><a href="{{ url('/contact_information') }}">Contact Information</a></li>
        <li><a href="{{ url('/survey') }}">Survey</a></li>
        <li><a href="{{ url('/about_us') }}">About Us</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    </ul>
  </nav>
  <main>
    <section class="introduction">
        <h2>This page is currently not finished</h2>
        <p>...</p>
    </section>
    <section class="temp_name">
        <h2>Lost Heavy Inquisition</h2>
        <p></p>
    </section>
  </main>
</div>
</body>
</html>

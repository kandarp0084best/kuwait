<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="{{asset('public/assets/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/assets/bootstrap/css/style.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/toastr.css')}}">

</head>
<body>

<nav class="navbar navbar-default bg-light">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><b>Kuwait University</b></a>
    </div>
	 <ul class="listHorizontal">
	    <li class="{{ Request::is('alumni') ? 'active' : '' }}"><a href="{{route('alumni')}}">Alumni Form</a></li>
	    <li class="{{ Request::is('employer') ? 'active' : '' }}"><a href="{{route('employer')}}">Employer Survey Form</a></li>
	</ul>
  </div>
</nav>


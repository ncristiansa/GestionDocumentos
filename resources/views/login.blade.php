@extends('layouts/plantilla')
@section('pageTitle', 'Login')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/EstiloLogin.css')}}">

<div class="wrapper fadeInDown">
  <div id="formContent">

    <form method="POST" action="/clientes">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <h1 class="display-3">Login</h1>
      <input type="text" id="user" name="user" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <br>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
    <button type="button" class="btn btn-success" onclick="location.href='{{url('loginAdmin')}}' ">Admin</button>

    
   

  </div>
</div>
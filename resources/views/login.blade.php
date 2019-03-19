@extends('layouts/plantilla')
@section('pageTitle', 'Login')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/EstiloLogin.css')}}">

<div class="wrapper fadeInDown">
  <div id="formContent">
    

    
    <form>
      <h1 class="display-3">Login</h1>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
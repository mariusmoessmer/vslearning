@extends('layouts.master') 

@section('content')

<div class="container">
      <form class="form-signin" action="login" method="post">
      <h2 class="form-signin-heading text-muted">Lernsystem</h2>
		<?php if(isset($msg) && isset($class)):?>
            <div  class="{{ $class }}">{{ $msg }}</div>
        <?php endif; ?>
        
        <input name="username" type="text" class="form-control" placeholder="Benutzername" required="required" autofocus><br>
        <input name="password" type="password" class="form-control" placeholder="Passwort" required="required"><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>
      </form>
    </div> 

@stop
<!DOCTYPE html>
<html>
  <head>
    <title>Lernsystem</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <form class="form-signin" action="login" method="post">
        <h2 class="form-signin-heading">Lernsystem</h2>
        <!-- check for login error flash var -->
        @if (Session::has('flash_error'))
            <div id="flash_error" div class="alert alert-danger">{{ Session::get('flash_error') }}</div>
        @endif
        <input name="username" type="text" class="form-control" placeholder="Benutzername" required autofocus>
        <input name="password" type="password" class="form-control" placeholder="Passwort" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

<?php if(!class_exists('Rain\Tpl')){exit;}?><form class="login-form-signin" method="POST">

  <h1 class="h4 mb-3 font-weight-bold" >Bem vindo ao Find a Pet!</h1>
  <h2 class="h5 mb-3 text-muted">Doe ou adote um novo amigo</h2>

  <label for="inputEmail" class="sr-only">Email address</label>
  <input name="email" type="email" id="inputEmail" class="login form-control" placeholder="Email" required autofocus>

  <label for="inputPassword" class="sr-only">Password</label>
  <input name ="senha" type="password" id="inputPassword" class="login form-control" placeholder="Senha" required>

  <button class="btn btn-lg btn-success btn-block login-btn-entrar" type="submit">Entrar <i class="fa fa-sign-in-alt"></i></button>
  <br>
</form>

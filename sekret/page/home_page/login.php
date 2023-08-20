<div class="row">
    <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
        <img src="../img/logo.png" width="175"/>
    </div>
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
               <form class="form-signin" action='?m=ceklog' method='post'>
                <h4 class="form-signin-heading">Silahkan masuk</h4>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" name="username" placeholder="Email address" required autofocus>
                </div>
                <div class="form-group">
                <label for="inputPassword" class="sr-only" >Password</label>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                </div>
                    <button class="btn btn-mini btn-primary " type="submit" name="login" value="login">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
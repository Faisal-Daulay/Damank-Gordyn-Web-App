<!DOCTYPE html>

<html lang="en">

<head>
   <base href="./">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
   <meta name="author" content="Łukasz Holeczek">
   <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
   <title>Lupa Password</title>

   <link href="css/style.css" rel="stylesheet">
   <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
</head>

<body class="app flex-row align-items-center">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card-group">
               <div class="card p-4">
                  <div class="card-body">
                     <h1>Lupa Password</h1>
                     <p class="text-muted">Forget password your account</p>
                     <form action="inc/user/pro_lupa_pass.php" method="post">
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                                 <i class="icon-user"></i>
                              </span>
                           </div>
                           <input class="form-control" name="user" type="text" placeholder="Username">
                        </div>
                        <div class="input-group mb-4">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                                 <i class="icon-lock"></i>
                              </span>
                           </div>
                           <input class="form-control" name="pass" type="password" placeholder="Password Baru">
                        </div>
                        <div class="input-group mb-4">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                                 <i class="icon-lock"></i>
                              </span>
                           </div>
                           <input class="form-control" name="repass" type="password" placeholder="Konfirmasi Password Baru">
                        </div>
                        <div class="row">
                           <div class="col-6">
                              <button class="btn btn-primary px-4" type="submit">Reset Password</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                  <div class="card-body text-center">
                     <div>
                        <h2>Sign In</h2>
                        <p>
                           Jika anda sudah memiliki account silahkan klik tombol login di bawah ini.
                        </p>
                        <a href="login.php" class="btn btn-primary active mt-3">Sign In Now!</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</body>

</html>
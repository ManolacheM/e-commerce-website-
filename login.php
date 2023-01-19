<?php

require_once "config.php";
require_once "session.php";

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
      $error .= '<p class="error">Please enter email.</p>';
    }

    if (empty($password)) {
      $error .= '<p class="error">Please enter your password.</p>';
    }

    if (empty($error)) {
      if($query = $db->prepare("SELECT * FROM customers WHERE email=?")) {
        $query->bind_param('s', $email);
        $query->execute();
        $row = $query->fetch();
        if($row) {
            if ($row['password'] == $password) {
              $_SESSION["userid"] = $row['customer_id'];
              // $_SESSION["user"] = $row;
     
            header("location: welcome.php");
            exit();
    
          } else {
            $error .= '<p class="error">The password is not valid.</p>';
          }
        } else {
          $error .= '<p class="error">No user exist with that email address.</p>';
        }
      }
      $query->close();
      }
      mysqli_close($db);
    }
?>

<!DOCTYPE html>
<html>
<head>
<style>

* {
  box-sizing: border-box;
}

body {
  font-family: "Rubik", sans-serif;
  margin: 0;
  padding: 0;
}
strong {
  padding: 0;
  margin: 0;
}

label,
a {
  text-decoration: none;
  color: #555;
}

ul {
  list-style: none;
  padding: 0;
}

header {
  box-shadow: 2px 9px 49px -17px rgba(0, 0, 0, 0.3);
  position: sticky;
  top: 0;
  width: 100%;
  z-index: 10;
}

.header-content-top {
  background: rgb(150, 24, 24);
  height: 30px;
  width: 100%;
}
.header-content-top .content {
  align-items: center;
  display: flex;
  height: 30px;
  justify-content: flex-end;
  margin: 0 auto;
  max-width: 1300px;
  width: 100%;
}
.header-content-top .content span {
  color: #fff;
  font-size: 12px;
  margin: 0 15px;
}
.header-content-top .content span .fas {
  margin-right: 5px;
}

.container {
  align-items: center;
  display: flex;
  height: 70px;
  justify-content: space-between;
  margin: 0 auto;
  max-width: 1300px;
  padding: 0 15px;
  position: relative;
  width: 100%;
}
.container .logo {
  width: 90px;
  height: 70px;
  line-height: 20px;
  padding-right: 15px;
}
.container .open-search {
  border-radius: 3px;
  flex: auto;
  margin: 0 15px;
  overflow: hidden;
  position: relative;
}
@media (max-width: 991px) {
  .container .open-search {
    margin: 0;
    position: static;
    text-align: right;
  }
}
.container .open-search .fa-search {
  display: none;
}
@media (max-width: 991px) {
  .container .open-search .fa-search {
    display: block;
  }
}
.container .open-search .input-open-search {
  display: none;
}
.container .open-search .input-open-search:checked ~ .search {
  display: block;
}
@media (max-width: 991px) {
  .container .search {
    display: none;
    position: absolute;
    left: 0;
    top: 70px;
    width: 100%;
    z-index: 999;
  }
}
.container .search .input-search {
  border-radius: 3px;
  border: 1px solid #e1e1e1;
  height: 40px;
  padding: 0 70px 0 15px;
  width: 100%;
  background: white no-repeat;
  transition: 100ms all linear 0s;
  background-image: linear-gradient(to bottom, rgb(150, 24, 24) 0%, rgb(160, 34, 34) 90%), linear-gradient(to bottom, #e1e1e1, #e1e1e1);
  background-size: 0 2px, 100% 1px;
  background-position: 50% 100%, 50% 100%;
  transition: background-size 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
}
.container .search .input-search:focus {
  background-size: 100% 2px, 100% 1px;
  outline: none;
}
.container .search .button-search {
  background: rgb(150, 24, 24);
  border: 0;
  color: #fff;
  cursor: pointer;
  padding: 13px 20px;
  position: absolute;
  right: 0px;
  top: 0px;
}
.container .search .button-search .fa-search {
  display: block;
}
.container .nav-content .nav-content-list {
  align-items: center;
  display: flex;
  justify-content: space-between;
  padding: 0 15px;
}
.container .nav-content .nav-content-list .nav-content-item {
  align-items: center;
  display: flex;
  height: 40px;
  margin: 0 5px;
  position: relative;
  transition: 100ms all linear 0s;
}
@media (max-width: 991px) {
  .container .nav-content .nav-content-list .nav-content-item {
    padding: 0 5px;
  }
}
.container .nav-content .nav-content-list .nav-content-item .item-arrow {
  margin-left: 5px;
  position: relative;
  top: -3px;
}
@media (max-width: 768px) {
  .container .nav-content .nav-content-list .nav-content-item .item-arrow {
    display: none;
  }
}
.container .nav-content .nav-content-list .nav-content-item .open-menu-login-account {
  align-items: center;
  cursor: pointer;
  display: flex;
  position: relative;
}
.container .nav-content .nav-content-list .nav-content-item .input-menu {
  display: none;
}
.container .nav-content .nav-content-list .nav-content-item .input-menu:checked ~ .login-list {
  display: block;
}
.container .nav-content .nav-content-list .nav-content-item .login-list {
  background: #fff;
  border-bottom: 3px solid rgb(150, 24, 24);
  border-radius: 3px;
  box-shadow: 2px 9px 49px -17px rgba(0, 0, 0, 0.3);
  display: none;
  overflow: hidden;
  position: absolute;
  right: 0;
  top: 28px;
  transition: 100ms all linear 0s;
  width: 200px;
  z-index: 10;
}
.container .nav-content .nav-content-list .nav-content-item .login-list .login-list-item {
  padding: 15px 20px;
}
.container .nav-content .nav-content-list .nav-content-item .login-list .login-list-item:hover {
  background: rgb(150, 24, 24);
}
.container .nav-content .nav-content-list .nav-content-item .login-list .login-list-item:hover a {
  color: #fff;
}

.container .nav-content .nav-content-list .account-login .login-text {
  align-items: end;
  display: flex;
  flex-direction: column;
  font-size: 12px;
  margin-left: 5px;
}
@media (max-width: 991px) {
  .container .nav-content .nav-content-list .account-login .login-text {
    display: none;
  }
}
.container .nav-content .nav-content-list .account-login .login-text strong {
  display: block;
}
.container .nav-content .nav-content-list .nav-content-link {
  border-radius: 3px;
  font-size: 19px;
  padding: 10px 15px;
  transition: 100ms all linear 0s;
}
@media (max-width: 991px) {
  .container .nav-content .nav-content-list .nav-content-link {
    padding: 0;
  }
}

.nav-container {
  align-items: center;
  display: flex;
  margin: 0 auto;
  max-width: 1300px;
  width: 100%;
}
.nav-container .nav-row {
  align-items: center;
  display: flex;
  height: 40px;
  justify-content: space-between;
  margin: 0;
  padding: 0;
}
@media (max-width: 991px) {
  .nav-container .nav-row {
    display: none;
  }
}
.nav-container .nav-row .nav-row-list {
  flex: auto;
}
.nav-container .nav-row .nav-row-list .nav-row-list-link {
  align-items: center;
  display: flex;
  height: 40px;
  justify-content: center;
  transition: 100ms all linear 0s;
}
.nav-container .nav-row .nav-row-list .nav-row-list-link:hover {
  background: #e1e1e1;
  width: 100%;
}
.nav-container .featured-menu {
  flex: auto;
  margin: 0 15px 0 0;
}
@media (max-width: 991px) {
  .nav-container .featured-menu {
    display: none;
  }
}
.nav-container .all-navigator {
  align-items: center;
  background: rgb(150, 24, 24);
  color: #fff;
  display: flex;
  height: 40px;
  padding: 0 25px;
  width: 100%;
}
@media (max-width: 991px) {
  .nav-container .all-navigator {
    margin-right: 0;
  }
}
.nav-container .all-navigator .fa-angle-up,
.nav-container .all-navigator .fa-angle-down {
  position: absolute;
  right: 25px;
}
.nav-container .all-navigator .fa-angle-up {
  display: none;
}
.nav-container .all-navigator .fas {
  font-size: 16px;
  margin-right: 0;
}
.nav-container .all-navigator span {
  margin-left: 15px;
}
.nav-container .all-categories-nav {
  cursor: pointer;
  max-width: 300px;
  position: relative;
  width: 100%;
}
@media (max-width: 991px) {
  .nav-container .all-categories-nav {
    max-width: 100%;
  }
}
.nav-container .all-categories-nav .open-menu-all {
  align-items: center;
  cursor: pointer;
  display: flex;
  position: relative;
}
.nav-container .all-categories-nav .input-menu-all {
  display: none;
}
.nav-container .all-categories-nav .input-menu-all:checked ~ .all-categories-list {
  display: block;
}
.nav-container .all-categories-nav .input-menu-all:checked + .all-navigator .fa-angle-down {
  display: none;
}
.nav-container .all-categories-nav .input-menu-all:checked + .all-navigator .fa-angle-up {
  display: block;
}
.nav-container .all-categories-list {
  background: #fff;
  border-bottom: 3px solid rgb(150, 24, 24);
  box-shadow: 2px 9px 49px -17px rgba(0, 0, 0, 0.3);
  display: none;
  height: auto;
  min-height: 170px;
  padding: 15px 0;
  position: absolute;
  top: 24px;
  width: 300px;
  z-index: 90;
}
@media (max-width: 991px) {
  .nav-container .all-categories-list {
    min-width: 100%;
  }
}
.nav-container .all-categories-list-item:hover {
  display: block;
  background: rgb(150, 24, 24);
}
.nav-container .all-categories-list-item:hover .categories-second-list {
  left: 100%;
  opacity: 1;
  visibility: visible;
}
.nav-container .all-categories-list-item:hover .all-categories-list-link {
  color: #fff;
}
.nav-container .all-categories-list-link {
  align-items: center;
  display: flex;
  justify-content: space-between;
  padding: 15px;
  transition: 100ms all linear 0s;
}
.nav-container .categories-second-list {
  background: #fff;
  border-bottom: 3px solid rgb(150, 24, 24);
  box-shadow: inset 44px -1px 88px -59px rgba(0, 0, 0, 0.37);
  display: flex;
  height: 180px;
  left: 80%;
  min-height: 180px;
  min-width: 400px;
  opacity: 0;
  position: absolute;
  top: 0;
  transition: 100ms all linear 0s;
  visibility: hidden;
  width: auto;
}
@media (max-width: 991px) {
  .nav-container .categories-second-list {
    display: none;
  }
}
.nav-container .categories-second-list .img-product-menu img {
  max-width: 180px;
}
.nav-container .categories-second-list-ul {
  display: flex;
  flex-direction: column;
  min-width: 400px;
  padding: 0 15px;
}
.nav-container .categories-second-item a {
  align-items: center;
  display: flex;
  justify-content: space-between;
  padding: 15px;
}
.nav-container .categories-second-item:hover {
  background: rgb(150, 24, 24);
}
.nav-container .categories-second-item:hover a {
  color: #fff;
}

.fa-bars {
  font-size: 28px;
}

form,
fieldset {
  border: 0;
  padding: 0;
  margin: 0;
}

.login-container {
  align-items: center;
  display: flex;
  justify-content: center;
  margin: 50px auto;
  max-width: 1200px;
  top: 300px;
  width: 100%;
}
@media (max-width: 768px) {
  .login-container {
    flex-wrap: wrap;
    top: 300px;
  }
}

.btn {
  align-items: center;
  background: rgb(150, 24, 24);
  border-radius: 3px;
  border: 0;
  color: #fff;
  cursor: pointer;
  display: flex;
  font-size: 16px;
  padding: 15px 45px;
  transition: 0.2s;
}
.btn:hover {
  background: rgb(150, 24, 24);
  transform: translateY(-2px);
}
.btn .fas.fa-arrow-right {
  color: #fff;
  font-size: 12px;
  line-height: 12px;
  margin: 0 0 0 10px;
}

.register,
.login {
  border-radius: 5px;
  box-shadow: 0 7px 30px -10px rgba(150, 170, 180, 0.5);
  height: auto;
  max-width: 400px;
  padding: 40px 15px;
  text-align: center;
  width: 100%;
}
.register .fas,
.login .fas {
  color: rgb(150, 24, 24);
  font-size: 35px;
  margin-bottom: 5px;
}
.register strong,
.login strong {
  color: #2f2f2f;
  display: block;
  font-size: 40px;
}
.register span,
.login span {
  color: #2f2f2f;
}
.register .create-account,
.login .create-account {
  border-top: 1px solid #e2e2e2;
  display: flex;
  justify-content: center;
  margin-top: 30px;
  padding-top: 30px;
}
.register .create-account strong,
.login .create-account strong {
  font-size: 16px;
  margin-left: 5px;
  text-decoration: underline;
}

.register,
.login {
  background: #fff;
}
.register .form,
.login .form {
  margin-top: 30px;
  padding: 0 20px;
}
.register .form .form-row,
.login .form .form-row {
  position: relative;
  text-align: left;
}
.register .form .form-row .fas,
.login .form .form-row .fas {
  font-size: 15px;
  position: absolute;
  right: 10px;
  top: 30px;
}
.register .form .form-row.bottom,
.login .form .form-row.bottom {
  display: flex;
  justify-content: space-between;
}
.register .form .form-row.bottom .forgot,
.login .form .form-row.bottom .forgot {
  color: rgb(150, 24, 24);
}
.register .form .form-row.button-login,
.login .form .form-row.button-login {
  margin-top: 50px;
}
.register .form .form-row.button-login .fas,
.login .form .form-row.button-login .fas {
  position: static;
}
.register .form .form-row .form-check input[type=checkbox] + label,
.login .form .form-row .form-check input[type=checkbox] + label {
  color: #555;
  cursor: pointer;
  display: block;
}
.register .form .form-row .form-check input[type=checkbox],
.login .form .form-row .form-check input[type=checkbox] {
  display: none;
}
.register .form .form-row .form-check input[type=checkbox] + label:before,
.login .form .form-row .form-check input[type=checkbox] + label:before {
  border-radius: 3px;
  border: 1px solid #e2e2e2;
  color: transparent;
  content: "✔";
  display: inline-block;
  height: 15px;
  margin-right: 5px;
  transition: 0.2s;
  vertical-align: bottom;
  width: 15px;
  line-height: 16px;
  font-size: 12px;
  text-align: center;
}
.register .form .form-row .form-check input[type=checkbox] + label:active:before,
.login .form .form-row .form-check input[type=checkbox] + label:active:before {
  transform: scale(1.1);
}
.register .form .form-row .form-check input[type=checkbox]:checked + label:before,
.login .form .form-row .form-check input[type=checkbox]:checked + label:before {
  background-color: rgb(150, 24, 24);
  border-color: rgb(150, 24, 24);
  color: #fff;
}
.register .form .form-label,
.login .form .form-label {
  color: #555;
  font-size: 12px;
}
.register .form-password,
.register .form-text,
.login .form-password,
.login .form-text {
  border-radius: 2px;
  border: 0;
  height: 40px;
  margin-bottom: 20px;
  padding: 0 40px 0 10px;
  width: 100%;
  background: #f1f1f1 no-repeat;
  transition: 100ms all linear 0s;
  background-image: linear-gradient(109.6deg, rgb(150, 24, 24) 11.2%, rgb(239, 120, 120) 91.2%);
  background-size: 0 2px, 100% 1px;
  background-position: 50% 100%, 50% 100%;
  transition: background-size 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
}
.register .form-password:focus,
.register .form-text:focus,
.login .form-password:focus,
.login .form-text:focus {
  background-size: 100% 2px, 100% 1px;
  outline: none;
}

.register {
  transform: scale(1.01);
  background-image: linear-gradient(109.6deg, rgb(150, 24, 24) 11.2%, rgb(239, 120, 120) 91.2%);
}
.register .fas,
.register strong {
  color: #fff;
}
.register .form .form-label {
  color: #fff;
}
.register .form .form-row .fas {
  color: rgb(150, 24, 24);
}
.register .form .form-row .button-login {
  margin-top: 20px;
}
.register .btn-login {
  background: #fff;
  color: #555;
}
.register .btn-login .fas.fa-arrow-right {
  color: #555;
}
.register .btn-login:hover {
  background: #d5d7de;
}
.register .create-account {
  color: #fff;
}

 </style>
</head>

<body>

    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

    <header>
      <!-- contact content -->
      <div class="header-content-top">
        <div class="content">
          <span><i class="fas fa-phone-square-alt"></i> (+40) 721 129 907</span>
          <span><i class="fas fa-envelope-square"></i>contact@motouau.com</span>
        </div>
      </div>
      <!-- / contact content -->
      <div class="container">
        <!-- logo -->
        <strong class="logo"><img height=70px width=90px src="images/moto.jpg"><a href="home.php"></a></strong>
        <!-- open nav mobile -->
    
        <!--search -->
        <label class="open-search" for="open-search">
          <i class="fas fa-search"></i>
                <input class="input-open-search" id="open-search" type="checkbox" name="menu" />
        <div class="search">
          <button class="button-search"><i class="fas fa-search"></i></button>
          <input type="text" placeholder="What are you looking for?" class="input-search"/>
        </div>
        </label>
        <!-- // search -->
        <nav class="nav-content">
          <!-- nav -->
          <ul class="nav-content-list">
            <li class="nav-content-item account-login">
              <label class="open-menu-login-account" for="open-menu-login-account">
    
                <input class="input-menu" id="open-menu-login-account" type="checkbox" name="menu" />
    
                <i class="fas fa-user-circle"></i><span class="login-text">Hello, Sign in <strong>Create Account</strong></span> <span class="item-arrow"></span>
    
                <!-- submenu -->
                <ul class="login-list">
                  <li class="login-list-item"><a href="login.php">My account</a></li>
                  <li class="login-list-item"><a href="register.php">Create account</a></li>
                  <li class="login-list-item"><a href="logout.php">Logout</a></li>
                  </label>
                </ul>
            </li>
            <li class="nav-content-item"><a class="nav-content-link" href="#"><i class="fas fa-shopping-cart"></i></a></li>
            <!-- call to action -->
          </ul>
        </nav>
      </div>
      <!-- nav navigation commerce -->
      <div class="nav-container">
        <nav class="all-categories-nav">
          <label class="open-menu-all" for="open-menu-all">
            <input class="input-menu-all" id="open-menu-all" type="checkbox" name="menu-open" />
            <span class="all-navigator"><i class="fas fa-bars"></i> <span>Toate categoriile</span> <i class="fas fa-angle-down"></i>
              <i class="fas fa-angle-up"></i>
            </span>
    
            <ul class="all-categories-list">
              <li class="all-categories-list-item"><a href="casti.php" class="all-categories-list-link">Casti<i class="fas fa-angle-right"></i></a>
                <div class="categories-second-list">
                  <ul class="categories-second-list-ul">
                    <li class="categories-second-item"><a href="integrale.php">Casti integrale</a></li>
                    <li class="categories-second-item"><a href="flipup.php">Casti flip-up</a></li>
                    <li class="categories-second-item"><a href="cross.php">Casti cross-enduro</a></li>
                  </ul>
              </li>
              <li class="all-categories-list-item"><a href="strada.php" class="all-categories-list-link">Echipamente strada<i class="fas fa-angle-right"></i></a>
                <div class="categories-second-list">
                    <ul class="categories-second-list-ul">
                      <li class="categories-second-item"><a href="combinezoane.php">Combinezoane</a></li>
                      <li class="categories-second-item"><a href="geci.php">Geci</a></li>
                      <li class="categories-second-item"><a href="cizme.php">Cizme</a></li>
                    </ul>
              </li>
              <li class="all-categories-list-item"><a href="offroad.php" class="all-categories-list-link">Echipamente offroad<i class="fas fa-angle-right"></i></a>
                <div class="categories-second-list">
                    <ul class="categories-second-list-ul">
                        <li class="categories-second-item"><a href="ochelari.php">Ochelari cross-enduro</a></li>
                        <li class="categories-second-item"><a href="gecicross.php">Geci cross-enduro</a></li>
                        <li class="categories-second-item"><a href="cizmecross.php">Cizme cross-enduro</a></li>
                    </ul>
              </li>
            </ul>
          </label>
    
        </nav>
        <nav class="featured-menu">
          <ul class="nav-row">
            <li class="nav-row-list"><a href="home.php" class="nav-row-list-link">Acasa</a></li>
            <li class="nav-row-list"><a href="contact.php" class="nav-row-list-link">Contact</a></li>
            <li class="nav-row-list"><a href="about.php" class="nav-row-list-link">Despre noi</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main>
      <section class="login-container">
        <!-- login -->
        <div class="login">
    
          <i class="fas fa-sign-in-alt"></i>
          <strong>Welcome!</strong>
          <span>Sign in to your account</span>
          <?php echo $error; ?>
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
              <div class="form">
                <div class="form-row">
                  <i class="fas fa-user"></i>
                  <label class="form-label" for="input" >Email</label>
                  <input type="email" name="email" class="form-text" placeholder="enter your email" required/>
                </div>
                <div class="form-row">
                  <i class="fas fa-eye"></i>
                  <label class="form-label" for="input">Password</label>
                  <input type="password" name="password" class="form-text" placeholder="enter password" required>
                </div>
                <div class="form-row bottom">
                  <div class="form-check">
                    <input type="checkbox" id="remember" name="remember" value="remember">
                    <label for="remember">Remember me?</label>
                <div class="form-row button-login">
                  <button name="signin" class="btn btn-login">Sign in <i class="fas fa-arrow-right"></i></button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </section>
    </main>

</body>
</html>
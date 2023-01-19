<?php

session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
<style>
.textcenter {
	text-align: center;
}
.clearfix:before, .clearfix:after { 
    display: table; 
    content: ''; 
}
.clearfix:after { 
    clear: both; 
}
.section1 {
	text-align: center;
	display: table;
	width: 100%;
}
    /** SLIDESHOW **/
  .slideshow {
    list-style-type: none;
  }
  
  .slideshow,
  .slideshow:after { 
      top: 150px; 
      object-fit: contain;
      position: center;
      width: 1536px;
      height: 400px;
      left: 0px;
      z-index: 0; 
  }
  
  .slideshow li span { 
      position: absolute;
      object-fit: contain;
      width: 1536px;
      height: 400px;
      top: 150px;
      left: 0px;
      color: transparent;
      opacity: 0;
      z-index: 0;
      animation: imageAnimation 30s linear infinite 0s; 
  }
  
  .slideshow li:nth-child(1) span { 
      background-image: url("images/slider1.jpg"); 
  }
  .slideshow li:nth-child(2) span { 
      background-image: url("images/slider2.jpg");
      animation-delay: 6s; 
  }
  .slideshow li:nth-child(3) span { 
      background-image: url("images/slider3.jpg");
      animation-delay: 12s; 
  }
  .slideshow li:nth-child(4) span { 
      background-image: url("images/slider4.jpg");  
      animation-delay: 18s; 
  }
  .slideshow li:nth-child(5) span { 
      background-image: url("images/slider5.jpg");
      animation-delay: 24s; 
  }
  .slideshow li:nth-child(6) span { 
      background-image: url("images/slider6.jpg");
      animation-delay: 30s; 
  }


  @keyframes imageAnimation { 
    0% { opacity: 0; animation-timing-function: ease-in; }
    8% { opacity: 1; animation-timing-function: ease-out; }
    17% { opacity: 1 }
    25% { opacity: 0 }
    100% { opacity: 0 }
}


@keyframes titleAnimation { 
    0% { opacity: 0 }
    8% { opacity: 1 }
    17% { opacity: 1 }
    19% { opacity: 0 }
    100% { opacity: 0 }
}

.no-cssanimations .cb-slideshow li span {
	opacity: 1;
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
    
<section class="section1 clearfix">
    <div class="textcenter">
        <h1>Bine ai venit la MOTOUAU, <strong><?php echo $_SESSION["username"]; ?></strong>!</h1>
    </div>
</section>
        
<ul class="slideshow">
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
    <li><span></span></li>
</ul>

</body>
</html>


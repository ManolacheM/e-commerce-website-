<!DOCTYPE html>
<html>
<head>
<style>

* {
  box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
  font-family: "Rubik", sans-serif;
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
  background-image: linear-gradient(to bottom, rgba(77, 97, 252, 0.63) 0%, #4d61fc 90%), linear-gradient(to bottom, #e1e1e1, #e1e1e1);
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
  color: white;
}
.nav-container .all-categories-list-link {
  align-items: center;
  display: flex;
  justify-content: space-between;
  padding: 15px;
  transition: 100ms all linear 0s;
}
.nav-container .categories-second-list {
  background: white;
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

*, *:after, *:before { 
    -webkit-box-sizing: border-box; 
    -moz-box-sizing: border-box; 
    -ms-box-sizing:border-box; 
    -o-box-sizing:border-box; 
    box-sizing: border-box; 
}

.clearfix:before, .clearfix:after { 
    display: table; 
    content: ''; 
}
.clearfix:after { 
    clear: both; 
}

input:focus, textarea:focus, keygen:focus, select:focus {
	outline: none;
}
::-moz-placeholder {
	color: #666;
	font-weight: 300;
	opacity: 1;
}

::-webkit-input-placeholder {
	color: #666;
	font-weight: 300;
}


/* Contact Form Styling */
.container-contact {
	padding: 0 50px 70px;
    top: 300px;
}
.textcenter {
	text-align: center;
}
.section1 {
	text-align: center;
	display: table;
	width: 100%;
}


.section1 h1 {
	font-size: 40px;
	color: rgb(150, 24, 24);
	font-weight: normal;
    font-family: "Rubik", sans-serif
}

.section2 {
    width: 1200px;
    margin: 25px auto;
}
.section2 .col2 {
	width: 48.71%;
}
.section2 .col2.first {
	float: left;
}
.section2 .col2.last {
	float: right;
}
.section2 .col2.column2 {
	padding: 0 30px;
}
.section2 span.collig {
	color: #a2a2a2;
	margin-right: 10px;
	display: inline-block;
}
.section2 .sec2addr {
	display: block;
	line-height: 26px;
}
.section2 .sec2addr p:first-child {
	margin-bottom: 10px;
}


/* @media querries */

@media only screen and (max-width: 1266px) {
	.section2 {
		width: 100%;
	}
}
@media only screen and (max-width: 960px) {
	.container-contact {
		padding: 0 30px 70px;
	}
	.section2 .col2 {
		width: 100%;
		display: block;
	}
	.section2 .col2.first {
		margin-bottom: 10px;
	}
	.section2 .col2.column2 {
		padding: 0;
	}
	body .sec2map {
		height: 250px !important;
	}
}
@media only screen and (max-width: 768px) {
	.section2 .sec2addr {
		font-size: 14px;
	}
}
@media only screen and (max-width: 420px) {
	.section1 h1 {
		font-size: 28px;
	}	
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

    <div class="container-contact">
		<div class="innerwrap">
		
			<section class="section1 clearfix">
				<div class="textcenter">
					<h1>Contactează-ne</h1>
				</div>
			</section>
		
			<section class="section2 clearfix">
				<div class="col2 column1 first">
					<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                    <div class="sec2map" style='overflow:hidden;height:400px;width:100%;'>
                        <div id='gmap_canvas' style='height:400px;width:600px;'>
                        </div>
                    <div>
                        <small><a href="http://embedgooglemaps.com"></a></small>
                    </div>
                    <div>
                        <small><a href="http://freedirectorysubmissionsites.com/"></a></small>
                    </div>
                    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                </div>
                <script type='text/javascript'>function init_map()
                    {var myOptions = {zoom:14,center:new google.maps.LatLng(45.6545495,25.5952368),mapTypeId: google.maps.MapTypeId.ROADMAP};
                    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                    marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(45.6545495,25.5952368)});
                    infowindow = new google.maps.InfoWindow({content:'<strong>Locatia magazinului</strong><br>MOTOUAU<br>'});
                    google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);
                    }
                    google.maps.event.addDomListener(window, 'load', init_map);
                </script>
				</div>
				<div class="col2 column2 last">
					<div class="sec2innercont">
						<div class="sec2addr">
							<p><span class="collig">Adresa :</span> Strada Universității 1, Brașov, România</p>
							<p><span class="collig">Telefon :</span> (+40) 721 129 907</p>
							<p><span class="collig">E-mail :</span> contact@motouau.com</p>
							<p><span class="collig">Orar relații clienți :</span> 	Luni-Vineri: 10:00 - 18:00</p>
						</div>
				</div>
			</section>
		
		</div>
	</div>


</body>
</html>

<?php 
session_start();
require_once('configprod.php');    
require_once('helpers.php');  

$sql = "SELECT * from products where subcategory_id='GCI'";
$handle = $db->prepare($sql);
$handle->execute();
$getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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


<div class="row">
    <?php
    foreach($getAllProducts as $product)
    {
        $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($product['name']))."/".$product['image'];
        
    ?>
        <div class="col-md-3  mt-2">
            <div class="card">
                 <a href="single-product.php?product=<?php echo $product['product_id']?>">
                    <img class="card-img-top" src="<?php echo $product['image'] ?>" alt="<?php echo $product['name'] ?>">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="single-product.php?product=<?php echo $product['product_id'] ?>">
                            <?php echo $product['name']; ?>
                        </a>
                    </h5>
                    <strong><?php echo $product['price']?> LEI</strong>

                    <p class="card-t">
                        <?php echo substr($product['description'],0,70) ?>...
                    </p>
                    <p class="card-text">
                        <a href="single-product.php?product=<?php echo $product['product_id']?>" class="btn btn-primary btn-sm">
                            View
                        </a>
                    </p>
                </div>
            </div>
        </div>
    <?php 
    }
    ?>
</div>

</body>
</html>
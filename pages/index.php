<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" type="image/png" href="../images/logo-nobg.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Comic+Neue&family=Quicksand:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>KapiKapi Cafe</title>
</head>
<body>  
    <?php include("header.php"); ?>
    <!-- Home page-->
<main>

    <!-- Hero section-->
    <section class="hero">
        <div class="hero-content"></div>
            <h1 class="hero-title">Slow Sips, Cozy</h1>
            <h1 class="hero-title">Moments.</h1>
            <p class="hero-desc">The ultimate spot inspired by the world's most relaxed animal.</p>
            <a href="#" class="primary-btn">Explore Our Menu</a>
        </div>
    </section>


    <!-- Featured Treats section -->
    <section class="featured">
        <h2>Featured Treats</h2>

        <div class="cards">

            <div class="card">
                <img src="../images/featured/capycino-latte.png" alt="CapyCino Latte">
                <h3>CapyCino Latte</h3>
                <p>Our signature latte with adorable latte art</p>
                <a href="#" class="view-btn">View in Menu</a>
            </div>

            <div class="card">
                <img src="../images/featured/capybuns.png" alt="Capy Buns">
                <h3>Capy Buns</h3>
                <p>Soft, golden buns baked fresh daily</p>
                <a href="#" class="view-btn">View in Menu</a>
            </div>

            <div class="card">
                <img src="../images/featured/leaf-nibble-matcha.png" alt="Leaf-Nibble Matcha">
                <h3>Leaf-Nibble Matcha</h3>
                <p>Premium ceremonial matcha for a zen boost</p>
                <a href="#" class="view-btn">View in Menu</a>
            </div>

        </div> <!-- end .cards -->
    </section>


    <!-- Join Section -->
    <section class="join">
        <img src="../images/star-inside-circle.png">
        <h2>Join the Capy Club</h2>
        <p>Sign up to start ordering your favorite treats online and maximize the chill.</p>
        <a href="/register.html" class="primary-btn">Create Account</a>
    </section>

</main>

    <?php include("footer.php"); ?>
</body>
</html>
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

    <main>
        <div class="menu-header">
            <h1 class="menu-title">Our Menu & Merch</h1>
            <p class="menu-description">
                Treat yourself to our selection of ethically sourced coffees, homemade treats, and cozy merchandise. 100% capybara approved.
            </p>
        </div>

        <!-- Menu Toggle Buttons -->
        <nav class="menu-toggle-btns">
            <button class="menu-btn" onclick="showSection('food-section')">Food & Drinks</button>
            <button class="menu-btn" onclick="showSection('merch-section')">Merchandise</button>
        </nav>

        <section id="food-section" class="menu-section"></section>
        <section id="merch-section" class="menu-section" style="display:none;"></section>

        <!-- Order Popup -->
        <div id="order-popup">
            <div class="popup-card"></div>
        </div>
    </main>

    <script src="../js/menu.js"></script>
    <?php include("./footer.php"); ?>
</body>
</html>
    
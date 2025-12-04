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
        <?php
            include("header.php");
            ?>

            <main>
                <div class="menu-header">
                    <h1 class="menu-title">Our Menu & Merch</h1>
                    <p class="menu-description">
                        Treat yourself to our selection of ethically sourced coffees, homemade treats, and cozy merchandise. 100% capybara approved.
                    </p>
                </div>

                <!-- Menu Buttons -->
                <nav class="menu-toggle-btns">
                    <button class="menu-btn" onclick="showSection('food-section')">Food & Drinks</button>
                    <button class="menu-btn" onclick="showSection('merch-section')">Merchandise Section</button>
                </nav>

                <!-- Food & Drinks Section -->
                <section id="food-section">
                    <article>
                        <img src="../images/featured/capycino-latte.png" alt="">
                        <h2>CapyCino Latte</h2>
                        <p>Rich espresso with steamed milk and cute capybara foam art</p>
                        <p>₱180.00</p>
                        <button onclick="showOrderPopUp('CapyCino Latte', 180.00, '../images/featured/capycino-latte.png')">Order Now</button>
                    </article>
                    <article>
                        <img src="../images/mudbath-mocha.png" alt="">
                        <h2>Mudbath Mocha</h2>
                        <p>Decadent dark chocolate mocha with whipped cream "mud"</p>
                        <p>₱200.00</p>
                        <button onclick="showOrderPopUp('Mudbath Mocha', 200.00, '../images/mudbath-mocha.png')">Order Now</button>
                    </article>
                    <article>
                        <img src="../images/riverbank-iced-coffee.png" alt="">
                        <h2>Riverbank Iced Coffee</h2>
                        <p>Refreshing cold brew with a hint of mint and sweet cream</p>
                        <p>₱160.00</p>
                        <button onclick="showOrderPopUp('Riverbank Iced Coffee', 160.00, '../images/riverbank-iced-coffee.png')">Order Now</button>
                    </article>
                    <article>
                        <img src="../images/featured/leaf-nibble-matcha.png" alt="">
                        <h2>Leaf-Nibble Matcha</h2>
                        <p>Ceremonial grade matcha latte. Capybara's favorite greens.</p>
                        <p>₱190.00</p>
                        <button onclick="showOrderPopUp('Leaf-Nibble Matcha', 190.00, '../images/featured/leaf-nibble-matcha.png')">Order Now</button>
                    </article>
                    <article>
                        <img src="../images/featured/capybuns.png" alt="">
                        <h2>Capy Buns</h2>
                        <p>Two soft, sweet mini bread buns shaped like our mascot.</p>
                        <p>₱120.00</p>
                        <button onclick="showOrderPopUp('Capy Buns', 120.00, '../images/featured/capybuns.png')">Order Now</button>
                    </article>
                    <article>
                        <img src="../images/capy-pancakes.png" alt="">
                        <h2>Capy Pancakes</h2>
                        <p>Stacks of fluffy pancakes with drizzled butter and maple syrup.</p>
                        <p>₱250.00</p>
                        <button onclick="showOrderPopUp('Capy Pancakes', 250.00, '../images/capy-pancakes.png')">Order Now</button>
                    </article>
                </section>

                <!-- Merchandise Section -->
                <section id="merch-section" style="display:none;">
                    <article>
                        <img src="../images/capy-plushie.png" alt="">
                        <h2>Capy Plushie</h2>
                        <p>Super soft, huggable capybara plushie. The ultimate chill companion.</p>
                        <p>₱190.00</p>
                        <button onclick="showOrderPopUp('Capy Plushie', 190.00, '../images/capy-plushie.png')">Order Now</button>
                    </article>
                    <article>
                        <img src="../images/capymug.png" alt="">
                        <h2>KapiKapi Mug</h2>
                        <p>Ceramic mug with our mascot. Perfect for your morning slow sips.</p>
                        <p>₱400.00</p>
                        <button onclick="showOrderPopUp('KapiKapi Mug', 400.00, '../images/capymug.png')">Order Now</button>
                    </article>
                    <article>
                        <img src="../images/slow-sips-tote.png" alt="">
                        <h2>Slow Sips Tote</h2>
                        <p>Eco-friendly canvas tote bag for carrying your essentials.</p>
                        <p>₱350.00</p>
                        <button onclick="showOrderPopUp('Slow Sips Tote', 350.00, '../images/slow-sips-tote.png')">Order Now</button>
                    </article>
                </section>
                <!-- Order Popup -->
                <div id="order-popup">
                    <div class="popup-card">
                        <!-- Content injected by JS -->
                    </div>
                </div>

                
            </main>
            

            <script src="../js/menu.js">
            
            </script>
        <?php include("./footer.php");?>
    </body>
    </html>
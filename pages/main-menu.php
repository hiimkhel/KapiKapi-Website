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
            

            <script>
            const overlay = document.getElementById('order-popup');
            let currentProductName = '';
            let currentProductPrice = 0;
            let currentQuantity = 1;

            // Show/hide sections
            function showSection(sectionId) {
                document.getElementById('food-section').style.display = 'none';
                document.getElementById('merch-section').style.display = 'none';
                document.getElementById(sectionId).style.display = 'grid';
            }

            // Order popup logic
            function showOrderPopUp(name, price, img) {
                currentProductName = name;
                currentProductPrice = price;
                currentQuantity = 1;

                const popupCard = document.querySelector('.popup-card');

                popupCard.innerHTML = isLoggedIn
                    ? `
                    <div class="popup-header">
                        <h2>Complete Your Order</h2>
                        <button onclick="closeOrderPopup()">×</button>
                    </div>
                    <div class="popup-product-info">
                        <img src="${img}" alt="${name}">
                        <div>
                            <h3>${name}</h3>
                            <p>₱${price}</p>
                        </div>
                        <div>
                            <button onclick="decreaseQty()">-</button>
                            <span id="qty-value">1</span>
                            <button onclick="increaseQty()">+</button>
                        </div>
                    </div>
                    <form id="order-form" action="store-order.php" method="post">
                        <input type="hidden" name="product" value="${name}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="price" value="${price}">
                        <input type="hidden" name="total" value="${price}">
                        <label>Street Address *</label><input type="text" name="streetAddress" required>
                        <label>Barangay *</label><input type="text" name="barangay" required>
                        <label>City *</label><input type="text" name="city" required>
                        <label>Province *</label><input type="text" name="province" required>
                        <label>Zip Code *</label><input type="text" name="zipCode" pattern="\\d{4}" required>
                        <label>Phone Number *</label><input type="tel" name="phoneNumber" required>
                        <label>Delivery Notes</label><textarea name="deliveryNotes"></textarea>
                        <button type="submit">Place Order</button>
                    </form>
                    `
                    : `
                    <div class="popup-header">
                        <h2>Not Logged In</h2>
                        <button onclick="closeOrderPopup()">×</button>
                    </div>
                    <p style="padding:20px; text-align:center;">You must be logged in to place an order.</p>
                    `;

                overlay.style.display = 'flex';
            }

            // Quantity controls
            function increaseQty() {
                currentQuantity++;
                document.getElementById('qty-value').textContent = currentQuantity;
            }
            function decreaseQty() {
                if(currentQuantity>1){currentQuantity--; document.getElementById('qty-value').textContent = currentQuantity;}
            }

            // Close popup
            function closeOrderPopup() { overlay.style.display = 'none'; }

            overlay.addEventListener('click', e => {
                if(e.target === overlay) closeOrderPopup();
            });
            </script>
        <?php include("./footer.php");?>
    </body>
    </html>
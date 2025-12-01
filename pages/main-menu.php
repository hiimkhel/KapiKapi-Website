    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Comic+Neue&family=Quicksand:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <title>KapiKapi Cafe</title>
    </head>
    <body> 
        <?php include("header.php")?>
        
        <main>
            <div class="menu-header">
                <h1 class="menu-title">Our Menu & Merch</h1>
                <p class="menu-description">Treat yourself to our selection of ethically sourced coffees, homemade treats, and cozy merchandise. 100% capybara approved.</p>
            </div>
            <nav class="menu-toggle-btns">
                <button class="menu-btn" onclick="showSection('food-section')">Food & Drinks</button>
                <button class="menu-btn" onclick="showSection('merch-section')">Merchandise Section</button>
            </nav>
            
            <!--Food and Drinks Section-->
            <section id="food-section">
                <article>
                    <img src="../images/temp.png" alt="">
                    <h2>CapyCino Latte</h2>
                    <p>Rich espresso with steamed milk and cute capybara foam art</p>
                    <p>₱180.00</p>
                    <button onclick="showOrderPopUp('CapyCino Latte', '180.00')">Order Now</button>
                </article>
                
                <article>
                    <img src="../images/temp.png" alt="">
                    <h2>Mudbath Mocha</h2>
                    <p>Decadent dark chocolate mocha with whipped cream "mud"</p>
                    <p>₱200.00</p>
                    <button onclick="showOrderPopUp('Mudbath Mocha', '200.00')">Order Now</button>
                </article>

                <article>
                    <img src="../images/temp.png" alt="">
                    <h2>Riverbank Iced Coffee</h2>
                    <p>Refreshing cold brew with a hint of mint and sweet cream</p>
                    <p>₱160.00</p>
                    <button onclick="showOrderPopUp('Riverbank Iced Coffee', '160.00')">Order Now</button>
                </article>
                
                <article>
                    <img src="../images/temp.png" alt="">
                    <h2>Leaf-Nibble Matcha</h2>
                    <p>Ceremonial grade matcha latte. Capybara's favorite greens.</p>
                    <p>₱190.00</p>
                    <button onclick="showOrderPopUp('Leaf-Nibble Match', '190.00')">Order Now</button>
                </article>

                <article>
                    <img src="../images/temp.png" alt="">
                    <h2>Capy Buns</h2>
                    <p>Two soft, sweet mini bread buns shaped like our mascot.</p>
                    <p>₱120.00</p>
                    <button onclick="showOrderPopUp('Capy Buns', '120.00')">Order Now</button>
                </article>
                
                <article>
                    <img src="../images/temp.png" alt="">
                    <h2>Capy Pancakes</h2>
                    <p>Stacks of fluffy pancakes with drizzled butter and maple syrup.</p>
                    <p>₱250.00</p>
                    <button onclick="showOrderPopUp('Capy Pancakes', '250.00')">Order Now</button>
                </article>
            </section>

            <!--Merchandise Section-->
            <section id="merch-section">
                <article>
                    <img src="../images/temp.png" alt="">
                    <h2>Copy Plushie</h2>
                    <p>Super soft, huggable capybara plushie. The ultimate chill companion.</p>
                    <p>₱190.00</p>
                    <button onclick="showOrderPopUp('Capy Plushie', '190.00')">Order Now</button>
                </article>
                
                <article>
                    <img src="../images/temp.png" alt="">
                    <h2>KapiKapi Mug</h2>
                    <p>Ceramic mug with our mascot. Perfect for your morning slow sips.</p>
                    <p>₱400.00</p>
                    <button onclick="showOrderPopUp('KapiKapi Mug', '400.00')">Order Now</button>
                </article>

                <article>
                    <img src="../images/temp.png" alt="">
                    <h2>Slow Sips Tote</h2>
                    <p>Eco-friendly canvas tote bag for carrying your essentials.</p>
                    <p>₱350.00</p>
                    <button onclick="showOrderPopUp('Slow Sips Tote', '350.00')">Order Now</button>
                </article>
            </section>

            <!-- Order PopUp-->
            <div id="order-popup">
                <div>
                    <h2>Complete Yor Order</h2>
                    <button id="close-button" onclick="closeOrderPopup()">X</button>
                </div>

                
                <div>
                    <!-- Product Image -->
                    <img src="" alt="">
                    
                    <!-- Product Info -->
                    <div>
                        <h3 id="popup-product-name">Product Name</h3>
                        <p id="popup-product-price">₱0.00</p>
                    </div>
                    
                    <button onclick="decreaseQty()">-</button>
                    <span id="qty-value">1</span>
                    <button onclick="increaseQty()">+</button>
                </div>
                
        
            <form id="order-form" action="store-order.php" method="post"> 
                <input type="hidden" id="product" name="product">
                <input type="hidden" id="quantity" name="quantity">
                <input type="hidden" id="price" name="price">
                <input type="hidden" id="total" name="total">
                <!--Customer's Address-->
                <label for="streetAddress">Street Address *</label>
                <input type="text" id="streetAddress" name="streetAddress" placeholder="House no., Building, Street name" required>

            <label for="streetAddress">Street Address *</label>
                <input type="text" id="streetAddress" name="streetAddress" required>

                <label for="barangay">Barangay *</label>
                <input type="text" id="barangay" name="barangay" required>

                <label for="city">City *</label>
                <input type="text" id="city" name="city" required>

                <label for="province">Province *</label>
                <input type="text" id="province" name="province" required>

                <label for="zip">Zip Code *</label>
                <input type="text" id="zip" name="zipCode" pattern="\d{4}" required>

                <label for="number">Phone Number *</label>
                <input type="tel" id="number" name="phoneNumber" required>

                <label for="notes">Delivery Notes</label>
                <textarea id="notes" name="deliveryNotes"></textarea>

                <!-- Total Display -->
                <div>
                    <p>Total (<span id="total-items">1</span> item)</p>
                    <p id="total-price">₱0.00</p> 
                </div>
                        
                    <button type="submit">Place Order</button> 
                </form>            
            </div>
        </main>

        <?php include("footer.php"); ?>
        
        <script>
            // Variables to store current order details
            let currentProductName = '';
            let currentProductPrice = 0;
            let currentQuantity = 1;

            // Add active class on menu buttons
            const menuButtons = document.querySelectorAll('.menu-btn');

            menuButtons.forEach(btn => {
                btn.addEventListener('click', function () {

                    // remove active class from all buttons
                    menuButtons.forEach(b => b.classList.remove('menu-btn-active'));

                    // add active class to the clicked one
                    this.classList.add('menu-btn-active');
                });
            });

            // Hide merch section on page load
            window.addEventListener("DOMContentLoaded", () => {
                document.getElementById('food-section').style.display = 'grid'; // show food
                document.getElementById('merch-section').style.display = 'none'; // hide merch

                // make first button active by default
                document.querySelectorAll('.menu-btn')[0].classList.add('menu-btn-active');
            });

            // Function to show/hide sections
            function showSection(sectionId) {
                // Hide all sections
                document.getElementById('food-section').style.display = 'none';
                document.getElementById('merch-section').style.display = 'none';
                
                // Show the selected section
                document.getElementById(sectionId).style.display = 'grid'; // <-- use grid
            }

            // Function to show order popup
            function showOrderPopUp(productName, price) {
                currentProductName = productName;
                currentProductPrice = parseFloat(price);
                currentQuantity = 1;

                // Update popup content
                document.getElementById("popup-product-name").textContent = productName;
                document.getElementById("popup-product-price").textContent = '$' + price;
                document.getElementById("qty-value").textContent = '1';
                updateTotal();

                // Show the popup
                document.getElementById('order-popup').style.display = 'block';        
            }

            // Function to close order popup
            function closeOrderPopup() {
                document.getElementById('order-popup').classList.remove = 'block'
                // Reset Form
                document.getElementById('order-form').reset();
            }

            // Function to increase quantity
            function increaseQty() {
            currentQuantity++; 
            document.getElementById('qty-value').textContent = currentQuantity;
            updateTotal();
            }

            // Function to decrease quantity
            function decreaseQty() {
                if (currentQuantity > 1) {
                    currentQuantity--; 
                document.getElementById('qty-value').textContent = currentQuantity;
                updateTotal();
                }
            }

            // Function to update toal price
            function updateTotal() {
                const total = currentProductPrice * currentQuantity;
                document.getElementById('total-price').textContent = '₱' + total.toFixed(2);
                document.getElementById('total-items').textContent = currentQuantity;
            }
            
            // Function to handle form submission
            function submitOrder(event) {
                event.preventDefault();

                const formData = new FormData(document.getElementById("order-form"));

                fetch("../save_order.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.text())
                .then(response => {
                    alert(response);
                    closeOrderPopup();
                })
                .catch(err => {
                    alert("Failed to send order.");
                });
            }
        </script>
    </body>
    </html>
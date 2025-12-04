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
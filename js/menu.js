// menu.js
console.log("Menu JS loaded");

const overlay = document.getElementById('order-popup');
let currentProductName = '';
let currentProductPrice = 0;
let currentQuantity = 1;

// Show/hide sections
function showSection(sectionId) {
    console.log("Switching section to:", sectionId);
    document.getElementById('food-section').style.display = 'none';
    document.getElementById('merch-section').style.display = 'none';
    document.getElementById(sectionId).style.display = 'grid';
}

async function loadMenu() {
    try {
        const res = await fetch('../pages/get-menu.php');
        const text = await res.text();
        console.log("RAW JSON:", text); // debug
        const data = JSON.parse(text);

        const foodSection = document.getElementById('food-section');
        const merchSection = document.getElementById('merch-section');

        foodSection.innerHTML = '';
        merchSection.innerHTML = '';

        data.food.forEach(item => foodSection.innerHTML += createMenuArticle(item));
        data.merch.forEach(item => merchSection.innerHTML += createMenuArticle(item));
    } catch(err) {
        console.error('Menu fetch failed:', err);
    }
}



// Create HTML element for each menu item safely
function createMenuArticle(item) {
    const article = document.createElement('article');

    article.innerHTML = `
        <div class="admin-actions">
            <a href="edit.php?id=${item.id}" class="edit-btn">✏️</a>
            <a href="delete.php?id=${item.id}" class="delete-btn" onclick="return confirm('Delete this item?');">🗑️</a>
        </div>
        <img src="${item.image}" alt="${item.name}">
        <h2>${item.name}</h2>
        <p>${item.description}</p>
        <p>₱${parseFloat(item.price).toFixed(2)}</p>
        <button class="order-btn">Order Now</button>
    `;

    // Add click event safely
    article.querySelector('.order-btn').addEventListener('click', () => {
        console.log("Ordering item:", item.name);
        showOrderPopUp(item.name, item.price, item.image);
    });

    return article;
}

// Order popup logic
function showOrderPopUp(name, price, img) {
    console.log("Showing order popup:", name, price, img);

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
    console.log("Quantity increased:", currentQuantity);
    document.getElementById('qty-value').textContent = currentQuantity;
}

function decreaseQty() {
    if (currentQuantity > 1) {
        currentQuantity--;
        console.log("Quantity decreased:", currentQuantity);
        document.getElementById('qty-value').textContent = currentQuantity;
    }
}

// Close popup
function closeOrderPopup() {
    console.log("Closing popup");
    overlay.style.display = 'none';
}

// Close if click outside
overlay.addEventListener('click', e => {
    if (e.target === overlay) closeOrderPopup();
});

// Load menu on page load
loadMenu();

console.log("Menu JS loaded");

const overlay = document.getElementById('order-popup');
let currentProductName = '';
let currentProductPrice = 0;
let currentQuantity = 1;

// Show/hide menu sections
function showSection(sectionId) {
    document.querySelectorAll('.menu-section').forEach(sec => {
        sec.style.display = (sec.id === sectionId) ? 'grid' : 'none';
    });
}

// Load menu from backend
async function loadMenu() {
    try {
        const res = await fetch('../pages/get-menu.php');
        const data = await res.json(); // Should return { food: [...], merch: [...] }
        console.log("Menu data:", data);

        const foodSection = document.getElementById('food-section');
        const merchSection = document.getElementById('merch-section');

        foodSection.innerHTML = '';
        merchSection.innerHTML = '';

        data.food.forEach(item => foodSection.appendChild(createMenuArticle(item)));
        data.merch.forEach(item => merchSection.appendChild(createMenuArticle(item)));

    } catch(err) {
        console.error("Failed to load menu:", err);
    }
}

// Create a menu article
function createMenuArticle(item) {
    const article = document.createElement('article');
    article.innerHTML = `
        <img src="${item.image}" alt="${item.name}">
        <h2>${item.name}</h2>
        <p>${item.description}</p>
        <p>₱${parseFloat(item.price).toFixed(2)}</p>
        <button class="order-btn">Order Now</button>
    `;
    article.querySelector('.order-btn').addEventListener('click', () => {
        showOrderPopUp(item.name, item.price, item.image);
    });
    return article;
}

// Show order popup
function showOrderPopUp(name, price, img) {
    currentProductName = name;
    currentProductPrice = price;
    currentQuantity = 1;

    const popupCard = document.querySelector('.popup-card');
    popupCard.innerHTML = `
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
            <div class="popup-quantity-control">
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
    `;
    overlay.style.display = 'flex';
}

// Quantity control
function increaseQty() {
    currentQuantity++;
    document.getElementById('qty-value').textContent = currentQuantity;
}

function decreaseQty() {
    if (currentQuantity > 1) {
        currentQuantity--;
        document.getElementById('qty-value').textContent = currentQuantity;
    }
}

// Close popup
function closeOrderPopup() {
    overlay.style.display = 'none';
}

// Close if click outside
overlay.addEventListener('click', e => {
    if (e.target === overlay) closeOrderPopup();
});

// Initial load
loadMenu();
showSection('food-section'); // show food by default

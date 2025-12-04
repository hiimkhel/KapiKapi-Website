const contactForm = document.getElementById("contact-form");
        const popup = document.getElementById("feedback-popup");
        const popupTitle = document.getElementById("popup-title");
        const popupMessage = document.getElementById("popup-message");
        const popupClose = document.getElementById("popup-close");

        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(contactForm);

            fetch('./store-feedback.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                popupTitle.textContent = data.status === "success" ? "Success!" : "Error";
                popupMessage.textContent = data.message;

                // Show popup
                popup.classList.remove("hidden-popup");

                if (data.status === "success") {
                    contactForm.reset();
                }
            })
            .catch(err => {
                console.error(err);
                popupTitle.textContent = "Error";
                popupMessage.textContent = "Something went wrong!";
                popup.classList.remove("hidden-popup");
            });

        });

        // Close popup
        popupClose.addEventListener("click", () => {
            popup.classList.add("hidden-popup");
        });
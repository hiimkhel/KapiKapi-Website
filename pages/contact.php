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
    <?php include("header.php")?>

    <main>
        <div id="contact-container">
            <!--Header Section-->
            <h1 class="contact-title">Get in Touch</h1>
            <p class="contact-desc">We love hearing from our fellow chillers</p>

            <!-- Contact Info and Form Section -->
            <div id="content-wrapper">
                <!-- Left Side -->
                <div id="contact-info-card">
                    <!-- Location -->
                    <div class="contact-info-section">
                        <img class="contact-icon"src="../images/contact-page/location.png" alt="">
                        <div id="location-details"> 
                            <h3>Location</h3>
                            <p>Luna St., La Paz</p>
                            <p>Iloilo City, 5000 Iloilo5</p>
                        </div>
                    </div>

                    <!-- Open Hours -->
                    <div class="contact-info-section">
                        <img class="contact-icon" src="../images/contact-page/clock.png" alt="">
                        <div id="hours-details">
                            <h3>Hours</h3>
                            <p>Mon-Fri: 7:00 AM - 8:00 PM</p>
                            <p>Sat-Sun: 8:00 AM - 9:00 PM</p>
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="contact-info-section">
                        <img class="contact-icon" src="../images/contact-page/telephone.png" alt="">
                        <div id="phone-details">
                            <h3>Phone</h3>
                            <p>(+639) 123-4567</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="contact-info-section">
                        <img class="contact-icon" src="../images/contact-page/letter.png" alt="">
                        <div id="email-details">
                            <h3 >Email</h3>
                            <p>kapikapi@gmail.com</p>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Contact Form -->
                <div id="contact-form-card">
                    <form id="contact-form">
                        <!-- First Name and Last Name -->
                        <div id="name-fields">
                            <input class="contact-input" type="text" id="firstName" name="firstName" placeholder="First Name" required>
                            <input class="contact-input" type="text" id="lastName" name="lastName" placeholder="Last Name" required>
                        </div>

                        <!-- Email Address -->
                        <div id="email-field">
                            <input class="contact-input" type="email" id="emailInput" name="email" placeholder="Email Address" required>
                        </div>
                        
                        <!-- Subject -->
                        <div id="subject-field">
                            <input class="contact-input" type="text" id="subject" name="subject" placeholder="Subject" required>
                        </div>

                        <!-- Message -->
                        <div id="message-field">
                            <textarea class="contact-input" id="message" name="message" placeholder="Your message..." rows="6" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button class="primary-btn" type="submit" id="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include("footer.php")?>
</body>
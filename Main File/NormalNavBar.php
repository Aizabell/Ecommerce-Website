<?php
require_once "Connect.php";

session_start();
// print_r($_SESSION['cart']);
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        // echo $product['qty'];
        $total += $product['qty'];
    }
}

// if (isset($_SESSION['user'])) {
//     $userrole = $_SESSION['role'];
// }


if (isset($_POST['logout'])) {
    echo "You have logged out";
    unset($_SESSION['user']);
    unset($_SESSION['role']);
    session_destroy();
}

// if (isset($_POST['SignIn'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     header("Location: SignIn.php?username=$username&password=$password");
    
// }



?>



<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../CSS_Main_File/Navigation.css">
</head>
<!-- <a href="index.php"><img src="../Images/LogoN.png" alt="Logo"></a> -->

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="home.php"><img src="../Images/LogoN.png"></a>
        </div>

        <div class="commonnav">

            <ul>
                <li><a href="Home.php">Home</a></li>

                <li class="dropdown">
                    <a href="Products.php">Products</a>
                    <ul class="dropdown-menu">
                        <li><a href="Lacquerware.php">Lacquerware</a></li>
                        <li><a href="BambooCraft.php">Bamboo Craft</a></li>
                        <li><a href="Jewelery.php">Jewelery</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Explore</a>
                    <ul class="dropdown-menu">
                        <li><a href="BlogMain.php">Blog</a></li>
                        <li><a href="Community.php">Community</a></li>
                    </ul>
                </li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li class="dropdown">
                    <a href="#">Support</a>
                    <ul class="dropdown-menu">
                        <li><a href="Enquiry.php">Enquiry</a></li>
                        <li><a href="FAQ.php">FAQ</a></li>
                    </ul>
                </li>

                <!-- <li><a href="Cart.php">Cart</a></li> -->
            </ul>
        </div>
        <div class="accnav">
            <ul>
                <li>
                    <div class="icon">
                        <a href="Cart.php">
                            <img src="../Images/CartY icon.ico">
                        </a>
                        <span class="cart-num"><sup>
                                <?= $total ?>
                            </sup></span>
                    </div>
                </li>

                <div class="credential">
                    <?php if (isset($_SESSION['user'])) : ?>
                        
                        <?php if ($_SESSION['role'] == 'admin') : ?>
                            <a href="Dashboard.php" class="bs-btn">ADMIN</a>
                        <?php elseif ($_SESSION['role'] == 'customer') : ?>
                            <a href="account.php" class="bs-btn">ACCOUNT</a>
                        <?php endif; ?>
                        <a href="SignOut.php" class="bs-btn">SIGN OUT</a>
                    <?php else : ?>
                        <a href="#signin" class="bs-btn popup-link" id="signin-button">SIGN IN</a>
                        <a href="#signup" class="bs-btn popup-link" id="signup-button">SIGN UP</a>
                    <?php endif ?>
                </div>

            </ul>
        </div>

    </nav>
    <div id="overlay"></div>
    <div class="popup" id="signin-popup" style="display: none;">
        <div class="popup-content form-container">
            <label for="close-signin" class="close-popup">&#10006;</label>
            <h2>Account</h2>
            <div class="tab">
                <button class="tablinks active" onclick="openForm(event, 'signin-form')">Sign In</button>
                <button class="tablinks" onclick="openForm(event, 'signup-form')">Sign Up</button>
            </div>
            <!-- signin form -->
            <form id="signin-form" action="SignIn.php" class="tabcontent active" name="SignIn" method="POST">
                <div class="form-group">
                    <label for="signin-username">Username:</label>
                    <input type="text" id="signin-username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="signin-password">Password:</label>
                    <input type="password" id="signin-password" name="password" required>
                </div>
                <button type="submit" name="submit" class="btn">Sign In</button>
                <p>Don't have an account? <a href="#" id="signin-toggle">Sign Up</a></p>
            </form>
            <!-- signup form -->
            <form id="signup-form" class="tabcontent" action="" method="POST">
                <div class="form-group">
                    <label for="signup-username">Username:</label>
                    <input type="text" id="signup-username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" class="gselect">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="street">Street:</label>
                    <input type="text" id="street" name="street">
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="signup-password">Password:</label>
                    <input type="password" id="signup-password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <p>Already have an account? <a href="#" id="signup-toggle">Sign In</a></p>
            </form>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var signinButton = document.getElementById('signin-button');
            var signupButton = document.getElementById('signup-button');
            var overlay = document.getElementById('overlay');
            var signinPopup = document.getElementById('signin-popup');
            var signupPopup = document.getElementById('signup-popup');
            var signinForm = document.getElementById('signin-form');
            var signupForm = document.getElementById('signup-form');
            var closeButtons = document.querySelectorAll('.close-popup');
            var signinToggle = document.getElementById('signin-toggle');
            var signupToggle = document.getElementById('signup-toggle');

            signinButton.addEventListener('click', function(event) {
                event.preventDefault();
                overlay.style.display = 'block';
                signinPopup.style.display = 'block';
                signupPopup.style.display = 'none';

                showForm('signin-form');
            });

            signupButton.addEventListener('click', function(event) {
                event.preventDefault();
                overlay.style.display = 'block';
                signinPopup.style.display = 'block';
                signupPopup.style.display = 'none';
                showForm('signup-form');
            });

            closeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    overlay.style.display = 'none';
                    signinPopup.style.display = 'none';
                    signupPopup.style.display = 'none';
                });
            });

            overlay.addEventListener('click', function() {

                overlay.style.display = 'none'; // Hide the overlay only if the overlay itself is clicked
                signinPopup.style.display = 'none'; // Hide the popup

            });

            signinToggle.addEventListener('click', function(event) {
                event.preventDefault();
                showForm('signin-form');
            });

            signupToggle.addEventListener('click', function(event) {
                event.preventDefault();
                showForm('signup-form');
            });

            document.getElementById('signin-toggle').addEventListener('click', function(event) {
                event.preventDefault();
                showForm('signin-form');
            });

            document.getElementById('signup-toggle').addEventListener('click', function(event) {
                event.preventDefault();
                showForm('signup-form');
            });
        });

        function openForm(evt, formName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(formName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }

        function showForm(formName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(formName).classList.add("active");
            if (formName === 'signin-form') {
                document.getElementById('signin-toggle').classList.add("active");
                document.getElementById('signup-toggle').classList.remove("active");
            } else if (formName === 'signup-form') {
                document.getElementById('signup-toggle').classList.add("active");
                document.getElementById('signin-toggle').classList.remove("active");
            }
        }
    </script>
</body>

</html>
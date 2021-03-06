<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - Chaz 51 Steakhouse</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <!-- css Files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Font-Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">

    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="index.html" class="navbar-brand">
                    <img src="images/logo.svg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="selections.html">Selections</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="contact-us">
        <div class="container">
            <h2>Connect with Us</h2>
            <p>Your voice matters.</p>
            <div class="contact-form">
                <?php
                    if(isset($_POST['submit'])){
                        if($_POST["name"]==""||$_POST["email"]==""||$_POST["phone"]==""){
                            echo "Fill All Fields..";
                        }else{
                            $email = $_POST['email'];
                            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                            if (!$email){
                                echo "Invalid Sender's Email";
                            }
                            else{
                                $to = 'Gibson.tyler@ufl.edu';

                                $subject = 'Contact Form Entry';

                                // To send HTML mail, the Content-type header must be set
                                $headers[] = 'MIME-Version: 1.0';
                                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                                // Additional headers
                                $headers[] = 'From: Tyler Gibson <dh_mpfb5k@william-hooper.dreamhost.com>';
                                $headers[] = 'Reply-To: '. strip_tags($_POST['email']);

                                $message = '<html><body>';
                                $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                                $message .= "<tr><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
                                $message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
                                $message .= "<tr><td><strong>Phone:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";
                                $message .= "<tr><td><strong>Type:</strong> </td><td>" . strip_tags($_POST['exampleRadios']) . "</td></tr>";
                                $message .= "</table>";
                                $message .= "</body></html>";
                                mail($to, $subject, $message, implode("\r\n", $headers));
                                mail($email, $subject, "Your email has been sent successfully!");
                                echo '<div class="success-message">Form is submitted successfully!</div>';
                            }
                        }
                    }
                    else{
                        ?>
                            <form action="" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Reservations" required>
                                    <label class="form-check-label" for="exampleRadios1">Reservations</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Question/Feedback" required>
                                    <label class="form-check-label" for="exampleRadios2">Question/Feedback</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="General Inquiry" required>
                                    <label class="form-check-label" for="exampleRadios3">General Inquiry</label>
                                </div>
                                <input type="submit" name="submit" class="submit-btn" value="Submit">
                            </form>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <section class="contact-content">
        <div class="container">
            <h2>The Chaz 51 steakhouse guarantee</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud enon</p>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo">
                        <a href="index.html">
                            <img src="images/logo.svg" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-post">
                        <h3>RECENT POSTS</h3>
                        <ul>
                            <li><a href="#">Chaz 51 hosts Haiti relief event</a></li>
                            <li><a href="#">Chaz to premiere Chaz 51 after dark</a></li>
                            <li><a href="#">Steakhouse hosts Venice football team</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-contact">
                        <h3>Contact Info</h3>
                        <ul>
                            <li>Chaz 51 steakhouse 549 us-41 bypass Venice, Florida 34285</li>
                            <li>Sunday - Thursday: 4pm - 9pm<br>Friday & Saturday: 4pm - 1am</li>
                            <li><a href="tel:(941) 484-6200">(941) 484-6200</a> call for reservations</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-social">
                        <ul>
                            <li><a href="http://www.facebook.com/chaz51steakhouse" target="_blank"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/chaz51steakhouse" target="_blank"><i class="fab fa-instagram"></i></a></li><br>
                            <li><a href="https://www.twitter.com/51_chaz" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.yelp.com/biz/chaz-51-steak-house-venice" target="_blank"><i class="fab fa-yelp"></i></a></li>
                            <li><a href="https://www.tripadvisor.com/Restaurant_Review-g34705-d2287174-Reviews-Chaz_51_Steak_House-Venice_Florida.html?m=19905" target="_blank"><i class="fab fa-tripadvisor"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>
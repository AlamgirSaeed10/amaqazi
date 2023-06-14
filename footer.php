<?php 
include_once ('database/dbConnection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newsletter = mysqli_real_escape_string($db_con, isset($_POST["newsletter"]));
$sql = "INSERT INTO newsletter (NewsletterEmail) VALUES ('$newsletter')";
if ($db_con->query($sql) === TRUE) {
    // echo '<span class="success-badge">Form submitted successfully!</span>';

} else {
    echo "Error: " . $sql . "<br>" . $db_con->error;
}
}

?>  
<style>
    .success-badge {
        display: inline-block;
        padding: 5px 10px;
        background-color: green;
        color: white;
        border-radius: 5px;
    }
</style>

<div class="container-fluid bg-dark text-secondary  pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">We welcome you to get in touch with us at AMAQAZI. Whether you have inquiries, feedback, or require assistance, our team is here to support you. Feel free to contact us through the provided contact information; we will be delighted to address your needs. Your satisfaction is our priority, and we look forward to hearing from you.</p>
                <!-- <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p> -->
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>procurement@amaqazi.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+1 245 255 4931</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">

                        <a href="index.php" class="text-secondary mb-2"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a href="comingsoon.php" class="text-secondary mb-2"><i class="fa fa-angle-right mr-2"></i>Shop</a>
                        <a href="https://docs.google.com/spreadsheets/d/1ZWfvK4jeGb_kXHFWADiZsnotmGXQlX6SQqnlGiPYXEk/edit?usp=sharing" target="_blank"  class="text-secondary mb-2"><i class="fa fa-angle-right mr-2"></i>Catalog</a>
                        <a href="about.php"  class="text-secondary mb-2"><i class="fa fa-angle-right mr-2"></i>About</a>
                        <a href="https://forms.gle/DgkqvTe9A98bnr3y9" target="_blank" class="text-secondary mb-2"><i class="fa fa-angle-right mr-2"></i>Request Product</a>
                        <a href="contact.php"  class="text-secondary mb-2"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Business Hours</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <h6><p class="text-secondary mb-2">Office & Customer Support</p></h6>
                            <p class="text-secondary mb-2">Mon - Fri, 9AM - 5PM (EST)</p>
                            <p class="text-secondary mb-2">Saturday Sunday Closed</p>
                            <p class="text-secondary mb-2"><u>Customer Support</u></p>
                            <a href="mailto:support@amaqazi.com">support@amaqazi.com </a>
                           
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Stay informed and up-to-date with our latest news, offers, and exclusive promotions by subscribing to our newsletter. Join our community today!</p>
                        <form method="POST">
                            <div class="input-group">
                                <input type="email" class="form-control" name="newsletter" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                   © AmaQazi | 
                   <a href = "privacy-policy.php" class="text-secondary">Privacy Policy </a> | 
                   <a href = "refund-policy.php" class="text-secondary">Refund Policy </a> | 
                   <a href = "shipping-policy.php" class="text-secondary">Shipping Policy </a> | 
                   <a href = "terms-service.php" class="text-secondary">Terms of Service</a> 
                </p>
            </div>

            <div class="col-md-6 px-xl-0 text-center text-right">
                <div class="d-flex float-right">
                            <a class="pl-3 mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="pl-3 mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="pl-3 mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="pl-3 mr-2" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">

                <!-- Contact Section -->
                <div class="col-md-4">
                    <h3>Contact Us</h3>
                    <?php require_once __DIR__ . '/functions.php'; ?>
                    <ul class="conta">
                        <li>
                            <i class="fa-solid fa-map-marker-alt"></i>
                            <span><?php echo h(get_setting('address-Chimur Chandrapur Maharastra', 'Chimur, Maharashtra, India')); ?></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-mobile-screen"></i>
                            <a href="tel:+917350255026" class="contact-link"><?php echo h(get_setting('phone', '+91 7350255026')); ?></a>
                        </li>
                        <li class="email-item">
                            <i class="fa-solid fa-envelope"></i>
                            <a href="mailto:balajirestaurantandlodge@gmail.com" class="contact-link email-link"><?php echo h(get_setting('email', 'balajirestaurantandlodge@gmail.com')); ?></a>
                        </li>
                    </ul>
                </div>

                <!-- Menu Links -->
                <div class="col-md-4">
                    <h3>Menu Link</h3>
                    <ul class="link_menu">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="room.php">Our Room</a></li>
                        <li><a href="restaurant.php">Restaurant</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="chimur-tourism.php">Chimur Travel Guide</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="col-md-4">
                    <h3>Follow Us</h3>
                    <ul class="social_icon">
                        <li>
                            <a href="https://www.facebook.com/profile.php?id=61582915179431" target="_blank" rel="noopener noreferrer" title="Facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/917350255026" target="_blank" rel="noopener noreferrer" title="WhatsApp">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/balajirestaurantandlodge/" target="_blank" rel="noopener noreferrer" title="Instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@BalajiHotel-RestaurantAndL-01" target="_blank" rel="noopener noreferrer" title="YouTube">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1 text-center">
                        <p>
                            © <?php echo date('Y'); ?> All Rights Reserved. 
                            <a href="index.php" class="text-danger">Balaji Hotel - Restaurant and Lodge</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>

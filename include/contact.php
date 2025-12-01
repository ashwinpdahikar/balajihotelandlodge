 <?php require_once __DIR__ . '/functions.php'; $hide_section_title = true; ?>
<style>
/* Responsive Map Styles */
.map_main {
    width: 100%;
    margin-top: 20px;
}

.map-responsive {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    height: 0;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.map-responsive iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100% !important;
    border: 0;
}

/* Responsive adjustments */
@media (max-width: 991px) {
    .map_main {
        margin-top: 30px;
    }
    
    .map-responsive {
        padding-bottom: 75%; /* 4:3 Aspect Ratio for tablets */
    }
}

@media (max-width: 767px) {
    .map-responsive {
        padding-bottom: 100%; /* Square for mobile */
        margin-bottom: 20px;
    }
}

@media (max-width: 480px) {
    .map-responsive {
        padding-bottom: 120%; /* Taller for small mobile */
    }
}
</style>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (!isset($hide_section_title) || !$hide_section_title): ?>
                <div class="titlepage">
                    <h2>Contact Us</h2>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form id="request" class="main_form">
                    <div class="row">
                        <div class="col-md-12 ">
                            <input class="contactus" placeholder="Name" type="type" name="Name">
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Email" type="type" name="Email">
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number">
                        </div>
                        <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message" type="type"
                                Message="Name">Message</textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="send_btn">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12571.103509757988!2d79.37235510190366!3d20.489353361907398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd34dcb15cd3cc1%3A0x3744c2711b092c13!2sShri%20balaji%20restaurant%20and%20lounge%20chimur!5e0!3m2!1sen!2sin!4v1764408865039!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
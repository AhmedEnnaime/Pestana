<!DOCTYPE html>
<html lang="en">
<?php require APPROOT . '/views/includes/client_head.php'; ?>

<body>

    <div class="" id="loader">
        <div class="glow">
            Pestana
        </div>
    </div>


    <div class="mobile__menu" id="menu__div">

        <span id="close__btn"></span>
        <div class="mobile__menu__items" id="mobile__items">

            <!-- <div class="profile__dp">

                </div>
                <p class="profile__name">Asynchronous</p>
                <div class="divider">

                </div> -->
            <div id="mobile__links">
                <a href="<?php echo URLROOT; ?>" class="m__link">Home</a>
                <a href="rooms.html" class="m__link">Rooms</a>
                <a href="<?php echo URLROOT; ?>/pages/facilities" class="m__link">Facilities</a>
                <?php if ($_SESSION['logged'] == true && $_SESSION['role'] == 0) { ?>

                    <a href="<?php echo URLROOT; ?>/admins/dashboard" class="m__link">Dashboard</a>

                <?php
                } ?>

                <?php if ($_SESSION['logged'] == true) { ?>
                    <a href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['id']; ?>" class="m__link active">Profile</a>
                <?php

                } ?>

                <a href="<?php echo URLROOT; ?>/pages/contact" class="m__link active">Contact Us</a>
                <?php if ($_SESSION['logged'] == true) { ?>

                    <a href="<?php echo URLROOT; ?>/users/logout" class="m__link active">Log out</a>

                <?php
                } else { ?>
                    <a href="<?php echo URLROOT; ?>/users/login" class="m__link active">Login</a>
                <?php

                } ?>

            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/includes/client_nav.php'; ?>

    <section id="hero">
        <div class="hero__contents">
            <p class="hero__text">
                Enjoy A Luxury
            </p>

            <p class="hero__text">
                Experience
            </p>

            <a href="#" id="hero__btn">
                Book now
            </a>

        </div>
    </section>

    <div class="container">
        <div class="services">
            <div class="service-head">
                <h2>Services</h2>
            </div>
            <div class="service-wrapper">
                <div class="box">
                    <div class="box-image">
                        <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/aeroplane.png" alt="">
                    </div>
                    <p>Airport Pickup</p>
                </div>
                <div class="box">
                    <div class="box-image">
                        <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/fork.png" alt="">
                        <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/spoon.png" alt="">
                        <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/knife.png" alt="">
                    </div>
                    <p>Complementary breakfast</p>
                </div>
                <div class="box">
                    <div class="box-image">
                        <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/cocktail.png" alt="">
                    </div>
                    <p>Cocktail party</p>
                </div>
                <div class="box">
                    <div class="box-image">
                        <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/eiffel-tower.png" alt="">
                    </div>
                    <p>City tour guide</p>
                </div>
            </div>
        </div>

        <div class="room-suites">
            <div class="room-suites-head">
                <h2>Rooms & Suites</h2>
            </div>
            <div class="room-suites-wrapper">
                <div class="suites scale-room-suite">
                    <a href="<?php echo URLROOT; ?>/pages/Suites?page=1">
                        <p>Suites</p>
                    </a>
                </div>
                <div class="room">
                    <div class="room-1 scale-room-suite">
                        <a href="<?php echo URLROOT; ?>/pages/DoubleRooms?page=1">
                            <p>Double rooms</p>
                        </a>
                    </div>
                    <div class="room-2 scale-room-suite">
                        <a href="<?php echo URLROOT; ?>/pages/SingleRooms?page=1">
                            <p>Single rooms</p>
                        </a>

                    </div>
                </div>
            </div>

        </div>

        <div class="upcoming-event">
            <div class="event-head">
                <h2>Upcoming Events</h2>
            </div>
            <div class="event-wrapper">
                <div class="golf-tour event">
                    <p>2020 John Bayega Golf Tournament</p>
                </div>
                <div class="party-event event">
                    <p>Party rave: White cocktail part</p>
                </div>
                <div class="event-conf event">
                    <p>Equal Justice conference 2020</p>
                </div>
            </div>
        </div>
        <div class="Testimonials">
            <div class="Testimonials-head">
                <h2>Testimonials</h2>
            </div>
            <div class="test">
                <div class="test-text">
                    <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/map-avatar2.png" class="test-img1" alt="">
                    <div class="test-word">
                        <p>
                            I really enjoyed my stay at the Pestana Hotel.
                            The services were really good and i enjoyed all the facilities available.
                            I think i would definitely want to stay at this hotel when i am back in Denmark.
                        </p><br>
                        <p><strong>Yosef Clark</strong></p>
                    </div>
                </div>
                <div class="test-map">
                    <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/map-avatar1.png" class="map-img map-img5" alt="">
                    <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/map-avatar3.png" class="map-img map-img2" alt="">
                    <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/map-avatar2.png" class="map-img map-img6" alt="">
                    <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/map-avatar4.png" class="map-img map-img3" alt="">
                    <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/map-avatar5.png" class="map-img map-img4" alt="">



                </div>
            </div>
        </div>

        <div class="partners-head">
            <h2>Our Partners</h2>
        </div>
        <div class="our-partners">

            <div class="part-img">
                <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/trivago.png" width="150px" alt="trivago">
            </div>
            <div class="part-img">
                <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/airbnb.png" width="150px" alt="airbnb">
            </div>
            <div class="part-img">
                <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/tripadvisor.png" width="150px" alt="tripadvisor">
            </div>
            <div class="part-img">
                <img src="<?php echo URLROOT; ?>/assets/images/client_img/home/bookingdotcom.png" width="150px" alt="bookingdotcom">
            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/includes/footer_client.php'; ?>

</body>

</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require APPROOT . '/views/includes/head_client.php'; ?>

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

    <?php require APPROOT . '/views/includes/nav_client.php'; ?>

    <main>




    </main>

    <?php require APPROOT . '/views/includes/footer_client.php'; ?>

</body>

</html>
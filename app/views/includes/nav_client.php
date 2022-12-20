<nav class="nav" id="nav__div">


    <div class="navbar other__pages" id="navbar__inner">

        <button type="button" name="button" class="btn__nemu" id="menu__btn">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <h1 class="logo__name"><a class="log-name" href="<?php echo URLROOT; ?>">Pestana</a></h1>
        <p class="slogan">Hotel~Resorts~Spas</p>

        <div class="nav__items" id="nav_list">
            <div class="nav__items__links">
                <a href="<?php echo URLROOT; ?>" class="link">Home</a>
                <a href="<?php echo URLROOT; ?>/pages/rooms?page=1" class="link">Rooms</a>
                <a href="<?php echo URLROOT; ?>/pages/facilities" class="link">Facilities</a>
                <?php if ($_SESSION['logged'] == true && $_SESSION['role'] == 0) { ?>

                    <a href="<?php echo URLROOT; ?>/admins/dashboard" class="link">Dashboard</a>

                <?php
                }  ?>

                <a href="<?php echo URLROOT; ?>/pages/contact" class="link">Contact Us</a>
                <?php if ($_SESSION['logged'] == true) { ?>
                    <a href="<?php echo URLROOT; ?>/users/logout" class="link">Log out</a>
                <?php
                } else { ?>
                    <a href="<?php echo URLROOT; ?>/users/login" class="link">Login</a>

                <?php
                } ?>

                <?php if ($_SESSION['logged'] == true) { ?>
                    <a href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['id']; ?>" class="link">Profile</a>

                <?php
                } ?>
            </div>

            <!-- <div class="profile">
      <div class="profile__dp">

      </div>
      <p class="profile__name">Asynchronous</p>
    </div> -->
        </div>

    </div>
</nav>
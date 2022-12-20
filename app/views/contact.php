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


    <div class="contact-us">
      <div>
        <h1>Connect With Us</h1>
        <p>
          Do you have any inquiries, suggestions, or compliants? Let us know how we can help serve you better.
        </p>
        <img src="<?php echo URLROOT; ?>/assets/images/client_img/contact/contact.svg" class="picture" alt="contact icon">
      </div>
    </div>
    <div class="contact-first-wrapper">
      <div class="contact-div">
        <div class="contact-form">
          <p id="info-title">Contact Information</p>
          <div class="contact-info">
            <div class="contact-info-content">
              <img src="<?php echo URLROOT; ?>/assets/images/client_img/contact/locationicon.svg" alt="">
              <p class="info"> 24 Hilton Av. Maitama, Abuja</p>
            </div>
            <div class="contact-info-content">
              <img src="<?php echo URLROOT; ?>/assets/images/client_img/contact/phoneicon.svg" alt="">
              <p class="info">Tel 1: +234 (0)9065233507 <br> Tel 2: +234 (0)8144620386</p>
            </div>
            <div class="contact-info-content">
              <img src="<?php echo URLROOT; ?>/assets/images/client_img/contact/Vector.png" alt="">
              <p class="info"> Help@parisimo.com </p>
            </div>

          </div>
          <div class="social-icons">
            <a href="#"><img src="<?php echo URLROOT; ?>/assets/images/client_img/contact/Facebook.svg"></a>
            <a href="#"><img src="<?php echo URLROOT; ?>/assets/images/client_img/contact/Twitter.svg"></a>
            <a href="#"><img src="<?php echo URLROOT; ?>/assets/images/client_img/contact/Instagram.svg"></a>
          </div>
        </div>
        <div class="sendmessage">
          <p class="send">Send us a message</p>
          <form class="form">
            <input class="name" type="text" placeholder="Name">
            <input class="email" type="email" placeholder="Email">
            <input class="message" type="text" placeholder="Message">
            <input class="submit" type="submit" value="Send">
          </form>
        </div>
      </div>
    </div>



    <div class="contact-fqa">
      <div>
        <h1>Frequently Asked Questions</h1>
        <div class="fqa">
          <p>What we offer? <i class="collapse-btn fas fa-chevron-down"></i></p>
          <div class="fqa-answer">
            <p class="collapse-p">
              We value our customers and as such, we provide the best services and
              facilities to make you enjoy the perfect luxury experience. Our services
              are top notch for the elite that you are.
            </p>
          </div>
        </div>
        <div class="fqa">
          <p>How it works? <i class="collapse-btn fas fa-chevron-down"></i></p>
          <div class="fqa-answer">
            <p class="collapse-p">
              You can check for the rooms and suites available in the Room & Suites section and
              also check the available facilities and events happening at hotel in Facilities and Events section respectively.
            </p>
          </div>
        </div>
        <div class="fqa">
          <p>What if I am not satisfied? <i class="collapse-btn fas fa-chevron-down"></i></p>
          <div class="fqa-answer">
            <p class="collapse-p">
              Please write a feedback message to us and we will make sure about your comfortable stay.
            </p>
          </div>
        </div>
        <div class="fqa">
          <p>What are our payment options? <i class="collapse-btn fas fa-chevron-down"></i></p>
          <div class="fqa-answer">
            <p class="collapse-p">
              Our payment options include prepaid payment or pay at hotel when you reach
              using debit card or credit card.
            </p>
          </div>
        </div>
        <div class="fqa">
          <p>How to cancel bookings? <i class="collapse-btn fas fa-chevron-down"></i></p>
          <div class="fqa-answer">
            <p class="collapse-p">
              You can simply login into your account, use manage bookings to cancel your bookings
              or you can cancel by calling on our support helpline by your registered mobile phones.
            </p>
          </div>
        </div>
      </div>
    </div>

  </main>

  <?php require APPROOT . '/views/includes/footer_client.php'; ?>

</body>

</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php require APPROOT . '/views/includes/head_client.php'; ?>

<body>

  <?php

  ?>
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
    <div id="container">
      <?php flash('reservation_success'); ?>
      <form action="<?php echo URLROOT; ?>/pages/filterRooms?page=1" method="POST" id="search_form">
        <div class="room-filter">
          <div class="search">
            <span>Filter Search</span>
          </div>

          <div class="room-default room-check-in">
            <h5>From</h5>
            <input type="date" class="check-in" name="debut_date" id="check-in">
          </div>
          <div class="room-default room-check-out">
            <h5>To</h5>
            <input type="date" class="check-out" name="final_date" id="check-out">
          </div>
          <div class="room-default room_type">
            <h5>rooms</h5>
            <select name="room_type" id="room-type">
              <option value="">Select room type</option>
              <option value="single">Single</option>
              <option value="double">Double</option>
              <option value="suite">Suite</option>
            </select>
          </div>
          <div class="room-default suite_type">
            <h5>Suite type</h5>
            <select name="suite_type" id="suite-type">
              <option value="">Select suite type</option>
              <option value="Standard">Standard suite rooms</option>
              <option value="Junior">Junior</option>
              <option value="Presidential">Presidential suite</option>
              <option value="Honeymoon">Honeymoon suites</option>
              <option value="Bridal">Bridal suites</option>
            </select>
          </div>
          <div class="room-default guest">
            <h5>Search</h5>

            <input value="Search" type="submit" name="search" id="guests">

          </div>
        </div>
      </form>


      <div class="gallery-container">
        <div class="gallery">
          <?php foreach ($data['rooms'] as $room) : ?>
            <div class="room">
              <img src="<?php echo URLROOT; ?>/assets/images/client_img//bed-bedroom-1.jpg" alt="">
              <div class="room-text-container">
                <div class="booking">
                  <p class="room__type"><?php echo $room->type; ?><?php if ($room->type == 'suite') {
                                                                    echo '/' . $room->suite_type;
                                                                  } ?></p>
                </div>

                <p class="room__price">$<?php echo $room->price; ?><small>/night</small></p>
                <form action="<?php echo URLROOT; ?>/rooms/book/<?php echo $room->id; ?>" method="GET">

                  <input type="submit" class="booking-btn" value="Book">
                </form>
                <?php
                $today = date('Y-m-d');
                ?>

              </div>
            </div>

          <?php endforeach; ?>
        </div>
      </div>
      <!-- End of gallery container -->
      <div class="pagination-container">
        <div class="pagination">


          <?php for ($i = 1; $i <= $data['page_number']; $i++) { ?>
            <?php if ($data['page'] != $i) { ?>
              <a href="?page=<?php echo $i; ?>"><button class="pagination-link"><?php echo $i; ?></button></a>

            <?php
            } else { ?>
              <a><button class="pglink-active pagination-link"><?php echo $i; ?></button></a>

            <?php
            } ?>

          <?php
          } ?>

        </div>
      </div>
      <!-- ##### pagination for rooms ends ################ -->
    </div>
  </main>

  <?php require APPROOT . '/views/includes/footer_client.php'; ?>

</body>

</html>
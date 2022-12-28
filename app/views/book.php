<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo SITENAME; ?></title>

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/book.css">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/nav.style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/footer.style.css">
</head>

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


    <div class="main">

        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img height="100%" width="100%" class="booking-img" src="<?php echo URLROOT; ?>/assets/images/client_img/bed-bedroom-1.jpg" alt="Booking Image">
                </div>
                <div class="booking-form">
                    <form action="<?php echo URLROOT; ?>/rooms/book/<?php echo $data['room']->id; ?>" id="booking-form" method="POST">
                        <?php $jsonObj = json_encode($data['reservation_info']); ?>
                        <h2>Book your room or suite!</h2>
                        <div class="form-group form-input">
                            <label for="deut_date">Debut date</label>
                            <input type="date" name="debut_date" class="booking-date-from date1" value="" required />

                        </div>
                        <div class="form-group form-input">
                            <label for="phone">Final date</label>
                            <input type="date" name="final_date" class="booking-date-to date1" id="final_date" value="" onkeydown="return false" required />

                        </div>

                        <?php if ($data['room']->type == 'suite') { ?>

                            <div class="form-radio">
                                <label class="label-radio"> Select how many people are with you</label>
                                <div class="radio-item-list">
                                    <span class="radio-item">
                                        <input type="radio" name="persons_num" class="people_num" value="3" id="number_people_3" />
                                        <label for="number_people_3">3</label>
                                    </span>
                                    <span class="radio-item">
                                        <input type="radio" name="persons_num" class="people_num" value="4" id="number_people_4" />
                                        <label for="number_people_4">4</label>
                                    </span>
                                    <span class="radio-item">
                                        <input type="radio" name="persons_num" class="people_num" value="5" id="number_people_5" />
                                        <label for="number_people_5">5</label>
                                    </span>
                                    <span class="radio-item">
                                        <input type="radio" name="persons_num" class="people_num" value="6" id="number_people_6" />
                                        <label for="number_people_6">6</label>
                                    </span>

                                </div>
                            </div>


                            <div class="guests guests1">
                                <div class="form-group form-input">
                                    <label for="phone">Name of guest 1</label>
                                    <input type="text" placeholder="Enter guest name" name="name" value="" />

                                </div>
                                <div style="margin-bottom: 50px;" class="form-group form-input">
                                    <label for="phone">Birthday of guest 1</label>
                                    <input type="date" name="birthday" value="" />

                                </div>
                            </div>

                            <div class="guests guests2">
                                <div class="form-group form-input">
                                    <label for="phone">Name of guest 2</label>
                                    <input type="text" placeholder="Enter guest name" name="name" value="" />

                                </div>
                                <div style="margin-bottom: 50px;" class="form-group form-input">
                                    <label for="phone">Birthday of guest 2</label>
                                    <input type="date" name="birthday" value="" />

                                </div>
                            </div>

                            <div class="guests guests3">
                                <div class="form-group form-input">
                                    <label for="phone">Name of guest 3</label>
                                    <input type="text" placeholder="Enter guest name" name="name" value="" />

                                </div>
                                <div style="margin-bottom: 50px;" class="form-group form-input">
                                    <label for="phone">Birthday of guest 3</label>
                                    <input type="date" name="birthday" value="" />

                                </div>
                            </div>

                            <div class="guests guests4">
                                <div class="form-group form-input">
                                    <label for="phone">Name of guest 4</label>
                                    <input type="text" placeholder="Enter guest name" name="name" value="" />

                                </div>
                                <div style="margin-bottom: 50px;" class="form-group form-input">
                                    <label for="phone">Birthday of guest 4</label>
                                    <input type="date" name="birthday" value="" />

                                </div>
                            </div>

                            <div class="guests guests5">
                                <div class="form-group form-input">
                                    <label for="phone">Name of guest 5</label>
                                    <input type="text" placeholder="Enter guest name" name="name" value="" />

                                </div>
                                <div style="margin-bottom: 50px;" class="form-group form-input">
                                    <label for="phone">Birthday of guest 5</label>
                                    <input type="date" name="birthday" value="" />

                                </div>
                            </div>

                            <div class="guests guests6">
                                <div class="form-group form-input">
                                    <label for="phone">Name of guest 6</label>
                                    <input type="text" placeholder="Enter guest name" name="name" value="" />

                                </div>
                                <div style="margin-bottom: 50px;" class="form-group form-input">
                                    <label for="phone">Birthday of guest 6</label>
                                    <input type="date" name="birthday" value="" />

                                </div>
                            </div>
                        <?php

                        } ?>

                        <div class="form-submit">
                            <input type="submit" value="Book now" class="submit" id="submit" name="book" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        let reservation0bj = '<?= $jsonObj ?>';
        let info = JSON.parse(reservation0bj);
        let arr = []
        console.log(info);
        if (Object.keys(info).length == 0) {
            console.log("success");
        } else {
            let check_in_date = new Date(info['debut_date']).toISOString().split('T')[0];
            let check_out_date = new Date(info['final_date']).toISOString().split('T')[0];
            let start = check_in_date.split("-")[2]
            let end = check_out_date.split("-")[2]
            console.log(start, end);

            for (let i = start; i <= end; i++) {
                arr.push(check_in_date.split("-")[0] + "-" + check_in_date.split("-")[1] + "-" + i)
            }
            console.log(arr);

            const picker = document.querySelectorAll('.date1');

            for (pick of picker) {
                pick.addEventListener('input', function(e) {
                    let x = this.value
                    if (arr.includes(x)) {
                        e.preventDefault();
                        this.value = '';
                        alert('Room is reserved from ' + check_in_date + " to " + check_out_date);
                    }
                });
            }

        }
    </script>
    <!-- JS -->
    <script src="<?php echo URLROOT; ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/book.js"></script>
    <?php require APPROOT . '/views/includes/footer_client.php'; ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Dinner Form 12 - Zack</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/vendor/font-awesome-4.7/css/font-awesome.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/book.css">
</head>

<body>

    <div class="main">

        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img class="booking-img" src="images/form-img.jpg" alt="Booking Image">
                </div>
                <div class="booking-form">
                    <form id="booking-form">
                        <h2>Booking place for your dinner!</h2>
                        <div class="form-group form-input">
                            <input type="text" name="name" id="name" value="" required />
                            <label for="name" class="form-label">Your name</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="number" name="phone" id="phone" value="" required />
                            <label for="phone" class="form-label">Your phone number</label>
                        </div>
                        <div class="form-group">
                            <div class="select-list">
                                <select name="time" id="time" required>
                                    <option value="">Time</option>
                                    <option value="6pm">6:00 PM</option>
                                    <option value="7pm">7:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select-list">
                                <select name="food" id="food" required>
                                    <option value="">Food</option>
                                    <option value="seasonalfish">Seasonal steamed fish</option>
                                    <option value="assortedmushrooms">Assorted mushrooms</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-radio">
                            <label class="label-radio"> Select Your Dining Space</label>
                            <div class="radio-item-list">
                                <span class="radio-item">
                                    <input type="radio" name="number_people" value="2" id="number_people_2" />
                                    <label for="number_people_2">2</label>
                                </span>
                                <span class="radio-item active">
                                    <input type="radio" name="number_people" value="4" id="number_people_4" checked="checked" />
                                    <label for="number_people_4">4</label>
                                </span>
                                <span class="radio-item">
                                    <input type="radio" name="number_people" value="6" id="number_people_6" />
                                    <label for="number_people_6">6</label>
                                </span>
                                <span class="radio-item">
                                    <input type="radio" name="number_people" value="8" id="number_people_8" />
                                    <label for="number_people_8">8</label>
                                </span>
                                <span class="radio-item">
                                    <input type="radio" name="number_people" value="10" id="number_people_10" />
                                    <label for="number_people_10">10</label>
                                </span>
                            </div>
                        </div>

                        <div class="form-submit">
                            <input type="submit" value="Book now" class="submit" id="submit" name="submit" />
                            <a href="#" class="vertify-booking">Verify your booking info from your phone</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <h4>&copy Made With <i class="fa fa-heart heart"></i> by <a href="https://zeel-navadiya.github.io/portfolio-zeel.github.io/" target="_blank">Zeel</a></h4>
    </footer>

    <!-- JS -->

    <script src="<?php echo URLROOT; ?>/assets/js/book.js"></script>
</body>

</html>

<!-- ===================================================================
  * Created By : Zeel Navadiya
  * Contact No : +91 9081256718
  # Visit Us Our Website :- https://zeel-navadiya.github.io/portfolio-zeel.github.io/
  ====================================================================== -->
<!doctype html>
<html lang="en">
<?php require APPROOT . '/views/includes/head.php'; ?>

<body>

    <!--Topbar -->
    <?php require APPROOT . '/views/includes/nav.php'; ?>
    <?php require APPROOT . '/views/includes/sidebar.php'; ?>

    <div class="sidebar-overlay"></div>


    <!--Content Start-->
    <div class="content-start transition ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>Employees</h1>
            </div>
            <?php flash('employee_message'); ?>
            <?php flash('employee_success'); ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employees available</h4>
                        <div class="form-group">
                            <!-- Button trigger for login form modal -->
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                Add employee
                            </button>

                            <!--login form Modal -->
                            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Add employee </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?php echo URLROOT; ?>/employees/add" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <label>Name: </label>
                                                <div class="form-group">
                                                    <input name="name" type="text" placeholder="Employee name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                                                    <span class="invalid-feedback"><?php echo $data['name_err'];  ?></span>
                                                </div>
                                                <label>Birthday: </label>
                                                <div class="form-group">
                                                    <input name="birthday" type="date" placeholder="Employee birthday" class="form-control <?php echo (!empty($data['birthday_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['birthday']; ?>">
                                                    <span class="invalid-feedback"><?php echo $data['birthday_err'];  ?></span>
                                                </div>
                                                <label>Cin: </label>
                                                <div class="form-group">
                                                    <input name="cin" type="text" placeholder="Employee cin" class="form-control <?php echo (!empty($data['cin_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['cin']; ?>">
                                                    <span class="invalid-feedback"><?php echo $data['cin_err'];  ?></span>
                                                </div>
                                                <label>Country: </label>
                                                <div class="form-group">
                                                    <select class="form-control form-control-xl <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>" placeholder="Employee country" value="<?php echo $data['country']; ?>" id="country" name="country">
                                                        <option>select country</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AX">Aland Islands</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia</option>
                                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BV">Bouvet Island</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="BN">Brunei Darussalam</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option>
                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo</option>
                                                        <option value="CD">Congo, Democratic Republic of the Congo</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Cote D'Ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">Curacao</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="TF">French Southern Territories</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HM">Heard Island and Mcdonald Islands</option>
                                                        <option value="VA">Holy See (Vatican City State)</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran, Islamic Republic of</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                                        <option value="KR">Korea, Republic of</option>
                                                        <option value="XK">Kosovo</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Lao People's Democratic Republic</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macao</option>
                                                        <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia, Federated States of</option>
                                                        <option value="MD">Moldova, Republic of</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="AN">Netherlands Antilles</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="MP">Northern Mariana Islands</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PS">Palestinian Territory, Occupied</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Reunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russian Federation</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="BL">Saint Barthelemy</option>
                                                        <option value="SH">Saint Helena</option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="MF">Saint Martin</option>
                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="WS">Samoa</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">Sao Tome and Principe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="CS">Serbia and Montenegro</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SX">Sint Maarten</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syrian Arab Republic</option>
                                                        <option value="TW">Taiwan, Province of China</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania, United Republic of</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TL">Timor-Leste</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks and Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US">United States</option>
                                                        <option value="UM">United States Minor Outlying Islands</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VE">Venezuela</option>
                                                        <option value="VN">Viet Nam</option>
                                                        <option value="VG">Virgin Islands, British</option>
                                                        <option value="VI">Virgin Islands, U.s.</option>
                                                        <option value="WF">Wallis and Futuna</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                    <span class="invalid-feedback"><?php echo $data['country_err'];  ?></span>

                                                </div>
                                                <label>Poste: </label>
                                                <div class="form-group">
                                                    <input name="poste" type="text" placeholder="Employee poste" class="form-control <?php echo (!empty($data['poste_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['poste']; ?>">
                                                    <span class="invalid-feedback"><?php echo $data['poste_err'];  ?></span>
                                                </div>
                                                <label>Image: </label>
                                                <div class="form-group">
                                                    <input name="img" type="file" placeholder="Employee image" class="form-control <?php echo (!empty($data['img_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['img']; ?>">
                                                    <span class="invalid-feedback"><?php echo $data['img_err'];  ?></span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Add</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Birthday</th>
                                        <th scope="col">Cin</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Poste</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['employees'] as $employee) : ?>
                                        <tr>
                                            <td scope="row">
                                                <img style="width: 70px; border-radius: 50px;" src="<?php echo URLROOT; ?>/assets/images/uploads/<?php echo $employee->img; ?>" alt="">

                                            </td>
                                            <td><?php echo $employee->name; ?></td>
                                            <td><?php echo $employee->birthday; ?></td>
                                            <td><?php echo $employee->cin; ?></td>
                                            <td><?php echo $employee->country; ?></td>
                                            <td><?php echo $employee->poste; ?></td>


                                            <!-- Button trigger for login form modal -->
                                            <td>
                                                <form action="" method="POST">
                                                    <button type="button" style="width: 75px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                                        Update
                                                    </button>
                                                </form>
                                            </td>



                                            <!--login form Modal -->
                                            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33">Update room </h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?php echo URLROOT; ?>/rooms/update/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <label>Num: </label>
                                                                <div class="form-group">
                                                                    <input name="num" type="number" placeholder="Room num" class="form-control <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['num']; ?>">
                                                                    <span class="invalid-feedback"><?php echo $data['num_err'];  ?></span>
                                                                </div>
                                                                <label>Capacity: </label>
                                                                <div class="form-group">
                                                                    <input name="capacity" type="number" placeholder="Capacity" class="form-control <?php echo (!empty($data['capacity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['capacity']; ?>">
                                                                    <span class="invalid-feedback"><?php echo $data['capacity_err'];  ?></span>
                                                                </div>
                                                                <label>Price: </label>
                                                                <div class="form-group">
                                                                    <input name="price" type="number" placeholder="Price" class="form-control <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
                                                                    <span class="invalid-feedback"><?php echo $data['price_err'];  ?></span>
                                                                </div>
                                                                <label>Type: </label>
                                                                <div class="form-group">
                                                                    <select class="form-control <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" name="type" id="room_type">
                                                                        <option value="">Select type</option>
                                                                        <option value="single">single</option>
                                                                        <option value="double">double</option>
                                                                        <option value="suite">suite</option>
                                                                    </select>
                                                                    <span class="invalid-feedback"><?php echo $data['type_err'];  ?></span>

                                                                </div>
                                                                <label class="suite_type">Suite type: </label>
                                                                <div class="form-group">
                                                                    <select class="form-control <?php echo (!empty($data['suite_type_err'])) ? 'is-invalid' : ''; ?> suite_type" name="suite_type" id="suite_type">
                                                                        <option value="">Select suite type</option>
                                                                        <option value="Standard suite rooms">Standard suite rooms</option>
                                                                        <option value="Junior">Junior</option>
                                                                        <option value="Presidential suite">Presidential suite</option>
                                                                        <option value="Honeymoon suites">Honeymoon suites</option>
                                                                        <option value="Bridal suites">Bridal suites</option>
                                                                    </select>
                                                                    <span class="invalid-feedback"><?php echo $data['suite_type_err'];  ?></span>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Update</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            </td>
                                            <td>
                                                <form action="<?php echo URLROOT; ?>/employees/delete/<?php echo $employee->id; ?>" method="POST">
                                                    <button type="submit" style="background-color: red;" class="btn btn-primary">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form and scrolling Components start -->
            <section id="form-and-scrolling-components">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">

                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!--End Start Modal-->


        </div><!-- End Container-->
    </div><!-- End Content-->


    <!-- Preloader -->
    <div class="loader">
        <div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Loader -->
    <div class="loader-overlay"></div>

    <?php require APPROOT . '/views/includes/footer.php'; ?>
</body>

</html>
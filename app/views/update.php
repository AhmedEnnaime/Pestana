<!doctype html>
<html lang="en">
<?php require APPROOT . '/views/includes/head.php'; ?>

<body>

    <?php require APPROOT . '/views/includes/nav.php'; ?>
    <?php require APPROOT . '/views/includes/sidebar.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- End Sidebar-->


    <div class="sidebar-overlay"></div>


    <!--Content Start-->
    <div class="content-start transition">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>Update room</h1>
            </div>
            <form action="<?php echo URLROOT; ?>/rooms/update/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>Num: </label>
                    <div class="form-group">
                        <input name="num" type="number" placeholder="Room num" class="form-control <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['num']; ?>">
                        <span class="invalid-feedback"><?php echo $data['num_err'];  ?></span>
                    </div>
                    <label>Price: </label>
                    <div class="form-group">
                        <input name="price" type="number" placeholder="Price" class="form-control <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
                        <span class="invalid-feedback"><?php echo $data['price_err'];  ?></span>
                    </div>
                    <label>Type: </label>
                    <div class="form-group">
                        <select class="form-control <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" name=" type" id="room_type">
                            <?php if ($data['type'] == 'single') { ?>
                                <option value="<?php echo $data['type']; ?>"><?php echo $data['type']; ?></option>
                                <option value="double">double</option>
                                <option value="suite">suite</option>
                            <?php

                            } else if ($data['type'] == 'double') { ?>
                                <option value="<?php echo $data['type']; ?>"><?php echo $data['type']; ?></option>
                                <option value="single">single</option>
                                <option value="suite">suite</option>

                            <?php

                            } else { ?>

                                <option value="<?php echo $data['type']; ?>"><?php echo $data['type']; ?></option>
                                <option value="single">single</option>
                                <option value="double">double</option>

                            <?php

                            } ?>

                        </select>
                        <span class="invalid-feedback"><?php echo $data['type_err'];  ?></span>

                    </div>
                    <?php if ($data['suite_type']) { ?>
                        <label style="display: block;" class="suite_type">Suite type: </label>
                        <div class="form-group">
                            <select style="display: block;" class="form-control <?php echo (!empty($data['suite_type_err'])) ? 'is-invalid' : ''; ?> suite_type" name="suite_type" id="suite_type">
                                <?php if ($data['suite_type'] == 'Standard') { ?>

                                    <option value="<?php echo $data['suite_type']; ?>"><?php echo $data['suite_type']; ?></option>
                                    <option value="Junior">Junior</option>
                                    <option value="Presidential">Presidential suite</option>
                                    <option value="Honeymoon">Honeymoon suites</option>
                                    <option value="Bridal">Bridal suites</option>

                                <?php

                                } else if ($data['suite_type'] == 'Junior') { ?>
                                    <option value="<?php echo $data['suite_type']; ?>"><?php echo $data['suite_type']; ?></option>
                                    <option value="Standard">Standard</option>
                                    <option value="Presidential">Presidential suite</option>
                                    <option value="Honeymoon">Honeymoon suites</option>
                                    <option value="Bridal">Bridal suites</option>

                                <?php

                                } else if ($data['suite_type'] == 'Presidential') { ?>
                                    <option value="<?php echo $data['suite_type']; ?>"><?php echo $data['suite_type']; ?></option>
                                    <option value="Standard">Standard</option>
                                    <option value="Junior">Junior</option>
                                    <option value="Honeymoon">Honeymoon suites</option>
                                    <option value="Bridal">Bridal suites</option>

                                <?php

                                } else if ($data['suite_type'] == 'Honeymoon') { ?>
                                    <option value="<?php echo $data['suite_type']; ?>"><?php echo $data['suite_type']; ?></option>
                                    <option value="Standard">Standard</option>
                                    <option value="Junior">Junior</option>
                                    <option value="Presidential">Presidential</option>
                                    <option value="Bridal">Bridal suites</option>

                                <?php

                                } else { ?>
                                    <option value="<?php echo $data['suite_type']; ?>"><?php echo $data['suite_type']; ?></option>
                                    <option value="Standard">Standard</option>
                                    <option value="Junior">Junior</option>
                                    <option value="Presidential">Presidential</option>
                                    <option value="Honeymoon">Honeymoon</option>


                                <?php

                                } ?>

                            </select>
                            <span class="invalid-feedback"><?php echo $data['suite_type_err'];  ?></span>

                        </div>

                    <?php

                    } ?>

                    <label>Capacity: </label>
                    <div class="form-group">
                        <input id="capacity" name="capacity" type="number" placeholder="Capacity" class="form-control <?php echo (!empty($data['capacity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['capacity']; ?>" readonly>
                        <span class="invalid-feedback"><?php echo $data['capacity_err'];  ?></span>
                    </div>
                    <label>Images: </label>
                    <div class="form-group">
                        <input name="media[]" type="file" placeholder="Images" class="form-control <?php echo (!empty($data['media_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['media']; ?>" multiple>
                        <span class="invalid-feedback"><?php echo $data['media_err'];  ?></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-1">
                    Update
                </button>
            </form>


        </div>
    </div>

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
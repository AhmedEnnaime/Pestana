<!doctype html>
<html lang="en">
<?php require APPROOT . '/views/includes/head.php'; ?>

<body>

    <?php require APPROOT . '/views/includes/nav.php'; ?>
    <?php require APPROOT . '/views/includes/sidebar.php'; ?>
    <!-- End Sidebar-->


    <div class="sidebar-overlay"></div>


    <!--Content Start-->
    <div class="content-start transition">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>Dashboard</h1>
                <p></p>
            </div>

            <div class="row">

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="fas fa-inbox icon-home bg-primary text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Revenue</p>
                                    <h5>$65</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="fas fa-clipboard-list icon-home bg-success text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Orders</p>
                                    <h5>3000</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="fas fa-chart-bar  icon-home bg-info text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Sales</p>
                                    <h5>5500</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="fas fa-id-card  icon-home bg-warning text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Employes</p>
                                    <h5>256</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div id="columnchart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <?php flash('user_message'); ?>
                        <div class="card-header">
                            <h4>Clients</h4>
                        </div>
                        <div class="card-body pb-4">
                            <?php foreach ($data['users'] as $user) : ?>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="<?php echo URLROOT; ?>/assets/images/uploads/<?php echo $user->img; ?>">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1"><?php echo $user->name; ?></h5>
                                        <h6 class="text-muted mb-0"><?php echo $user->country; ?></h6>
                                    </div>
                                    <div class="name ms-2">
                                        <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $user->id; ?>" method="POST">
                                            <button style="background-color: red;" type="submit" class="btn btn-primary"> <i style="font-size: 20px;" class='bx bx-trash icon'></i></button>
                                        </form>

                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Transaction</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Billing Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">#SK2548 </th>
                                            <td>Neal Matthews</td>
                                            <td>07 Oct, 2022</td>
                                            <td>$400</td>
                                            <td><span class="text-success">Paid</span></td>
                                            <td>Mastercard</td>
                                            <td><button class="btn btn-primary">View Details</button></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">#SK2548 </th>
                                            <td>Neal Matthews</td>
                                            <td>07 Oct, 2022</td>
                                            <td>$400</td>
                                            <td><span class="text-success">Paid</span></td>
                                            <td>Visa</td>
                                            <td><button class="btn btn-primary">View Details</button></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">#SK2548 </th>
                                            <td>Neal Matthews</td>
                                            <td>07 Oct, 2022</td>
                                            <td>$400</td>
                                            <td><span class="text-danger">Chargeback</span></td>
                                            <td>Paypal</td>
                                            <td><button class="btn btn-primary">View Details</button></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">#SK2548 </th>
                                            <td>Neal Matthews</td>
                                            <td>07 Oct, 2022</td>
                                            <td>$400</td>
                                            <td><span class="text-warning">Refund</span></td>
                                            <td>Visa</td>
                                            <td><button class="btn btn-primary">View Details</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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
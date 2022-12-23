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
                <h1>Dashboard</h1>
                <?php flash('update_success'); ?>
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
                                    <p>Earnings</p>
                                    <h5>$<?php echo $data['earnings']->earnings; ?></h5>
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
                                    <p>Reservation</p>
                                    <h5><?php echo $data['reservation']->total; ?></h5>
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
                                    <p>Clients</p>
                                    <h5><?php echo $data['clients']->total; ?></h5>
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
                                    <p>Employees</p>
                                    <h5><?php echo $data['employees']->total; ?></h5>
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
                            <div id="columnchart">
                                <div style="width: 500px;">
                                    <canvas id="myChart"></canvas>
                                </div>
                                <script>
                                    <?php
                                    foreach ($data['clientsCountry'] as $clientsStats) {
                                        $countr[] = $clientsStats->country;
                                        $clientsnum[] =  $clientsStats->count;
                                    }
                                    ?>
                                    const data = {
                                        labels: <?php echo json_encode($countr); ?>,
                                        datasets: [{
                                            label: 'My First Dataset',
                                            data: <?php echo json_encode($clientsnum); ?>,
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    };
                                    const config = {
                                        type: 'doughnut',
                                        data: data,
                                    };
                                    const myChart = new Chart(
                                        document.getElementById('myChart'),
                                        config
                                    );
                                </script>
                            </div>
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
                                    <div class="name ms-auto">
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
                        <?php flash('reservation_message'); ?>
                        <div class="card-header">
                            <h4>Reservations</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Client</th>
                                            <th scope="col">Room num</th>
                                            <th scope="col">Room type</th>
                                            <th scope="col">Entry date</th>
                                            <th scope="col">Leave date</th>
                                            <th scope="col">Reservation price</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($data['reservation_info'] as $reservation_info) : ?>
                                            <tr>
                                                <th scope="row"><?php echo $reservation_info->name; ?> </th>
                                                <td><?php echo $reservation_info->num; ?></td>
                                                <td><?php echo $reservation_info->type; ?></td>
                                                <td><?php echo $reservation_info->debut_date; ?></td>
                                                <td><?php echo $reservation_info->final_date; ?></td>
                                                <td>$<?php echo $reservation_info->total; ?></td>
                                                <td>
                                                    <form action="<?php echo URLROOT; ?>/rooms/deleteReservation/<?php echo $reservation_info->id; ?>" method="POST">
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
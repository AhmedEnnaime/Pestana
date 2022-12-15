<?php require APPROOT . '/views/includes/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<p>This is the TraversyMVC PHP framework. Please refer to the docs on how to use it</p>
<a href="<?php echo URLROOT; ?>/users/logout" class="nav-link "><span class="pcoded-micon"><i class="feather icon-log-out"></i></span><span class="pcoded-mtext">Logout</span></a>
<?php require APPROOT . '/views/includes/footer.php'; ?>
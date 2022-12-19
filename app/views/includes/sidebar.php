 <!--Sidebar-->
 <div class="sidebar transition overlay-scrollbars animate__animated  animate__slideInLeft">
     <div class="sidebar-content">
         <div id="sidebar">

             <!-- Logo -->
             <div class="logo">
                 <h2 class="mb-0"><img src="<?php echo URLROOT; ?>/assets/images/logo1.png"> <?php echo SITENAME; ?></h2>
             </div>

             <ul class="side-menu">
                 <li>
                     <a href="<?php echo URLROOT; ?>/admins/dashboard" class="active">
                         <i class='bx bxs-dashboard icon'></i> Dashboard
                     </a>
                 </li>
                 <li class="divider"></li>

                 <li>
                     <a href="<?php echo URLROOT; ?>/rooms/rooms">
                         <i class='bx bx-columns icon'></i>
                         Rooms
                     </a>
                 </li>
                 <li class="divider"></li>

                 <li>
                     <a href="<?php echo URLROOT; ?>/employees/add">
                         <i class='bx bxs-meh-blank icon'></i>
                         Employees
                     </a>
                 </li>
                 <li class="divider"></li>

                 <li>
                     <a href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['id']; ?>">
                         <i class='bx bxs-user icon'></i>
                         Profile
                     </a>
                 </li>
                 <li class="divider"></li>

                 <li>
                     <a href="<?php echo URLROOT; ?>/users/logout">
                         <i class='bx bxs-log-in-circle icon'></i>
                         Logout
                     </a>

                 </li>

             </ul>
         </div>

     </div>
 </div>
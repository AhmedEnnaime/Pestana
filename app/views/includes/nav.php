 <!--Topbar -->
 <div class="topbar transition">
     <div class="bars">
         <button type="button" class="btn transition" id="sidebar-toggle">
             <i class="fa fa-bars"></i>
         </button>
     </div>
     <div class="menu">
         <ul>
             <li class="nav-item dropdown">
                 <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="<?php echo URLROOT; ?>/assets/images/uploads/<?php echo $_SESSION['img']; ?>" alt="">
                 </a>
                 <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php if ($_SESSION['role'] == 1) { ?>
                         <a class="dropdown-item" href="<?php echo URLROOT; ?>"><i class="fa fa-home size-icon-1"></i> <span>Home</span></a>
                         <hr class="dropdown-divider">

                     <?php

                        } ?>
                     <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/profile/<?php echo $_SESSION['id']; ?>"><i class="fa fa-user size-icon-1"></i> <span>My Profile</span></a>
                     <hr class="dropdown-divider">
                     <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout"><i class="fa fa-sign-out-alt  size-icon-1"></i> <span>Log out</span></a>
                 </ul>
             </li>
         </ul>
     </div>
 </div>
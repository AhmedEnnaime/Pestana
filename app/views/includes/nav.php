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
                     <img src="<?php echo URLROOT; ?>/assets/images/avatar/avatar-1.png" alt="">
                 </a>
                 <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="my-profile.html"><i class="fa fa-user size-icon-1"></i> <span>My Profile</span></a>
                     <hr class="dropdown-divider">
                     <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout"><i class="fa fa-sign-out-alt  size-icon-1"></i> <span>Log out</span></a>
                 </ul>
             </li>
         </ul>
     </div>
 </div>
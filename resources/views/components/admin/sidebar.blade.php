 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item nav-profile">
             <a href="#" class="nav-link">
                 <div class="nav-profile-image">
                     <img src="assets/images/faces/face1.jpg" alt="profile">
                     <span class="login-status online"></span>
                     <!--change to offline or busy as needed-->
                 </div>
                 <div class="nav-profile-text d-flex flex-column">
                     <span class="font-weight-bold mb-2">David Grey. H</span>
                     <span class="text-secondary text-small">Project Manager</span>
                 </div>
                 <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="index.html">
                 <span class="menu-title">Dashboard</span>
                 <i class="mdi mdi-home menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('post.all') }}">
                 <span class="menu-title">Posts</span>
                 <i class="mdi mdi-contacts menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('category.all') }}">
                 <span class="menu-title">Category</span>
                 <i class="mdi mdi-contacts menu-icon"></i>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ route('admin.all') }}">
                 <span class="menu-title">Authors</span>
                 <i class="mdi mdi-contacts menu-icon"></i>
             </a>
         </li>
         
         
         
     </ul>
 </nav>
 <!-- partial -->
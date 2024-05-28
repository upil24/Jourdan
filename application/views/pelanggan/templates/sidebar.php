 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion " id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">

         <div class="sidebar-brand-text mx-3"><img src="<?= base_url('assets/'); ?>img/logo.jpg" width="200" height="55"></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">


     <div class="sidebar-heading">
         Dashboard
     </div>
     <li class="nav-item active">
         <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('pelanggan/dashboard'); ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider mt-3">

     <!-- Heading Master Data -->
     <div class="sidebar-heading">
         Menu Transaksi
     </div>

     <li class="nav-item active">

     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('pelanggan/riwayat'); ?>">
             <i class="fas fa-fw fa-user-injured"></i>
             <span>Riwayat Pembayaran</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('pelanggan/tagihan'); ?>">
             <i class="fa fa-fw fa-book"></i>
             <span>Tagihan</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider mt-3">



     <!-- Heading Profile -->
     <div class="sidebar-heading">
         Profile
     </div>

     <li class="nav-item active">

     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('pelanggan/MyProfile'); ?>">
             <i class="fa fa-fw fa-book"></i>
             <span>Profile</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider mt-3">


     <li class="nav-item">
         <a class="nav-link pt-2" href="<?= base_url('home/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
             <i class=" fas fa-fw fa-sign-out-alt"></i>
             <span>Logout </span></a>
     </li>



     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->
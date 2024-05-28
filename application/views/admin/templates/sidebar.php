 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">

         <div class="sidebar-brand-text mx-3"><img src="<?= base_url('assets/'); ?>img/logo.jpg" width="200" height="55"></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Looping Menu-->
     <div class="sidebar-heading">
         Dashboard
     </div>
     <li class="nav-item active">
         <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/dashboard'); ?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider mt-3">

     <!-- Heading Master Data -->
     <div class="sidebar-heading">
         Master Data
     </div>

     <li class="nav-item active">

     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/pelanggan'); ?>">
             <i class="fas fa-fw fa-user-injured"></i>
             <span>Data Pelanggan</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/tarif'); ?>">
             <i class="fa fa-fw fa-book"></i>
             <span>Data Tarif</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/user'); ?>">
             <i class="fas fa-fw fa-users"></i>
             <span>Data User</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/galeri'); ?>">
             <i class="fas fa-fw fa-images"></i>
             <span>Galeri</span></a>
     </li>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider mt-3">

     <!-- Heading Laporan -->
     <div class="sidebar-heading">
         Laporan
     </div>

     <li class="nav-item active">

     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/laporan'); ?>">
             <i class="far fa-fw fa-file-alt"></i>
             <span>Laporan</span></a>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider mt-3">

     <!-- Heading Transaksi -->
     <div class="sidebar-heading">
         Transaksi
     </div>

     <li class="nav-item active">
     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/Penggunaan'); ?>">
             <i class="fa fa-fw fa-book"></i>
             <span>Input Penggunaan</span></a>

     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/Tagihan'); ?>">
             <i class="fa fa-fw fa-book"></i>
             <span>Cek Tagihan</span></a>
     </li>

     </li>
     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/Pembayaran'); ?>">
             <i class="fas fa-fw fa-dollar-sign"></i>
             <span>Pembayaran</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider mt-3">

     <!-- Heading Profile -->
     <div class="sidebar-heading">
         Profile
     </div>

     <li class="nav-item active">

     <li class="nav-item">
         <a class="nav-link pb-0" href="<?= base_url('admin/MyProfile'); ?>">
             <i class="fa fa-fw fa-book"></i>
             <span>Profile</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider mt-3">


     <li class="nav-item">
         <a class="nav-link pt-2" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
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
<!--
        Fixed Navigation
        ==================================== -->
<header id="navigation" class="navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->
            <!-- logo -->
            <h1 class="navbar-brand">
                <a href="#body">
                    <img src="<?= base_url('assets/'); ?>img/logo.png" alt="" width="150px" height="50px">
                </a>
            </h1>
            <!-- /logo -->
        </div>
        <!-- main nav -->
        <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
            <ul id="nav" class="nav navbar-nav">
                <li class="current"><a href="#home">Beranda</a></li>
                <li><a href="#service">Pelayanan</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#profile">Tentang</a></li>
                <li><a href="#login">Login</a></li>
                <li><a href="#contact">Hubungi Kami</a></li>
            </ul>
        </nav>
        <!-- /main nav -->
    </div>
</header>
<!--
        End Fixed Navigation
        ==================================== -->
<!--
        Home Slider
        ==================================== -->
<section id="home">
    <div id="home-carousel" class="carousel slide" data-interval="false">
        <ol class="carousel-indicators">
            <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#home-carousel" data-slide-to="1"></li>
        </ol>
        <!--/.carousel-indicators-->
        <div class="carousel-inner">
            <div class="item active" style="background-image: url('assets/home/img/slider/1.jpg')">
                <div class="carousel-caption">
                    <div class="animated bounceInRight">
                        <h2>PT PLN (PERSERO)</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum mollitia suscipit vel ipsam esse, dolor aliquid eaque quia vitae excepturi sed modi beatae placeat velit delectus? Voluptate iusto nihil sed!</p>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url('assets/home/img/slider/2.jpg')">
                <div class="carousel-caption">
                    <div class="animated bounceInDown">
                        <h2>PT PLN (PERSERO)</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae dolore nobis facere possimus praesentium iusto consequuntur aliquam corrupti non impedit consectetur qui quibusdam harum at amet, aliquid odio assumenda nostrum..</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/.carousel-inner-->
        <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
            <a class="sl-prev hidden-xs" href="#home-carousel" data-slide="prev">
                <i class="fa fa-angle-left fa-3x"></i>
            </a>
            <a class="sl-next" href="#home-carousel" data-slide="next">
                <i class="fa fa-angle-right fa-3x"></i>
            </a>
        </nav>
    </div>
</section>
<!--
        End #home Slider
        ========================== -->
<!--
        #service
        ========================== -->
<section id="service">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInDown">
                    <h2>Pelayanan</h2>
                    <img src="<?= base_url('assets/home/img/produk/pelayanan.jpg')  ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--
        End #service
        ========================== -->

<!--    
        #gallery
        ========================== -->
<section id="gallery">
    <div class="section-title text-center wow fadeInDown ">
        <h2>gallery</h2>
    </div>
    <div id="projects" class="clearfix">
        <?php
        foreach ($foto as $a) { ?>
            <figure class="mix gallery-item">
                <img class="img-galeri" src="<?= base_url('assets/galeri/') . $a['foto']; ?>" alt="">
                <a href="<?= base_url('assets/galeri/') . $a['foto']; ?>" title="" rel="gallery" class="fancybox"><span class="plus"></span></a>
            </figure>
        <?php } ?>
    </div>
</section>
<!--End #gallery========================== -->

</div>

</section>


<!--
        #profile
        ========================== -->
<section id="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center wow fadeInUp">
                    <h2>Tentang</h2>
                    <img src="<?= base_url('assets/home/img/profile.jpg'); ?> " alt="About Us" class="img-responsive mx-auto" style="" width="720" height="150">
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, quisquam explicabo! Commodi error veniam officia natus suscipit blanditiis nihil placeat provident porro est. Sequi vel dolor, possimus dicta delectus odit!.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, ab beatae deleniti aut quo, ut dolores expedita obcaecati est asperiores deserunt eligendi consequatur maiores, inventore quam sapiente harum dolorum culpa?</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
        #login
        ========================== -->
<section id="login" class="section">
    <div class="container ">
        <div class="section-title text-center wow fadeInUp">
            <center>
                <h2 class="wow fadeInDown animated">Login Pelanggan</h2>
            </center>

        </div>
        <hr>

        <div class="row" id="login2">
            <div class="col-md-12   ">
                <?= $this->session->flashdata('pesan'); ?>
                <form method="POST" action="" id="wkwk-ngapain" action="<?= base_url('pelanggan/auth'); ?>">

                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" autocomplete="off" placeholder="Email" tabindex="1" required value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <div class="float-right">
                                <span id="showhide2" class="btn-block text-small">
                                    Show/Hide
                                </span>
                            </div>
                        </div>
                        <input id="password2" type="password" class="form-control" name="password" autocomplete="current-password" placeholder="Password" tabindex="1" required>
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

                    <script type="text/javascript">
                        //script show hide password
                        const show = document.getElementById('showhide2');
                        const passwordInput = document.getElementById('password2');
                        show.addEventListener('click', e => {
                            e.preventDefault();
                            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
                            passwordInput.focus();
                        });
                    </script>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="2">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!--
        End #login
        ========================== -->
<!--
        #contact
        ========================== -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="section-title text-center wow fadeInDown">
                <h2>Hubungi Kami</h2>
            </div>
            <div class="col-sm-12 my-5 col-md-6 col-lg-4">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <i class="fa fa-phone fa-5x mb-3" aria-hidden="true"></i>
                        <h4 class="text-uppercase mb-5">call us</h4>
                        <br>
                        <p>021 – 822122111</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 my-5 col-lg-4">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <i class="fa fa-map-marker fa-5x mb-3" aria-hidden="true"></i>
                        <h4 class="text-uppercase mb-5">location</h4>
                        <br>
                        <address>Jl.Caman Raya, Blok D1 No.16, Kota Bekasi 1111 </address>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 my-5 col-lg-4">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <i class="fa fa-globe fa-5x mb-3" aria-hidden="true"></i>
                        <h4 class="text-uppercase mb-5">email</h4>
                        <br>
                        <p>Bekasi@pln.go.id</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--
        End #contact
        ========================== -->
<!-- sidebar -->
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
             <a href="<?php echo site_url('dashboard') ?>" class="site_title"><i class="glyphicon glyphicon-bed"></i> <span>Extranet</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>
                    Admin
                </h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Navigation</h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo base_url('hotel') ?>"><i class="fa fa-asterisk"></i>Hotel</a></li>
                    <li><a href="<?php echo base_url('tipekamar') ?>"><i class="fa fa-asterisk"></i>Tipe Kamar</a></li>
                    <li><a href="<?php echo base_url('kamar') ?>"><i class="fa fa-asterisk"></i>Kamar</a></li>
                    <li><a href="<?php echo base_url('tamu') ?>"><i class="fa fa-asterisk"></i>Tamu</a></li> 
                    <li><a href="<?php echo base_url('checkin') ?>"><i class="fa fa-asterisk"></i>Checkin</a></li>
                    <li><a href="<?php echo base_url('inhouse') ?>"><i class="fa fa-asterisk"></i>Tamu Inhouse</a></li>
                    <li><a href="<?php echo base_url('penjualan') ?>"><i class="fa fa-asterisk"></i>laporan Penjualan</a></li>
                    <li><a href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-asterisk"></i>Logout</a></li>                        
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Sign Out" href="<?php echo site_url('authentication/signout') ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- /sidebar -->

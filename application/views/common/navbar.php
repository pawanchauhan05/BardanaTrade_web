<div class="container nav-bar">
    <div class="navbar navbar-default navbar-md" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-lg hidden-md" href="#">Menu</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url() ?>">Home</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services Form</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo PRODUCT_BUY_FORM_URL ?>">Buy Request Form</a></li>
                                <li><a href="<?php echo PRODUCT_SELL_FORM_URL ?>">Sell Request Form</a></li>
                                <li><a href="#">Tender Request Form</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services Quality</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Product & Service</a></li>
                                <li><a href="<?php echo BENEFITS_URL ?>">Benefits</a></li>
                                <li><a href="<?php echo QUALITY_URL ?>">Quality</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo BAGS_URL ?>">Bags</a></li>
                                <li><a href="<?php echo TWINE_URL ?>">Twine & Yarn</a></li>
                                <li><a href="<?php echo MACHINES_URL ?>">Machines</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="<?php echo ABOUT_URL ?>">About Us</a></li>
                <li><a href="<?php echo VISION_MISSION_URL ?>">Vision & Mission</a></li>
                <li><a href="<?php echo CONTACT_URL ?>">Contact Us</a></li>
                
            </ul>
        </div>
    </div>
</div>
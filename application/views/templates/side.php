

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="<?= site_url('assets/img/donationwp.jpg')?>">    
    
    <!--   
        
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" 
        Tip 2: you can also add an image using data-image tag
        
    -->
    
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Blood Donation
                </a>
            </div>
                       <?php $title = $this->uri->segment(1);?>
            <ul class="nav">
                <li class="<?php if (null == $this->uri->segment(2)){ $title = 'Dashboard'; echo 'active';}?>">
                    <a href="<?php echo site_url('home'); ?>">
                        <i class="pe-7s-graph"></i> 
                        <p>Dashboard</p>
                    </a>            
                </li>
                <li class="<?php if ($this->uri->segment(2) == 'donors'){ $title = $this->uri->segment(2); echo 'active';}?>">
                    <a href="<?php echo site_url('home/donors'); ?>">
                        <i class="pe-7s-users"></i> 
                        <p>Donors</p>
                    </a>
                </li> 
            </ul> 
        </div>
    </div>



    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?= ucfirst($title)?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    

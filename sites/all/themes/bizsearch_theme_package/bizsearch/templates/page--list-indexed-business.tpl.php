<?php if (theme_get_setting('scrolltop_display')): ?>
<div id="toTop"><span class="glyphicon glyphicon-chevron-up"></span></div>
<?php endif; ?>

<!-- header -->
<header id="header" role="banner" class="clearfix">
    <div class="container">

        <!-- #header-inside -->
        <div id="header-inside" class="clearfix">
            <div class="row">
                <div class="col-md-3 clearfix">

                  <?php if ($logo):?>
                  <div id="logo">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /> </a>
                  </div>
                  <?php endif; ?>

                  <?php if ($site_name):?>
                  <div id="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
                  </div>
                  <?php endif; ?>
                
                  <?php if ($site_slogan):?>
                  <div id="site-slogan">
                  <?php print $site_slogan; ?>
                  </div>
                  <?php endif; ?>
                  
                </div>
                  
                <div class="col-md-9">
                    <!-- #header -->
				    <?php if ($page['header']) :?>
                    <div id="header-region" class="clearfix">
                       <?php print render($page['header']); ?>
                    </div>
                    <?php endif; ?>
                    <!-- EOF:#header -->
                    
                    <!-- Main Menu -->
                    <div id="main-menu">
                      <div class="navbar">
                        <div id="navbar-mainmenu-collapse">
                          <nav id="main-navigation" class="">
                            <?php if ($page['main_navigation']) :?>
                              <?php print drupal_render($page['main_navigation']); ?>
                            <?php else : ?>
                              <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('main-menu', 'menu'), ), 'heading' => array('text' => t('Main menu'), 'level' => 'h2', 'class' => array('element-invisible'), ), )); ?>
                            <?php endif; ?>
                          </nav>
                        </div>
                      </div>
                    </div>
                    <!-- End Menu -->
                </div>
                
            </div>
        </div>
        <!-- EOF: #header-inside -->

    </div>
</header>
<!-- EOF: #header --> 

<!-- #Search -->
<?php if ($page['search']) :?>        
<div id="search-wrapper" class="clearfix">
  <div class="container">
    <div class="row"><div class="col-md-12">
      <div id="search-region" class="clearfix">
          <div id="navbar-search-collapse">
              <?php print render($page['search']); ?>
          </div>
      </div>
    </div></div>
  </div>
</div>
<?php endif; ?>
<!-- #Search -->


<!-- #Full width -->
<?php if ($page['full_width']):?>
<div id="full-width-wrapper" class="full-width-wrapper clearfix">
        <?php print render($page['full_width']); ?>
</div>
<?php endif; ?>
<!-- EOF: #Full width -->


<!-- #page -->
<div id="page" class="clearfix">

    <?php if ($page['content_top_first']):?>
    <div id="content-top-first-wrapper" class="clearfix">
    	<div class="container">
        	<div class="row">
                <!-- EOF:#content-top-first-wrapper -->
                <section id="content-top-first" class="col-md-12 content-top-first clearfix">
                    <?php print render($page['content_top_first']); ?>
                </section>
                <!-- EOF:#content-top-first-wrapper -->
    		</div>
    	</div>
    </div>
	<?php endif; ?>

    <?php if ($page['content_top_second']):?>
    <div id="content-top-second-wrapper" class="clearfix">
    	<div class="container">
        	<div class="row">
                <!-- EOF:#content-top-second-wrapper -->
                <section id="content-top-second" class="col-md-12 content-top-second clearfix">
                    <?php print render($page['content_top_second']); ?>
                </section>
                <!-- EOF:#content-top-second-wrapper -->
    		</div>
    	</div>
    </div>
	<?php endif; ?>

    <?php if ($page['content_top_third']):?>
    <div id="content-top-third-wrapper" class="clearfix">
    	<div class="container">
        	<div class="row">
                <!-- EOF:#content-top-third-wrapper -->
                <section id="content-top-third" class="col-md-12 content-top-third clearfix">
                    <?php print render($page['content_top_third']); ?>
                </section>
                <!-- EOF:#content-top-third-wrapper -->
    		</div>
    	</div>
    </div>
	<?php endif; ?>
    
    <!-- #main-content -->
    <div id="main-content-search-page">
        <div class="container-search-page">
        
            <!-- #messages-console -->
            <?php if ($messages):?>
            <div id="messages-console" class="clearfix">
                <div class="row">
                    <div class="col-md-12">
                    <?php print $messages; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!-- EOF: #messages-console -->


                <section class="col-md-12">

                    <!-- #main -->		    
                    <div id="main" class="clearfix">
                    
                        <?php if ($breadcrumb && theme_get_setting('breadcrumb_display')):?> 
                        <!-- #breadcrumb -->
                        <div id="breadcrumb" class="clearfix">
                            <!-- #breadcrumb-inside -->
                            <div id="breadcrumb-inside" class="clearfix">
                            <?php print $breadcrumb; ?>
                            </div>
                            <!-- EOF: #breadcrumb-inside -->
                        </div>
                        <!-- EOF: #breadcrumb -->
                        <?php endif; ?>

                        <!-- EOF:#content-wrapper -->
                    	
                        <div id="content-wrapper">
                            <?php print render($title_prefix); ?>
                            <?php if ($title):?>
                            <h1 class="page-title"><?php print $title; ?></h1>
                            <?php endif; ?>
                            <?php print render($title_suffix); ?>
                            <?php print render($page['help']); ?>
                      
                            <!-- #tabs -->
                            <?php if ($tabs):?>
                                <div class="tabs">
                                <?php print render($tabs); ?>
                                </div>
                            <?php endif; ?>
                            <!-- EOF: #tabs -->

                            <!-- #action links -->
                            <?php if ($action_links):?>
                                <ul class="action-links">
                                <?php print render($action_links); ?>
                                </ul>
                            <?php endif; ?>
                            <!-- EOF: #action links -->

                            <?php print render($page['content']); ?>

                        </div>
                        
                        <!-- EOF:#content-wrapper -->

                        
                    </div>
                    <!-- EOF:#main -->

                </section>
        
        </div>
    </div>
    <!-- EOF:#main-content -->
    


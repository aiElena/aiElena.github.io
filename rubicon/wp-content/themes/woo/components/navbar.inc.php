<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

        <!-- Brand -->
        <!--<a class="navbar-brand pt-0 waves-effect" href="#">-->
        <div class="col-lg-3 col-12">
            <div class="site-branding d-flex">
                <?php
                the_custom_logo();
                if (is_front_page() && is_home()) :
                    ?>
        <!--				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>-->
                    <?php
                else :
                    ?>
                    <p class="site-title w-50"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
                endif;
                $woo_description = get_bloginfo('description', 'display');
                if ($woo_description || is_customize_preview()) :
                    ?>
                    <p class="site-description w-50"><?php echo $woo_description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </div>
        <!-- .site-branding -->
        <div class="col-lg-9 col-12 right-side-nav">

   

            <div class="row">
	<div class="search-id-form">
    	<input type="text" value="" placeholder="Код объекта" name="search-by-number" id="search-by-number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
    	<input type="button" id="searchsubmit" value="Поиск" />
	</div> 
                <?php
                wp_nav_menu([
                    'menu' => 'top',
                    'theme_location' => 'menu-1',
                    'container' => 'div',
                    'container_id' => 'bs4navbar',
                    'container_class' => 'collapse navbar-collapse',
                    'menu_id' => false,
                    'menu_class' => 'navbar-nav ml-auto',
                    'depth' => 2,
                    'fallback_cb' => 'bs4navwalker::fallback',
                    'walker' => new bs4navwalker()
                ]);
                ?>
                
            </div>
            <div class="row">
                <?php do_action('form_search'); ?>
            </div>
        </div>


</nav>

<!-- Navbar -->
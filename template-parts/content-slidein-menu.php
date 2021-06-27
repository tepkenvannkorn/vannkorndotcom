<div class="slidein-menu-backdrop">
    <!-- Draw user attention to the slidein menu -->
</div>

<div class="slidein-menu">

    <div class="site-branding">
        <?php
        the_custom_logo();

        echo '<div class="brand-wrapper">';
        
            if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
            <?php else : ?>
                <p class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </p>
            <?php endif;
            
            $vannkorn_description = get_bloginfo( 'description', 'display' );

            if ( $vannkorn_description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $vannkorn_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
            <?php endif; ?>

        </div>

    </div><!-- .site-branding -->

    <ul class="nav slidein-nav">
        <?php echo vannkorn_menu('primary-menu'); ?>
    </ul>

    <a href="#" class="close-button">Close</a>

</div>
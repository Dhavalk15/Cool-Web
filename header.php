<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php
    if ( ! function_exists( 'wp_body_open' ) ) {
      function wp_body_open() {
        do_action( 'wp_body_open' );
      }
    }
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cool-web' ); ?></a>
    <header class="cw_header">
      <div class="container">
        <div id="branding">     
          <nav class="navbar navbar-expand-lg navbar-dark">
            <?php if (has_custom_logo()) :
                the_custom_logo();
            else :  ?>
              <h1>
                <span class="highlight">
                  <a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('title'); ?></a>
                </span>
              </h1>
              <?php endif; ?>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <?php
                  wp_nav_menu( 
                      array(
                      'theme_location' => 'primary',
                      'container' => false,
                      'menu_class' => 'navbar-nav mr-auto',
                      'walker' => new CoolWeb_Walker_Nav_Primary()
                    ) 
                  );
                  ?>
                </div>
          </nav>
          <?php else : ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <?php wp_nav_menu(array(
                'container' => false,
                'menu_class' => 'navbar-nav mr-auto',
                'walker' => new CoolWeb_Walker_Nav_Primary()
              ) );
              ?>
            </div>
        </nav>
        <?php endif; ?>
      </div>
    </div>
  </header>
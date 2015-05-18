<?php 

// Barra superior ADM
add_filter('show_admin_bar', '__return_false');

//CSS
function wpt_register_css() {
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

//JS
add_filter('show_admin_bar', '__return_false');
function wpt_register_js() {
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
}
add_action( 'init', 'wpt_register_js' );

//Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

// Adiciona menu no adm
add_action( 'after_setup_theme', 'wpt_setup' );
if ( ! function_exists( 'wpt_setup' ) ):
    function wpt_setup() {  
        register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
    } endif;

//Navigation Menus
    register_nav_menus(array(
        'primary' => __( 'Primary Menu' ),
        'mobile' => __( 'Mobile Menu' ),
        ));

//Change excerpt text
    function custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

    function new_excerpt_more( $more ) {
        return ' ... <br><a class="btn btn-primary" href="'. get_permalink( get_the_ID() ) . '">' . __('Veja mais', ' ') . '</a>';
    }
    add_filter( 'excerpt_more', 'new_excerpt_more' );       

// Catch the second image
    function catch_that_image() {
        global $post, $posts;
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches[1][0];
        
        if(empty($first_img)) {
          $first_img = "/path/to/default.png";
      }
      return $first_img;
  }

// Logo Admin
  function my_login_logo() { ?>
  <style type="text/css">
    .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo_vcl.png);
        padding-bottom: 120px;
        background-size: 300px auto;
        width: 320px;
        height: 60px;
    }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Link Logo
function meu_wp_login_url() {
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'meu_wp_login_url');

// Logo Title
function meu_wp_login_title() {
    return get_bloginfo('name');
}
add_filter('login_headertitle', 'meu_wp_login_title');
?>
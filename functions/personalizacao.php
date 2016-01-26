<?php 
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

// Texto admin rodape
function remove_footer_admin () {
    echo "Feito com o <3 por Mundo S.A";
}
add_filter('admin_footer_text', 'remove_footer_admin');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta name="description" content="VCL Serviços em Obras">
	<meta name="keywords" content="Serviços, Obras, Área de Automação, Instalação e Manutenção Elétrica, Execucao e Gerenciamento de Projetos Quantitativo de Material">
	<meta name="robots" content="index, follow">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
	<link rel="icon" href="<?php bloginfo('stylesheet_directory');?>/img/favicon.ico">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<!-- Não abrir link no menu -->
	<script type="text/javascript">jQuery(function($) {$("li#obras").children("a").attr('href', "#");});</script>
	<!-- Rolagem ao clicar no menu -->
	<script type="text/javascript">
		$(document).ready(function() {
			function filterPath(string) {
				return string
				.replace(/^\//,'')
				.replace(/(index|default).[a-zA-Z]{3,4}$/,'')
				.replace(/\/$/,'');
			}
			$('a[href*=#]').each(function() {
				if ( filterPath(location.pathname) == filterPath(this.pathname)
					&& location.hostname == this.hostname
					&& this.hash.replace(/#/,'') ) {
					var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
				var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
				if ($target) {
					var targetOffset = $target.offset().top;
					$(this).click(function() {
						$('html, body').animate({scrollTop: targetOffset}, 1000);
						return false;
					});
				}
			}
		});
		});
		// ]]></script>
		<?php wp_head(); ?>
	</head>
	<body>
	<?php include_once("analyticstracking.php") ?>
		<header>
			<nav class = "nav navbar-default">
				<div id = "navigation" class="container">
					<a href = "<?php echo esc_url( home_url( '/' ) ); ?>" title = '<?php bloginfo( 'name' ); ?>' rel="home">
						<img id="logo" alt="Logo VCL Serviços" src = "<?php bloginfo('stylesheet_directory');?>/img/logo_vcl.png" />
					</a>
					<!-- Brand and toggle get grouped for better mobile display --> 
					<div class = "navbar-header"> 
						<button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = ".navbar-ex-collapse"> 
							<span class = "sr-only">Toggle navigation</span> 
							<span class = "icon-bar"></span> 
							<span class = "icon-bar"></span> 
							<span class = "icon-bar"></span> 
						</button> 
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling --> 
					<div class = "collapse navbar-collapse navbar-right navbar-ex-collapse">
						<?php /* Primary navigation */
						wp_nav_menu( array(
							'menu' => 'top_menu',
							'depth' => 2,
							'container' => false,
							'menu_class' => 'nav navbar-nav',
				  //Process nav menu using our custom nav walker
							'walker' => new wp_bootstrap_navwalker())
						);
						?>
					</div>
				</div>
			</nav>
		</header>
<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <?php wp_head(); ?>
    <!-- Não abrir link no menu -->
    <script type="text/javascript">jQuery(function($) {$("li#obras").children("a").attr('href', "#");});</script>
    <!-- Rolagem ao clicar no menu -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
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
</head>

<body>
	<header>
		<div class = "container">
			<a href = "<?php echo esc_url( home_url( '/' ) ); ?>" title = '<?php bloginfo( 'name' ); ?>' rel="home">
				<img id="logo" alt="Logo VCL Serviços" src = "<?php bloginfo('stylesheet_directory');?>/img/logo_vcl.png" />
			</a>
			<div id="navigation">
				<ul>
					<li class="menu"><a href="<?php bloginfo('name'); ?>#atuacao">ATUAÇÃO</a></li>
					<li class="menu"><a href="<?php bloginfo('name'); ?>#servicos">SERVIÇOS</a></li>
					<li><a href="#obras">OBRAS</a>
					<ul>
						<li><?php wp_list_categories('hide_empty=0&exclude=1&title_li=&depth=2'); ?></li>
					</ul>
					</li>
					<li class="menu"><a href="#contato">CONTATO</a></li>
				</ul>
			</div>
		</div>
	</header>

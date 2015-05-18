<?php get_header(); ?>
<div class="banner_obras_realizadas">    
	<div class="container">
		<p>OBRAS </p>
		<p id="banner_box_text" >REALIZADAS</p>
	</div> 
</div>
<div>
	<?php if(have_posts()) :while (have_posts()) : the_post(); ?>

		<div class="post">
			<div class="arrow_left"></div>
			<div class="thumb" style="background: url(<?php echo catch_that_image() ?>) no-repeat center center; background-size: cover"></div>
			<div class="post-content">
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-text">
					<?php the_excerpt(); ?>
				</div>   
			</div>
		</div>     
	<?php endwhile;

	else :
		echo '<p> Nenhum artigo encontrado </p>';

	endif; ?>
</div>

<?php get_footer(); ?>
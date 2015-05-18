<?php get_header(); ?>

<div class="container">
    <div id="single_box">
        <?php if(have_posts()) :while (have_posts()) : the_post(); ?>
            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div >
               <?php the_content(); ?>
           </div>
       <?php endwhile;

       else :
        echo '<p> Nenhum artigo encontrado </p>';
    endif; ?>
</div>
</div>

<?php get_footer(); ?>
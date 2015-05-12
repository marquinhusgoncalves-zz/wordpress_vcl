<?php get_header(); ?>
    <div class="banner_obras_realizadas">    
        <div class="banner_top_text">
            <div class="container" style="padding-top: 200px">
                <p>OBRAS EM REALIZADAS</p>
            </div>  
        </div>
    </div>
    <div class="container" style="margin-bottom: 20px;">
        <?php if(have_posts()) :while (have_posts()) : the_post(); ?>

            <div class="post">
                <div class="arrow_left"></div>
                <div class="thumb" style="background: url(<?php echo catch_that_image() ?>) no-repeat center center; background-size: cover"></div>
                <div class="post-content">
                    <h2 class="post-title" style="padding: 15px"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
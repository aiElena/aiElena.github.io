<?php 
/*
    * Template name: Blog
    * Template post type: post, page
*/
?>
<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="blog-block txt col-12 col-sm-12 col-md-12 col-lg-12">
            

 
            <?php	query_posts('cat=222'); 
            while (have_posts()) : the_post();?>
            
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            
            <div class="thumbnail blog-rubicon-image col-12 col-sm-12 col-md-12 col-lg-3"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a></div>
            <?php the_content('Читать полностью &raquo;');
            
            endwhile;
            wp_reset_query();
            ?>
 

		</div>
	</div>
</div>
<?php
get_sidebar();
get_footer();
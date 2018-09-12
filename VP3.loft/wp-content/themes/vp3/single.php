<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="content">
        <h1 class="title-page"><?php the_title(); ?></h1>
        <img src="<?php echo get_field('header_image')['sizes']['medium'];?>" alt="Image" class="alignleft">
        <div class="single-content"><?php the_content(); ?></div>
        <img src="<?php echo get_field('bottom_image')['sizes']['medium'];?>" alt="Image" class="alignright">
        <?php endwhile; else:?>
        <p><?php _e(" Ничего  не найдено") ?></p>
        <?php endif; ?>


        <div class="page-navigation">
            <div class="page-navigation-wrap"><a href="<?php previous_posts_link();?>" class="page-navigation__prev-page"><i
                            class="icon icon-angle-double-left"></i>Предыдущая статья</a></div>
            <div class="page-navigation-wrap"><a href="<?php next_posts_link(); ?>" class="page-navigation__next-page">Сдедующая статья<i
                            class="icon icon-angle-double-right"></i></a></div>
        </div>
    </div>


<?php get_footer(); ?>

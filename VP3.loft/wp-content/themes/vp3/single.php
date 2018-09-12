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
            <div class="page-navigation-wrap">
                <?php previous_post_link('%link', '<< Предыдущая запись');?>
            </div>
            <div class="page-navigation-wrap">
                <?php next_post_link('%link', 'Следующая запись >>');?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>

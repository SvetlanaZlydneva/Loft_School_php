<?php get_header();?>
<div class="content">
    <div class="posts-list">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <div class="post-wrap">
                <div class="post-thumbnail">
                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="Image поста" class="post-thumbnail__image">
                </div>
                <div class="post-content">
                    <div class="post-content__post-info">
                        <div class="post-date"><?php the_date();?></div>
                    </div>
                    <div class="post-content__post-text">
                        <div class="post-title">
                            <?php the_title();?>
                        </div>
                        <div>
                            <?php the_excerpt();?>
                        </div>
                    </div>
                    <div class="post-content__post-control">
                        <a href="<?php the_permalink();?>" class="btn-read-post">Читать далее >></a>
                    </div>
                </div>
            </div>
        <?php endwhile; else:?>
            <p><?php _e(" Ничего  не найдено");?></p>
        <?php endif;?>
    </div>
</div>
<?php get_footer();?>

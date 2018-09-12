<?php get_header();?>
    <div class="sidebar">
        <div class="sidebar__sidebar-item">
            <div class=""><?php get_calendar();?></div><br>
            <div class=""><?php wp_list_categories();?></div><br>
            <div class="sidebar-item__title">Теги</div>
            <div class="sidebar-item__content">
                <ul class="tags-list">
                    <?php echo wp_tag_cloud();?>
                </ul>
            </div>

        </div>
    </div>

    <div class="content">
        <?php
        $posts =query_posts([
            'post_type'=>['post','akcii'],
            'paged'=> get_query_var('paged')
        ]);?>
        <?php wp_reset_query();?>
        <h1 class="title-page">Последние новости и акции из мира туризма</h1>
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
                            <div><?php echo get_post_meta(get_the_ID(), 'o_akcii', true); ?></div>
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
        <div class="pagenavi-post-wrap">
            <?php the_posts_pagination();?>
        </div>
    </div>
<?php get_footer();?>
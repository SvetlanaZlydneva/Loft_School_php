<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();?>

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
                            <?php get_category_link(get_the_ID());?>
                        </div>
                        <div class="post-content__post-control">
                            <a href="<?php the_permalink();?>" class="btn-read-post">Читать далее >></a>
                        </div>
                    </div>
                </div>
				<?php get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>


		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

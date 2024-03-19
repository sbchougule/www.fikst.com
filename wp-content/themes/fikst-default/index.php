<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<?php if (get_field('global_blog_page_content', 'option')): ?>
			<div class="blog-page-content pt-6"><?php echo get_field('global_blog_page_content', 'option'); ?></div>
		<?php endif ?>
		<?php 
		if (get_field('pi_page_intro_type', get_option( 'page_for_posts' )) == 'inlinetitle'): ?>
			<h1>Blog</h1>
		<?php endif ?>

		<?php $global_blog_page_style = get_field('global_blog_page_style', 'option');
	?>
	<?php if ($global_blog_page_style == "footer_1"): ?>
		<div class="blog-list-layout-1 row">
			
			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
			
			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="single-blog-post">
							<h1 class="post-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
							<div class="sbp-wrap <?php if (has_post_thumbnail()): ?>single-blog-post-full <?php endif ?>">
								<div class="blog-excerpt">
									<?php the_excerpt(); ?>
								</div>
								<?php if (has_post_thumbnail()): ?>
									<div class="blog-feature-img">
										<a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('post-thumb'); ?>" alt="<?php the_title() ?>" title="<?php the_title() ?>"></a>
									</div>
								<?php endif ?>
							</div>
							<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark" class="sbp-link">See More</a>
							<!-- <div class="post-meta">
								<time class="post-date" datetime="<?php echo get_the_date('F j, Y'); ?>" itemprop="datePublished"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date('m/d/Y'); ?></time>
								<a href="<?php the_permalink() ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Read More</a>
							</div> -->
							<?php //get_template_part('parts/shared/flexible-content'); ?>
							<?php 
							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							/*get_template_part( 'loop-templates/content', get_post_format() );*/
							?>
						</div>
					<?php endwhile; ?>
						
				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php rpm_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

       <?php elseif ($global_blog_page_style == "footer_2") : ?>
		<div class="blog-list-layout-2 row">
			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				$post_type = get_sub_field('post_type') ? get_sub_field('post_type') : 'post';
				$posts_per_page = get_sub_field('posts_per_page') ? get_sub_field('posts_per_page') : 2; 
				?>
				<?php 
				$args = array( 
					'post_type'   => 'post',
					'post_status' => 'publish',
					'posts_per_page' => 1
				);

				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) : 
				?>

                 <section class="latest-post-wrapper">
                 	<div class="lpw-post-img">
                 		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
                 	</div>
                 	<div class="lpw-post-content">
                 	<p class="lpw-post-categories"><?php the_category(', '); ?></p>
                    <h2 class="lpw-post-title" itemprop="headline"><?php the_title(); ?></h2>
                    <p class="lpw-date-wrap">On <time class="post-date" datetime="<?php echo get_the_date('F j, Y'); ?>" itemprop="datePublished"><?php echo get_the_date('m/d/Y'); ?></time> | By <?php the_author(); ?></p>
                    <div class="lpw-excerpt"><?php the_excerpt(); ?></div>
                    <a class="btn lpw-btn" href="<?php the_permalink() ?>">Read More</a>
                </div>
                 </section>
                <?php wp_reset_postdata(); ?>
  
<?php 
				$args = array( 
					'post_type'   => 'post',
					'post_status' => 'publish',
					'offset'        => 1,
					'posts_per_page' => 3,

				);

				$the_query = new WP_Query( $args );
				?>
  <h3 class="recent-posts-title">Recent Posts</h3>
<?php
// Start our WP Query
while ($the_query -> have_posts()) : $the_query -> the_post();
// Display the Post Title with Hyperlink
?>
<div class="recent-post-two-col">
	<div class="row">
		<div class="col-12 col-md-6">
			<figure class="recent-post-img">
				<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
			</figure>
		</div>
		<div class="col-12 col-md-6">
			<h4 class="recent-post-title"><?php the_title(); ?></h4>
			<?php the_excerpt(); ?>
			<div class="post-meta">
				<time class="post-date" datetime="<?php echo get_the_date('F j, Y'); ?>" itemprop="datePublished"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date('F j, Y'); ?></time>
				<span class="post-readmore"><a href="<?php the_permalink() ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Read More</span></a>
			</div>
		</div>
	</div>
</div>
  
<?php
// Repeat the process and reset once it hits the limit
endwhile;
wp_reset_postdata();
?>


<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>

<div><?php echo get_field('sbo_content');?></div>

				<?php endwhile; ?>

<?php endif; ?>


				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php rpm_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

<?php get_template_part( 'parts/featured-video-module' ); ?>
       	
       	<?php endif ?>
	</div><!-- #content -->
   <?php //get_template_part('parts/full-width-cta-1-module'); ?>
</div><!-- #index-wrapper -->

<?php get_footer(); ?>

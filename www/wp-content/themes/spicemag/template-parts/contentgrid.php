<?php
/**
 * Template part for displaying posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package designexo
 */
$designexo_grid_view_column_layout = get_theme_mod('designexo_grid_view_column_layout', '2');  
$designexo_grid_view_column_layout = 12/$designexo_grid_view_column_layout;
$designexo_grid_view_content_ordering = get_theme_mod( 'designexo_grid_view_content_ordering', array( 'title', 'meta', 'content' ));
$designexo_grid_view_meta_date_disable = get_theme_mod( 'designexo_grid_view_meta_date_disable', true );
?>

<div class="col-lg-<?php echo $designexo_grid_view_column_layout; ?> col-md-6 col-sm-12">
	<article class="post wow animate fadeInUp" <?php post_class(); ?> data-wow-delay=".3s">		
			   <?php 
			if(has_post_thumbnail()){
			echo '<figure class="post-thumbnail"><a href="'.esc_url(get_the_permalink()).'">';
			the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
			echo '</a></figure>';
			} ?>		
		    <div class="post-content">
			    <div class="media mb-3">
				<?php if($designexo_grid_view_meta_date_disable == true): ?>
				    <span class="posted-on">
						<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><time class="days">
						<?php echo esc_html(get_the_date('j')); ?><small class="months"><?php echo get_the_date('M'); ?></small></time></a>
					</span>
				<?php endif; ?>
				<div class="media-body">
			        <?php foreach ( $designexo_grid_view_content_ordering as $designexo_grid_view_content_order ) : ?>
					<?php if ( 'title' === $designexo_grid_view_content_order ) : ?>
					<header class="entry-header">
						<?php 
						the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h4>' );
						?>
					</header>
			        <?php elseif ( 'meta' === $designexo_grid_view_content_order ) : ?>
					<div class="entry-meta">
					    <span class="author">
							<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><span class="grey"><?php echo esc_html__('by ','designexo');?></span><?php echo esc_html(get_the_author());?></a>	
						</span>
						<?php $category_data = get_the_category_list();
					    if(!empty($category_data)) { ?>
						<span class="cat-links"><a href="<?php the_permalink(); ?>"><?php the_category(', '); ?></a></span>
					    <?php } ?>
					</div>	
					<?php elseif ( 'content' === $designexo_grid_view_content_order ) : ?>
					<div class="entry-content">
						<?php the_content( __('Read More','designexo') ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'designexo' ), 'after'  => '</div>', ) ); ?>
					</div>
			        <?php  endif; endforeach; ?>
                </div>
				</div>
		    </div>				
	</article>
</div><!-- #post-<?php the_ID(); ?> -->
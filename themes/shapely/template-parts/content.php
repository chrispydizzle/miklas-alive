<?php
/**
 * Template part for displaying posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shapely
 */

$dropcaps    = get_theme_mod( 'first_letter_caps', true );
$enable_tags = get_theme_mod( 'tags_post_meta', true );
$post_author = get_theme_mod( 'post_author_area', true );
$left_side   = get_theme_mod( 'post_author_left_side', false );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-content post-grid-wide'); ?>>
	<header class="entry-header nolist">
		<?php
		$category = get_the_category();
		if ( has_post_thumbnail() ) {
			$layout = shapely_get_layout_class();
			$size   = 'shapely-featured';

			if ( $layout == 'full-width' ) {
				$size = 'shapely-full';
			}
			$image = get_the_post_thumbnail( get_the_ID(), $size );

		$allowed_tags = array(
			'img'      => array(
				'data-srcset' => true,
				'data-src'    => true,
				'srcset'      => true,
				'sizes'       => true,
				'src'         => true,
				'class'       => true,
				'alt'         => true,
				'width'       => true,
				'height'      => true
			),
			'noscript' => array()
		);
		?>
		<a href="<?php echo esc_url( get_the_permalink() ); ?>">
			<?php echo wp_kses( $image, $allowed_tags ); ?>
		</a>

		<?php if ( isset( $category[0] ) ): ?>
			<span class="shapely-category">
				<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>">
					<?php echo esc_html( $category[0]->name ); ?>
				</a>
			</span>
		<?php endif; ?>
		<?php } ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
			<div class="shapely-content <?php echo $dropcaps ? 'dropcaps-content' : ''; ?>">
				<?php
				the_content();
				wp_link_pages( array(
					               'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shapely' ),
					               'after'  => '</div>',
				               ) );
				?>
			</div>
	</div><!-- .entry-content -->
</article>
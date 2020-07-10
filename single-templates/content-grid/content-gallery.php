<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

global $opt_meta_options;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<div class="wrap-gallery">
		
		<?php
		/* no audio. */
	    if (empty($opt_meta_options['opt-gallery'])) {
	        helping_hand_post_thumbnail();
	        return;
	    }

	    $array_id = explode(",", $opt_meta_options['opt-gallery']);

	    ?>
	    <div id="gallery-nav" class="carousel slide" data-ride="carousel">
	        <div class="carousel-inner">
	            <?php $i = 0; ?>
	            <?php foreach ($array_id as $image_id): ?>
	                <?php
	                $attachment_image = wp_get_attachment_image_src($image_id, 'large', false);
	                if ($attachment_image[0] != ''):?>
	                    <div class="item <?php if ($i == 0) {
	                        echo 'active';
	                    } ?>">
	                        <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]); ?>"
	                             />
	                    </div>
	                    <?php $i++; endif; ?>
	            <?php endforeach; ?>
	        </div>
	        <a class="left control" href="#gallery-nav" role="button" data-slide="prev">
	            <span class="fa fa-angle-left"></span>
	        </a>
	        <a class="right control" href="#gallery-nav" role="button" data-slide="next">
	            <span class="fa fa-angle-right"></span>
	        </a>
	    </div>

		<footer class="entry-footer">

			<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'book-junky') ?></a>

			<?php echo book_junky_get_like(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->

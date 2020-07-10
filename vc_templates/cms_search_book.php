<?php
/**
 * Shortcode Search Book
 */
$cate_slug = !empty($_REQUEST['product_cat']) ? $_REQUEST['product_cat'] : "";
$year = !empty($_REQUEST['bj_tax_pa_year_publication']) ? $_REQUEST['bj_tax_pa_year_publication'] : "";
?>
<div class="wrap-search-book" id="<?php echo esc_attr($atts['html_id']); ?>">
    <form class="searchform" action="<?php echo esc_url(home_url('/')); ?>" method="get">
		<div class="md-col-3 search-field">
			<label for="search-product-cat">Category</label><br/>
			<div class="wrap-cat">
				<?php book_junky_get_cat_book_2($cate_slug); ?>
			</div>
		</div>
        <div class="md-col-2 search-field">
			<label for="search-book-name=field">Book Isbn</label><br/>
			<div class="wrap-search">
				<input id="search-book-name=field" type="text" class="form-search" name="isbn" value=""
					   placeholder="<?php esc_html_e('eg. Go For 978-1-78856-166-2', 'book-junky'); ?>">
				
			</div>
		</div>
		<div class="md-col-2 search-field">
			<label for="search-book-name=field">Book Name</label><br/>
			<div class="wrap-search">
				<input id="search-book-name=field" type="text" class="form-search" name="s" value=""
					   placeholder="<?php esc_html_e('eg. Go For It Maths!', 'book-junky'); ?>">
				<button type="submit" class="search-submit"><?php esc_html_e('Search Books', 'book-junky'); ?></button>
			</div>
		</div>
		
        <input type="hidden" name="post_type" value=""/>
        <input type="hidden" name="bj_action" value="bj_product"/>
    </form>
</div>
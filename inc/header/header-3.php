<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Kenji
 */

?>
<div id="cshero-header" class="header-3">

	<?php book_junky_header_3_top(); ?>
	<div class="wrap-middler">
	    <div class="container">

	        <div class="row">

	            <div class="col-xs-12 col-md-4 col-lg-3">

	                <?php book_junky_header_3_logo(); ?>

	                <a href="#" class="menu"><i class="fa fa-bars"></i> <?php echo esc_html__('Menu', 'book-junky'); ?></a>
	            </div>

	            <div class="col-xs-12 col-md-8 col-lg-9">
	               	
	               	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform clearfix"  method="get">
						<div class="wrap-search clearfix">
							<input type="text" class="form-search" name="s" value="" placeholder="<?php esc_html_e('Search for the perfect book...','book-junky'); ?>">

								<div class="wrap-cat">
									<?php book_junky_get_cat_book(); ?>
								</div>
					 	</div>
						 <button type="submit" class="search-submit"><?php esc_html_e('Go','book-junky'); ?></button>
					 	<input type="hidden" name="post_type" value="product" />
					</form>
	            </div><!-- #site-logo -->
	        </div>
	    </div>
    </div>

    <div class="container">
    	<div class="row">
    		<div id="header-navigation" class="col-xs-12 <?php book_junky_header_class('cshero-main-header'); ?>">

                <nav id="site-navigation" class="main-navigation">

                    <?php book_junky_header_navigation(); ?>
                </nav>
            </div>
    	</div>
    </div>
</div><!-- #site-navigation -->



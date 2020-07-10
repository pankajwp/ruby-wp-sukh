<?php
/**
 * @name : Default Header
 * @package : CMSSuperHeroes
 * @author : Kenji
 */
?>

<div id="cshero-header" class="header-2">
	<div class="wrap-header-info">
    <div class="container">
        <div class="row">
        	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

        		<?php book_junky_header_logo_2(); ?>
        	</div>

        	

        	<div class="col-xs-12 col-md-9 col-lg-9">
        		<div class="wrap-info">
        		<?php book_junky_login(); ?>
        		<div class="wrap-book-shelf clearfix">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/album.svg'; ?>" alt="<?php esc_html_e('icon 1','book-junky'); ?>">
                    <div class="content">
                        <h5>
                            <a href="<?php echo get_home_url(); ?>/user-profile/book-shelf/">
                                <?php esc_html_e('Bookshelf','book-junky'); ?>
                            </a>
                        </h5>
                        <span>
                            <a style="color:#21bbef;" href="<?php echo get_home_url(); ?>/user-profile/book-shelf/">
                            <?php 
                                $current_uid = get_current_user_id();
                                $list_book_id = $current_uid !== 0 ? get_user_meta($current_uid, 'fs_favor_ids', true) : "";

                                $list_id = explode(',',$list_book_id);
                                $count = count( $list_id );
                                
                                echo esc_attr($count -1);
                                esc_html_e(' Books', 'book-junky'); 
                            ?>
                        </a>
                        </span>
                    </div>
                </div>
                <div class="wrap-your-basket clearfix">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/basket.svg'; ?>" alt="<?php esc_html_e('icon 2','book-junky'); ?>">
                    <div class="content">
                        <h5>
                            <?php if( class_exists( 'WooCommerce' )) : ?>
                            <a href="<?php echo get_permalink( get_option('woocommerce_cart_page_id') ); ?>">
                            <?php endif; ?>

                                <?php esc_html_e('Your Basket','book-junky'); ?>
                            <?php if( class_exists( 'WooCommerce' )) : ?>
                            </a>
                            <?php endif; ?>
                        </h5>
                        <?php if( class_exists( 'WooCommerce' )) : ?>
                        <span>
                            <?php 
                            if ( ! WC()->cart->is_empty() ) :

                                echo WC()->cart->get_cart_subtotal();
                            else :

                                echo "0.00"; 
                            endif;
                            ?>
                        </span>
                        <?php else: ?>

                            <span>

                                <?php echo "0.00"; ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
        	</div>
        </div>
    </div>
    </div>

    <div class="container">
    	<div class="row nav">
    		<div class="wrap-menu">
	    		<a href="#" class="menu"><i class="fa fa-bars"></i> <?php echo esc_html__('Menu', 'book-junky'); ?></a>
	    		<div id="header-navigation" class="col-xs-12 col-lg-8 <?php book_junky_header_class('cshero-main-header'); ?>">

		            <nav id="site-navigation" class="main-navigation">

		                <?php book_junky_header_navigation(); ?>
		            </nav>
		        </div>
	        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
        		<div class="header-search">
        			<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform clearfix"  method="get">
						<div class="wrap-search clearfix">
							<input type="text" class="form-search" name="s" value="" placeholder="<?php esc_html_e('Search for the perfect book...','book-junky'); ?>"><span>|</span>

								<div class="wrap-cat">
									<?php book_junky_get_cat_book(); ?>
								</div>
					 	</div>
						 <button type="submit" class="search-submit"><?php esc_html_e('Go','book-junky'); ?></button>
					 	<input type="hidden" name="post_type" value="product" />
					</form>
        		</div>
        	</div>
    	</div>
    </div>
</div><!-- #site-navigation -->
<?php
/**
 * @team: FsFlex Team
 * @since: 1.0.0
 * @author: KP
 */

?>
<div class="cs-book_shelf">
<div class="book-junky-shop">
    <div class="book-junky-products">
        
    <h4><?php esc_html_e('My Bookshelf','book-junky'); ?></h4>
    <div class="row">

        <?php
        $size = 'shop_catalog';

        if( !empty($books) ){
            foreach ($books as $key) {

                global $product, $opt_meta_options;
                $box_shadow = get_post_meta($key, 'ef3-color_item', true);

                $thumbnail = get_the_post_thumbnail($key, $size);

                ?>

                <div class="book-junky-product col-xs-4 bookslf">
                    <div class="product-thumbnial fll" style="box-shadow: 0 0 15px 0 <?php echo esc_attr($box_shadow); ?>">
                        <a class="title-product"
                           href="<?php echo esc_url(get_permalink($key)); ?>"><?php echo ''.$thumbnail; ?>
                       </a>
                   </div>
                    <div class="product-content">
                        <a class="title-product"
                           href="<?php echo esc_url(get_permalink($key)); ?>"><?php echo get_the_title($key); ?></a>
                        <div class="author-product">
                                
                                <?php 
                                    $pbk = get_post_meta( $key, 'ef3-pbk_code', true );
                                    if($pbk != '') {
                                        echo esc_html__('pbk: ','book-junky'); echo $pbk; 
                                    }
                                    ?><br/>
                                <?php 
                                    $hbk = get_post_meta( $key, 'ef3-hbk_code', true );
                                    if($hbk != '') {
                                        echo esc_html__('hbk: ','book-junky'); echo $hbk; 
                                    }
                                    ?>
                        </div>

                        <?php
                        $price = get_post_meta($key, '_regular_price', true);
                        $sale = get_post_meta($key, '_sale_price', true);
                        ?>

                        <span class="price" style="margin-bottom:10px;">
        					<?php if (!empty($sale)) : ?>
                                <del>
    								
									<span class="woocommerce-Price-amount amount">
									<span class="woocommerce-Price-currencySymbol">
										<?php 
										list($symbol, $nsale) = sscanf($sale,'%[^0-9]%s');
										if($nsale != '') {
										?>
										<?php echo get_woocommerce_currency_symbol(); ?>
										</span><?php echo (esc_attr($nsale)); ?>
										<?php }else{ ?>
										<?php echo get_woocommerce_currency_symbol(); ?>
										</span><?php echo (esc_attr($sale)); ?>
										<?php } ?>
									</span>
								
									<!--<span class="woocommerce-Price-amount amount">
    								<span class="woocommerce-Price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span><?php echo (esc_attr($sale)); ?></span>-->
    							</del>
                            <?php endif; ?>

                            <ins>
    							<span class="woocommerce-Price-amount amount">
    							<span class="woocommerce-Price-currencySymbol">
									<?php 
									list($symbol, $nprice) = sscanf($price,'%[^0-9]%s');
									if($nprice != '') {
									?>
									<?php echo get_woocommerce_currency_symbol(); ?>
									</span><?php echo (esc_attr($nprice)); ?>
									<?php }else{ ?>
									<?php echo get_woocommerce_currency_symbol(); ?>
									</span><?php echo (esc_attr($price)); ?>
									<?php } ?>
								</span>
    						</ins>
    					</span>
                       <!--  <div class="excerpt-product"><?php echo wp_trim_words(get_the_excerpt($key), '55', ''); ?></div> -->
                        <div class="wrap-button">
                            <?php
                                $product = wc_get_product( $key );
                                woocommerce_template_loop_add_to_cart();
                            ?>
                            <?php
                            echo flex_favorites_build_remove_layout($key, $button_text = "Remove from Bookshelf", $parents_class = "book-junky-product", $class_count = "aj-count")
                            ?>
                        </div>

                    </div>
                </div>
                <?php
            }
        }
        else {
            echo "<h5 class='book-empty'>" . esc_html__('BookShelf Empty !','book-junky') . "</h5>";
        }
        ?>
    </div>
    </div>    
</div>
</div>


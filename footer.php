<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
    </div><!-- .site-content -->
    <footer class="site-footer">
        
        <div id="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>

                        <div id="secondary" class="widget-area" role="complementary">
                        <ul class="xoxo">
                            <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
                        </ul>
                        </div>

                        <?php endif; ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <?php if ( is_active_sidebar( 'sidebar-footer-top-2' ) ) : ?>

                        <div id="secondary" class="widget-area" role="complementary">
                        <ul class="xoxo">
                            <?php dynamic_sidebar( 'sidebar-footer-top-2' ); ?>
                        </ul>
                        </div>

                        <?php endif; ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <?php if ( is_active_sidebar( 'sidebar-footer-top-3' ) ) : ?>

                        <div id="secondary" class="widget-area" role="complementary">
                        <ul class="xoxo dddd">
                            <?php dynamic_sidebar( 'sidebar-footer-top-3' ); ?>
                        </ul>
                        </div>

                        <?php endif; ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <?php if ( is_active_sidebar( 'sidebar-footer-top-4' ) ) : ?>

                        <div id="secondary" class="widget-area" role="complementary">
                        <ul class="xoxo">
                            <?php dynamic_sidebar( 'sidebar-footer-top-4' ); ?>
                        </ul>
                        </div>

                        <?php endif; ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <?php if ( is_active_sidebar( 'footer-sidebar-5' ) ) : ?>

                        <div id="secondary" class="widget-area" role="complementary">
                        <ul class="xoxo">
                            <?php dynamic_sidebar( 'footer-sidebar-5' ); ?>
                        </ul>
                        </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer-bottom">
            <div class="container">
                <div class="row">
                <div class="col-xs-12">
                    <?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>

                        <div id="copyright" class="widget-area" role="complementary">
                            <?php dynamic_sidebar( 'footer-bottom' ); ?>
                        </div>

                    <?php endif; ?>
                </div>
                </div>
            </div>
        </div><!-- #footer-bottom -->

    </footer><!-- .site-footer -->

</div><!-- .site -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<?php book_junky_end_boxed(); ?>
<?php book_junky_back_to_top(); ?>
<?php wp_footer(); ?>
<script>
jQuery(document).ready(function(){
  
    jQuery(".button.print").text("Print Order");
  
});
</script>
</body>
</html>













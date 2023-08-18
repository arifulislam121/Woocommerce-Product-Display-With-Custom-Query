<!----Dynamic code------->

<div id="tab-special" class="tab_content">
            <div class="box-product">
              <div class="flexslider special_carousel_tab">
                <ul class="slides">
				
				
						<?php

							global $post;
							$args=array('posts_per_page'=>-1,'post_type'=>'product','product_cat'=>'special');

							$myposts = get_posts($args);

							foreach( $myposts as $post) : setup_postdata($post);
						?>

						  <li>
							<div class="slide-inner">
							  <div class="image"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
							  <div class="name"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
							  <div class="price"> 
									<?php if ( $price_html = $product->get_price_html() ) : ?>
										<span class="price"><?php echo $price_html; ?></span>
									<?php endif; ?>
								</div>
							  
							  
							<!--Add to Cart button--->  
							  <div class="cart">
							  
							  <?php global $product;?>
							  
									<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
										sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button ami %s product_type_%s">%s</a>',
											esc_url( $product->add_to_cart_url() ),
											esc_attr( $product->id ),
											esc_attr( $product->get_sku() ),
											esc_attr( isset( $quantity ) ? $quantity : 1 ),
											$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
											esc_attr( $product->product_type ),
											esc_html( $product->add_to_cart_text() )
										),
									$product );?>
								</div>
								<!--end---->
								
								
								<div class="add_to_wishlist"> 
						
								<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
								<?php echo do_shortcode('[yith_compare_button]');?>
								
								</div>
							  <div class="clear"></div>
							</div>
						  </li>


					<?php endforeach;?>
				
				
                 
                </ul>
              </div>
            </div>
          </div>

<!----end-------->	

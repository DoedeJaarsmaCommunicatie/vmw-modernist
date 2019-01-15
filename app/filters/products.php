<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2018-11-30
 * Time: 09:33
 *
 * @package filters
 */

/**
 * Returns the bare product card.
 *
 * @param int $product_id The product id to create a card for.
 */
function bare_product_card( $product_id ) {
	$product       = wc_get_product( $product_id );
	$product_image = get_the_post_thumbnail_url( $product_id ); ?>
    <article class="col-md-3" data-article="<?php print esc_html( $product->get_name() ); ?>">
        <a href="<?php print esc_url( get_the_permalink( $product_id ) ); ?>">
            <div class="product__card">
                <h6 class="product__card__title text-primary">
					<?php print esc_html( $product->get_name() ); ?>
                </h6>
                <figure class="product__card__figure">
                    <img class="product__card__image" src="<?php print esc_url( $product_image ); ?>" alt="<?php print esc_html( get_the_title( $product_id ) ); ?>" />
                    <figcaption class="product__card__price vmw__gradient__background__right text-white">&euro;<?php print esc_html( $product->get_price() ); ?></figcaption>
                </figure>
            </div>
        </a>
    </article>
	<?php
}

add_filter( 'bare_product_card_filter', 'bare_product_card', 10, 1 );


/**
 * @param $product_id
 *
 * @return string
 * TODO Make filter fully sprintf.
 */
function horizontal_product_card( $product_id, $return= true ) {
    $product       = wc_get_product( $product_id );
    $product_image = get_the_post_thumbnail_url( $product_id );
    
    $image = esc_url( $product_image );
    $title = esc_html( get_the_title( $product_id ) );
    $sales = $product->get_total_sales();
    
    $short_description = sprintf( '<p>%1$s</p>',
	    $product->get_short_description() );
    
    $permalink = get_permalink( $product_id );
    
	$name = sprintf('<h4 class="%2$s"><a href="%3$s">%1$s</a></h4>',
		esc_html( $product->get_name() ),
        'product__horizontal__title text-primary',
		$permalink);
	
	$price = sprintf( '<p class="%2$s">&euro; %1$s</p>',
	    str_replace( '.', ',', esc_html( $product->get_price() ) ),
        'text-primary product__horizontal__price' );
	
    $form = apply_filters( 'product_form_add_to_cart', $product_id);
    
    $attributes = apply_filters( 'product_list_attributes', $product_id);
    
    $figure = sprintf('<figure class="%1$s"><a href="%5$s"><img src="%2$s" alt="%3$s" class="%4$s" /></a></figure>',
        'product__horizontal__figure',
	    $image,
        $title,
        'product__horizontal__image px-3',
        $permalink
        );
    $section = sprintf('<section class="%4$s">%1$s %2$s %3$s</section>',
    $name,
    $short_description,
    $attributes,
    'product__horizontal__content'
    );
    $aside = sprintf('<aside class="%3$s">%1$s %2$s</aside>',
    $price,
    $form,
    'product__horizontal__buy p-md-3'
    );
    
    $container = sprintf('<div class="%4$s">%1$s %2$s %3$s</div>',
        $figure,
        $section,
        $aside,
        'product__horizontal__card border-tertiary-light-50 border p-2');
    
    $article = sprintf( '<article data-article="%3$s" class="%2$s" data-popularity="%4$d" data-price="%5$s" data-product-id="%6$d">%1$s</article>',
        $container,
        'px-3 py-1',
        $product->get_name(),
        $sales,
        $product->get_price(),
        $product_id
        );
    
    if( $return )
        return $article;
    
    print $article;
}

function product_pa_list( $product_id, $return = true)
{
    $product = \wc_get_product( $product_id );
    
    $format = '<li>%s: %s</li>';
    
    $land = sprintf( $format, 'Land', $product->get_attribute( 'pa_land' ) );
    $streek = sprintf( $format, 'Streek', $product->get_attribute( 'pa_streek' ) );
    $druif = sprintf( $format, 'Druif', $product->get_attribute( 'pa_druif' ) );
    $jaar = sprintf( $format, 'Jaar', $product->get_attribute( 'pa_jaar' ) );
    
    
    $grouped = $land . $streek . $druif . $jaar;
    
    $html = sprintf( '<ul class="vmw__product__attributes">%s</ul>', $grouped );
    if( $return )
        return $html;
        
    print $html;
}

function product_add_to_cart( $product_id, $return = true)
{
    $steps = absint( get_post_meta( $product_id, 'group_of_quantity', true ) );
    
    $button_minus = sprintf('<button type="%s" class="%s" data-target="%d">%s</button>', 'button', 'btn bg-white js-make-me-less border-tertiary-light-20 border-right-0 btn-plusle-minum', $product_id, '-' );
    $button_plus = sprintf('<button type="%s" class="%s" data-target="%d">%s</button>', 'button', 'btn bg-white js-make-me-more border-tertiary-light-20 border-left-0 btn-plusle-minum', $product_id, '+' );
    $input_amount = sprintf('<input type="%7$s" step="%6$d" min="%5$d" value="%4$d" size="%3$d" pattern="[0-9]*" inputmode="numeric" name="%1$s" id="%1$s" class="%2$s">',
        'quantity',
    'text-center',
    4,
        ($steps > 0)? $steps : 1,
        ($steps > 0)? $steps : 0,
        ($steps > 0)? $steps : 1,
    'number'
        );
    
    $input_hidden = sprintf('<input type="%1$s" %1$s class="%2$s" aria-hidden="true" value="%3$d" name="%4$s" id="%4$s">',
        'hidden',
    'd-none',
    $product_id,
    'product_id'
    );
    
    $submit_button = sprintf( '<input type="%1$s" class="%2$s" value="%3$s" style="width: 95px;" />',
    'submit',
    'btn bg-success text-uppercase text-white btn-lg ml-md-2 btn-order border-0 mt-1 mt-sm-0',
    'Bestel'
    );
    
	$html = sprintf('<form data-action="%1$s" class="%2$s">%3$s %4$s %5$s %6$s %7$s</form>',
        'product_add_to_cart',
        'product__horizontal__add_to_cart justify-content-center',
        $button_minus, $input_amount, $button_plus, $input_hidden, $submit_button);
	
    if( $return )
    {
        return $html;
    }
	
	print $html;
}

add_filter( 'product_form_add_to_cart', 'product_add_to_cart', 10, 2);
add_filter( 'product_list_attributes', 'product_pa_list', 10, 2);
add_filter( 'horizontal_product_card_filter', 'horizontal_product_card', 10, 1 );
add_filter( 'create_product_card', 'horizontal_product_card', 10, 2);


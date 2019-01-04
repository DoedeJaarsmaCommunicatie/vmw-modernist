<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2018-12-11
 * Time: 13:38
 */

function shortcode_vendors( $atts ) {
	$a = shortcode_atts( array(
		'orderby' => 'rand',
	), $atts );
	
	$args = [
		'taxonomy'  =>  'wcpv_product_vendors',
		'orderby'   =>  $a['orderby']
	];
	
	$terms = get_terms( $args );
	
	shuffle($terms);
	print "<div class='container row'>";
	foreach( $terms as $term ) {
		
		$vendorData = WC_Product_Vendors_Utils::get_vendor_data_by_id( $term->term_id );?>
		<article data-taxonomy="wcpv_product_vendors" data-term="<?=$term->name?>" class="vmw__vendor__card col-md-3 mb-md-3 d-flex w-100">
			<a href="<?= get_term_link( $term->term_id ) ?>" class="d-flex w-100">
				<main class="vmw__vendor__content  border border-tertiary-light-50  d-flex w-100 flex-column">
					<header class="vmw__vendor__header">
						<?=$term->name?>
					</header>
					<figure>
						<?php print wp_get_attachment_image( $vendorData['logo'], 'medium', false, ['class' => 'vmw__vendor__image']) ?>
					</figure>
					<p class="vmw__vendor_text p-1 text-tertiary">
						<?php print wp_trim_words( $vendorData['profile'], 25 ); ?>
					</p>
				</main>
			</a>
		</article>
<?php
	}
	print "</div>";
}
add_shortcode( 'vendors', 'shortcode_vendors' );
<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2018-11-28
 * Time: 13:17
 */

function the_search_form () { ?>
	<form action="<?=get_bloginfo('url')?>" id="searchform">
		<div class="input-group d-flex position-relative">
			<input type="text" class="border-dark form-control vwm__search__shortened" placeholder="<?=__( 'Zoeken...', 'vmw')?>" aria-label="<?=__( 'Search...', 'vmw')?>" aria-describedby="search-submit" id="autoComplete" name="s" tabindex="1" autocomplete="off">
            <input type="hidden" name="post_type" id="post_type" value="product">
<!--			<div class="input-group-append">-->
<!--				<button class="btn bg-transparent border-dark border-left-0" type="submit" id="search-submit"><i class="fas fa-search"></i></button>-->
<!--			</div>-->
		</div>
	</form>
<?php
}

function the_wine_glass() { ?>
<svg id="logo-and-text" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500"><defs><style>.cls-1{fill:none;}.cls-2{clip-path:url(#clip-path);}.cls-3{fill:url(#linear-gradient);}.cls-4{fill:#605e61;}.cls-5{clip-path:url(#clip-path-2);}.cls-6{fill:url(#linear-gradient-2);}.cls-7{clip-path:url(#clip-path-3);}.cls-8{fill:url(#linear-gradient-3);}</style><clipPath id="clip-path"><path class="cls-1" d="M126.64,209.64s6.26,86.48,94.24,86.48c81.4,0,99.54-86.48,99.54-86.48s-40.63,7.08-92.89,0a428.71,428.71,0,0,0-57.08-4.18c-29.9,0-43.81,4.18-43.81,4.18"/></clipPath><linearGradient id="linear-gradient" x1="-20.07" y1="2265.97" x2="-8.83" y2="2265.97" gradientTransform="matrix(17.24, 0, 0, -17.24, 472.6, 39305.41)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ec6546"/><stop offset="1" stop-color="#ec6584"/></linearGradient><clipPath id="clip-path-2"><path class="cls-1" d="M26.92,118.69c0,8.58,7.29,15.34,15.87,15.34a15.2,15.2,0,0,0,15.33-15.34c0-9.09-6.76-15.6-15.33-15.6a15.55,15.55,0,0,0-15.87,15.6"/></clipPath><linearGradient id="linear-gradient-2" x1="-55.27" y1="2181.81" x2="-44.03" y2="2181.81" gradientTransform="matrix(0, 44.28, 44.28, 0, -96563.97, 2321.82)" xlink:href="#linear-gradient"/><clipPath id="clip-path-3"><path class="cls-1" d="M84.62,118.56c0,8.32,7.28,15.35,15.6,15.35a15.43,15.43,0,0,0,15.6-15.35c0-8.58-6.49-15.34-15.6-15.34a15.59,15.59,0,0,0-15.6,15.34"/></clipPath><linearGradient id="linear-gradient-3" x1="-80.56" y1="2181.58" x2="-69.32" y2="2181.58" gradientTransform="matrix(0, 26.03, 26.03, 0, -56676.67, 2035.54)" xlink:href="#linear-gradient"/></defs><title>logo</title><g class="cls-2"><rect class="cls-3" x="126.64" y="205.46" width="193.78" height="90.66"/></g><path class="cls-4" d="M300.78,117.5a111.84,111.84,0,1,1-190.4,89Q100.53,214.6,90.93,222a132.58,132.58,0,0,0,36.54,68.83c52,51.95,136.5,51.95,188.46,0s51.95-136.5,0-188.46a132.52,132.52,0,0,0-68.51-36.47Q240,75.45,231.83,85.27a111.29,111.29,0,0,1,68.95,32.23"/><path class="cls-4" d="M467,407.12,394.13,334.2l-49.89-49.34a128.66,128.66,0,0,1-31.72,31.72l65.33,64.59,58.31,57.65Z"/><path class="cls-4" d="M473.08,422.4a22.18,22.18,0,1,1-22.17-22.17,22.17,22.17,0,0,1,22.17,22.17"/><path class="cls-4" d="M69.27,55.43c8.58,0,15.35,6.49,15.35,15.6A15.21,15.21,0,0,1,69.27,86.37c-8.58,0-15.86-6.76-15.86-15.34a15.53,15.53,0,0,1,15.86-15.6"/><g class="cls-5"><rect class="cls-6" x="26.87" y="103.03" width="31.31" height="31.05" transform="translate(-0.42 0.15) rotate(-0.2)"/></g><g class="cls-7"><rect class="cls-8" x="84.57" y="103.17" width="31.31" height="30.79" transform="translate(-0.42 0.36) rotate(-0.2)"/></g></svg>
<?php
}
<?php
/**
 * Created by PhpStorm.
 * User: mitch
 * Date: 2018-11-29
 * Time: 10:06
 */

function the_login_or_my_account_button () {
	if( is_user_logged_in() ) { ?>
		<a href="<?=get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ?>" class="mr-2 text-dark">
            <i class="fas fa-user mr-1"></i> <?=__('Mijn account', 'vmw')?>
        </a>
<?php
	} else { ?>
		<a href="<?=get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ?>" class="mr-2 text-dark">
			<i class="fas fa-sign-in-alt mr-1"></i> <?=__('Inloggen', 'vmw')?>
		</a>
<?php
	}
}
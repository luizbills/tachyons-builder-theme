<?php

$requires = [
	'php' => 'PHP version 5.4 or higher.',
	'wp' => 'WordPress version 4.7 or higher.',
];

if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) unset( $requires['php'] );
if ( version_compare( get_bloginfo('version'), '4.7', '>=' ) ) unset( $requires['wp'] );

if ( count( $requires ) > 0 ) {

	if ( ! is_admin() && ! is_login_page() ) {
		wp_die( 'This site is now closed' );
	}

	add_action( 'admin_notices', function () use ( $requires ) {
		?>

		<div class="notice notice-error is-dismissible">

			<?php

			echo '<p><b>' . __( 'AZ Starter theme requires: ', 'az' ) . '</b><ul>';

			foreach ( $requires as $message ) {
				echo '<li>' . $message . '</li>';
			}

			echo '</ul></p>';

			?>

		</div>

		<?php
	} );

	define( 'AZ_MISSING_REQUIREMENTS', true );
}


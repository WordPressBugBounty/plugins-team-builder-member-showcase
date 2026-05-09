<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Fetch theme information from WordPress.org
if ( ! function_exists( 'themes_api' ) ) {
	require_once ABSPATH . 'wp-admin/includes/theme-install.php';
}

$author_slug = 'awordpresslife';
$api_args = array(
	'author' => $author_slug,
	'fields' => array(
		'description'     => true,
		'active_installs' => true,
		'rating'          => true,
		'num_ratings'     => true,
		'screenshot_url'  => true,
	),
);

$transient_key = 'ig_our_themes_data';

// Force refresh the data
if ( isset($_GET['refresh_plugins']) ) {
    delete_transient( $transient_key );
}

$themes = get_transient( $transient_key );

if ( false === $themes ) {
	$response = themes_api( 'query_themes', $api_args );
	if ( ! is_wp_error( $response ) && isset( $response->themes ) ) {
		$themes = $response->themes;
		set_transient( $transient_key, $themes, 12 * HOUR_IN_SECONDS );
	} else {
		$themes = array();
	}
} else {
	$response = true;
}

// Sort by rating (highest first), then by active installs descending
usort( $themes, function ( $a, $b ) {
    $a = (array) $a;
    $b = (array) $b;
    
    $a_rating = isset($a['rating']) ? (int) $a['rating'] : 0;
    $b_rating = isset($b['rating']) ? (int) $b['rating'] : 0;
    
    if ($a_rating == $b_rating) {
        $a_installs = isset($a['active_installs']) ? (int) $a['active_installs'] : 0;
        $b_installs = isset($b['active_installs']) ? (int) $b['active_installs'] : 0;
        return $b_installs - $a_installs;
    }
    
	return $b_rating - $a_rating;
} );

?>
<div class="wrap ig-our-plugins-wrap">
    <header class="ig-our-plugins-header">
        <h1><?php esc_html_e( 'Our WordPress Themes', 'team-builder-member-showcase' ); ?></h1>
        <p><?php esc_html_e( 'Beautifully crafted, high-performance themes for any WordPress project. Experience premium design with A WP Life.', 'team-builder-member-showcase' ); ?></p>
    </header>

	<?php if ( is_object( $response ) && is_wp_error( $response ) ) : ?>
        <div class="ig-error-wrap">
            <span class="dashicons dashicons-warning"></span>
            <h2><?php esc_html_e( 'Unable to fetch our themes', 'team-builder-member-showcase' ); ?></h2>
            <p><?php echo esc_html( $response->get_error_message() ); ?></p>
            <a href="<?php echo esc_url( 'https://profiles.wordpress.org/awordpresslife/#content-themes' ); ?>" target="_blank" class="ig-btn ig-btn-primary" style="margin-top: 20px;">
				<?php esc_html_e( 'Visit Our WordPress Profile', 'team-builder-member-showcase' ); ?>
            </a>
        </div>
	<?php elseif ( empty( $themes ) ) : ?>
        <div class="ig-loading-wrap">
            <div class="ig-spinner"></div>
            <h3><?php esc_html_e( 'Refreshing our theme collection...', 'team-builder-member-showcase' ); ?></h3>
        </div>
	<?php else : ?>
        <div class="ig-plugins-grid">
			<?php foreach ( $themes as $theme ) :
				$theme = (array) $theme;
				$screenshot = ! empty( $theme['screenshot_url'] ) ? $theme['screenshot_url'] : '';
				
                $rating = isset($theme['rating']) ? $theme['rating'] : 0;
				$stars = ( $rating / 100 ) * 5;
                $active_installs = isset($theme['active_installs']) ? $theme['active_installs'] : 0;
				$install_count = $active_installs >= 1000 ? ( floor( $active_installs / 1000 ) . 'k+' ) : $active_installs;
				
				// Themes usually have a preview URL
				$preview_url = isset($theme['preview_url']) ? $theme['preview_url'] : 'https://wordpress.org/themes/' . $theme['slug'] . '/';
				?>
                <div class="ig-plugin-card ig-theme-card">
                    <div class="ig-plugin-banner ig-theme-screenshot">
                        <img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php echo esc_attr( $theme['name'] ); ?>">
                    </div>

                    <div class="ig-plugin-content">
                        <h2><?php echo esc_html( $theme['name'] ); ?></h2>
                        <div class="ig-plugin-description">
							<?php echo esc_html( wp_trim_words( strip_tags($theme['description']), 20 ) ); ?>
                        </div>

                        <div class="ig-plugin-meta">
                            <div class="ig-plugin-meta-item" title="<?php echo esc_attr( $rating ); ?>%">
                                <span class="dashicons dashicons-star-filled"></span>
								<?php echo esc_html( number_format( $stars, 1 ) ); ?>
                            </div>
                            <div class="ig-plugin-meta-item">
                                <span class="dashicons dashicons-download"></span>
								<?php echo esc_html( $install_count ); ?> <?php esc_html_e( 'Installs', 'team-builder-member-showcase' ); ?>
                            </div>
                        </div>

                        <div class="ig-plugin-actions">
                            <a href="<?php echo esc_url( $preview_url ); ?>" target="_blank" class="ig-btn ig-btn-secondary">
								<?php esc_html_e( 'Live Preview', 'team-builder-member-showcase' ); ?>
                            </a>
                            <a href="<?php echo esc_url( admin_url( 'theme-install.php?theme=' . $theme['slug'] ) ); ?>" class="ig-btn ig-btn-primary">
								<?php esc_html_e( 'Install Now', 'team-builder-member-showcase' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>
</div>

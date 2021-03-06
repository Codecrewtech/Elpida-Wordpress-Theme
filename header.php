<!DOCTYPE html>
<html <?php if ( get_theme_mod( 'baxel_ignore_pot', 1 ) && baxel_translation( '_Language' ) ) { echo 'lang="' . esc_attr( baxel_translation( '_Language' ) ) . '"'; } else { language_attributes(); } ?>>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>" />
		<?php wp_head(); ?>
	</head>

<?php
$baxel_header_style = get_theme_mod( 'baxel_header_style', 'topped_lefted_bboxed' );
$baxel_opt_LogoPos = substr( $baxel_header_style, 0, 6 );
$baxel_opt_MenuPos = substr( $baxel_header_style, 7, 6 );
$baxel_opt_MenuWidth = substr( $baxel_header_style, 14, 6 );
?>

<body <?php body_class(); ?>>

	<div class="hiddenInfo">
		<span id="mapInfo_Zoom"><?php echo esc_attr( get_theme_mod( 'baxel_map_zoom', 15 ) ); ?></span>
		<span id="mapInfo_coorN"><?php echo esc_attr( get_theme_mod( 'baxel_map_coordinate_n', 49.0138 ) ); ?></span>
		<span id="mapInfo_coorE"><?php echo esc_attr( get_theme_mod( 'baxel_map_coordinate_e', 8.38624 ) ); ?></span>
		<span id="owl_nav"><?php echo esc_attr( get_theme_mod( 'baxel_slider_nav', 1 ) ); ?></span>
		<span id="owl_autoplay"><?php echo esc_attr( get_theme_mod( 'baxel_slider_autoplay', 0 ) ); ?></span>
		<span id="owl_duration"><?php echo esc_attr( get_theme_mod( 'baxel_slider_duration', 4000 ) ); ?></span>
		<span id="owl_infinite"><?php echo esc_attr( get_theme_mod( 'baxel_slider_infinite', 1 ) ); ?></span>
		<span id="siteUrl"><?php echo esc_attr( get_home_url() ); ?></span>
		<span id="trigger-sticky-value"><?php echo esc_attr( get_theme_mod( 'baxel_trigger_sticky_menu', 300 ) ); ?></span>
		<span id="menu-logo-l-r"><?php if ( $baxel_opt_LogoPos == 'lefted' && $baxel_opt_MenuPos == 'mright' ) { echo 'true'; } ?></span>
		<span id="slicknav_apl"><?php echo esc_attr( get_theme_mod( 'baxel_slicknav_apl', 0 ) ); ?></span>
	</div>

    	<!-- Sticky Header -->
	    <?php if ( get_theme_mod( 'baxel_sticky_header', 0 ) ) { get_template_part( 'sticky-menu' ); } ?>
        <!-- /Sticky Header -->

        <!-- Mobile Header -->
				<div class="mobile-header clearfix">
					<div class="mobile-logo-outer">
						<div class="mobile-logo-container">
							<?php $stickyLogoPath = '';
							if ( get_theme_mod( 'baxel_logo_image' ) ) { $stickyLogoPath = get_theme_mod( 'baxel_logo_image' ); }
							if ( get_theme_mod( 'baxel_logo_image_sticky' ) ) { $stickyLogoPath = get_theme_mod( 'baxel_logo_image_sticky' ); }
							if ( get_theme_mod( 'baxel_mobile_logo_image' ) ) { $stickyLogoPath = get_theme_mod( 'baxel_mobile_logo_image' );	}
							if ( $stickyLogoPath ) { ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="theme-sticky-logo-alt" src="<?php echo esc_url( $stickyLogoPath ); ?>" /></a><?php } else { ?>
								<h1 class="logo-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							<?php } ?>
						</div>
					</div>
					<div class="mobile-menu-button"><i class="fa fa-navicon"></i></div>
					<div id="touch-menu"></div>
				</div>
        <!-- /Mobile Header -->

        <div class="site-top clearfix">
            <div class="site-top-container-outer clearfix">
            	<?php if ( $baxel_opt_LogoPos == 'topped' ) { get_template_part( 'logo' ); } ?>
                <div class="site-top-container clearfix">
                    <?php if ( $baxel_opt_LogoPos == 'lefted' ) { get_template_part( 'logo' ); if ( $baxel_opt_MenuPos == 'mright' ) { ?><div class="site-logo-outer-handler"></div><?php } } else { ?><div class="site-logo-left-handler"></div><?php } ?><?php get_template_part( 'primary-menu' ); ob_start( 'baxel_compress' ); get_template_part( 'social-search' ); ob_end_flush(); ?>
				</div>
                <?php if ( $baxel_opt_LogoPos == 'bottom' ) { get_template_part( 'logo' ); } ?>
            </div>
        </div>

        <div class="site-mid clearfix">

        	<?php /* Slider */
			if ( get_theme_mod( 'baxel_slider_posts', 0 ) ) {

				baxel_posts_to_slider();

			} else {

				baxel_insert_slider();

			}
			?>

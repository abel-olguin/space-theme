<?php

namespace Abolch\App;

class Menu {
	const MAIN_LOCATION   = 'space-main-menu';

	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'addMenu' ] );
	}

	public static function render( $location, $template ) {
        global $wp;

		$navItems   = wp_get_nav_menu_items( self::getMenuByLocation( $location ) );
        $noneActive = home_url() === home_url( $wp->request );
        $currentUrl = home_url( $wp->request ).'/';
		$menuItems = [];
		if ( ! $navItems ) {
			return;
		}
		foreach ( $navItems as $item ) {
			if ( ! $item->menu_item_parent ) {
				$menuItems[ $item->ID ]           = $item;
				$menuItems[ $item->ID ]->children = [];
			} else {
				$menuItems[ $item->menu_item_parent ]->children[] = $item;
			}
		}
		WpHelper::view( "menu-{$template}", compact( 'menuItems', 'currentUrl', 'noneActive' ) );
		// compact('menuItems') == ['menuItems' => $menuItems]
	}

	public static function getMenuByLocation( $location ) {
		$locations = get_nav_menu_locations();
        if(!$locations){
            return null;
        }
		return wp_get_nav_menu_object( $locations[ $location ] );
	}

	public function addMenu() {
		register_nav_menus(
			[
				self::MAIN_LOCATION   => __( 'Primary', 'space' ),
			]
		);
	}
}
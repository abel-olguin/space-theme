<?php

namespace Abolch\App;

class Space {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'themeScripts' ] );
	}

	public function themeScripts(): void {
		$this->scripts();
		$this->styles();
	}

	private function scripts(): void {
        wp_enqueue_script("jquery-ui-tabs");
		wp_enqueue_script( 'space_main_script', get_template_directory_uri() . '/dist/js/main.js', [ 'jquery' ],
		                   '0.9.0', true );
	}

	private function styles(): void {
		wp_enqueue_style( 'space_main_style', get_template_directory_uri() . '/dist/css/main.css', [], '0.9.0' );
	}
}
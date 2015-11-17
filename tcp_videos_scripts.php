<?php
function tcp_videos_scripts() {
	wp_enqueue_script("jquery");
	
		wp_enqueue_style( 'videos-css', plugins_url('assets/style/css/style.css', __FILE__) );

		
		wp_enqueue_script( 'videos-main', plugins_url('assets/script/main.js', __FILE__) , array(), '1.0.0', true );

		wp_enqueue_style( 'slick-css','//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css', array(), '3.0.3', 'all' );
		wp_enqueue_style( 'slick-css-theme','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css', array(), '3.0.3', 'all' );



		wp_enqueue_script( 'slick-js', 'http://cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js' , array(), '1.0.0', false );
		
				
}

add_action( 'wp_enqueue_scripts', 'tcp_videos_scripts' );

<?php
/*
Plugin Name: Hightlight your Post by hiding all other Element on page.
Plugin URI: http://www.najeebmedia.com/2011/07/21/post-highlighter-plugin/
Description: Let your readers to read your post without any disturbance.
Version: 1.1
Author: Najeeb Ahmad
Author URI: http://www.najeebmedia.com/
*/



//ini_set('display_errors',1);
//error_reporting(E_ALL);


class nmPostHighlighter{
	
	
	public function loadJS()
	{
		wp_deregister_script( 'jquery' );
    	wp_register_script( 'jquery', plugins_url('js/jquery-1.4.4.min.js', __FILE__));
	    wp_enqueue_script( 'jquery' );
		
		//Load custom script
        wp_register_script('custom',plugins_url('js/phl.js', __FILE__), 'jquery'); //'jquery_validator' is passed as a reference so that this loads AFTER the plugin
        wp_enqueue_script('custom');
	}
	
	
	
	function gluContent( $content ) {
		
		
		echo '<link rel="stylesheet" type="text/css" href="'.plugins_url('nm_lighton.css', __FILE__).'"/>';
		global $post;
		if($post->post_type == 'post' and is_single())
		{
			
			$highliter = '<div id="nm_button_container"><a class="nm_highlighter" href="javascript:showStart()" >Light off</a></div>';
			$content = $highliter.$content;
			//$this -> realStuff();
			
			//$this -> loadJS();
			//nmPostHighlighter::loadJS();	
		}
		
		return $content;
	} 
	
	
	
	
	
	function realStuff()
	{
		$file = dirname(__FILE__).'/nm_lighton_js.php';
		include($file);
	}
}

add_filter( 'the_content', array('nmPostHighlighter', 'gluContent'));

$nm_phl = new nmPostHighlighter();
$nm_phl -> loadJS();

?>
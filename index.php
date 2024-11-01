<?php
/*
Plugin Name: TGG - WP Optimizer
Plugin URI: https://www.geminigeeks.com/wordpress-plugin-wp-optimizer-tgg/
Description: Tweak various settings of WordPress like revisions, sitemaps, classic editor, blocks css,  excerpt length etc. Make sure to review the plugin settings after activation.
Version: 1.22
Author: Preetinder Singh
Author URI: https://www.geminigeeks.com
*/
defined( 'ABSPATH' ) || die( 'No Entry!' ); 

//Menu - Options page 
function wpotgg_register_options_page() {
  add_options_page('WP Optimizer', 'WP Optimizer', 'manage_options', 'wpotgg', 'wpotgg_options_page');
}
add_action('admin_menu', 'wpotgg_register_options_page');

//Add options
function wpotgg_register_settings() {
	add_option( 'wpotgg_emojis', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_emojis');
	add_option( 'wpotgg_blocks_css', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_blocks_css');
	add_option( 'wpotgg_duotone', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_duotone');
	add_option( 'wpotgg_wlwlink', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_wlwlink');
	add_option( 'wpotgg_rsdlink', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_rsdlink');
	add_option( 'wpotgg_wpgen', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_wpgen');
	add_option( 'wpotgg_feedlinks', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_feedlinks');
	add_option( 'wpotgg_restlink', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_restlink');
	add_option( 'wpotgg_oembed', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_oembed');
	add_option( 'wpotgg_shortlink', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_shortlink');
	add_option( 'wpotgg_prefetch', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_prefetch');
	add_option( 'wpotgg_autosave', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_autosave');
	add_option( 'wpotgg_moderation_links', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_moderation_links');
	add_option( 'wpotgg_redirect', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_redirect');
	add_option( 'wpotgg_classiceditor', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_classiceditor');
	add_option( 'wpotgg_classicwidgets', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_classicwidgets');
	add_option( 'wpotgg_xmlrpc', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_xmlrpc');
	add_option( 'wpotgg_urlfield', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_urlfield');
	add_option( 'wpotgg_authorsitemap', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_authorsitemap');
	add_option( 'wpotgg_categorysitemap', 'off'); register_setting( 'wpotgg_options_group', 'wpotgg_categorysitemap');
	add_option( 'wpotgg_imagemeta', 'off'); register_setting( 'wpotgg_options_group', 'wpotgg_imagemeta');
	add_option( 'wpotgg_emailverification', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_emailverification');
	add_option( 'wpotgg_excerptmore', 'on'); register_setting( 'wpotgg_options_group', 'wpotgg_excerptmore');
	add_option( 'wpotgg_excerptlength', '55'); register_setting( 'wpotgg_options_group', 'wpotgg_excerptlength');
	add_option( 'wpotgg_trash', '0'); register_setting( 'wpotgg_options_group', 'wpotgg_trash');
	add_option( 'wpotgg_revisions', '0'); register_setting( 'wpotgg_options_group', 'wpotgg_revisions');
}
add_action( 'admin_init', 'wpotgg_register_settings' );

//Options page
function wpotgg_options_page(){
	?>
	<style>
	
	#wpotgg table th, #wpotgg table td {padding:10px 10px 5px 0;font-size:16px;}	
	#wpotgg .switch {position: relative;display: inline-block;width: 36px;height: 20px;}	
	#wpotgg .switch input {opacity: 0;width: 0;height: 0;}	
	#wpotgg .slider {position: absolute;cursor: pointer;top: 0;left: 0;right: 0;bottom: 0;background-color: #ccc;-webkit-transition: .4s;transition: .4s;}	
	#wpotgg .slider:before {position: absolute;content: "";height: 16px;width: 16px;left: 2px;bottom: 2px;background-color: white;-webkit-transition: .4s;transition: .4s;}	
	#wpotgg input:checked + .slider {background-color: #66BB6A;}	
	#wpotgg input:focus + .slider {box-shadow: 0 0 1px #66BB6A;}	
	#wpotgg input:checked + .slider:before {-webkit-transform: translateX(16px);-ms-transform: translateX(16px);transform: translateX(16px);}	
	#wpotgg .slider.round {border-radius: 20px;}	
	#wpotgg .slider.round:before {border-radius: 50%;} 
	</style>

	<div class="wrap" id="wpotgg">
	<h1>TGG - WP Optimizer</h1>

	<form method="post" action="options.php">
		<?php 
			settings_fields('wpotgg_options_group');
			$wpotgg_emojis = get_option('wpotgg_emojis');
			$wpotgg_blocks_css = get_option('wpotgg_blocks_css');
			$wpotgg_duotone = get_option('wpotgg_duotone');
			$wpotgg_wlwlink = get_option('wpotgg_wlwlink');
			$wpotgg_rsdlink = get_option('wpotgg_rsdlink');
			$wpotgg_wpgen = get_option('wpotgg_wpgen');
			$wpotgg_feedlinks = get_option('wpotgg_feedlinks');
			$wpotgg_restlink = get_option('wpotgg_restlink');
			$wpotgg_oembed = get_option('wpotgg_oembed');
			$wpotgg_shortlink = get_option('wpotgg_shortlink');
			$wpotgg_prefetch = get_option('wpotgg_prefetch');
			$wpotgg_autosave = get_option('wpotgg_autosave');
			$wpotgg_moderation_links = get_option('wpotgg_moderation_links');
			$wpotgg_redirect = get_option('wpotgg_redirect');
			$wpotgg_classiceditor = get_option('wpotgg_classiceditor');
			$wpotgg_classicwidgets = get_option('wpotgg_classicwidgets');
			$wpotgg_xmlrpc = get_option('wpotgg_xmlrpc');
			$wpotgg_urlfield = get_option('wpotgg_urlfield');
			$wpotgg_authorsitemap = get_option('wpotgg_authorsitemap');
			$wpotgg_categorysitemap= get_option('wpotgg_categorysitemap');
			$wpotgg_imagemeta = get_option('wpotgg_imagemeta');
			$wpotgg_emailverification = get_option('wpotgg_emailverification');
			$wpotgg_excerptmore= get_option('wpotgg_excerptmore');
			$wpotgg_excerptlength = get_option('wpotgg_excerptlength');
			$wpotgg_trash = get_option('wpotgg_trash');
			$wpotgg_revisions = get_option('wpotgg_revisions');
		?>
		<table>
		<tr>
			<td>Disable Emojis</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_emojis"<?php if($wpotgg_emojis=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove Blocks CSS</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_blocks_css"<?php if($wpotgg_blocks_css=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove Gutenberg Duotone CSS</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_duotone"<?php if($wpotgg_duotone=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>

		<tr>
			<td>Remove WLW Manifest Link</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_wlwlink"<?php if($wpotgg_wlwlink=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove RSD Link</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_rsdlink"<?php if($wpotgg_rsdlink=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove WordPress Generator Tag</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_wpgen"<?php if($wpotgg_wpgen=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove Feed Links</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_feedlinks"<?php if($wpotgg_feedlinks=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove REST Link</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_restlink"<?php if($wpotgg_restlink=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove OEmbed Links</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_oembed"<?php if($wpotgg_oembed=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove Shortlink</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_shortlink"<?php if($wpotgg_shortlink=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove DNS Prefetch Links</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_prefetch"<?php if($wpotgg_prefetch=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Disable Autosave</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_autosave"<?php if($wpotgg_autosave=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Show Post/Comment Actions Links</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_moderation_links"<?php if($wpotgg_moderation_links=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Redirect to post/page on publish/update</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_redirect"<?php if($wpotgg_redirect=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Enable Classic Editor</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_classiceditor"<?php if($wpotgg_classiceditor=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Enable Classic Widgets</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_classicwidgets"<?php if($wpotgg_classicwidgets=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Disable XML RPC</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_xmlrpc"<?php if($wpotgg_xmlrpc=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Remove URL field from comment form</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_urlfield"<?php if($wpotgg_urlfield=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Disable author sitemap</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_authorsitemap"<?php if($wpotgg_authorsitemap=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Disable category sitemap</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_categorysitemap"<?php if($wpotgg_categorysitemap=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Set image caption on upload</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_imagemeta"<?php if($wpotgg_imagemeta=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Disable Wordpress Email Verification Prompts</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_emailverification"<?php if($wpotgg_emailverification=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Change excerpt ellipsis to '...'</td>
			<td><label class="switch"><input type="checkbox" name="wpotgg_excerptmore"<?php if($wpotgg_excerptmore=="on") { echo " checked";} ?>><span class="slider round"></span></label></td>
		</tr>
		<tr>
			<td>Excerpt length (Number of words)</td>
			<td><input type="number" name="wpotgg_excerptlength" value="<?php echo $wpotgg_excerptlength; ?>"></label></td>
		</tr>
		<tr>
			<td>Empty Trash Time</td>
			<td><select name="wpotgg_trash">
			<option value="5"<?php if($wpotgg_trash=="5") { echo " selected";} ?>>5 Days</option>
			<option value="10"<?php if($wpotgg_trash=="10") { echo " selected";} ?>>10 Days</option>
			<option value="20"<?php if($wpotgg_trash=="20") { echo " selected";} ?>>20 Days</option>
			<option value="30"<?php if($wpotgg_trash=="30") { echo " selected";} ?>>30 Days</option>
			<option value="365"<?php if($wpotgg_trash=="365") { echo " selected";} ?>>1 Year</option>
			<option value="0"<?php if($wpotgg_trash=="0") { echo " selected";} ?>>Disable Trash</option>
			</select></td>
		</tr>
		<tr>
			<td>Number of Post Revisions</td>
			<td><select name="wpotgg_revisions">
			<option value="0"<?php if($wpotgg_revisions=="0") { echo " selected";} ?>>Disable Revisions</option>
			<option value="1"<?php if($wpotgg_revisions=="1") { echo " selected";} ?>>1</option>
			<option value="2"<?php if($wpotgg_revisions=="2") { echo " selected";} ?>>2</option>
			<option value="3"<?php if($wpotgg_revisions=="3") { echo " selected";} ?>>3</option>
			<option value="4"<?php if($wpotgg_revisions=="4") { echo " selected";} ?>>4</option>
			<option value="5"<?php if($wpotgg_revisions=="5") { echo " selected";} ?>>5</option>
			<option value="10"<?php if($wpotgg_revisions=="10") { echo " selected";} ?>>10</option>
			<option value="20"<?php if($wpotgg_revisions=="20") { echo " selected";} ?>>20</option>
			<option value="-1"<?php if($wpotgg_revisions=="-1") { echo " selected";} ?>>Unlimited</option>
			</select></td>
		</tr>
		</table>
		<?php submit_button(); ?>
	</form>

	</div>
<?php
}


//Remove tinymce emoji plugin
function wpotgg_disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
//Disable emojis
function wpotgg_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
if(get_option('wpotgg_emojis') == "on") {
	add_action( 'init', 'wpotgg_disable_emojis' ); 
	add_filter( 'tiny_mce_plugins', 'wpotgg_disable_emojis_tinymce' );
}


//Remove Blocks CSS
function wpotgg_remove_wp_block_library_css(){
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
    wp_deregister_style('classic-theme-styles');
} 
if(get_option('wpotgg_blocks_css') == "on") {
	add_action( 'wp_enqueue_scripts', 'wpotgg_remove_wp_block_library_css', 100 );
}




//Remove Duotone CSS
if(get_option('wpotgg_duotone') == "on") {
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}


//Removes wlwmanifest link
if(get_option('wpotgg_wlwlink') == "on") {
	remove_action('wp_head', 'wlwmanifest_link'); 
}

//Removes RSD link
if(get_option('wpotgg_rsdlink') == "on") {
	remove_action('wp_head', 'rsd_link'); 
}

//Removes WP Version Code
if(get_option('wpotgg_wpgen') == "on") {
	remove_action('wp_head', 'wp_generator');
}

// Removes links to the general and extra feeds
if(get_option('wpotgg_feedlinks') == "on") {
	remove_action('wp_head', 'feed_links', 2 );
	remove_action('wp_head', 'feed_links_extra', 3 );
}


//Disable REST Link
if(get_option('wpotgg_restlink') == "on") {
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
}

//Disable OEmbed Discovery Links
if(get_option('wpotgg_oembed') == "on") {
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}

//Remove shortlink
if(get_option('wpotgg_shortlink') == "on") {
	remove_action('wp_head', 'wp_shortlink_wp_head'); 
}


//Remove DNS Prefetch Link
if(get_option('wpotgg_prefetch') == "on") {
	remove_action( 'wp_head', 'wp_resource_hints', 2 );
}

//Disable Auto Save
function wpotgg_no_autosave() {
	wp_deregister_script('autosave');
}
if(get_option('wpotgg_autosave') == "on") {
	add_action( 'wp_print_scripts', 'wpotgg_no_autosave' );
}

//Unhide post/comment action links
function wpotgg_unhide_moderation_links() {
	echo '<style type="text/css">.row-actions {visibility:visible;left:auto;}</style>';
}
if(get_option('wpotgg_moderation_links') == "on") {
	add_action('admin_head', 'wpotgg_unhide_moderation_links');
}


//Redirect to post/page on publish and update
function wpotggo_redirect_to_post_on_publish_or_save($location)
{
	global $post;
    if (
		(isset($_POST['save']) || isset($_POST['publish']) ) &&
		preg_match("/post=([0-9]*)/", $location, $match)  &&
		($post->post_type == "post" || $post->post_type == "page")
	)
	{
		$pl = get_permalink($match[1]);
		if ($pl) {
			$location = $pl;
		}		
    }
	return $location;
}
if(get_option('wpotgg_redirect') == "on") {
	add_filter('redirect_post_location', 'wpotggo_redirect_to_post_on_publish_or_save');
}

//Enable Classic Editor
if(get_option('wpotgg_classiceditor') == "on") {
	add_filter('use_block_editor_for_post','__return_false');
}

//Enable Classic Widgets
function wpotgg_enable_classic_widgets(){
	remove_theme_support( 'widgets-block-editor' );	
}
if(get_option('wpotgg_classicwidgets') == "on") {
	add_action( 'after_setup_theme', 'wpotgg_enable_classic_widgets' );
}


//Disable XML RPC
function wpotgg_remove_xmlrpc_methods( $methods ) {
  return array();
}
if(get_option('wpotgg_xmlrpc') == "on") {
	add_filter( 'xmlrpc_enabled', '__return_false' );
	add_filter( 'xmlrpc_methods', 'wpotgg_remove_xmlrpc_methods' );
}

//Remove URL field  from comments
function wpotgg_url_filtered($fields)
{
	if(isset($fields['url']))
	unset($fields['url']);
	return $fields;
}
if(get_option('wpotgg_urlfield') == "on") {
	add_filter('comment_form_default_fields', 'wpotgg_url_filtered');
}


//Disable Author Sitemap
function wpotgg_remove_users_sitemap($provider, $name)
{
    if ($name === "users") {
        return false;
    }
    return $provider;
}
if(get_option('wpotgg_authorsitemap') == "on") {
	add_filter('wp_sitemaps_add_provider', 'wpotgg_remove_users_sitemap', 10, 2);
}


//Disable category sitemap
function wpotgg_remove_category_sitemap($taxonomies) {
    unset($taxonomies['category']);
    return $taxonomies;
} 
if(get_option('wpotgg_categorysitemap') == "on") {
	add_filter( 'wp_sitemaps_taxonomies', 'wpotgg_remove_category_sitemap');
}


//Set image caption
function wpotgg_set_image_meta_after_image_upload( $post_ID ) {
	if ( wp_attachment_is_image( $post_ID ) ) {
		$my_image_title = get_post( $post_ID )->post_title;
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );
		$my_image_title = ucwords( strtolower( $my_image_title ) );
		$my_image_meta = array(
			'ID'		=> $post_ID,
			'post_excerpt'	=> $my_image_title,
		);
		wp_update_post( $my_image_meta );
	}
}
if(get_option('wpotgg_imagemeta') == "on") {
	add_action('add_attachment', 'wpotgg_set_image_meta_after_image_upload');
}

//Disable Wordpress Email Verification Prompts
if(get_option('wpotgg_emailverification') == "on" ) {
	add_filter( 'admin_email_check_interval', '__return_false' );
}


//Change excerpt more
function wpotgg_excerpt_more( $more ) {
	return '...';
}
if(get_option('wpotgg_excerptmore') == "on") {
	add_filter('excerpt_more', 'wpotgg_excerpt_more', 250);
}


//Change excerpt length
function wpotgg_excerpt_length( $length ) {
	if(get_option('wpotgg_excerptlength')) {
		$length = absint(get_option('wpotgg_excerptlength'));
	} else {
		$length = 55;
	}
    return $length;
}
if(get_option('wpotgg_excerptlength')) {
	add_filter( 'excerpt_length', 'wpotgg_excerpt_length', 999 );
}

//Empty trash time
if ( !defined( 'EMPTY_TRASH_DAYS' ) ){
	define( 'EMPTY_TRASH_DAYS', get_option('wpotgg_trash'));
}

//Number of post revisions
if ( !defined( 'WP_POST_REVISIONS' ) ){
	define( 'WP_POST_REVISIONS', get_option('wpotgg_revisions'));
}
?>
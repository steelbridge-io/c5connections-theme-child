<?phpadd_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );function theme_enqueue_styles() {	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );}// Add and remove scripts and stylesfunction remove_unwanted_scripts_and_styles_at_wp_enqueue_scripts() {		// Remove scripts	// Replace the “portion” part of any handle with the name of your Underscores parent theme	wp_dequeue_script( 'portion-navigation' );	wp_deregister_script( 'portion-navigation' );		// Remove styles	wp_dequeue_style( 'portion-style' );	wp_deregister_style( 'portion-style' );	wp_dequeue_style( 'wp-block-library' );	wp_deregister_style( 'wp-block-library' );	wp_dequeue_style( 'wp-block-library-theme' );	wp_deregister_style( 'wp-block-library-theme' );	wp_dequeue_style( 'wc-block-style' );	wp_deregister_style( 'wc-block-style' );	wp_dequeue_style( 'global-styles' );	wp_deregister_style( 'global-styles' );		// Add parent theme stylesheet	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );		// Add child theme stylesheet	wp_enqueue_style( 'c5-child-style', get_stylesheet_uri() );	}add_action( 'wp_enqueue_scripts',	'remove_unwanted_scripts_and_styles_at_wp_enqueue_scripts',	100 );// Remove wpemoji script and stylesremove_action( 'wp_head', 'print_emoji_detection_script', 7 );remove_action( 'wp_print_styles', 'print_emoji_styles' );// Remove WP-inserted svgs at start of bodyremove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );// Custom Post Typesinclude 'post-types/daily-stories.php';include 'post-types/weekly-plan.php';include 'post-types/exploration-projects.php';include 'post-types/news-notes.php';include 'post-types/flow-of-the-day.php';include 'post-types/classmates.php';// ACF excerptfunction custom_field_excerpt() {	$text = get_field('intro'); //Replace 'intro' with your field name	if($text !== null) {		$text = strip_tags($text);		$excerpt_length = 20; //Define how many words you want in your excerpt		$text = wp_trim_words($text, $excerpt_length);				// Generate 'Read More...' text linked to post's page		$text .= ' <a class="moretag" href="' . get_permalink() . '">Read More...</a>';	}	echo $text;}
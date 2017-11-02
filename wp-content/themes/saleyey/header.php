<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saleyey
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'saleyey' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="small-gap"></div>
		<div class="container">
			<div class="site-branding col-md-2">
				<?php
				the_custom_logo();
				?>
			</div><!-- .site-branding -->
		</div>
		<div class="small-gap"></div>
		<nav class="navbar navbar-inverse no-border-radius">
		  <div class="container">
		  	<?php
		  		$menu_terms = get_terms([
    			'taxonomy' => 'deal_type',
    			'hide_empty' => true,
			]);
		  		$i= 0;
			?>
		    <ul class="nav navbar-nav">
		      <?php foreach($menu_terms as $menu_term_key => $menu_term_value){ ?>
		      <li><a href="/deal-type/tutorials-online"><?php if($i < 10) {echo $menu_term_value->name; $i++; } ?></a></li>
		      <?php } ?>
		    </ul>
		  </div>
		</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

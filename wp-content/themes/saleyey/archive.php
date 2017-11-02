<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package saleyey
 */

get_header(); ?>
<?php
$args = array(
    'post_type' => 'deals', // or multiples : array('my_custom_post_type','post')
    'tax_query' => array(
        array(
            'taxonomy' => 'deal_type',
            'field'    => 'term_id',
            'terms'    => get_queried_object()->term_id,
        )
    )
);
$loop = new WP_Query( $args );
?>

		<div class="container">
	  <div class="row">
	  	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	  		<?php
	  	$post_id = get_the_ID();
	  	$custom_expiration = get_post_custom_values('sy_expiration', $post_id);
	  	$product_link = get_post_custom_values('sy_product_link', $post_id);
	  	$product_discounted_price = get_post_custom_values('sy_discounted_price', $post_id);
	  	$product_real_price = get_post_custom_values('sy_real_price', $post_id);
	  	?>
	      <div class="col-md-4 col-xs-12 col-md-12">
	        <div class="panel panel-default">
		         <div class="panel-heading">
		         	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php if(isset($custom_expiration)){ ?><span id="post-expiration"><?php echo countdown_timer($custom_expiration[0], $post_id); ?><?php } ?></span>
		         </div>
		         <div class="panel-body">
			         <div class="home-img-div">
			         	<?php the_post_thumbnail(); ?>
			         </div> 

			         <div class="the-excerpt">
			         	<?php the_excerpt(); ?>
			         </div>

			         <div class="home-tags">
			         	<?php 
			         		$product_terms = get_the_terms($post_id, 'deal_type');
			         			
			         			foreach($product_terms as $product_term_key => $product_term_value){
			         				$product_term_array = (array)$product_term_value->name;
				         			$product_term_name = str_replace(' ', '-', strtolower($product_term_array[0]));			 
				         			?> <a class="home-terms" href="<?php echo '/deal-type/'.$product_term_name; ?>">
				         			<?php echo $product_term_array[0].',</a> '; ?>
				         			 <?php
			         			}
			         	?>
			         </div>
			         <div class="home-post-button">
			         	<a href="<?php the_permalink(); ?>" class="btn btn-primary white-text-color-link pull-left">View Post</a>
			         	<a target="_blank" href="<?php if (isset($product_link)){ echo $product_link[0]; } ?>" class="btn btn-warning white-text-color-link pull-right">View Deal</a>
			         </div>
			         <div class="home-price">
			         	<?php if (isset($product_discounted_price)){ ?><p class="bg-success home-discounted-price pull-left"> <?php echo '$'.$product_discounted_price[0];  ?></p>
			         	<?php 
			         	if (isset($product_discounted_price) && isset($product_real_price)){
			         		$product_you_save = floor(($product_discounted_price[0]/$product_real_price[0]) * 100); ?>
			         	<p class="bg-danger home-real-price pull-right"> <?php echo '$'.$product_real_price[0]; } ?></p>
			         	<p class="home-you-save text-center"><?php echo '- '.$product_you_save.'%'; }?> </p>
			         </div>
		     	</div> <!-- End of panel-body -->
	        </div> <!-- End of panel panel-default -->
	         
	      </div>
<?php endwhile; ?>
	     
	      
	  </div>
	</div>

<?php
get_sidebar();
get_footer();

<?php

// get the display option size

$cex = get_page_by_title( 'Kitchen Makeover', $output, 'post' );
$compsize = 'small-landscape';
								
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>

							<!-- begin before/after placement -->	
							<div class="center-block" style="width:400px;">
								<div id="container">
								<?php
									// get before and after images from post meta
									$before_url = get_post_meta( $cex->ID, 'before_img', $single = true); 								
									$after_url = get_post_meta( $cex->ID, 'after_img', $single = true); 
								
									// add the file size name mods
									// create the file name mods for the size chosen, the way wordpress
									// adds -{width}c{width}.jpg
									$file_size_name = '-' . $comp_size_options[$compsize][0] . 'x' . $comp_size_options[$compsize][1];
									$before_url = str_replace('.jpg', $file_size_name . '.jpg', $before_url);
									$after_url = str_replace('.jpg', $file_size_name . '.jpg', $after_url);
									?>
								
									<div><img alt="before" src="<?php echo $before_url?>" width="<?php echo $comp_size_options[$compsize][0]?>" height="<?php echo $comp_size_options[$compsize][1]?>" /></div>
									<div><img alt="after" src="<?php echo $after_url?>" width="<?php echo $comp_size_options[$compsize][0]?>" height="<?php echo $comp_size_options[$compsize][1]?>" /></div>
								</div>
							</div>
							<!-- end before/after placement -->							
							
							
					
						</section> <!-- end article section -->
						
						<footer>
			
							
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					
					<?php endwhile; ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
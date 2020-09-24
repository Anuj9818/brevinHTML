<?php
get_header();
if(have_posts()): ?>
	<section id="subpage-top">
		<div class="container">
			<h1>Our Team</h1>
		</div>
	</section>
	<section id="subpage-wrap">
		<div class="container clearfix">
			<div id="subpage-full" class="post"><?php
				while(have_posts()): the_post(); ?>
					<div class='team_list'>
						<h3><?php the_title(); ?></h3>
						<h4><?php the_field('designation'); ?></h4><?php
						$image = AttachmentImage ( get_the_id() ,'team' );
						if( $image ){ ?>
						  <img u="image" src="<?php echo $image['src'] ?>" alt="<?php echo $image['alt'] ?>"><?php
						} ?>
					</div><?php
				endwhile;wp_reset_postdata(); ?>
			</div>
		</div>
	</section><?php
endif;
get_footer(); ?>
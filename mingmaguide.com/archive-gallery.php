<?php 
get_header(); 
if(have_posts());?>
  <!-- breadkcrumb wrapper starts here -->
  <div class="breadcrumb-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
              <h2>Gallery</h2>            
          </div>
          </div>
      </div>
  </div>
  <!-- Gallery Section --><?php
  paged = ( get_query_var('cpage')) ? get_query_var('cpage') : 1; 
  $gallery = new wp_query(['post_type'=>'gallery','paged'=>$paged ,'posts_per_page'=>12 ,'orderby'=>'date' , 'order'=>'desc']);
  if($gallery->have_posts()):   ?>
    <section class="section-padding recents-section">
      <div class="container">
        <div class="row"><?php 
          while($gallery->have_posts()): $gallery->the_post(); ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="recent-block"><?php
                $image = AttachmentImage(get_the_id() , 'gallery'); 
                if($image){ ?>
                    <img src="<?php echo $image['src'] ?>" alt="<?php echo $image['alt'] ?>" class="img-responsive responsive--full wp-post-image"><?php 
                } ?>
                <div class="recent-content"><hr>
                  <div class="clearfix"></div>
                    <a href="media-gallery.php"><h2><?php the_title(); ?></h2> </a>      
                </div>
              </div>
            </div><?php
          endwhile; wp_reset_postdata();?>
        </div><?php 
          $total_pages= $gallery->max_num_pages;                
          $pagination_args=array(
               'base' => add_query_arg( 'cpage', '%#%' ),
               'format' => '',
               'prev_text' => __('&laquo'),
               'next_text' => __('&raquo'),
               'total' => $total_pages,
               'current' => $paged,           
            );
          $paginate_links = paginate_links($pagination_args);
          if($paginate_links){ ?>
          <p class="pagination">
               <?= $paginate_links; ?>
            </p>
         <?php } ?>
      </div>
    </section>
    <!-- /gallery Section --><?php
  endif;
  get_footer(); ?>
  

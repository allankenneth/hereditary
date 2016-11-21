<?php get_header() ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="container">

	<div class="row">
	<div class="col-md-12">
		<?php if ( !is_front_page() ): ?>
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Home</a></li>
		<?php $ancestors= get_ancestors($post->ID, 'page'); ?>
		<?php if($ancestors): ?>
		<?php $ancestors = array_reverse($ancestors) ?>
		<?php foreach($ancestors as $parent): ?>
		<li class="breadcrumb-item"><a href="<?php echo get_permalink($parent); ?>">
			<?php echo get_the_title($parent); ?>
		</a></li>
		<?php endforeach; ?>
		<?php endif; ?>
		<li class="breadcrumb-item active"><?php the_title() ?></li>
		</ol>
		<?php endif; ?>
	</div>
	<div class="row">
	<div class="col-md-12">
	
	<?php $video = get_post_meta($post->ID, 'Video', true); ?>
	<?php if($video): ?>
		<?php echo bsreference_video_embed($video); ?>
	<?php endif; ?>
	</div>
	</div>
	<div class="col-md-8 offset-md-2">
<?php $pageheader = get_theme_mod("hereditary_pageheader"); ?>
		<h1 style="color:<?php echo $pageheader ?>" class="pagetitle"><?php the_title() ?></h1>

	</div>
	<div class="col-md-8 offset-md-2">
	<div class="row">

<?php


    $mainbgtxtclass = get_theme_mod("hereditary_content_text");
    $mainbgcolor = get_theme_mod("hereditary_contentbg");
    $excludes = get_theme_mod("hereditary_excludepages");
    $children = get_pages('child_of='.$post->ID);
    $parent = $post->post_parent;
    $siblings =  get_pages('child_of='.$parent);
    // &$output, $page, $depth, $args, $current_page
    if( count($children) != 0) {
       $args = array(
         'depth' => 1,
	 'exclude' => $excludes,
         'title_li' => '',
         'child_of' => $post->ID,
	 'walker'   => new Sidenav_walker()
       );

    } elseif($parent != 0) {
        $args = array(
             'depth' => 1,
	     'exclude' => $excludes,
             'title_li' => '',
             'child_of' => $parent,
	     'walker'   => new Sidenav_walker()
           );
    }
    //Show pages if this page has more than one sibling
    // and if it has children
    if(count($siblings) > 1 && !is_null($args)): ?>
	<div class="col-md-4">
  <button class="btn-section btn btn-sm btn-block btn-secondary hidden-sm-up" type="button" data-toggle="collapse" data-target="#sectionNav">
    &#9776; Sections
  </button>
<div class="collapse navbar-toggleable-xs" id="sectionNav">

         <ul class="list-group">
         <?php wp_list_pages($args);  ?>
         </ul>
</div>
	</div>
    <?php endif; ?>
	<div class="col-md-8">
		<div class="featured-image">
			<?php the_post_thumbnail() ?>
		</div>
		<div class="<?php echo $mainbgtxtclass ?>" style="background: <?php echo $mainbgcolor ?>;">
		<?php the_content() ?>
		</div>
		<div><?php edit_post_link( __( 'Edit' )); ?></div>
	</div>
</div>
</div>
</div>

<?php endwhile; ?>

</div>
</div>
<?php get_footer() ?>

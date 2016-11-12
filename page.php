<?php get_header() ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php $video = get_post_meta($post->ID, 'Video', true); ?>
	<?php if($video): ?>
		<?php echo bsreference_video_embed($video); ?>
	<?php endif; ?>

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
		<h1 class="pagetitle"><?php the_title() ?></h1>

	</div>

	<div class="col-md-3">
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#sectionNav">
    &#9776; Sections
  </button>
<div class="collapse navbar-toggleable-xs" id="sectionNav">

<?php
    //GET CHILD PAGES IF THERE ARE ANY
    $children = get_pages('child_of='.$post->ID);

    //GET PARENT PAGE IF THERE IS ONE
    $parent = $post->post_parent;

    //DO WE HAVE SIBLINGS?
    $siblings =  get_pages('child_of='.$parent);

    if( count($children) != 0) {
       $args = array(
         'depth' => 1,
	 'exclude' => '',
         'title_li' => '',
         'child_of' => $post->ID,
	 'walker'   => new Sidenav_walker()
       );

    } elseif($parent != 0) {
        $args = array(
             'depth' => 1,
	     'exclude' => '307,305',
             'title_li' => '',
             'child_of' => $parent,
	     'walker'   => new Sidenav_walker()
           );
    }
    //Show pages if this page has more than one sibling
    // and if it has children
    if(count($siblings) > 1 && !is_null($args))
    {?>
         <ul class="list-group">
         <?php wp_list_pages($args);  ?>
         </ul>
    <?php } ?>
</div>
<hr>
	</div>
	<div class="col-md-9">
		<div class="featured-image">
			<?php the_post_thumbnail() ?>
		</div>
		<?php the_content() ?>
		<div><?php edit_post_link( __( 'Edit' )); ?></div>
	</div>
</div>
</div>

<?php endwhile; ?>

</div>
</div>
<?php get_footer() ?>

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
		<?php echo hereditary_video_embed($video); ?>
	<?php endif; ?>
	</div>
	</div>
	<div class="col-md-8 offset-md-2">
		<h1 class="display-3 pagetitle"><?php the_title() ?></h1>
	</div>
	<div class="col-md-8 offset-md-2">
	<div class="row">
<?php
    $mainbgtxtclass = get_theme_mod("hereditary_content_text");
    $excludes = get_theme_mod("hereditary_excludepages");
    $mainbgcolor = get_theme_mod("hereditary_contentbg");
    $pagemeta = get_theme_mod("hereditary_pagemeta");
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
  <button class="btn btn-sm btn-block hidden-sm-up section-menu" type="button" data-toggle="collapse" data-target="#sectionNav">
    &#9776; Sections
  </button>
<div class="collapse navbar-toggleable-xs" id="sectionNav">

         <ul class="nav nav-pills nav-stacked">
         <?php wp_list_pages($args);  ?>
         </ul>
</div>
		<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'page-sidebar' ); ?>
		<?php endif; ?>

	</div>
    <?php endif; ?>
	<div class="col-md-8">
		<div class="featured-image">
			<?php the_post_thumbnail() ?>
		</div>

		<div class="<?php echo $mainbgtxtclass ?> maincontentbg">
		<?php the_content() ?>
		<?php if($pagemeta): ?>
		<div class="postedon">
			<p>Created: <?php the_time('l, F jS, Y') ?> by: <?php the_author_posts_link(); ?></p>
			<div id="users">
			<?php wp_dropdown_users(array('name' => 'author', 'echo' => 0)); ?>
			</div>
		</div>
		<?php endif; ?>
		</div>
		<div><?php edit_post_link( __( 'Edit' )); ?></div>
		<?php if(comments_open()): ?>
		<div class="card">
			<div class="card-block">
			<?php comments_template(); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
</div>

<?php endwhile; ?>

</div>
</div>
<?php get_footer() ?>

<?php
/*
Template Name: Blog Master Page
*/

	get_header();
?>

<?php 
	extract(etheme_get_page_sidebar());
?>


<div class="container">
	<?php if ($page_heading != 'disable' && ($page_slider == 'no_slider' || $page_slider == '')): ?>
		<div class="page-heading bc-type-<?php etheme_option('breadcrumb_type'); ?>">
			<div class="container">
				<div class="row-fluid">
					<div class="span12 a-center">
						<h1 class="title"><span><?php the_title(); ?></span></h1>
						<?php etheme_breadcrumbs(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>


	<div class="row-fluid">
		<div class="span8">
			<h1 class="size_45">WELCOME TO THE <span class="my_amatic">IT ENGINE ROOM...</span></h1>
			<!--<?php echo do_shortcode('[get_my_categories]'); ?>-->
			<div class="row-fluid"><?php echo do_shortcode('[get_latest_blog_posts]');?></div>
		</div>

		<?php if($position == 'right' || ($responsive == 'bottom' && $position == 'left')): ?>
			<div class="span4 sidebar sidebar-right">
				<?php etheme_get_sidebar($sidebarname); ?>
			</div>
		<?php endif; ?>

<?php /*
	<div class="span3"><?php 
    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?><?php endif; ?>Sidebar code needs to go here<img class="aligncenter size-full wp-image-177" src="http://173.254.98.38/~boblands/wp-content/uploads/2014/12/bob-on-chair.png" alt="bob-on-chair" width="194" height="303" />
<div style="border-bottom: 1px solid #ebebeb; border-top: 1px solid #ebebeb; margin-bottom: 20px; padding: 20px 0;"><h4 style="color: #000000; display: block; font-family: 'Oswald',sans-serif; font-weight: normal;
letter-spacing: 1px; margin-bottom: 0px;">STAY IN TOUCH</h4></div>
<div style="text-align: center; font-size: 16px;">Enter your details below to stay in touch, and receive updates direct to your inbox</div>
<div style="width: 100%; max-width: 350px; margin: 10px auto;">
<form action="//youmitter.us4.list-manage.com/subscribe/post?u=c1cc55ce1c28e13632ca6eb7f&amp;id=36afcbf17d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
   
	
	<input type="text" value="First Name" name="FNAME" class="" id="mce-FNAME" onFocus="this.value=''" style="width: 100%; height: 40px; border: 1px solid #ccc; padding-left: 6px; margin-bottom: 5px;">

	
	<input type="text" value="Last Name" name="LNAME" class="" id="mce-LNAME" onFocus="this.value=''" style="width: 100%; height: 40px; border: 1px solid #ccc; padding-left: 6px; margin-bottom: 5px;">

	
	<input type="email" value="Email Address" name="EMAIL" class="required email" onFocus="this.value=''" id="mce-EMAIL" style="width: 100%; height: 40px; border: 1px solid #ccc; padding-left: 6px; margin-bottom: 5px;">
	    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c1cc55ce1c28e13632ca6eb7f_36afcbf17d" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" style="background: url('http://173.254.98.38/~boblands/wp-content/themes/legenda-child/images/arrow_right_orange.png') no-repeat scroll 92% center rgba(0, 0, 0, 0); border: 2px solid #fe8800; color: #fe8800; display: inline-block; font-family: 'Oswald',sans-serif !important; margin-top: 20px; padding: 10px 40px 10px 20px; text-transform: uppercase;"></div>
    
</form>
</div>
<div style="border-bottom: 1px solid #ebebeb; border-top: 1px solid #ebebeb; margin-bottom: 20px; padding: 20px 0;"><h4 style="color: #000000; display: block; font-family: 'Oswald',sans-serif; font-weight: normal;
letter-spacing: 1px; margin-bottom: 0px;">RECENT ARTICLES</h4></div>
<?php echo do_shortcode('[get_latest_articles]'); ?><br />
</div> */?>
	</div>

	<div class="post-navigation">
		<?php wp_link_pages(); ?>
	</div>
	<!--
	<?php if(have_posts()): while(have_posts()) : the_post(); ?>
						
		<?php the_content(); ?>

		<div class="post-navigation">
			<?php wp_link_pages(); ?>
		</div>

	<?php endwhile; endif;?>
	-->
</div>
<?php
	get_footer();
?>
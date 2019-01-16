<?php
/* Template Name: Event Avail Edit */

 /*
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php
    $current_user = wp_get_current_user();
    $event_avail = get_metadata('event', $current_user->id, 2, false);

    print_r($event_avail);
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>
	
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<script type="text/javascript">
jQuery(document).ready( function () {
    jQuery('#contacts_table').DataTable(
    {
    	"autoWidth": true
    }
    );
} );
</script>


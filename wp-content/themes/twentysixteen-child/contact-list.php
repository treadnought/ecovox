<?php
/* Template Name: Contact List */

 /*
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php

global $wpdb;

$query = "SELECT * FROM contact_list WHERE FirstName NOT IN ('Robbie', 'Vera')";

$contacts = $wpdb->get_results($query);

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
	
	<p>To edit your details, click on 'Edit My Details' under 'Things' at right ></p>
        
        <table id="contacts_table">
	<col style="width:15%">
        <col style="width:15%">
        <col style="width:35%">
        <col style="width:15%">
        <col style="width:20%">        
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Home</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tbody>
	        <?php foreach($contacts as $contact) { ?>
	        <tr>
	            <td><?=$contact->FirstName?></td>
	            <td><?=$contact->LastName?></td>
	            <td><a href="mailto:<?=$contact->Email?>"><?=$contact->Email?></a></td>
	            <td><?=$contact->Home?></td>
	            <td><?=$contact->Mobile?></td>
	        </tr>
	        <?php } ?>
	</tbody>
    </table>

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


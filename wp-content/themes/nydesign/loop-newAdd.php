<?php
print_r($_FILES);

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == "annons") {

	echo "string";

//store our post vars into variables for later use
//now would be a good time to run some basic error checking/validation
//to ensure that data for these values have been set
 if (isset ($_POST['titel'])) {
        $title =  $_POST['titel'];
    } else {
        echo 'Vänligen skriv in ett namn på din annons';
    }
$content   = $_POST['annonstext'];
$post_type = 'annons';
$username = $_POST['userName'];
$email = $_POST['email'];
$telefon = $_POST['phone'];
$plats = $_POST['plats'];    
$kommun = $_POST['kommun'];
$postnummer = $_POST['postnummer'];
$kategori = $_POST['kategori'];
$annonstext = $_POST['annonstext'];
$pris = $_POST['pris'];
$bild = $_POST['bild'];

//the array of arguements to be inserted with wp_insert_post
$new_post = array(
'post_title'    => $title,
'post_content'  => $content,
'post_status'   => 'publish',          
'post_type'     => $post_type 
);

//insert the the post into database by passing $new_post to wp_insert_post
//store our post ID in a variable $pid




$pid = wp_insert_post($new_post,$wp_error);

echo $wp_error;

print_r($bild);

//Image upload

// Check that the nonce is valid, and the user can edit this post.
if ( 
	isset( $_POST['my_image_upload_nonce'] ) 
	&& wp_verify_nonce( $_POST['my_image_upload_nonce'], 'bild' )
	&& current_user_can( 'edit_post', $pid )
) {

// do the validation and storage stuff
$attachment_id = media_handle_upload( $bild, $pid );

	if ( is_wp_error( $attachment_id ) ) {
		// There was an error uploading the image.
		echo "ERROR UPLOADING";
		print_r($attachment_id);
	} else {
		// The image was uploaded successfully!
		echo "success";
	}


} else {

	// The security check failed, maybe show the user an error.
	echo "security check failed";
}



//we now use $pid (post id) to help add out post meta data
add_post_meta($pid, 'name', $username, true);
add_post_meta($pid, 'email', $email, true);
add_post_meta($pid, 'telefon', $telefon, true);
add_post_meta($pid, 'plats', $plats, true);
add_post_meta($pid, 'kommun', $kommun, true);
add_post_meta($pid, 'postnummer', $postnummer, true);
add_post_meta($pid, 'kategori', $kategori, true);
add_post_meta($pid, 'rubrik', $Rubrik, true);
add_post_meta($pid, 'annonstext', $annonstext, true);
add_post_meta($pid, 'pris', $pris, true);
add_post_meta($pid, 'bild', $bild, true);

}


?>


<div class="single-page wrap">
	<section id="add-add">
		
		<div class="container">
			<?php if (is_page()): the_post() ?>
			<div class="row">
				<div class="col-md-9">
					<form method="post" name="new_annons" action="" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-6">
								<label>Användarnamn</label>
							</div>
							<div class="col-sm-6">
								<input type="text" name="userName">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Email</label>
							</div>
							<div class="col-sm-6">
							<input type="text" name="email">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Telefon</label>
							</div>
							<div class="col-md-6">
							<input type="text" name="phone">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label for="palts">Plats</label>
							</div>
							<div class="col-sm-6">
								<select name="plats">
									<option>Uppsala</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Kommun</label>
							</div>
							<div class="col-sm-6">
								<select name="kommun">
									<option>Uppsala</option>
								</select>
							</div>
						</div>
						<div class="row">
						<div class="col-sm-6">
							<label>Postnummer</label>
						</div>
						<div class="col-md-6">
							<input type="text" name="postnummer">
						</div>
						</div>
						<div class="row">
						<div class="col-sm-6">
							<label>Kategori</label>
						</div>
						<div class="col-md-6">
							<select>
								<option>Bil</option>
							</select>
						</div>
						</div>
						<div class="row">
						<div class="col-md-6">
						<label>Rubrik</label>
						</div>
						<div class="col-md-6">
						<input type="text" name="titel">
						</div>
						</div>
						<div class="row">
						<div class="col-md-6">
							<label>Annonstext</label>
						</div>
						<div class="col-md-6">
							<textarea name="annonstext">
							
							</textarea>
						</div>
						</div>
						<div class="row">
						<div class="col-md-6">
							<label>Pris</label>
						</div>
						<div class="col-md-6">
							<input type="text" name="pris">
						</div>
						</div>
						<div id="image-upload" class="row">
						<div class="col-md-6">
							<label>Annonsbild</label>
						</div>
						<div class="col-md-6">
							<input type="file" name="bild" id="bild" multiple="false">
						</div>
						<?php wp_nonce_field( 'bild', 'my_image_upload_nonce' ); ?>
						</div>
						<div class="row">
						<div class="col-md-12">
							<label>Godkänn vilkor och övrigt</label>
						</div>
						<div class="col-md-3">
							<input type="checkbox" name="option" value="Bike">Jag vill inte bli kontaktad av telefonförsäljare
</div>
<div class="col-md-3">
							<input type="checkbox" name="vehicle" value="Car">Jag godkänner villkoren
							</div>
						</div>
						<input type="submit">
						<input type="hidden" name="action" value="annons" />
					</form>



<!--

					<form id="featured_upload" method="post" action="#" enctype="multipart/form-data">
	<input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" />
	<input type="hidden" name="post_id" id="post_id" value="55" />
	<?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
	<input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" />
</form>

-->


				</div>
			</div>
			<?php //the_content(); ?>
			
			<h1>Fyll i formuläret för att börja fylla i din annons</h1>
			
		</div>
	</section>
	<?php endif; ?>
</div>



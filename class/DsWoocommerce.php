<?php

class DsWoocommerce{

	private function check_dropshifty_product(){

	}


	public function create_product($sku, $title, $desc, $img, $price){

		$post = array(
		    'post_author' => get_current_user_id(),
		    'post_content' => apply_filters('the_content', $desc),
		    'post_status' => "publish",
		    'post_title' => $title,
		    'post_parent' => '',
		    'post_type' => "product",
		);

		$post_id = wp_insert_post( $post, true );
		$this->Generate_Featured_Image($img, $post_id);
		
		//wp_set_object_terms( $post_id, 'Races', 'product_cat' );
		wp_set_object_terms( $post_id, 'simple', 'product_type');

		update_post_meta( $post_id, '_visibility', 'visible' );
		update_post_meta( $post_id, '_stock_status', 'instock');
		update_post_meta( $post_id, 'total_sales', '0');
		update_post_meta( $post_id, '_downloadable', 'no');
		update_post_meta( $post_id, '_virtual', 'no');
		update_post_meta( $post_id, '_regular_price', $price );
		update_post_meta( $post_id, '_purchase_note', "" );
		update_post_meta( $post_id, '_featured', "no" );
		update_post_meta( $post_id, '_sku', $sku);
		update_post_meta( $post_id, '_product_attributes', array());
		update_post_meta( $post_id, '_sale_price_dates_from', "" );
		update_post_meta( $post_id, '_sale_price_dates_to', "" );
		update_post_meta( $post_id, '_price', $price );
		update_post_meta( $post_id, '_sold_individually', "" );
		update_post_meta( $post_id, '_manage_stock', "no" );
		update_post_meta( $post_id, '_backorders', "no" );
		update_post_meta( $post_id, '_stock', "" );
		update_post_meta( $post_id, '_product_image_gallery', $img);

		return true;	

	}

	private function Generate_Featured_Image( $image_url, $post_id  ){
	    $upload_dir = wp_upload_dir();
	    $image_data = file_get_contents($image_url);
	    $filename = basename($image_url);
	    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
	    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
	    file_put_contents($file, $image_data);

	    $wp_filetype = wp_check_filetype($filename, null );
	    $attachment = array(
	        'post_mime_type' => $wp_filetype['type'],
	        'post_title' => sanitize_file_name($filename),
	        'post_content' => '',
	        'post_status' => 'inherit'
	    );
	    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
	    require_once(ABSPATH . 'wp-admin/includes/image.php');
	    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
	    $res2= set_post_thumbnail( $post_id, $attach_id );
	}
}
<?php

class DsWoocommerce{


	public function create_product($sku = "ok"){

		$post = array(
		    'post_author' => get_current_user_id(),
		    'post_content' => '',
		    'post_status' => "publish",
		    'post_title' => "Produit de test",
		    'post_parent' => '',
		    'post_type' => "product",
		);

		$post_id = wp_insert_post( $post, true );
		
		wp_set_object_terms( $post_id, 'Races', 'product_cat' );
		wp_set_object_terms($post_id, 'simple', 'product_type');

		update_post_meta( $post_id, '_visibility', 'visible' );
		update_post_meta( $post_id, '_stock_status', 'instock');
		update_post_meta( $post_id, 'total_sales', '0');
		update_post_meta( $post_id, '_downloadable', 'yes');
		update_post_meta( $post_id, '_virtual', 'yes');
		update_post_meta( $post_id, '_regular_price', "1" );
		update_post_meta( $post_id, '_sale_price', "1" );
		update_post_meta( $post_id, '_purchase_note', "" );
		update_post_meta( $post_id, '_featured', "no" );
		update_post_meta( $post_id, '_weight', "" );
		update_post_meta( $post_id, '_length', "" );
		update_post_meta( $post_id, '_width', "" );
		update_post_meta( $post_id, '_height', "" );
		update_post_meta($post_id, '_sku', "");
		update_post_meta( $post_id, '_product_attributes', array());
		update_post_meta( $post_id, '_sale_price_dates_from', "" );
		update_post_meta( $post_id, '_sale_price_dates_to', "" );
		update_post_meta( $post_id, '_price', "1" );
		update_post_meta( $post_id, '_sold_individually', "" );
		update_post_meta( $post_id, '_manage_stock', "no" );
		update_post_meta( $post_id, '_backorders', "no" );
		update_post_meta( $post_id, '_stock', "" );
		update_post_meta( $post_id, '_product_image_gallery', '');

	}
}
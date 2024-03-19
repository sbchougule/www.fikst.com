<?php
require_once plugin_dir_path( __DIR__ ) . 'includes/class-expertrecsearch-client.php';

class Expertrecsearch_Admin {


	private $plugin_name;

	private $version;

	private $demo_site_id;

	public function __construct( $plugin_name, $version ) {
		do_action( 'er/init', 'In admin construct' );
		$this->plugin_name  = $plugin_name;
		$this->version      = $version;
		$this->demo_site_id = '58c9e0e4-78e5-11ea-baf0-0242ac130002';
		add_filter( 'plugin_action_links', array( $this, 'addExpertrecPluginActionLinks' ), 10, 2 );
	}

	public function enqueue_styles() {
		do_action( 'er/init', 'In enqueue_styles' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __DIR__ ) . 'assets/css/expertrecsearch-admin.css', array(), $this->version, 'all' );
	}


	public function expertrec_transition_post_status( $new_status, $old_status, $post ) {

		do_action( 'er/debug', 'In transition post status hook' );

		$compare_post_created_and_modified_date = expertrec_compare_post_created_and_modified_date( $post );

		if ($compare_post_created_and_modified_date) {
			do_action( 'er/debug', 'Post created and modified date are same, hence returning' );
			return;
		}

		if ( ! expertrec_is_selected_doc_type_match( $post->post_type ) ) {
			do_action( 'er/debug', 'selected doc types not matched with post_type, hence returning' );
			return;
		}

		do_action( 'er/debug', 'In transition post status hook - looking for publish=>x' );

		$site_id = get_option( 'expertrec_options' )['site_id'];

		if ( $site_id != $this->demo_site_id ) {
			$client = new ExpClient();

			if ( 'publish' == $new_status ) {
				do_action( 'er/debug', 'publish detected, indexing publish=>' . $new_status );

				$client->indexDoc( $post->ID, 'expertrec_transition_post_status' );
			} elseif ( 'publish' == $old_status ) {
				do_action( 'er/debug', 'unpublish detected, deleting publish=>' . $new_status );

				$client->deleteDoc( $post->ID, 'expertrec_transition_post_status' );
			}
		}
	}


	public function expertrec_future_to_publish( $post ) {
		do_action( 'er/debug', 'In expertrec future to publish' );

		if ( ! expertrec_is_selected_doc_type_match( $post->post_type ) ) {
			do_action( 'er/debug', 'selected doc types not matched with post_type, hence returning' );
			return;
		}

		if ( 'publish' == $post->post_status ) {
			$site_id = get_option( 'expertrec_options' )['site_id'];
			if ( $site_id != $this->demo_site_id ) {
				$client = new ExpClient();
				$client->indexDoc( $post->ID, 'expertrec_future_to_publish');
			}
		}
	}

	public function expertrec_save_post( $postId ) {
		do_action( 'er/debug', 'Post saved hook triggered' );
		$option = get_option( 'expertrec_options' );
		if ( ! $option ) {
			return;
		}
		$site_id = $option['site_id'];

		$post = get_post( $postId );

		$compare_post_created_and_modified_date = expertrec_compare_post_created_and_modified_date( $post );

		if ( ! $compare_post_created_and_modified_date) {
			do_action( 'er/debug', 'Post created and modified date are same, hence returning' );
			return;
		}

		if ( ! expertrec_is_selected_doc_type_match( $post->post_type ) ) {
			do_action( 'er/debug', 'selected doc types not matched with post_type, hence returning' );
			return;
		}

		do_action( 'er/debug', 'Post new status (looking for publish) got ' . $post->post_status );

		if ( 'publish' == $post->post_status ) {
			do_action( 'er/debug', 'published state, triggering a index hit' );

			if ( $site_id && $site_id != $this->demo_site_id ) {
				$client = new ExpClient();
				$client->indexDoc( $postId, 'expertrec_save_post' );
			}
		} else {
			do_action( 'er/debug', 'not published state, ignoring' );
			1 == 1;
		}
	}

	public function expertrec_trashed_post( $postId ) {
	}

	public function expertrec_stock_status_change( $product_id, $product_stock_status, $product ) {

		do_action('er/debug', "In expertrec stock status change, product ID - $product_id, current status - $product_stock_status");

		$prodcut_date_created  = $product->date_created;
		$prodcut_date_modified = $product->date_modified;

		if ( $prodcut_date_created == $prodcut_date_modified || ! $prodcut_date_modified ) {
			do_action( 'er/debug', 'Product created and modified date are same, hence returning' );
			return;
		}

		if ( ! expertrec_is_selected_doc_type_match( 'product' ) ) {
			do_action( 'er/debug', 'selected doc types not matched with post_type, hence returning' );
			return;
		}

		do_action( 'er/debug', 'Stock status change called' );
		$site_id = get_option( 'expertrec_options' )['site_id'];
		error_log( 'Stock status: ' . $product_stock_status );
		if ( $site_id != $this->demo_site_id ) {
			$client = new ExpClient();
			$client->indexDoc( $product_id, 'expertrec_stock_status_change' );
		}
	}

	public function addExpertrecPluginActionLinks( $links, $plugin_base_name ) {
		do_action( 'er/debug', 'In add plugin action links ' . $plugin_base_name );
		if ( strpos( $plugin_base_name, 'expertrec' ) ) {
			return array_merge(
				array(
					'<a href="' . admin_url( 'admin.php?page=Expertrec' ) . '">' . __( 'Settings', 'expertrec' ) . '</a>',
				),
				$links
			);
		}
		return $links;
	}
}

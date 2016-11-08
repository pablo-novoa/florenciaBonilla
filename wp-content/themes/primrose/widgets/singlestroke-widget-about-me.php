<?php
/**
 * Class to display custom about me widget.
 *
 * @package SingleStroke
 */

class SingleStroke_Widget_About_Me extends WP_Widget {

	function __construct() {
		parent::__construct(
			'singlestroke_widget_about_me',
			esc_html__( 'SingleStroke: About Me', 'singlestroke' ),
			array(
				'classname' => 'singlestroke_widget_about_me',
				'description' => esc_html__( 'About Me with image', 'singlestroke' ),
				'customize_selective_refresh' => true,
			)
		);

		// Uploader reference: http://mikejolley.com/2012/12/using-the-new-wordpress-3-5-media-uploader-in-plugins/
		add_action( 'sidebar_admin_setup',  array( $this, 'admin_setup' ) );
	}

	public function admin_setup() {
		wp_enqueue_media();
		add_action( 'admin_print_footer_scripts', array( $this, 'print_scripts' ) );
		add_action( 'admin_print_styles', array( $this, 'print_styles' ) );
	}

	public function print_styles() {
		?>
		<style type="text/css">
		.ss-form-image-container {
			border: 1px solid #e5e5e5;
			padding: 6px;
			margin-bottom: 10px;
		}
		.ss-form-image-container img {
			max-width: 100%;
			display: block;
		}
		.ss-form-image-container span {
			display: inline-block;
			padding: 5px;
		}
		</style>
		<?php
	}

	public function print_scripts() {
		?>
		<script type="text/javascript">
			// Uploading files
			var file_frame;

			jQuery( '.ss-form-image-remove' ).live( 'click', function( event ) {
				event.preventDefault();

				$button = jQuery( event.currentTarget );

				img_container = $button.siblings( '.ss-form-image-container' );
				input = $button.siblings( '.ss-form-image-value' );

				empty_string = '<span><?php esc_html_e( 'No image selected', 'singlestroke' ); ?></span>';

				img_container.html( empty_string );
				input.val( 0 );
			});

			jQuery( '.ss-form-image-upload' ).live( 'click', function( event ) {
				event.preventDefault();

				$button = jQuery( event.currentTarget );

				// If the media frame already exists, reopen it.
				if ( file_frame ) {
					file_frame.open();
					return;
				}

				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: $button.data( 'uploader_title' ),
					library: {
						type: 'image',
					},
					button: {
						text: $button.data( 'uploader_button_text' ),
					},
					multiple: false,  // Set to true to allow multiple files to be selected
				});

				// When open the frame, mark the selected.
				file_frame.on( 'open', function() {
					
					selection = file_frame.state().get( 'selection' );
					selected = $button.siblings( '.ss-form-image-value' ).val(); // the id of the image

					if ( selected ) {
						selection.add( wp.media.attachment( selected ) );
					}
				});

				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
					// We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();

					img_url = attachment.url;
					if ( attachment.sizes !== undefined && attachment.sizes.medium !== undefined ) img_url = attachment.sizes.medium.url;
					img_string = '<img src="' + img_url + '">';
					img_container = $button.siblings( '.ss-form-image-container' );
					input = $button.siblings( '.ss-form-image-value' );

					img_container.html( img_string );
					input.val( attachment.id );
				});

				// Finally, open the modal
				file_frame.open();
			});
		</script>
		<?php
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$name = isset( $instance['name'] ) ? $instance['name'] : '';
		$text = apply_filters( 'widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		$image = isset( $instance['image'] ) ? absint( $instance['image'] ) : 0;
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : false;

		echo ( $args['before_widget'] );
		echo ( ! empty( $title ) ) ? $args['before_title'] . $title . $args['after_title'] : ''; ?>

		<div class="ss-box">
			<?php if ( ! empty( $image ) ) : ?>
				<div class="ss-image">
					<?php echo wp_get_attachment_image( $image, 'medium' ); ?>
				</div>
			<?php endif; ?>

			<div class="ss-text">
				<?php if ( ! empty( $name ) ) : ?>
					<h4 class="ss-heading"><?php echo esc_html( $name ); ?></h4>
				<?php endif; ?>
				<?php echo html_entity_decode( ! empty( $instance['filter'] ) ? wpautop( $text ) : $text ); ?>
			</div>
		</div>

		<?php echo ( $args['after_widget'] );
	}

	public function form( $instance ) {
		$title  = isset( $instance['title'] ) ? strip_tags( $instance['title'] ) : '';

		$name  = isset( $instance['name'] ) ? strip_tags( $instance['name'] ) : '';
		$image  = isset( $instance['image'] ) ? absint( $instance['image'] ) : 0;
		$text   = isset( $instance['text'] ) ? $instance['text'] : '';
		$filter = isset( $instance['filter'] ) ? (bool) $instance['filter'] : false;

		$image_url = wp_get_attachment_image_src( $image, 'medium' );
		if ( $image_url ) $image_url = $image_url[0];
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'singlestroke' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_html_e( 'Name:', 'singlestroke' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php esc_html_e( 'Image', 'singlestroke' ); ?></label>

			<div class="ss-form-image-container">

				<?php if ( ! empty( $image_url ) ) : ?>
					<img src="<?php echo esc_url( $image_url ); ?>">
				<?php else : ?>
					<span><?php esc_html_e( 'No image selected', 'singlestroke' ); ?></span>
				<?php endif; ?>

			</div>

			<input class="ss-form-image-value widefat" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" type="hidden" value="<?php echo esc_attr( $image ); ?>">
			<input class="ss-form-image-upload button button-primary" type="button" value="<?php esc_attr_e( 'Choose Image', 'singlestroke' ); ?>" data-uploader_title="<?php esc_attr_e( 'Choose an Image', 'singlestroke' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'singlestroke' ); ?>">
			&nbsp;
			<input class="ss-form-image-remove button" type="button" value="<?php esc_attr_e( 'Remove', 'singlestroke' ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Text', 'singlestroke' ); ?></label>
			<textarea class="widefat" rows="8" cols="20" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>"><?php echo ( $text ); ?></textarea>
		</p>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'filter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'filter' ) ); ?>" type="checkbox" <?php checked( isset( $instance['filter'] ) ? $instance['filter'] : 0); ?>>&nbsp;<label for="<?php echo esc_attr( $this->get_field_id( 'filter' ) ); ?>"><?php esc_html_e( 'Automatically add paragraphs', 'singlestroke' ); ?></label>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		$instance['text'] = $new_instance['text'];
		$instance['filter'] = (bool) $new_instance['filter'];

		return $instance;
	}

}

// register
function register_singlestroke_widget_about_me() {
	register_widget( 'SingleStroke_Widget_About_Me' );
}
add_action( 'widgets_init', 'register_singlestroke_widget_about_me' );
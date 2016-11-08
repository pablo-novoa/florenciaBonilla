<?php
/**
 * Class to display social media links widget.
 *
 * @package SingleStroke
 */

class SingleStroke_Widget_Social extends WP_Widget {

	public $types;

	function __construct() {
		parent::__construct(
			'singlestroke_widget_social',
			esc_html__( 'SingleStroke: Social', 'singlestroke' ),
			array(
				'classname' => 'singlestroke_widget_social',
				'description' => esc_html__( 'Social Media Links', 'singlestroke' ),
				'customize_selective_refresh' => true,
			)
		);

		$this->types = apply_filters( 'singlestroke_social_media', array(
			'behance' => esc_html__( 'Behance', 'singlestroke' ),
			'bloglovin' => esc_html__( 'Bloglovin&#39;', 'singlestroke' ),
			'dribbble' => esc_html__( 'Dribbble', 'singlestroke' ),
			'facebook' => esc_html__( 'Facebook', 'singlestroke' ),
			'google-plus' => esc_html__( 'Google Plus', 'singlestroke' ),
			'instagram' => esc_html__( 'Instagram', 'singlestroke' ),
			'linkedin' => esc_html__( 'LinkedIn','singlestroke' ),
			'pinterest' => esc_html__( 'Pinterest', 'singlestroke' ),
			'rss' => esc_html__( 'RSS', 'singlestroke' ),
			'snapchat-ghost' => esc_html__( 'Snapchat', 'singlestroke' ),
			'tumblr' => esc_html__( 'Tumblr', 'singlestroke' ),
			'twitter' => esc_html__( 'Twitter', 'singlestroke' ),
			'vimeo' => esc_html__( 'Vimeo', 'singlestroke' ),
			'youtube' => esc_html__( 'Youtube', 'singlestroke' ),
		) );
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo ( $args['before_widget'] );
		echo ( ! empty( $title ) ) ? $args['before_title'] . $title . $args['after_title'] : ''; ?>

		<ul>
			
			<?php foreach ( $this->types as $id => $type ) :
				
				$url = isset( $instance[ $id ] ) ? $instance[ $id ] : null;

				if ( ! empty( $url ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $url ); ?>">
							<span class="ss-icon <?php echo esc_attr( apply_filters( 'singlestroke_widget_social_icon_' . $id, 'fa fa-' . $id ) ); ?>"></span>
							<span class="ss-label"><?php echo esc_attr( $this->types[ $id ] ); ?></span>
						</a>
					</li>
				<?php endif;

			endforeach; ?>

		</ul>

		<?php echo ( $args['after_widget'] );
	}

	public function form( $instance ) {
		$title  = isset( $instance['title'] ) ? strip_tags( $instance['title'] ) : esc_html__( 'Connect with Us', 'singlestroke' );
		$new_window  = isset( $instance['new_window'] ) ? (bool) $instance['new_window'] : false; ?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'singlestroke' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'new_window' ) ); ?>">
				<input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'new_window' ) ); ?>" type="checkbox" <?php checked( $new_window ); ?> name="<?php echo esc_attr( $this->get_field_name( 'new_window' ) ); ?>">
				<?php esc_html_e( 'Open links on new tab', 'singlestroke' ); ?>
			</label>
		</p>

		<?php foreach ( $this->types as $id => $type ) :
			$url = isset( $instance[ $id ] ) ? strip_tags( $instance[ $id ] ) : '';?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>"><?php echo esc_attr( $this->types[ $id ] ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $id ) ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
			</p>
		<?php endforeach;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );

		foreach ( $this->types as $id => $type ) :

			$instance[ $id ] = strip_tags( $new_instance[ $id ] );

		endforeach;

		return $instance;
	}

}

// register
function register_singlestroke_widget_social() {
	register_widget( 'SingleStroke_Widget_Social' );
}
add_action( 'widgets_init', 'register_singlestroke_widget_social' );
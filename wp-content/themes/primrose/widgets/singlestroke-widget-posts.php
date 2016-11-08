<?php
/**
 * Class to display posts widget.
 *
 * @package SingleStroke
 */

class SingleStroke_Widget_Posts extends WP_Widget {

	function __construct() {
		parent::__construct(
			'singlestroke_widget_posts',
			esc_html__( 'SingleStroke: Posts', 'singlestroke' ),
			array(
				'classname' => 'singlestroke_widget_posts',
				'description' => esc_html__( 'Posts list with thumbnail images', 'singlestroke' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$cats = get_categories();
		$category_default = array();
		foreach ( $cats as $cat ) $category_default[] = $cat->term_id;

		$title          = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$layout         = isset( $instance['layout'] ) ? $instance['layout'] : 'default';
		$number         = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$orderby        = isset( $instance['orderby'] ) ? $instance['orderby'] : 'post_date';
		$all_categories = isset( $instance['all_categories'] ) ? (bool) $instance['all_categories'] : true;
		$category       = isset( $instance['category'] ) ? unserialize( $instance['category'] ) : $category_default;
		$show_date      = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		global $wp_query; $temp = $wp_query;
		$q = array(
			'post_type'           => 'post',
			'posts_per_page'      => $number,
			'ignore_sticky_posts' => 1,
			'orderby'             => $orderby,
		);
		if ( ! $all_categories ) $q['cat'] = implode( ',', $category );

		$wp_query = new WP_Query( $q );

		if ( have_posts() ) :
			ob_start();

			echo ( $args['before_widget'] );
			echo ( ! empty( $title ) ) ? $args['before_title'] . $title . $args['after_title'] : ''; ?>

			<ul class="layout-<?php echo esc_attr( $layout ); ?>">
				<?php while ( have_posts() ) : the_post(); ?>
					<li <?php post_class( 'ss-widget-post' ); ?>>

						<a class="ss-thumbnail" href="<?php the_permalink(); ?>" rel="bookmark">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( apply_filters( 'singlestroke_widget_posts_thumbnail_size', 'thumbnail', $layout ) ); ?>
							<?php endif; ?>
						</a>

						<div class="ss-text">
							<a href="<?php the_permalink(); ?>" class="ss-title"><?php the_title(); ?></a>

							<?php if ( $show_date ) : ?>
								<small class="ss-date"><?php echo get_the_date(); ?></small>
							<?php endif; ?>
						</div>

					</li>
				<?php endwhile; ?>
			</ul>

			<?php echo ( $args['after_widget'] );

			ob_end_flush();
		endif;
		
		$wp_query = $temp; wp_reset_postdata();
	}

	public function form( $instance ) {
		$cats = get_categories();
		
		$layouts = apply_filters( 'singlestroke_widget_posts_layout', array( 'default' => esc_html__( 'Default', 'singlestroke' ) ) );
		$orders = apply_filters( 'singlestroke_widget_posts_orderby', array(
			'post_date' => esc_html__( 'Recent Published', 'singlestroke' ),
			'rand'      => esc_html__( 'Random', 'singlestroke' ),
		) );

		$title          = isset( $instance['title'] ) ? strip_tags( $instance['title'] ) : '';
		
		$layout         = isset( $instance['layout'] ) ? $instance['layout'] : 'default';
		$number         = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$orderby        = isset( $instance['orderby'] ) ? $instance['orderby'] : 'post_date';
		$all_categories = isset( $instance['all_categories'] ) ? (bool) $instance['all_categories'] : true;
		$category       = isset( $instance['category'] ) ? unserialize( $instance['category'] ) : array();
		$show_date      = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'singlestroke' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php if ( 1 < count( $layouts ) ) : ?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Layout:', 'singlestroke' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
					<?php foreach ( $layouts as $key => $value ) : ?>
						<option value="<?php echo esc_attr( $key ); ?>"<?php selected( $layout, $key ); ?>><?php echo esc_html( $value ); ?></option>
					<?php endforeach; ?>
				</select>
			</p>
		<?php endif; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'singlestroke' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Sort By:', 'singlestroke' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>">
				<?php foreach ( $orders as $key => $value ) : ?>
					<option value="<?php echo esc_attr( $key ); ?>"<?php selected( $orderby, $key ); ?>><?php echo esc_html( $value ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'all_categories' ) ); ?>">
				<input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'all_categories' ) ); ?>" type="checkbox" <?php checked( $all_categories ); ?> name="<?php echo esc_attr( $this->get_field_name( 'all_categories' ) ); ?>">
				<?php esc_html_e( 'Query from All Categories?', 'singlestroke' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'or Choose Specific Categories:', 'singlestroke' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>[]" multiple>
				<?php foreach ( $cats as $cat ) : ?>
					<option value="<?php echo esc_attr( $cat->term_id ); ?>" <?php echo ( in_array( $cat->term_id, (array) $category ) ? 'selected' : '' ); ?>><?php echo esc_html( $cat->name ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>">
				<input class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" type="checkbox" <?php checked( $show_date ); ?> name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>">
				<?php esc_html_e( 'Display post date?', 'singlestroke' ); ?>
			</label>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance                   = $old_instance;
		$instance['title']          = strip_tags( $new_instance['title'] );
		$instance['layout']         = $new_instance['layout'];
		$instance['number']         = (int) $new_instance['number'];
		$instance['orderby']        = $new_instance['orderby'];
		$instance['all_categories'] = (bool) $new_instance['all_categories'];
		$instance['category']       = serialize( $new_instance['category'] );
		$instance['show_date']      = (bool) $new_instance['show_date'];

		return $instance;
	}

}

// register
function register_singlestroke_widget_posts() {
	register_widget( 'SingleStroke_Widget_Posts' );
}
add_action( 'widgets_init', 'register_singlestroke_widget_posts' );
<?php

// Adds widget: MPTC Post List
class Mptcpostlist_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'mptcpostlist_widget',
			esc_html__( 'MPTC Post List', 'sage' ),
			array( 'description' => esc_html__( 'List Post by cat tag or recent post.', 'sage' ), ) // Args
		);
    }
    // private function list_all_category()
    // {
    //     $categories = get_categories( array(
    //         'orderby' => 'name',
    //         'order'   => 'ASC'
    //     ) );
    //     return $categories;
    // }
	private $widget_fields = array(
		array(
			'label' => 'List by Category',
			'id' => 'listbycategory_checkbox',
			'type' => 'checkbox',
		),
		array(
			'label' => 'List by Tag',
			'id' => 'listbytag_checkbox',
			'type' => 'checkbox',
		),
		array(
			'label' => 'List by recent',
			'id' => 'listbyrecent_checkbox',
			'type' => 'checkbox',
		),
		array(
			'label' => 'List by post view count',
			'id' => 'listbypostviewc_checkbox',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Select Category',
			'id' => 'select_cat_field',
			'type' => 'select',
			'options' => ['name'],
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
		echo '<p>'.$instance['listbycategory_checkbox'].'</p>';
		echo '<p>'.$instance['listbytag_checkbox'].'</p>';
		echo '<p>'.$instance['listbyrecent_checkbox'].'</p>';
		echo '<p>'.$instance['listbypostviewc_checkbox'].'</p>';
		echo '<p>'.$instance['select_cat_field'].'</p>';
		
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'sage' );
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$output .= '<p>';
					$output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'sage' ).'</label>';
					$output .= '</p>';
					break;
				case 'select':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<select id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'">';
					foreach ($widget_field['options'] as $option) {
						if ($widget_value == $option) {
							$output .= '<option value="'.$option.'" selected>'.$option.'</option>';
						} else {
							$output .= '<option value="'.$option.'">'.$option.'</option>';
						}
					}
					$output .= '</select>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'sage' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'sage' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'sage' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_mptcpostlist_widget() {
	register_widget( 'Mptcpostlist_Widget' );
}
add_action( 'widgets_init', 'register_mptcpostlist_widget' );
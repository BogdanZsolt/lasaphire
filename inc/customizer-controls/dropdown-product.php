<?php

class LS_Dropdown_Product_Control extends WP_Customize_Control {

	public $type = 'dropdown-product';

	protected $dropdown_args = false;

	protected function render_content() {
		?><label><?php

	if ( ! empty( $this->label ) ) :
		?><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><?php
	endif;

	if ( ! empty( $this->description ) ) :
		?><span class="description customize-control-description"><?php echo $this->description; ?></span><?php
	endif;

	$dropdown_args = wp_parse_args( $this->dropdown_args, array(
	'sort_order' => 'ASC',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'selected' => $this->value(),
	'depth' => 0,
	'child_of' => 0,
	'selected' => 0,
	'echo' => 1,
	'name' => 'page_id',
	'id' => '',
	'class' => '',
	'show_option_none' => '',
	'show_option_no_change' => '',
	'option_none_value' => '',
	'value_field' => 'ID',
) );

$dropdown_args['echo'] = false;

$dropdown = wp_dropdown_pages( $dropdown_args );
$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
echo $dropdown;

	?></label><?php
	}
}
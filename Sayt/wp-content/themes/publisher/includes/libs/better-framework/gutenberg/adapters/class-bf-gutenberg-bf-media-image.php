<?php


class BF_Gutenberg_BF_Media_Image extends BF_Gutenberg_Field_Transformer {


	/**
	 * @param int $iteration
	 *
	 * @return mixed
	 */
	public function transform_field( $iteration ) {

		return array(
			'label'       => isset( $this->field['name'] ) ? $this->field['name'] : '',
			'type'        => isset( $this->field['type'] ) ? $this->field['type'] : '',
			'desc'        => isset( $this->field['desc'] ) ? $this->field['desc'] : '',
			'uploadLabel' => ! empty( $this->field['upload_label'] ) ? $this->field['upload_label'] : __( 'Upload', 'publisher' ),
			'mediaTitle'  => ! empty( $this->field['media_title'] ) ? $this->field['media_title'] : __( 'Upload', 'publisher' ),
			'mediaButton' => ! empty( $this->field['media_button'] ) ? $this->field['media_button'] : __( 'Upload', 'publisher' ),
			'removeLabel' => ! empty( $this->field['remove_label'] ) ? $this->field['remove_label'] : __( 'Remove', 'publisher' ),
			'inputClass'  => isset( $this->field['input_class'] ) ? $this->field['input_class'] : '',
			'dataType'    => isset( $this->field['data-type'] ) ? $this->field['data-type'] : '',
			'showInput'   => isset( $this->field['show_input'] ) ? $this->field['show_input'] : '',
			'previewSize' => isset( $this->field['preview-size'] ) ? $this->field['preview-size'] : '',
		);
	}


	/**
	 * The component name.
	 *
	 * @return string
	 */
	public function component() {

		return 'BF_Media_Image';
	}


	/**
	 * Return value data type.
	 *
	 * @since 3.9.0
	 * @return string
	 */
	public static function data_type() {

		return 'string';
	}
}

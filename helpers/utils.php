<?php

namespace EliteKit\Helpers;

defined( 'ABSPATH' ) || exit;

class Utils {

	public static function get_kses_array() {
		return array(
			'img'  => array(
				'src'    => array(),
				'alt'    => array(),
				'class'  => array(),
				'width'  => array(),
				'height' => array(),
				'sizes'  => array(),
			),
			'p'    => array(
				'class' => array(),
			),
			'span' => array(
				'class' => array(),
			),
			'div'  => array(
				'class' => array(),
			),
			'i'    => array(
				'class' => array(),
			),
			'li'   => array(
				'class' => array(),
			),
			'ul'   => array(
				'class' => array(),
			),
			'svg'  => array(
				'class'       => array(),
				'width'       => array(),
				'height'      => array(),
				'viewbox'     => array(),
				'xmlns'       => array(),
				'fill'        => array(),
				'aria-hidden' => array(),
				'role'        => array(),
			),
		);
	}

	public static function get_kses_icon() {
		return array(
			'i'   => array(
				'class' => array(),
			),
			'svg' => array(
				'class'       => array(),
				'width'       => array(),
				'height'      => array(),
				'viewbox'     => array(),
				'xmlns'       => array(),
				'fill'        => array(),
				'aria-hidden' => array(),
				'role'        => array(),
			),
		);
	}

	public static function get_kses_img() {
		return array(
			'img' => array(
				'src'    => array(),
				'alt'    => array(),
				'class'  => array(),
				'width'  => array(),
				'height' => array(),
				'sizes'  => array(),
			),
		);
	}

	public static function get_kses_li() {
		return array(
			'li' => array(
				'class' => array(),
			),
			'ul' => array(
				'class' => array(),
			),
		);
	}

	public static function get_kses_text() {
		return array(
			'p'    => array(
				'class' => array(),
			),
			'span' => array(
				'class' => array(),
			),
		);
	}
}

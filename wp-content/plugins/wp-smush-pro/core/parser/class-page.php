<?php

namespace Smush\Core\Parser;

class Page {
	/**
	 * @var string
	 */
	private $page_url;
	/**
	 * @var string
	 */
	private $page_markup;
	/**
	 * @var Style[]
	 */
	private $styles;
	/**
	 * @var Element[]
	 */
	private $elements;
	/**
	 * @var array
	 */
	private $placeholders = array();
	/**
	 * @var Parser
	 */
	private $parser;
	/**
	 * @var Element[]
	 */
	private $iframe_elements;

	/**
	 * @param $page_url string
	 * @param $page_markup string
	 * @param $styles Style[]
	 * @param $elements Element[]
	 */
	public function __construct( $page_url, $page_markup, $styles, $elements, $iframe_elements ) {
		$this->page_url        = $page_url;
		$this->page_markup     = $page_markup;
		$this->styles          = $styles;
		$this->elements        = $elements;
		$this->iframe_elements = $iframe_elements;
		$this->parser          = new Parser();
	}

	/**
	 * @return Style[]
	 */
	public function get_styles() {
		return $this->styles;
	}

	/**
	 * @return Element[]
	 */
	public function get_elements() {
		return $this->elements;
	}

	public function has_updates() {
		foreach ( $this->styles as $style ) {
			if ( $style->has_updates() ) {
				return true;
			}
		}

		foreach ( $this->elements as $element ) {
			if ( $element->has_updates() ) {
				return true;
			}
		}

		foreach ( $this->iframe_elements as $iframe_element ) {
			if ( $iframe_element->has_updates() ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @return string
	 */
	public function get_page_markup() {
		return $this->page_markup;
	}

	public function get_updated_markup() {
		$updated = $this->page_markup;

		$updated = $this->replace_tags_with_placeholders( $updated, array(
			'script',
			'noscript',
		) );

		foreach ( $this->styles as $style ) {
			$updated = str_replace( $style->get_css(), $style->get_updated(), $updated );
		}

		foreach ( $this->elements as $element ) {
			if ( $element->has_updates() ) {
				$updated = str_replace(
					$element->get_markup(),
					$element->get_updated_markup(),
					$updated
				);
			}
		}

		foreach ( $this->iframe_elements as $iframe_element ) {
			if ( $iframe_element->has_updates() ) {
				$updated = str_replace(
					$iframe_element->get_markup(),
					$iframe_element->get_updated_markup(),
					$updated
				);
			}
		}

		$updated = $this->replace_placeholders_with_tags( $updated );

		return $updated;
	}

	private function replace_tags_with_placeholders( $page_markup, $tags ) {
		$blocks = $this->parser->get_tags( $page_markup, $tags );
		foreach ( $blocks as $block ) {
			$key                        = md5( $block );
			$this->placeholders[ $key ] = $block;

			$page_markup = str_replace( $block, $key, $page_markup );
		}

		return $page_markup;
	}

	private function replace_placeholders_with_tags( $page_markup ) {
		foreach ( $this->placeholders as $key => $original ) {
			$page_markup = str_replace( $key, $original, $page_markup );
			unset( $this->placeholders[ $key ] );
		}

		return $page_markup;
	}

	public function get_iframe_elements() {
		return $this->iframe_elements;
	}
}
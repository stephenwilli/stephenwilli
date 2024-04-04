<?php

namespace Smush\Core\Parser;


class Page_Parser {
	/**
	 * @var string
	 */
	private $page_url;
	/**
	 * @var string
	 */
	private $page_markup;
	/**
	 * @var Parser
	 */
	private $parser;

	public function __construct( $page_url, $page_markup ) {
		$this->page_url    = $page_url;
		$this->page_markup = $page_markup;
		$this->parser      = new Parser();
	}

	public function parse_page() {
		$page_markup     = $this->page_markup;
		$base_tag_url    = $this->parser->get_base_url( $page_markup );
		$base_url        = $base_tag_url ?: $this->page_url;
		$styles          = $this->parser->get_inline_styles( $page_markup, $base_url );
		$elements        = $this->parser->get_elements_with_image_attributes( $page_markup, $base_url );
		$iframe_elements = $this->parser->get_iframe_elements( $page_markup, $base_url );

		return new Page(
			$this->page_url,
			$this->page_markup,
			$styles,
			$elements,
			$iframe_elements
		);
	}
}
<?php

namespace App;

class BulmaWalker extends \Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$object      = $item->object;
		$type        = $item->type;
		$title       = $item->title;
		$description = $item->description;
		$permalink   = $item->url;
		$classes     = implode( ' ', $item->classes );

		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$output .= '<div class="navbar-item has-dropdown is-hoverable">';
			$output .= '<a class="navbar-link">' . $title . '</a>';
			$output .= '<div class="navbar-dropdown">';

		} elseif ( in_array( 'divider', $item->classes, true ) ) {
			$output .= '<hr class="navbar-divider">';

		} else {
			$output .= '<a class="navbar-item ' . $classes . '" ';
			if ( $permalink && '#' !== $permalink ) {
				$output .= 'href="' . $permalink . '"';
			} else {
				$output .= '';
			}
			$output .= '>' . $title;
			$output .= '</a>';
		}
	}

	public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$output .= '</div></div>';
		} else {
			return;
		}
	}

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '';
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '';
	}

}

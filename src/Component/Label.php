<?php
/**
 * Contains the component class for rendering a label.
 *
 * @copyright (C) 2018, Tobias Oetterer, Paderborn University
 * @license       https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 (or later)
 *
 * This file is part of the MediaWiki extension BootstrapComponents.
 * The BootstrapComponents extension is free software: you can redistribute it
 * and/or modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * The BootstrapComponents extension is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @file
 * @ingroup       BootstrapComponents
 * @author        Tobias Oetterer
 */

namespace BootstrapComponents\Component;

use BootstrapComponents\AbstractComponent;
use BootstrapComponents\ParserRequest;
use \Html;

/**
 * Class Label
 *
 * Class for component 'label'
 *
 * @see   https://github.com/oetterer/BootstrapComponents/blob/master/docs/components.md#Label
 * @since 1.0
 */
class Label extends AbstractComponent {
	/**
	 * @inheritdoc
	 *
	 * @param string $input
	 */
	public function placeMe( $input ) {
		if ( empty( $input ) ) {
			return $this->getParserOutputHelper()->renderErrorMessage( 'bootstrap-components-label-content-missing' );
		}

		$class = [
			'label', 'label-' . $this->getValueFor( 'color', 'default' ),
		];
		list ( $class, $style ) = $this->processCss( $class, [] );
		return Html::rawElement(
			'span',
			[
				'class' => $this->arrayToString( $class, ' ' ),
				'style' => $this->arrayToString( $style, ';' ),
				'id'    => $this->getId(),
			],
			$input
		);
	}
}
<?php

namespace WPDesk\FPF\Free\Settings\Option;

use WPDesk\FPF\Free\Settings\Tab\PricingTab;

/**
 * {@inheritdoc}
 */
class PricingAdvOption extends OptionAbstract {

	const FIELD_NAME = 'pricing_adv';

	/**
	 * {@inheritdoc}
	 */
	public function get_option_name(): string {
		return self::FIELD_NAME;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_option_tab(): string {
		return PricingTab::TAB_NAME;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_option_type(): string {
		return self::FIELD_TYPE_INFO_ADV;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_option_label(): string {
		$url_upgrade = esc_url( apply_filters( 'flexible_product_fields/short_url', '#', 'fpf-settings-option-field-price' ) );
		return sprintf(
		/* translators: %1$s: anchor opening tag, %2$s: anchor closing tag */
			__( 'Price settings are available in the PRO version. %1$sRead the documentation%2$s', 'flexible-product-fields' ),
			'<a href="' . $url_upgrade . '" target="_blank" class="fpfArrowLink">',
			'</a>'
		);
	}
}

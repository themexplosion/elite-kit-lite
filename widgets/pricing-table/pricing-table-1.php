<div class="ek-pricing-table featured ekp-relative <?php $this->render_ribbon(); ?>">
	<div class="ek-pricing-item">

		<?php if ( 'yes' === $settings['is_header_icon'] ) : ?>
		<div class="ek-pricing-icon">
			<span class="icon">
				<?php wp_kses( $this->render_header_icon(), \EliteKit\Helpers\Utils::get_kses_icon() ); ?>
			</span>
		</div>
		<?php endif; ?>

		<?php if ( ( 'yes' === $settings['pt_show_title'] && ! empty( $this->render_pricing_title() ) ) || ( 'yes' === $settings['pt_show_subtitle'] && ! empty( $this->render_pricing_subtitle() ) ) ) : ?>
		<div class="ek-header">
			<?php if ( 'yes' === $settings['pt_show_title'] && ! empty( $this->render_pricing_title() ) ) : ?>
				<h2 class="title"><?php echo esc_html( $this->render_pricing_title() ); ?></h2>
			<?php endif; ?>
			<?php if ( 'yes' === $settings['pt_show_subtitle'] && ! empty( $this->render_pricing_subtitle() ) ) : ?>
				<span class="subtitle">
            <?php echo wp_kses( $this->render_pricing_subtitle(), \EliteKit\Helpers\Utils::get_kses_text() ); ?>
        </span>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if ( 'yes' === $settings['pt_show_price'] && ( ! empty( $this->render_original_price() ) || ! empty( $this->render_sale_price() ) ) ) : ?>
		<div class="ek-pricing-wrapper">
			<div class="<?php echo esc_attr( $this->render_sale_price_class() ); ?> ekp-relative">
				<span class="ek-currency ekp-relative">
					<?php echo esc_html( $this->render_currency() ); ?>
				</span>
			<span class="ek-price">
					<?php echo esc_html( $this->render_original_price() ); ?>
				</span>
			</div>

			<?php if ( 'yes' === $settings['pt_sale_price_visibility'] && ! empty( $this->render_sale_price() ) ) : ?>
				<div class="ek-sale-price">
				<span class="ek-currency ekp-relative -tracking-[4px]">
					<?php echo esc_html( $this->render_currency() ); ?>
				</span>
				<span class="ek-price">
					<?php echo esc_html( $this->render_sale_price() ); ?>
				</span>
				</div>
			<?php endif; ?>

			<?php if ( 'yes' === $settings['pt_show_duration'] && ! empty( $this->render_duration() ) ) : ?>
				<div class="price-period ekp-relative">
				<span class="ek-separator">
					<?php echo esc_html( $this->render_separator() ); ?>
				</span>
				<span class="ek-duration ">
					<?php echo esc_html( $this->render_duration() ); ?>
				</span>
				</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if ( 'yes' === $settings['pt_show_features'] && ! empty( $settings['pt_features'] ) ) : ?>
		<div class="ek-feature">
			<ul>
				<?php foreach ( $settings['pt_features'] as $feature_list => $item ) : ?>
				<li class="feature-item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
						<span class="feature-icon">
							<?php wp_kses( $this->render_features_icon( $item ), \EliteKit\Helpers\Utils::get_kses_icon() ); ?>
						</span>
					<span class="feature-text">
							<?php echo esc_html( $this->render_features_content( $item ) ); ?>
						</span>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

		<?php if ( 'yes' === $settings['pt_show_button'] && ! empty( $settings['pt_button_text'] ) ) : ?>
		<div class="ek-footer mt-[50px]">
			<a class="ek-pricing-button" href="<?php esc_url( $settings['pt_button_url'] ); ?>">
				<?php if ( 'before' === $settings['icon_position'] && 'yes' === $settings['is_pt_button_icon'] && ! empty( $settings['pt_button_icon'] ) ) : ?>
					<?php wp_kses( \Elementor\Icons_Manager::render_icon( $settings['pt_button_icon'], array( 'aria-hidden' => 'true' ) ), \EliteKit\Helpers\Utils::get_kses_icon() ); ?>
				<?php endif; ?>

				<?php echo esc_html( $settings['pt_button_text'] ); ?>

				<?php if ( 'after' === $settings['icon_position'] && 'yes' === $settings['is_pt_button_icon'] && ! empty( $settings['pt_button_icon'] ) ) : ?>
					<?php wp_kses( \Elementor\Icons_Manager::render_icon( $settings['pt_button_icon'], array( 'aria-hidden' => 'true' ) ), \EliteKit\Helpers\Utils::get_kses_icon() ); ?>
				<?php endif; ?>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>

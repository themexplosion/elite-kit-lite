<?php
$layout_operator = $settings['member_description'] || $settings['member_social_icons'];
?>

<div class="ek-team-area">
	<div class="team-wrapper ekp-relative ">
		<div class="team-image">
			<?php echo wp_kses( $this->render_team_image(), \EliteKit\Helpers\Utils::get_kses_img() ); ?>
		</div>

		<div class="team-holder text-center ekp-absolute ">
			<?php if ( $settings['member_name'] ) : ?>
				<h3 class="team-title">
					<?php echo esc_html( $settings['member_name'] ); ?>
				</h3>
			<?php endif; ?>

			<?php if ( $settings['member_designation'] ) : ?>
				<div class="team-position">
					<span> <?php echo esc_html( $settings['member_designation'] ); ?></span>
				</div>
			<?php endif; ?>

			<?php if ( $settings['member_description'] || $settings['member_social_icons'] ) : ?>
				<div class="team-meta ">
					<?php if ( $settings['member_description'] ) : ?>
						<div class="team-description">
							<span><?php echo esc_html( $settings['member_description'] ); ?></span>
						</div>
					<?php endif; ?>
					<?php if ( $settings['member_social_icons'] ) : ?>
						<div class="social-item">
							<?php foreach ( $settings['member_social_icons'] as $item ) : ?>
								<a href="<?php echo esc_url( $item['social_link'] ); ?>"
									target='_blank'><?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], array( 'aria-hidden' => 'true' ) ); ?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

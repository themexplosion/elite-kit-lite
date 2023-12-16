<div class="ek-testimonial-area ek-testimonial-area-2">
	<div class="ek-testimonial-wrapper ek-transition-4 ">
		<div class="ek-author-wrapper">
		<div class="ek-author-img">
			<?php $this->author_image(); ?>
		</div>
		<div class="ek-author-details">
			<?php $this->render_author_name(); ?>
			<?php $this->render_author_designation(); ?>
		</div>
		</div>

		<?php if ( 'before_review_text' === $settings['tc_rating_position'] ) : ?>
			<?php $this->reviewIcon(); ?>
		<?php endif; ?>

		<div class="ek-quote">
			<?php $this->render_quote(); ?>
		</div>

		<?php if ( 'after_review_text' === $settings['tc_rating_position'] ) : ?>
			<?php $this->reviewIcon(); ?>
		<?php endif; ?>
	</div>
</div>

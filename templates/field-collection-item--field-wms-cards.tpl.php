<?php
	// Create image URLs
	if(isset($content['field_wms_bg_image'][0]['#image_style']) && isset($content['field_wms_bg_image'][0]['#item']['uri'])) {
		$image_file = $content['field_wms_bg_image'][0]['#item']['uri'];
		$image_style = $content['field_wms_bg_image'][0]['#image_style'];
		$image_path = image_style_url($image_style, $image_file);

		$image_markup = 'style="background-image:url('.$image_path.');"';
		$class = "bgimg";
	}
	else {
		$image_path = '';
		$image_markup = '';
		$class = "no-bgimg";
	}

	// Construct card link if provided
	if(isset($content['field_wms_card_link']['#items'][0]['url'])) {
		$link = $content['field_wms_card_link']['#items'][0]['url'];
		$begin_link = '<a href="'.$link.'">';
 		$end_link = '</a>';
	}
	else {
		$begin_link = '';
		$end_link = '';
	}

?>

<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<?php print $begin_link; ?><div class="card-wrapper <?php print $class; ?>" <?php print $image_markup; ?>>
		<div class="card-text">
			<?php print render($content['field_wms_card_title']); ?>
			<?php print render($content['field_wms_card_text']); ?>
		</div>
	</div><?php print $end_link; ?>
</div>

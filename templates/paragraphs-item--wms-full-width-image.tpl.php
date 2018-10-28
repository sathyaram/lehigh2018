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
?>

<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div class="full-image-wrapper <?php print $class; ?>" <?php print $image_markup; ?>>
		<div class="caption-wrapper">
			<?php print render($content['field_wms_title']); ?>
			<?php print render($content['field_wms_long_caption']); ?>
			<?php print render($content['field_wms_cta_button']); ?>
		</div>
	</div>
</div>

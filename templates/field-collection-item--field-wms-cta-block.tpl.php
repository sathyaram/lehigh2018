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

	// Set markup for FA icon if provided
	if(isset($content['field_wms_icon'])){
		$icon_markup = '<div class="icon-wrapper"><i class="'.$field_wms_icon.'"></i></div>';
	}
	else {
		$icon_markup = '';
	}


?>

<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div class="two-col-wrapper <?php print $class; ?>" <?php print $image_markup; ?>>
		<?php print $icon_markup; ?>
		<div class="cta-text">
			<?php print render($content['field_wms_cta_title']); ?>
			<?php print render($content['field_wms_long_caption']); ?>
		</div>
	</div>
</div>

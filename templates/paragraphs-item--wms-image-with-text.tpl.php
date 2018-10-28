<?php hide($content['field_wms_image_align']); ?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<?php print render($content['field_wms_section_heading']); ?>
	<div class="image-wrapper">
		<?php print render($content['field_wms_image']); ?>
		<?php print render($content['field_wms_caption']); ?>
	</div>
	<?php print render($content['field_wms_text']); ?>
</div>
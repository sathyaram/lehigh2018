<?php

/**
 * Implements template_preprocess_entity().
 */
function lehigh2018_preprocess_entity(&$vars, $hook) {
  $function = 'lehigh2018_preprocess_' . $vars['entity_type'];
  if (function_exists($function)) {
    $function($vars, $hook);
  }
}

/**
 * Paragraph-specific implementation of template_preprocess_entity().
 */
function lehigh2018_preprocess_paragraphs_item(&$vars, $hook) {
  	$function = 'lehigh2018_preprocess_' . $vars['entity_type'] . '_' . $vars['elements']['#bundle'];
  	if (function_exists($function)) {
    	$function($vars, $hook);
  	}
}

// WMS Call to Action Block
function lehigh2018_preprocess_paragraphs_item_wms_call_to_action_block(&$vars, $hook) {
	if (isset($vars['paragraphs_item']) && !is_null($vars['paragraphs_item'])) {
		$emr = entity_metadata_wrapper('paragraphs_item', $vars['paragraphs_item']);
		// Set FontAwesome icon
		if (isset($vars['field_wms_icon']) && !is_null($vars['field_wms_icon'])) {
			$vars['field_wms_icon'] = 'fa fa-' . $emr->field_wms_icon->value();
		}
	}
}

// WMS Image with Text
function lehigh2018_preprocess_paragraphs_item_wms_image_with_text(&$vars, $hook) {
	if (isset($vars['paragraphs_item']) && !is_null($vars['paragraphs_item'])) {
		$emr = entity_metadata_wrapper('paragraphs_item', $vars['paragraphs_item']);
		// Set alignment class
		$field_wms_image_align = $emr->field_wms_image_align->value();
		$vars['classes_array'][] = $field_wms_image_align ? 'image-left' : 'image-right';

	}
}

// WMS Full-width Image with Caption
function lehigh2018_preprocess_paragraphs_item_wms_full_width_image(&$vars, $hook) {
	if (isset($vars['paragraphs_item']) && !is_null($vars['paragraphs_item'])) {
		$emr = entity_metadata_wrapper('paragraphs_item', $vars['paragraphs_item']);
	}
}

/**
 * Field Collection-specific implementation of template_preprocess_entity().
 */
 function lehigh2018_preprocess_field_collection_item(&$vars, $hook) {
	switch ($vars['elements']['#bundle']) {
		// WMS Section Heading
		case 'field_wms_section_heading':
			if (isset($vars['field_collection_item']) && !is_null($vars['field_collection_item'])) {
				$emr = entity_metadata_wrapper('field_collection_item', $vars['field_collection_item']);
				if (isset($vars['content']['field_wms_heading_text'])) {
					$type = $emr->field_wms_heading_type->value();
					$markup = $vars['content']['field_wms_heading_text'][0]['#markup'];
					$vars['content']['field_wms_heading_text'][0]['#markup'] = 
					sprintf("<%s>%s</%s>", $type, $markup, $type);
				}
			}
			break;
		// WMS Cards	
		case 'field_wms_cards':
			if (isset($vars['field_collection_item']) && !is_null($vars['field_collection_item'])) {
				$emr = entity_metadata_wrapper('field_collection_item', $vars['field_collection_item']);
			}
			break;
		// WMS CTA Block
		case 'field_wms_cta_block':
			if (isset($vars['field_collection_item']) && !is_null($vars['field_collection_item'])) {
				$emr = entity_metadata_wrapper('field_collection_item', $vars['field_collection_item']);
				// Set FontAwesome icon
				if (isset($vars['field_wms_icon']) && !is_null($vars['field_wms_icon'])) {
					$vars['field_wms_icon'] = 'fa fa-' . $emr->field_wms_icon->value();
				}
			}
			break;
		default:
			break;
	}
}
<?php
/**
 * @file
 * This is the template file for the metadata description for an object.
 *
 * Available variables:
 * - $islandora_object: The Islandora object rendered in this template file
 * - $found: Boolean indicating if a Solr doc was found for the current object.
 *
 * @see template_preprocess_islandora_solr_metadata_description()
 * @see template_process_islandora_solr_metadata_description()
 */
?>
<?php if ($found && !empty($description)): ?>
  <div class="islandora-solr-metadata-sidebar">
    <?php if ($combine): ?>
      <h2><?php if (count($description) > 1):
        print (t('Description'));
        else:
        $desc_array = reset($description);
        print ($desc_array['display_label']); ?>
        <?php endif; ?></h2>
      <?php foreach($description as $value): ?>
        <p property="description" class="collection-obj-description-p"><?php print check_markup(implode("\n", $value['value']), 'islandora_solr_metadata_filtered_html'); ?></p>
      <?php endforeach; ?>
    <?php else: ?>
      <?php foreach ($description as $value): ?>
        <?php if(isset($value['display_label']) && !empty($value['display_label'])):?>
        <h2><?php print $value['display_label']; ?></h2>
        <?php endif;?>
        <div class="collection-description-value"><?php print check_markup(implode("\n", $value['value']), 'islandora_solr_metadata_filtered_html'); ?></div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
<?php endif; ?>

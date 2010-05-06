<tr id="<?php echo $base_id . '_' . $file_id; ?>">
	<td class="imgtd" style="width: 22px; text-align: center; vertical-align: middle;"><?php echo link_tag(make_url('downloadfile', array('id' => $file_id)), image_tag('icon_download.png'), array('class' => 'image')); ?></td>
	<td style="font-size: 13px; padding: 3px;">
		<?php echo link_tag(make_url('showfile', array('id' => $file_id)), (($file['description'] != '') ? $file['description'] : $file['filename'])); ?><br>
		<span class="faded_medium" style="font-size: 11px;"><?php echo tbg_formatTime($file['timestamp'], 13); ?></span>
	</td>
	<?php if ($mode == 'issue' && $issue->canRemoveAttachments()): ?>
		<td style="width: 20px;">
			<?php echo javascript_link_tag(image_tag('action_delete.png'), array('class' => 'image', 'id' => $base_id . '_' . $file_id . '_remove_link', 'onclick' => "$('{$base_id}_{$file_id}_remove_confirm').toggle();")); ?>
			<?php echo image_tag('spinning_16.gif', array('id' => $base_id . '_' . $file_id . '_remove_indicator', 'style' => 'display: none;')); ?>
		</td>
	<?php endif; ?>
</tr>
<?php if ($mode == 'issue' && $issue->canRemoveAttachments()): ?>
	<tr id="<?php echo $base_id . '_' . $file_id; ?>_remove_confirm" style="display: none;">
		<td colspan="3">
			<div class="rounded_box lightgrey" style="position: relative; clear: both; left: auto; top: auto; margin-bottom: 10px; width: auto;">
				<div class="header_div" style="margin-top: 0;"><?php echo __('Do you really want to detach this file?'); ?></div>
				<div class="content" style="padding: 3px;">
					<?php echo __('If this file is only attached to this issue, the file will also be deleted. Are you sure you want to do this?'); ?>
					<div style="text-align: right; font-size: 12px;">
						<?php echo javascript_link_tag(__('Yes'), array('onclick' => "$('{$base_id}_{$file_id}_remove_confirm').toggle();detachFileFromIssue('".make_url('issue_detach_file', array('issue_id' => $issue->getID(), 'file_id' => $file_id))."', ".$file_id.");")); ?> ::
						<?php echo javascript_link_tag('<b>'.__('No').'</b>', array('onclick' => "$('{$base_id}_{$file_id}_remove_confirm').toggle();")); ?>
					</div>
				</div>
			</div>
		</td>
	</tr>
<?php endif; ?>
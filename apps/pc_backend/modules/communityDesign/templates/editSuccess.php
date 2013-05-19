<h2>個別デザイン設定</h2>

<h3>対象コミュニティ</h3>

<?php
include_partial(
  'community/communityInfo',
  array(
    'community' => $community,
    'moreInfo'  => null,
  )
);
?>

<h3>設定</h3>

<form action="<?php echo url_for('community_design_edit', array('id' => $community->getId())) ?>" method="post">
<table>
<?php echo $form ?>
<tr>
<td colspan="2"><input type="submit" value="<?php echo __('Edit') ?>" /></td>
</tr>
</table>
</form>

<div class="parts backLink">
<?php echo link_to('コミュニティ管理へ戻る', 'community/list') ?>
</div>

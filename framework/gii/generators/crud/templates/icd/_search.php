<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<table class="data_table">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
)); ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
		continue;
?>
	<tr>
		<th>
		<?php echo "<?php echo \$form->label(\$model,'{$column->name}'); ?>\n"; ?>
		</th>
		<td>
		<?php
			if($column->dbType==='timestamp' ||$column->dbType==='datetime') {
				echo "<?php \$form->widget('CJuiDateTimePicker',
				array('attribute'=>'$column->name',
				'model'=>\$model,
				'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
				),
				'htmlOptions'=>array(),
				)); ?>\n";
			} else {
			 
				echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n";
			} 
		?>
		</td>
	</tr>

<?php endforeach; ?>
	<tr class="row buttons">
		<td colspan="2">
		<?php echo "<?php echo CHtml::submitButton('搜尋'); ?>\n"; ?>
		<?php echo "<?php echo CHtml::button('新增', array('submit' => array('{$this->modelClass}/create'))); ?>\n"; ?>
		 <?php echo "<?php echo CHtml::hiddenField('search',1);?>\n"; ?>
		 </td>
	</tr>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</table><!-- search-form -->
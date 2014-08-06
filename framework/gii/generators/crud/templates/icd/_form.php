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

<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

	<p class="note"><span class="required">*</span>必須</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

	<table class="data_table">
	<?php
	echo "<?php ";
		echo "if(!\$model->isNewRecord) {?>";
		foreach($this->tableSchema->columns as $column) {
			if($column->name === "create_date"
				|| $column->name === "last_update"
				|| $column->name === "update_by"){
	
		
			echo "<tr><th>\n";
			echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n";
			echo "</th>\n";
			echo "<td>\n";
			echo "<?php echo \$model->$column->name ;?>\n";
			echo "</td></tr>\n";
		
		
		}
		
	} 
	
	echo "<?php } ?>";	
	?>
<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement 
		|| $column->name === "event_class_id"
		|| $column->name === "create_date"
		|| $column->name === "last_update"
		|| $column->name === "update_by")
		continue;
?>
	<tr>
		<th>
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
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
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
		</td>
	</tr>

<?php
}
?>
	<tr>
	<td colspan="2">
		<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? '建立' : '更新'); ?>\n"; ?>
	</td>
	</tr>
	</table>
	<?php echo "<?php echo CHtml::hiddenField('".$this->modelClass."[event_class_id]',Yii::app()->session['sportType']);?> \n" ?>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->
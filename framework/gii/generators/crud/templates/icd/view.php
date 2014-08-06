<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */


?>
<h1><?php echo $this->modelClass; ?></h1>
<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile'=>'',
    'itemCssClass'=>array(''),	
	'attributes'=>array(		
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>

<?php echo "<?php if(isset(\$showAddBtn) && \$showAddBtn == 1) echo CHtml::button('繼續新增', array('submit' => array('{$this->getModelClass()}/create'))); ?>\n"; ?>
<?php echo "<?php echo CHtml::button('完成', array('submit' => array('{$this->getModelClass()}/index'))); ?>\n"; ?>

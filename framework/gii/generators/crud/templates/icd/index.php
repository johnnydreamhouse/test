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

<h1><?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<div class="search-form">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?>
	if (isset($_GET['search']) && $_GET['search'] == 1) { 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'itemsCssClass'=>'data_table',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager'=>array(
                'header'         => '',
                'firstPageLabel' => '&lt;&lt;',
                'prevPageLabel'  => '&lt;',
                'nextPageLabel'  => '&gt;',
                'lastPageLabel'  => '&gt;&gt;',
	),
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			 'deleteConfirmation'=>"js:'確定刪除\''+$(this).parent().parent().children(':first-child').text()+'\'?'",
		),
	),
)); 
}
?>

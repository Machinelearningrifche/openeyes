<div id="multiSelectFieldSQLDetails<?php echo $element_num?>Field<?php echo $field_num?>">
	Table:
	<select name="multiSelectFieldSQLTable<?php echo $element_num?>Field<?php echo $field_num?>" class="multiSelectFieldSQLTable">
		<option value="">- Please select a table -</option>
		<?php foreach (Yii::app()->getDb()->getSchema()->getTableNames() as $table) {?>
			<option value="<?php echo $table?>"<?php if (@$_POST['multiSelectFieldSQLTable'.$element_num.'Field'.$field_num] == $table) {?> selected="selected"<?php }?>><?php echo $table?></option>
		<?php }?>
	</select>&nbsp;<img src="/img/ajax-loader.gif" class="loader" alt="loading..." style="display: none;" /><br/>
	<?php if (isset($this->form_errors['multiSelectFieldSQLTable'.$element_num.'Field'.$field_num])) {?>
		<span style="color: #f00;"><?php echo $this->form_errors['multiSelectFieldSQLTable'.$element_num.'Field'.$field_num]?></span><br/>
	<?php }?>
	<div id="multiSelectFieldSQLTableFieldDiv<?php echo $element_num?>Field<?php echo $field_num?>"<?php if (!@$_POST['multiSelectFieldSQLTable'.$element_num.'Field'.$field_num]) {?> style="display: none;"<?php }?>>
		Field: <select name="multiSelectFieldSQLTableField<?php echo $element_num?>Field<?php echo $field_num?>" class="multiSelectFieldSQLTableField">
			<?php if (@$_POST['multiSelectFieldSQLTable'.$element_num.'Field'.$field_num]) {?>
				<?php EventTypeModuleCode::dump_table_fields(@$_POST['multiSelectFieldSQLTable'.$element_num.'Field'.$field_num],@$_POST['multiSelectFieldSQLTableField'.$element_num.'Field'.$field_num])?>
			<?php }?>
		</select><br/>
		<?php if (isset($this->form_errors['multiSelectFieldSQLTableField'.$element_num.'Field'.$field_num])) {?>
			<span style="color: #f00;"><?php echo $this->form_errors['multiSelectFieldSQLTableField'.$element_num.'Field'.$field_num]?></span><br/>
		<?php }?>
		<div id="multiSelectFieldSQLTableDefaultValueDiv<?php echo $element_num?>Field<?php echo $field_num?>"<?php if (!@$_POST['multiSelectFieldSQLTableField'.$element_num.'Field'.$field_num]) {?> style="display: none;"<?php }?>>
			Default value: <select name="multiSelectFieldValueTextInputDefault<?php echo $element_num?>Field<?php echo $field_num?>">
				<?php if (@$_POST['multiSelectFieldSQLTableField'.$element_num.'Field'.$field_num]) {?>
					<?php EventTypeModuleCode::dump_field_unique_values(@$_POST['multiSelectFieldSQLTable'.$element_num.'Field'.$field_num],@$_POST['multiSelectFieldSQLTableField'.$element_num.'Field'.$field_num],@$_POST['multiSelectFieldValueTextInputDefault'.$element_num.'Field'.$field_num])?>
				<?php }?>
			</select><br/>
		</div>
	</div>
</div>

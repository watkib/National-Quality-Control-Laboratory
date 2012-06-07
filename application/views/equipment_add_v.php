<?php
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('equipment_management/save',$attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<label>Equipment Name</label>
<input type="text" name="equipment_name" />

<label>NQCL Code</label>
<input type="text" name="nqcl_code" />

<input name="submit" type="submit" value="Save Equipment">
<?php echo form_close();?>
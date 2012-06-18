<script>
	$(document).ready(function() {
		$("#entry_form").dialog({
			height : 200,
			width : 400,
			modal : true,
			autoOpen : false
		});
		$("#new_equipment").click(function(){ 
			$("#entry_form").dialog("open");
		});
	});

</script>
<div id="view_content">
	<a class="action_button" id="new_equipment">New Equipment</a>
	<div align="center">
		<?php echo validation_errors('<p class="error">', '</p>');
		echo $this -> table -> generate($equipment_details);
		?>
	</div>
<div id="entry_form" title="New Equipment">
	<?php
	$attributes = array('class' => 'input_form');
	echo form_open('equipment_management/save', $attributes);

	?>
	<table>
		<tr>
			<td>Equipment Name</td>
			<td><input type="text" name="equipment_name" /></td>
		</tr>

		<tr>
			<td>NQCL Code</label></td>
			<td><input type="text" name="nqcl_code" /></td>
		</tr>

		<tr>
			<td><input name="submit" type="submit" value="Save Equipment" class="button"></td>
		</tr>
	</table>
	</form>
</div>
</div>

<script>
	$(document).ready(function() {
		$("#entry_form").dialog({
			height : 300,
			width : 500,
			modal : true,
			autoOpen : false
		});
		$("#new_client").click(function(){ 
			$("#entry_form").dialog("open");
		});
	});

</script>
<div id="view_content">
	<a class="action_button" id="new_client">New User</a>
	<div align="center">
		<?php echo validation_errors('<p class="error">', '</p>');
		echo $this -> table -> generate($users_details);
		?>
	</div>
<div id="entry_form" title="New User">
	<?php
	$attributes = array('class' => 'input_form');
	echo form_open('user_management/save', $attributes);

	?>
	<table>
<tr>
<td>Full Name</td>
<td><input type="text" name="name" /></td>
</tr>

<tr>
<td>Username</td>
<td><input type="text" name="username" /></td>
</tr>

<tr>
<td>Email</td>
<td><input type="text" name="email" /></td>
</tr>

<tr>
<td><input name="submit" type="submit" value="Save User" class="button"></td>
</tr>
</table>
	</form>
</div>
</div>

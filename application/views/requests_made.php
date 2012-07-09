<div id="view_content">
	<a class="action_button" id="new_client" href="<?php echo site_url('request_management/add') ?>">New Request</a>
	<div align="center">
		<table border="1px" bordercolor="black">
			<tr>
				<th>Batch Number</th>
				<th>Product Name</th>
				<th>Manufacture Date</th>
				<th>Expiry Date</th>
				<th>Quantity</th>
			</tr>
			<?php
			foreach ($batches as $batch) {
				echo "<tr><td><a href=".site_url('request_management/requests/'.$batch['request_id'].'').">" . $batch['batch_no'] . "</a></td><td>" . $batch['product_name'] . "</td><td>" . $batch['manufacture_date'] . "</td><td>" . $batch['expiry_date'] . "</td><td>" . $batch['quantity'] . "</td></tr>";
			}
			?>
		</table>
	</div>
	<div id="entry_form" title="New Client">
		<?php
		$attributes = array('class' => 'input_form');
		echo form_open('client_management/save', $attributes);
		?>
		</form>
	</div>
</div>

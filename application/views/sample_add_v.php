<?php
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('sample_controller/save',$attributes);
echo validation_errors('
<p class="error">', '</p>
');
?>

<h1><center>Sample Information Form</center></h1>

<table>
	<tr>
		<td><label>Date Sample Submitted</label></td><td><input type="text" name="submission_date" /></td>
		<td><label>Laboratory Reference No.</label></td><td><input type="text" name="lab_ref_no" /></td>
	</tr>
	
	<tr>
		<td><label>Product Generic/Brand Name</label></td><td><input type="text" name="generic_brand_name" /></td>
		<td></td>
	</tr>
	
	<tr>
		<td><label>Product Chemical Name</label></td><td><input type="text" name="chemical_name" /></td>
		<td></td>
	</tr>
	
	<tr>
		<td><label>Product Description</label></td><td><textarea name="description"></textarea></td>
		<td></td>
	</tr>
	
	<tr>
		<td><label>Product Presentation</label></td><td><input type="text" name="presentation" /></td>
		<td></td>
	</tr>
	
	<tr>
		<td><label>Label Claim</label></td><td><input type="text" name="label_claim" /></td>
		<td></td>
	</tr>
	
	<tr>
		<td><label>Batch/Lot No</label></td><td><input type="text" name="batch_no" /></td>
		<td><label>Product License No</label></td><td><input type="text" name="product_no" /></td>
	</tr>
	
	<tr>
		<td><label>Date of manufacture</label></td><td><input type="text" name="manufacture_date" /></td>
		<td><label>Date of expiry</label></td><td><input type="text" name="expiry_date" /></td>
	</tr>
	
	<tr>
		<td><label>Client Name</label></td><td><input type="text" name="client_name" /></td>
		<td><label>Client Address</label></td><td><input type="text" name="client_address" /></td>
	</tr>
	
	<tr>
		<td><label>Client Reference Number</label></td><td><input type="text" name="client_reference" /></td>
		<td></td>
	</tr>
	
	<tr>
		<td><label>Manufacturer</label></td><td><input type="text" name="manufacturer" /></td>
		<td></td>
	</tr>
	
	<tr>
		<td><label>Country of Origin</label></td><td><input type="text" name="country_of_origin" /></td>
		<td><label>Samples Issued</label></td><td><input type="text" name="samples_issued" /></td>
		<td><label>Samples Returned</label></td><td><input type="text" name="samples_returned" /></td>
	</tr>
	
	<tr>
		<td><label>Analyst</label></td><td><input type="text" name="analyst" /></td>
	</tr>
	
	<tr>
		<td><label>Checked by</label></td><td><input type="text" name="checker" /></td>
	</tr>
	
	<tr>
		<td><label>Approved by</label></td><td><input type="text" name="approver" /></td>
	</tr>
	
	<tr>
		<td><input type="submit" value="Add sample information" /></td>
	</tr>
</table>
<?php echo form_close();?>
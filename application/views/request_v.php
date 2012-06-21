<script>
	$(function() {
		$("#neworreturning").dialog({
			resizable : false,
			height : 140,
			modal : true,
			buttons : {
				"New" : function() {
					$(document.getElementById("applicant_name")).replaceWith('<input type="text" name="applicant_name" id="applicant_name"/>');
					$(this).dialog("close");
				},
				"Returning" : function() {
					$(this).dialog("close");
				}
			}
		});
	});

</script>

<?php
$attributes = array('enctype' => 'multipart/form-data');
echo form_open('request_management/save', $attributes);
echo validation_errors('
<p class="error">', '</p>');
?>


<div name="client_number" id="sss">NDQ<label id="client_number" style="color: red"></label><?php echo "/" .date('Y') . "/".date('m') ?>/<?php echo $sample_id->id + 1;?></div>
<table style="margin: 5px auto; border: 2px solid #EEEEEE;" id="tests">
<tr>
	<th style="font-size: 13px">ANALYSIS REQUEST REGISTER</th><td></t><td></td><td></td><td></td>
</tr>	
<tr>
<td>Applicant Name</td>
<td>
	<select name="applicant_name" id="applicant_name">
				<option value="0" id="">Select Client</option>
				<?php
				foreach ($clients as $client) {
					echo '<option value="' . $client -> id . '" id="' . $client -> Client_number . '">' . $client -> Name . '</option>';
				}//end foreach
				?>
			</select>
</td>

<td>Applicant Address<td/>
<td><input type="text" name="applicant_address" /></td>
</tr>

<tr>
<td>Contact Name</td>
<td><input type="text" name="contact_name" /></td>

<td>Contact Telephone<td/>
<td><input type="text" name="contact_telephone" /></td>
</tr>


<tr>
<td>Product Name</td>
<td><input type="text" name="product_name" /></td>

<td>Product Presentation<td/>
<td><input type="text" name="product_presentation" /></td>
</tr>

<tr>
<td>Manufacturer Name</td>
<td><input type="text" name="manufacturer_name" /></td>

<td>Manufacturer Address<td/>
<td><input type="text" name="manufacturer_address" /></td>
</tr>

<tr>
<td>Batch/Lot Number</td>
<td><input type="text" name="batch_no" /></td>
</tr>

<tr>
<td>Expiry Date</td>
<td><input type="text" name="expiry_date" /></td>

<td>Manufacture Date<td/>
<td><input type="text" name="manufacture_date" /></td>
</tr>

<tr>
<td>Active Ingredients</td>
<td><input type="text" name="active_ingredients" /></td>
</tr>

<tr>
<td>Quantity Submitted</td>
<td><input type="text" name="quantity" /></td>
</tr>


<tr>
<td>Applicant's Reference Number</td>
<td><input type="text" name="applicant_reference_number" /></td>
</tr>

<div id="neworreturning" title="New or Returning Client">Is this a new or returning client?</div>
<tr>
	<th style="font-size: 13px">Tick against required tests</th><td></td><td></td><td></td>
</tr>
<tr>
<td>Identification</td>	<td><input type="checkbox" name="identification"/></td>	<td>Microbial Identification</td><td><input type="checkbox" name="microbial_identification"/></td>
</tr>

<tr>
<td>Dissolution</td>	<td><input type="checkbox" name="dissolution"/></td>	<td>Preservative Efficacy Test</td><td><input type="checkbox" name="preservative_efficacy"/></td>
</tr>

<tr>
<td>Disintegration</td>	<td><input type="checkbox" name="disintegration"/></td>	<td>Melting Point</td><td><input type="checkbox" name="melting_point"/></td>
</tr>

<tr>
<td>Friability</td>		<td><input type="checkbox" name="friability"/></td>	<td>Relative Density</td><td><input type="checkbox" name="relative_density"/></td>
</tr>

<tr>
<td>Assay</td>			<td><input type="checkbox" name="assay"/></td>	<td>Refractive Index</td><td><input type="checkbox" name="refractive_index"/></td>
</tr>

<tr>
<td>Uniformity of Weight</td>			<td><input type="checkbox" name="uniformity_of_weight"/></td>	<td>Condom Tests</td><td><input type="checkbox" name="condom_tests"/></td>
</tr>

<tr>
<td>pH(Acidity/Alkalinity)</td>			<td><input type="checkbox" name="pH"/></td>	<td>Glove Tests</td><td><input type="checkbox" name="glove_tests"/></td>
</tr>

<tr>
<td>Microbial Contamination Test</td>	<td><input type="checkbox" name="microbial_contaminants"/></td>	<td>Other Tests(Please specify)</td><td><input type="text" name="other" /></td>
</tr>

<tr>
<td>Sterility</td>						<td><input type="checkbox" name="sterility"/></td>	<td></td><td></td>
</tr>

<tr>
<td>Bacterial Endotoxin Test</td>		<td><input type="checkbox" name="bacterial_endotoxin"/></td>	<td></td><td></td>
</tr>

<tr>
<td>Package Integrity</td>				<td><input type="checkbox" name="package_integrity"/></td>	<td></td><td></td>
</tr>

<tr>
<td>Viscosity</td>						<td><input type="checkbox" name="viscosity"/></td>	<td></td><td></td>
</tr>

<tr>
<td>Full Monograph(specify compendium)</td>	<td><input type="checkbox" name="full_monograph"/></td>	<td></td><td></td>
</tr>

<tr>
	<th style="font-size: 13px">Name and Designation of person authorizing the test</th>
</tr>
<tr>
	<td>Name</td><td><input type="text" name="designator_name"/></td> <td>Designation</td><td><input type="text" name="designation"/></td><td>Date</td><td><input type="text" name="designation_date" /></td>
</tr>
<tr>
	<td><input class="button" name="submit" type="submit" value="Save Request"></td>
</tr>
</table>
<script>
 $("select").change(function () {
          var str = "";
          $("select option:selected").each(function () {
               str += $(this).attr("id") + " ";
              });
          $("#client_number").text(str);
        })
       .trigger('change');

</script>
<?php echo form_close();?>
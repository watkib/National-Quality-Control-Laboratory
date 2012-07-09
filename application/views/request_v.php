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

<input type="hidden" id="client_details" value="" />
<label id="client_number"></label>
<table style="margin: 5px auto; border: 2px solid #EEEEEE;" id="tests">
<tr>
	<th style="font-size: 13px">ANALYSIS REQUEST REGISTER</th><td></t><td></td><td></td><td></td>
</tr>	
<tr>
<td>Applicant Name</td>
<td>
	<select name="applicant_name" id="applicant_name">
				<option value="" id=""></option>
				<?php
				foreach ($clients as $client) {
					echo '<option value="' . $client -> id . '" id="' . $client -> Client_number . '">' . $client -> Name . '</option>';
				}//end foreach
				?>
			</select>
</td>

<td>Applicant Address<td/>
<td><input type="text" name="applicant_address" id="applicant_address" /></td>
</tr>

<tr>
<td>Contact Name</td>
<td>		<input type="text" id="contact_name" name="contact_name"></label>
	</td>

<td>Contact Telephone<td/>
<td><input type="text" name="contact_telephone" id="contact_telephone" /></td>
</tr>


<tr>
<td>Product Name</td>
<td><input type="text" name="product_name" /></td>

<td>Dosage Form<td/>
<td><input type="text" name="dosage_form" /></td>
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
<td>Manufacture Date</td>
<td><input type="text" name="manufacture_date" id="manufacture_date" /></td>

<td>Expiry Date<td/>
<td><input type="text" name="expiry_date" id="expiry_date" /></td>
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
	<th>Departmental Tests</th>
</tr>
<tr>
<!--Accrodion-->
<td>
<div class="Accordion" id="sampleAccordion" tabindex="0">
	<div class="AccordionPanel">
		<div class="AccordionPanelTab"><b>Wet Chemistry Department</b></div>
		<div class="AccordionPanelContent">
			<table>
				<?php

				foreach ($wetchemistry as $wetchem) {
					echo "<tr><td>" . $wetchem -> Name . "</td><td><input type=checkbox id=" . $wetchem -> Alias . " value=" . $wetchem -> id. " name=test[]/></td></tr>";
				}
			?>
			</table>
		</div>
	</div>
	<div class="AccordionPanel">
		<div class="AccordionPanelTab"><b>Microbiological Analysis Department</b></div>
		<div class="AccordionPanelContent">
			<table>
				<?php

				foreach ($microbiologicalanalysis as $microbiology) {
					echo "<tr><td>" . $microbiology -> Name . "</td><td><input type=checkbox id=" . $microbiology -> Alias . " name=test[] value=" . $microbiology -> id . " /></td></tr>";
				}
				?>
			</table>
		</div>
	</div>
	<div class="AccordionPanel">
		<div class="AccordionPanelTab"><b>Medical Devices Department</b></div>
		<div class="AccordionPanelContent">
			<table>
			<?php

			foreach ($medicaldevices as $medical) {
				echo "<tr><td>" . $medical -> Name . "</td><td><input type=checkbox id=" . $medical -> Alias . " name=test[] value=" . $medical -> id . " /></td></tr>";
			}
			?>
			</table>
		</div>
	</div>
</div>
</td>
<!-- End Accrodion-->
<td>Full Monograph <input type="checkbox" name="fullmonograph" id="fullmonograph" value="fullmonograph" /></td>
</tr>

<tr>
	<th style="font-size: 13px">Name and Designation of person authorizing the test</th>
</tr>
<tr>
	<td>Name</td><td><input type="text" name="designator_name"/></td> <td>Designation</td><td><input type="text" name="designation"/></td><td>Date</td><td><input type="text" name="designation_date" id="designation_date"/></td>
</tr>
<tr>
	<td><input class="button" name="submit" type="submit" value="Save Request"></td>
</tr>
</table>
<script>

	$("select").change(function() {
		var str = "";
		
		$("select option:selected").each(function() {
			str += $(this).attr("id") + " ";
		});
		$("#client_number").text("NDQ" + str + "/" + <?php echo date('Y') ?> + "/" + <?php echo date('m')?> + "/" + <?php echo $sample_id -> id + 1; ?>);
		var label_contents = $("#client_number").html();
		document.getElementById("client_details").value = label_contents;
	}).trigger('change');

</script>
<script>
	$(document.getElementById('applicant_name')).change(function() {
		$.ajax({
			url : '../api.php',
			data : "id=" + document.getElementById('applicant_name').value,

			dataType : 'json',
			success : function(data) {
				var phone = data[5];
				var address = data[2];
				var name = data[4];

				document.getElementById('contact_name').value = name;
				document.getElementById('applicant_address').value = address;
				document.getElementById('contact_telephone').value = phone;
			}
		});
	});

	</script>
	<script language="JavaScript" type="text/javascript">
		var sampleAccordion = new Spry.Widget.Accordion("sampleAccordion");

		$(function() {
			$("#fullmonograph").change(function() {
				if($('#fullmonograph').is(':checked')) {
					document.getElementById("identification").checked = true;
					document.getElementById("dissolution").checked = true;
					document.getElementById("disintegration").checked = true;
					document.getElementById("friability").checked = true;
					document.getElementById("assay").checked = true;
					document.getElementById("uniformity").checked = true;
					document.getElementById("ph").checked = true;
					document.getElementById("contamination").checked = true;
					document.getElementById("sterility").checked = true;
					document.getElementById("endotoxin").checked = true;
					document.getElementById("integrity").checked = true;
					document.getElementById("viscosity").checked = true;
					document.getElementById("microbes").checked = true;
					document.getElementById("efficacy").checked = true;
					document.getElementById("melting").checked = true;
					document.getElementById("relativity").checked = true;
					document.getElementById("condom").checked = true;
					//document.getElementById("syringe").checked = true;
					document.getElementById("needle").checked = true;
					document.getElementById("glove").checked = true;
					document.getElementById("refractivity").checked = true;
				}
			});
		});
		$(function() {
			$("#expiry_date").datepicker();
			$("#manufacture_date").datepicker();
			$("#designation_date").datepicker();
			
		});

	</script>
<?php echo form_close();?>
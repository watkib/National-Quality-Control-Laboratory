<?php
$this -> load -> helper('url');
$this -> load -> helper('form');
?>
<script type="text/javascript">
	$(function(){
var chart = new FusionCharts('<?php echo base_url().'Scripts/FusionCharts/Charts/MSLine.swf'?>', "ChartId", "500", "250", "0", "0");
	chart.setDataURL('<?php echo base_url().'home_controller/diseaseTrendGraph/'.$values[0]."/".$values[1];?>');
	chart.render("diseasetrends");
	});
$(function(){
var chart = new FusionCharts('<?php echo base_url().'Scripts/FusionCharts/Charts/MSLine.swf'?>', "ChartId2", "500", "250", "0", "0");
	chart.setDataURL('<?php echo base_url().'home_controller/positivityGraph/'.$values[0]."/".$values[2]."/".$values[3];?>');
	chart.render("positivities");
	});
</script>
<div align="center">
	<?php echo form_open('home_controller/dave');?>
	<table>
		<tr>
			<td> Province
			<select name="province" id="province">
				<option value="0" selected>--Select Province--</option>
				<?php
				foreach ($provinces as $province) {
					echo "<option value='$province->id'>$province->Name</option>";
				}
				?>
			</select></td>
			<td> Epiweek
			<select name="epiweek" id="epiweek">
				<option value="0" selected>--Select Epiweek--</option>
				<?php
				foreach ($epiweeks as $epiweek) {
					echo "<option value='$epiweek->epiweek'>$epiweek->epiweek</option>";
				}
				?>
			</select></td>
			<td> Year
			<select name="year" id="year">
				<option value="0" selected>--Select Year--</option>
				<?php
				foreach ($years as $year) {
					echo "<option value='$year->filteryear'>$year->filteryear</option>";
				}
				?>
			</select></td>
			<td> Disease
			<select name="disease" id="disease">
				<option value="0" selected>--Select Disease--</option>
				<?php
				foreach ($diseases as $disease) {
					echo "<option value='$disease->id'>$disease->Name</option>";
				}
				?>
			</select></td>
			<td><input name="filter" type="submit" class="button" value="Filter"/></td>
		</tr>
	</table>
	<?php echo form_close();?>

	<div id="diseasetrends" class="graph_container" align="left" ></div>
	<div id="positivities" class="graph_container" align="right" ></div>
	<div id="epidemicdiseases">
		<table>
			<caption><strong>Epidemic Prone Disease Occurences</strong></caption>
			<tr>
				<th>Disease</th>
				<th>District</th>
				<th>Male Cases Under 5</th>
				<th>Female Cases Under 5</th>
				<th>Male Deaths Under 5</th>
				<th>Female Deaths Under 5</th>
				<th>Male Cases Above 5</th>
				<th>Female Cases Above 5</th>
				<th>Male Deaths Above 5</th>
				<th>Female Deaths Above 5</th>				
			</tr>
					<?php
					foreach($epidemiks as $epidemic){
						echo "<tr>
						<td>$epidemic->Disease</td><td>$epidemic->District</td>
						<td>$epidemic->Lmcase</td><td>$epidemic->Lfcase</td><td>$epidemic->Lmdeath</td><td>$epidemic->Lfdeath</td>
						<td>$epidemic->Gmcase</td><td>$epidemic->Gfcase</td><td>$epidemic->Gmdeath</td><td>$epidemic->Gfdeath</td>
						</tr>";
					}
					?>
		</table>
	</div>

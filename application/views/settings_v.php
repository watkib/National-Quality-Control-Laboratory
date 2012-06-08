<?php
if(!isset($quick_link)){
$quick_link = null;
}  
?>
<div id="sub_menu">
	
	<a href="<?php echo site_url('equipment_management');?>" class="top_menu_link sub_menu_link first_link  <?php if($quick_link == "equipment"){echo "top_menu_active";}?>">Equipment</a>
<a href="<?php echo site_url("sample_controller");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "sample"){echo "top_menu_active";}?>">Samples</a>
<a href="<?php echo site_url("equipment_used_controller");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "equipment_used"){echo "top_menu_active";}?>">Equipment Used</a>
</div>
<div id="main_content">
<?php
$this->load->view($settings_view);
?>
</div>

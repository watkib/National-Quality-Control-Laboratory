<?php
error_reporting(E_ALL ^ E_NOTICE);
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home_Controller extends MY_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this -> home();
	}

	public function home() {
		$currentyear = date('Y');
		$rights = User_Right::getRights($this -> session -> userdata('access_level'));
		$menu_data = array();
		$menus = array();
		$counter = 0;
		foreach ($rights as $right) {
			$menu_data['menus'][$right -> Menu] = $right -> Access_Type;
			$menus['menu_items'][$counter]['url'] = $right -> Menu_Item -> Menu_Url;
			$menus['menu_items'][$counter]['text'] = $right -> Menu_Item -> Menu_Text;
			$counter++;
		}
		$this -> session -> set_userdata($menu_data);
		$this -> session -> set_userdata($menus);

		$provinces = Province::getAll();
		$epiweeks = Surveillance::getEpiweek();
		$years = Surveillance::getYears();
		$diseases = Diseases::getAllObjects();
		$epidemiks = Surveillance::tableEpidemicProneDiseases($epiweek, $disease, $year);

		$data['epiweeks'] = $epiweeks;
		$data['provinces'] = $provinces;
		$data['years'] = $years;
		$data['diseases'] = $diseases;
		$data['epidemiks'] = $epidemiks;
		$data['scripts'] = array("FusionCharts/FusionCharts.js");
		$data['title'] = "System Home";
		$data['content_view'] = "home_v";
		$data['banner_text'] = "System Home";
		$data['link'] = "home";
		$this -> load -> view("template", $data);

	}

	function diseaseTrendGraph($year, $disease) {
		$epiweeks = Surveillance::getEpiweek();
		$diseasedata = Surveillance::graphWeeklyDiseaseSummaries($year, $disease);

		$strXML = "<chart showBorder='0' labelStep='5' caption='Disease Trends' shownames='1' showvalues='0' xAxisName='Epiweek' yAxisName='Deaths and Cases'>
               <categories>";
		foreach ($epiweeks as $epiweek) {
			$epi = $epiweek -> epiweek;
			$strXML .= "<category label='$epi'/>";
		}
		$strXML .= "</categories>
               <dataset seriesName='Deaths' color='AFD8F8' showValues='0'>";

		foreach ($diseasedata as $diseasedata1) {
			$cases = $diseasedata1 -> Cases;
			$strXML .= "<set value='$cases'/>";
		}

		$strXML .= "</dataset>
               <dataset seriesName='Cases' color='F6BD0F' showValues='0'>";
		foreach ($diseasedata as $diseasedata2) {
			$deaths = $diseasedata2 -> Deaths;
			$strXML .= "<set value='$deaths'/>";
		}

		$strXML .= "</dataset>        
               </chart>";
		echo $strXML;
	}

	function positivityGraph($year,$province,$epiweek) {
		$provinces = Province::getAll();
		//$positivityData = Lab_Weekly::getPositivity($year, $epiweek, $province);

		$strXML = "<chart showBorder='0' caption='Positivity Rates' shownames='1' showvalues='0' xAxisName='Positivity' yAxisName='Province'>
	 <categories>";
		foreach ($provinces as $province) {
			$mkoa = $province -> Name;
			$strXML .= "<category label='$mkoa'/>";
		}
		$strXML .= "</categories>";

		$strXML .= "<dataset seriesName='Cases Above 5' color='F1683C' showValues='0'>";
		foreach ($provinces as $province) {
			

/*			foreach ($positivityData as $positiveCases) {

				
			}*/
			$x = Lab_Weekly::getPositivity($year, $province->id, $epiweek);
			$above = $x -> Above;
			$strXML .= "<set value='$above'/>";

		}
		$strXML .= "</dataset>";

		$strXML .= "<dataset seriesName='Cases Below 5' color='2AD62A' showValues='0'>";
		foreach ($provinces as $province) {

			$y = Lab_Weekly::getPositivity($year, $province->id, $epiweek);
			$below = $y -> Below;
			$strXML .= "<set value='$below'/>";

		}
		$strXML .= "</dataset>";

		$strXML .= "</chart>";
		echo $strXML;

	}

	function dave() {
		$year = $_POST['year'];
		$disease = $_POST['disease'];
		$province = $_POST['province'];
		$epiweek = $_POST['epiweek'];
		$values = array($year, $disease, $province, $epiweek);

		$currentyear = date('Y');
		$rights = User_Right::getRights($this -> session -> userdata('access_level'));
		$menu_data = array();
		$menus = array();
		$counter = 0;
		foreach ($rights as $right) {
			$menu_data['menus'][$right -> Menu] = $right -> Access_Type;
			$menus['menu_items'][$counter]['url'] = $right -> Menu_Item -> Menu_Url;
			$menus['menu_items'][$counter]['text'] = $right -> Menu_Item -> Menu_Text;
			$counter++;
		}
		$this -> session -> set_userdata($menu_data);
		$this -> session -> set_userdata($menus);

		$provinces = Province::getAll();
		$epiweeks = Surveillance::getEpiweek();
		$years = Surveillance::getYears();
		$diseases = Diseases::getAllObjects();
		$epidemiks = Surveillance::tableEpidemicProneDiseases($epiweek, $disease, $year);

		$data['epiweeks'] = $epiweeks;
		$data['epidemiks'] = $epidemiks;
		$data['provinces'] = $provinces;
		$data['years'] = $years;
		$data['diseases'] = $diseases;
		$data['values'] = $values;
		$data['scripts'] = array("FusionCharts/FusionCharts.js");
		$data['title'] = "System Home";
		$data['content_view'] = "home_v";
		$data['banner_text'] = "System Home";
		$data['link'] = "home";
		$this -> load -> view("template", $data);
	}

}

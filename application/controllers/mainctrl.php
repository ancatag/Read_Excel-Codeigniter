<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mainctrl extends CI_Controller {

		function __construct () {
				parent::__construct ();
		}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = $this->Init->initPath ('/mainctrl');
		$this->load->view('pages/home',$data);
		//$this->user();
	}
	public function updateTable()
	{ 
	$data = $this->init->initPath ('/mainctrl');	
  	
	  	//City Table
	  	$cityList = array();
		$cityListArray = array();
		
		$objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
		$objReader->setReadDataOnly(true);

		//FileName and Sheet Name
		$objPHPExcel = $objReader->load("test_data.xlsx");
		$worksheet = $objPHPExcel->getSheetByName('City');


		$highestRow = $worksheet->getHighestRow(); // e.g. 12
		$highestColumn = $worksheet->getHighestColumn(); // e.g M' 

		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 7
		//Ignoring first row (As it contains column name)
		for ($row = 2; $row <= $highestRow; ++$row) {
			//A row selected
		    for ($col = 1; $col <= $highestColumnIndex; ++$col) {
			    // values till $cityList['1'] till $cityList['last_column_no'] 
		        $cityList[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue(); 
		    	} 
		    	array_push ($cityListArray, $cityList);
		    	//next row, from top
		}
		
		//Calling modal function to insert into table
		$status = $this->data->updateCityTable($cityListArray);
		  
	}

}

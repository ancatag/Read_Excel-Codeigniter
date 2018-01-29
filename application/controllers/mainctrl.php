<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
  	
	  	//Route Table
	  	$routeList = array();
		$routeListArray = array();
		
		$objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load("test_data.xlsx");
		$worksheet = $objPHPExcel->getSheetByName('City');
		//$worksheet = $spreadsheet->getActiveSheet();

		$highestRow = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5
		for ($row = 2; $row <= $highestRow; ++$row) {
		    for ($col = 1; $col <= $highestColumnIndex; ++$col) {
		        $routeList[$col] = $worksheet->getCellByColumnAndRow($col, $row)->getValue();  
		    	}
		    	array_push ($routeListArray, $routeList);
		}
			$status = $this->data->updateRouteTable($routeListArray);
		    //$response['status'] = $status;
	        //echo json_encode ($response);
	}
}

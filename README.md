# Read_Excel-PHP
A PHP (Codeigniter) code to read excel sheets and insert (or update) data to SQL table

### Technologies used ###
* [Codeigniter Version 3](https://codeigniter.com/) 
* PHP 7.0.10
* MySQL 5.7.14
* Uses [PhpSpreadsheet Library](https://github.com/PHPOffice/PhpSpreadsheet) 

## Contents:
1. Source Code: 
	* A controller function 'updateTable' to read excel file and create an array of arrays.
	* A modal function 'updateCityTable' to insert the array to the database table.
2. A test excel file 'test_data' with one sheet 'City'.
3. A SQL file 'excel.sql' to create the table (As per the sheet in the excel file) 
4. PhpSpreadSheet Libary files.

### How do I get set up? ###

* To run server side code locally you can use LAMP, WAMP, MAMP, or XAMP
* Clone the file and make the necessary changes. 
	
	- .\application\config\config.php
		* Change $base_url

	- .\.htaccess	
		* RewriteBase \foldername
    
 	- .\application\config\database.php
		* Change the databasse name, username and password
 
 * Create a database and import excel.sql file into it, to create the table as per the sheet in the excel file. 
 
(Read this [Documentation](https://codeigniter.com/user_guide/) for issues regarding Codeigniter)
  
### How to run the code? ###
Go to the link http://localhost/"your_base_url_here_if_any"/Read_Excel-PHP/mainctrl/UpdateTable
And the table you have created should be populated with the data.
PS: I have switched of the databse debug in .\application\config\database.php, for debugging purpose change the line,
	* 'db_debug' => FALSE, To
	* 'db_debug' => (ENVIRONMENT !== 'production')

### PhpSpreadsheet Library ###
Make sure that you download the latest version of `PhpSpreadsheet Library` file from
the releases section **[here](https://github.com/PHPOffice/PhpSpreadsheet)**.
(The vendor folder contains the downloaded PhpSpreadsheet Library files in this project)

### Who do I talk to? ###
* [Ancatag Technologies](mailto:info@ancatag.com?Subject=Regarding%20Read_Excel-PHP)
* [Mazahir Haroon](mailto:mazahirharoon@gmail.com?Subject=Regarding%20Read_Excel-PHP)

<?PHP

class Data extends CI_Model {

    function __construct () {
        parent::__construct ();
    }

    function updateCityTable ($city) {
      
     foreach ($city as $each_city){
            $data = array(
              'city_id' => $each_city['1'],
              'city_name' => $each_city['2'],
              );
          $this->db->insert('city', $data);
        }
      return 1;
    }
}

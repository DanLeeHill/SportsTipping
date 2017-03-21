<?php

  class model_fixture extends CI_Model {

    function __construct() {

      parent::__construct();

    }

    function Submit ()
    {
      parent::Controller();

      $this->view_data['base_url'] = base_url();
    }

    function getRound(){
      $query = $this->db->query('SELECT Round FROM 2017_AFL_Fixture WHERE Date >= CURDATE() ORDER BY Date ASC');

      if ($query->num_rows()>0) {
        return $query->result();
      }else{
        return NULL;
      }
    }
    function getTeam(){
      $query = $this->db->query('SELECT * FROM 2017_AFL_Teams');

      if ($query->num_rows()>0) {
        return $query->result();
      }else{
        return NULL;
      }
    }

    function getFixture(){
      $query = $this->db->query('SELECT Game, Date, (SELECT Team FROM 2017_AFL_Teams WHERE 2017_AFL_Fixture.Home = 2017_AFL_Teams.ID) AS Home_Team, (SELECT Team FROM 2017_AFL_Teams WHERE 2017_AFL_Fixture.Away = 2017_AFL_Teams.ID) AS Away_Team, Ground, Time_EST FROM 2017_AFL_Fixture WHERE Round = (SELECT Round FROM 2017_AFL_Fixture WHERE Date >= CURDATE() ORDER BY date ASC LIMIT 1)');

      if ($query->num_rows()>0) {
        return $query->result();
      }else{
        return NULL;
      }
    }



  }

?>

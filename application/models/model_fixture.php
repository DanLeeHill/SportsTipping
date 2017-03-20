<?php

  class model_fixture extends CI_Model {

    function __construct() {

      parent::__construct();

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
      $query = $this->db->query('SELECT Round, Date, (SELECT Team FROM 2017_AFL_Teams WHERE 2017_AFL_Fixture.Home = 2017_AFL_Teams.ID) AS Home_Team, (SELECT Team FROM 2017_AFL_Teams WHERE 2017_AFL_Fixture.Away = 2017_AFL_Teams.ID) AS Away_Team, Ground, Time_EST FROM 2017_AFL_Fixture');

      if ($query->num_rows()>0) {
        return $query->result();
      }else{
        return NULL;
      }
    }



  }

?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipping extends CI_Controller {

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
	 function __construct() {
	 parent::__construct();
	 $this->load->model('model_tipping');
	 }

	public function index()
	{
		$this->home();

	//Including validation library
	$this->load->library('form_validation');

	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

	//Validating Name Field
	$this->form_validation->set_rules('tipERR', 'Your Tip', 'required');

	//Validating Mobile no. Field
	$this->form_validation->set_rules('marginERR', 'margin', 'required|regex_match[[0-9]]');

	if ($this->form_validation->run() == FALSE) {
	$this->load->view('view_tipping');
	} else {
	//Setting values for tabel columns
	/*$data = array(
	'Student_Name' => $this->input->post('dname'),
	'Student_Email' => $this->input->post('demail'),
	'Student_Mobile' => $this->input->post('dmobile'),
	'Student_Address' => $this->input->post('daddress')
);
	//Transfering data to Model
	$this->model_tipping->form_insert($data);
	$data['message'] = 'Data Inserted Successfully';
	//Loading View
	$this->load->view('view_tipping', $data);*/
}
	}

	public function home()
	{
		$this->load->model('model_tipping');

		$data['title'] = '2017 AFL Tipping Competition';
		$data['page_header'] = 'Select your tips';
		$data['Round'] = $this->model_tipping->getRound();
		$data['Team'] = $this->model_tipping->getTeam();
		$data['Fixture'] = $this->model_tipping->getFixture();
		$marginArray = array(
			'id'    			=>  "textinput",
			'name'				=>	"margin",
			'type'				=>	"number",
			'placeholder'	=>	"0",
			'class'				=>	"form-control input-md"

		);
		$data['MarginSelector']  = form_label('Winning Margin');
		$data['MarginSelector'] .= form_error('marginERR');
		$data['MarginSelector'] .= form_input($marginArray);
		$this->load->view('view_tipping', $data);
	}

}

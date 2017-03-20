<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->home();
	}

	public function home()
	{
		$this->load->model('model_fixture');

		$data['title'] = '2017 AFL Tipping Competition';
		$data['page_header'] = 'The 2017 AFL Teams';
		$data['Team'] = $this->model_fixture->getTeam();
		$data['Fixture'] = $this->model_fixture->getFixture();

		$this->load->view('welcome_message', $data);
	}

}

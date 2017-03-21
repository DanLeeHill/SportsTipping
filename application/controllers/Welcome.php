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
		$data['page_header'] = 'Select your tips';
		$data['Round'] = $this->model_fixture->getRound();
		$data['Team'] = $this->model_fixture->getTeam();
		$data['Fixture'] = $this->model_fixture->getFixture();
		$data['MarginSelector'] =
		'<!-- Text input for margin-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="textinput">Margin</label>
		  <div class="col-md-4">
		  <input id="textinput" name="textinput" type="number" placeholder="placeholder" class="form-control input-md">
		  </div>
		</div>';

		$this->load->view('welcome_message', $data);
	}

}

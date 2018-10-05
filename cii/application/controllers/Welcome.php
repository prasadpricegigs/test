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
		$this->load->view('welcome_message');

		$this->load->library('Myclass');
		$this->myclass->some_function();
		
		$this->load->library('Table');
		$this->table->functionname();
	}


	public function test_db()
	{
        $this->load->database();
		$query = $this->db->get("load_more_countries");
		echo "<pre>";
		print_r($query->result());
      
       $another_db= $this->load->database('second_db',TRUE);

       $query = $another_db->get("employeeinfo");
		echo "<pre>";
		print_r($query->result());

	}

   public function view_items()
   {
      $another_db= $this->load->database('second_db',TRUE);

       $query = $another_db->get("employeeinfo");
       
       $data['data']= $query->result_array();
       //print_r($query->result_array());

       $this->load->view('item_list',$data);
  }
   
   public function delete()
    {
   	//echo $id;die;
    $id= $this->input->post('id');
    $this->load->database();
    $andb= $this->load->database('second_db',TRUE);
    $andb->delete('employeeinfo', array('emp_id' => $id));
    
    //echo $andb->last_query();die;
    
    echo 'Deleted successfully.';
    }

    public function view_page()
    {

    	$this->load->view('insert_page');
    }  

     public function insert()
    {

    	$fname = $this->input->post('fname');
    	$lname = $this->input->post('lname');
    	$email = $this->input->post('email');

    	$data = array('firstname'=>$fname,
    		          'lastname'=>$lname,
    		          'email'=>$email);
            
            print_r($data);
            $adb = $this->load->database('second_db',TRUE);
            $adb->insert('employeeinfo',$data);
              $this->load->view('insert_page');
    
           // echo "sucess";


    }   



}

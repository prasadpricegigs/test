<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Home extends CI_Controller 
{ 

     public function index()
      {
       $query =  $this->db->get('employeeinfo');
       $data['res'] = $query->result_array();
                //print_r($data);die;
      $this->load->view('home', $data);
      }

     public function delete($id)
    {

        $id = $this->uri->segment(3);
        echo $id;
        $this->db->where('id',$id);
        $query = $this->db->delete('employeeinfo');
//redirect($this->uri->uri_string());
        redirect('../home');
      
      //  redirect('../home/index');
                  
         // $this->load->view('home');
}

public function status()
{

$status = $this->input->post('status');

$id = $this->input->post('id');

$arr1 = array(
'status'=>$status,
);

//$andb = $this->load->database('second_db',TRUE);

$this->db->where('id',$id);

$this->db->update('employeeinfo',$arr1);


//redirect($this->uri->uri_string());
 redirect('../home');
//redirect('../home/index');

//redirect($_SERVER['REQUEST_URI'], 'refresh'); 
}

} 
/* End of file w
elcome.php */
/* Location: ./application/controllers/home.php */

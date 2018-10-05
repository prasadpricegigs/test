<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

public function index()
{

$andb= $this->load->database('second_db',TRUE);

$query = $andb->get("employeeinfo");

$data['data'] = $query->result_array();

$this->load->view('show_reports',$data);

}
public function remove()
{
	$id = $this->input->post('emp_id');
//echo $id;die;
	$andb= $this->load->database('second_db',TRUE);

	$andb->where_in('emp_id',explode(",",$id));
	
	$andb->delete('employeeinfo');

	echo $id;
}
public function insert()
{

$firstname = $this->input->post('firstname');
$lastname = $this->input->post('lastname');
$email  = $this->input->post('email');
$salary = $this->input->post('salary');

$arr = array('firstname' =>$firstname,
             'lastname' =>$lastname,
             'email'=>$email,
             'salaryofemployee'=>$salary);
print_r($arr);

$andb = $this->load->database('second_db',TRUE);

$andb->insert('employeeinfo',$arr);

}

public function status()
{
$status = $this->input->post('status');

$id = $this->input->post('emp_id');

$arr1 = array(
'status'=>$status,
);

$andb = $this->load->database('second_db',TRUE);

$andb->where('emp_id',$id);

$andb->update('employeeinfo',$arr1);

echo "sucess";

}

}
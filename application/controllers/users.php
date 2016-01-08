<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {
	// Display home page
	public function index()
	{
		$this->load->view('login_page');
	}
	// Run through Validations & Login/Registration
	public function user_login()
	{
		// Load validation library
		$this->load->library('form_validation');
		// Check which form is submitted 
		if($this->input->post('form') === 'login')
		{
			$this->form_validation->set_rules("email", "Email", "required|valid_email|ucwords");
			$this->form_validation->set_rules('password', 'Password', 'required|md5');
			// Check for submitted email in database upon successful form validation
			if($this->form_validation->run())
			{  
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$this->load->model('user_model'); 
				$user = $this->user_model->get_user_by_email($email); 
				if($user && $user['password'] === $password)
				{
					/* 
						Check if email exists and if both passwords match,  
					   	then send the users to their individual profiles 
					 */
					$this->session->set_userdata('user', $user);
					redirect('/users/profile');
				}
				else // If passwords don't match or if email's not located
				{
					$this->session->set_flashdata('email', "Incorrect Email or Password");
					redirect('/'); // redirect to the login page
				}
			} 
			else // If the form did not validate
			{
				$this->session->set_flashdata('email', form_error('email'));
				$this->session->set_flashdata('password', form_error('password'));
				redirect('/'); // redirect to the login page			
			}
		}
		else // Run through the === REGISTRATION FORM  
		{
			$this->form_validation->set_rules("first_name", "First Name", "required|alpha|ucwords");
			$this->form_validation->set_rules("last_name", "Last Name", "required|alpha|ucwords");
			$this->form_validation->set_rules('email2', 'Email', 'required|valid_email|callback_check_for_email');
			$this->form_validation->set_rules('password2', 'Password', "required|min-length[8]|matches[pass_conf]|md5");
			$this->form_validation->set_rules('pass_conf', 'Confirm password', 'required|min-length[8]');
			
			if($this->form_validation->run())
			{
				// Add post data to '$user' array
				$user['first_name'] = $this->input->post('first_name');
				$user['last_name'] = $this->input->post('last_name');
				$user['email'] = $this->input->post('email2');
				$user['password'] = $this->input->post('password2');
				
				/* Insert $user data into the database. Upon success, return 
				   data collected from the database to the same $user variable */
				$this->load->model('user_model'); 
				if($this->user_model->create_user($user))
				{
					$user = $this->user_model->get_user_by_email($user['email']);
					$this->session->set_userdata('user', $user);
					redirect('/users/profile');
				}
			}
			else // If REGISTRATION FORM did not validate
			{
				$this->session->set_flashdata('first_name', form_error('first_name'));
				$this->session->set_flashdata('last_name', form_error('last_name'));
				$this->session->set_flashdata('email2', form_error('email2'));
				$this->session->set_flashdata('password2', form_error('password2'));
				$this->session->set_flashdata('pass_conf', form_error('pass_conf'));
				redirect('/');
			}
			function check_for_email() // function for callback function in form validation [ line: 52 ]
			{
				$this->load->model('user_model'); 
				if($this->user_model->get_user_by_email($this->input->post('email2'))->row_array())
				{
					$this->session->set_flashdata('email2', "This email already exists"); 
					return FALSE; 
				}
				else 
				{
					return TRUE; 
				}
			}
		}
	}
	// Send users to their individual profiles
	public function profile()
	{
		$user = $this->session->userdata('user');
		$this->load->view('profile', $user);
	}
	// log user out 
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
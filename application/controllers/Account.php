<?php
/**
 * Created by PhpStorm.
 * User: zelalem birehanu
 * Date: 6/22/2015
 * Time: 4:05 AM
 */

class Account extends Welcome {
    public function login()
    {
        $this->form_validation->set_rules('Username','Username','required');
        $this->form_validation->set_rules('Password','Password','required|trim|callback_verifyUser');

        if($this->form_validation->run() == false){
            $this->Doc_online_model->checkNew();
            $data['comments'] = $this->Doc_online_model->sortComment();
            $data['posts'] = $this->Doc_online_model->sortPost(3);
            $data['index_posts'] = $this->Doc_online_model->sortPost($this->Doc_online_model->record_count("posts"));

            $this->load->view('index',$data);
        }else{
            if($this->verifyUser())
                redirect('Welcome');
            else{
                redirect('Welcome');
            }
        }
    }
    //////////////////////////////////////// Verify User ///////////////////////////////////////////////////
    public function verifyUser(){
        $uname = $this->input->post('Username');
        $passwd = $this->input->post('Password');
        $passwd = md5($passwd);

        if($this->Doc_online_model->login($uname,$passwd)){
            return true;
        }else{
            $this->form_validation->set_message('verifyUser','Incorrect Username or Password. Please try again.');
            return false;
        }

    }
    /////////////////////////////////////////// Logout  ///////////////////////////////////////////////////////
    public function doLogout(){
        $this->session->sess_destroy();
        redirect('Welcome');
    }
    /////////////////////////////////////////// New User Register///////////////////////////////////////////////
    public function doRegister()
    {
        $this->form_validation->set_rules('fName','First Name','required');

        if($this->form_validation->run() == false){
            $this->load->view('register');
        }else{
            $data['fname'] = $this->input->post('fName');
            $data['mname'] = $this->input->post('mName');
            $data['lname'] = $this->input->post('lName');
            $data['gender'] = $this->input->post('gender');
            $data['age'] = $this->input->post('age');
            $data['uemail'] = $this->input->post('userEmail');
            $data['uphone'] = $this->input->post('userPhone');
            $data['uname'] = $this->input->post('userName');
            $data['usertype'] = $this->input->post('usertype');
            $data['passwd'] = $this->input->post('passwd');
            $data['cPasswd'] = $this->input->post('cPasswd');
            if($data['passwd'] == $data['cPasswd']){
                $data['error_message'] = null;
                $data['correct'] = true;

                if($this->Doc_online_model->addNewUser($data)){
                    ?>
                    <script type="text/javascript">
                        alert("User Registered Successfully!!");
                    </script>
                    <?php

                    $this->index();
                }
            }else{
                ?>
                <script type="text/javascript">
                    alert("password is differnt");
                </script>
            <?php
            }

        }
    }
}
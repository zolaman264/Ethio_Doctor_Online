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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->Doc_online_model->checkNew();
        $data['comment'] = $this->Doc_online_model->sortComment();
        $data['posts'] = $this->Doc_online_model->sortPost(3);
        $data['index_posts'] = $this->Doc_online_model->sortPost($this->Doc_online_model->record_count("posts"));
        //print_r($data);
        if(isset($this->session->userdata['username'])){
            if($this->session->userdata('user_type') == "admin")
                $this->load->view('admin_home');
            else
                $this->load->view('home',$data);
        }else{
            $this->load->view('index',$data);
        }
	}
    public function about()
    {
        $this->Doc_online_model->checkNew();
        $data['comment'] = $this->Doc_online_model->sortComment();
        $data['posts'] = $this->Doc_online_model->sortPost(3);
        $this->load->view('about',$data);
    }
    public function portfolio() // This is the post page...
    {
        $this->Doc_online_model->checkNew();
        $data['comment'] = $this->Doc_online_model->sortComment();
        $data['popular_posts'] = $this->Doc_online_model->sortPopularPost();
        $data['posts'] = $this->Doc_online_model->sortPost(3); // needs pagination

        $this->load->helper("url");
        $this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url() . "welcome/portfolio ";
        $config["total_rows"] = $this->Doc_online_model->record_count("posts");
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['pa_posts'] = $this->Doc_online_model->sortQuestion($config["per_page"], $page,"posts","ptime","post_id");
        $data['comments'] = $this->Doc_online_model->com_ans("comments","com_time");
        //$data["links"] = $this->pagination->create_links();
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $this->load->view('posts',$data);
    }
    public function blog()
    {
        $this->Doc_online_model->checkNew();
        $data['comment'] = $this->Doc_online_model->sortComment();
        $data['posts'] = $this->Doc_online_model->sortPost(3);

        $this->load->helper("url");
        $this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url() . "welcome/blog";
        $config["total_rows"] = $this->Doc_online_model->record_count("blogs");
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['questions'] = $this->Doc_online_model->sortQuestion($config["per_page"], $page,"blogs","btime","q_id");
        $data['answers'] = $this->Doc_online_model->com_ans("answer","ans_time");
        $data['comments'] = $this->Doc_online_model->com_ans("comments","com_time");
        //$data["links"] = $this->pagination->create_links();
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $this->load->view('blog',$data);
    }
    public function questions()
    {
        $this->Doc_online_model->checkNew();
        $data['comment'] = $this->Doc_online_model->sortComment();
        $data['posts'] = $this->Doc_online_model->sortPost(3);

        $this->load->helper("url");
        $this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url() . "welcome/blog";
        $config["total_rows"] = $this->Doc_online_model->record_count("questions");
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['questions'] = $this->Doc_online_model->sortQuestion($config["per_page"], $page,"questions","qtime","q_id");
        $data['answers'] = $this->Doc_online_model->com_ans("answer","ans_time");
        $data['comments'] = $this->Doc_online_model->com_ans("comments","com_time");
        //$data["links"] = $this->pagination->create_links();
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $this->load->view('questions',$data);
    }
    public function contact()
    {
        $this->Doc_online_model->checkNew();
        $data['comment'] = $this->Doc_online_model->sortComment();
        $data['posts'] = $this->Doc_online_model->sortPost(3);
        $this->load->view('contact',$data);
    }
    public function register()
    {
        $this->Doc_online_model->checkNew();
        $this->load->view('register');
    }
    public function admin_post(){
        $this->Doc_online_model->checkNew();
        $this->load->view('admin_post');
    }
    public function adminUserManagment(){
        $this->Doc_online_model->checkNew();
        $this->load->view('adminUserManagment');
    }
    public function adminUseeAdd(){
        $this->Doc_online_model->checkNew();
        $this->load->view('admin_registerUser');
    }
    public function searchUser($task = null){
        $data['task'] = $task;
        $this->Doc_online_model->checkNew();
        $this->load->view('admin_search',$data);
    }
    public function spammedUser()
    {
        $this->Doc_online_model->checkNew();
        $data['comment'] = $this->Doc_online_model->sortComment();
        $data['posts'] = $this->Doc_online_model->sortPost(3);

        $this->load->helper("url");
        $this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url() . "welcome/blog";
        $config["total_rows"] = $this->Doc_online_model->new_record_count("del_user","status",'','','spm');
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['spammed_user'] = $this->Doc_online_model->sortQuestion($config["per_page"], $page,"del_user","status","spm");

        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $this->load->view('display_spammed',$data);
    }
    /////////////////////////////////////////// Login //////////////////////////////////////////////////////
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
    ///////////////////////////////////////  Take comment  //////////////////////////////////////////////
    public function takeComment(){
        $data['uname'] = $this->input->post('userName');
        $data['uemail'] = $this->input->post('userEmail');
        $data['uphone'] = $this->input->post('userPhone');
        $data['subject'] = $this->input->post('userMsg');

        $this->Doc_online_model->takeCommnet($data);

        ?>
        <script type="text/javascript">
            alert("comment submitted!");
        </script>
        <?php

        $this->index();

    }
    ///////////////////////////////////////  Take comment  //////////////////////////////////////////////
    public function takeCommentIn(){
        $data['uname'] = $this->session->userdata['username'];
        $data['owner'] = $this->input->post('owner');
        $data['blog'] = $this->input->post('blog');
        $data['table'] = $this->input->post('table');
        $data['QuestionComment'] = $this->input->post('QuestionComment');

        $this->Doc_online_model->takeCommnetIn($data);
        if($data['blog'] == 'blog'){
            $this->blog();
        }else if($data['blog'] == 'posts'){
            $this->portfolio();
        }

    }
    ////////////////////////////////////////  Do Post  //////////////////////////////////////////////////
    public function doPost(){
        $data['title'] = $this->input->post('title');
        $data['catagory'] = $this->input->post('catagory');
        $data['content'] = $this->input->post('content');

        $this->Doc_online_model->doPost($data);

        ?>
        <script type="text/javascript">
            alert("Successfully Posted!");
        </script>
        <?php

        $this->index();
    }
    ////////////////////////////////////////// display comment //////////////////////////////////////////
    public function uncheckedComments(){
        //$data['newComment'] = $this->Doc_online_model->displayNewComment();
        $data['allComents'] = $this->Doc_online_model->uncheckedComments();

        $this->load->view('admin_displayComment',$data);
    }
    ////////////////////////////////////////// display comment //////////////////////////////////////////
    public function displayNewQuestion(){
        //$data['newQuestion'] = $this->Doc_online_model->displayNewComment();
        $data['allQuestion'] = $this->Doc_online_model->uncheckedQuestion();

        $this->load->view('admin_displayQuestion',$data);
    }
    /////////////////////////////////////// Verify Item /////////////////////////////////////////////////
    public function verifyItems(){
        $detail['item'] = $this->input->post('item');
        if($detail['item'] == "comments"){
            $choice = $this->input->post('submitButton');
            $detail['uname'] = $this->input->post('uname');
            $detail['uemail'] = $this->input->post('uemail');
            $detail['uphone'] = $this->input->post('uphone');
            $detail['usubject'] = $this->input->post('usubject');
            $detail['currenttime'] = $this->input->post('currenttime');
        if($choice == "Accept"){
            $this->Doc_online_model->verifyItems($detail);
        }

        $data['allComents'] = $this->Doc_online_model->uncheckedComments();

        $this->load->view('admin_displayComment',$data);
        }else if($detail['item'] == "questions"){
            $choice = $this->input->post('submitButton');
            $detail['uq_id'] = $this->input->post('uq_id');
            $detail['uqcatagory'] = $this->input->post('uqcatagory');
            $detail['uqtitle'] = $this->input->post('uqtitle');
            $detail['uqcontent'] = $this->input->post('uqcontent');
            $detail['username'] = $this->input->post('username');
            $detail['uqtime'] = $this->input->post('uqtime');
            if($choice == "Accept"){
                $this->Doc_online_model->verifyItems($detail);
            }

            $data['allQuestion'] = $this->Doc_online_model->uncheckedQuestion();

            $this->load->view('admin_displayQuestion',$data);
        }

    }
    ///////////////////////////////////// Take Question /////////////////////////////////////////////////
    public function doQuestion(){
        $data['uname'] = $this->session->userdata('username');
        $data['qtitle'] = $this->input->post('title');
        $data['qcatagory'] = $this->input->post('catagory');
        $data['qcontent'] = $this->input->post('content');

        $this->Doc_online_model->takeQuestion($data,'questions');

        ?>
        <script type="text/javascript">
            alert("question submitted!");
        </script>
        <?php

        $this->questions();

    }
    ///////////////////////////////////// Take BLog /////////////////////////////////////////////////
    public function doBlog(){
        $data['uname'] = $this->session->userdata('username');
        $data['qtitle'] = $this->input->post('title');
        $data['qcatagory'] = $this->input->post('catagory');
        $data['qcontent'] = $this->input->post('content');

        $this->Doc_online_model->takeQuestion($data,'uncheckedquestions');

        ?>
        <script type="text/javascript">
            alert("discussion submitted!");
        </script>
        <?php

        $this->blog();

    }
    ///////////////////////////////////////// Search ////////////////////////////////////////////////////
    public function Auto_search(){
        if(isset($_POST['queryString'])){
            $queryString=$_POST['queryString'];
            $queryString=trim($queryString);
            if(strlen($queryString)>0){
                $criteria=array('fname'=>$queryString);
                //$criteria1=array('warrant'=>$queryString);
                $result=$this->Doc_online_model->search('user_detail',$criteria);
                if(is_array($result)){
                    foreach ($result as $key) {
                        echo '<p style="text-decoration:none" onClick="fill(\''.$key['fName'].' '.$key['mName'].' '.$key['lName'].'\');">
					<span style="color:black;">'.$key['fName'].' '.$key['mName'].' '.$key['lName'].'</span><p>';
                    }
                }else{
                    echo "Match does not found! ";
                }
            }else {
                echo " ";
            }
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    public function Main_search(){
        if(isset($_POST['search'])){
            $queryString=$_POST['search'];
            $queryString=trim($queryString);
            if(strlen($queryString)>0){
                $criteria=array('ptitle'=>$queryString);
                //$criteria1=array('warrant'=>$queryString);
                $result=$this->Doc_online_model->search('posts',$criteria);
                if(is_array($result)){
                    $data['$search_result'] = $result;
                }else{
                    $data['msg'] = "Match does not found! ";
                }
            }
        }

        $this->load->view("main_search_display",$data);
    }
    //////////////////////////////////////  doSearch  ///////////////////////////////////////////////////
    public function doSearch(){
        $keyterm = $this->input->post('searchinputbox');
        $task_type = $this->input->post('task_type');

        $this->load->helper("url");
        $this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url() . "welcome/doSearch ";
        $config["total_rows"] = $this->Doc_online_model->new_record_count("user_detail","fName","mName","lName",$keyterm);
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['search_result'] = $this->Doc_online_model->doSearch($config["per_page"], $page,"user_detail","fName","mName","lName",$keyterm);
        //$data["links"] = $this->pagination->create_links();
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $data['task_type'] = $task_type;
        //print_r($data);
        $this->load->view('displaySearch',$data);

    }
    //////////////////////////////////////  doSearch  ///////////////////////////////////////////////////
    public function doMainSearch(){

        echo "main";

        $keyterm = $this->input->post('search');
        $task_type = $this->input->post('task_type');

        $this->load->helper("url");
        $this->load->library("pagination");

        $config = array();
        $config["base_url"] = base_url() . "welcome/doMainSearch ";
        $config["total_rows"] = $this->Doc_online_model->new_record_count("posts","ptitle","mName","lName",$keyterm);
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['search_result'] = $this->Doc_online_model->doMainSearch($config["per_page"], $page,"posts","ptitle","pcontent",$keyterm);
        //$data["links"] = $this->pagination->create_links();
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
        $data['task_type'] = $task_type;
        //print_r($data);
        $this->load->view('main_search_display',$data);

    }
    /////////////////////////////////   Delete User  ///////////////////////////////////////
    public function del_user(){
        $data['usrId'] = $this->input->post('usrId');
        $data['task_type'] = $this->input->post('task_type');

        $this->Doc_online_model->del_user($data);

        $this->Doc_online_model->checkNew();
        $this->load->view('adminUserManagment');
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////

}

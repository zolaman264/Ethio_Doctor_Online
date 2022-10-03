<?php
/**
 * Created by PhpStorm.
 * User: AiR-ma
 * Date: 5/8/15
 * Time: 12:05 PM
 */

class Doc_online_model extends CI_Model{

    public function login($uname,$passwd)
    {
        $this->db->select('*');
        $this->db->from('userlist');
        $this->db->where('username',$uname);
        $this->db->where('password',$passwd);
        $this->db->where('status','active');

        $query = $this->db->get();

        if($query->num_rows() == 1){

            $row = $query->row();
            $data = array(
                'username' => $row->username,
                'validated' => true,
                'user_type' => $row->user_type
            );
            $this->session->set_userdata($data);
            return true;
        }else{
            return false;
        }
    }
    ///////////////////////////// Add new user /////////////////////////////////////////////////
    public function addNewUser($user)
    {
        if(trim($user['fname']) != null){

            $fname = $user['fname'];
            $mname = $user['mname'];
            $lname = $user['lname'];
            $gender = $user['gender'];
            $age = $user['age'];
            $uname = $user['uname'];
            $uemail = $user['uemail'];
            $uphone = $user['uphone'];
            $passwd = md5($user['passwd']);
            $user_type = $user['usertype'];

            $this->db->select('*');
            $this->db->from('user_detail');
            $this->db->where('uname',$uname);

            $query = $this->db->get()->result();

            if(is_array($query) && count($query) == 0){
                $this->db->query("INSERT INTO user_detail (	fName, mName, lName, gender, age, uname, email, mobile, user_type) VALUES ('$fname','$mname','$lname','$gender','$age','$uname','$uemail','$uphone','$user_type');");
                $this->db->select('user_id');
                $this->db->from('user_detail');
                $this->db->where('uname',$uname);

                foreach($this->db->get()->result() as $vals){
                $id = $vals->user_id;
                }

                $this->db->query("INSERT INTO userlist (user_id,username, password, user_type) VALUES ('$id','$uname','$passwd','$user_type');");
                return true;
            }else{
                ?>
                <script type="text/javascript">
                    alert("Employee id is already taken. Please insert another id.");
                </script>
                <?php

                $this->load->view('register');
            }
        }
    }
    ///////////////////////////////////  Take Commnet  ////////////////////////////////////////
    public function takeCommnet($data){
        $uname = $data['uname'];
        $uemail = $data['uemail'];
        $uphone = $data['uphone'];
        $subject = $data['subject'];
        $current_time = date("Y-m-d H:i:s");

        $this->db->query("INSERT INTO contact_us (	uname, uemail, uphone, usubject, currenttime) VALUES ('$uname','$uemail','$uphone','$subject','$current_time');");

        //$this->sortComment();

    }
    ///////////////////////////////////  Take Commnet  ////////////////////////////////////////
    public function takeCommnetIn($data){
        $uname = $data['uname'];
        $owner = $data['owner'];
        $table = $data['table'];
        $content = $data['QuestionComment'];
        $current_time = date("Y-m-d H:i:s");

        if($table == 'comments'){
        $this->db->query("INSERT INTO comments (com_content, username, com_owner, com_time) VALUES ('$content','$uname','$owner','$current_time');");
        }else if($table == 'answer'){
        $this->db->query("INSERT INTO answer (ans_content, username, owner, ans_time) VALUES ('$content','$uname','$owner','$current_time');");
        }else;
        //$this->sortComment();

    }
    ////////////////////////////////////  Display Comment By Time  ////////////////////////////
    public function sortComment(){
        $query = $this->db->query("SELECT * FROM comments ORDER BY com_time DESC LIMIT 3");

        $result = $query->result();
        $counter = 0;
        if($query->num_rows() == 0){
            return $result;
        }

        while($counter < $query->num_rows()){
            $data[] = $result[$counter];
            $counter++;
        }
        return $data;
    }
    ////////////////////////////////////  Display Post By Time  ////////////////////////////
    public function sortPost($limits){
        if($limits <= 12){
        $query = $this->db->query("SELECT * FROM posts ORDER BY ptime DESC LIMIT ". $limits);

        $result = $query->result();
        $counter = 0;
        if($query->num_rows() == 0){
            return $result;
        }

        while($counter < $query->num_rows()){
            $data[] = $result[$counter];
            $counter++;
        }
        return $data;
        }else{
            $this->sortPost(12);
        }
    }
    //////////////////////////////////////  Display Posts By Like   ////////////////////////////
    public function sortPopularPost(){
        $query = $this->db->query("SELECT * FROM posts ORDER BY plike DESC LIMIT 3");

        $result = $query->result();
        $counter = 0;
        if($query->num_rows() == 0){
            return $result;
        }

        while($counter < $query->num_rows()){
            $data[] = $result[$counter];
            $counter++;
        }
        return $data;
    }
    //////////////////////////////////////  DoPost  ///////////////////////////////////////////
    public function doPost($data){
        $ptitle = $data['title'];
        $catagory = $data['catagory'];
        $content = $data['content'];
        $plike = 5;
        $ptime = date("Y-m-d H:i:s");

        $img_query = $this->db->query("SELECT post_id FROM posts"); //post_id
        $img_result = $img_query->result();
        if($img_query->num_rows() == 0){
            $temp_img = "";
        }else{
        $img_counter = 0;

        while($img_counter < $img_query->num_rows()){

            $temp_img = $img_result[$img_counter]->post_id;
            $img_counter++;
        }
        }
        $img_name = "image".$temp_img;
        $detail = $this->uploadFiles($img_name);
        $img_src = "images/postimages/".$img_name.".".$detail['extension'];

        $this->db->query("INSERT INTO posts (ptitle, pcontent, pcatagory, ptime, pimage, plike) VALUES ('$ptitle','$content','$catagory','$ptime','$img_src','$plike');");

        return true;

    }
    //////////////////////////////////////  Upload query  /////////////////////////////////////
    public function uploadFiles($title){

        $this->load->helper('form');

        $config['file_name'] = $title;
        $config['upload_path'] = 'images/postimages/';
        $config['allowed_types'] = 'gif|jpg|png|doc|pdf';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->set_allowed_types('*');
        $data['upload_data'] = '';

        if (!$this->upload->do_upload('userfile')){

            $data = array('msg' => $this->upload->display_errors());
        }else{
            $extension = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);

            //else, set the success message
            $data = array('msg' => "Upload success!");
            $data['upload_data'] = $this->upload->data();
            $data['extension'] = $extension;
        }
        return $data;

    }
    ////////////////////////////////////// Check New Comment and Question////////////////////////////////
    public function checkNew(){

            $this->db->select('*');
            $this->db->from('contact_us');
            $this->db->where('status',"unchecked");

            $query = $this->db->get();

            $numNewComment = $query->num_rows();

            $this->session->userdata['numNewComment'] = $numNewComment;

            $this->db->select('*');
            $this->db->from('uncheckedquestions');
            $this->db->where('uqstatus',"unchecked");

            $query = $this->db->get();

            $numNewQuestion = $query->num_rows();

            $this->session->userdata['numNewQuestion'] = $numNewQuestion;


        //return $data;
    }
    /////////////////////////////// Display Unchecked Comments ////////////////////////////////
    public function uncheckedComments(){

        $query = $this->db->query("SELECT * FROM contact_us WHERE status='unchecked'");

        $result = $query->result();
        $counter = 0;
        if($query->num_rows() == 0){
            return $result;
        }

        while($counter < $query->num_rows()){
            $data[] = $result[$counter];
            $counter++;
        }
        return $data;
    }
    /////////////////////////////// Display Unchecked Comments ////////////////////////////////
    public function uncheckedQuestion(){
        $query = $this->db->query("SELECT * FROM uncheckedquestions WHERE uqstatus='unchecked'");

        $result = $query->result();
        $counter = 0;
        if($query->num_rows() == 0){
            return $result;
        }

        while($counter < $query->num_rows()){
            $data[] = $result[$counter];
            $counter++;
        }
        return $data;
    }
    //////////////////////////////// Display Question /////////////////////////////////////////
    public function sortQuestion($limit,$start,$table_name,$field_name,$match_id){
        $this->db->limit($limit, $start);
        $this->db->from($table_name);
        $this->db->order_by($field_name,"DESC");
        $query = $this->db->get();

        $result = $query->result();
        $counter = 0;
        if($query->num_rows() == 0){
            return $result;
        }

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                $counter++;
            }
            return $data;
        }
        return false;
    }
    //////////////////////////////// Display Question /////////////////////////////////////////
    public function com_ans($table_name,$cur_time){
        $this->db->from($table_name);
        $this->db->order_by($cur_time,"DESC");
        $query = $this->db->get();

        $result = $query->result();
        $counter = 0;
        if($query->num_rows() == 0){
            return $result;
        }

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                $counter++;
            }
            return $data;
        }
        return false;
    }
    ////////////////////////////////// Verify Items /////////////////////////////////////////
    public function verifyItems($data){

        $item = $data['item'];
        $status = "checked";
        if($item == "comments"){
            $title = "default title";
            $uname =  $data['uname'];
            $uemail = $data['uemail'];
            $uphone = $data['uphone'];
            $usubject = $data['usubject'];
            $currenttime = $data['currenttime'];

            $this->db->query("INSERT INTO comments ( com_title, com_content, username, uphone, uemail, com_time) VALUES ('$title','$usubject','$uname','$uphone','$uemail','$currenttime');");
            $this->db->query("UPDATE contact_us SET status='$status' WHERE currenttime='$currenttime';");

        }else if($item == "questions"){
            $uqtitle = $data['uqtitle'];
            //$uq_id =  $data['uq_id'];
            $uqcatagory = $data['uqcatagory'];
            $blike = 0;
            $uqcontent = $data['uqcontent'];
            $username = $data['username'];
            $uqtime = $data['uqtime'];

            $this->db->query("INSERT INTO blogs ( bcatagory, btitle, bcontent, username, btime, blike ) VALUES ('$uqcatagory','$uqtitle','$uqcontent','$username','$uqtime','$blike');");
            $this->db->query("UPDATE uncheckedquestions SET uqstatus='$status' WHERE uqtime='$uqtime';");

        }

        $this->checkNew();
    }
    //////////////////////////////// takeQuestion($data) //////////////////////////////////////
    public function takeQuestion($detail,$table){
        $qcatagory = $detail['qcatagory'];
        $qtitle = $detail['qtitle'];
        $qcontent = $detail['qcontent'];
        $username = $detail['uname'];
        $qtime = date("Y-m-d H:i:s");
        $qlike = 0;
        $uqstatus = "unchecked";

        if($table == 'questions'){
        $this->db->query("INSERT INTO questions ( qcatagory, qtitle, qcontent, username, qtime, qlikes ) VALUES ('$qcatagory','$qtitle','$qcontent','$username','$qtime','$qlike');");
        }else if($table == 'uncheckedquestions'){
        $this->db->query("INSERT INTO uncheckedquestions ( uqcatagory, uqtitle, uqcontent, username, uqtime, uqstatus ) VALUES ('$qcatagory','$qtitle','$qcontent','$username','$qtime','$uqstatus');");
        }else;
    }
    ///////////////////////////////////// Number of Questions /////////////////////////////////
    public function record_count($tablename) {
        return $this->db->count_all($tablename);
    }
    //////////////////////////////////// Auto Search //////////////////////////////////////////
    function search($table,$criteria){
        $this->db->select("*");

        if (isset($criteria)) {
            foreach ($criteria as $key => $value) {
                $this->db->like($key,$value);
            }
        }
        $this->db->from($table);
        $query=$this->db->get();
        if($query->num_rows()>=1){
            return $query->result_array();
        }
        else{
            return false;
        }

    }
    ///////////////////////////////////  do Search  ///////////////////////////////////////////
    public function doSearch($limit,$start,$table_name,$field_name,$field_name1,$field_name2,$match_id){
        $key_values = explode(" ",$match_id);

        $this->db->limit($limit, $start);
        $this->db->from($table_name);
        $this->db->where($field_name,$key_values[0]);
        $this->db->where($field_name1,$key_values[1]);
        $this->db->where($field_name2,$key_values[2]);
        $this->db->order_by($field_name,"DESC");
        $query = $this->db->get();

        $result = $query->result();

        $counter = 0;
        if($query->num_rows() == 0){
            return $result;
        }
        if ($counter < $query->num_rows()) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                $counter++;
            }
            //print_r($data);
            return $data;
        }
        return false;
    }
    ///////////////////////////////////  do Search  ///////////////////////////////////////////
    public function doMainSearch($limit,$start,$table_name,$field_name,$field_name1,$match_id){
        $key_values = explode(" ",$match_id);
        for($i = 0; $i < count($key_values); $i++){
            echo "main ".$i.' '.$key_values[$i];
        }

        $this->db->limit($limit, $start);
        $this->db->from($table_name);
        //for($i = 0; $i < count($key_values); $i++){
        $this->db->like($field_name,'%'.$key_values[$i].'%');
        $this->db->like($field_name1,'%'.$key_values[$i].'%');
        //}
        $this->db->order_by($field_name,"DESC");
        $query = $this->db->get();

        $result = $query->result();

        $counter = 0;
        if($query->num_rows() == 0){
            return $result;
        }
        if ($counter < $query->num_rows()) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                $counter++;
            }
            //print_r($data);
            return $data;
        }
        return false;
    }
    /////////////////////////////////////  new counter  ///////////////////////////////////////
    public function new_record_count($tablename,$field_name,$field_name1,$field_name2,$match_id) {
        if($tablename == 'del_user'){
            $key_values = $match_id;
            $this->db->from($tablename);
            $this->db->where($field_name,$key_values);
            $query = $this->db->get();

            return $query->num_rows();
        } else if($tablename == 'posts'){
            $key_values = $match_id;
            $this->db->from($tablename);
            $this->db->like($field_name,$key_values);
            $query = $this->db->get();

            return $query->num_rows();
        }
        $key_values = explode(" ",$match_id);
        $this->db->from($tablename);
        $this->db->where($field_name,$key_values[0]);
        $this->db->where($field_name1,$key_values[1]);
        $this->db->where($field_name2,$key_values[2]);
        $query = $this->db->get();

        return $query->num_rows();
    }
    /////////////////////////////////   Delete User  ///////////////////////////////////////
    public function del_user($user){
        $usrId = $user['usrId'];
        $del_date = date("Y-m-d H:i:s");
        $task_type = $user['task_type'];
        if($task_type == 'dlt'){
            $status = 'archived';
        }else if($task_type == 'spm'){
            $status = 'spammed';
        }else{
            $status = "active";
        }
        $this->db->from('user_detail');
        $this->db->where('user_id',$usrId);
        $query = $this->db->get();

        if ($query->num_rows() >0 ) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        }
        foreach ($data as $rowval) {
            $this->db->query("INSERT INTO del_user ( user_id, fName, mName, lName, gender, age, username, email, mobile, user_type, status, del_date )
                VALUES ('$rowval->user_id','$rowval->fName','$rowval->mName','$rowval->lName','$rowval->gender','$rowval->age','$rowval->uname','$rowval->email','$rowval->mobile','$rowval->user_type','$status','$del_date');");

        }

        $this->db->query("UPDATE user_detail SET status='$status' WHERE user_id='$usrId';");
        $this->db->query("UPDATE userlist SET status='$status' WHERE user_id='$usrId';");
        return true;
    }
    ///////////////////////////////////////////////////////////////////////////////////////////

}
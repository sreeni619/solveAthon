<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Globals {

    public function designations() {
        $designations = array('1' => 'Professor', 
                              '2' => 'Associate Professor', 
                              '3' => 'Assistant Professor');
        return $designations;   
    }
    
    public function departmentsList() {
        $departments = array('1' => 'Civil Engineering', 
                            '2' => 'Mechanical Engineering', 
                            '3' => 'Electrical and Electronics Engineering', 
                            '4' => 'Electronics and Communication Engineering', 
                            '5' => 'Industrial Engineering and Management', 
                            '6' => 'Electronics and Instrumentation Engineering', 
                            '7' => 'Computer Science and Engineering',
                            '8' => 'Electronics and Telecommunication Engineering',
                            '9' => 'Information Science and Engineering',
                            '10' => 'Medical Electronics and Engineering',
                            '11' => 'Aeronautical Engineering',
                            '12' => 'Computer Applications (MCA)',
                            '13' => 'Business Administration (MBA)',
                            '14' => 'Mathematics',
                            '15' => 'Physics',
                            '16' => 'Chemistry',
                            '17' => 'Humanities and Social Science',
                        );
        return $departments;   
    }

    public function departmentShortName() {
        $departments = array('1' => 'CV', 
                            '2' => 'ME', 
                            '3' => 'EEE', 
                            '4' => 'ECE', 
                            '5' => 'IEM', 
                            '6' => 'EIE', 
                            '7' => 'CS',
                            '8' => 'ETE',
                            '9' => 'IS',
                            '10' => 'ML',
                            '11' => 'AE',
                            '12' => 'MCA',
                            '13' => 'MBA',
                            '14' => 'MAT',
                            '15' => 'PHY',
                            '16' => 'CHE',
                            '17' => 'HSS',
                        );
        return $departments;   
    }

    public function publicationTypes() {
        $details = array('1' => 'National Journal', 
                              '2' => 'International Journal', 
                              '3' => 'National Conference', 
                              '4' => 'International Conference');
        return $details;   
    }

    public function activityTypes() {
        return array('1' => 'Technical Events', 
                    '2' => 'Industry Interaction', 
                    '3' => 'Cocurricular Activities', 
                    '4' => 'Extra Curricular Activities');
    }
     
    public function academicYears($start) {
        $result = array(); $end = date('Y');
        for($start; $start <= $end; $start++){
            $startInc = $start + 1;
            $ay = $start.'-'.$startInc;
            $result[$ay] = $ay;
        }
        $result = array_reverse($result);
        return $result;   
    }
    
    public function newsDisplay(){
        return array(
            "1" => "Notification",
            "2" => "Exam Timetable",
            "3" => "Exam Circular",
            "4" => "Calendar of Events",
            "5" => "Tender"
        );
    }
    
    
    public function programs(){
        return array(
            "Applied Arts and Crafts" => "Applied Arts and Crafts",
            "Architecture and Town Planning" => "Architecture and Town Planning",
			"Architecture" => "Architecture",
			"Town Planning" => "Town Planning",
            "Engineering and Technology" => "Engineering and Technology",
            "Hotel Management and Catering" => "Hotel Management and Catering",
            "Management" => "Management",
			"MCA" => "MCA",
			"Pharmacy" => "Pharmacy"
        );
    }
    
    public function levels(){
        return array(
            "UG" => "UG",
			"PG" => "PG",
			"DIPLOMA" => "DIPLOMA"
        );
    }
}
?>
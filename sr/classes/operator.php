<?php
class Operator{

    private $conn;

    function __construct($conn)
    {

        $this->conn = $conn;
    }

    function users(){
        $results = [];
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($user_id,$fname,$mname,$lname,$entry_date,$entry_year,$dob,$age,$sex,$role,$pswd);
            while($stmt->fetch()){
                array_push($results, array("user_id"=>$user_id,"fname"=>$fname,"mname"=>$mname,"lname"=>$lname,"entry_date"=>$entry_date,"entry_year"=>$entry_year,"dob"=>$dob,"age"=>$age,"sex"=>$sex,"role"=>$role,"pswd"=>$pswd));
            }
        }
        return $results;

    }

    function user_records(){
        $user_id=$_SESSION['username'];
        $results = [];
        $sql = "SELECT * FROM users WHERE user_id='$user_id'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($user_id,$fname,$mname,$lname,$entry_date,$entry_year,$dob,$age,$sex,$role,$pswd);
            while($stmt->fetch()){
                array_push($results, array("user_id"=>$user_id,"fname"=>$fname,"mname"=>$mname,"lname"=>$lname,"entry_date"=>$entry_date,"entry_year"=>$entry_year,"dob"=>$dob,"age"=>$age,"sex"=>$sex,"role"=>$role,"pswd"=>$pswd));
            }
        }
        return $results;

    }


    function all_staff(){
        $results = [];
        $sql = "SELECT * FROM staff";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($staff_id,$fname,$mname,$lname,$role,$pswd);
            while($stmt->fetch()){
                array_push($results, array("staff_id"=>$staff-id,"fname"=>$fname,"mname"=>$mname,"lname"=>$lname,"role"=>$role,"pswd"=>$pswd));
            }
        }
        return $results;

    }

    function year_of_study(){
        $results = [];
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($student_id,$fname,$mname,$lname,$entry_date,$entry_year,$dob,$age,$sex,$pswd);
            while($stmt->fetch()){
                array_push($results, array("student_id"=>$student_id,"fname"=>$fname,"mname"=>$mname,"lname"=>$lname,"entry_date"=>$entry_date,"entry_year"=>$entry_year,"dob"=>$dob,"age"=>$age,"sex"=>$sex,"pswd"=>$pswd));
            }
        }
        return $results;

    }

    function results($term){
        $user_id=$_SESSION['username'];
        $results = [];
        $sql = "SELECT * FROM results WHERE result_id='$user_id' AND term='$term'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($result_id,
                                $term,
                                $result_date,
                                $civics,
                                $history,
                                $geography,
                                $kiswahili,
                                $english,
                                $physics,
                                $chemistry,
                                $biology,
                                $maths,
                                $bible,
                                $ics,
                                $agriculture,
                                $literature,
                                $civics_g,
                                $history_g,
                                $geography_g,
                                $kiswahili_g,
                                $english_g,
                                $physics_g,
                                $chemistry_g,
                                $biology_g,
                                $maths_g,
                                $bible_g,
                                $ics_g,
                                $agriculture_g,
                                $literature_g,
                                $civics_p,
                                $history_p,
                                $geography_p,
                                $kiswahili_p,
                                $english_p,
                                $physics_p,
                                $chemistry_p,
                                $biology_p,
                                $maths_p,
                                $bible_p, 
                                $ics_p,
                                $agriculture_p,
                                $literature_p, 
                                $civics_r,
                                $history_r,
                                $geography_r,
                                $kiswahili_r,
                                $english_r,
                                $physics_r,
                                $chemistry_r,
                                $biology_r,
                                $maths_r,
                                $bible_r,
                                $ics_r,
                                $agriculture_r,
                                $literature_r,
                                $overall_t,
                                $overall_a,
                                $overall_g,
                                $overall_p,
                                $points,
                                $division,
                                $title
                                );
            while($stmt->fetch()){
                array_push($results, array("result_id"=>$result_id,
                "term"=>$term,
                "result_date"=>$result_date,
                "civics"=>$civics,
                "history"=>$history,
                "geography"=>$geography,
                "kiswahili"=>$kiswahili,
                "english"=>$english,
                "physics"=>$physics,
                "chemistry"=>$chemistry,
                "biology"=>$biology,
                "maths"=>$maths,
                "bible"=>$bible,
                "ics"=>$ics,
                "agriculture"=>$agriculture,
                "literature"=>$literature,
                "civics_g"=>$civics_g,
                "history_g"=>$history_g,
                "geography_g"=>$geography_g,
                "kiswahili_g"=>$kiswahili_g,
                "english_g"=>$english_g,
                "physics_g"=>$physics_g,
                "chemistry_g"=>$chemistry_g,
                "biology_g"=>$biology_g,
                "maths_g"=>$maths_g,
                "bible_g"=>$bible_g,
                "ics_g"=>$ics_g,
                "agriculture_g"=>$agriculture_g,
                "literature_g"=>$literature_g,
                "civics_p"=>$civics_p,
                "history_p"=>$history_p,
                "geography_p"=>$geography_p,
                "kiswahili_p"=>$kiswahili_p,
                "english_p"=>$english_p,
                "physics_p"=>$physics_p,
                "chemistry_p"=>$chemistry_p,
                "biology_p"=>$biology_p,
                "maths_p"=>$maths_p,
                "bible_p"=>$bible_p,
                "ics_p"=>$ics_p,
                "agriculture_p"=>$agriculture_p,
                "literature_p"=>$literature_p,
                "civics_r"=>$civics_r,
                "history_r"=>$history_r,
                "geography_r"=>$geography_r,
                "kiswahili_r"=>$kiswahili_r,
                "english_r"=>$english_r,
                "physics_r"=>$physics_r,
                "chemistry_r"=>$chemistry_r,
                "biology_r"=>$biology_r,
                "maths_r"=>$maths_r,
                "bible_r"=>$bible_r,
                "ics_r"=>$ics_r,
                "agriculture_r"=>$agriculture_r,
                "literature_r"=>$literature_r,
                "overall_t"=>$overall_t,
                "overall_a"=>$overall_a,
                "overall_g"=>$overall_g,
                "overall_p"=>$overall_p,
                "points"=>$points,
                "division"=>$division,
                "title"=>$title
                ));
            }
        }
        return $results;

    }

    function exam_titles($academic_year){
        $user_id=$_SESSION['username'];
        $results = [];
        $sql = "SELECT term,title FROM results WHERE result_date LIKE '$academic_year%' AND result_id='$user_id' ORDER BY result_date ASC";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->store_result();
            $count=$stmt->num_rows;
            if($count>0){
            $stmt->bind_result($term,$title);
            while($stmt->fetch()){
                array_push($results, array("term"=>$term,"title"=>$title));
            }}else{
                $stmt->bind_result($term,$title);
                array_push($results, array("term"=>"null","title"=>"No record found"));
            }
        }
        return $results;

    }

    function change_password($new_password){
        $user_id=$_SESSION['username'];
        $sqlUpdate="UPDATE users SET pswd=? WHERE user_id=?";
        $stmtUpdate=$this->conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("ss",$new_password,$user_id);
        if($stmtUpdate->execute()){
            return true;
        }else{
            return false;
        }
    }

    

    function register($drug_name,$generic_name,$store_quantity,$unit,$ksh,$tsh,$exipire_date)
    {
        $sql = "INSERT INTO drugs(drug_name,generic_name,store_quantity,unit,ksh,tsh,expire_date) VALUES(?,?,?,?,?,?,?)";
        $sql_to_count= "INSERT INTO drug_count(drug_name,drug_count) VALUES(?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt_to_count=$this->conn->prepare($sql_to_count);

        $stmt->bind_param("ssiiiis",$drug_name,$generic_name,$store_quantity,$unit,$ksh,$tsh,$exipire_date);
        $stmt_to_count->bind_param("si",$drug_name,$store_quantity);

        if(($stmt->execute()) && ($stmt_to_count->execute()))
        {
            return true;
        }else{
            return false;
        }

    }
    

    function delete_student($id){
        $sqlDelete="DELETE FROM drug_sold WHERE id=?";
        $stmtDelete=$this->conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i",$id);
        if($stmtDelete->execute()){
            return true;
        }else{
            return false;
        }
    }

    function Update_student($q,$drug_name){
        $sqlUpdate="UPDATE drugs SET store_quantity=store_quantity + '$q' WHERE drug_name=?";
        $stmtUpdate=$this->conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("s",$drug_name);

        if($stmtUpdate->execute()){
            return true;
        }else{
            return false;
        }
    }


}
?>
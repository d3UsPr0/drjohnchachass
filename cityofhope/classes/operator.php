<?php
class Operator{

    private $conn;

    function __construct($conn)
    {

        $this->conn = $conn;
    }

    function insertData($fname,$lname,$email,$upassword,$account)
    {
        // $enc_password=md5($upassword);
        $sql = "INSERT INTO users(fname,lname,email,upassword,account) VALUES(?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sssss",$fname,$lname,$email,$upassword,$account);

        if($stmt->execute())
        {
            return true;
        }else{
            return false;
        }

    }

    function insertDrug($drug_name,$store_quantity,$unit,$tsh,$exipire_date)
    {
        $sql = "INSERT INTO drugs(drug_name,store_quantity,unit,tsh,expire_date) VALUES(?,?,?,?,?)";
        $sql_to_count= "INSERT INTO drug_count(drug_name,drug_count) VALUES(?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt_to_count=$this->conn->prepare($sql_to_count);

        $stmt->bind_param("siiis",$drug_name,$store_quantity,$unit,$tsh,$exipire_date);
        $stmt_to_count->bind_param("si",$drug_name,$store_quantity);

        if(($stmt->execute()) && ($stmt_to_count->execute()))
        {
            return true;
        }else{
            return false;
        }

    }
    
    function saveInventory($inventory_name,$quantity,$q_description)
    {
        $sql = "INSERT INTO inventory(inventory_name,quantity,q_description) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sis",$inventory_name,$quantity,$q_description);

        if($stmt->execute())
        {
            return true;
        }else{
            return false;
        }

    }
    function viewpharmacist(){
        $results = [];
        $sql = "SELECT id,fname,lname,email FROM users WHERE account='Standard' ORDER BY fname ASC";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($id,$fname,$lname,$email);
            while($stmt->fetch()){

                array_push($results, array("id"=>$id,"fname"=>$fname,"lname"=>$lname,"email"=>$email));
            }
        }
        return $results;

    }
    function allUsers(){
        $results = [];
        $sql = "SELECT email,lname,upassword,account FROM users";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($email,$lname,$upassword,$account);
            while($stmt->fetch()){

                array_push($results, array("email"=>$email,"lname"=>$lname,"upassword"=>$upassword,"account"=>$account));
            }
        }
        return $results;

    }

    function allDrugs(){
        $results = [];
        $sql = "SELECT drug_name,tsh FROM drugs ORDER BY drug_name ASC";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($drug_name,$tsh);
            while($stmt->fetch()){

                array_push($results, array("name"=>$drug_name,"tsh"=>$tsh));
            }
        }
        return $results;

    }

    function drug_cost($drug_name,$quantity){
        $results = [];
        $new_drug_name=str_replace("'","''","$drug_name");
        $sql = "SELECT unit,tsh FROM drugs WHERE drug_name='$new_drug_name'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($unit,$tsh);
            while($stmt->fetch()){
                array_push($results, array("total_cost"=>$tsh*$quantity,"price"=>$tsh));
            }
        }
        return $results;

    }

    function drug_decrease($q,$drug_name){
        $results = [];
        $new_drug_name=str_replace("'","''","$drug_name");
        $sql ="UPDATE drugs SET store_quantity=store_quantity-'$q' WHERE drug_name='$new_drug_name'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            return true;
        }
    }

    function display_sells(){
        $user=$_SESSION['username_standard'];
        $results = [];
        $sql = "SELECT id,loc,date_supplied,drug_name,quantity,FORMAT(price_per_unit,2),FORMAT(total_price,2) FROM drug_sold WHERE pharmacist='$user' ORDER BY id DESC LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($id,$loc,$drug_name,$date_supplied,$quantity,$price_per_unit,$total_price);
            while($stmt->fetch()){
                array_push($results, array("id"=>$id,"loc"=>$loc,"drug_name"=>$drug_name,"date_supplied"=>$date_supplied,"quantity"=>$quantity,"price_per_unit"=>$price_per_unit,"total_price"=>$total_price));
            }
        }
        return $results;

    }
    function display_sells_for_each_pharmacist(){
    
        $results = [];
        $sql = "SELECT pharmacist,SUM(quantity),SUM(total_price) FROM drug_sold GROUP BY pharmacist";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($pharmacist,$quantity,$total_price);
            while($stmt->fetch()){
                array_push($results, array("pharmacist"=>$pharmacist,"quantity"=>$quantity,"total"=>$total_price));
            }
        }
        return $results;

    }

        function display_sells_for_each_village(){
    
        $results = [];
        $sql = "SELECT loc,SUM(quantity),SUM(total_price) AS total_price FROM drug_sold GROUP BY loc ORDER BY total_price DESC ";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($loc,$quantity,$total_price);
            while($stmt->fetch()){
                array_push($results, array("loc"=>$loc,"quantity"=>$quantity,"total"=>$total_price));
            }
        }
        return $results;

    }

    function display_sells_for_each_pharmacist_range($d1,$d2){
        $results = [];
        $sql = "SELECT pharmacist,SUM(quantity),SUM(total_price) AS total_price FROM drug_sold WHERE date_supplied BETWEEN '$d1' AND '$d2' GROUP BY pharmacist ORDER BY total_price DESC  ";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($pharmacist,$quantity,$total_price);
            while($stmt->fetch()){
                array_push($results, array("pharmacist"=>$pharmacist,"quantity"=>$quantity,"total"=>$total_price));
            }
        }
        return $results;

    }

       function display_sells_for_each_location_range($d1,$d2){
        $results = [];
        $sql = "SELECT loc,SUM(quantity),SUM(total_price) AS total_price FROM drug_sold WHERE date_supplied BETWEEN '$d1' AND '$d2' GROUP BY loc ORDER BY total_price DESC ";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($loc,$quantity,$total_price);
            while($stmt->fetch()){
                array_push($results, array("loc"=>$loc,"quantity"=>$quantity,"total"=>$total_price));
            }
        }
        return $results;

    }

    
    function total_sells(){
        $user=$_SESSION['username_standard'];
        $results = [];
        $sql = "SELECT FORMAT(SUM(total_price),2) FROM drug_sold WHERE pharmacist='$user'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($total);
            while($stmt->fetch()){
                array_push($results, array("total"=>$total));
            }
        }
        return $results;

    }

        function total_sells_for_pharmacist_range($date1,$date2){
        $results = [];
        $sql = "SELECT FORMAT(SUM(total_price),2) FROM drug_sold WHERE date_supplied BETWEEN '$date1' AND '$date2'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($total);
            while($stmt->fetch()){
                array_push($results, array("total"=>$total));
            }
        }
        return $results;

    }
    function total_sells_for_location_range($date1,$date2){
        $results = [];
        $sql = "SELECT FORMAT(SUM(total_price),2) FROM drug_sold WHERE date_supplied BETWEEN '$date1' AND '$date2'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($total);
            while($stmt->fetch()){
                array_push($results, array("total"=>$total));
            }
        }
        return $results;

    }
    
    function total_sells_for_all(){
        $results = [];
        $sql = "SELECT SUM(total_price) FROM drug_sold";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($total);
            while($stmt->fetch()){
                array_push($results, array("total"=>$total));
            }
        }
        return $results;

    }

    function instock(){
        $results = [];
        $sql = "SELECT COUNT(drug_id) FROM drugs";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($instock_count);
            while($stmt->fetch()){
                array_push($results, array("instock"=>$instock_count));
            }
        }
        return $results;

    }

    function inventory(){
        $results = [];
        $sql = "SELECT COUNT(id) FROM inventory";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($inventory_count);
            while($stmt->fetch()){
                array_push($results, array("inventory"=>$inventory_count));
            }
        }
        return $results;

    }
    function out_of_stock(){
        $less_than=4;
        $results = [];
        $sql = "SELECT COUNT(drug_id) FROM drugs WHERE store_quantity<=$less_than";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($out_of_stock_count);
            while($stmt->fetch()){
                array_push($results, array("out_of_stock"=>$out_of_stock_count));
            }
        }
        return $results;

    }

    function all_pharmacists(){
        $results = [];
        $sql = "SELECT COUNT(id) FROM users WHERE account='Standard'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($users);
            while($stmt->fetch()){
                array_push($results, array("users"=>$users));
            }
        }
        return $results;

    }
    
    function saveSale($location,$pharmacist_name,$drug_name,$quantity,$price_per_unit,$total_price)
    {
$sql = "INSERT INTO drug_sold (loc,pharmacist,drug_name,quantity,price_per_unit,total_price) VALUES(?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sssiii",$location,$pharmacist_name,$drug_name,$quantity,$price_per_unit,$total_price);

        if($stmt->execute())
        {
            return true;
        }else{
            return false;
        }

    }

    function deleteRow($id){
        $sqlDelete="DELETE FROM drug_sold WHERE id=?";
        $stmtDelete=$this->conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i",$id);
        if($stmtDelete->execute()){
            return true;
        }else{
            return false;
        }
    }
    function UpdateRow($q,$drug_name){
        $sqlUpdate="UPDATE drugs SET store_quantity=store_quantity + '$q' WHERE drug_name=?";
     
        $stmtUpdate=$this->conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("s",$drug_name);

        if($stmtUpdate->execute()){
            return true;
        }else{
            return false;
        }
    }

    function drug_count($drug_name){
        $results = [];
        $sql = "SELECT store_quantity FROM drugs WHERE drug_name=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s",$drug_name);
        if($stmt->execute()){
            $stmt->bind_result($drug_count);
            while($stmt->fetch()){
                array_push($results, array("drug_count"=>$drug_count));
            }
        }
        return $results;

    }

    function viewInventories(){
        $results = [];
        $sql = "SELECT * FROM inventory";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($id,$name,$quantity,$description);
            while($stmt->fetch()){

                array_push($results, array("id"=>$id,"name"=>$name,"quantity"=>$quantity,"description"=>$description));
            }
        }
        return $results;

    }

    function viewSold(){
        $results = [];
        $sql = "SELECT * FROM drug_sold";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($id,$loc,$date,$pharmacist,$dname,$quantity,$cost,$total);
            while($stmt->fetch()){

                array_push($results, array("id"=>$id,"date"=>$date,"pharmacist"=>$pharmacist,"dname"=>$dname,"quantity"=>$quantity,"cost"=>$cost,"total"=>$total));
            }
        }
        return $results;

    }

    function viewSoldToday(){
        $pharmacist=$_SESSION['username_standard'];
        $today=date('Y-m-d');
        $results = [];
        $sql = "SELECT COUNT(id) FROM drug_sold WHERE date_supplied LIKE '$today%' AND pharmacist='$pharmacist'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($id);
            while($stmt->fetch()){
                array_push($results, array("id"=>$id,));
            }
        }
        return $results;

    }

    function viewExpired(){
        $today=date('Y-m-d');
        $results = [];
        $sql = "SELECT drug_id,drug_name,store_quantity,expire_date FROM drugs WHERE DATE(expire_date) <'$today'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($id,$dname,$store_quantity,$exipire_date);
            while($stmt->fetch()){

                array_push($results, array("id"=>$id,"dname"=>$dname,"store_quantity"=>$store_quantity,"expire_date"=>$exipire_date));
            }
        }
        return $results;

    }

    function viewExpiredcount(){
        $today=date('Y-m-d');
        $results = [];
        $sql = "SELECT COUNT(drug_id) AS n FROM drugs WHERE DATE(expire_date) <'$today'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($n);
            while($stmt->fetch()){

                array_push($results, array("count"=>$n));
            }
        }
        return $results;

    }


    function viewStock(){
        $results = [];
        $sql = "SELECT * FROM drugs ORDER BY drug_name ASC";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($id,$dname,$quantity,$unit,$tsh,$expire);
            while($stmt->fetch()){

                array_push($results, array("id"=>$id,"dname"=>$dname,"cost"=>$tsh,"store_q"=>$quantity,"unit"=>$unit,"tsh"=>$tsh,"expire"=>$expire));
            }
        }
        return $results;

    }

    function displayOutOfStock(){
        $minimum_count=4;
        $results = [];
        $sql = "SELECT * FROM drugs WHERE store_quantity<$minimum_count ORDER BY drug_name ASC";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($id,$dname,$quantity,$unit,$tsh,$expire);
            while($stmt->fetch()){

                array_push($results, array("id"=>$id,"dname"=>$dname,"store_q"=>$quantity,"cost"=>$tsh,"unit"=>$unit,"tsh"=>$tsh,"expire"=>$expire));
            }
        }
        return $results;

    }

     function select_drug_to_update($drug_name){
        $results = [];
        $sql = "SELECT tsh FROM drugs WHERE drug_name='$drug_name'";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($tsh);
            while($stmt->fetch()){

                array_push($results, array("tsh"=>$tsh));
            }
        }
        return $results;

    }

    function updateDrug($quantity,$sell_price,$drug_name)
    {
$new_drug_name=str_replace("'","''","$drug_name");
        $sql = "UPDATE drugs SET store_quantity=store_quantity + '$quantity',tsh= '$sell_price' WHERE drug_name='$new_drug_name'";
        $sql_to_count = "UPDATE drug_count SET drug_count=drug_count + '$quantity' WHERE drug_name='$new_drug_name'";
        $stmt = $this->conn->prepare($sql);
        $stmt_to_count = $this->conn->prepare($sql_to_count);
        if(($stmt->execute()) && ($stmt_to_count->execute()))
        {
            return true;
        }else{
            return false;
        }

    }

    function list_recounciliation(){
        $results = [];
        $sql = "SELECT drug_name,store_quantity FROM drugs ORDER BY drug_name ASC";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            $stmt->bind_result($dname,$quantity);
            while($stmt->fetch()){

                array_push($results, array("dname"=>$dname,"store_q"=>$quantity));
            }
        }
        return $results;

    }

}
?>
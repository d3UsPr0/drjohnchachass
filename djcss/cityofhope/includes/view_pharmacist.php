<?php include "../includes/session_check.php" ;?>
<?php 
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$pharmacists=($operator->viewpharmacist());
?>
<div class="section-1-container section-container" id="section-1">
    <div class="container">
        <div class="row">
            <div class="col section-1 section-description wow fadeIn">
                <h2>pharmacists</h2>
                <div class="divider-1 wow fadeInUp"><span></span></div>
            </div>
        </div>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th scope="col">pharmacist ID</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
    foreach ($pharmacists as $pharmacist){
     echo '<tr>
     <th scope="row">'.$pharmacist['id'].'</th>
     <td data-title="First name">'.$pharmacist['fname'].'</td>
     <td data-title="Last name">'.$pharmacist['lname'].'</td>
     <td data-title="Email">'.$pharmacist['email'].'</td></tr>';
    }?>
            </tbody>
        </table>
    </div>
</div>
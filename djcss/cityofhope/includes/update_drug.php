<?php include "../includes/session_check.php" ;?>
<?php
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$drugs=$operator->allDrugs();

?>
<div class="signup-form">
    <form action="update_drug_process.php" method="post" id=form>
        <p class="hint-text">Update stock here</p>

        <div class="form-group">
            <div class="form-group">
                <select class="form-control" name="drug" id="selected_drug">
                    <option value="" disabled selected>Select drug to update</option>
                    <?php
                    foreach ($drugs as $druglist_){
                    $value=$druglist_['name'];
                    echo '<option>'.$value.'</option>';
                }
                ?>
                </select>
            </div>

            <div class="form-group">
                <input class="form-control" name="dquantity" type="number" step="1" placeholder=" Quantity" required>
            </div>
            <div class="form-group">
                <input class="form-control" name="sell_price" type="number" step="1" placeholder=" Sell price"
                    id="selected_drug_price" min="1" required>
            </div>
        </div>

        <div class=" form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" id="register">Update</button>
        </div>
    </form>
</div>

<!-- script onchange function -->
<script>
function get_tsh() {
var drug_name=document.getElementById("selected_drug").value

    document.getElementById("selected_drug_price").value = <?php echo $cost; ?>;
}
</script>

<?php
        $drug_to_update=$operator->select_drug_to_update("<script>document.write(drug_name);</script>");
        foreach ($drug_to_update as $drug_cost){
            $cost=$drug_cost['tsh'];
        }
        ?>
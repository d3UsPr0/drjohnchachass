<?php include "../includes/session_check.php" ;?>
<?php
$conn=new DbConnection();
$operator=new operator($conn->connect());
$list_recounciliation=$operator->list_recounciliation();
?>

<div class="container">
    <div class="row my-3">
        <div class="col">
            <h5>Fill up physical count</h5>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Physical count</th>

            </tr>
        </thead>
        <tbody>

            <tr>
                <td data-label="Pharmacist">
                    <select class="form-control" name="dname">
                        <option value="" disabled selected>Select drug</option>
                        <?php 
                        foreach ($list_recounciliation as $recouncil){
                            $drug=$recouncil['dname'];
                            echo '<option>'.$drug.'</option>';
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input class="form-control" id="get_input" name="dquantity" type="number" step="1"
                        placeholder="Quantity?" min="1" oninput="reconcile()" required>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</br>
<div class="container">
    <div class="row my-3">
        <div class="col">
            <h5>Recounciliation results</h5>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Result</th>
                <th>Remarks</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="" id="results"></td>
                <td data-label="" id="remarks"></td>
            </tr>
        <tbody>
    </table>
</div>

<script>
function reconcile() {
    var x = document.getElementById("get_input").value;
    if (x == 5) {
        document.getElementById("results").innerHTML = "Looks good!";
        document.getElementById("remarks").innerHTML = "Awesome";
    } else {
        document.getElementById("results").innerHTML = "Do not match";
        document.getElementById("remarks").innerHTML = "x Missing";
    }
}
</script>
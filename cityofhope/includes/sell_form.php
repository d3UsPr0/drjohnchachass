<?php include "../includes/session_check.php" ;?>
<?php 
    $conn=new Dbconnection();
    $operator=new Operator($conn->connect());
    $drugs=$operator->allDrugs();
    $sell_list=$operator->display_sells();
    $total_sells=$operator->total_sells();
    if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $q=$_POST['quantity'];
        $dname=$_POST['drug'];
        if($operator->deleteRow($id)){
            $operator->updateRow($q,$dname);
            header('location: pharmacist.php');
        }else{
            echo "Error in delete";
        }
    }
?>
    <div class="signup-form">
    <div class="form-group" id="form">
        <button type="button" name="sell" class="btn btn-success btn-lg btn-block" data-toggle="modal"
            data-target="#saveSell">
            Click to supply
        </button>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;font-size:20px">
                <h4 class="panel-title">
                    Here are the latest supplies you saved
                </h4>
            </div>
            <div class="panel-body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Village</th>
                            <th>Date</th>
                            <th>Drug</th>
                            <th>Quantity</th>
                            <th>Price/Unit</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($sell_list as $list){
                        echo '<tr>
                                <td data-label="ID">'.$list['id'].'</td>
                                <td data-label="Location">'.$list['loc'].'</td>
                                <td data-label="Name">'.$list['drug_name'].'</td>
                                <td data-label="Date">'.$list['date_supplied'].'</td>
                                <td data-label="Quantity">'.$list['quantity'].'</td>
                                <td data-label="Price/Unit">'.$list['price_per_unit'].'</td>
                                <td data-label="Total Price">'.$list['total_price'].'</td>
                                <td data-label="Actions">
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="'.$list['id'].'">
                                    <input type="hidden" name="quantity" value="'.$list['quantity'].'">
                                    <input type="hidden" name="drug" value="'.$list['date_supplied'].'">
                                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                </form>
                                </td>
					        </tr>';
                        }
                        echo'<tr >
                            <td colspan=6></td>
					    </tr>';
                        // foreach($total_sells as $total){
                        // echo '<tr style="background:#007BFF;font-size:20px;color:white">
                        //     <td data-label="" colspan=5>Total Sells (Today): </td>
                            
                        //     <td data-label="Amount">'.$total['total'].'</td>
					    // </tr>';}
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="saveSell" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>

            <form action="sell_process.php" method="POST" id=form>
                <div class="modal-body">
                    <div class="signup-form">
                        <h3 style="color:red">Ensure your system date is correct</h3>
                        <h2>Supply</h2>
                        <div class="form-group">
                            <div class="form-group">
                                <select class="form-control" name="loc">
                                    <option value="" disabled selected>Patient from?</option>
                                    <option value="DJCSS">DJCSS</option>
                                    <option value="COH">COH</option>
                                    <option value="COH Workers">COH Workers</option>
                                    <option value="Destiny">Destiny</option>
                                    <option value="Borega">Borega</option>
<option value="Nyantira">Nyantira</option>
<option value="Gwitare">Gwitare</option>
<option value="Bwengeli">Bwengeli</option>
<option value="Mliba">Mliba</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kimusi">Kimusi</option>
                                    <option value="Magoto">Magoto</option>
                                    <option value="Ntagacha">Ntagacha</option>
                                    <option value="Nyakalima">Nyakalima</option>
                                    <option value="Nyamongo">Nyamongo</option>
                                    <option value="Nyamwaga">Nyamwaga</option>
                                    <option value="Sirari">Sirari</option>

                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="dname">
                                    <option value="" disabled selected>Select drug to supply</option>
                                    <?php
                                        foreach ($drugs as $druglist_){
                                        $value=$druglist_['name'];
                                        echo '<option>'.$value.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="dquantity" type="number" step="1"
                                    placeholder="Select drug quantity" min="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" name="sell">
                            Save record
                        </button>

            </form>

        </div>
    </div>
</div>
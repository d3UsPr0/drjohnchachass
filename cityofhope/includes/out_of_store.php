<?php
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$out_of_store=$operator->displayOutOfStock();
?>
<div class="card">
    <div class="card-body">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;font-size:20px">
                <h4 class="panel-title">
                    List of out of stock drugs
                </h4>
            </div>
            <div class="panel-body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Drug</th>
                            <th>Quantity</th>
                          </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($out_of_store as $list){
                        echo '<tr>
                                <td data-label="ID">'.$list['id'].'</td>
                                <td data-label="Name">'.$list['dname'].'</td>
                                <td data-label="Quantity">'.$list['store_q'].'</td>
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
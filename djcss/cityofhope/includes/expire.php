<?php
$conn=new Dbconnection();
$operator=new Operator($conn->connect());
$expired=$operator->viewExpired();
?>
<div class="card">
    <div class="card-body">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;font-size:20px">
                <h4 class="panel-title">
                    List of expired drugs
                </h4>
            </div>
            <div class="panel-body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Drug</th>
                            <th>Quantity</th>
                            <th>Expire date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($expired as $list){
                        echo '<tr>
                                <td data-label="ID">'.$list['id'].'</td>
                                <td data-label="Name">'.$list['dname'].'</td>
                                <td data-label="Quantity">'.$list['store_quantity'].'</td>
                                <td data-label="Quantity">'.$list['expire_date'].'</td>
					        </tr>';
                        }
                        echo'<tr >
                            <td colspan=6></td>
					    </tr>';
                       ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
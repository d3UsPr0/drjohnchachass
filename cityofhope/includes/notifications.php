<div class="card">
    <div class="card-body">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center;font-size:20px">
                <h4 class="panel-title">
                    Notification received
                </h4>
            </div>
            <div class="panel-body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Village</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($sell_list as $list){
                        echo '<tr>
                                <td data-label="ID">'.$list['id'].'</td>
                                <td data-label="Location">'.$list['loc'].'</td>
                               </td>
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
<?php
    $get_id=(isset($_GET['id']))? $_GET['id'] : '';
    switch ($get_id) {

        case 'dashboard':
            $pagetitle="Dashboard";
            $contents="dashboard.php";
        break;
        case 'sell':
            $pagetitle="Review and Confirm";
            $contents="sell_process.php";
        break;
        case 'sells':
            $pagetitle="Pharmacist - City of Hope";
            $contents="sell_form.php";
        break;
        case 'instock':
            $pagetitle="Drugs available";
            $contents="instore.php";
        break;

        case 'out-of-stock':
            $pagetitle="Out of Store";
            $contents="out_of_store.php";
        break;

        case 'expired':
            $pagetitle="Expired";
            $contents="expire.php";
        break;
        case 'notifications':
            $pagetitle="Expired";
            $contents="notifications.php";
        break;
        default:
            $pagetitle="Pharmacist - City of Hope";
            $contents="sell_form.php";
        break;
    }

?>
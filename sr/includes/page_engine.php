<?php
    $get_id=(isset($_GET['id']))? $_GET['id'] : '';
    switch ($get_id) {

        case 'dashboard':
            $pagetitle="DJCSS - Dashboard";
            $heading="Dashboard";
            $contents="dashboard.php";
            break;
        case 'results':
            $pagetitle="DJCSS - Results";
            $heading="Examination results";
            $contents="results.php";
            break;
        case 'one':
            $pagetitle="DJCSS - Results";
            $heading="Examination results";
            $contents="results_one.php";
            break;
        case 'two':
            $pagetitle="DJCSS - Results";
            $heading="Examination results";
            $contents="results_one.php";
            break;
        case 'three':
            $pagetitle="DJCSS - Results";
            $heading="Examination results";
            $contents="results_one.php";
            break;
        case 'four':
            $pagetitle="DJCSS - Results";
            $heading="Examination results";
            $contents="results_one.php";
            break;
        case 'material':
            $pagetitle="DJCSS - Material & Notes";
            $heading="Academic Materials";
            $contents="materials.php";
            break;
        case 'payments':
            $pagetitle="DJCSS - Payments";
            $heading="Payments";
            $contents="payments.php";
            break;
        case 'messages':
            $pagetitle="DJCSS - SMS | ALERTS";
            $heading="Messages & Alerts";
            $contents="messages.php";
            break;
            
        case 'settings':
            $pagetitle="DJCSS - Settings";
            $heading="User settings";
            $contents="setting.php";
            break;
           
        
        case 'logout':
            $pagetitle="";
            $heading="";
            $contents="logout.php";
            break; 

        default:
            $pagetitle="DJCSS - Dashboard";
            $heading="Dashboard";
            $contents="dashboard.php";
            break;
    }

?>
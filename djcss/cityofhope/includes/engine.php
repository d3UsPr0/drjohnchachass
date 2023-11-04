<?php
    $get_id=(isset($_GET['id']))? $_GET['id'] : '';
    switch ($get_id) {

        case 'dashboard':
                    $pagetitle="Dashboard";
        $contents="dashboard.php";
        break;

        case 'register':
        $pagetitle="Register";
        $contents="register_form.php";
        break;

        case 'viewpharmacist':
        $pagetitle="pharmacists";
        $contents="view_pharmacist.php";
        break;

        case 'add-inventory':
        $pagetitle="Add Inventory";
        $contents="add_inventory.php";
        break;

        case 'change-password':
        $pagetitle="Change Password";
        $contents="change_password.php";
        break;

        case 'report':
        $pagetitle="Report";
        $contents="report.php";
        break;

        case 'about':
        $pagetitle="About";
        $contents="about.php";
        break;

        case 'add-drug':
        $pagetitle="Add drug";
        $contents="add_drug.php";
        break;

        case 'view-inventory':
        $pagetitle="View Inventories";
        $contents="inventory.php";
        break;

        case 'in-store':
        $pagetitle="Stock list";
        $contents="in_stock.php";
        break;

        case 'sold':
        $pagetitle="Supplied drugs";
        $contents="sold.php";
        break;

        case 'sold':
        $pagetitle="Supplied drugs";
        $contents="sold.php";
        break;

        case 'out-of-stock':
        $pagetitle="Below the minimum count";
        $contents="out_of_stock.php";
        break;

        case 'drug-update':
            $pagetitle="Drug update";
            $contents="update_drug.php";
            break;
            case 'continue-update':
                $pagetitle="Drug update";
                $contents="update_drug.php";
                break;
                

                case 'back':
                    $pagetitle="Drug update";
                    $contents="update_drug.php";
                    break;

                    case 'recounciliation':
                        $pagetitle="Recounciliation";
                        $contents="recounciliation.php";
                        break;

                        case 'expired':
                            $pagetitle="Expired";
                            $contents="expire.php";
                        break;
        
                
            
        // case 'logout':
        // $contents="logout.php";
        // break; 

        default:
        $pagetitle="City of Hope";
        $contents="dashboard.php";
        break;
    }

?>
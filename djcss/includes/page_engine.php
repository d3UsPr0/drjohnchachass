<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        $id='';
    }

    switch($id){
        case 'home':
            $page_title="Dr John Chacha Secondary - Home";
            $page_content="home.php";
        break;
    
        case 'arts':
            $page_title="Dr John Chacha Secondary - Arts";
            $page_content="arts.php";
        break;
       
        case 'science':
            $page_title="Dr John Chacha Secondary - Science";
            $page_content="science.php";
        break;

        case 'ics':
            $page_title="Dr John Chacha Secondary - ICS";
            $page_content="ics.php";
        break;

        case 'all-news':
            $page_title="Dr John Chacha Secondary - News";
            $page_content="news_headlines.php";
        break;

        case 'news':
            $page_title="Dr John Chacha Secondary - News";
            $page_content="news.php";
        break;
        //news case
        case 'usajili-2021':
            $page_title="Dr John Chacha Secondary - Usajili";
            $page_content="news/12-09-2020-usajili-2021.php";
        break;
        case 'pre-form-one':
            $page_title="Dr John Chacha Secondary - Pre Form One Course";
            $page_content="news/14-09-2020-pre-form-one.php";
        break;

        case 'head':
            $page_title="Dr John Chacha Secondary - Welcome";
            $page_content="head.php";
        break;
        case 'ada':
            $page_title="Dr John Chacha Secondary - Malipo";
            $page_content="news/ada.php";
        break;
        case 'ajira':
            $page_title="Dr John Chacha Secondary - Ajira";
            $page_content="news/ajira.php";
        break;
        case 'volunteer-director':
            $page_title="HopeCo - Job Vacancy";
            $page_content="news/volunteer-director.php";
        break;
    
        default:
            $page_title="Dr John Chacha Secondary - Home";
            $page_content="home.php";
        break; 

    }

?>
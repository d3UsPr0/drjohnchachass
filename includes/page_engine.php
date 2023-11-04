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
        case 'djcss-2023':
            $page_title="Dr John Chacha Secondary - Usajili 2023";
            $page_content="news/14-09-2022-usajili.php";
        break;

        case 'head':
            $page_title="Dr John Chacha Secondary - Welcome";
            $page_content="head.php";
        break;
        
        default:
            $page_title="Dr John Chacha Secondary - Home";
            $page_content="home.php";
        break; 

    }

?>
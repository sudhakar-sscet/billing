<?php 
	session_start();
	function landing_page_session_check(){
        if(!isset($_SESSION["user_details"]) || empty($_SESSION["user_details"])){
            header('location:../login');
        }
    }    
    function login_page_session_check(){
        if(isset($_SESSION["user_details"])){
            header('location:../view');
        }
    }
    function log_out(){
		session_destroy();   
	}
    function generate_nav(){
        $color = array('red', 'green', 'aqua', 'yellow');
        foreach (nav_files() as $key => $file_name) {
            $new_color = $color[array_rand($color,1)];
            echo '<li><a href="'.$file_name.'.php"><i class="fa fa-circle-o text-'.$new_color.' "></i> <span>'.ucwords(str_replace("_","&nbsp;",$file_name)).'</span></a></li>';
        }
    }

    function nav_files(){
        return array(
                        'products',
                        'customers',
                        'add_bill',
                        'generate_bill',
                        'add_estimate',
                        'generate_estimate',
                        'staffs'
                    );
    }

 ?>
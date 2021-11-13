<?php
include "../backend/db_connection.php";
session_start();
//print_r($_POST);die;
if (isset($_POST['action']) && $_POST['action'] == 'add') {

   // print_r('add');die;

    $study_num = $_POST['study_num'];
    $title = $_POST['title'];
    $s_date = $_POST['s_date'];
    $e_date = $_POST['e_date'];
    $g_number = $_POST['g_number'];
    $requirement = $_POST['requirement'];
    $stipend = $_POST['stipend'];
    $phase = $_POST['phase'];
    $min_age = $_POST['min_age'];
    $max_age = $_POST['max_age'];
    $r_admin = $_POST['r_admin'];
    $b_draws = $_POST['b_draws'];
    $location = $_POST['location'];
    $sch_type = $_POST['sch_type'];
    $indication = $_POST['indication'];
    $s_length = $_POST['s_length'];
    $w_restriction = $_POST['w_restriction'];
    $svrkey = $_POST['svrkey'];

    $sql = "INSERT INTO `studies`(`svrkey`, `title`, `start_date`, `end_date`, `study_number`, `group_number`, `requirement`,
 `stipend`, `weigth_restriction`, `phase`, `minimum_elegible_age`, `maximum_elegible_age`, `indication`, 
 `route_of_administration`, `blood_draws`, `location`, `schedule_type`, `study_length`) 
 VALUES ({$svrkey},'{$title}','{$s_date}','{$e_date}',{$study_num},{$g_number},'{$requirement}',{$stipend},'{$w_restriction}',
 {$phase},{$min_age},{$max_age},'{$indication}','{$r_admin}',{$b_draws},'{$location}','{$sch_type}','{$s_length}') ";

    $resultSet = mysqli_query($connection, $sql);
}
if (isset($_POST['action']) && $_POST['action'] == 'del') {
    //print_r('entro al del');die;
    {

        $pk_studies = $_POST['pk_studies'];
        $sql = "DELETE FROM `studies` WHERE pk_studies= {$pk_studies}";
        print_r("print de emergencia para evitar deletes /backend/add_del_upt_study.php :42");
        die;
        $resultSet = mysqli_query($connection, $sql);

    }
} else if (isset($_POST['action']) && $_POST['action'] == 'upt') {

    $pk_studies = $_POST['pk_studies'];
    $study_num = $_POST['study_num'];
    $title = $_POST['title'];
    $s_date = $_POST['s_date'];
    $e_date = $_POST['e_date'];
    $g_number = $_POST['g_number'];
    $requirement = $_POST['requirement'];
    $stipend = $_POST['stipend'];
    $phase = $_POST['phase'];
    $min_age = $_POST['min_age'];
    $max_age = $_POST['max_age'];
    $r_admin = $_POST['r_admin'];
    $b_draws = $_POST['b_draws'];
    $location = $_POST['location'];
    $sch_type = $_POST['sch_type'];
    $indication = $_POST['indication'];
    $s_length = $_POST['s_length'];
    $w_restriction = $_POST['w_restriction'];
    $svrkey = $_POST['svrkey'];



    $sql ="UPDATE `studies` SET `svrkey`={$svrkey},`title`='{$title}',`start_date`= '{$s_date}',
`end_date`='{$e_date}',`study_number`={$study_num},`group_number`={$g_number},`requirement`='{$requirement}',
`stipend`={$stipend},`weigth_restriction`='{$w_restriction}',`phase`={$phase},`minimum_elegible_age`={$min_age},
`maximum_elegible_age`={$max_age},`indication`='{$indication}',`route_of_administration`='{$r_admin}',
`blood_draws`={$b_draws},`location`='{$location}',`schedule_type`='{$sch_type}',`study_length`='{$s_length}'
 WHERE `pk_studies` = {$pk_studies}";

   // print_r($sql);die;
}

//print_r($sql);die;


header("location: ../pages/courses_page.php");
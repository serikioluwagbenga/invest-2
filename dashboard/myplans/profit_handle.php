<?php
    require_once "database.php";
    $d = new database;
    function autoupdateplan($id){
        $d = new database;
        $date = date('y-m-d h:i:s');
        $user_plan = $d->multiplegetwhere("user_plans", "id = ? and active = ? and last_growth < ?", [$id, "yes", $date], "details");
        if($user_plan == ""){
            return false;
        }
        $planID = $user_plan['plan'];
        $plan = $d->fastgetwhere("plans", "id = ?", $id, "details");
        if(!is_array($plan)){
            return false;
        }
        if($user_plan['last_growth'] >= $user_plan['expire_date']){
            return false;
        }
        if($plan['increment_interval'] == 'Daily'){
            if($plan['increment_type'] == 'Percentage'){
                $day_intrest = (int)$user_plan['amount'] * (int)$plan['increment_amount'] / 100;
                $days = strtotime($date) - strtotime($user_plan['last_growth']);
                $days = $days/(24*60*60);
                $total_intrest = $day_intrest * $days;
                $total_intrest = $total_intrest + $user_plan['profit_earned'];
                $where = "id = '$planID'";
                $d->update("user_plans", "", $where, ["last_growth"=>$date, "profit_earned"=>$total_intrest]);
            }
        }
    }
?>
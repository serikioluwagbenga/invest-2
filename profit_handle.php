<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Database
{
    public $db;
    private static $instance;
    private $magic_quotes_active;
    private $real_escape_string_exists;
    public $err = "no";
    public $userID;
    // private constructor
    public function __construct()
    {
        // $this->d = new database;
        $servername = "localhost";
        $username = "therightchoice_user";
        $password = "ssCyjqm2E8-y";
        try {
            $this->db = new PDO("mysql:host=$servername;dbname=therightchoice_prime_new", $username, $password);
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
            // I won't echo this message but use it to for checking if you connected to the db
            //incase you don't get an error message
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        // $this->userID = htmlspecialchars($_SESSION['adminSession']);
    }
    
        public function fastgetcount($what_to_get, $order_by, $limit)
    {
        try {
            $que = $this->db->prepare("SELECT * FROM $what_to_get ORDER BY $order_by ASC $limit");
            $que->execute();
            return $que->rowCount();
        } catch (PDOException $e) {
        }
    }

    public function fastgetwhere($what_to_get, $where, $what, $status)
    {
        $stmt = $this->db->prepare("SELECT * FROM $what_to_get WHERE $where"); //using LIMIt fro optimization purpose
        $stmt->execute([$what]);
        return database::getmethod($status, $stmt);
    }
    
        public function getmethod($status, $stmt)
    {
        if ($status == 'details') {
            $count = $stmt->rowCount();
            if ($count < 1) {
                return "";
            } else {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } elseif ($status == 'moredetails') {
            $count = $stmt->rowCount();
            if ($count < 1) {
                // echo "yess";
                return "";
            } else {
                return $stmt;
            }
        } else {
            return $count = $stmt->rowCount();
        }
    }

    public function multiplegetwhere($what, $where, $data, $status)
    {
        $stmt = $this->db->prepare("SELECT * FROM $what WHERE $where"); //using LIMIt fro optimization purpose
        $stmt->execute($data);
        return database::getmethod($status, $stmt);
    }
    
    
        public function quick_insert($enter, $column, $data, $message = "0")
    {
        $column2 = "";
        foreach ($data as $key => $value) {
            $sets[] = "?,";
            $column2 .= $column . $key . ", ";
        }
        $set = substr(implode(" ", $sets), 0, -1);
        if ($column == "") {
            $column = mb_substr($column2, 0, -2);
        }
        $stmt = $this->db->prepare("INSERT INTO $enter($column)
        VALUES ($set)");
        $data = array_values($data);
        $stmt->execute($data);
        if ($stmt) {
            if ($message != "0") {
                Database::message($message, $type = 'success');
            }
            return true;
        } else {
            $message = 'Something Went Wrong please try again';
            Database::message($message, $type = 'error');
        }
    }
    
    
        public function update($what, $set, $where, $data, $message = "")
    {
        try {
            // $set = str_replace(",", " = ?", $set).' = ?';
            if ($set == "null" || $set == "") {
                foreach ($data as $key => $value) {
                    $sets[] = "$key = ?,";
                }
                $set = substr(implode(" ", $sets), 0, -1);
            }
            $set;
            $stmt = $this->db->prepare("UPDATE $what SET $set WHERE $where");
            $data = array_values($data);
            $stmt->execute($data);
            if ($stmt) {
                if ($message != "") {
                    Database::message($message, "success");
                }
                return true;
            }
            $stmt = null;
        } catch (PDOException $e) {
            // For handling error
            return false;
            //   Database::message("Something went wrong $e", "error");
        }
    }
  public function message($message, $type)
    {
        if ($type == "error") {
            $type = "danger";
        } elseif ($type == "success") {
            $type = "success";
        }
        $message = str_replace("_", " ", $message);
        //     echo "<div class='bg-$type fade show mb-5' role='bg'>
        //     <!--  <div class='bg-icon'><i class='flaticon-$type'></i></div> -->
        //     <div class='bg-text'>$message</div>
        // </div>";
        if ($type == "success") {
            echo "<div class='message mt-2 shadow-sm $type'>
<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
$message
</div>";
        } else {
            echo "<div class='message mt-2 shadow-sm $type'>
<span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>
$message
</div>";
        }
    }


}

$d = new database;

    function autoupdateplan($id){
        $d = new Database;
        $date = date('Y-m-d h:i:s');
        $user_plan = $d->multiplegetwhere("user_plans", "id = ? and active = ? and last_growth < ?", [$id, "yes", $date], "details");
        
        if(!is_array($user_plan)){
            return false;
        }
        $planID = $user_plan['plan'];
        $plan = $d->fastgetwhere("plans", "id = ?", $planID, "details");
        if(!is_array($plan)){
            return false;
        }
        if($user_plan['last_growth'] >= $user_plan['expire_date']){
            return false;
        }
        $userid = $user_plan['user'];
        $user = $d->fastgetwhere("users", "id = ?", $userid, "details");
        if(!is_array($user)){
            return false;
        }
        if($plan['increment_interval'] == 'Daily'){
            
            $createDate = new DateTime($date);

            $caldate = $createDate->format('Y-m-d');

            $createDate = new DateTime($user_plan['last_growth']);
       
            $last_growth_date = $createDate->format('Y-m-d');
            
            if($plan['increment_type'] == 'Percentage'){
                $day_intrest = (int)$user_plan['amount'] * (float)$plan['increment_amount'] / 100;
              
                $days = strtotime($caldate) - strtotime($last_growth_date);
              
                 $days = $days/(24*60*60);
  
                 if($days != 0){
                     $total_intrest = $day_intrest * $days;
                     $roi = $total_intrest;
                    if($user['roi'] != "" || $user['roi'] != null){
                        $roi = ceil($total_intrest + (int)$user['roi']);
                     }
                      if($user['account_bal'] != "" || $user['account_bal'] != null){
                        $balance = ceil($total_intrest + (int)$user['account_bal']);
                     }
                     if($user_plan['profit_earned'] != "" || $user_plan['profit_earned'] != null){
                        $total_intrest = ceil($total_intrest + (int)$user_plan['profit_earned']);
                     }
                 $where = "id = '$id'";
                 $d->update("user_plans", "", $where, ["last_growth"=>$date, "profit_earned"=>$total_intrest]);
                 $where = "id = '$userid'";
                 $d->update("users", "", $where, ["account_bal"=>$balance, "roi"=>$roi]);
                 $d->quick_insert("tp__transactions", "", ["plan"=>$plan['name'], "user_plan_id"=>$user_plan['id'], "user"=>$user_plan['user'], "amount"=>$day_intrest, "type"=>"ROI"]);
                 
                 }
                
            }
        }
    }
   $date = date('Y-m-d h:i:s');
    $allplans = $d->multiplegetwhere("user_plans", "active = ? and last_growth < ?", ["yes", $date], "moredetails");
    if($allplans != ""){
        foreach($allplans as $row){
            // echo $row['id']." ";
            autoupdateplan($row['id']);
        }
    }
    
    ?>
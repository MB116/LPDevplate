<?php

class DatabaseMQ {

    public function connect(){
        $conf_base_host='localhost';
        $conf_base_user='c0_prodengi';
        $conf_base_pass='prodengi2013';
        $conf_base_db='c0_prodengi';
        //define ('SYS_EMAIL', 'noreply@prodengi.kz');
        $mega_url = explode('/',$_SERVER["REQUEST_URI"]);
        $uri = explode('/',$_SERVER["REQUEST_URI"]);
        date_default_timezone_set('Asia/Almaty');

        $dbh = mysql_connect($conf_base_host, $conf_base_user, $conf_base_pass) or die("Soedinenie ne ustanovlenno");
        mysql_select_db($conf_base_db) or die("Nepodklucheno k BD");

        mysql_query ("set character_set_client='utf8'");
        mysql_query ("set character_set_results='utf8'");
        mysql_query ("set collation_connection='utf8_general_ci'");
    }

    public function Add($filds){
        $name = $filds['name'];
        $surname = $filds['surname'];
        $work = $filds['work'];
        $birthday = $filds['birthday'];
        $helpful = $filds['helpful'];
        $mail = $filds['mail'];
        $contacts = $filds['contacts'];
        $date_add = $filds['date_add'];
        $rezume = $filds['rezume'];

        //$query = mysql_query('SELECT * FROM `vacancy`');

        //$rezume = substr($_SERVER['DOCUMENT_ROOT']."/vacancy/".$_FILES["Resume"]["name"], 24);
        $query = mysql_query("INSERT INTO `vacancy`
				(`name`, `surname`, `work`, `birthday`, `helpful`, `mail`, `contacts`, `date_add`, `rezume`) VALUES
				( '{$name}', '{$surname}', '{$work}', '{$birthday}', '{$helpful}', '{$mail}', '{$contacts}', '{$date_add}', '{$rezume}')
	    ");
    }

}

class Email {
    protected static $_instance;

    private function __construct(){}

    public static function getInstance() {

        // проверяем актуальность экземпляра
        if (null === self::$_instance) {

            // создаем новый экземпляр
            self::$_instance = new self();
        }
        // возвращаем созданный или существующий экземпляр
        return self::$_instance;
    }

    public function send($name,$email,$recipient,$subject,$mail_body,$files=array()){##отправка почты
        #$name=$_SERVER['HTTP_HOST'];
        #$email=SYS_EMAIL;
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

        $name="=?utf-8?B?".base64_encode($name)."?=";
        $header  = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: multipart/mixed; boundary="'.$mime_boundary.'"; charset=utf-8' . "\r\n";

        $header .= 'Content-Transfer-Encoding: 8bit' . "\r\n";
        $header .= "From: ". $name . " <" . $email . ">\r\n";
        $header .= "Reply-To: ". $name . " <" . $email . ">\r\n";
        $header .= "Return-Path: ". $name . " <" . $email . ">\r\n";
        $subject="=?utf-8?B?".base64_encode($subject)."?=";


        $mail_body = "--".$mime_boundary."\n" . "Content-Type: text/html; charset=\"utf-8\"\n" . "Content-Transfer-Encoding: 8bit\n\n" . $mail_body . "\n\n";
        //$mail_body = "--".$mime_boundary."\n" . "Content-Type: text/plain; charset=\"utf-8\"\n" . "Content-Transfer-Encoding: 8bit\n\n" . $mail_body . "\n\n";
        for($i=0;$i<count($files);$i++){
            if(is_file($files[$i])){
                $mail_body .= "--".$mime_boundary."\n";
                $fp =    @fopen($files[$i],"rb");
                $data =    @fread($fp,filesize($files[$i]));
                @fclose($fp);
                $data = chunk_split(base64_encode($data));
                $mail_body .= "Content-Type: application/octet-stream; name=\"".basename($files[$i])."\"\n" .
                    "Content-Description: ".basename($files[$i])."\n" .
                    "Content-Disposition: attachment;\n" . " filename=\"".basename($files[$i])."\"; size=".filesize($files[$i]).";\n" .
                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            }
        }
        $mail_body .= "--".$mime_boundary."--";
        $m=mail($recipient, $subject, $mail_body, $header);
        if ($m){
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function mksecret($length = 10) {
        $set = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J","k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T","u","U","v","V","w","W","x","X","y","Y","z","Z","1","2","3","4","5","6","7","8","9");
        $str="";
        for($i = 1; $i <= $length; $i++)
        {
            $ch = rand(0, count($set)-1);
            $str .= $set[$ch];
        }
        return $str;
    }

    public function validemail($email) {
        if (ereg("^([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\[[0-9a-z_.-]{1,3}\.[0-9a-z_.-]{1,3}\.[0-9a-z_.-]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9a-z_.-]{1,3})(\]?)$", $email)){
            return true;
        }else {
            return false;
        }
    }
}

?>

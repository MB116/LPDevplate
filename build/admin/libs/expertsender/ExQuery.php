<?

/**
 * Классы для работы с ExSender
 * @author Khainazarov Denis
 * @package prodengi
 * @subpackage ExSender
 * @copyright prodengi.kz almaty 2014
 * @version 0.1
 * @uses SimpleXmlEx v2 aplpha
 */
 
/**
 * Класс запросов к ExSender
 * @author Khainazarov Denis
 * @version 0.1
 */
class ExQuery{
    /**
     * Запрос на получения/добавление данных
     * @method getQuery
     * @param string $url URL запроса
     * @return mixed ответ сервера
     */
    public static function getQuery($url){
        $cUrl = curl_init();
        curl_setopt($cUrl,CURLOPT_URL,$url);
        curl_setopt($cUrl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($cUrl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($cUrl, CURLOPT_FAILONERROR, 1);
        ob_start();
        curl_exec($cUrl);
        $data = ob_get_clean();
        curl_close($cUrl);
        return $data;
    }
    /**
     * Запрос на удаление данных
     * @method delQuery
     * @param string $url URL запроса
     * @return mixed ответ сервера
     */
    public static function delQuery($url){
        $cUrl = curl_init();
        curl_setopt($cUrl,CURLOPT_URL,$url);
        curl_setopt($cUrl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($cUrl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($cUrl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($cUrl, CURLOPT_FAILONERROR, 1);
        curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cUrl, CURLOPT_HEADER, 1);
        ob_start();
        curl_exec($cUrl);
        $data = ob_get_clean();
        curl_close($cUrl);
        return $data;
    }
    /**
     * Запрос на добавления данных
     * @method postQuery
     * @param string $url URL запроса
     * @param string $data данные в текстовом виде
     * @return mixed ответ сервера
     */
    public static function postQuery($url,$data){
        $cUrl = curl_init();
        curl_setopt($cUrl,CURLOPT_URL,$url);
        curl_setopt($cUrl, CURLOPT_POST, 1);
        curl_setopt($cUrl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($cUrl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($cUrl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($cUrl, CURLOPT_HEADER, 1);
        curl_setopt($cUrl, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($cUrl, CURLOPT_FAILONERROR, 1);
        $resp = curl_exec($cUrl);
        curl_close($cUrl);
        return $resp;
    }
}
?>
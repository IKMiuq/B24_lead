<?php


class B24_lead
{
    private $crm_host, $crm_port, $crm_path, $crm_login, $crm_pass, $crm_auth, $b24_assigned_id;

    public function __construct()
    {
        $this->readSetting();
    }

    private function readSetting()
    {
        $err['error'] = array();
        $auth_setting = parse_ini_file("setting.ini");
        if ($auth_setting) {
            foreach ($auth_setting as $key => $item) {
                switch ($key) {
                    case ('crm_host'):
                        if (empty($item)) return $err['error'][] = 'Не указан хост';
                        $this->crm_host = $item;
                        break;
                    case ('crm_port'):
                        if (empty($item)) return $err['error'][] = 'Не указан порт';
                        $this->crm_port = $item;
                        break;
                    case ('crm_path'):
                        if (empty($item)) return $err['error'][] = 'Не указан путь';
                        $this->crm_path = $item;
                        break;
                    case ('crm_login'):
                        $this->crm_login = $item;
                        break;
                    case ('crm_pass'):
                        $this->crm_pass = $item;
                        break;
                    case ('crm_auth'):
                        $this->crm_auth = $item;
                        break;
                    case ('b24_assigned_id'):
                        $this->b24_assigned_id = $item;
                        break;
                    default:
                        break;
                }
            }
            if ((!empty($this->crm_login) && !empty($this->crm_pass)) || !empty($this->crm_auth)) {
                return true;
            } else {
                return $err['error'][] = 'Нет аутентификационных данных';
            }
        } else {
            return $err['error'][] = 'Файл настроек не прочитан';
        }
    }

    public function createLead($params=array(), $setStatus='NEW', $sourse='WEB', $currency='', $product=array())
    { //параметр стаус источник валюты продукты
        if (!key_exists('TITLE', $params)) {
            return $err['error'][] = 'Критическая ошибка!!! TITLE не найден!';
        }
        $params['STATUS_ID'] = $setStatus;
        $params['SOURCE_ID'] = $sourse;
        if (empty($params['ASSIGNED_BY_ID']) && !empty($this->b24_assigned_id)) {
            $params['ASSIGNED_BY_ID'] = $this->b24_assigned_id;
        }
        if (!empty($this->crm_auth)) {
            $params['AUTH'] = CRM_AUTH;
        } elseif (!empty($this->crm_login) && !empty($this->crm_pass)) {
            $params['LOGIN'] = $this->crm_login;
            $params['PASSWORD'] = $this->crm_pass;
        }
        return $this->sendLead($params);
    }

    private function sendLead($postData)
    {
        $fp = fsockopen("ssl://" . $this->crm_host, $this->crm_port, $errno, $errstr, 30);
        if ($fp) {
            // prepare POST data
            $strPostData = http_build_query($postData);

            // prepare POST headers
            $str = "POST " . $this->crm_path . " HTTP/1.0\r\n";
            $str .= "Host: " . $this->crm_host . "\r\n";
            $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
            $str .= "Content-Length: " . strlen($strPostData) . "\r\n";
            $str .= "Connection: close\r\n\r\n";

            $str .= $strPostData;

            // send POST to CRM
            fwrite($fp, $str);

            // get CRM headers
            $result = '';
            while (!feof($fp)) {
                $result .= fgets($fp, 128);
            }
            fclose($fp);

            // cut response headers
            $response = explode("\r\n\r\n", $result);

            return $response;
        } else {
            return $errno;
        }
    }

}

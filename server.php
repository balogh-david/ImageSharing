<?php
class DBclass extends mysqli
{
    protected static $instance = false;
    protected static $options = array();
    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_OFF);
        $o = self::$options;
        @parent::__construct($o['host'] ?: 'localhost', $o['user'] ?: 'root', $o['pass'] ?: '', $o['dbname'] ?: 'image_sharing', $o['port'] ?: 3306, $o['sock']   ?: false);
        
        if (mysqli_connect_errno()) {
            throw new exception(mysqli_connect_error(), mysqli_connect_errno());
        }
        
        if (!@parent::set_charset("utf8")) {
            throw new exception("nem állítható be utf8");
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function setOptions($opt)
    {
        if (is_string($opt)) {
            $opt = self::parse_dburl($opt);
        }
        self::$options = array_merge(self::$options, $opt);
        self::$instance = false;
    }

    private static function parse_dburl($u)
    {
        $url = parse_url($u);
        return array('user' => urldecode($url['user']), 'pass' => isset($url['pass']) ? urldecode($url['pass']) : '', 'host' => urldecode($url['host']), 'dbname' => urldecode(ltrim($url['path'], "/")), 'port' => isset($url['port']));
    }
}
?>
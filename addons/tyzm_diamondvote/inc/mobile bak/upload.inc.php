<?php

defined('IN_IA') or exit('Access Denied');set_time_limit(0);
global $_W,$_GPC;
is_weixin();

// if ($_FILES['file'] && $_FILES['file']['error'] == 0) {
// 	if ($_FILES['file']['size'] > 1024*1024*10) {
// 		exit(json_encode(array('status' => '0', 'data' => '请上传小于10MB的视频')));
// 	}
// 	$filename = $_FILES['file']['name'];
//     $tmp = $_FILES['file']['tmp_name'];
//     $filepath = IA_ROOT.'/';
//     if(move_uploaded_file($tmp,$filepath.$filename)){
//         exit(json_encode(array('status' => '1', 'data' => $filepath.$filename)));
//     }else{
//         exit(json_encode(array('status' => '0', 'data' => '上传失败')));
//     }
// }
//exit(json_encode(array('status' => '1', 'data' => $_FILES['file']['size'])));

// $data['save-key'] = "/test/hello.png";
// $data['expiration'] = time() + 120;
// $data['bucket'] = 'video-voting';
// $policy = base64_encode(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
// $params['method'] = 'POST';
// $params['uri'] = '/' . $data['bucket'];
// $params['date'] = gmdate('D, d M Y H:i:s') . ' GMT';
// $params['policy'] = $policy;
// $operator = 'xieran';
// $pwd = md5('xieran112233');
// $signature = base64_encode(hash_hmac('sha1', implode('&', $data), $pwd, true));
// $signature = 'UPYUN ' . $operator . ':' . $signature;
// $formApiKey = '0cf6uh5Zdp/Ai3il/jZG0I/dGQQ=';

// exit(json_encode(array('status' => '1', 'policy' => $policy, 'authorization' => $signature)));
// // 参数
// Method = POST                           
// URI = /upyun-temp

// // 上传参数，需要计算 Policy  
// bucket = upyun-temp
// save-key = /demo.jpg
// expiration = 1478674618
// date = Wed, 09 Nov 2016 14:26:58 GMT
// content-md5 = 7ac66c0f148de9519b8bd264312c4d64

class Config
{
    /**
     * @var string 服务名称，将会被弃用
     */
    public $bucketName;

    /**
     * @var string 服务名称
     */
    public $serviceName;
    /**
     * @var string 操作员名
     */
    public $operatorName;
    /**
     * @var string 操作员密码 md5 hash 值
     */
    public $operatorPassword;

    /**
     * @var bool 是否使用 https
     */
    public $useSsl;

    /**
     * @var string 上传使用的接口类型，可以设置为 `REST`：使用 rest api 上传，`AUTO` 根据文件大小自动判断，`BLOCK` 使用断点续传
     * 当上传小文件时，不推荐使用断点续传；上传时如果设置了异步预处理`withAsyncProcess=true`，将会使用表单 api 上传
     */
    public $uploadType = 'AUTO';

    /**
     * @var int 上传的接口类型设置为 `AUTO` 时，文件大小的边界值：小于该值时，使用 rest api，否则使用断点续传。 默认 30M
     */
    public $sizeBoundary = 31457280;

    /**
     * @var int request timeout seconds
     */
    public $timeout = 60;


    /**
     * @var string 异步云处理的回调通知地址
     */
    public $processNotifyUrl;

    /**
     * @var boolean curl debug
     */
    public $debug = false;

    private $version = '3.0.0';



    /**
     * @var string 表单 api 的秘钥
     */
    private $formApiKey;

    /**
     * @var string rest api 和 form api 的接口地址
     */
    public static $restApiEndPoint;


    /**
     * rest api 和 form api 接口请求地址，详见：http://docs.upyun.com/api/rest_api/
     */
    const ED_AUTO            = 'v0.api.upyun.com';
    const ED_TELECOM         = 'v1.api.upyun.com';
    const ED_CNC             = 'v2.api.upyun.com';
    const ED_CTT             = 'v3.api.upyun.com';

    /**
     * 异步云处理接口地址
     */
    const ED_VIDEO           = 'p0.api.upyun.com';

    /**
     * 刷新接口地址
     */
    const ED_PURGE           = 'http://purge.upyun.com/purge/';

    /**
     * 同步视频处理接口地址
     */
    const ED_SYNC_VIDEO           = 'p1.api.upyun.com';

    public function __construct($serviceName, $operatorName, $operatorPassword)
    {
        $this->serviceName = $serviceName;
        $this->bucketName = $serviceName;
        $this->operatorName = $operatorName;
        $this->setOperatorPassword($operatorPassword);
        $this->useSsl          = false;
        self::$restApiEndPoint = self::ED_AUTO;
    }

    public function setOperatorPassword($operatorPassword)
    {
        $this->operatorPassword = md5($operatorPassword);
    }

    public function getFormApiKey()
    {
        if (! $this->formApiKey) {
            throw new \Exception('form api key is empty.');
        }

        return $this->formApiKey;
    }

    public function setFormApiKey($key)
    {
        $this->formApiKey = $key;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getPretreatEndPoint()
    {
        return $this->getProtocol() . self::ED_VIDEO;
    }

    public function getSyncVideoEndPoint()
    {
        return $this->getProtocol() . self::ED_SYNC_VIDEO;
    }

    public function getProtocol()
    {
        return $this->useSsl ? 'https://' : 'http://';
    }
}

class Util
{
    public static function trim($str)
    {
        if (is_array($str)) {
            return array_map(array('Util', 'trim'), $str);
        } else {
            return trim($str);
        }
    }

    public static function getHeaderParams($headers, $otherParams = array())
    {
        $params = [];
        $otherParams = array_map('strtolower', $otherParams);
        foreach ($headers as $header => $value) {
            $header = strtolower($header);
            if (strpos($header, 'x-upyun-') !== false) {
                $params[$header] = $value[0];
            } else if (in_array($header, $otherParams)) {
                $params[$header] = $value[0];
            }
        }
        return $params;
    }

    public static function parseDir($body)
    {
        $files = array();
        if (!$body) {
            return array();
        }

        $lines = explode("\n", $body);
        foreach ($lines as $line) {
            $file = [];
            list($file['name'], $file['type'], $file['size'], $file['time']) = explode("\t", $line, 4);
            $files[] = $file;
        }

        return $files;
    }

    public static function base64Json($params)
    {
        return base64_encode(json_encode($params, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    }

    public static function stringifyHeaders($headers)
    {
        $return = array();
        foreach ($headers as $key => $value) {
            $return[] = "$key: $value";
        }
        return $return;
    }

    public static function md5Hash($resource)
    {
        rewind($resource);
        $ctx = hash_init('md5');
        hash_update_stream($ctx, $resource);
        $md5 = hash_final($ctx);
        return $md5;
    }

    /**
     * GuzzleHttp\Psr\Uri use `parse_url`，not good for utf-8,
     * So should `encodeURI` first, before `new Psr7\Request`
     * @see http://stackoverflow.com/questions/4929584/encodeuri-in-php
     */
    public static function encodeURI($url)
    {
        $unescaped = array(
            '%2D'=>'-','%5F'=>'_','%2E'=>'.','%21'=>'!', '%7E'=>'~',
            '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')'
        );
        $reserved = array(
            '%3B'=>';','%2C'=>',','%2F'=>'/','%3F'=>'?','%3A'=>':',
            '%40'=>'@','%26'=>'&','%3D'=>'=','%2B'=>'+','%24'=>'$'
        );
        $score = array(
            '%23'=>'#'
        );
        return strtr(rawurlencode($url), array_merge($reserved, $unescaped, $score));
    }
}

class Signature
{
    /**
     * 获取分块上传接口的签名
     */
    const SIGN_MULTIPART     = 1;
    /**
     * 生成视频处理接口的签名
     */
    const SIGN_VIDEO         = 2;
    /**
     * 生成视频处理接口的签名（不需要操作员时使用）
     */
    const SIGN_VIDEO_NO_OPERATOR   = 3;

    /**
     * 获取 Header 签名需要的请求头
     *
     * @param Config $serviceConfig
     * @param $method 请求方法
     * @param $path  请求路径
     * @param $contentMd5 文件内容 md5
     *
     * @return array
     */
    public static function getHeaderSign($serviceConfig, $method, $path, $contentMd5 = null)
    {
        $gmtDate = gmdate('D, d M Y H:i:s \G\M\T');

        $policy = null;
        $sign = self::getBodySignature($serviceConfig, $method, $path, $gmtDate, $policy, $contentMd5);

        $headers = array(
            'Authorization' => $sign,
            'Date' => $gmtDate,
            'User-agent' => 'Php-Sdk/' . $serviceConfig->getVersion()
        );
        return $headers;
    }

    /**
     * 获取请求缓存刷新接口需要的签名头
     *
     * @param Config $serviceConfig
     * @param $urlString
     *
     * @return array
     */
    public static function getPurgeSignHeader(Config $serviceConfig, $urlString)
    {
        $gmtDate = gmdate('D, d M Y H:i:s \G\M\T');
        $sign = md5("$urlString&{$serviceConfig->serviceName}&$gmtDate&{$serviceConfig->operatorPassword}");
        return array(
            'Authorization' => "UpYun {$serviceConfig->serviceName}:{$serviceConfig->operatorName}:$sign",
            'Date' => $gmtDate,
            'User-agent' => 'Php-Sdk/' . $serviceConfig->getVersion() . ' (purge api)'
        );
    }

    /**
     * 获取表单 API 需要的签名，依据 body 签名规则计算
     * @param Config $serviceConfig
     * @param $method 请求方法
     * @param $uri 请求路径
     * @param $date 请求时间
     * @param $policy
     * @param $contentMd5 请求 body 的 md5
     *
     * @return array
     */
    public static function getBodySignature(Config $serviceConfig, $method, $uri, $date = null, $policy = null, $contentMd5 = null)
    {
        $data = array(
            $method,
            $uri
        );
        if ($date) {
            $data[] = $date;
        }

        if ($policy) {
            $data[] = $policy;
        }

        if ($contentMd5) {
            $data[] = $contentMd5;
        }
        $signature = base64_encode(hash_hmac('sha1', implode('&', $data), $serviceConfig->operatorPassword, true));
        return 'UPYUN ' . $serviceConfig->operatorName . ':' . $signature;
    }
}

$rid = intval($_GPC['rid']);
$config = new Config('video-voting', 'xieran', 'xieran112233');
$config->setFormApiKey('0cf6uh5Zdp/Ai3il/jZG0I/dGQQ=');

$data['save-key'] = '/'.$rid.'/{year}/{mon}/{day}/{random32}{.suffix}';
$data['expiration'] = time() + 1200;
$data['bucket'] = 'video-voting';
$policy = Util::base64Json($data);
$method = 'POST';
$uri = '/' . $data['bucket'];
$signature = Signature::getBodySignature($config, $method, $uri, null, $policy);
exit(json_encode(array(
    'policy' => $policy,
    'authorization' => $signature
)));






<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
namespace kbug\common;

use \think\config;
use \think\session;
use \think\cookie;
class BaseCommonFunction
{
    private static $langCookieVar = 'think_var';

    public static function chargeLanguage($lang='zh-cn')
    {
        $langSet = '';
        if($lang!='')
        {
            $langSet = strtolower($lang);

        }
        else
        {
            if(Cookie::get(self::$langCookieVar))
            {
                $langSet = strtolower(Cookie::get(self::$langCookieVar));
            }
            elseif (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            {
                preg_match('/^([a-z\d\-]+)/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $matches);
                $langSet = strtolower($matches[1]);
            }
        }
        if($langSet == '')
        {
            $langSet = config('default_lang');
        }
        Cookie::set(self::$langCookieVar, $langSet);
    }

    /**
     * 系统邮件发送函数
     * @param string $tomail 接收邮件者邮箱
     * @param string $name 接收邮件者名称
     * @param string $subject 邮件主题
     * @param string $body 邮件内容
     * @param string $attachment 附件列表
     * @return boolean
     * @author static7 <static7@qq.com>
     */
}



?>
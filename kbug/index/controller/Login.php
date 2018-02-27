<?php
namespace kbug\index\controller;

use \think\config;
use \think\session;
use \kbug\common;
use \think\validate;

class Login extends \think\Controller
{
    public function index()
    {
        return $this->fetch(config('template.view_path').config('template.view_theme').'/login.html');
    }
    public  function login()
    {
        $msg = [
            'user.require' => lang('loginPage.login_name_error'),
            'password.min'   => lang('loginPage.login_password_error'),
        ];
        $validate = new Validate([
            'user'  => 'require|max:25',
            'password'=>'require|min:8|max:25'
        ],$msg);
        $data = $_POST;
        if (!$validate->check($data))
        {
            return $this->error($validate->getError());
        }
        else
        {
            $user = model('User');
            $check=$user->login($data);
            if ($check==1)
            {
                return $this->success(lang('loginPage.login_scuess'),url('/admin'));
            }
            else  if ($check==-1)
            {
                $this->error(lang('loginPage.login_error'));
            }
            else  if ($check==-2)
            {
                $this->error(lang('registerPage.server_error'));
            }
            else  if ($check==-3)
            {
                $this->error(lang('loginPage.active'));
            }
            else
            {
                $this->error(lang('loginPage.login_error'));
            }
        }
    }

    public  function findPassword()
    {

        $msg = [
            'email.require' => lang('registerPage.user_email_error'),
        ];
        $validate = new Validate([
            'email'  => 'email',
        ],$msg);
        $data = $_POST;
        if (!$validate->check($data))
        {
            return $this->error($validate->getError());
        }
        else
        {
            $user = model('User');
            $check=$user->findAndSendEmail($data);
            if ($check==1)
            {
                return $this->success(lang('loginPage.sendEmailScuess'));
            }
            else  if ($check==-1)
            {
                $this->error(lang('loginPage.findPassword_non_existent'));
            }
            else  if ($check==-2)
            {
                $this->error(lang('registerPage.server_error'));
            }
            else
            {
                $this->error(lang('loginPage.login_error'));
            }
        }
    }
    public function setLang() {
        $lang = new \kbug\common\BaseCommonFunction();
        switch ($_GET['lang']) {
            case 'cn':
                $lang->chargeLanguage('zh-cn');
                break;
            case 'en':
                $lang->chargeLanguage('en-us');
                break;
            default:
                $lang->chargeLanguage('zh-cn');
                break;
        }
    }
}

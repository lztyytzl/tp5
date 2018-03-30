<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        $data=['id'=>01,'name'=>"你好"];
        return ['data'=>$data];
    }
    
    public function login(){
        $user_name=isset($_GET["username"])?$_GET["username"]:null;
        $pwd=isset($_GET["password"])?$_GET["password"]:null;
        if ($user_name!=null && $pwd!=null){
            $data=['name'=>$user_name,'password'=>$pwd];
            return ['data'=>$data,'code'=>200];
        }else{
            $data=['result'=>"用户名密码不能为空!"];
            return ['data'=>$data,'code'=>202];
        }
    }
}

?>

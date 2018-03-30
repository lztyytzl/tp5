<?php
namespace app\index\controller;

use think\Db;
class User
{
    public function sayHello($name){
        $data=['name'=>$name];
        return ['data'=>$data];
    }
    
    public function select(){
//         $res=Db::query('select * from uzer');
        $res=db('uzer')->select();
        $arr=json_encode($res);//转换成json字符串
        return json_decode($arr);//返回json对象
    }
    /**
     * 添加用户
     */
    public function add(){
        $user_name=isset($_GET["username"])?$_GET["username"]:null;
        $pwd=isset($_GET["password"])?$_GET["password"]:null;
        if ($user_name!=null && $pwd!=null){
            $data=["name"=>$user_name,"password"=>$pwd];
            $sum=Db::table('uzer')->insert($data);
            if ((int)$sum>0){
                $data=['result'=>"注册成功!"];
                return ['data'=>$data,'code'=>200];
            }else{
                $data=['result'=>"注册失败!"];
                return ['data'=>$data,'code'=>203];
            }
        }else{
            $data=['result'=>"用户名密码不能为空!"];
            return ['data'=>$data,'code'=>202];
        }
    }
    /**
     * 更新
     */
    public function update(){
         $resCount=Db::table('uzer')->update(['name'=>"神仙",'id'=>2]);//更新name字段
//         $resCount=db('uzer')->where('id',2)->update(['name'=>'think']);
        if ($resCount>0){
            $data=['result'=>"更新成功!"];
            return ['data'=>$data,'code'=>200];
        }else{
            $data=['result'=>"更新失败!"];
            return ['data'=>$data,'code'=>203];
        }
    }
    /**
     * 注销用户
     */
    public function dele(){
        $resSum=Db::table('uzer')->where('id',1)->delete();
        if ($resSum>0){
            $data=['result'=>"删除成功!"];
            return ['data'=>$data,'code'=>200];
        }else{
            $data=['result'=>"删除失败!"];
            return ['data'=>$data,'code'=>203];
        }
    }
}

?>
<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(){
        $user = Auth::user();
        $info['name'] =$user['name'];
        $info['email']=$user['emial'];
        $info['uid']=$user['id'];
        $info['files']=DB::table('pro_files')->where(['uid'=>$user['id'],'is_delete'=>0])->get(['file_url','created_at'])->map(function ($value) {
            return (array)$value;
        })->toArray();;
        return view('index.index', compact('info'));
    }

    public function upload(Request $request){
        $file = $request->file('file');
        if ($file->isValid()) {

            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg

            // 上传文件
            $filename = md5(date('YmdHis') . '-' . uniqid()) . '.' . $ext;
            // 使用我们新建的uploads本地存储空间（目录）
            //这里的uploads是配置文件的名称
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            if($ext == 'zip'){
                $data['file_type']=2;
            }else{
                $data['file_type']=1;
            }
            $data['uid']=Auth::id();
            $data['file_url']=$filename;
            $data['created_at']=date('Y-m-d H:i:s',time());
            $data['is_read']=1;
            if($bool){
                $result = DB::table('pro_files')->insert($data);
                if($result){
                    return '上传成功';
                }else{
                    unlink('public/upload/'.$filename);
                }
            }else{
                return '上传失败';
            }

        }
    }
}

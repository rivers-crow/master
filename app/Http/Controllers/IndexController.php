<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index(){
        return view('index.index');
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
            if($bool){
                return '上传成功';
            }else{
                return '上传失败';
            }

        }
    }

    public function getphoto(Request $request){
        $fileName=$request->get('name');
        $url = Storage::url($fileName);
        return $url;
        return Storage::disk('uploads')->download($fileName, $fileName);


    }
}

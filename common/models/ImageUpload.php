<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 8/15/2017
 * Time: 10:10 PM
 */
namespace common\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {
    public $image;

    public function rules()
    {
           return[
             [['image'],'required'],
               [['image'],'file','extensions'=>'jpg,png'],
           ];
    }

    public function uploadFile(UploadedFile $file,$currentimage){
        $this->image=$file;
       if($this->validate()){
           $this->deleteCurrentimage($currentimage);
           return $this->saveImage();

       }
    }
    private function getFolder(){

        return Yii::getAlias('@web').'uploads/';
    }

    private function generateFilename(){
        return strtolower(md5(uniqid($this->image->baseName)).".".$this->image->extension);
    }
    public function fileExits($currentimage){
        if(!empty($currentimage)&& $currentimage!=null){
            return file_exists($this->getFolder().$currentimage);
        }
    }
    public function deleteCurrentimage($currentimage){
        if($this->fileExits($currentimage)){
            unlink($this->getFolder().$currentimage);
        }
    }
    public function saveImage(){
        $filename=$this->generateFilename();
        $this->image->saveAs($this->getFolder().$filename);
        return $filename;
    }

}
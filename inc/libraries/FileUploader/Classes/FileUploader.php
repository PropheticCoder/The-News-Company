<?php
namespace libraries;

use Exception;

/**
 * File uploader, a refactored version of w3 schools file upload documentation
 * 
 * This version allows multi uploads and will automatically place the image in the correct folder with respect to file format
 * @link https://www.w3schools.com/php/php_file_upload.asp
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */
class FileUploader{

    /**
     * The directory we want tosave file in
     */
    private static $targetDir="../../.uploads/";

    /**
     * The Actual file with path
     */
    private static $targetFiles=[];

    private static $uploadOk=false;

    /**
     * The Allowed Format You Want To Use This Library For
     */
    private static $allowedFormats=[
        'jpg','jpeg'
    ];
    
    /**
     * Maximum size of uploads,in mb
     */
    private static $allowedMaxSize=3 * 1048576;

    /**
     * Check if fileexists
     */
    private static function fileExists(string $file)
    {
        return file_exists($file);
    }

    private static function fileFormatDir(int $fileKey)
    {
        $fileFormat= strtolower(pathinfo(basename($_FILES["uploadFile_{$fileKey}"]['name']), PATHINFO_EXTENSION));
        switch ($fileFormat) {
            case 'jpg':
                return "images/";
            case "jpeg":
                return "images/";
            default:
                throw new Exception("No dir for this format: {$fileFormat}");
                break;
        }
    }
    
    /**
     * Set The Target Files To Upload
     * Always Number Your Files with uloadFile_FileNumber
     */
    private static function setTargetFile(int $fileKey,string $uploadModel,string $fileName=null){
        if(!$fileName) $fileName= basename($_FILES["uploadFile_{$fileKey}"]['name']);
        try{
            $targetFile= self::$targetDir . self::fileFormatDir($fileKey) .$uploadModel. DIRECTORY_SEPARATOR . $fileName;
            if(self::fileExists($targetFile)) return false;
            self::$targetFiles[$fileKey]=$targetFile;
            return true;
        }catch(Exception $e){
            //Should the array pushing fail
            die($e->getMessage());
        }
    }

    /**
     * Check if file is correct size
     */
    private static function fileIsCorrectSize(int $fileKey)
    {
        if($_FILES["uploadFile_{$fileKey}"]["size"] >self::$allowedMaxSize)
        return false;
        return true;
    }

    
    /**
     * Check if file is image
     */
    private static function fileIsImage(int $fileKey)
    {
        $isImage = getimagesize($_FILES["uploadFile_{$fileKey}"]['tmp_name']);
        if ($isImage !== false) return true;
        else return false;
    }

    
    /**
     * Check if file is desired type
     */
    private static function fileIsCorrectFormat(int $fileKey,string $testingFormat)
    {
        if(!in_array($testingFormat,self::$allowedFormats)) 
        throw new Exception("Cannot test a format that isnt set in allowed formats array:".print_r(self::$allowedFormats));
        if($testingFormat=="jpg"||$testingFormat=="jpeg") return self::fileIsImage($fileKey);
    }

    /**
     * Move the uploaded file
     */
    private static function uploadFile(int $fileKey)
    {
        try{
            move_uploaded_file($_FILES["uploadFile_{$fileKey}"]['tmp_name'], self::$targetFiles[$fileKey]);
        }
        catch(Exception $e){
            return false;
        }
        return true;
    }

    
    /**
     * Uploads the file
     * 
     * All upload logic is contained in here
     * @param string $uploadModel Where To Group Files
     * @param int $fileMaxKey  Or File Count
     * @param array $fileFormats  An array of the file format of each file by key
     * @return bool
     */
    public static function uploadFiles(string $uploadModel, $fileKeys=[],string $fileName=null){
        $fileCount=1;
        $currFileName=null;
        foreach($fileKeys as $fileKey =>$fileFormat){
            //Check File Size
            if(!self::fileIsCorrectSize($fileKey)) return "Upload file {$fileKey} is too large";
            self::$uploadOk=true;
            //Check file format
            if(!self::fileIsCorrectFormat($fileKey,$fileFormat)) return "Upload file {$fileKey} is not correct format";
            //Set target file
            if($fileName) $currFileName ="{$fileName}-{$fileCount}.{$fileFormat}";
            if(self::setTargetFile($fileKey, $uploadModel,$currFileName))
            self::$uploadOk = self::uploadFile($fileKey);
            $fileCount++;
        }
        //Return an array of file locations
        return self::$targetFiles;
    }
}
?>
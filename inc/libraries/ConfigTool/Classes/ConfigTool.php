<?php
namespace libraries;
/**
 * Config
 * Fetches the specified config data
 * @author PropheticCoder https://github.com/PropheticCoder
 * @copyright PropheticCoder https://github.com/PropheticCoder
 * @version 1.0
 */
class ConfigTool{
    protected static function extract(string $config,string $setting){
        $dir= $_SERVER['DOCUMENT_ROOT']."/The-News-Company";
        return parse_ini_file($dir."/inc/libraries/ConfigTool/Configs/".$config.".ini")[$setting];
    }
}
?>
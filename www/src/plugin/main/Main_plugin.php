<?php
if (!class_exists('Main_plugin')) {

    include_once __DIR__ . '/AddPluginInterface.php';
    include_once __DIR__ . '/Dlfcn.php';

    class Main_plugin
    {
    
        private null|array $all_plugin;
        private null|String $path;

        public function __construct()
        {
            $this->path = "./plugins/";
            $this->all_plugin = [];
            $all_plugin = [];
            $folderPlugins = __DIR__ . "/../../../" . $this->path . "/";
            if(is_dir($folderPlugins)) {
                $ffs = scandir($folderPlugins);
                unset($ffs[array_search('.', $ffs, true)]);
                unset($ffs[array_search('..', $ffs, true)]);
                foreach ($ffs as $listFile) {
                    $plibobj = Dlfcn::dlopen($folderPlugins . "/" . $listFile);
                    if($plibobj == null) {
                        echo "Error loading the library : " . $listFile . "<br />";
                    } else {
                        $psqr = Dlfcn::dlsym($plibobj, "AddPluginInterface");
                        if ($psqr == null) {
                            echo "Error accessing the symbol : " . $listFile . "<br />";
                        } else {
                            array_push($this->all_plugin, $psqr);
                        }
                    }
                }
            }
        }
    
        public function getPlugins(): null|array {
            return $this->all_plugin;
        }

    }

}
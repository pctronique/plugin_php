<?php
if (!class_exists('NewMain')) {

    include_once __DIR__ . '/../plugin/main/Main_plugin.php';

    class NewMain
    {
        public function __construct()
        {
            $main_plugin = new Main_plugin();
            $main_plugin->loadPlugins();
            foreach ($main_plugin->getPlugins() as $value) {
                echo $value->getName() . " : " . $value->getName() . "<br />";
            }
        }
        
    }

}
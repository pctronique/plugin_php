<?php
if (!class_exists('Plugin2')) {

    include_once __DIR__ . '/../../src/plugin/main/AddPluginInterface.php';

    class Plugin2 implements AddPluginInterface
    {
    
        public function getName(): null|string {
            return "plugin2";
        }

        public function getMessage(): null|string {
            return "the plugin2";
        }

    }

}
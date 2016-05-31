<?php

namespace restartme\task;

use pocketmine\scheduler\PluginTask;
use restartme\RestartMe;

class AutoBroadcastTask extends PluginTask{
    /** @var RestartMe */
    private $plugin;
    /**
     * @param RestartMe $plugin
     */
    public function __construct(RestartMe $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
    /**
     * @param int $currentTick
     */
    public function onRun($currentTick){
        if(!$this->plugin->isTimerPaused()){
            if($this->plugin->getTime() >= $this->plugin->getConfig()->get("startCountdown")){
                $this->plugin->broadcastTime($this->plugin->getConfig()->get("broadcastMessage"), $this->plugin->getConfig()->get("displayType"));
            }
        }
    }
}
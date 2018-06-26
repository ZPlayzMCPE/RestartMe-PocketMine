<?php

namespace restartme\task;

use pocketmine\scheduler\Task;
use restartme\RestartMe;

class AutoBroadcastTask extends Task {
    /** @var RestartMe */
    private $plugin;
    /**
     * @param RestartMe $plugin
     */
    public function __construct(RestartMe $plugin){
        $this->plugin = $plugin;
    }
    /**
     * @param int $currentTick
     */
    public function onRun(int $currentTick){
        $timer = $this->plugin->getTimer();
        if(!$timer->isPaused()){
            if($timer->getTime() >= $this->plugin->getConfig()->get("startCountdown")){
                $timer->broadcastTime($this->plugin->getConfig()->get("broadcastMessage"), $this->plugin->getConfig()->get("displayType"));
            }
        }
    }
}

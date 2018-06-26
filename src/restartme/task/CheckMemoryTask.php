<?php

namespace restartme\task;

use pocketmine\scheduler\Task;
use restartme\utils\Utils;
use restartme\RestartMe;

class CheckMemoryTask extends Task {
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
        if(!$this->plugin->getTimer()->isPaused()){
            if(Utils::isOverloaded($this->plugin->getMemoryLimit())){
                $this->plugin->getTimer()->initiateRestart(RestartMe::OVERLOADED);
            }
        }
    }
}

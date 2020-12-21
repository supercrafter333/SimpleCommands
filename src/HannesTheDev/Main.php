<?php

namespace HannesTheDev;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\level\Position;
use pocketmine\command\Command;
use HannesTheDev\Commands\FeedCommand;
use HannesTheDev\Commands\FlyCommand;
use HannesTheDev\Commands\HealCommand;
use HannesTheDev\Commands\TagCommand;
use HannesTheDev\Commands\NachtCommand;
use HannesTheDev\Commands\SimpleCommandsCommand;

class Main extends PluginBase implements Listener{
  
  public function onEnable(){
    $this->getLogger->info("Plugin aktiviert");
    $this->getServer->getPluginManager->registerEvents($this, $this);
    $this->saveResource("messages.yml");
  }
  
  public function onDisable(){
    $this->getLogger->info("Plugin deaktiviert");
  }
}
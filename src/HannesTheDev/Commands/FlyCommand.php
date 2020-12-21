<?php

namespace HannesTheDev\Commands;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use HannesTheDev\Main;

class FlyCommand extends Command implements Listener{
  
  public $flylist = []
  
  public function onCommand(Command $cmd, CommandSender $sender, string $label, array $args) : bool{
    $fly = new Config($this->plugin->getDataFolder() . "messages.yml", Config::YAML);
    if($cmd->getName() == "fly"){
      if($sender instanceof Player){
        if($sender->hasPermission("fly.command")){
          if(!isset($this->flyList[$sender->getName()])){
            $sender->setFlying(true);
            $sender->setAllowFlieght(true);
            $sender->sendMessage("§8[§bSC§8] " . $fly->get("fly-aktiviert"));
            return true;
          } else {
            unset($this->flyList[$sender->getName()]);
            $sender->setFlying(false);
            $sender->setAllowFlieght(false);
            $sender->sendMessage("§8[§bSC§8] " . $fly->get("fly-deaktiviert"));
            return true;
          }
        } else {
          $sender->sendMessage("§8[§bSC§8] " . $fly->get("fly-keine-berechtigung"));
          return true;
        }
      } else {
        $sender->sendMessage("§8[§bSC§8] " . $fly->get("fly-konsole"));
        return true;
      }
      break;
    }
  }
}
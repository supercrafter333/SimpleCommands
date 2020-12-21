<?php

namespace HannesTheDev\Commands;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use HannesTheDev\Main;

class HealCommand extends Command implements Listener{
  
  public function onCommand(Command $cmd, CommandSender $sender, string $label, array $args) : bool {
    $heal = new Config($this->plugin->getDataFolder() . "messages.yml", Config::YAML);
    if($cmd->getName() == "heal"){
      if($sender instanceof Player){
        if($sender->hasPermission("heal.command")){
          $sender->setHealth(20);
          $sender->sendMessage("§8[§bSC§8] " . $heal->get("heal-erfolgreich"));
          return true;
        } else {
          $sender->sendMessage("§8[§bSC§8] " . $heal->get("heal-keine-berechtigung"));
          return true;
        }
      } else {
        $sender->sendMessage("§8[§bSC§8] " . $heal->get("heal-konsole"));
        return true;
      }
      break;
    }
  }
}
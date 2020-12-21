<?php

namespace HannesTheDev\Commands;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\level\Position;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use HannesTheDev\Main;

class NachtCommand extends Command implements Listener{
  
  public function onCommand(Command $cmd, CommandSender $sender, string $label, array $args) : bool {
    $nacht = new Config($this->plugin->getDataFolder() . "messages.yml", Config::YAML);
    if($cmd->getName() == "nacht"){
      if($sender instanceof Player){
        if($sender->hasPermission("nacht.command")){
          $sender->getLevel()->setTime(18000);
          $sender->sendMessage("§8[§bSC§8] " . $nacht->get("nacht-erfolgreich"));
          return true;
        } else {
          $sender->sendMessage("§8[§bSC§8] " . $nacht->get("nacht-keine-berechtigung"));
          return true;
        }
      } else {
        $sender->sendMessage("§8[§bSC§8] " . $nacht->get("nacht-konsole"));
        return true;
      }
      break;
    }
  }
}
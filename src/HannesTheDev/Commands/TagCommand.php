<?php

namespace HannesTheDev\Commands;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\level\Position;
use pocketmine\command\Command;
use HannesTheDev\Main;

class TagCommand extends Command implements Listener{
  
  public function onCommand(Command $cmd, CommandSender $sender, string $label, array $args) : bool{
    $tag = new Config($this->plugin->getDataFolder() . "messages.yml", Config::YAML);
    if($cmd->getName() == "tag"){
      if($sender instanceof Player){
        if($sender->hasPermission("tag.command")){
          $sender->getLevel()->setTime(0);
          $sender->sendmessage("§8[§bSC§8] " . $tag->get("tag-erfolgreich"));
          return true;
        } else {
          $sender->sendMessage("§8[§bSC§8] " . $tag->get("tag-keine-berechtigung"));
          return true;
        }
      } else {
        $sender->sendMessage("§8[§bSC§8] " . $tag->get("tag-konsole"));
        return true;
      }
      break;
    }
  }
}
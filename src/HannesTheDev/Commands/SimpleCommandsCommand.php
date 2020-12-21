<?php

namespace HannesTheDev\Commands;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use HannesTheDev\Main;

class SimpleCommandsCommand implements Listener{
  
  public function onCommand(Command $cmd, CommandSender $sender, string $label, array $args) : bool {
    if($cmd->getName() == "simplecommands" or "sc"){
      if($sender instanceof Player){
        $sender->sendMessage("§cInfos:\n§3Name: §bSimpleCommands\n§3Author: §bHannesTheDev\n§3Version: §b1.0.0\n§3Kommentare: §bIch habe dieses Plugin mit freude gecodet und hoffe ihr freut euch dafüber, falls ihr noch einselne wünsche habt Kontaktiert mich über Discord\n\n§cKontaktmöglichkeiten:\n§3Discord: §bHannesTheDev#2941\n§3Support: §bhttps://discord.gg/kuh7m42\n\n\n§bDanke fürs benutzten:)");
        return true;
      } else {
        $sender->sendMessage("§8[§bSC§8] §cDu musst ein Spieler sein diesen Command auszuführen!");
        return true;
      }
      break;
    }
  }
}
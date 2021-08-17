<?php # <- because pocketmine is writen in php

namespace Milchreisfan\TheFirstCommand; # <- the same as in main but you don't need the Main because your are in the main file xd

use pocketmine\plugin\PluginBase; # <- this is something in the software you will need it for every plugins its the base
use pocketmine\command\Command; # <- you need this if you want commands in your plugin
use pocketmine\command\CommandSender; # <- you need it too for commands

class Main extends PluginBase implements Listener {

    public function onEnable() # <- the function is for all if the server is starting
    {
        $this->getLogger()->info("Hey there i'm ready!"); # <- this message will come in your console if the server is startet and the plugin is loaded (info = information, alert/warning = a warning, error = error xd)
    }

    public function onDisable() # <- the function is for all if the server is shut down
    {
        $this->getLogger()->error("oh oopsie..."); # <- this message will come if the server shuts down or it didn't work...
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool # <- this is the funtion for the command
    {
        if($cmd->getName() == "thefirstcommand") { # <- the command from the plugin.yml
            if($sender instanceof Player) { # <- to check if the commandsender is an player
                if($sender->hasPermission("firstcommand.cmd")) { # <- the permission from plugin.yml to check if the sender has the permission to run the command
                    $sender->sendMessage("§bthis is your first command :D! §akeep pushing buddy! i hope your good"); # <- the message if the sender has the permission
                } else { # <- to change if the sender has no permissions
                    $sender->sendMesssage("§4hey you can't run this command but i hope you had a good day!"); # <- the message if the sender don't have the permission tu run the command
                    return; # <- stops the command block
                }
            }
            $sender->sendMessage("hey buddy please run the command ingame"); # <- if you want you can add this if the sender is the console :D
        }
    }
}
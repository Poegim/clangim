# Clangim
#### Starcraft Remastered Team management system.

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Media resources](#media-resources)
* [Screenshots](#screenshots)

## General info
Langgim app is simple management system for Starcraft BroodWar/remastered teams. I did this application to expand my knowledge of the technologies I was using, mainly Laravel / TALL stackin this case.

Includes:
+ blog
+ forum with optional hidden subforums 
+ replays module with rating system and metadata parsing powered by [icza/screp](https://github.com/icza/screp)  repository
+ team matches module with player statistics and email notification about incoming clan wars
+ team section
+ users administration section
+ user panel
+ team settings panel (team flag, team logo, <b>dark mode colors pallete</b>)
	
## Technologies
Project is created with:
* PHP 8
* Laravel 8 (Jetstream starter kit)
* TailwindCSS 2
* Livewire 2
* AlpineJS 2
* [Blade UIkit](https://blade-ui-kit.com/)

## Setup
<p>I recommend to deploy it by Laravel Forge. On local machines u can use Laravel Sail to create necessary Docker container.</p>
<p>Clangim requires Queue and Schedule workers, to send email notifications</p>
<p>APP_ENV variable in .ENV file should be set as 'production' on production environment.</p>
<p>Please be sure Config/app.php seeds type is set to "deploy".</p>

## Media resources
<p>Ingame races icons by https://www.pngegg.com/</p>
<p>Flags by <a href='https://www.freepik.com/vectors/icons'>Icons vector created by luis_molinero - www.freepik.com</a></p>

## Screenshots

#### Dashboard
![Dashboard](./readme/dashboard.PNG "Dashboard")

#### Forum
![Forum](./readme/forum.PNG "Forum")

#### Clan Wars
![Clan Wars](./readme/clanwars.PNG "Clan Wars")

#### Clan War
![ClanWar](./readme/clanwar.PNG "ClanWar")

#### Edit matches view
![Edit matches](./readme/edit_clanwar.PNG "Edit matches view")

#### Replays
![Replays](./readme/replays.PNG "Dashboard")

#### Team / app settings
![Team/app settings](./readme/team_settings.PNG "Team/app settings")

#### Dashboard dark
![Dashboard dark](./readme/dashboard_dark.PNG "Dashboard dark")

#### Dashboard mobile
![Dashboard mobile](./readme/dashboard_mobile.PNG "Dashboard mobile")

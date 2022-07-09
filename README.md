# Clangim
#### Starcraft Remastered Team management system.

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Media resources](#media-resources)

## General info
Langgim app is simple management system for Starcraft BroodWar/remastered teams.

Includes:
+ blog
+ forum with optional hidden subforums 
+ replays module with rating system and metadata parsing powered by [icza/screp](https://github.com/icza/screp)  repository
+ team matches module with player statistics and email notification about incoming clan wars
+ team section
+ users administration section
+ user panel
+ team settings panel (flags, logo, dark mode colors pallete)
	
## Technologies
Project is created with:
* PHP 8
* Laravel 8
* TailwindCSS 2
* Livewire
* AlpineJS

## Setup
<p>I recommend to deploy it by Laravel Forge. On local machines u can use Laravel Sail to create necessary Docker container.</p>
<p>Clangim requires Queue and Schedule workers, to send email notifications</p>
<p>APP_ENV variable in .ENV file should be set as 'production' on production environment.</p>
<p>Please be sure Config/app.php seeds type is set to "deploy".</p>

## Media resources
<p>Ingame races icons by https://www.pngegg.com/</p>
<p>Flags by <a href='https://www.freepik.com/vectors/icons'>Icons vector created by luis_molinero - www.freepik.com</a></p>

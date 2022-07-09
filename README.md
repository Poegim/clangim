# Clangim
***
## Starcraft Remastered Team management system.

## Table of contents
***
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)

## General info
Langgim app is simple management system for Starcraft BroodWar/remastered teams.

Includes:
.. blog
.. forum with optional hidden subforums 
.. replays module with rating system and metadata parsing powered by icza/screp repo
.. team matches module with player statistics and email notification about incoming clan wars
.. team section
.. users administration section
.. user panel
.. team settings panel (flags, logo, dark mode colors pallete)
	
## Technologies
***
Project is created with:
* PHP 8
* Laravel 8
* TailwindCSS 2
* Livewire
* AlpineJS

## Setup
***
I recommend to deploy it by Laravel Forge. On local machines u can use Laravel Sail to create necessary Docker container.














#Old Readme

## IMPORTANT CONFIG INFO
<p>Laravel as it is and replays parsing will work only on linux based systems with CLI access, this app shouldnt be deployed on shared hostings. I recommend to deploy it on Laravel Forge.</p>
<p>Clangim requires Queue and Schedule workers, to send email notifications</p>
<p>APP_ENV variable in .ENV file should be set as 'production' on production environment.</p>
<p>Please be sure Config/app.php seeds type is set to "deploy".</p>
<p>Users roles are stored in App/Models/User model.</p>

<b><p>App/Providers/SettingsServiceProvider.php boot function must be uncommented after first deploy migration.</p></b>

## Media Resources
<p>Ingame races icons by https://www.pngegg.com/</p>
<p>Flags by <a href='https://www.freepik.com/vectors/icons'>Icons vector created by luis_molinero - www.freepik.com</a></p>

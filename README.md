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

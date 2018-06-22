
# iblog


### APACHE
Basic configuration of the virtualhost mode developer into of: ` /etc/apache2/sites-available/local.project.com.conf`

	<VirtualHost *:80>
		ServerName local.project.com
		DocumentRoot /var/www/html/project/app/
		<Directory /var/www/html/project/app/>
			Options Indexes FollowSymLinks Multiviews
			AllowOverride All
			Order allow,deny
			allow from all
			RewriteEngine on
		</Directory>
		SetEnv WP_ENV dev
		ErrorLog ${APACHE_LOG_DIR}/local.project.com-error.log
	</VirtualHost>


### Usar breakpoint of Boostrap v4.1.1
Example to use **utils breakspoint** or media-query

	body{
		background-color: yellow;
		
		/* breakpoint exclusive */
		@include media-breakpoint-only(xs) {
			background-color: red;
		}
		
		/* breakpoint standar */
		@include media-breakpoint-up(md){
			border:3px solid blue;
		}
	}


mkdir $1
cd $1
		echo "b" | cat > index.php
		mkdir css
			cd css
				mkdir user
				cd user 
					echo "ENTRASTE A ESTILOS" | cat > estilos.css
				cd ..
				mkdir admin 
				cd admin
					echo "ENTRASTE A ESTILOS" | cat > estilos.css
				cd ..
			cd ..
		mkdir img
			cd img
				mkdir avatars
				mkdir buttons
				mkdir products
				mkdir pets
			cd ..
		mkdir js
			cd js
				mkdir validations
				 cd validations 
				 	echo "ENTRASTE A VALIDATIONS" | cat > login.js 	
				 	echo "ENTRASTE A REGISTER" | cat > resgister.js
				 cd ..
				mkdir effects
				 cd effects
				 	echo "ENTRASTE A PANELS" | cat > panels.js
				 cd ..
			cd ..
		mkdir tpl
		 	cd tpl
				echo "ENTRASTE A MAIN" | cat > main.tpl
				echo "ENTRASTE A LOGIN" | cat > login.tpl
				echo "ENTRASTE A REGISTER" | cat > register.tpl
				echo "ENTRASTE A PANEL" | cat > panel.tpl
				echo "ENTRASTE A PROFILE" | cat > profile.tpl
				echo "ENTRASTE A CRUD" | cat > crud.tpl
			cd ..
		mkdir php
			cd php
				echo "ENTRASTE A CREATE" | cat > create.php
				echo "ENTRASTE A READ" | cat > read.php
				echo "ENTRASTE A UPDATE" | cat > update.php
				echo "ENTRASTE A DELETE" | cat > delete.php
				echo "ENTRASTE A DBCONECT" | cat > dbconect.php
			cd .. 
cd ..

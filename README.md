# OBRA SOL - DEMO 2

Cambiar la contraseña de root en conexion.php y login-conn.php para abrir en otros ordenadores

## Creación de un nuevo proyecto + Instalación de dependencias

Pasos hechos en conjunto con el grupo (laragon/www/):

- mkdir obra-2
- cd obra-2
- npm init -y
- npm install bootstrap
- npm i bootstrap-icons
- npm install autoprefixer -D
- npm install node-sass -D
- npm install nodemon -D
- npm install npm-run-all -D
- npm install postcss -D
- npm install postcss-cli -D
- npm install purgecss -D
- npm install serve -D
- npm install stylelint -D
- npm install stylelint-config-twbs-bootstrap -D
- copiar código de scripts de compilación (en package.json)
- crear index.html
- crear los siguientes archivos con su contenido:
  - .browserslistrc
  - .stylelintrc
  - .stylelintignore
  - .editorconfig

Parte de estilos (sass):

- copiar carpeta de scss
- npm install -g sass
- npm run build

Hacer .gitignore con todo menos nuestras carpetas originales.

## Creación de árbol de directorios propio de la app

La organización se hace por carpetas para evitar confusiones o duplicación de código:

- index.php -> pantalla principal a la que se accede tras logearse -> SIN ESTILOS, SOLO LINKS DE PRUEBA
- conexion (conexion.php + sesion.php) -> HECHO (dos conexiones, una para login y otra para funciones)
- login (login.php + logout.php) -> HECHO Y 1 DISEÑO LISTO
- citas, persoas, empresas (aún no completas)
- components (header y footer js) -> HECHOS
- scss (login)

Carpetas de dependencias: assets, node_modules, scss.
Archivos sueltos de dependencias.

LOGIN: diseño 1 hecho
PERSOAS: completo (faltaría enlazar formularios -excepto datos- a tablas de la base) sin estilos excepto cdn

## Extensión de la base de datos y Modificación de Código

Registros - index (persoas y empresas), revisión de funciones, buscador: Sarai

Formación y Acciones (persoas), Formularios Empresas: Ángela y Fernando

Experiencia y Ofertas (persoas): Xabi

Método (JS) para tener varias pestañas en una misma página: Noe (ver en nuevo.php de persoas o empresas)

- Implementación de formularios en la estructura de pestañas
- Organización de pestañas y contenidos
- Sin header, footer ni estilos que no sean de bootstrap (de momento cdn)

Compilación de formularios y elementos (nuevo y modificar): Noe y Sarai

- Falta empresas -> hecho
- Poner algo en citas -> reorganización de index y crear nueva (con insert), borrar vacia
  - Hay un archivo css y otro js de la obra anterior en la carpeta para la funcionalidad
- Menú -> ofertas (vacías)

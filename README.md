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

- index.php -> pantalla principal a la que se accede tras logearse -> HECHO
- conexion (conexion.php + sesion.php) -> HECHO
- login (login.php + logout.php) -> HECHO Y DISEÑO LISTO
- citas, persoas, empresas (completas hasta formularios, tablas, etc.)
- components (header y footer js) -> HECHOS
- scss (login e index) -> HECHOS

Carpetas de dependencias: assets, node_modules, scss.
Archivos sueltos de dependencias.

LOGIN: diseños 1 y 2 hechos
PERSOAS: completo
EMPRESAS: completo

## Extensión de la base de datos y Modificación de Código

Registros - index (persoas y empresas), revisión de funciones, buscador: Sarai

Formación y Acciones (persoas), Formularios Empresas: Ángela y Fernando

Experiencia y Ofertas (persoas): Xabi

Método (JS) para tener varias pestañas en una misma página: Noe (ver en nuevo.php de persoas o empresas)

- Implementación de formularios en la estructura de pestañas
- Organización de pestañas y contenidos
- Sin header, footer ni estilos que no sean de bootstrap (de momento cdn) -> estilo y componentes grupo Paloma

Compilación de formularios y elementos (nuevo y modificar): Noe y Sarai

- Falta empresas -> hecho
- Poner algo en citas -> reorganización de index y crear nueva (con insert), borrar vacia -> Noe
  - Hay un archivo css y otro js de la obra anterior en la carpeta para la funcionalidad
- Menú -> ofertas y consultas (vacías) de momento sin crear en el menú

Qué se está haciendo ahora:

- Noe: revisión de código y modificaciones, implementar estilos, modificación de footer.js, index del sol
- Sarai, Ángela, Fer: paginación de las tablas (límite de filas) y modales/avisos de funciones (Paloma)
- Noe: paginación de persoas, implementación de cambios y estilos con Paloma

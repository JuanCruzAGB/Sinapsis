# Sinapsis
 
## Instalación

 1. Clonar repositorio.
```
git clone https://github.com/JuanCruzAGB/Sinapsis.git
```

 2. Instalar dependencias.
```
composer install
npm install
npm run dev
```

 3. Crear el archivo de las variables de entorno `.env` (se puede copiar el archivo `.env.example` para facilitar el asunto)

 4. Generar y guardar la base de datos en las variables de entorno (`.env`)
```
DB_DATABASE=sinapsis
DB_USERNAME=root
DB_PASSWORD=
```

 6. Descargar o volver a hacer los `seeds` (solicitar a **JuanCruzAGB**)

 7. Ejecutar las migraciones y rellenar la base de datos.
```
php artisan migrate --seed
```
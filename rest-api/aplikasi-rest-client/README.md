## Instalation
1. SQL database file in phpmvc.sql , so you import to database but opsional.
2. update file config.php
    - $config['base_url'] = 'APPLICATION URL';
3. update file database.php
    - 'username' => 'USERNAME_DB',
	- 'password' => 'PASSWORD_DB', // so null is ok
	- 'database' => 'NAME_DATABASE',
4. open terminal / ctrl + shift + `
    - composer instructor
    - if you error : Deprecation warning: require-dev.mikey179/vfsStream is invalid, it should not contain uppercase characters. Please use mikey179/vfsstream instead. Make sure you fix this as Composer 2.0 will error.
    - you update composer.json is lowercase , everywhere
    - so you try it, so done your problem
5. install Guzzle
    - composer require guzzlehttp/guzzle:~6.0
6. file guzzle in vendor
7. update file config.php to connection gazzle autoload composer
    - folder application/config/config.php
    - edit $config['composer_autoload'] = false; so $config['composer_autoload'] = FCPATH .'vendor/autoload.php';
    - FCPATH is front direct URL firts
    - check is , var_dump(FCPATH);die();
8. see controller in folder application/controller/Mahasiswa.php
9. edit model in folder application/models/Mahasiswa_model.php
10. 
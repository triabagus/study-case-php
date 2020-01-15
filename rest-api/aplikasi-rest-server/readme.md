## Rest Server
1. Initial configurasi file config
    - file config.php
        application->config->config.php
        update:
        $config['base_url'] = 'URL_LOCAL or URL_APK';
        $config['index_page'] = ''; // kosongkan
2. Configurasi file .htaccess
    - make .htaccess in folder apk
    - create in .htaccess and save
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ index.php/$1 [L]
3. Configurasi in github package rest serve
    - link github : https://github.com/chriskacerguis/codeigniter-restserver
    - download all 
    - extract in apk folder
    - replace application folder one by one 
    - for languange : indonesia and english ,but you make many languange is okay
    - for migration copy paste to application
    - refresh welcome template to update
    - for documentasi in folder documentasi 
4. Configurasi file autoload.php
    - folder application/config/autoload.php
    - $autoload['libraries'] = array('database'); // load libraries database
    - $autoload['helper'] = array('url'); // load helper url
5. Configurasi Database
    - folder application/config/database.php
    - update file
        'username' => 'DATABASE_USERNAME',
        'password' => 'DATABASE_PASSWORD',
        'database' => 'DATABASE_NAME',
6. Make Database
    - make name databsae same with database.php
    - copypaste code in SQL
    - with code :
        -- phpMyAdmin SQL Dump
        -- version 4.6.4
        -- https://www.phpmyadmin.net/
        --
        -- Host: localhost:3306
        -- Generation Time: Feb 04, 2019 at 01:36 PM
        -- Server version: 5.6.33
        -- PHP Version: 7.0.12

        SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
        SET time_zone = "+00:00";


        /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
        /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
        /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
        /*!40101 SET NAMES utf8mb4 */;

        --
        -- Database: `wpu_rest`
        --

        -- --------------------------------------------------------

        --
        -- Table structure for table `mahasiswa`
        --

        CREATE TABLE `mahasiswa` (
        `id` int(11) NOT NULL,
        `nrp` char(9) NOT NULL,
        `nama` varchar(250) NOT NULL,
        `email` varchar(250) DEFAULT NULL,
        `jurusan` varchar(64) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

        --
        -- Dumping data for table `mahasiswa`
        --

        INSERT INTO `mahasiswa` (`id`, `nrp`, `nama`, `email`, `jurusan`) VALUES
        (1, '043040001', 'Doddy Ferdiansyah', 'doy@gmail.com', 'Teknik Mesin'),
        (2, '023040123', 'Erik', 'erik@gmail.com', 'Teknik Industri'),
        (3, '043040321', 'Rommy Fauzi', 'rommy@gmail.com', 'Teknik Planologi'),
        (4, '033040023', 'Fajar Darmawan ', 'fajar@yahoo.com', 'Teknik Informatika'),
        (5, '113040321', 'Ferry Mulyanto', 'ferry@yahoo.com', 'Manajemen');

        --
        -- Indexes for dumped tables
        --

        --
        -- Indexes for table `mahasiswa`
        --
        ALTER TABLE `mahasiswa`
        ADD PRIMARY KEY (`id`);

        --
        -- AUTO_INCREMENT for dumped tables
        --

        --
        -- AUTO_INCREMENT for table `mahasiswa`
        --
        ALTER TABLE `mahasiswa`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
        /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
        /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
        /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
        
7. Test Rest Serve
    - If you error test. 
    - Fatal error: Class Example cannot extend from trait Restserver\Libraries\REST_Controller in /var/www/html/belajar-php/rest-api/aplikasi-rest-server/application/controllers/api/Example.php on line 22
    - You have to modify provided (and outdated until this answer's date) versions of application\libraries\REST_Controller.php and application\controllers\api\Example.php.
    - In application\libraries\REST_Controller.php
    - Add require APPPATH . 'libraries/REST_Controller_Definitions.php'; just before trait REST_Controller {
    - In application\controllers\api\Example.php
    - <?php
        use Restserver\Libraries\REST_Controller;
        defined('BASEPATH') OR exit('No direct script access allowed');

        // This can be removed if you use __autoload() in config.php OR use Modular Extensions
        /** @noinspection PhpIncludeInspection */

        //To Solve File REST_Controller not found
        require APPPATH . 'libraries/REST_Controller.php';
        require APPPATH . 'libraries/Format.php';

        /**
        * This is an example of a few basic user interaction methods you could use
        * all done with a hardcoded array
        *
        * @package         CodeIgniter
        * @subpackage      Rest Server
        * @category        Controller
        * @author          Phil Sturgeon, Chris Kacerguis
        * @license         MIT
        * @link            https://github.com/chriskacerguis/codeigniter-restserver
        */
        class Example extends CI_Controller {

            use REST_Controller {
                REST_Controller::__construct as private __resTraitConstruct;
            }

            function __construct()
            {
                // Construct the parent class
                parent::__construct();
                $this->__resTraitConstruct();

                // Configure limits on our controller methods
                // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
                $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
                $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
                $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
            }

            public function users_get()
            {
                // Users from a data store e.g. database
                $users = [
                    ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
                    ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
                    ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
                ];

                $id = $this->get('id');

                // If the id parameter doesn't exist return all the users

                if ($id === null)
                {
                    // Check if the users data store contains users (in case the database result returns NULL)
                    if ($users)
                    {
                        // Set the response and exit
                        $this->response($users, 200); // OK (200) being the HTTP response code
                    }
                    else
                    {
                        // Set the response and exit
                        $this->response([
                            'status' => false,
                            'message' => 'No users were found'
                        ], 404); // NOT_FOUND (404) being the HTTP response code
                    }
                }

                // Find and return a single record for a particular user.

                $id = (int) $id;

                // Validate the id.
                if ($id <= 0)
                {
                    // Invalid id, set the response and exit.
                    $this->response(null, 400); // BAD_REQUEST (400) being the HTTP response code
                }

                // Get the user from the array, using the id as key for retrieval.
                // Usually a model is to be used for this.

                $user = null;

                if (!empty($users))
                {
                    foreach ($users as $key => $value)
                    {
                        if (isset($value['id']) && $value['id'] === $id)
                        {
                            $user = $value;
                        }
                    }
                }

                if (!empty($user))
                {
                    $this->set_response($user, 200); // OK (200) being the HTTP response code
                }
                else
                {
                    $this->set_response([
                        'status' => false,
                        'message' => 'User could not be found'
                    ], 404); // NOT_FOUND (404) being the HTTP response code
                }
            }

            public function users_post()
            {
                // $this->some_model->update_user( ... );
                $message = [
                    'id' => 100, // Automatically generated by the model
                    'name' => $this->post('name'),
                    'email' => $this->post('email'),
                    'message' => 'Added a resource'
                ];

                $this->set_response($message, 201); // CREATED (201) being the HTTP response code
            }

            public function users_delete()
            {
                $id = (int) $this->get('id');

                // Validate the id.
                if ($id <= 0)
                {
                    // Set the response and exit
                    $this->response(null, 400); // BAD_REQUEST (400) being the HTTP response code
                }

                // $this->some_model->delete_something($id);
                $message = [
                    'id' => $id,
                    'message' => 'Deleted the resource'
                ];

                $this->set_response($message, 204); // NO_CONTENT (204) being the HTTP response code
            }

        }
    
    - So you refresh is working code
    - Link Solution : https://stackoverflow.com/questions/56824024/class-example-cannot-extend-from-trait-restserver-libraries-rest-controller
8. Test Your rest server in postman
    - copy paste url example user
    - and paste in postman
    - But this is example
9. Make Controller in folder application/controller/api
    - make file Mahasiswa.php
10. Make Model in folder application/models
    - make file Mahasiswa_model.php
11. Cek in Postman
    - cek get data : Choice GET ,and url local -> http://localhost/belajar-php/rest-api/aplikasi-rest-server/api/mahasiswa
    - cek get data sesuai id : Choice GET, and url local -> http://localhost/belajar-php/rest-api/aplikasi-rest-server/api/mahasiswa?id=1
    - cek delete data : Choice DELETE, and url local -> http://localhost/belajar-php/rest-api/aplikasi-rest-server/api/mahasiswa?id=6
    - cek post or post data : Choice POST, and url local -> http://localhost/belajar-php/rest-api/aplikasi-rest-server/api/mahasiswa
    but insert data sesuai dengan database secara urut
    - cek put or update data : Choice PUT, and url local -> 
    http://localhost/belajar-php/rest-api/aplikasi-rest-server/api/mahasiswa
    but insert id setelah data

    * Untuk menangani POST and PUT penambahan data pada Postman dibagian BODY and choice x-www-form-urlencode
12. Authentikasi REST
    - Untuk pengaturan authentikasi rest ada pada folder application/config/rest.php
    - Di file tersebut sudah lengkap dokumentasinya jadi dibaca aja. Yang kita bahas kali ini yang basic saja.
13. Penggunaan Key 
    - Penggubahan nama table key -> $config['rest_keys_table'] = 'KEY_NAME_TABLE'; -> default = keys
    - Active key -> $config['rest_enable_keys'] = false; // ganti false jadi true
    - Pada commentar Default table schema: copy and paste in database SQL, jangan lupa hapus tanda |
    - Pengubahan nama column key -> $config['rest_key_column'] = 'KEY_NAME_COLUMN'; -> default = key
    - Untuk perubahan max lenght key -> $config['rest_key_length'] = 40;
    - Dan yang penting nama key nya -> $config['rest_key_name'] = 'X-API-KEY'; 
    - error : invalid API key ,disebabkan user tidak mempunyai key 
    - Karena kita ngecek API nya di Postman maka kita akan masukkan data secara manual jadi kita harus memasukkan data sql secara manual , untuk user_id itu terserah tapi lebih baik kalau data user key yang masuk secara otomatis.
    - Untuk rest_key_name masukkan data column key agar bisa mengakses key
14. Penggunaan LIMIT key
    - Untuk mengaktifkan limit -> $config['rest_enable_limits'] = false; // ganti true
    - Pada commentar Default table schema: copy and paste in database SQL, jangan lupa hapus tanda |
    - Untuk penambahan limit kita kembali ke controller dan tambahkan pada __construct -> $this->methods['METHOD_NAME']['limit'] = [NUM_REQUESTS_PER_HOUR]; // sesuaikan method name dan limit request , untuk default request nya per jam .
    - Untuk Limit digunakan pada setiap method masing2 , jadi apabila untuk PUT sendiri dst.
    - Apabila sudah lebih dari limit akan muncul "error": "This API key has reached the time limit for this method" 
15. Authentikasi REST
    - Rest login ada pada -> $config['rest_auth'] = false; // pakai yang basic agar sederhana yaitu $config['rest_auth'] = 'basic'; , untuk penggunaan yang lain bisa dilihat pada komentar
    - Untuk basic ganti $config['auth_source'] = 'ldap'; , dan kosongin , seperti ini $config['auth_source'] = '';
    - Kemudian untuk user and password  -> $config['rest_valid_logins'] = ['admin' => '1234']; , bisa ditambahan data lagi seperti ini $config['rest_valid_logins'] = ['admin' => '1234', 'tria' => 'secret'];
    - Untuk menjalankan auth in postman , pilih Authorization , choice type basic auth. Maka anda bisa memasukkan data user dan password.
    - Muncul "error": "Unauthorized" , apabila user or password salah
16.  Rest Client -> Library Guzzle
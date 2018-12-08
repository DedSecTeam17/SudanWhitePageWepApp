<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 02/12/2018
     * Time: 05:10
     */

    class PhoneController extends Controller
    {


        public function __construct($model_name = 'Phone')
        {
            parent::__construct($model_name);
            $this->middleWare('Auth');
        }


        public function index()
        {
            $phone = new Phone();
            $phones = $phone->getAllUsers();
            return $this->view->render('phone.index', $phones);
        }


        public  function  devTool(){
            $contacts = simplexml_load_file('public/xml_data/phone.xml');

            return $this->view->render('phone.dev_tool',$contacts);
        }


        public function create()
        {

            return $this->view->render('phone.create');

        }


        public function show($id)
        {
            $phone = $this->model->find($id);


            return $this->view->render('phone.show', $phone);

        }

        public function store()
        {

            extract($_POST);


            $phone = new Phone();
            $phone->setName($this->getPostRequestData('name'));
            $phone->setPhone($this->getPostRequestData('phone'));
            $phone->setEmail($this->getPostRequestData('email'));

            $UploadedFileName = $_FILES['image']['name'];
            if ($UploadedFileName != '') {
                $upload_directory = "public/img/"; //This is the folder which you created just now
                $TargetPath = time() . $UploadedFileName;
                $up = move_uploaded_file($_FILES['image']['tmp_name'], $upload_directory . $TargetPath);
                if ($up) {
                    $phone->setImage($TargetPath);
                }
            }


            $phone->save($phone);


            return Route::redirectTo(
                Route::to('index', 'PhoneController', null, false));


//            our request

        }


        public function edit($id)
        {
            $phone = $this->model->find($id);

            return $this->view->render('phone.edit', $phone);
        }


        public function update($id)
        {
            $phone_old = $this->model->find($id);

            $phone = new Phone();
            $phone->setId($phone_old->getId());
            $phone->setName($this->getPostRequestData('name'));
            $phone->setPhone($this->getPostRequestData('phone'));
            $phone->setEmail($this->getPostRequestData('email'));
            $phone->setCreatedAt($phone_old->getCreatedAt());
            $phone->setUpdatedAt($phone_old->getUpdatedAt());

            $UploadedFileName = $_FILES['image']['name'];
            if ($UploadedFileName != '') {
                $upload_directory = "public/img/"; //This is the folder which you created just now
                $TargetPath = time() . $UploadedFileName;
                $up = move_uploaded_file($_FILES['image']['tmp_name'], $upload_directory . $TargetPath);
                if ($up) {
                    $phone->setImage($TargetPath);
                }
            }

            $this->model->update($phone);





            return Route::redirectTo(
                Route::to('index', 'PhoneController', null, false));

        }


        public function delete($id)
        {
            echo $id;
            $this->model->delete($id);

            return Route::redirectTo(
                Route::to('index', 'PhoneController', null, false));

        }

    }
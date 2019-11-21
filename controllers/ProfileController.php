<?php


class ProfileController
    extends Controller
{
    public function __construct()
    {
        Parent::__construct('Profile');
        $this->middleWare('Auth');


    }


    public function index()
    {

        $profile = new Profile();

        $data = $profile->select(['*'], null)->where([array("user_id", "=", Auth::getInstance()->user()->id)])->get();


        return $this->view->render('profile.index', [
            "profile" => empty($data) != 1 ? $data : [],
            "user_name" => Auth::getInstance()->user()->name,
            "email" => Auth::getInstance()->user()->email,

        ]);
    }

    public function create()
    {
        return $this->view->render('profile.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
        $instance = new Profile();
        $profile = $instance->find($id);



        return $this->view->render('profile.edit', [
            "id"=>$id,
            "profile" =>$profile
        ]);

    }

    public function update($id)
    {
        $profile = new Profile();


        $result = $profile->select(['id'], null)->where([array('user_id', '=', Auth::getInstance()->user()->id)])->get();


        if (!empty($result)) {

            if ($result->id > 0) {

                $this->updateProfileData($id);
            } else {

                $this->insertProfileData();
            }

        } else {
            $this->insertProfileData();

        }


        return Route::redirectTo(
            Route::to('index', 'ProfileController', null, false));


    }


    private function insertProfileData()
    {



        $profile = new Profile();
        $profile->columns['about_me'] = $this->getPostRequestData('about_me');
        $profile->columns['job'] = $this->getPostRequestData('job');
        $profile->columns['phone_number'] = $this->getPostRequestData('phone_number');
        $UploadedFileName = $_FILES['profile_image']['name'];
        if ($UploadedFileName != '') {
            echo  " found ";
            $upload_directory = "public/img/"; //This is the folder which you created just now
            $TargetPath = time() . $UploadedFileName;
            $up = move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_directory . $TargetPath);
            if ($up) {
                echo  "uploaded ";
                $profile->columns['image_url'] = $TargetPath;
            }else {
                echo  "not uploaded ";
            }
        }else {

            echo  "not found ";
        }


        $profile->columns['user_id'] = Auth::getInstance()->user()->id;
        $profile->insert();
    }


    private function updateProfileData($id)
    {
        $instance = new Profile();
        $profile = $instance->find($id);

        print_r($profile);

        $updatedProfile = new Profile();

        $updatedProfile->columns['about_me'] = $this->getPostRequestData('about_me');
        $updatedProfile->columns['job'] = $this->getPostRequestData('job');
        $updatedProfile->columns['phone_number'] = $this->getPostRequestData('phone_number');
        $UploadedFileName = $_FILES['profile_image']['name'];
        if ($UploadedFileName != '') {
            echo $profile->image_url;
            echo  " found ";
            $upload_directory = "public/img/"; //This is the folder which you created just now
            $TargetPath = time() . $UploadedFileName;
            $up = move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_directory . $TargetPath);

            if ($up) {


                unlink("public/img/".$profile->image_url);


                echo  "uploaded ";
                $updatedProfile->columns['image_url'] = $TargetPath;
            }
        }else {

            echo  "not found ";
            $updatedProfile->columns['image_url'] = $profile->image_url;

        }

        $updatedProfile->columns['id'] = $profile->id;
        $updatedProfile->columns['user_id'] = Auth::getInstance()->user()->id;

        $updatedProfile->update()->where([array('id', "=", $profile->id)])->execute();

    }


}
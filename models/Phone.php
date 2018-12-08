<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 02/12/2018
     * Time: 04:47
     */

    class Phone extends Model
    {


        private $id;
        private $name;
        private $phone;
        private $email;
        private  $image;
        private $created_at;
        private $updated_at;

        /**
         * Phone constructor.
         */
        public function __construct()
        {
            Parent::__construct();

        }

        /**
         * @return mixed
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * @param mixed $image
         */
        public function setImage($image): void
        {
            $this->image = $image;
        }

        /**
         * @return mixed
         */


        /**
         * @param mixed $image
         */


        /**
         * @return mixed
         */


        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getPhone()
        {
            return $this->phone;
        }

        /**
         * @param mixed $phone
         */
        public function setPhone($phone)
        {
            $this->phone = $phone;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getCreatedAt()
        {
            return $this->created_at;
        }

        /**
         * @param mixed $created_at
         */
        public function setCreatedAt($created_at)
        {
            $this->created_at = $created_at;
        }

        /**
         * @return mixed
         */
        public function getUpdatedAt()
        {
            return $this->updated_at;
        }

        /**
         * @param mixed $updated_at
         */
        public function setUpdatedAt($updated_at)
        {
            $this->updated_at = $updated_at;
        }


        public function getAllUsers()
        {

            $phones = $this->db->select('SELECT * FROM  phonebooks');
            $phones_list = array();
            foreach ($phones as $key => $value) {
                $phone = new Phone();
                $phone->setId($value['id']);
                $phone->setName($value['name']);
                $phone->setPhone($value['phone']);
                $phone->setEmail($value['email']);
                $phone->setCreatedAt($value['created_at']);
                $phone->setUpdatedAt($value['updated_at']);
                $phone->setImage($value['image']);





                array_push($phones_list, $phone);





            }


            return $phones_list;

        }


        public function save($model)
        {
            $this->db->insert('phonebooks', array(

                'name' => $model->getName(),
                'phone' => $model->getPhone(),
                'email' => $model->getEmail(),
                'image' => $model->getImage(),

            ));

            $find_email=$this->findByEmail($model->getEmail());
            $phonesXml = simplexml_load_file('public/xml_data/phone.xml');
            $phoneXml = $phonesXml->addChild('User');
            $phoneXml->addAttribute('id', $find_email->getId());
            $phoneXml->addChild('name', $find_email->getName());
            $phoneXml->addChild('phone', $find_email->getPhone());
            $phoneXml->addChild('email', $find_email->getEmail());
            $phoneXml->addChild('ImagePath', $find_email->getImage());
            file_put_contents('public/xml_data/phone.xml', $phonesXml->asXML());

        }


        public function delete($id)
        {
            $this->db->delete('phonebooks', "`id` = {$id} ");
//            delete it from xml file
            $users = simplexml_load_file('public/xml_data/phone.xml');
            $index = 0;
            $i = 0;
            foreach($users->User as $user){
                if($user['id']==$id){
                    $index = $i;
                    break;
                }
                $i++;
            }
            unset($users->User[$index]);
            file_put_contents('public/xml_data/phone.xml', $users->asXML());
        }

        public function  findByEmail($email){
            $phones = $this->db->select("SELECT * FROM  phonebooks where  email='$email'");
            $phones_list = array();
            foreach ($phones as $key => $value) {
                $phone = new Phone();
                $phone->setId($value['id']);
                $phone->setName($value['name']);
                $phone->setPhone($value['phone']);
                $phone->setEmail($value['email']);
                $phone->setCreatedAt($value['created_at']);
                $phone->setUpdatedAt($value['updated_at']);
                $phone->setImage($value['image']);

                array_push($phones_list, $phone);
            }


            return $phones_list[0];
        }

        public function find($id)
        {

            $phones = $this->db->select("SELECT * FROM  phonebooks where  id='$id'");
            $phones_list = array();
            foreach ($phones as $key => $value) {
                $phone = new Phone();
                $phone->setId($value['id']);
                $phone->setName($value['name']);
                $phone->setPhone($value['phone']);
                $phone->setEmail($value['email']);
                $phone->setCreatedAt($value['created_at']);
                $phone->setUpdatedAt($value['updated_at']);
                $phone->setImage($value['image']);

                array_push($phones_list, $phone);
            }


            return $phones_list[0];
        }

        public function update(Phone $phone)
        {
            $phoneData = array(
                'id' => $phone->getId(),
                 'name' => $phone->getName(),
                'phone' => $phone->getPhone(),
                'email' => $phone->getEmail(),
                'created_at' => $phone->getCreatedAt(),
                'updated_at' => $phone->getUpdatedAt(),
                'image'=>$phone->getImage()
            );

            $this->db->update('phonebooks', $phoneData,
                "`id` = '{$phone->getId()}'");


            $users = simplexml_load_file('public/xml_data/phone.xml');

            foreach($users->User as $user){
                if($user['id']==$phone->getId()){
                    $user->name = $phone->getName();
                    $user->phone = $phone->getPhone();
                    $user->email = $phone->getEmail();
                    $user->ImagePath = $phone->getImage();
                    break;
                }
            }
            file_put_contents('public/xml_data/phone.xml', $users->asXML());


        }




    }
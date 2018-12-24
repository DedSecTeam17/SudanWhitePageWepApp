<?php
    /**
     * Created by PhpStorm.
     * User: Mohammed Elamin
     * Date: 16/12/2018
     * Time: 10:31
     */

    class Validation
    {
        private  $isValid;
        private  $message;

        /**
         * @return mixed
         */
        public function getisValid()
        {
            return $this->isValid;
        }

        /**
         * @param mixed $isValid
         */
        public function setIsValid($isValid): void
        {
            $this->isValid = $isValid;
        }

        /**
         * @return mixed
         */
        public function getMessage()
        {
            return $this->message;
        }

        /**
         * @param mixed $message
         */
        public function setMessage($message): void
        {
            $this->message = $message;
        }





    }
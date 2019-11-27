<?php



class  Message{


    public static  function  AlertDanger($data){
    echo  ' <div class="row ">
                    <div class="col-md-12 ">
                        <div class="alert alert-danger">'.
        $data.'
                        </div>
                     </div>
               </div> ';
}


    public static  function  AlertInfo($data){
        echo  ' <div class="raw m-3">
                    <div class="col-md-8 offset-2">
                        <div class="alert alert-info">'.
            $data.'
                        </div>
                     </div>
               </div> ';
    }

}




?>
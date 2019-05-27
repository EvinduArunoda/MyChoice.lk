<?php
    $var = $_GET['key'];

    interface ISearch{
        public function Search();
    }

    class SearchItem implements ISearch{
        public function Search(){
            header ("Location: ./SearchByItemInterface.php");
        }
    }

    class SearchSeller implements ISearch{
        public function Search(){
            header ("Location: ./SearchBySellerInterface.php");
        }
    }

    class Stratergy{
        private $name;
        private $stratergy = NULL;

        function _construct($name){
            $this->name = $name;
        }

        function Search($var){
            if($var == '1'){
                $stratergy = new SearchItem();
                $stratergy->Search();
            }
             if($var == '2'){
                $stratergy = new SearchSeller();
                $stratergy->Search();
            }
        }
    }

    $Algorithm = new Stratergy('stratergy');
    $Algorithm->Search($var);


?>
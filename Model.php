<?php
    abstract class Model{

        static $fileName;


        public static function className() : String{
            return ucfirst(get_called_class());
        }


        public function __construct(Array $arr)
        {
            foreach($arr as $key => $value){
                $this->$key = $value;
            }
        }


        public static function create(Array $data){
            static::$fileName = strtolower(get_called_class()) . '.txt';
            if(!file_exists(static::$fileName)){
                static::$fileName = strtolower(get_called_class()) . '.txt';
                $file = fopen(static::$fileName, 'w+');
                file_put_contents(static::$fileName, json_encode([]));
            }

            $items = json_decode(file_get_contents(static::$fileName));
            $beingHere = false;
            $className = static::className();
            $data = new 
            $className($data);

            if($items){
                foreach($items  as $key => $item){
                    if($item->id == $data->id){
                        $beingHere = true;
                        $items[$key] = $data;
                    }
                }
            }
            if($beingHere == false){
                $items[] = (object) $data;
            }

            file_put_contents(static::$fileName, json_encode($items));
        }

        public function save($data = null){
            if($data == null){
                static::create((array) $this);
            }else{
                static::create($data);
            }
        } 


        public static function all(){
            static::$fileName = strtolower(get_called_class()) . '.txt';
            if(!file_exists(static::$fileName)){
                static::$fileName = strtolower(get_called_class()) . '.txt';
                $file = fopen(static::$fileName, 'w+');
                file_put_contents(static::$fileName, json_encode([]));
            }

            $items = json_decode(file_get_contents(static::$fileName));

            $className = static::className();

            foreach($items as $item){
                $data[] = new $className((array) $item);
            }
            return $data;
        }
    }
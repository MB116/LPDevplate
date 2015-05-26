<?
/**
 * @package SimleXmlEx
 * @author Denis Khainazarov (iden) denis-0.0@ya.ru
 * @copyright WhiteVectorStudio 2013
 * @version 2 alpha
 * @since 1.0 camelCase syntax, toArray(experimental) arrayClear(experimental)
 */
class SimpleXmlExpertsender extends SimpleXMLElement{
    /**
     * Получение атрибута
     * @method getAttr
     * @param string имя
     * @param string [значение]
     * @return Object|false
     */
    public function getAttr($attr,$value=false){
        if($value){
            foreach($this->attributes() as $e_attr => $e_value){
                if($e_attr==$attr&&$e_value==$value){
                    return $e_value;
                }
            }
        }else{
            foreach($this->attributes() as $e_attr => $e_value){
                if($e_attr==$attr){
                    return $e_value;
                }
            }
        }
        return false;
    }
    /**
     * Удаление атрибута
     * @method delAttr
     * @param string имя
     * @param string [значение]
     * @return false
     */
    public function delAttr($attr,$value=false){
        $dom = dom_import_simplexml($this);
        if($value){
            if($this->getAttr($attr,$value)){
                $dom->removeAttribute($attr);
            }
        }else{
            if($this->getAttr($attr)){
                $dom->removeAttribute($attr);
            }
        }
    }
    /**
     * #Добавление/изменение атрибута
     * @method addAttr
     * @param string имя
     * @param string [значение]
     * @return false
     */
    public function addAttr($attr,$value=false){
        $dom = dom_import_simplexml($this);
        if($value){
            if($this->getAttr($attr)){
                $dom->removeAttribute($attr);
            }
            $dom->setAttribute($attr,$value);
        }else{
            if($this->getAttr($attr)){
                $dom->removeAttribute($attr);
            }
            $dom->setAttribute($attr,'');
        }
    }
    /**
     * Проверка атрибута на наличие потомков
     * @method isLeaf
     * @return true|false
     */
    public function isLeaf(){
        return !$this->children()?true:false;
    }
    /**
     * Удаление элемента
     * @method delNode
     * @return false
     */
    public function delNode(){
        $dom = dom_import_simplexml($this);
        $dom->parentNode->removeChild($dom);
    }
    /**
     * Приведение 2-х мерного массива к 1 мерному
     * @method arrayRepack
     * @param  array array(array(),array()...array())
     * @return array
     */
    private function arrayRepack($array){
        $ret = false;
        foreach($array as $elm){
            if(is_array($elm)){
                foreach($elm as $elm2){
                    $ret[]=$elm2;
                }
            }
            else{
                $ret[]=$elm;
            }
        }
        return $ret;
    }
    /**
     * Поиск элементов среди потомков по имени
     * @method childsByName
     * @param string имя
     * @return array|false
     */
    public function childByName($name){
        $rez = false;
        if(!$this->isLeaf()){
            foreach($this->children() as $key => $child ){
                if($child->getName()==$name){
                    $rez[]=$child;
                }
            }
        }
        return $rez;
    }
    /**
     * Поиск элементов среди потомков по имени рекурсивный
     * @method childsByName
     * @param string имя
     * @return array
     */
    public function childsByName($name){
        $rez = false;
        $ret = false;
        if(!$this->isLeaf()){
            foreach($this->children() as $key => $child ){
                $rez[] = $child->childsByName($name);
            }
            foreach($rez as $key => $elm){
                if(!$elm){unset($rez[$key]);}
            }
        }
        if($this->getName()==$name){
            $rez[]=$this;
        }
        if($rez){
            $ret = $this->arrayRepack($rez);
            return $ret;
        }
    }
    /**
     * Поиск элементов среди потомков по имени
     * @method childByName
     * @param string имя
     * @return array|false
     */
    public function childByAttr($attr,$val=false){
        $rez = false;
        if($val){
            if(!$this->isLeaf()){
                foreach($this->children() as $key => $child ){
                    if($child->getAttr($attr,$val)){
                        $rez[]=$child;
                    }
                }
            }
        }else{
            if(!$this->isLeaf()){
                foreach($this->children() as $key => $child ){
                    if($child->getAttr($attr)){
                        $rez[]=$child;
                    }
                }
            }
        }
        return $rez;
    }
    /**
     * Поиск элементов по атрибутам рекурсивный
     * @method childsByAttr
     * @param string имя
     * @param string значение
     * @return array
     */
    public function childsByAttr($attr,$val=false){
        $rez = false;
        $ret = false;
        if(!$this->isLeaf()){
            foreach($this->children() as $key => $child ){
                $rez[] = $child->childsByAttr($attr,$val);
            }
            if(is_array($rez))#новая прaвка
                foreach($rez as $key => $elm){
                    if(!$elm){unset($rez[$key]);}
                }
        }
        if($val){
            if($this->getAttr($attr,$val)){
                $rez[]=$this;
            }
        }else{
            if($this->getAttr($attr)){
                $rez[]=$this;
            }
        }
        if($rez){
            $ret = $this->arrayRepack($rez);
            return $ret;
        }
    }
    /**
     * Удаление элементов по имени
     * @method delChildByName
     * @param string имя
     * @return false
     */
    public function delChildByName($name){
        $childs = $this->childByName($name);
        foreach($childs as $child){
            $child->delNode();
        }
    }
    /**
     * Удаление элементов по имени рекурсивный
     * @method delChildsByName
     * @param string имя
     * @return false
     */
    public function delChildsByName($name){
        $childs = $this->childsByName($name);
        foreach($childs as $child){
            $child->delNode();
        }
    }
    /**
     * Удаление элементов по атрибутам
     * @method delChildByAttr
     * @param string имя
     * @return false
     */
    public function delChildByAttr($attr,$value=false){
        $childs = $this->childByAttr($attr,$value);
        foreach($childs as $child){
            $child->delNode();
        }
    }
    /**
     * @method getMax Получение максимального значения атрибута
     * @param string имя атрибута
     */
    public function getMax($attr){
        $childs = $this->childByAttr($attr);
        $max = false;
        if(is_array($childs))
            foreach($childs as $child){
                if((int)$child->getAttr($attr)>$max)
                    $max=(int)$child->getAttr($attr);
            }
        return $max;
    }
    /**
     * @method getMin Получение минимального значения атрибута
     * @param string имя атрибута
     */
    public function getMin($attr){
        $childs = $this->childByAttr($attr);
        $min=false;
        if(is_array($childs)){
            $min = $this->getMax($attr);
            foreach($childs as $child){
                if((int)$child->getAttr($attr)<$min)
                    $min=(int)$child->getAttr($attr);
            }
        }
        return $min;
    }
    /**
     * Удаление элементов по атрибутам рекурсивно
     * @method delChildsByAttr
     * @param string имя
     * @return false
     */
    public function delChildsByAttr($attr,$value=false){
        $childs = $this->childsByAttr($attr,$value);
        foreach($childs as $child){
            $child->delNode();
        }
    }
    /**
     * Очистка массивов от лишних вложенных массивов
     * @method clearArray
     * @param array $array массив
     * @return mixed
     */
    private function clearArray($array){
        $newArray = false;
        if(is_array($array)){
            foreach ($array as $key =>$elem){
                if(is_array($elem)&&(count($elem)==1)){
                    $newArray[$key] = array_shift($elem);
                }elseif(is_array($elem)){
                    $newArray[$key] = $this->clearArray($elem);
                }else{
                    $newArray[$key]=$elem;
                }
            }
        }
        if(count($newArray)==1){
            $newArray=array_shift($newArray);
        }
        return $newArray;
    }
    /**
     * Конвертирование в массив
     * @method asArray
     * @param string $elem tagNode
     * @param string $name tagName
     */
    public function asArray($elem=false,$name=false){
        $array = array();
        if(!is_a($elem, 'SipleXmlEx')) $elem = $this;
        if(!$name)
            $name = (string)$elem->getName();
        if(count((array)$elem->attributes())){
            $attr = (array)$elem->attributes();
            $array[$name]['attr']=array_shift($attr);
        }
        if(count((array)$elem->children())){
            foreach($elem->children() as $child){
                $array['childs'][$child->getName()][]=$child->asArray($child,$child->getName());
            }
        }else{
            return (string)$elem;
        }
        foreach($array as $keys=> $child){
            if(count($array[$keys])==1){
                $array[$keys]=array_shift($array[$keys]);
            }
        }
        $array=$this->clearArray($array);
        return $array;
    }
}
?>
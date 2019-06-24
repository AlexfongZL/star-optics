<?php    
    function setUniqID($brand,$type){
        $formatted_brand = substr(str_replace("-","",$brand),0,3);
        //$product_type = $type;

        if($type == 'LENSE'){
            $product_type = 'LENS';
        }
        else if($type == 'SPECTACLE'){
            $product_type = 'SPEC';
        }
        else if($type == 'SUNGLASS'){
            $product_type = 'SUNG';
        }
        else if($type == 'CONTACT LENSE'){
            $product_type = 'CONL';
        }
        else{
            $product_type = 'MISC';
        }

        $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
        
        $date2 = $date->format('ymdHis');
        $milliseconds = round(microtime(true)*1000);
        $final_id = $formatted_brand.$date2.$milliseconds.$product_type;
        return $final_id;
    }

    function setUniqID_customer(){

        $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
        
        $date2 = $date->format('ymdHis');
        $milliseconds = round(microtime(true)*1000);
        $final_id = "CUS".$date2.$milliseconds;
        return $final_id;
    }

    function setUniqID_anon_customer(){

        $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
        
        $date2 = $date->format('ymdHis');
        $milliseconds = round(microtime(true)*1000);
        $final_id = "ANON".$date2.$milliseconds;
        return $final_id;
    }

    function setUniqID_supplier($tag){
        //$formatted_brand = substr(str_replace("-","",$brand),0,3);
        
        $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
        
        $date2 = $date->format('ymdHis');
        $milliseconds = round(microtime(true)*1000);
        $final_id = "SUPP".$date2.$milliseconds;
        return $final_id;
    }

    function setID(){
    	
        $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
        $date2 = $date->format('ymdHis');
        $milliseconds = round(microtime(true)*1000);
        $final_id = $date2.$milliseconds;
        return $final_id;
    }

    function datetime(){
        $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
        //$final_id = $date->format('ymdHis');
        $date2 = $date->format('ymdHis');
        $milliseconds = round(microtime(true)*1000);
        $final_id = $date2.$milliseconds;
        return $final_id;
    }

    function setDate(){
        $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
        //$final_id = $date->format('ymdHis');
        $date2 = $date->format('ymd');
        //$milliseconds = round(microtime(true)*1000);
        //$final_id = $date2.$milliseconds;
        $final_id = $date2;
        return $final_id;
    }

    function setTime(){
        $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
        //$final_id = $date->format('ymdHis');
        $date2 = $date->format('His');
        $final_id = $date2;
        return $final_id;
    }
?>
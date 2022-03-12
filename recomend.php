<?php
    function distance($matrix,$person1,$person2){
        $similar = array() ;
        $sum = 0 ;
        foreach($matrix[$person1] as $key=>$value){
            if(array_key_exists($key,$matrix[$person2])){
                $similar[$key]=1;
            }
        }
        if($similar==0){
            return 0 ;
        }
        foreach($matrix[$person1] as $key=>$value){
            if(array_key_exists($key,$matrix[$person2])){
                $sum=$sum+pow($value-$matrix[$person2][$key],2);
            }
        }
        return 1/(1+sqrt($sum));
    }
    Function getRecommendation ($matrix,$person1) { 
        $total= array();
        $simsums= array();
        $ranks= array();
        foreach ($matrix as $person2=>$value){ 
           if($person2!=$person1){ 
             $sim=distance($matrix,$person1,$person2); 
             foreach($matrix[$person2] as $key=>$value){ 
                if(!array_key_exists($key,$matrix[$person1])){ 
                    if(!array_key_exists($key,$total)){ 
                        $total[$key]=0; 
                    }
                    $total[$key] +=$matrix[$person2][$key]*$sim; 
                    if(!array_key_exists($key,$simsums)){
                        $simsums[$key]=0;
                    }
                    $simsums[$key] += $sim; 
                    }
                }
            }
        }
        foreach($total as $key=>$value){ 
            $ranks[$key]=$value/$simsums[$key]; 
        }
        array_multisort($ranks,SORT_DESC); 
        return $ranks; 
    }

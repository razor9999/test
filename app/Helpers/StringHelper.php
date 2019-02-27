<?php
/**
 * Created by PhpStorm.
 * User: vunguyen
 * Date: 2019-02-27
 * Time: 18:19
 */

namespace App\Helpers;


class StringHelper
{

    public static function  mostUsedWords($paragraph, $nWord){
        if(empty($paragraph)){
            return null;
        }
        $paragraphArray = explode(" ", $paragraph);

        $result = [];

        foreach ($paragraphArray as $word){
            // push to list if not exit
            if(empty($result[$word])){
                $result[$word] =1;
            }else{
                $result[$word]++;

            }
        }

        $formatResult = [];
        foreach ($result as $key => $value){
            $formatResult[] = [
              'word'  =>  $key,
                'nWord' => $value
            ];
        }

        usort($formatResult, function($a, $b) {
            return $a['nWord'] < $b['nWord'];
        });


        $result = [];
        for ($i=0; $i<$nWord; $i++){
            $arr = (array_pop($formatResult));
            $result[]  = $arr['word'];
        }

        return $result;

    }

}
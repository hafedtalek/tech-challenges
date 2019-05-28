<?php

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected data;
    public function __construct()
    {

        foreach(scandir("/data") as $dataFile){
            $strJsonFileContents = file_get_contents($dataFile);

            $this->data[] = json_decode($strJsonFileContents, true);
        }
        
    }

    public static function getAll() {
        return array_keys($this->data, "survey");
    }

    public static function where(Array $conditions) {
        return collect($this->data)->filter(function ($item) use ($conditions) {
                                    foreach ($item->question as $question) {
                                        foreach ($conditions as $key => $value) {
                                            if (strpos($question->option, $value) !== FALSE) {
                                                return false;
                                            }
                                        }
                                    }
                                        return true;
                                    });
    }

    
}

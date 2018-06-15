<?php
function sortHand()
    {
        for($i=0; $i<$this->hand_num; $i++){
            for($j=0; $j<$this->hand_num-1; $j++){
                if($this->hand[$j]->card_num > $this->hand[$j+1]->card_num){
                    $min = $this->hand[$j+1];
                    $this->hand[$j+1] = $this->hand[$j];
                    $this->hand[$j] = $min;
                }
                if($this->opponent[$j]->card_num > $this->opponent[$j+1]->card_num){
                    $min = $this->opponent[$j+1];
                    $this->opponent[$j+1] = $this->opponent[$j];
                    $this->opponent[$j] = $min;
                }
            }
        }
    }
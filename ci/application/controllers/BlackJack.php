<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlackJack extends CI_Controller {

  private $deck_array   = array();
  private $player_hands = array();
  private $dealer_hands = array();
  private $hoge;

  function __construct(){
    parent::__construct();
  }

  public function index(){
    $this->load->view("blackJack_VTop");
  }

  //関数の受け渡しとフロー管理
  public function main() {
    $first_distribute = 2;

    session_start();
    $this->deck_array = $this->deckInitialize();
    //++++++++++++++++++++++++++++++++++++
    echo 'シャッフルされたデッキの一番目の値渡しの確認';
    echo "<pre>";
    print_r($this->deck_array[0]);
    echo "</pre>";
    //++++++++++++++++++++++++++++++++++++
    for($i = 0; $i < $first_distribute; $i++)
    {
      $this->player_hands[] = array_shift($this->deck_array);
      $this->dealer_hands[] = array_shift($this->deck_array);
    }

    //データ渡し
    $_SESSION["deck_array"]   = serialize($this->deck_array);
    $_SESSION["player_hands"] = serialize($this->player_hands);
    $_SESSION["dealer_hands"] = serialize($this->dealer_hands);

    $data['deck_array']   = $this->deck_array;
    $data['player_hands'] = $this->player_hands;
    $data['dealer_hands'] = $this->dealer_hands;

    //++++++++++++++++++++++++++++++++++++
    echo 'プレイヤーにカードを渡した後のデッキの一番目';
    if(empty($this->deck_array)){
      echo '空';
    }
    else {
      echo "<pre>";
      print_r($this->deck_array[0]);
      echo "</pre>";
    }
    //+++++++++++++++++++++++++++++++++++++

    $this->load->view('blackJack_VMain', $data);
  }

  //トランプの配列を用意
  public function deckInitialize() {
    $mark_array = array('♥','♦','♠','♣');
    $mark_of_cards = 13;

    foreach ($mark_array as $mark_array) {
      for( $i = 1; $i <= $mark_of_cards; $i++ ){
        $this->deck_array[] = array(
          'mark'=> $mark_array,
          'number'=> $i
        );
      }
    }

    //++++++++++++++++++++++++++++++++++++
    echo 'デッキの一番目（♥ーA）の確認';
    echo "<pre>";
    print_r($this->deck_array[0]);
    echo "</pre>";
    //++++++++++++++++++++++++++++++++++++

    shuffle($this->deck_array);
    return $this->deck_array;
  }

  //プレイヤーのドロー
  public function drawCards(){
    //セッションからデータ取得
    session_start();
    $deck_array = $_SESSION["deck_array"];
    $deck_array = unserialize($deck_array);

    //++++++++++++++++++++++++++++++++++++
    if(empty($deck_array)){
      echo '空';
    }
    else {
      echo "<pre>";
      print_r($deck_array[0]);
      echo "</pre>";
    }
    //++++++++++++++++++++++++++++++++++++

    $this->player_hands[] = array_shift($deck_array);

    //++++++++++++++++++++++++++++++++++++
    print_r($this->player_hands[0]);
    //++++++++++++++++++++++++++++++++++++

    $this->load->view("welcome_message");
  }
//ディーラーのドロー（17以上になるまで引き続ける）
  public function dealerDrawCards(){
  }

//判定処理\\
//バースト判定（22以上）
//プレイヤーとディーラーの手札比較
  public function judgeGame(){

  }

}

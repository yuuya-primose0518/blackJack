<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="utf-8">
	<title>CodeIgniterBlackJack</title>
</head>
<body>
<div>
    <h1>ブラックジャック</h1>

    <td>
    <pre>
    <?php echo 'あなたの手札';?>
    <?php print_r($player_hands);?>
    </pre>
    <br>
    <pre>
    <?php echo 'ディーラーの手札';?>
    <?php print_r($dealer_hands);?>
    </pre>
    <br>


    <form method="post" action="http://localhost/ci/index.php/blackJack/drawCards/">
      <input type="submit" value="もう一枚引く">
    </form>

    <form method="post" action="http://localhost/ci/index.php/blackJack/judgeGame/">
      <input type="submit" value="勝負!!">
    </form>
</div>
</body>
</html>

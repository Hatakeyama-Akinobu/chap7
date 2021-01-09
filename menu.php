<a href="product.php">商品</a>
<a href="favorite-show.php">お気に入り</a>
<a href="history.php">購入履歴</a>
<a href="cart-show.php">カート</a>
<a href="purchase-input.php">購入</a>
<?php if( ! isset($_SESSION['customer']['name'])){ ?>
<i class="fas fa-sign-in-alt"></i><a href="login-input.php">ログイン</a>
<?php }else{ 
  echo 'ようこそ、', $_SESSION['customer']['name'], 'さん。';?><i class="fas fa-sign-in-alt"></i>
<?php } ?>
<i class="fas fa-sign-out-alt"></i><a href="logout-input.php">ログアウト</a>
<a href="customer-input.php">会員登録</a>
<hr>
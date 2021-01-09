<?php if(empty($_REQUEST)){
	exit("直接開かないで下さい");
}?>
<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$purchase_id=1;
foreach ($pdo->query('select max(id) from purchase') as $row) { //max(id)は、PHPでMySQLの最大値idを取得する。
	$purchase_id=$row['max(id)']+1; //既存の購入履歴の最後の商品の次に新規購入商品を追加する。
}
$sql=$pdo->prepare('insert into purchase values(?,?)'); //?は前から順に購入番号、顧客番号。
if ($sql->execute([$purchase_id, $_SESSION['customer']['id']])) {
	foreach ($_SESSION['product'] as $product_id=>$product) {
		$sql=$pdo->prepare('insert into purchase_detail values(?,?,?)'); //?は前から順に購入番号、商品番号、個数。
		$sql->execute([$purchase_id, $product_id, $product['count']]);
	}
	unset($_SESSION['product']);
	echo '購入手続きが完了しました。ありがとうございます。';
} else {
	echo '購入手続き中にエラーが発生しました。申し訳ございません。';
}
?>
<?php require '../footer.php'; ?>
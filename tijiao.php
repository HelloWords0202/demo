<?php 
	function fn() {
		$dianying = isset($_POST['dianying'])?$_POST['dianying']:'';
		$actor1 = isset($_POST['actor1'])?$_POST['actor1']:'';
		$actor2 = isset($_POST['actor2'])?$_POST['actor2']:'';
		$director = isset($_POST['director'])?$_POST['director']:'';
		$company = isset($_POST['company'])?$_POST['company']:'';
		// $music = isset($_FILES['music']) && ($_FILES]['music']['error']) === 0;
		$flag = true;
		if($dianying ===''){
			$flag = false;
			$error[] = 'dianying';
			echo '电影栏未填写'."\n";

		}
		if($actor1 ===''){
			$flag = false;
			$error[] = 'actor1';
			echo '男猪脚未填写'."\n";
		}
		if($actor2 ===''){
			$flag = false;
			$error[] = 'actor2';
			echo '配脚未填写'."\n";
		}
		if($director ===''){
			$flag = false;
			$error[] = 'director';
			echo '导演未填写'."\n";
		}
		if($company ===''){
			$flag = false;
			$error[] = 'company';
			echo '制片方未填写'."\n";
		}

		if($_FILES['music']['error'] !== 0) {
			$flag = false;
			$error['music'] = '没传music';
			echo '音乐未上传';	
		}else{
			$types = array('audio/mp3','image/png');
			if( !in_array($_FILES['music']['type'],$types)) {
					$flag = false;
				$error['music'] = '上传music类型不对';
					echo "上传文件类型不正确";
			}
		}
print_r($error);
		if(!$flag) {
			return $error;
		}
			
	}


	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$error[] = fn();
	}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<body>
	<div class="container">
		<h1 class=" display-3 py-3">上传电影信息</h1>
		<hr>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="dianying">电影</label>
				<input class="form-control <?php echo in_array('dianying',$error)?'is-invalid':''; ?>" id="dianying" name="dianying" type="text">
				<small class="invalid-feedback">这是电影名字</small>
			</div>
			<div class="form-group">
				<label for="actor1">男猪脚</label>
				<input class="form-control <?php echo in_array('actor1',$error)?'is-invalid':''; ?>" id="actor1" name="actor1" type="text">
				<small class="invalid-feedback">这是男猪脚</small>
			</div>
			<div class="form-group">
				<label for="actor2">配脚</label>
				<input class="form-control <?php echo in_array('actor2',$error)?'is-invalid':''; ?>" id="actor2" name="actor2" type="text">
				<small class="invalid-feedback">这是配脚</small>
			</div>
			<div class="form-group">
				<label for="director">导演</label>
				<input class="form-control <?php echo in_array('director',$error)?'is-invalid':''; ?>" id="director" name="director" type="text">
				<small class="invalid-feedback">这是导演</small>
			</div>
			<div class="form-group">
				<label for="company">制片公司</label>
				<input class="form-control <?php echo in_array('company',$error)?'is-invalid':''; ?>" id="company" name="company" type="text">
				<small class="invalid-feedback">这是制片公司</small>

			</div>
			<div class="form-group">
				<label for="music">原声未填写</label>
				<input class="form-control <?php echo array_key_exists('music',$error)?'is-invalid':''; ?>" id="music" name="music" type="file">
				<small class="invalid-feedback">这是电影原声</small>
			</div>
			<input type="submit" class="btn btn-primary btn-block">
		</form>

	</div>
</body>
</html>
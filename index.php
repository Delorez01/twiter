<!--
ЗАДАЧА: Вывести три поста (автор и текст поста) из своей таблицы twitter.
ЧТО НУЖНО СДЕЛАТЬ:
1. Подключится к своей Базе данных.
2. Сделать запрос к таблице twitter.
3. Вывести три поста.

Внизу читай комментарии, где что выводить.

Если закончил, сделай добавление нового твита.

-->
<?php
	$connect = mysqli_connect("localhost", "root", "", "emir");

	$select = "SELECT *  FROM twitter";

	$results = mysqli_query($connect, $select);

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
	<style type="text/css">
		.sure {
			display: none;
			position: absolute;
			top: 50px;
			background: lightgrey;
			height: 200px;
			width: 400px;
		}

		.edit{
			position: absolute; 
			background:lightgrey; 
			height: 300px; 
			width: 400px; 
			top: 50px;
			display: none;
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-light">
	<!-- ШАПКА -->
	<div class="header border-bottom pb-2">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-4 col-xl-5">
					<div class="row">
						<div class="col-4">
							<img src="img/icons8-home-50.png" class="w-25">
							<a href="">Домой</a>
						</div>
						<div class="col-4 px-0">
							<img src="img/icons8-notification-50.png" class="w-25">
							<a href="">Уведомления</a>
						</div>
						<div class="col-4">
							<img src="img/icons8-new-post-50.png" class="w-25">
							<a href="">Сообщения</a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 col-xl-3">
					<img class="w-25" src="img/icons8-twitter-50.png" >
				</div>
				<div class="col-sm-12 col-md-4 col-xl-4">
					<input type="text" name="text">
					<a href=""><img src="img/avatar.jpg" class="rounded-circle"></a>
					<button type="button" class="btn btn-primary">Твитнуть</button>					
				</div>
			</div>
		</div>
	</div>
	<!-- ДИВ С КОНТЕНТОМ -->						
	<div class="main mt-3">
		<div class="container">
			<div class="row">
				<!-- левая колонка --> <!-- ПРОФИЛЬ-->
				<div class="col-sm-12 col-md-4 col-xl-3">
					<!-- Описание профиля -->
					<div class=" bg-white">
						<!--фон-->
						<a href=""><img src="img/background.jpg" class="img-fluid"></a>
						<!--карточка-->
						<div class="row">
							<div class="col-4">
								<a href=""><img src="img/avatar.jpg" class="rounded-circle"></a>
							</div>
							<div class="col-8">
								<div>
									<a href="">Mary Smith</a>
								</div>
								<div>
									<a href="">@MarySmith</a>
								</div>
							</div>
						</div>
						<!--Статистика-->
						<div class="row pt-1 pb-1 pr-1 pl-1">
							<div class="col-6">
								<a href="">
									<b>Твиты</b><br>276
								</a>
							</div>

							<div class="col-6">
								<a href="">
									<b>Читаемые</b><br> 106
								</a>
							</div>										
						</div>	
					</div>

					<!-- Актуальные темы для вас-->
					<div class="bg-white mt-4 pt-3 pb-3 pl-3 pr-3" >
						<div class="">
							<h6>Актуальные темы для вас</h6>
						</div>

						<div>
							<a href="">#inktober</a>
						</div>
						<div>
							<a href="">#movies</a>
						</div>
						
					</div>
				</div>

				<!-- Средняя колонка: Лента твитов: добавить, твиты -->
				<div class="col-sm-12 col-md-8 col-xl-6" style="">
					<div class="pt-2 bg-white">
						<div class="row">
							<div class="col-2">
								<img src="<?php echo $stroka2["avatar"] ?>" class="rounded-circle w-100">
							</div>
							<div class="col-10">
								<!-- 
									
									ЗДЕСЬ СОЗДАЕШЬ ФОРМУ С ИНПУТАМИ И КНОПКОЙ "Твитнуть"

								-->
								<form action="insert.php" method="GET">
									<h1>Добавить новый пост</h1>
									<input type="text" name="name" class="col-6" placeholder="Имя автора">
									<input type="text" name="text" class="col-6" placeholder="Текст поста">
									<h3>Выберите аватар</h3>
									<input type="file" name="avatar">
									<h3>Выберите картинку</h3>
									<input type="file" name="image">
									<button type="submit" class="btn btn-info">Твитнуть</button>
								</form>

							</div>
						</div>
						
						<?php 

							if ($results) {
								foreach($results as $post){

						?>


						<!-- новый пост -->
						<hr>
                        <div class="row mt-4">
                            <div class="col-2">
                                <img src="<?php echo $post['avatar'];?>" width="100" class="rounded-circle">
                            </div>
                            <div class="col-xl-10 p-4">
                                    <h5>
                                    	<?php 
                                    		echo $post['id'];
                                    	?>
                                    </h5>
                                    <h5> 
                                        <?php 
                                            echo $post['name'] 
                                        ?>
                                    </h5>
                                    <p> 
                                        <?php 
                                            echo $post['text'] 
                                        ?>
                                    </p>
                                    <div>
                                        <img src="<?php echo $post['image'];?>" class="w-100">
                                    </div>
                                
									<form action="delete.php" method="GET">
										<input type="hidden" name="id" value="<?php echo $post['id'] ?>">


										<div class="d-flex">
											<div onclick="proverka()" class="btn">
												Удалить
											</div>
										
											
										</div>
										



										<div class="sure">
											<h5>Вы уверены что хотите удалить пост?</h5>
											<button style="position: absolute; top: 70px; left: 150px;" type="submit">Удалить</button>
										</div>



										

										


										
									</form>
										<div onclick="redak()" class="btn">
											Редактировать
										</div>

										<form action="edit.php" method="GET">
											<div class="edit">
												<input type="hidden" name="id" value="<?php echo $post['id'] ?>">
												<h6>Напишите имя авторa</h6>
												<input type="text" name="name">
												<h6>Напишите текст поста</h6>
												<input type="text" name="text">
												<h6>Выберите аватар</h6>
												<input type="file" name="ava">
												<h6>Выберите картинку</h6>
												<input type="file" name="img">
												<button style="margin-top: 20px;" type="submit">Редактировать</button>
											</div>
										</form>

										
									</div>
                            </div>
                        </div> 
                        <hr>

						
						<?php 
								}
							}
						?>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		let edit = document.querySelector(".edit")
		let sure = document.querySelector('.sure')
		function proverka() {
			sure.style.display = "block";
		}
		function redak() {
			edit.style.display = "block"
		}

	</script>
</body>
</html>
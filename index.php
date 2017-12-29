<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Сокращалка ссылок</title>
		<script src="../../assets/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="../../assets/css/style.css">
	</head>
	<body>
		<h1>Сокращалка ссылок</h1>
		<input id="link" type="url" onkeydown="if(event.keyCode == 13) createLink()" />
		<button class="button" onclick="createLink()">СОЗДАТЬ</button>
		<table class="table_dark" style="display:none">
			<thead>
				<tr>
					<th>Исходная</th>
					<th>Короткая</th>
					<th>Переходов</th>
					<th>Дата создания</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</body>
	<script>
		function createLink() {
			var link = $("#link").val();
			if(!link.trim()) {
				alert('Введите ссылку');
				return;
			}
			$.ajax({
				url: "../ajax/createLink.php",
				type: "POST",
				data: {
					link: link
				},
				success: function(data) {
					console.log(data);
					var json = $.parseJSON(data);
					if(json.status == true) {
						$("#link").val("");
						addTable('<tr><td><a href="' + link + '" target="_blank">' + link + '</a></td><td><a href="' + json.link + '" target="_blank">' + json.link + '</a></td><td>0</td><td>' + json.created + '</td></tr>');
					}
					else alert(json.code)
				}
			});
		}
		function addTable(data) {
			if($('.table_dark').is(':visible')) $(data).prependTo('.table_dark > tbody:last');
			else {
				$('.table_dark').css('display', 'block');
				$(data).prependTo('.table_dark > tbody:last');
			}
		}
		$.ajax({
			url: "../ajax/loadLink.php",
			type: "POST",
			success: function(data) {
				console.log(data);
				var json = $.parseJSON(data);
				for(var i = 0; i < json.length; i++) {
					addTable('<tr><td><a href="' + json[i].link + '" target="_blank">' + json[i].link + '</a></td><td><a href="' + json[i].key + '" target="_blank">' + json[i].key + '</a></td><td>' + json[i].views + '</td><td>' + json[i].created + '</td></tr>');
				}
			}
		});
	</script>
</html>

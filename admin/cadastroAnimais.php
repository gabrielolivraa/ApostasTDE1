<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Animais</title>
</head>
<body>
	<h1>Cadastro de Animais</h1>
	<form action="cadastrarAnimais.php" method="post">
        <div>
		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome" required>
		<br></div>
        <div>
		<label for="numero">Número:</label>
		<input type="number" name="numero" id="numero" required>
		<br>
        </div>
		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>

<style>
body {
			background-color: #333;
			color: #fff;
			font-family: Arial, sans-serif;
		}
h1 {
		color: #ccc;
		text-align: center;
	}
    form{display:flex;
    flex-direction:column;
    justify-content:center;
}
	
form div{margin:10px auto;
width:100%;}
	form label {
		
		margin: 10px ;
		color: #ccc;
	}
	
	form input[type=text], form input[type=number], form input[type=submit] {
		display:flex;
        flex-direction:column;
        align-items:center;
		margin: 10px;
		padding: 10px;
		border: none;
		background-color: #555;
		color: #fff;
		font-size: 16px;
		width: 98%;
	}
	
	form input[type=submit] {
		background-color: #ccc;
		color: #333;
		cursor: pointer;
		transition: all 0.3s ease;
	}
	
	form input[type=submit]:hover {
		background-color: #666;
		color: #fff;
	}
</style>

</style>
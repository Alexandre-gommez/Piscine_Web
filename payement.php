<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>ECEY - Inscription</title>
</head>

<body>
<div class="container">
	<form class="needs-validation" novalidate action="backpayement.php" method="post">
		<div id="form2">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="number1">Numéro de carte</label>
					<input type="text" class="form-control" id="number1" name="number1" required>
					<span id="nb_manquant"></span>
				</div>
				<div class="form-group col-md-3">
					<label for="date">Date</label>
					<input type="text" class="form-control" id="date" name="date" placeholder="MM/YY" required>
					<span id="date_manquant"></span>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-2">
					<label for="cvv">CVV</label>
					<input type="text" class="form-control" id="cvv" name="cvv" required>
					<span id="cvv_manquant"></span>
				</div>
				<div class="form-group col-md-7">
					<label for="type">Type de carte</label>
					<select class="custom-select mr-sm-2" id="type" name="type" required>
						<option selected></option>
						<option value="1">Mastercard</option>
						<option value="2">Visa</option>
						<option value="3">American Express</option>
					</select>
					<span id="type_manquant"></span>
				</div>
			</div>

			<input type="button" value="Retour" class="btn btn-secondary" id="retour"></input>
			<button type="submit" class="btn btn-primary" id="valid"> Valider </button>

			
		</div>
	</form>
</div>

<script>
	var validate = document.getElementById("valid");

	var number = document.getElementById("number1");
	var numbermanquant = document.getElementById("nb_manquant");

	var dat = document.getElementById("date");
	var datmanquant = document.getElementById("date_manquant");

	var type = document.getElementById("type");
	var typemanquant = document.getElementById("type_manquant");

	var cvv = document.getElementById("cvv");
	var cvvmanquant = document.getElementById("cvv_manquant");

	validate.addEventListener('click',validation);

	function validation(res)
	{
		if(dat.validity.valueMissing)
		{
			res.preventDefault();
			datmanquant.textContent = "Entrez la date d'expiration";
			datmanquant.style.color = 'red';
			datmanquant.style.display = 'block';
		}
		else{
			datmanquant.style.display = 'none';
		}

		if(cvv.validity.valueMissing)
		{
			res.preventDefault();
			cvvmanquant.textContent = "Entrez votre cvv";
			cvvmanquant.style.color = 'red';
			cvvmanquant.style.display = 'block';
		}
		else{
			cvvmanquant.style.display = 'none';
		}
		if(number.validity.valueMissing)
		{
			res.preventDefault();
			numbermanquant.textContent = "Entrez un numéro de carte";
			numbermanquant.style.color = 'red';
			numbermanquant.style.display = 'block';
		}
		else{
			numbermanquant.style.display = 'none';
		}
		if(type.validity.valueMissing)
		{
			res.preventDefault();
			typemanquant.textContent = "Entrez le type de carte";
			typemanquant.style.color = 'red';
			typemanquant.style.display = 'block';
		}
		else{
			typemanquant.style.display = 'none';
		}
	}
</script>

</body>

</html>
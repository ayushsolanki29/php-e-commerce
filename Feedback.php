<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
	<title>Feedback</title>
	<style>
		@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: "Poppins", sans-serif;
		}

		:root {
			--yellow: #ffbd13;
			--blue: #4383ff;
			--blue-d-1: #3278ff;
			--light: #f5f5f5;
			--grey: #aaa;
			--white: #fff;
			--shadow: 8px 8px 30px rgba(0, 0, 0, 0.05);
		}

		body {
			background: var(--light);
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			padding: 1rem;
		}

		.wrapper {
			background: var(--white);
			padding: 2rem;
			max-width: 576px;
			width: 100%;
			border-radius: 0.75rem;
			box-shadow: var(--shadow);
			text-align: center;
		}

		.wrapper h3 {
			font-size: 1.5rem;
			font-weight: 600;
			margin-bottom: 1rem;
		}

		.rating {
			display: flex;
			justify-content: center;
			align-items: center;
			grid-gap: 0.5rem;
			font-size: 2rem;
			color: var(--yellow);
			margin-bottom: 2rem;
		}

		.rating .star {
			cursor: pointer;
		}

		.rating .star.active {
			opacity: 0;
			animation: animate 0.5s calc(var(--i) * 0.1s) ease-in-out forwards;
		}

		@keyframes animate {
			0% {
				opacity: 0;
				transform: scale(1);
			}

			50% {
				opacity: 1;
				transform: scale(1.2);
			}

			100% {
				opacity: 1;
				transform: scale(1);
			}
		}

		.rating .star:hover {
			transform: scale(1.1);
		}

		textarea {
			width: 100%;
			background: var(--light);
			padding: 1rem;
			border-radius: 0.5rem;
			border: none;
			outline: none;
			resize: none;
			margin-bottom: 0.5rem;
		}

		.btn-group {
			display: flex;
			grid-gap: 0.5rem;
			align-items: center;
		}

		.btn-group .btn {
			padding: 0.75rem 1rem;
			border-radius: 0.5rem;
			border: none;
			outline: none;
			cursor: pointer;
			font-size: 0.875rem;
			font-weight: 500;
		}

		.btn-group .btn.submit {
			background: var(--blue);
			color: var(--white);
		}

		.btn-group .btn.submit:hover {
			background: var(--blue-d-1);
		}

		.btn-group .btn.cancel {
			background: var(--white);
			color: var(--blue);
		}

		.btn-group .btn.cancel:hover {
			background: var(--light);
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<h3>Give Your Feedback</h3>
		<form action="./php/actions.php" method="post">
			<div class="rating">
				<input type="number" name="rating" hidden />
				<i class="bx bx-star star" style="--i: 0"value="0"></i>
				<i class="bx bx-star star" style="--i: 1"value="1"></i>
				<i class="bx bx-star star" style="--i: 2"value="2"></i>
				<i class="bx bx-star star" style="--i: 3"value="3"></i>
				<i class="bx bx-star star" style="--i: 4"value="4"></i>
			</div>
			<textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
			<div class="btn-group">
				<button type="submit" name="feedback" class="btn submit">Submit</button>
				<a href="./index.php" class="btn cancel">Cancel</a>
			</div>
		</form>
	</div>
	<script>
		const allStar = document.querySelectorAll('.rating .star')
		const ratingValue = document.querySelector('.rating input')

		allStar.forEach((item, idx) => {
			item.addEventListener('click', function () {
				let click = 0
				ratingValue.value = idx + 1

				allStar.forEach(i => {
					i.classList.replace('bxs-star', 'bx-star')
					i.classList.remove('active')
				})
				for (let i = 0; i < allStar.length; i++) {
					if (i <= idx) {
						allStar[i].classList.replace('bx-star', 'bxs-star')
						allStar[i].classList.add('active')
					} else {
						allStar[i].style.setProperty('--i', click)
						click++
					}
				}
			})
		})
	</script>
</body>

</html>
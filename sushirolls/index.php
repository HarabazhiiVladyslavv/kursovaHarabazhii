<!DOCTYPE html>
<html lang="ua">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
	<title>Sushi Rolls</title>
</head>
<body>
	<header>
		<div class="container unselectable">
			<div class="innerHeader container row-flex">
				<div class="logo-outer">
					<h1 class="logo" onclick="document.location.href = '/'">SushiRolls</h1>
				</div>
				<ul>
					<li><a onclick="menuPressButton('Роли'); window.scrollTo(0, 400);">Меню</a></li>
					<li class="action"><a onclick="menuPressButton('Акції'); window.scrollTo(0, 400)">Акції</a></li>
					<li><a href="delivery&paynment.html">Доставка\Оплата</a></li>
					<li><a href="contacts.html">Контакти</a></li>
					<li style="padding: 0;">
						<div class="order-count-icon">0</div>
						<a><img class="basket" src="icons/basket.png" onclick="ordersButton();"></a>
					</li>
				</ul>
			</div>
		</div>
	</header>
	<div class="tint display-none" onclick="ordersButton()"></div>
	<div class="orders display-none" id="orders">
		<div class="ordersInner">
			<br>
			<h1>Кошик</h1><br><hr><br>
			<div class="closeOrdersButton" onclick="ordersButton()">⨉</div>

			<div class="orderItem display-none">
				<div class="innerOrderItem">
				<img class="ordImg" src="https://kaifui.com/image/cache/catalog/products/0105_1-240x240.png" alt="">
					<div class="abouOrder">
						<div class="flex-space-between display-flex">
							<h3 class="orderTitle">Сет "Сімейний"</h3> <h3 class="deleteOrder unselectable" onclick="deleteOrder(this.getAttribute('ordid'))">⨉</h3>
						</div>
						<div class="countAndCost flex-space-between display-flex">
							<p>Кількість: <input type="number" min="1" max="1000" class="numbBox" value="1" oninput="valueOrderInput(this);"></p><h3 class="hryvna ordCost">499</h3>
						</div>
					</div>
				</div>
			</div>		

			<div id="ordersBox">
			</div>
			<div class="ordersEmpty">
				<p>Ще немає замовлень</p>
			</div>
			<div class="totalCost">
				<br>
				<br>
				<div class="flex-space-between display-flex">
					<p class="margin-none">Сума:</p><p class="margin-none"><b class="hryvna ordersTotalCost"></b></p>
				</div> <hr> <br>
				<div class="flex-space-between display-flex">
					<p class="margin-none">Доставка:</p><p class="margin-none"><b class="ordersFreeDelivery">Безкоштовна</b></p>
				</div> <hr> <br>
				<div class="flex-space-between display-flex">
					<p class="margin-none"><b>Всього:</b></p><p class="margin-none"><b class="hryvna ordersTotalCostWithDelivery"></b></p>
				</div> <hr> <br>
				<div class="orderButton unselectable" onclick="document.location.href = 'order.php'">Оформити замовлення</div><br>
			</div>
		</div>
	</div>
	<section>
		<div class="mainScreen">
			<div class="container row-flex">
				<div style="border-right: 3px solid #ffffff; padding: 50px 100px;">
					<h1 class="msText">Найкращі суші<br> для тебе!</h1>				
				</div>
				<div>
					<img src="images/sushi_img.png" alt="Найкращі суші!" style=" -webkit-filter: drop-shadow(3px 5px 25px rgba(255,255,255,0.7));filter: drop-shadow(3px 5px 25px rgba(255,255,255,0.7));">
				</div>
			</div>
		</div>
	</section>
	<section class="row-flex menu-buttons container unselectable">
		<div class="menu-button">
			<div class="inner-menu-button" onclick="menuPressButton('Сети')">
				<h2 class="menu-button-text">Сети</h2>
			</div>
		</div>
		<div class="menu-button">
			<div class="inner-menu-button" onclick="menuPressButton('Роли')">
				<h2 class="menu-button-text">Роли</h2>
			</div>
		</div>
		<div class="menu-button">
			<div class="inner-menu-button" onclick="menuPressButton('Напої')">
				<h2 class="menu-button-text">Напої</h2>
			</div>
		</div>
		<div class="menu-button">
			<div class="inner-menu-button" onclick="menuPressButton('Акції')">
				<h2 class="menu-button-text">Акції</h2>
			</div>
		</div>
	</section>
	<div class="product display-none">
		<div class="inner-product">
			<div class="product-img unselectable">
				<img src="https://kaifui.com/image/cache/catalog/products/0105_1-240x240.png">
			</div>
			<div class="about-product">
				<div class="product-title">
					<h2>Сет "Сімейний"</h2>
				</div>
				<div class="product-description">
					<span>рол "Філадельфія мікс", рол "Сирний з лососем", рол "Філадельфія в кунжуті з лососем", рол "Сакура", рол "Аніме", рол "Філадельфія з мідією", імбир, васабі, соєвий соус</span>
				</div>
				<div class="cost-buy margin-top">
					<div class="product-cost">
						<h2>499</h2><h2> грн.</h2>
					</div>
					<div class="buy-button unselectable" onclick="buyButtonPress({params: [this.getAttribute('category'), +this.getAttribute('num')]});">
						<h3>В кошик</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="actionItem display-none">
		<div class="inner-product">
			<div class="product-img unselectable">
				<img src="https://kaifui.com/image/cache/catalog/products/0105_1-240x240.png">
			</div>
			<div class="about-product">
				<div class="product-title">
					<h2>Сет "Сімейний"</h2>
				</div>
				<div class="product-description">
					<span>рол "Філадельфія мікс", рол "Сирний з лососем", рол "Філадельфія в кунжуті з лососем", рол "Сакура", рол "Аніме", рол "Філадельфія з мідією", імбир, васабі, соєвий соус</span>
				</div>
			</div>
		</div>
	</div>
	<section class="row-flex container flex-wrap select-color product-list" id='product-list'>
	</section>
	<section class="container about-us select-color">
		<h1>Де замовити смачні та якісні суші</h1>
		<p>
			Популярність японської їжі сьогодні надзвичайно велика. У кожному місті нашої країни можна знайти заклад, у меню якого є східні страви. Неперевершений екзотичний смак, апетитний аромат, привабливе оформлення та беззаперечна користь — ось секрет затребуваності цих делікатесів. Для створення суші використовується нехитрий набір продуктів, які у поєднанні утворюють оригінальний смак: практично необроблена риба чи інші дари моря, варений рис, пресовані водорості, ніжний тофу, свіжі овочі і оригінальні спеції. 
		</p>
		<h1>Чому варто зробити замовлення суші в SushiRolls</h1>

		<p>Ми відповідально ставимося до вибору постачальників. Тому це компанії з ідеальною репутацією та багаторічним досвідом. Уся сировина перевозиться із залученням новітніх технологій та найсучаснішого обладнання. Це дозволяє нам отримувати тільки високоякісні продукти, з яких наші кваліфіковані кухарі роблять справжні делікатеси для вас. </p>

		<p>Щоб продукти потрібний час залишались свіжими та зберігали свої смакові властивості, кухня Кайфуй Суші оснащення найновішим устаткуванням. Холодильні та морозильні камери дозволяють зберігати сировину у належному стані. Навіть під час приготування, завдяки сучасним приладам, продукти тримають потрібну температуру. </p>
		<p>Переваги замовлення суші в SushiRolls:</p>
		<ul>
			<li>Відмінна якість їжі. На нашій кухні не буває напівфабрикатів — кухарі готують безпосередньо після отримання заявки виключно зі свіжої та якісної сировини.</li><br>
			<li>Першокласний сервіс. SushiRolls — це місце, де вам завжди раді. Тому наші співробітники приділяють максимум уваги кожному клієнту. Вони працюють швидко і злагоджено. Улюблені страви ви отримаєте за нетривалий проміжок часу. </li><br>
			<li>Різноманітність меню. Наша команда створила меню, в якому кожен знайде їжу собі до смаку: суші і роли у класичному виконанні та за покращеними рецептами, роли для вегетаріанців, суші-кейки, теплі роли, великі суші сети та страви для маленьких поціновувачів східної кухні.</li><br>
			<li>Доступні ціни. Вартість страв у Кайфуй абсолютно обґрунтована та орієнтована на клієнта.</li><br>
			<li>Можливість придбати їжу та зекономити. Ми знаємо, як ви любите суші. Тому проводимо акції та радуємо вам знижками.</li>
		</ul>
		<h1>Швидка доставка суші</h1>
		<p>Не маєте часу на обід? Замовляйте доставку. 

		Хочете вразити гостей але не бажаєте готувати самостійно? Замовляйте доставку. 
		
		Відпочиваєте з друзями і зголодніли? Замовляйте доставку.
		
		Наявність власної служби доставки дозволяє нашій компанії привозити страви у бідь-яке місце у точно зазначений час.</p>
		<p>Оформити заявку можна за телефоном чи через відповідний розділ сайту. Оператор з’ясує нюанси та передасть її кухарям. Без затримок вони візьмуться до роботи. Кур’єр отримає страви буквально «з-під ножа» та максимально швидко доправить клієнту.</p>
		<p>SushiRolls допоможе створити особливу атмосферу та посмакувати улюбленими делікатесами будь-де та у будь-який час!</p>
	</section><br><br>
	<footer>
		<div class="container">
			<div class="innerHeader container row-flex">
				<div class="logo-outer">
					<h1 class="logo">SushiRolls</h1>
				</div>
				<span>SushiRolls © 2023</span>
			</div>
		</div>		
	</footer>
</body>
<script type="text/javascript" src="js/script.js"></script>
</html>
<!doctype html>
<html lang="tr">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Veri Çekme Örneği</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="blog_version">

	<!--================ Start Header Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav justify-content-end">
							<li class="nav-item active"><a class="nav-link" href="index.html">Ana Sayfa</a></li>
							<li class="nav-item"><a class="nav-link" href="about.html">Hakkımızda</a></li>
							<li class="nav-item"><a class="nav-link" href="services.html">Hizmetler</a></li>
							<li class="nav-item"><a class="nav-link" href="portfolio.html">Portfolyo</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Sayfalar</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="elements.php">Örnek</a></li>
									<li class="nav-item"><a class="nav-link" href="portfolio-details.html">Portfolyo Detayları</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Ayrıntıları</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="contact.html">Iletişim</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================ End Header Area =================-->

    <!--================ Start Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Veri Çekme Örneği</h2>
                    <div class="page_link">
                        <a href="index.html">Ana Sayfa</a>
                        <a href="elements.html">Örnek</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Banner Area =================-->
        
	<!-- Start Sample Area -->
	<section class="sample-text-area">
		<div class="container">
			<h3 class="text-heading title_color">Hadi Deneyelim!</h3>
			<p class="sample-text">
				MySQL Database'indeki Customers tablosundan veri çekeceğiz. Ve bu verileri aşağıdaki tablonun içine yazdıracağız. 
			</p>
		</div>
	</section>
	<!-- End Sample Area -->
		
	<!-- Start Sample Area -->
	
	<section class="sample-text-area">
		<div class="container">
			<h3 class="text-heading title_color">Tablo</h3>
			<form method="POST">
				<input type="submit" name="veri_cek" value="Verileri Göster" style="border:1; background-color:#008800; color:white; padding: 5px;">
				<input type="submit" value="Verileri Gizle" style="border:1; background-color:#a20000; color:white; padding: 5px;" action="elements.php">
				<a href="https://www.youtube.com/shorts/6yN2fvb66vQ" target="_self"><input type="button" value="Sürpriz Buton" 
				style="border:1; background-color:purple; color:white; padding: 5px;"></a>
			</form>
			<br>
			<table border="1" style="text-align: center;" method="POST">
				<tr>
					<th>ID</th>
					<th>Ad</th>
					<th>Soyad</th>
					<th>Doğum Tarihi</th>
					<th>E-posta</th>
				</tr>
				<!-- Daha fazla veri eklemek için aynı formatı kullanabilirsiniz -->
				<?php
				if (isset($_POST['veri_cek'])) {
				// MySQL veritabanına bağlantı yapma
				$servername = "localhost"; // MySQL sunucu adı
				$username = "root"; // MySQL kullanıcı adı
				$password = "Ayberk01205**..Manolya48**..3509..**"; // MySQL şifre
				$dbname = "yavasdeveloper"; // Kullanılacak veritabanının adı

				// MySQL bağlantısını oluşturma
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Bağlantıyı kontrol etme
				if ($conn->connect_error) {
					die("Bağlantı hatası: " . $conn->connect_error);
				}

				// MySQL veritabanından verileri çekme
				$sql = "SELECT id, name, lname, birthday, email FROM customers";
				$result = $conn->query($sql);

				// Verileri tablo içine yerleştirme
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["id"] . "</td>";
						echo "<td>" . $row["name"] . "</td>";
						echo "<td>" . $row["lname"] . "</td>";
						echo "<td>" . $row["birthday"] . "</td>";
						echo "<td>" . $row["email"] . "</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='4'>Veri bulunamadı.</td></tr>";
				}

				// MySQL bağlantısını kapatma
				$conn->close();
				}
				?>
			</table>
		</div>
	</section>
	<section class="sample-text-area">
		<div class="container">
		<h3 class="text-heading title_color">MYSQL Veri Gönder</h3>
		<form 
			name="contact"
			class="row contact_form" 
			method="POST" 
			action="connection.php"
			id="contactForm">
			<div class="col-md-12">
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="name" placeholder="Ad" required>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="lname" name="lname" placeholder="Soyad" required>
			</div>
			<div class="form-group">
				<input type="date" class="form-control" id="birthday" name="birthday" placeholder="Doğum Tarihi" required>
			</div>
			<div class="form-group">
				<input type="email" class="form-control" id="email" name="email" placeholder="E-posta" required>
			</div>
			</div>
			<div class="col-md-12 text-right">
				<button type="submit" value="submit" class="primary_btn">
					<span>Gönder</span>
				</button>
			</div>
		</form>
		</div>
	</section>

	<section class="sample-text-area">
		<div class="container">
		<h3 class="text-heading title_color">MYSQL Paneli</h3>
		<p class="sample-text">
				Burada form ile yazacağınız komutu alıyor ve terminal.php'ye post metoduyla yolluyoruz. terminal.phpde mesajınız değişkene tanımlanıp
				MYSQL database'ine sorgu olarak gönderiliyor. Aslında böylece ufak bir MySQL Shell oluşturmuş oluyoruz. Hemen Deneyin. 
		</p>
		<br>
		<h3 class="text-heading title_color" style="font-size:18px;">Nasıl Kullanılır ?</h3>
		<p class="sample-text">
				Kendinizi MYSQL sorgusundaymış gibi düşünün ve sorgunuzu yazın. Göndermek için Enter tuşuna basmanız yeterli.
		</p>
		<br>
		<form 
			name="contact"
			class="row contact_form" 
			method="POST" 
			action="terminal.php"
			id="contactFormTerminal">
			<div class="col-md-12">
			<div class="form-group">
                <textarea class="form-control" name="messageTerminal" id="messageTerminal" rows="10" placeholder=">_"></textarea>
            </div>
			</div>
		</form>
		</div>
	</section>
	<script>
    document.getElementById("messageTerminal").addEventListener("keydown", function(event) {
        if (event.keyCode === 13) { // 13 corresponds to the "enter" key
            event.preventDefault(); // Prevent the default form submission
            document.getElementById("contactFormTerminal").submit(); // Submit the form
        }
    });
	</script>
	<style>
		#messageTerminal{
			background-color:black;
			color:white;
			font-size:14px;
		}
		#messageTerminal::placeholder{
			font-size:14px;

		}
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e6e6e6;
        }

        h1 {
            margin-top: 0;
        }
    </style>
	<!-- End Sample Area -->

    
    <!--================Footer Area =================-->
	<footer class="footer_area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="footer_top flex-column">
						<div class="footer_logo">
							<a href="#">
								<img src="img/logo.png" alt="">
							</a>
							<h4>Takipte Kal</h4>
						</div>
						<div class="footer_social">
							<a href="https://www.discord.gg/Xp4sV9K2Az" target="_blank"><i class="fa-brands fa-discord"></i></a>
							<a href="https://www.instagram.com/ayberksch" target="_blank"><i class="fa-brands fa-instagram"></i></a>
							<a href="#"><i class="fa-brands fa-github"></i></a>
							<a href="#"><i class="fa-brands fa-stack-overflow"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row footer_bottom justify-content-center">
				<p class="col-lg-8 col-sm-12 footer-text">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tüm hakları saklıdır.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</div>
	</footer>
    <!--================End Footer Area =================-->
		   
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/popper.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/stellar.js"></script>
		<script src="vendors/lightbox/simpleLightbox.min.js"></script>
		<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
		<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
		<script src="vendors/isotope/isotope-min.js"></script>
		<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/mail-script.js"></script>
		<script src="js/theme.js"></script>
		<!-- FONT ICIN -->
		<script src="https://kit.fontawesome.com/ec613c6134.js" crossorigin="anonymous"></script>
	</body>
</html>
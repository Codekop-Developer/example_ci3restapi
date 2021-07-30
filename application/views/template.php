
<!DOCTYPE HTML>
<html>
	<head>
		<title><?= $title;?> </title>
		
		<!-- BOOTSTRAP 4-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <!-- CSS-->
        <link rel="stylesheet" href="<?= base_url('assets/css/main.css?v='.time());?>">
        <!-- DATATABLES BS 4-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- DATATABLES BS 4-->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	</head>
    <body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url('/');?>">
                    <b>
                        <i class="fa fa-cog"></i> 
                        <?= $title;?>
                    </b>
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('/');?>">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('home/category');?>">Category</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php include $file.'.php';?>
        </div>
        <div class="clearfix mt-5"></div>
        <div class="footer mt-auto pt-3 text-center">
            <p> Copyright &copy; <?= $title;?> <?=date('Y');?></p>
        </div>
	</body>
</html>

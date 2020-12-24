<!DOCTYPE html>
     	<html>
     	<head>
     		<title></title>
        <?php include_once('bootstrap.php') ?>
            <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     	</head>
     	<body>

    <script>
            Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please login to continue',
            })
	</script>
        <center><a href="loginnew.php"><button class="btn btn-primary">LOG IN</button></a></center>

     	</body>
     	</html>

<?php include_once('includes/dbconnection.php');
$table_name = 'tblquery';
$sql = "SELECT Name,Query,teacherNote FROM tblquery JOIN tblteacher ON tblquery.teacherId = tblteacher.id";
// $sql2 = "SELECT teacherId from tblquery where teacherId = (SELECT name from tblteacher where id = teacherId)"
$statement = $dbh->prepare($sql);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>Teacher Management</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        th,
        td {
            font-size: 14px;
        }
        td {
            margin: 2px;
        }
    </style>
</head>
<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <?php include_once('includes/header.php'); ?>
        <section class="py-5">
            <div class="container px-5">
                <table>
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Teacher</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $i => $product) { ?>
                            <tr>
                                <td><?php echo $product['Query']; ?></td>
                                <td><?php echo $product['teacherNote']; ?></td>
                                <td><?php echo $product['Name']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <?php include_once('includes/footer.php'); ?>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
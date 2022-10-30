<?php
include '/xampp/htdocs/W3schools/classes/Auth.php';

$accounts = Auth::show_all_account();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>

    <!--tab icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://lms.deha-soft.com/images/favicon.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://lms.deha-soft.com/images/favicon.ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://lms.deha-soft.com/images/favicon.ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://lms.deha-soft.com/images/favicon.ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://lms.deha-soft.com/images/favicon.ico/favicon-16x16.png">

    <!--Font-awesome-->
    <link rel="font-awesome" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


    <!--css file-->
    <link rel="stylesheet" href="./ad_assets/css/ad_menu.css">
    <link rel="stylesheet" href="./ad_assets/css/ad_body_setting.css">
    <link rel="stylesheet" href="./ad_assets/css/ad_account.css">



    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style=" background-color: rgb(224, 224, 224)">
    <!--Navbar pc menu left-->
    <?php
    include "/xampp/htdocs/W3schools/admin/admin_nav_menu_pc.php";
    ?>

    <!--body_content-->
    <div class=body__container>
        <div class="body__content-margin">
            <div class="body__content">

                <h1>User list</h1>
    
                <a href="./ad_create_account.php" class="btn btn-primary">Create new account</a>
                <div>
                    <?php if (count($accounts) > 0) { ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">authority id</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($accounts as $account) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $account['account_id'] ?></th>
                                        <td><?php echo $account['username'] ?></td>
                                        <td><?php echo $account['email'] ?></td>
                                        <td><?php if($account['authority_id']==1){echo "admin";}
                                        if($account['authority_id']==2){echo "student";}
                                        if($account['authority_id']==3){echo "teacher";} ?></td>
                                        <td>
                                            <a href="./ad_show_account.php?account_id=<?= $account['account_id'] ?>" class="btn btn-info">Show</a>
                                            <a href="./ad_edit_account.php?account_id=<?= $account['account_id'] ?>" class="btn btn-warning">Edit</a>
                                            <form action="./ad_delete.php" method="post" id="formDelete-<?= $account['account_id'] ?>">
                                                <input type="hidden" name="account_delete" value="<?= $account['account_id']?>">
                                                <button class="btn btn-danger btn-delete" id="<?= $account['account_id'] ?>">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    <?php } else { ?>
                        <h2> No Data.</h2>
                    <?php } ?>



                    <br>
                    <br>




                </div>
            </div>
        </div>

        <!--footer-->
        <div>

        </div>


</body>
<!--JS file-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="./ad_assets/js/ad_menu.js">
    let deleteBtns = document.querySelectorAll('.btn-delete');
        deleteBtns.forEach(function(item) {
            item.addEventListener('click', function(event) {
                if (confirm("Delete user")) {
                    let id = this.getAttribute('id');
                    document.querySelector('formDelete-' + id).submit();
                }

            })
        })
</script>


</html>
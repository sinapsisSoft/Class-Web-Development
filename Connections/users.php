<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <?php
    include_once('php/view/nav.php');
    include_once('php/controller/users.php');

    $objUser = new Users();
    $getArray = $objUser->selectUser();
    $countList = count($getArray);

    ?>

    <section>

        <h1>Titulo Users</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php    
            for($i=0;$i<$countList;$i++){

                echo '<tr>
                
                <td>'.  $getArray[$i]['id'].'</td>
                <td>'.  $getArray[$i]['name'].'</td>
                <td>'.  $getArray[$i]['email'].'</td>
                <td>'.  $getArray[$i]['phone'].'</td>
                <td> <button type="button" onclick="update('.$getArray[$i]['id'].')"class="btn btn-warning">EDITAR</button></td>
                <td> <button type="button" onclick="delete_('.$getArray[$i]['id'].')"class="btn btn-danger">ELIMINAR</button></td>
                </tr>';
            }

            ?>
            </tbody>
        </table>
    </section>
    <?php
    include_once('php/view/footer.php');
    ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
           <script>

               function update(id){
                   alert(id);
               }
               function delete_(id){
                   alert("Eliminar"+id);
               }
           </script> 
</body>

</html>
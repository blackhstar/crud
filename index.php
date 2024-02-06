<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-4">
            <div class="card card-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" id="nameCte" name="tittle" class="form-control" placeholder="Nombre" autofocus>
                    </div>
                    <button type="submit" id="save_cte" class="btn btn-success" name="save_costumer">Agregar</button>
                </form>
            </div>
        </div>
        <div class="col-8">
        <table id="tableCtes">
            <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    NOMBRE
                </th>
                <th>
                    STATUS
                </th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                </td>
                <td>
                </td>
                <td>   
                </td>
                <td>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>

<?php include("modal/updateCte.php") ?>
<?php include("includes/footer.php") ?>
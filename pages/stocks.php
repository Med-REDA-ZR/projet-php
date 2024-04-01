<main class="main-content">
    <div class="app-loader"><i class="icofont-spinner-alt-4 rotate"></i></div>
    <div class="main-content-wrap">
        <header>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="page-title">Stock Products</h1>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="row">
                        <div class="col-12 col-sm-3"></div>
                        <div class="col-12 col-sm-3 ">
                            <a href="" type="button" class="btn  btn-square btn-secondary p-3 mt-4 " data-bs-toggle="modal" data-bs-target="#list-command">List Commands</a>
                        </div>
                        <div class="col-12 col-sm-3">
                            <a href="" type="button" class="btn  btn-square btn-success p-3 mt-4 " data-bs-toggle="modal" data-bs-target="#add-command">Add Command</a>
                        </div>
                        <div class="col-12 col-sm-3">
                            <a href="" type="button" class="btn  btn-square btn-info p-3 mt-4 " data-bs-toggle="modal" data-bs-target="#add-product">Add Product</a>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <div class="page-content">
            <div class="card mb-0">
                <div class="card-body">
                    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table table-hover data-table dataTable no-footer" data-searching="true" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                                <form action="./assets/include/script.php" method="GET">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th scope="col">Id Product</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Name Product</th>
                                            <th scope="col">Prix </th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Statue</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cnx->query('SELECT * FROM products WHERE 1') as $pr) { ?>
                                            <tr>
                                                <td>
                                                    <div class="text-muted"><?= $pr['id_prod'] ?></div>
                                                </td>
                                                <td><img src="../assets/img/profils/<?= $pr['img_prod'] ?>" alt="" width="40" height="40" class="rounded-500"></td>
                                                <td><strong><?= $pr['name_prod'] ?></strong></td>

                                                <td>
                                                    <div class="text-muted"><?= $pr['prix_prod'] ?></div>
                                                </td>
                                                <td>
                                                    <div class="text-muted"><?= $pr['qty_prod'] ?>
                                                    </div>
                                                </td>

                                                <td><span class="badge badge-success">On Stock</span></td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="patient.html" class="btn btn-info btn-sm rounded-pill btn_modifier_ligne"><span class="fa-solid fa-pencil fa-lg"></span>
                                                        </a>
                                                        <a href="../assets/include/script.php?id_prod=<?= $pr['id_prod'] ?>" type="button" class="btn btn-error btn-sm btn-square rounded-pill"><i class="fa-solid fa-trash-can"></i></a>



                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </form>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<!-- Add Command modals -->
<div class="modal fade" id="add-command" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new Command</h5>
            </div>
            <div class="modal-body">
                <form action="../assets/include/script.php" method="POST">

                    <div class="row">
                        <div class="col-12 col-sm-10">
                            <div class="form-group">
                                <select class="selectpicker namePat" data-live-search="true" placeholder="Name Patient" name="idProd">
                                    <?php foreach ($cnx->query('select id_prod,name_prod from products') as $pat) { ?>
                                        <option value="<?= $pat['id_prod'] ?>"><?= $pat['name_prod'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <a href="##" type="button" class="btn  btn-sm btn-square rounded-pill" onclick="hideElement()" style="background-color: #4CAF50;" data-bs-toggle="modal" data-bs-target="#add-product"><i class="fa-solid fa-plus"></i></a>
                        </div>

                    </div>
                    <div class="form-group">
                        <select class="selectpicker doctor" data-live-search="true" placeholder="Name Doctor" name="idDoctor">
                            <?php foreach ($cnx->query('select id_dr,name_dr from doctors') as $dr) { ?>
                                <option value="<?= $dr['id_dr'] ?>"><?= $dr['name_dr'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group"><input class="form-control EDdate" name="date" type="date"></div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group"><input class="form-control EDtimes" name="times" type="time"></div>
                        </div>
                    </div>
                    <div class="form-group mb-0"><input class="form-control EDQty" placeholder="Quantity" name="qty_cmd" type="number"></div>
            </div>
            <div class="modal-footer d-block">
                <div class="actions justify-content-between">
                    <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary btn_ajouter" name="btn_add_command">ajouer</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end Command modals -->

<!-- Add patients modals -->
<div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="../assets/include/script.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Add new Product</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group avatar-box d-flex">
                        <img src="https://th.bing.com/th/id/R.f4e2da9f0ab3d1b8aa37c6fd4228d1ab?rik=rt6pYnbl7SqNaA&pid=ImgRaw&r=0" width="50" height="50" alt="" class="rounded-500 me-4">
                        <input class="btn btn-outline-primary" type="file" name="image" id="image"> </input>
                    </div>
                    <div class="form-group"><input class="form-control" type="text" name="name_prod" placeholder="Product Name"></div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group"><input class="form-control" type="number" name="prix_prod" placeholder="Product Prix"></div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group"><input class="form-control" type="number" name="qty_prod" placeholder="Prouct qantity"></div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer d-block">
                    <div class="actions justify-content-between">
                        <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary btn_ajouter" name="btn_add_prod">ajouer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end patients modals -->


<!-- List Command modals -->
<div class="modal fade" id="list-command" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">List Command</h5>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table table-hover data-table dataTable no-footer" data-searching="true" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                                <form action="./assets/include/script.php" method="GET">
                                    <thead>
                                        <tr class="bg-primary text-white">
                                            <th scope="col">Id Cmd</th>
                                            <th scope="col">Name Product</th>
                                            <th scope="col">Name Doctor</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Date </th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cnx->query('SELECT cmd.id_cmd ,pr.name_prod,dr.name_dr,cmd.date_cmd,cmd.time_cmd,cmd.qty_cmd FROM command as cmd INNER JOIN products as pr on (cmd.product_id_cmd=pr.id_prod) INNER JOIN doctors as dr on (cmd.doctor_id_cmd = dr.id_dr)') as $cmd) { ?>
                                            <tr>
                                                <td>
                                                    <div class="text-muted"><?= $cmd['id_cmd'] ?></div>
                                                </td>
                                                <td>
                                                    <div class="text-muted"><?= $cmd['name_prod'] ?></div>
                                                </td>
                                                <td>
                                                    <div class="text-muted"><?= $cmd['name_dr'] ?></div>
                                                </td>
                                                <td>
                                                    <div class="text-muted"><?= $cmd['qty_cmd'] ?></div>
                                                </td>
                                                <td>
                                                    <div class="text-muted"><?= $cmd['date_cmd'] ?></div>
                                                </td>
                                                <td>
                                                    <div class="text-muted"><?= $cmd['time_cmd'] ?></div>
                                                </td>

                                                
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </form>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer d-block">
                <div class="actions justify-content-between">
                    <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-secondary btn_Print" name="##">Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End List Command modals -->


<script>
    function hideElement() {
        var element = document.getElementById("add-command");
        element.style.display = "none";
    }
</script>
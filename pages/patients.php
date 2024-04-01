
<main class="main-content">
                <div class="app-loader"><i class="icofont-spinner-alt-4 rotate"></i></div>
                <div class="main-content-wrap">
                
                    <div class="row">
                        <header class="page-header">
                        <div class="col-6"> <h1 class="page-title">Patients</h1></div>
                        </header>
                    </div>
                    <div class="page-content">
                        <div class="card mb-0">
                            <div class="card-body">
                            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table table-hover data-table dataTable no-footer"  data-searching="true" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                                    <form action="./assets/include/script.php" method="GET">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th scope="col">Photo</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Number</th>
                                                <th scope="col">Last visit</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach( $cnx->query('select * from patients') as $p) { ?>
                                            <tr>
                                                <td><img src="../assets/img/profils/<?=$p['profile_pat']?>" alt="" width="40"
                                                        height="40" class="rounded-500"></td>
                                                <td>
                                                    <div class="text-muted"><?=$p['id_pat']?></div>
                                                </td>
                                                <td><strong><?=$p['name_pat']?></strong></td>
                                                <td>
                                                    <div class="text-muted text-nowrap"><?=$p['age_pat']?></div>
                                                </td>
                                                <td>
                                                    <div class="address-col"><?=$p['adresse_pat']?></div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center nowrap text-primary"><span
                                                            class="fa-solid fa-phone p-0 me-2"></span><?=$p['phone_pat']?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php foreach($cnx->query("SELECT date_app FROM appoiments WHERE id_pat= $p[id_pat]  ORDER BY date_app DESC LIMIT 1") as $dt){?>
                                                        <div class="text-muted text-nowrap"><?=$dt['date_app']?></div>
                                                    <?php }?>
                                                </td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="patient.html" class="btn btn-dark btn-sm btn-square rounded-pill"><span
                                                                class="btn-icon fa-solid fa-arrow-up-right-from-square"></span>
                                                        </a>
                                                        <a href="../assets/include/script.php?ids=<?=$p['id_pat']?>" type="button" class="btn btn-error btn-sm btn-square rounded-pill"><i class="fa-solid fa-trash-can"></i></a>
                                                        

                                                        
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
                        <div class="add-action-box"><button class="btn btn-primary btn-lg btn-square rounded-pill"
                                data-bs-toggle="modal" data-bs-target="#add-patient"><span
                                    class="fa-solid fa-bed-pulse"></span></button></div>
                    </div>
                </div>
</main>

<!-- Add patients modals -->
<div class="modal fade" id="add-patient" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="../assets/include/script.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Add new patient</h5>
                    </div>
                    <div class="modal-body">
                            <div class="form-group avatar-box d-flex">
                                <img src="../assets/img/pa.png" width="50" height="50" alt="" class="rounded-500 me-4"> 
                                <input  type="file" name="image" id="image"> </input>
                            </div>
                            <div class="form-group"><input class="form-control" type="text" name="name_pat" placeholder="Name"></div>
                            <div class="form-group"><input class="form-control" type="number" name="phone_pat" placeholder="Phone"></div>
                            <div class="form-group"><input class="form-control" type="text" name="email_pat" placeholder="Email"></div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group"><input class="form-control" type="number" name="age_pat" placeholder="Age"></div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <select class="selectpicker" title="Gender" name="gender_pat">
                                            <option class="d-none">Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <textarea class="form-control" placeholder="Address" name="adress_pat" rows="3"></textarea>
                            </div>
                        
                    </div>
                    <div class="modal-footer d-block">
                        <div class="actions justify-content-between">
                            <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary btn_ajouter" name="btn_add_pat1">ajouer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end Add patients modals -->
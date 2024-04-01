<main class="main-content">
    <div class="app-loader">
    <i class="fa-solid fa-spinner" style="color: #005eff;"></i>
    </div>
    <div class="main-content-wrap">
        <header class="page-header">
            <h1 class="page-title">Appointments</h1>
        </header>
        <div class="page-content">
            <div class="card mb-0">
                <div class="card-body">
                <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table table-hover data-table dataTable no-footer"  data-searching="true" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Patient</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Visit time</th>
                                    <th scope="col">Injury</th>
                                    <th scope="col">Doctor</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cnx->query('select p.name_pat, p.phone_pat, p.profile_pat, app.date_app, app.id_app, app.time_app, app.injury, dr.name_dr, dep.name_dep 
                                                    from appoiments as app 
                                                    INNER JOIN patients as p on (app.id_pat = p.id_pat) 
                                                    INNER JOIN doctors as dr on (app.id_dr = dr.id_dr) 
                                                    INNER JOIN department as dep on (app.id_dep = dep.id_dep) ') as $v) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center nowrap text-primary"><?= $v['id_app'] ?></div>
                                        </td>
                                        <td><strong><?= $v['name_pat'] ?></strong></td>
                                        <td>
                                           <div  
                                              class="d-flex align-items-center nowrap text-primary"><span
                                              class="fa-solid fa-phone p-0 me-2"></span><?=$v['phone_pat']?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-muted text-nowrap"><?= $v['date_app'] ?></div>
                                        </td>
                                        <td>
                                            <div class="text-muted text-nowrap"><?= $v['time_app'] ?></div>
                                        </td>
                                        <td><?= $v['injury'] ?></td>
                                        <td><?= $v['name_dr'] ?></td>
                                        <td><?= $v['name_dep'] ?></td>
                                        <td>
                                            <?php 
                                            $today = date('Y-m-d');
                                            if ($v['date_app' ] == $today) echo("<span style='background-color: #2ddb8a;' class='badge'>Today</span>");
                                            elseif ($v['date_app' ] > $today) echo("<span style='background-color:#ffdd00 ;' class='badge'>Pending</span>");
                                            elseif ($v['date_app' ] < $today) echo("<span style='background-color:#0d6efd;' class='badge'>Approved</span>");
                                            ?>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-info btn-sm rounded-pill btn_modifier_ligne" data-bs-toggle="modal" data-bs-target="#editM" 
                                                    data-idapp="<?= $v['id_app'] ?>"
                                                    data-name="<?= $v['name_pat'] ?>"
                                                    data-phone="<?= $v['phone_pat'] ?>"
                                                    data-date="<?= $v['date_app'] ?>"
                                                    data-hr="<?= $v['time_app'] ?>"
                                                    data-injury="<?= $v['injury'] ?>"
                                                    data-doctor="<?= $v['name_dr'] ?>"
                                                    data-dep="<?= $v['name_dep'] ?>">
                                                    <span><i class="fa-solid fa-pencil fa-lg" style="color: #eeeff2;"></i></span>
                                                </button>
                                                <a href="../assets/include/script.php?id=<?= $v['id_app'] ?>" type="button" class="btn btn-error btn-sm btn-square rounded-pill">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                 </div>
                </div>
            </div>
            <div class="add-action-box">
                <button class="btn btn-primary btn-lg btn-square rounded-pill" data-bs-toggle="modal" data-bs-target="#add-appointment">
                    <span class="btn-icon"></span>
                    <i class="fa fa-stethoscope"></i>
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Add appointment modals -->
<div class="modal fade" id="add-appointment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new appointment</h5>
            </div>
            <div class="modal-body">
            <form action="../assets/include/script.php" method="POST">
                    
                    <div class="row">
                        <div class="col-12 col-sm-10">
                            <div class="form-group">
                                <select class="selectpicker namePat" data-live-search="true" placeholder="Name Patient" name="idPat">
                                <?php foreach ($cnx->query('select id_pat,name_pat from patients') as $pat){ ?>
                                    <option value="<?= $pat['id_pat'] ?>"><?= $pat['name_pat'] ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <a href="##" type="button" class="btn  btn-sm btn-square rounded-pill" style="background-color: #4CAF50;" data-bs-toggle="modal" data-bs-target="#add-patient"><i class="fa-solid fa-plus"></i></a>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <select    class="selectpicker doctor" data-live-search="true" placeholder="Name Doctor" name="idDoctor">
                            <?php foreach ($cnx->query('select id_dr,name_dr from doctors') as $dr){ ?>
                                <option value="<?= $dr['id_dr'] ?>"><?= $dr['name_dr'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="selectpicker department" data-live-search="true"  placeholder="Department" name="department">
                            <?php foreach ($cnx->query('select id_dep,name_dep from department') as $dep){ ?>
                                <option value="<?= $dep['id_dep'] ?>"><?= $dep['name_dep'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group"><input class="form-control EDdate" name="date" type="date" ></div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group"><input class="form-control EDtimes" name="times" type="time" ></div>
                        </div>
                    </div>
                    <div class="form-group mb-0"><input class="form-control EDinjury" placeholder="Injury" name="injury" type="text" ></div>
                </div>
                <div class="modal-footer d-block">
                    <div class="actions justify-content-between">
                        <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary btn_ajouter" name="btn_add_app">ajouer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Add appointment modals -->

<!-- Edit appointment modals -->
<div class="modal fade" id="editM" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit an appointment</h5>
            </div>
            <div class="modal-body">
             <form action="../assets/include/script.php" method="POST">
                    <div class="form-group"><input class="form-control EDid" name="idapp" type="hidden" ></div>
                    <div class="form-group"><input class="form-control EDname" name="name" type="text"></div>
                    <div class="form-group"><input class="form-control EDdoctor" name="doctor" type="text" ></div>
                    <div class="form-group"><input class="form-control EDphone" name="phone" type="Number" ></div>
                    <div class="form-group"><input class="form-control EDdepart" name="depart" type="text"></div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group"><input class="form-control EDdate" name="date" type="date" ></div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group"><input class="form-control EDtimes" name="times" type="time" ></div>
                        </div>
                    </div>
                    <div class="form-group mb-0"><input class="form-control EDinjury" name="injury" type="text" ></div>
                </div>
                <div class="modal-footer d-block">
                    <div class="actions justify-content-between">
                        <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary btn_modifier" name="btn_edit_app">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Edit appointment modals -->
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
                            <button class="btn btn-primary btn_ajouter" name="btn_add_pat">ajouer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end Add patients modals -->
    

<script type="text/javascript">
    $(".btn_modifier_ligne").click(function(){
        $('.EDid').val($(this).data('idapp'))
        $('.EDname').val($(this).data('name'))
        $('.EDphone').val($(this).data('phone'))
        $('.EDdepart').val($(this).data('dep'))
        $('.EDdate').val($(this).data('date'))
        $('.EDtimes').val($(this).data('hr'))
        $('.EDdoctor').val($(this).data('doctor'))
        $('.EDinjury').val($(this).data('injury'))
    })
</script>



<main class="main-content">
                <div class="app-loader"><i class="icofont-spinner-alt-4 rotate"></i></div>
                <div class="main-content-wrap">
                    <header class="page-header">
                        <h1 class="page-title">Doctors</h1>
                    </header>
                <form action="./assets/include/script.php" method="POST">
                    <div class="page-content">
                        <div class="row">
                            <?php foreach( $cnx->query('select * from doctors') as $d) { ?>
                            <div class="col-12 col-md-3">
                                <div class="contact">
                                    <div class="img-box-light "><img  src="../assets/img/profils/<?=$d['profile_dr']?>" width=150 height=300 ></div>
                                    <div class="info-box">
                                        <h5 class="name">Dr. <?=$d['name_dr']?></h5>
                                        <div class="speciality"><?=$d['speciality_dr']?></div>
                                        <div class="social">
                                        <div >
                                            <span class="fa-brands fa-whatsapp" style="color: #28d288; p-0 me-2">
                                            </span><i class="fa-solid fa-at" style="color: #5b90ec;"></i>
                                        </div>
                                        </div>
                                        <p class="address"><?=$d['adresse_dr']?></p>
                                        <div class="button-box">
                                            <a href="?pages=doctor&ids=<?=$d['id_dr']?>" class="btn btn-primary"  ><i class="fa-solid fa-id-card" style="color: #ffffff;"></i></a>
                                            <a href="../assets/include/script.php?idd=<?=$d['id_dr']?>" type="button" class="btn btn-error" ><i class="fa-regular fa-trash-can"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                  </form>

                       
                    </div>
                
                </div> 
                        <div class="add-action-box">
                            <button class="btn btn-dark btn-lg btn-square rounded-pill"
                                data-bs-toggle="modal" data-bs-target="#add-doctor"><span><i class="fa-regular fa-id-card"></i></span>
                            </button>
                        </div>
            </main>

    <!-- Add doctors modals -->
    <div class="modal fade" id="add-doctor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add doctor</h5>
                </div>
                <div class="modal-body">
                    <form  action="../assets/include/script.php" method="POST" enctype="multipart/form-data" >
                        <div class="form-group avatar-box d-flex">
                            <img src="../assets/img/R.png" width="40" height="40" alt="" class="rounded-500 me-4">
                            <input  type="file" name="image" id="image"> </input>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id_dr" placeholder="id_dr"></div>
                        <div class="form-group">
                            <input class="form-control" type="text"name="name_dr" placeholder="Name"></div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="speciality_dr" type="text" placeholder="Speciality">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group"><select class="selectpicker" name="gender_dr" title="Gender">
                                        <option class="d-none">Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-group"><textarea class="form-control" name="adresse_dr" placeholder="Address" rows="3"></textarea></div>
                        <div>
                            <label>Contacts</label>
                            <div class="social-list">
                                <div class="social-item">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                        <i class="fa-brands fa-whatsapp fa-lg" style="color: #1edc44;"></i>
                                        </span>
                                        <input type="text" class="form-control" name="phone_dr" placeholder="WhatsApp">
                                    </div>
                                </div>
                                <div class="social-item">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                        <i class="fa-regular fa-at" style="color: #045df6;"></i>
                                        </span>
                                        <input type="text" class="form-control" name="email_dr" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                </div>
                <div class="modal-footer d-block">
                    <div class="actions justify-content-between">
                        <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button> 
                        <button class="btn btn-info" name="btn_add_dr">Add doctor</button>
                    </div>
                </div>
            </div></form>
        </div>
    
    </div>
    <!-- end Add doctor modals -->



          
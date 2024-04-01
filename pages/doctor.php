<main class="main-content">
    <div class="app-loader"><i class="icofont-spinner-alt-4 rotate"></i></div>
    <div class="main-content-wrap">
        <header class="page-header">
            <h1 class="page-title">Doctor profile page</h1>
        </header>
        <div class="page-content">
            <div class="row">
                <div class="col col-12 col-md-6 mb-4">
                    <form action="../assets/include/script.php" method="POST" enctype="multipart/form-data">
                        <?php foreach( $cnx->query('select * from doctors where id_dr='.$_GET["ids"]) as $d) { ?>
                        <label>Photo</label>
                        <div class="form-group avatar-box d-flex align-items-center">
                            <img src="../assets/img/profils/<?=$d['profile_dr']?>" width="100" height="100" alt=""
                                class="rounded-500 me-4">
                            <input type="file" name="image" id="image"> </input>
                        </div>
                        <div class="form-group"><label>Full name</label> <input class="form-control vname" type="text"
                                placeholder="Name" value="<?=$d['name_dr']?>"></div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group"><label>Speciality</label> <input class="form-control"
                                        type="text" value="<?=$d['speciality_dr']?>"></div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group"><label>Gender</label> <select class="selectpicker"
                                        value="<?=$d['gender_dr']?>">
                                        <option>Male</option>
                                        <option selected="selected">Female</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="form-group"><label>Address</label> <input class="form-control" placeholder="Address"
                                value="<?=$d['adresse_dr']?>"></input>
                        </div>
                        <div class="form-group"><label>Contacts</label>
                            <div class="social-list">
                                <div class="social-item">
                                    <div class="row">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fa-brands fa-whatsapp fa-lg"
                                                    style="color: #1edc44;"></i></span>
                                            <input type="number" class="form-control" name="phone_dr"
                                                value="<?=$d['phone_dr']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="social-list">
                                <div class="social-item">
                                    <div class="row">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fa-solid fa-at fa-lg"
                                                    style="color: #5b90ec;"></i></span>
                                            <input type="text" class="form-control" name="phone_dr"
                                                value="<?=$d['email_dr']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><button type="button" class="btn btn-success w-100">Save changes</button>
                        <?php } ?>
                    </form>
                </div>
                <!------------------------ plan---------------->
                <div class="col col-12 col-md-6 mb-4">
                    <div class="v-timeline align-right">
                        <div class="line"></div>
                        <div class="timeline-box">
                            <div class="box-label"><span class="badge badge-primary">Today</span></div>
                            <div class="box-items">
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-doctor-alt bg-info"></div>
                                    </div>
                                    <div class="content-block">
                                        <div class="item-header">
                                            <?php foreach ($cnx->query("SELECT COUNT(*) AS totalrows FROM appoiments where id_dr = $_GET[ids]") as $v) { ?>
                                            <h3 class="h5 item-title">Number of patients</h3>
                                            <div class="item-date"><span>Now</span></div>
                                        </div>
                                        <div class="item-desc"> <?= $v['totalrows'] ?></div><?php } ?>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-drug bg-danger"></div>
                                    </div>
                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Appointment</h3>
                                        </div>
                                        <div class="item-desc">
                                            <table style="border-collapse: collapse; width: 100%;">
                                                <?php
                                                    $today = date('Y-m-d'); foreach ($cnx->query("SELECT pat.name_pat, app.date_app, app.time_app FROM appoiments as app INNER JOIN patients as pat ON (app.id_pat = pat.id_pat) WHERE id_dr = $_GET[ids] AND app.date_app = '$today'") as $ap) {
                                                ?>
                                                <tr>
                                                    <td><span><i class="fa fa-user"></i></span> <?= $ap['name_pat'] ?>
                                                    </td>
                                                    <td><?= $ap['date_app'] ?></td>
                                                    <td><?= $ap['time_app'] ?></td>
                                                </tr>
                                                <?php } ?>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-paralysis-disability bg-warning">
                                        </div>
                                    </div>
                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Medication</h3>
                                            <div class="item-date"><span>2h ago</span></div>
                                        </div>
                                        <div class="item-desc">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Consequuntur nam nisi veniam.</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-paralysis-disability bg-primary">
                                        </div>
                                    </div>
                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Operation</h3>
                                            <div class="item-date"><span>15h ago</span></div>
                                        </div>
                                        <div class="item-desc">Aenean lacinia bibendum nulla sed
                                            consectetur. Nullam id dolor id nibh ultricies vehicula ut id
                                            elit.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-box">
                            <div class="box-label"><span class="badge badge-success">Yesterday</span></div>
                            <div class="box-items">
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-paralysis-disability bg-dark"></div>
                                    </div>
                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">New patient</h3>
                                            <div class="item-date"><span>Jul 10</span></div>
                                        </div>
                                        <div class="item-desc">Lorem ipsum dolor sit.</div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon-block">
                                        <div class="item-icon icofont-stethoscope-alt"></div>
                                    </div>
                                    <div class="content-block">
                                        <div class="item-header">
                                            <h3 class="h5 item-title">Examination</h3>
                                            <div class="item-date"><span>Jul 10</span></div>
                                        </div>
                                        <div class="item-desc">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Consequuntur nam nisi veniam.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-0 mt-4">
                <div class="card-header">Patients 2019</div>
                <div class="card-body">
                    <div id="patientsEcharts" class="chat-container container-h-400"></div>
                </div>
            </div>
        </div>
    </div>
</main>




<script>
$(document).ready(function() {
    var params = new URLSearchParams(window.location.search);
    $('.vname').text(params.get('name'));
    $('.vphone').text(params.get('phone'));
    $('.vspec').text(params.get('specialty'));
    $('.vgend').text(params.get('gender'));
    $('.vemal').text(params.get('email'));
    $('.vaddr').text(params.get('addr'));
    $('.vprofi').text(params.get('profile'));
});
</script>
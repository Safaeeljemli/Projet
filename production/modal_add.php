<?php
include('dbh.inc.php');
?>
<!-- Modals -->

<div class="modal fade fixed" id="ModalAjoutRef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header well">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>Ajout d'une nouvelle référence</h3>
            </div>
            <form class='form-horizontal' method="post" action="add.php">

                <div class='modal-body'>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Nom</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='nomref'/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Couleur</label>
                        <div class='col-sm-6'>
                            <input type='color' class='form-control' name='couleurref' value="#ff0000"/>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <div class='pull-right'>
                        <div id='envoyer'>
                            <button type='submit' class='btn btn-primary' name='addref' value='✔' style='float: right'>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade fixed" id="ModalAjoutRef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header well">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>Ajout d'une nouvelle référence</h3>
            </div>
            <form class='form-horizontal' method="post" action="add.php">

                <div class='modal-body'>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Nom</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='nomref'/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Couleur</label>
                        <div class='col-sm-6'>
                            <input type='color' class='form-control' name='couleurref' value="#ff0000"/>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <div class='pull-right'>
                        <div id='envoyer'>
                            <button type='submit' class='btn btn-primary' name='addref' value='✔' style='float: right'>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade fixed" id="ModalAjoutUtilisateur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header well">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>Ajout d'un nouveau Utilisateur</h3>
            </div>
            <form class='form-horizontal' method="post" action="add.php">

                <div class='modal-body'>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Nom Complet</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='nomuser'/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> User name</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='name'/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Email</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='emailuser'/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Password</label>
                        <div class='col-sm-6'>
                            <input type='password' class='form-control' name='pswuser'/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Type</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='type'/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Tél</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='tel'/>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Admin</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='admin'/>
                        </div>
                    </div>


                </div>
                <div class='modal-footer'>
                    <div class='pull-right'>
                        <div id='envoyer'>
                            <button type='submit' class='btn btn-primary' name='adduser' value='✔' style='float: right'>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





<div class="modal fade fixed" id="ModalAjoutTypeChb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header well">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>Ajout d'un nouveau type de chambre</h3>
            </div>
            <form class='form-horizontal' method="post" action="add.php">
                <div class='modal-body'>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Type</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='typech' />
                        </div>
                    </div>

                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Nombre max de pax</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='nbpx' />
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <div class='pull-right'>
                        <div id='envoyer'>
                            <button type='submit' class='btn btn-primary' name='addtypech' value='✔' style='float: right'>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade fixed" id="ModalAjoutTypeRes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header well">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>Ajout d'un nouveau type de reservation</h3>
            </div>
            <form class='form-horizontal' method="post" action="add.php">

                <div class='modal-body'>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Type</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='typeres'/>
                        </div>
                    </div>
                </div>
                <div class='modal-body'>
                    <div class='form-group'>
                        <label class='col-sm-4 control-label'> Couleur</label>
                        <div class='col-sm-6'>
                            <input type='color' class='form-control' name='couleurref' value="#ff0000"/>
                        </div>
                    </div>
                </div>

                <div class='modal-footer'>
                    <div class='pull-right'>
                        <div id='envoyer'>
                            <button type='submit' class='btn btn-primary' name='addtyperes' value='✔' style='float: right'>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade fixed" id="ModalAjoutClt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header well">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>Ajout d'un nouveau client</h3>
            </div>
            <form class='form-horizontal' method="post" action="add.php">

                <div class='modal-body'>

                    <div class='form-group'>
                        <label class='col-sm-6 control-label'> Nom</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='nomcli'  />
                            <input type='hidden' class='form-control' name='idcl'  />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-6 control-label'> Prénom</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='prenomcli'  />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-6 control-label'> Age</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='ageClt'  />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-6 control-label'> Sexe</label>
                        <div class='col-sm-6'>
                            <select name='sexe' class='form-control' >
                                <option value='Femme'>Femme</option>
                                <option value='Homme'>Homme</option>
                            </select>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label class='col-sm-6 control-label'> Pieces d'id </label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='pieceidcli'  />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-6 control-label'> Nationalité</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='nationalite'  />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-6 control-label'> Tel</label>
                        <div class='col-sm-6'>
                            <input type='text' class='form-control' name='telcli'  />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-6 control-label'> Email</label>
                        <div class='col-sm-6'>
                            <input type='email' class='form-control' name='emailcli' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-sm-6 control-label'> Situation Fam</label>
                        <div class='col-sm-6'>
                            <select name='situationf' class='form-control' >
                                <option value='Celibataire'>Célibataire</option>
                                <option value='Marié'>Marié</option>
                            </select>
                        </div>
                    </div>
                    <br>


                </div>
                <div class='modal-footer'>
                    <div class='pull-right'>
                        <div id='envoyer'>
                            <button type='submit' class='btn btn-primary' name='addclt' value='✔' style='float: right'>Enregistrer</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade fixed" aria-labelledby="myModalLabel" id="supprModaltypCh<?php echo $typeCh['idTc']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header well">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>Modification d'un type de chambre</h3>
            </div>
            <form class='form-horizontal' method="post" action="edit.php">
                <div class='modal-body'>
                    <center>
                        <div class='form-group'>
                            <label class='col-sm-6 control-label'> Type</label>
                            <div class='col-sm-6'>
                                <input type='text' class='form-control' name='typecht' value="<?php echo $typeCh['type']; ?>"/>
                                <input type='hidden' class='form-control' name='idtcht' value="<?php echo $typeCh['idTc']; ?>"/>
                            </div>
                        </div>
                        <br><br>

                        <br><br>
                        <div class='form-group'>
                            <label class='col-sm-6 control-label'> Nombre max de pax</label>
                            <div class='col-sm-6'>
                                <input type='text' class='form-control' name='nbpxt' value="<?php echo $typeCh['nbreMaxPax']; ?>"/>
                            </div>
                        </div>
                    </center>
                </div>
                <div class='modal-footer'>
                    <div class='pull-right'>
                        <div id='envoyer'>
                            <button type='submit' class='btn btn-primary' name='delettypech' style='float: right'>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
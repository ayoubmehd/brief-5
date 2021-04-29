 <main class="mt-4">
     <h1 class="text-center mb-4">Add Suivers</h1>

     <div class="">
         <!-- Start Form -->
         <form id="addForm" action="<?php echo BASE_URL ?>/api/add_suiver" method="POST" class="form">

             <div class="form-group">
                 <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#choix">Group</button>
                 <input type="hidden" name="Groupe_id" id="group_id">
             </div>
             <div class="form-group">
                 <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#choix">Ensegniant</button>
                 <input type="hidden" name="Ensegniant_id" id="matiere_id">
             </div>
             <div class="form-group">
                 <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#choix">Salle</button>
                 <input type="hidden" name="Salle_id" id="salle_id">
             </div>
             <div class="form-group">
                 <label for="capacite">jour</label>
                 <select class="form-control" name="" id="">
                     <option value="-1">Jour</option>
                     <option value="1">Monday</option>
                     <option value="2">Tuesday</option>
                     <option value="3">Wednesday</option>
                     <option value="4">Thursday</option>
                     <option value="5">Friday</option>
                 </select>
             </div>
             <div class="form-group">
                 <label for="capacite">de</label>
                 <select class="form-control" name="" id="">
                     <option value="-1">de</option>
                     <option value="8:00">8:00</option>
                     <option value="9:00">9:00</option>
                     <option value="10:00">10:00</option>
                     <option value="11:00">11:00</option>
                     <option value="12:00">12:00</option>
                     <option value="14:00">14:00</option>
                     <option value="15:00">15:00</option>
                     <option value="16:00">16:00</option>
                     <option value="17:00">17:00</option>
                     <option value="18:00">18:00</option>
                 </select>
             </div>
             <div class="form-group">
                 <label for="capacite">a</label>
                 <select class="form-control" name="" id="">
                     <option value="-1">a</option>
                     <option value="8:00">8:00</option>
                     <option value="9:00">9:00</option>
                     <option value="10:00">10:00</option>
                     <option value="11:00">11:00</option>
                     <option value="12:00">12:00</option>
                     <option value="14:00">14:00</option>
                     <option value="15:00">15:00</option>
                     <option value="16:00">16:00</option>
                     <option value="17:00">17:00</option>
                     <option value="18:00">18:00</option>
                 </select>
             </div>
             <div class="form-group">
                 <button class="btn btn-success" name="add">Save</button>
             </div>


         </form>

         <!-- Modal -->
         <div class="modal fade" id="choix" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title">Modal title</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <form id="modelForm"></form>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <script src="<?php echo BASE_URL ?>/assets/js/fetch.js"></script>
     <script src="<?php echo BASE_URL ?>/assets/js/suiver.js"></script>
 </main>
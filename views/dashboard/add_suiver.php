 <main class="mt-4">
     <h1 class="text-center mb-4">Ajouter un reservation</h1>

     <div class="">
         <!-- Start Form -->
         <form id="addForm" action="<?php echo BASE_URL ?>/api/add_suiver" method="POST" class="form">

             <div class="form-group">
                 <label for="group">Group</label>
                 <select class="form-control" name="Groupe_id" id="group">
                     <option value="-1" disabled selected>Group</option>
                 </select>
             </div>
             <?php if ($this->isAdmin()) : ?>
                 <div class="form-group">
                     <label for="ensegniant">Ensegniant</label>
                     <select class="form-control" name="Ensegniant_id" id="ensegniant">
                         <option value="-1" disabled selected>Ensegniant</option>
                     </select>
                 </div>
             <?php endif; ?>
             <div class="form-group">
                 <label for="jour">jour</label>
                 <select class="form-control" name="jour" id="jour">
                     <option value="-1" disabled selected>Jour</option>
                     <option value="1">Monday</option>
                     <option value="2">Tuesday</option>
                     <option value="3">Wednesday</option>
                     <option value="4">Thursday</option>
                     <option value="5">Friday</option>
                 </select>
             </div>
             <div class="form-group">
                 <label for="de">de</label>
                 <select class="form-control" name="de" id="de">
                     <option value="-1" disabled selected>de</option>
                     <option value="8:00">8:00</option>
                     <option value="9:00">9:00</option>
                     <option value="10:00">10:00</option>
                     <option value="11:00">11:00</option>
                     <option value="14:00">14:00</option>
                     <option value="15:00">15:00</option>
                     <option value="16:00">16:00</option>
                     <option value="17:00">17:00</option>
                 </select>
             </div>
             <div class="form-group">
                 <label for="a">a</label>
                 <select class="form-control" name="a" id="a">
                     <option value="-1" disabled selected>a</option>
                     <option value="9:00">9:00</option>
                     <option value="10:00">10:00</option>
                     <option value="11:00">11:00</option>
                     <option value="12:00">12:00</option>
                     <option value="15:00">15:00</option>
                     <option value="16:00">16:00</option>
                     <option value="17:00">17:00</option>
                     <option value="18:00">18:00</option>
                 </select>
             </div>
             <div class="form-group">
                 <label for="salle">Salle</label>
                 <select class="form-control" name="Salle_id" id="salle">
                     <option value="-1" disabled selected>salle</option>
                 </select>
             </div>
             <div class="form-group">
                 <button class="btn btn-success" name="add">Save</button>
             </div>


         </form>


     </div>
     <script>
         const filds = [

             <?php if ($this->isAdmin()) : ?> "Ensegniant_id", <?php endif ?> "Groupe_id",
             "Salle_id",
             "jour",
             "de",
             "a"
         ];
     </script>
     <script src="<?php echo BASE_URL ?>/assets/js/fetch.js"></script>
     <script src="<?php echo BASE_URL ?>/assets/js/suiver.js"></script>
 </main>
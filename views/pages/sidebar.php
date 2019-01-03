<!-- INICIO DA BARRA LATERAL -->
<div id="sidebar" class="sidebar-expanded d-none d-md-block col-2">

  <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
  <!-- Bootstrap List Group -->
 <ul class="list-group sticky-top sticky-offset" >

      <!-- Separator with title -->
      <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed" style="border-top: none">
          <small class="sidebar-text">FILTRO DE PESQUISAS</small>
      </li>
      <!-- /END Separator -->


     <!-- MENU ESPECIE -->
     <a href="#submenu1" data-toggle="collapse" aria-expanded="false"
     class="bg-light list-group-item list-group-item-action flex-column align-items-start">
              <div class="d-flex w-100 justify-content-start align-items-center">

              <span class="fa fa-dashboard fa-fw mr-3"></span>
              <span class="menu-collapsed sidebar-text">Espécies</span>
              <!-- <span class="submenu-icon ml-auto"></span> -->

            </div>
     </a>

     <!-- SUBMENU DE ESPECIES-->
      <div id="submenu1" class="collapse sidebar-submenu">

        <!-- ITEM DE ESPECIES: CACHORRO -->
        <a href="#submenuCachorro" data-toggle="collapse" aria-expanded="false"
         class="bg-light list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">

                <span class="fa fa-dashboard fa-fw mr-3"></span>
                <span class="menu-collapsed sidebar-text">Cachorro</span>
                <!-- <span class="submenu-icon ml-auto"></span> -->

              </div>
       </a>

       <!-- SUBMENU DE CACHORRO -->
       <div id="submenuCachorro" class="collapse sidebar-submenu">

         <!-- CHECKBOX QUE MARCA/DESMARCA AS DEMAIS OPÇÕES -->
        <a href="#" class="list-group-item list-group-item-action bg-light">
           <div class="custom-control custom-checkbox">
             <input class="custom-control-input" type="checkbox"
             name="raca-cachorro" id="check-todos-cachorro">
             <label class="custom-control-label sidebar-text" for="check-todos-cachorro">
               <span class="menu-collapsed">Todos</span>
             </label>
           </div>
         </a>

         <!-- PEGA AS RAÇAS DE CACHORRO DO .JSON DAS RACAS E ESPECIES -->
         <?php
         // LE O ARQUIVO .JSON
         $arquivo = "../js/racas_especies.json";
         $info = file_get_contents($arquivo);
         $lendo = json_decode($info);

         // FOR PARA PERCORRER TODAS AS ESPECIES
         foreach($lendo as $especies){

           $especie = $especies->especie;

           // SE A ESPECIE FOR CACHORRO:
           if ($especie === 'Cachorro') {
             $racas = $especies->racas;

               // LE TODAS AS RAÇAS DE CACHORRO
               foreach ($racas as $raca) {
                 ?>
                 <a href="#" class="list-group-item list-group-item-action bg-light">
                   <div class="custom-control custom-checkbox">
                     <input class="custom-control-input check-cachorro" type="checkbox"
                      name="raca-cachorro" value="<?=$raca ?>" id="<?= $raca ?>">
                     <label class="custom-control-label sidebar-text" for="<?= $raca ?>">
                       <span class="menu-collapsed"><?= $raca ?></span>
                     </label>
                   </div>
                 </a>
                 <?php

               }
             }
          }
          ?>
       </div>
       <!-- FIM DA DIV DE SUBMENU DE CACHORRO -->

       <!-- ITEM DE ESPECIES: GATO -->
       <a href="#submenuGato" data-toggle="collapse" aria-expanded="false"
       class="bg-light list-group-item list-group-item-action flex-column align-items-start">
               <div class="d-flex w-100 justify-content-start align-items-center">

                 <span class="fa fa-dashboard fa-fw mr-3"></span>
               <span class="menu-collapsed sidebar-text">Gato</span>
               <!-- <span class="submenu-icon ml-auto"></span> -->

             </div>
      </a>

      <!-- SUBMENU DE GATO -->
      <div id="submenuGato" class="collapse sidebar-submenu">

        <!-- CHECKBOX QUE MARCA/DESMARCA OS DEMAIS CHECKBOX -->
        <a href="#" class="list-group-item list-group-item-action bg-light  ">
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox"
            name="raca-gato" id="check-todos-gato">
            <label class="custom-control-label sidebar-text" for="check-todos-gato">
              <span class="menu-collapsed">Todos</span>
            </label>
          </div>
        </a>

        <?php

        // LE TODAS AS ESPECIES
        foreach($lendo as $especies){

          $especie = $especies->especie;

          // SE A ESPECIE FOR GATO:
          if ($especie === 'Gato') {
            $racas = $especies->racas;

              // LE TODAS AS RACAS DE GATO
              foreach ($racas as $raca) {
                ?>
                <a href="#" class="list-group-item list-group-item-action bg-light  ">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input check-gato" type="checkbox"
                     name="raca-gato" value="<?= $raca; ?>" id="<?= $raca; ?>">
                    <label class="custom-control-label sidebar-text" for="<?= $raca; ?>">
                      <span class="menu-collapsed"><?= $raca; ?></span>
                    </label>
                  </div>
                </a>
                <?php
              }
            }
         }
         ?>
      </div>
      <!-- FIM DO SUBMENU DE GATO -->
   </div>
    <!-- FIM DO SUBMENU DE ESPECIES -->

    <!-- MENU DE SEXO DOS ANIMAIS -->
     <a href="#submenu2" data-toggle="collapse" aria-expanded="false"
     class="bg-light list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center">
           <span class="fa fa-dashboard fa-fw mr-3"></span>
            <span class="menu-collapsed sidebar-text">Sexo</span>
             <!-- <span class="submenu-icon ml-auto"></span> -->
         </div>
    </a>

     <!-- SUBMENU DOS SEXO DOS ANIMAIS -->
    <div id="submenu2" class="collapse sidebar-submenu">

       <!-- CHECKBOX MACHO -->
       <a href="#" class="list-group-item list-group-item-action bg-light  ">
         <div class="custom-control custom-checkbox">
           <input class="custom-control-input check-sexo" type="checkbox"
           name="sexo" value="M" id="macho">
           <label class="custom-control-label sidebar-text" for="macho">
             <span class="menu-collapsed">Macho</span>
           </label>
         </div>
       </a>

       <!-- CHECKBOX FEMEA -->
       <a href="#" class="list-group-item list-group-item-action bg-light  ">
         <div class="custom-control custom-checkbox">
           <input class="custom-control-input check-sexo" type="checkbox"
            name="sexo" value="F" id="femea">
           <label class="custom-control-label sidebar-text" for="femea">
             <span class="menu-collapsed">Femea</span>
           </label>
         </div>
       </a>
     </div>
     <!-- FIM DO SUBMENU DE SEXO DOS ANIMAIS -->

     <!-- MENU DE STATUS DO ANIMAL -->
     <a href="#submenu3" data-toggle="collapse" aria-expanded="false"
     class="bg-light list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center">
             <span class="fa fa-dashboard fa-fw mr-3"></span>
            <span class="menu-collapsed sidebar-text">Status</span>
             <!-- <span class="submenu-icon ml-auto"></span> -->
         </div>
    </a>

     <!-- SUBMENU DE STATUS DO ANIMAL -->
    <div id="submenu3" class="collapse sidebar-submenu">

       <!-- CHECKBOX DE ADOÇÃO -->
       <a href="#" class="list-group-item list-group-item-action bg-light  ">
         <div class="custom-control custom-checkbox">
           <input class="custom-control-input check-status" type="checkbox"
           name="status" value="adocao" id="adocao">
           <label class="custom-control-label sidebar-text" for="adocao">
             <span class="menu-collapsed">Em adoção</span>
           </label>
         </div>
       </a>

       <!-- CHECKBOX DE PERDIDO -->
       <a href="#" class="list-group-item list-group-item-action bg-light  ">
         <div class="custom-control custom-checkbox">
           <input class="custom-control-input check-status" type="checkbox"
           name="status" value="perdido" id="perdido">
           <label class="custom-control-label sidebar-text" for="perdido">
             <span class="menu-collapsed">Perdido</span>
           </label>
         </div>
       </a>
     </div>
     <!-- FIM DO SUBMENU DE STATUS DO ANIMAL -->

     <!-- MENU DE FAIXA ETARIA -->
     <a href="#submenu4" data-toggle="collapse" aria-expanded="false"
     class="bg-light list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center">
             <span class="fa fa-dashboard fa-fw mr-3"></span>
            <span class="menu-collapsed sidebar-text">Faixa etária</span>
             <!-- <span class="submenu-icon ml-auto"></span> -->
         </div>
    </a>

     <!-- SUBMENU DE FAIXA-ETARIA -->
    <div id="submenu4" class="collapse sidebar-submenu">

       <!-- CHECKBOX FILHOTE -->
       <a href="#" class="list-group-item list-group-item-action bg-light  ">
         <div class="custom-control custom-checkbox">
           <input class="custom-control-input check-faixa" type="checkbox"
           name="faixa" value="Filhote" id="filhote">
           <label class="custom-control-label sidebar-text" for="filhote">
             <span class="menu-collapsed">Filhote</span>
           </label>
         </div>
       </a>

       <!-- CHECKBOX COMUM -->
       <a href="#" class="list-group-item list-group-item-action bg-light  ">
         <div class="custom-control custom-checkbox">
           <input class="custom-control-input check-faixa" type="checkbox"
           name="faixa" value="Comum" id="comum">
           <label class="custom-control-label sidebar-text" for="comum">
             <span class="menu-collapsed">Comum</span>
           </label>
         </div>
       </a>

       <!-- CHECKBOX VELHO -->
       <a href="#" class="list-group-item list-group-item-action bg-light  ">
         <div class="custom-control custom-checkbox">
           <input class="custom-control-input check-faixa" type="checkbox"
           name="faixa" value="Velho" id="velho">
           <label class="custom-control-label sidebar-text" for="velho">
             <span class="menu-collapsed">Velho</span>
           </label>
         </div>
       </a>
     </div>
     <!-- FIM DO SUBMENU DE FAIXA-ETARIA -->
 </ul>
<!-- List Group END-->
</div>
<!-- FIM DA BARRA LATERAL -->
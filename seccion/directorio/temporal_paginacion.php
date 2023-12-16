       <!--PAGINACIÓN DE LA TABLA-->
       <nav aria-label="Page navigation example">
           <ul class="pagination">
               <li class="page-item <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
                   <a class="page-link" href="#/directorio?pagina=<?php echo ($pagina_actual - 1); ?>">Anterior</a>
               </li>

               <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                   <li class="page-item <?php echo ($pagina_actual == $i) ? 'active' : ''; ?>">
                       <a class="page-link" href="#/directorio?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                   </li>
               <?php endfor; ?>

               <li class="page-item <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                   <a class="page-link" href="#/directorio?pagina=<?php echo ($pagina_actual + 1); ?>">Siguiente</a>
               </li>
           </ul>


       </nav>
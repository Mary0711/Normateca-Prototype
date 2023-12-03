<?php
include_once("../controllers/backend/adminController.php");
include_once("../controllers/frontend/frontController.php");
setData();
doc();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Normateca - Certificaciones</title>
    <link rel="stylesheet" href="../assets/css/main.css" />
  </head>

  <body>
    <header>
      <img src="../assets/images/arecibo.png" />
      <div>
        <h1>Normateca</h1>
        <h3><i> Universidad de Puerto Rico en Arecibo </i></h3>
      </div>
    </header>
    <div class="titulo">
      <h2>Busqueda de Certificaciones</h2>
    </div>

    <main>
      <section>
        <div class="firstBox">
          <div>
            <h2>Parámetros de Búsqueda</h2>
            <form class="search" action="search.php" method="POST">

              <label for="certification_number">Numero de Certificación</label>
              <input type="text" id="certification_number" name="certification_number" placeholder="Buscar documento..." />
              
          
              <label for="Fiscal_year">Año Academico</label>
              <input type="text" id="Fiscal_year" name="Fiscal_year" placeholder="Buscar documento..." />

              <label for="Keywordnames">Palabra Clave</label>
              <input type="text" id="Keywordnames" name="Keywordnames" placeholder="Buscar documento..." />
              
              <label for="Document_title">Titulo</label>
              <input type="text" id="Document_title" name="Document_title" placeholder="Buscar documento..." />

              <label>Cuerpo</label>
              <div class="filters">
                <?php
                  if (count($_SESSION['corps']) > 0) {
                    foreach ($_SESSION['corps'] as $corp) {
                      echo'<input type="checkbox" id="'. $corp['corp_abbr'] .'" name="'. $corp['corp_abbr'] .'" />';
                      echo'<label for="'. $corp['corp_abbr'] .'"> '. $corp['corp_abbr'].' - ' . $corp['corp_name'] . ' </label><br />';
                    }
                  }
                  ?>
              </div>
              

              <label>Categoria</label>
              <div class="filters">
                <?php
                  if (count($_SESSION['cats']) > 0) {
                    foreach ($_SESSION['cats'] as $cat) {
                      echo '<input type="checkbox" id="'. $cat['cat_abbr'] .'" name="'. $cat['cat_abbr'] .'" />';
                      echo '<label for="'. $cat['cat_abbr'] .'"> '. $cat['cat_abbr'].' - '. $cat['cat_name'] .'</label><br />';
                    }
                  }
                ?>
              </div>

              <label>Relacion</label>
              <div class="filters">
                <input type="checkbox" id="enmendadopor" name="enmendadopor" />
                <label for="enmendadopor">Enmendado por</label><br />
                <input type="checkbox" id="derogadopor" name="derogadopor" />
                <label for="derogadopor">Derrogado por</label><br />
                <input type="checkbox" id="enmiendaa" name="enmiendaa" />
                <label for="enmiendaa">Enmienda a</label><br />
                <input type="checkbox" id="derogaa" name="derogaa" />
                <label for="derogaa">Derroga a</label><br />
              </div>

              <label for="Date_created">Fecha</label>
              <input type="date" id="Date_created" name="Date_created" placeholder="Buscar documento..." />

              <label>Rango de Fecha</label>
              <div class="dates">
                <label for="desde">Desde</label>
                <input type="date" id="desde" name="desde" placeholder="Buscar documento..." />
                <br /><label for="hasta">Hasta</label>
                <input type="date" id="hasta" name="hasta" placeholder="Buscar documento..." />
              </div>
            <button type="submit">Limpiar</button>
            <button type="submit">Buscar</button>
            </form>
          </div>
        </div>
             <div class="lastBox">
               <div>
                 <h2>Certificaciones Recientes</h2>
                 <hr />
                 <div class="recents">
                   <div class="JA">
                     <h3>Junta Administrativa</h3>
                     <li>numero-año, fecha</li>
                     <li>numero-año, fecha</li>
                     <li>numero-año, fecha</li>
                     <li>numero-año, fecha</li>
                   </div>
                   <div class="SA">
                     <h3>Senado Academico</h3>
                     <li>numero-año, fecha</li>
                     <li>numero-año, fecha</li>
                     <li>numero-año, fecha</li>
                     <li>numero-año, fecha</li>
                   </div>
                 </div>
               </div>
     
               <div class="results">
                 <label for="records">Records:</label>
                 <select id="records" name="records">
                   <option value="option1">10</option>
                   <option value="option2">25</option>
                   <option value="option3">50</option>
                   <option value="option4">100</option>
                 </select>
     
                  <table>
                    <thead>
                      <tr>
                        <th>Cuerpo</th>
                        <th>Numero</th>
                        <th>Año Academico</th>
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>Relaciones</th>
                        <th>Descargar</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($_SESSION['documentos'] as $doc) {
                      echo '<tr>';
                      echo '<td>'.$doc['cuerpo'].'</td>'; 
                      echo '<td>'.$doc['certi'].'</td>';
                      echo '<td>'.$doc['fiscal'].'</td>';
                      echo '<td>'.$doc['title'].'</td>';
                      echo '<td>'.$doc['categoria'].'</td>';
                      echo '<td>'.$doc['target_derroga'] . $doc['target_enmienda'].'</td>';
                      echo '<td><a href=".pdf">PDF</a></td>'; 
                      echo '</tr>';
                    }
                    ?>
                    </tbody>
                  </table>

                 <div class="table-aditional">
                   <p>Mostrando 1 a 10 de 126 récords</p>
                   <div class="pagination">
                     <a href="#">&laquo;</a>
                     <a href="#">1</a>
                     <a class="active" href="#">2</a>
                     <a href="#">3</a>
                     <a href="#">4</a>
                     <a href="#">5</a>
                     <a href="#">6</a>
                     <a href="#">&raquo;</a>
                   </div>
                 </div>
          </div>
        </div>
      </section>
    </main>
  </body>
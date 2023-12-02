
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Normateca - Certificaciones</title>
    <link rel="stylesheet" href="./assets/css/main.css" />
  </head>

  <body>
    <header>
      <img src="./assets/images/arecibo.png" />
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
              
          
              <label>Año Academico</label>
              <input type="text" id="Fiscal_year" name="Fiscal_year" placeholder="Buscar documento..." />

              <label>Palabra Clave</label>
              <input type="text" id="Keywordnames" name="Keywordnames" placeholder="Buscar documento..." />
              
              <label>Titulo</label>
              <input type="text" id="Document_title" name="Document_title" placeholder="Buscar documento..." />

              <label>Cuerpo</label>
              <div class="filters">
                <input type="checkbox" id="JA" name="JA" />
                <label>JA - Junta Academica</label><br />
                <input type="checkbox" id="SA" name="SA" />
                <label>SA - Senado Academico</label><br />
                <input type="checkbox" id="JG" name="JG" />
                <label>JG - Junta de Gobierno</label><br />
                <input type="checkbox" id="FIN" name="FIN" />
                <label>FI - Finanzas</label><br />
                <input type="checkbox" id="OPEI" name="OPEI" />
                <label>OPEI - Oficina de Planificaciones</label><br />
              </div>
              

              <label>Categoria</label>
              <div class="filters">
                <input type="checkbox" id="SOL"  name="SOL" />
                <label>SOL - Solicitudes</label><br />

                <input type="checkbox" id="ACU" name="ACU" />
                <label>ACU - Acuerdos</label><br />

                <input type="checkbox" id="APR" name="APR" />
                <label>APR - Aprobaciones</label><br />

                <input type="checkbox" id="CA" name="CA" />
                <label>CA - Calendario Academico</label><br />

                <input type="checkbox" id="CON" name="CON" />
                <label>CON - Consideraciones</label><br />

                <input type="checkbox" id="POL" name="POL" />
                <label>POL - Politicas</label><br />

                <input type="checkbox" id="CC" name="CC" />
                <label>CC - Cartas Circulares</label><br />
              </div>

              <label>Relacion</label>
              <div class="filters">
                <input type="checkbox" id="enmendadopor" name="enmendadopor" />
                <label>Enmendado por</label><br />
                <input type="checkbox" id="derogadopor" name="derogadopor" />
                <label>Derrogado por</label><br />
                <input type="checkbox" id="enmiendaa" name="enmiendaa" />
                <label>Enmienda a</label><br />
                <input type="checkbox" id="derogaa" name="derogaa" />
                <label>Derroga a</label><br />
              </div>

              <label>Fecha</label>
              <input type="date" id="Date_created" name="Date_created" placeholder="Buscar documento..." />

              <label>Rango de Fecha</label>
              <div class="dates">
                <label>Desde</label>
                <input type="date" id="desde" name="desde" placeholder="Buscar documento..." />
                <br /><label>Hasta</label>
                <input type="date" id="hasta" name="hasta" placeholder="Buscar documento..." />
              </div>
            </form>
            <button type="submit">Limpiar</button>
            <button type="submit">Buscar</button>
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
                <th>Cuerpo</th>
                <th>Numero</th>
                <th>Año Academico</th>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Relaciones</th>
                <th>Descargar</th>
              </thead>
              <tbody>
                <tr>
                  <td>JA</td>
                  <td>1</td>
                  <td>2023</td>
                  <td>El misterio de pepito pelon</td>
                  <td>solicitud</td>
                  <td>-</td>
                  <td>PDF</td>
                </tr>
                <tr>
                  <td>JA</td>
                  <td>1</td>
                  <td>2023</td>
                  <td>El misterio de pepito pelon</td>
                  <td>solicitud</td>
                  <td>-</td>
                  <td>PDF</td>
                </tr>
                <tr>
                  <td>JA</td>
                  <td>1</td>
                  <td>2023</td>
                  <td>El misterio de pepito pelon</td>
                  <td>solicitud</td>
                  <td>-</td>
                  <td>PDF</td>
                </tr>
                <tr>
                  <td>JA</td>
                  <td>1</td>
                  <td>2023</td>
                  <td>Elsdvgdfgbhghbdh misterio de pepito pelon</td>
                  <td>solicitud</td>
                  <td>-</td>
                  <td>PDF</td>
                </tr>
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
</html>

<?php

$certification_number = $_POST['certification_number'];
$Fiscal_year = $_POST['Fiscal_year'];
$Keywordnames = $_POST['Keywordnames'];
$JA = $_POST['JA'];
$SA = $_POST['SA'];
$JG = $_POST['JG'];
$FIN = $_POST['FIN'];
$OPEI = $_POST['OPEI'];
$SOL = $_POST['SOL'];
$ACU = $_POST['ACU'];
$APR = $_POST['APR'];
$CA = $_POST['CA'];
$CON = $_POST['CON'];
$POL = $_POST['POL'];
$CC = $_POST['CC'];

$enmendadopor = $_POST['enmendadopor'];
$derogadopor = $_POST['derogadopor'];
$enmiendaa = $_POST['enmiendaa'];
$derogaa = $_POST['derogaa'];

$Date_created = $_POST['Date_created'];
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

$query = "SELECT * FROM your_table WHERE 
         certification_number LIKE '%$certificationNumber%' 
         AND academic_year LIKE '%$academicYear%'
         AND (keyword_column1 LIKE '%$keyword%' OR keyword_column2 LIKE '%$keyword%')
         AND title LIKE '%$title%'";


$result = mysqli_query($your_db_connection, $query);


$output = '';
while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<tr>";
   
    $output .= "<td>{$row['cuerpo']}</td>";
    $output .= "<td>{$row['numero']}</td>";
    $output .= "<td>{$row['ano_academico']}</td>";
    $output .= "<td>{$row['titulo']}</td>";
    $output .= "<td>{$row['categoria']}</td>";
    $output .= "<td>{$row['relaciones']}</td>";
    $output .= "<td>PDF</td>"; 
    $output .= "</tr>";
}


echo $output;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Normateca</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <header>
      <img src="/images/logo.png" />
      <div>
        <h1>Administrador Normateca</h1>
        <h3><i> Universidad de Puerto Rico en Arecibo </i></h3>
      </div>
    </header>

    <section class="container">
      <div class="principales">
        <div class="tabs">
          <input type="radio" name="tab" id="subirBtn" checked />
          <label for="subirBtn">Subir Archivo</label>
          <input type="radio" name="tab" id="editarBtn" />
          <label for="editarBtn">Editar Archivo</label>
          <input type="radio" name="tab" id="crearBtn" />
          <label for="crearBtn">Crear Categorias</label>
        </div>

        <div class="tab-content">
          <div id="subir" class="subir">
            
            <div class="archivo">
              <form method="POST" action="admin.php" enctype="multipart/form-data">
                <div class="full-size pdf">
                <label for="pdf"> Subir Archivo: </label
                  ><input type="file" id="pdf" name="pdf" value="" required />
                </div>
                <div class="side-by-side">
                  <label for="filename"> Nombre: </label>
                  <input type="text" name="filename" id="filename" placeholder="nombre del archivo" />

                  <label for="fecha"> Fecha: </label
                  ><input type="date" id="fecha" />

                  <label for="decripcion"> Descripcion: </label
                  ><textarea
                    type="text"
                    id="descripcion"
                    rows="5"
                    maxlength="150"
                    placeholder="decripcion del archivo. Breve oracion del tema."
                  ></textarea>

                  <label for="Numero_certificacion"> Numero_certificacion: </label>
                  <input type="text" id="Numero_certificacion" placeholder="Numero_certificacion"/>
                  
                <label for="estado"> Estado del Documento: </label>
                <select id="estado" name="estado">
                  <option value="">Select</option>
                  <option value="activo">Activo</option>
                  <option value="inactivo">Inactivo</option>
                </select>

                </div>
                <div class="side-by-side">
                  
                  
                <label for="filename"> Categoria: </label>
                <select id="categorias" name="categorias">
                  <option value="">Select</option>
                  <option value="JA">Junta Academica</option>
                  <option value="SA">Senado Academico</option>
                  <option value="cat1">Categoria 1</option>
                  <option value="cat2">Categoria 2</option>
                </select>

                <label for="filename"> Lenguaje de Documento: </label>
                <select id="lenguaje" name="lenguaje">
                  <option value="">Select</option>
                  <option value="esp">Español</option>
                  <option value="eng">Ingles</option>
                  
                </select>
               
                <label for="filename"> Año Fiscal : </label>
                <select id="añofiscal" name="añofiscal">
                  <option value="">Select</option>
                  <option value="2022-2023">2022-2023</option>
                  <option value="2023-2024">2023-2024</option>
                  <option value="2024-2025">2024-2025</option>
                  <option value="2025-2026">2025-2026</option>
                </select>

                <label for="filename"> Sub-Categorias: </label>
                <select id="subcategorias" name="subcategorias">
                  <option value="">Select</option>
                  <option value="JA">Certificado</option>
                  <option value="SA">Solicitud</option>
                  <option value="cat1">Aprobado</option>
                  <option value="cat2">Sub-Categoria 2</option>
                </select>
                <label for="firma"> Firmado por: </label
                ><input type="text" id="firma" />
              </div>

              <div class="full-size guarda">
              <input type="submit" name="submit" value="Guardar" />
              </div>

            </form>
              
            </div>
            <div class="backline">
              <h3>Añadir enlace a otro archivo</h3>

              <div class="search-bar">
                <input type="text" placeholder="Buscar por nombre" />
                <button type="submit">Buscar</button>
              </div>
              <div class="sTable">
              <table>
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Enlazar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Result 1</td>
                    <td>October 1, 2023</td>

                    <td><button>Seleccionar</button></td>
                  </tr>
                  <tr>
                    <td>Result 2</td>
                    <td>September 15, 2023</td>

                    <td><button>Seleccionar</button></td>
                  </tr>
                  <tr>
                    <td>Result 3</td>
                    <td>August 27, 2023</td>

                    <td><button>Seleccionar</button></td>
                  </tr>
                  <tr>
                    <td>Result 3</td>
                    <td>August 27, 2023</td>

                    <td><button>Seleccionar</button></td>
                  </tr>
                  <tr>
                    <td>Result 3</td>
                    <td>August 27, 2023</td>

                    <td><button>Seleccionar</button></td>
                  </tr>
                  <tr>
                    <td>Result 3</td>
                    <td>August 27, 2023</td>

                    <td><button>Seleccionar</button></td>
                  </tr>
                </tbody>
              </table>
              </div>

              <div class="razon">
                <form>
                  <label>¿Por que es enlazado?:</label>
                  <input
                    typw="text"
                    name="razon"
                    placeholder="enmendado por/a, derrogado por/a ..."
                  />
                </form>
              </div>
            </div>
          </div>
          <div id="editar" class="editar" style="display: none">
            
            

            <br />
            <h3>Editar archivo</h3>
            <div class="editInfo">
              <div class="editarchivo">
                <form>
                  <label for="e_filename"> Nombre: </label
                  ><input
                    type="text"
                    id="e_filename"
                    name= "ename"
                    placeholder="nombre del archivo"
                  />

                  <label for="e_fecha"> Fecha: </label
                  ><input type="date" id="e_fecha" />

                  <label for="e_decripcion"> Descripcion: </label
                  ><textarea
                    type="text"
                    id="e_descripcion"
                    rows="5"
                    maxlength="150"
                    placeholder="decripcion del archivo. Breve oracion del tema."
                  ></textarea>
                </form>
                
              </div>

              <div class="editarchivo2">
                <form>
                  <label for="e_cat"> Categoria: </label>
                  <select id="e_categorias" name="categorias">
                    <option value="">Select</option>
                    <option value="JA">Junta Academica</option>
                    <option value="SA">Senado Academico</option>
                    <option value="cat1">Categoria 1</option>
                    <option value="cat2">Categoria 2</option>
                  </select>

                  <label for="e_sub"> Sub-Categorias: </label>
                  <select id="e_subcategorias" name="subcategorias">
                    <option value="">Select</option>
                    <option value="JA">Certificado</option>
                    <option value="SA">Solicitud</option>
                    <option value="cat1">Aprobado</option>
                    <option value="cat2">Sub-Categoria 2</option>
                  </select>
                  <label for="firma"> Firmado por: </label
                  ><input type="text" id="e_firma" />
                  <label>¿Por que es enlazado?:</label>
                  <input
                    typw="text"
                    name="razon"
                    placeholder="enmendado por/a, derrogado por/a ..."
                  />
                  <input class="botonedit" name = "submit" type="submit" value="Guardar" />
                  
                </form>
                
              </div>
              <div class="search-bar">
                <input
                  type="text"
                  placeholder="Buscar archivo a editar por nombre, año, categoria, subcategoria..."
                />
                <button type="submit">Buscar</button>
              </div>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Enlazar</th>
                  <th>Editar</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Result 1</td>
                  <td>October 1, 2023</td>
                  <td><button>Enlazar</button></td>
                  <td><button>Editar</button></td>
                </tr>
                <tr>
                  <td>Result 2</td>
                  <td>September 15, 2023</td>
                  <td><button>Enlazar</button></td>

                  <td><button>Editar</button></td>
                </tr>
                <tr>
                  <td>Result 3</td>
                  <td>August 27, 2023</td>
                  <td><button>Enlazar</button></td>

                  <td><button>Editar</button></td>
                </tr>
                <tr>
                  <td>Result 3</td>
                  <td>August 27, 2023</td>
                  <td><button>Enlazar</button></td>

                  <td><button>Editar</button></td>
                </tr>
                <tr>
                  <td>Result 3</td>
                  <td>August 27, 2023</td>
                  <td><button>Enlazar</button></td>

                  <td><button>Editar</button></td>
                </tr>
                <tr>
                  <td>Result 3</td>
                  <td>August 27, 2023</td>
                  <td><button>Enlazar</button></td>

                  <td><button>Editar</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="crear" class="crear" style="display: none">
            <div class="crearForm">
              <form>
                <label> Categoria a añadir: </label>
                <input type="text" />
                <label> Subcategoria a añadir: </label>
                <input type="text" />
              </form>
              <input type="submit" value="Añadir" />
            </div>
          </div>
        </div>
      </div>

      <div class="aside">
        <h3>Nombre de Usuario</h3>
        <h3>Archivos Subidos</h3>
      </div>
    </section>

    <footer>
      <h4>Visita nuestro sitio web:<a href="#"> upra.edu</a></h4>
    </footer>

    <!-- <script src="main.js"></script> -->
  </body>
</html>
<?php
include 'db_info.php';


// Rest of your PHP code, including the file upload and database insertion


if (isset($_POST['submit'])) {
  
    $data2 = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $data3 = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $data4 = isset($_POST['Numero_certificacion']) ? $_POST['Numero_certificacion'] : '';
    $data5 = isset($_POST['estado']) ? $_POST['estado'] : '';
    $data6 = isset($_POST['categorias']) ? $_POST['categorias'] : '';
    $data7 = isset($_POST['lenguaje']) ? $_POST['lenguaje'] : '';
    $data8 = isset($_POST['añofiscal']) ? $_POST['añofiscal'] : '';
    $data9 = isset($_POST['subcategorias']) ? $_POST['subcategorias'] : '';
    $data10 = isset($_POST['firma']) ? $_POST['firma'] : '';
    $data1 = isset($_POST['filename']) ? $_POST['filename'] : '';

    $Admin_id = 1;
    $pdf = $_FILES['pdf']['name'];
    $pdf_type = $_FILES['pdf']['type'];
    $pdf_size = $_FILES['pdf']['size'];
    $pdf_temp_loc = $_FILES['pdf']['tmp_name'];
    $pdf_store = "uploads/" . $pdf;

    move_uploaded_file($pdf_temp_loc, $pdf_store);

    // Get other form data
 
    
    // Create and execute the SQL query
    $sql = "INSERT INTO documentos ( Document_title, Category_abbr, Subcategory_abbr, Numero_certificacion, Año_Fiscal,Document_lenguaje,Admin_id,Document_path, Upload_Date,Document_state,firma) 
        VALUES ('$pdf', '$data1', '$data2','$data3','$data4','$data5','$Admin_id','$data7','$data8','$data9','$data10')";

    $query = mysqli_query($dbc, $sql);
}
?> 





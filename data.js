const data = {
  1: {
    name: "file1",
    fecha: "2020-10-26",
    categoria: "JA",
    subCategoria: "NA",
    Backlink: {},
    path: "NA",
  },
  2: {
    name: "file2",
    fecha: "2020-10-26",
    categoria: "SA",
    subCategoria: "NA",
    Backlink: {},
    path: "NA",
  },
  3: {
    name: "file3",
    fecha: "2020-10-26",
    categoria: "C3",
    subCategoria: "NA",
    Backlink: {},
    path: "NA",
  },
  4: {
    name: "file4",
    fecha: "2020-10-26",
    categoria: "NA",
    subCategoria: "NA",
    Backlink: {},
    path: "NA",
  },
  5: {
    name: "file5",
    fecha: "2020-10-26",
    categoria: "NA",
    subCategoria: "NA",
    Backlink: {},
    path: "NA",
  },
  6: {
    name: "file6",
    fecha: "2020-10-26",
    categoria: "NA",
    subCategoria: "NA",
    Backlink: {},
    path: "NA",
  },
  6: {
    name: "pdf",
    fecha: "2020-10-26",
    categoria: "NA",
    subCategoria: "NA",
    Backlink: {},
    path: "NA",
  },
};

sessionStorage.setItem("files", JSON.stringify(data));
console.log(JSON.parse(sessionStorage.getItem("files")));

function createRow(
  data,
  table,
  categorias = "*",
  subCategorias = "*",
  inputName = "*"
) {
  if (categorias != "*" && !categorias.includes(data.categoria)) {
    return null;
  }

  if (inputName != "*" && !data.name.includes(inputName)) {
    return null;
  }

  const name = document.createElement("td");
  const fecha = document.createElement("td");
  const categoria = document.createElement("td");
  const subCategoria = document.createElement("td");
  const backlink = document.createElement("td");
  const path = document.createElement("td");
  const a = document.createElement("a");
  a.href = "";
  a.textContent = "Download";
  path.appendChild(a);

  name.textContent = data.name;
  fecha.textContent = data.fecha;
  categoria.textContent = data.categoria;
  subCategoria.textContent = data.subCategoria;
  backlink.textContent = "Enlace";

  const row = document.createElement("tr");
  row.appendChild(name);
  row.appendChild(fecha);
  row.appendChild(categoria);
  row.appendChild(subCategoria);
  row.appendChild(backlink);
  row.appendChild(path);

  table.appendChild(row);
}

function updateTable(table, cats, nameInput) {
  while (table.firstChild) table.removeChild(table.firstChild);

  let name = nameInput.value.trim();

  if (name == undefined || name == "") {
    name = "*";
  }
  for (let i in data) {
    createRow(data[i], table, cats, "*", name);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const elements = {
    categorias: {
      JuntaCheck: document.getElementById("JA"),
      SenadoCheck: document.getElementById("SA"),
      Cat3Check: document.getElementById("C3"),
    },
    search: {
      input: document.getElementById("search"),
      btn: document.getElementById("submit"),
    },
    tableBody: document.getElementById("tableBody"),
  };

  let cats = "*";

  elements.categorias.JuntaCheck.addEventListener("click", () => {
    if (cats.includes("JA")) {
      cats = cats.filter((cat) => cat != "JA");

      if (cats.length == 0) {
        cats = "*";
      }
    } else {
      if (cats == "*") {
        cats = ["JA"];
      } else {
        cats.push("JA");
      }
    }

    updateTable(elements.tableBody, cats, elements.search.input);
  });

  elements.categorias.SenadoCheck.addEventListener("click", () => {
    if (cats.includes("SA")) {
      cats = cats.filter((cat) => cat != "SA");

      if (cats.length == 0) {
        cats = "*";
      }
    } else {
      if (cats == "*") {
        cats = ["SA"];
      } else {
        cats.push("SA");
      }
    }

    updateTable(elements.tableBody, cats, elements.search.input);
  });

  elements.categorias.Cat3Check.addEventListener("click", () => {
    if (cats.includes("C3")) {
      cats = cats.filter((cat) => cat != "C3");

      if (cats.length == 0) {
        cats = "*";
      }
    } else {
      if (cats == "*") {
        cats = ["C3"];
      } else {
        cats.push("C3");
      }
    }

    updateTable(elements.tableBody, cats, elements.search.input);
  });

  elements.search.btn.addEventListener("click", () => {
    updateTable(elements.tableBody, cats, elements.search.input);
  });

  updateTable(elements.tableBody, cats, elements.search.input);
});

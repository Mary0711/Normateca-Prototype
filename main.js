function changeVisibility(tab, lastTab) {
  lastTab.style.display = "none";
  tab.style.display = "block";
}

document.addEventListener("DOMContentLoaded", () => {
  const elements = {
    tabs: {
      subir: document.getElementById("subir"),
      editar: document.getElementById("editar"),
      crear: document.getElementById("crear"),
    },
    buttons: {
      subir: document.getElementById("subirBtn"),
      editar: document.getElementById("editarBtn"),
      crear: document.getElementById("crearBtn"),
    },
    lastTab: document.getElementById("subir"),
  };

  elements.buttons.subir.addEventListener("click", () => {
    changeVisibility(elements.tabs.subir, elements.lastTab);

    elements.lastTab = elements.tabs.subir;
  });

  elements.buttons.editar.addEventListener("click", () => {
    changeVisibility(elements.tabs.editar, elements.lastTab);

    elements.lastTab = elements.tabs.editar;
  });

  elements.buttons.crear.addEventListener("click", () => {
    changeVisibility(elements.tabs.crear, elements.lastTab);

    elements.lastTab = elements.tabs.crear;
  });
});

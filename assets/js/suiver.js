//  Add suiver Page
const group = document.querySelector("#group");
const ensegniant = document.querySelector("#ensegniant");
const salle = document.querySelector("#salle");
const jour = document.querySelector("#jour");
const de = document.querySelector("#de");
if (jour) jour.addEventListener("change", getSalls);
if (de) de.addEventListener("change", getSalls);

const times = [
  { id: "8:00", },
  { id: "9:00", },
  { id: "10:00", },
  { id: "11:00", },
  { id: "12:00", },
  { id: "14:00", },
  { id: "15:00", },
  { id: "16:00", },
  { id: "17:00", },
  { id: "18:00" },
];

const jours = [
  {
    id: 1,
    label: "Monday"
  },
  {
    id: 2,
    label: "Tuesday"
  },
  {
    id: 3,
    label: "Wednesday"
  },
  {
    id: 4,
    label: "Thursday"
  },
  {
    id: 5,
    label: "Friday"
  }
]

async function main() {
  const group_all = await fetchElm("group_all");
  const ensegniant_all = await fetchElm("ensegniant_all");

  group_all.data.forEach((element) => {
    const option = document.createElement("option");

    option.value = element.id;
    option.textContent = element.libelle;

    group.appendChild(option);
  });
  ensegniant_all.data.forEach((element) => {
    const option = document.createElement("option");

    option.value = element.id;
    option.textContent = element.nom;

    ensegniant.appendChild(option);
  });
}

if (group) {
  main();
}

async function getSalls() {
  if (jour.value == -1) return;
  if (de.value == -1) return;

  const salle_data = await fetchElm(
    `salle_aviable/?jour=${jour.value}&de=${encodeURIComponent(de.value)}`
  );

  salle_data.data.forEach((element) => {
    const option = document.createElement("option");

    option.value = element.id;
    option.textContent = element.libelle;

    salle.appendChild(option);
  });
}

// Suiver Page
const tbody = document.querySelector(".tbody");
const editButtons = document.querySelectorAll(".edit-button");

Array.from(editButtons).forEach((elm) => {
  elm.addEventListener("click", clickEditButton);
});

editForm.addEventListener("reset", resetEditForm);



// Event Listener
async function resetEditForm(event) {
  event.preventDefault();
  const data = await fetchElm("suiver_all");
  displaySuiverAll(data.data, tbody);
}

function clickEditButton(event) {
  event.preventDefault();

  const trArray = Array.from(event.target.parentNode.parentElement.children);

  // Ensegniant
  const ensegniant = trArray[1];
  displayEnsegniant(ensegniant);

  // Groupe
  const groupe = trArray[2];
  displayGroup(groupe);

  // jour
  const jour = trArray[4];
  displayJour(jour);
  // de
  const de = trArray[5];
  displayDe(de);
  // a
  const a = trArray[6];
  displayA(a);

  // Salle
  const salle = trArray[3];
  displaySalle(salle, jour, de);

  // Buttons
  const actions = trArray[7];
  editForm.setAttribute("action", event.target.href);
  displayFormButtons(actions);
}

function displayEnsegniant(htmlElm) {
  display(htmlElm, "ensegniant_all", "nom", "Ensegniant", "Ensegniant_id");
}

function displayGroup(htmlElm) {
  display(htmlElm, "group_all", "effecrif", "Groupe", "Groupe_id");
}

async function displaySalle(salleElm, jourElm, deElm) {
  await display(salleElm, "salle_all", "libelle", "Salle", "Salle_id");
  const salleSelect = salleElm.querySelector("select");
  const jourSelect = jourElm.querySelector("select");
  const deSelect = deElm.querySelector("select");
  jourSelect.addEventListener("change", () => {
    fetchSalle(
      salleSelect,
      jourSelect,
      deSelect
    );
  });
}

function displayJour(htmlElm) {
  const select = createSelect(jours, "label", "Jour", htmlElm.innerHTML);
  select.name = "jour";
  htmlElm.innerHTML = "";
  htmlElm.appendChild(select);
}

function displayDe(htmlElm) {
  const select = createSelect(times, "id", "De", htmlElm.innerHTML);
  select.name = "de";
  htmlElm.innerHTML = "";
  htmlElm.appendChild(select);
}

function displayA(htmlElm) {
  const select = createSelect(times, "id", "A", htmlElm.innerHTML);
  select.name = "a";
  htmlElm.innerHTML = "";
  htmlElm.appendChild(select);
}

function displayFormButtons(htmlElm) {
  const submitButton = createButton("editForm", "edit", "btn btn-success edit-button", "Save");
  const cancelButton = createButton("editForm", "", "btn btn-danger", "Cancel", "reset");
  htmlElm.innerHTML = "";
  htmlElm.appendChild(submitButton);
  htmlElm.appendChild(cancelButton);
}

async function display(htmlElm, endpoit, prop, placeholder, name) {
  const data = await fetchElm(endpoit);
  const select = createSelect(data.data, prop, placeholder, htmlElm.innerHTML);
  select.name = name;
  htmlElm.innerHTML = "";
  htmlElm.appendChild(select);
  return select;
}

function createSelect(data, prop, placeholder, value, form = "editForm") {
  const select = document.createElement("select");
  select.setAttribute("form", form);
  select.className = "form-control";
  select.innerHTML = `<option selected disabled>${placeholder}</option>`;
  data.forEach((elm) => {
    const option = document.createElement("option");
    option.textContent = elm[prop];
    option.value = elm.id;
    if (parseInt(value) === parseInt(elm.id)) {
      option.selected = true;
    }
    select.appendChild(option);
  });
  return select;
}


// Helper functions
async function fetchSalle(salleElm, jourElm, deElm) {
  if (jourElm.value == -1) return;
  if (deElm.value == -1) return;

  const salle_data = await fetchElm(
    `salle_aviable/?jour=${jourElm.value}&de=${encodeURIComponent(deElm.value)}`
  );

  clearSelect(salleElm, "Salle");
  salle_data.data.forEach((element) => {
    const option = document.createElement("option");

    option.value = element.id;
    option.textContent = element.libelle;

    salleElm.appendChild(option);
  });
}

// DOM Functions
function clearSelect(select, placeholder, initial = true) {
  select.innerHTML = `<option ${initial ? "selected" : ""} disabled>${placeholder}</option>`;
}

function createButton(form, name, className, text, type = "submit") {

  const button = document.createElement("button");
  button.setAttribute("form", form);
  button.name = name;
  button.className = className;
  button.textContent = text;
  button.type = type;
  return button;
}

function createTr(...children) {

  const tr = document.createElement("tr");
  children.forEach(td => {
    tr.appendChild(td);
  });
  return tr;
}

function createTd(text, atributes = [], ...children) {
  const td = document.createElement("td");
  td.textContent = text;
  atributes.forEach(attr => {
    td.setAttribute(attr.name, attr.value);
  });
  children.forEach(child => {
    td.appendChild(child);
  });
  return td;
}

function createA(text, href, className, clickEvent = () => { }, ...children) {
  const a = document.createElement("a");
  a.textContent = text;
  a.href = href;
  a.className = className;
  a.addEventListener("click", clickEvent);
  children.forEach(child => {
    a.appendChild(child);
  });

  return a;
}

// End DOM Functions

function displaySuiverAll(data, htmlElm) {
  htmlElm.innerHTML = "";
  data.forEach(elm => {

    htmlElm.appendChild(
      createTr(
        createTd(elm.id),
        createTd(elm.Ensegniant_id),
        createTd(elm.Groupe_id),
        createTd(elm.Salle_id),
        createTd(elm.jour),
        createTd(elm.de),
        createTd(elm.a),
        createTd("", [],
          createA("Edit", `/api/edit_suiver/${elm.id}`, "btn btn-success edit-button", clickEditButton),
          document.createTextNode(" "),
          createA("Remove", `/api/delete_suiver/${elm.id}`, "btn btn-danger"),
        ),
      )
    );
  });


}
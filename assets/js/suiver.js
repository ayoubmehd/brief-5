//  Add suiver Page
const group = document.querySelector("#group");
const ensegniant = document.querySelector("#ensegniant");
const salle = document.querySelector("#salle");
const jour = document.querySelector("#jour");
const de = document.querySelector("#de");
const a = document.querySelector("#a");
if (jour) jour.addEventListener("change", getSalls);
if (de) de.addEventListener("change", getSalls);
if (a) a.addEventListener("change", getSalls);

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

const jours = [];

jours[1] = {
  id: 1,
  label: "Monday"
};
jours[2] = {
  id: 2,
  label: "Tuesday"
};
jours[3] = {
  id: 3,
  label: "Wednesday"
};
jours[4] = {
  id: 4,
  label: "Thursday"
};
jours[5] = {
  id: 5,
  label: "Friday"
};

async function main() {
  const group_all = await fetchElm("group_all");
  let ensegniant_all;
  if (isAdmin && ensegniant_all)
    ensegniant_all = await fetchElm("ensegniant_all");

  group_all.data.forEach((element) => {
    const option = document.createElement("option");

    option.value = element.id;
    option.textContent = element.libelle;

    group.appendChild(option);
  });
  if (isAdmin && ensegniant_all)
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
  if (a.value == -1) return;

  const salle_data = await fetchElm(
    `salle_aviable/?jour=${jour.value}&de=${encodeURIComponent(de.value)}&a=${encodeURIComponent(a.value)}`
  );
  clearSelect(salle, "salle");
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
const isAdmin = filds.indexOf("Ensegniant_id") !== -1;
Array.from(editButtons).forEach((elm) => {
  elm.addEventListener("click", clickEditButton);
});
if ("editForm" in window)
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

  if (isAdmin) {
    // Ensegniant
    const ensegniant = trArray[1];
    displayEnsegniant(ensegniant);
  }

  // Groupe
  const groupe = trArray[isAdmin ? 2 : 1];
  displayGroup(groupe);

  // jour
  const jour = trArray[isAdmin ? 4 : 3];
  displayJour(jour);
  // de
  const de = trArray[isAdmin ? 5 : 4];
  displayDe(de);
  // a
  const a = trArray[isAdmin ? 6 : 5];
  displayA(a);

  // Salle
  const salle = trArray[isAdmin ? 3 : 2];
  displaySalle(salle, jour, de);

  // Buttons
  const actions = trArray[isAdmin ? 7 : 6];
  editForm.setAttribute("action", event.target.href);
  displayFormButtons(actions);
}

function displayEnsegniant(htmlElm) {
  if (!isAdmin) return;
  display(htmlElm, "ensegniant_all", "nom", "Ensegniant", "Ensegniant_id");
}

function displayGroup(htmlElm) {
  display(htmlElm, "group_all", "libelle", "Groupe", "Groupe_id");
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
  const select = createSelect(jours, "label", "Jour", htmlElm.dataset.id);
  select.name = "jour";
  htmlElm.innerHTML = "";
  htmlElm.appendChild(select);
}

function displayDe(htmlElm) {
  const select = createSelect(times, "id", "De", htmlElm.dataset.time);
  select.name = "de";
  htmlElm.innerHTML = "";
  htmlElm.appendChild(select);
}

function displayA(htmlElm) {
  const select = createSelect(times, "id", "A", htmlElm.dataset.time);
  select.name = "a";
  htmlElm.innerHTML = "";
  htmlElm.appendChild(select);
}

function displayFormButtons(htmlElm) {
  const submitButton = createButton("editForm", "edit", "btn btn-success edit-button", "Save");
  const cancelButton = createButton("editForm", "", "btn btn-danger", "Cancel", "reset");
  htmlElm.innerHTML = "";
  htmlElm.appendChild(submitButton);
  htmlElm.appendChild(document.createTextNode(" "));
  htmlElm.appendChild(cancelButton);
}

async function display(htmlElm, endpoit, prop, placeholder, name) {
  const data = await fetchElm(endpoit);
  const select = createSelect(data.data, prop, placeholder, htmlElm.dataset.id);
  select.name = name;
  htmlElm.innerHTML = "";
  htmlElm.appendChild(select);
  return select;
}

function createSelect(data, prop, placeholder, value, form = "editForm") {
  const select = document.createElement("select");
  select.setAttribute("form", form);
  select.className = "form-control";
  clearSelect(select, placeholder);

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


function displaySuiverAll(data, htmlElm) {
  htmlElm.innerHTML = "";
  data.forEach(elm => {
    console.log(getDay(elm.jour));
    htmlElm.appendChild(
      createTr(
        createTd(elm.id),
        isAdmin ? createTd(elm.ensegniant_nom, [{ name: "data-id", value: elm.ensegniant_id }]) : document.createTextNode(""),
        createTd(elm.groupe_libelle, [{ name: "data-id", value: elm.groupe_id }]),
        createTd(elm.salle_libelle, [{ name: "data-id", value: elm.salle_id }]),
        createTd(getDay(elm.jour).label, [{ name: "data-id", value: elm.jour }]),
        createTd(formatTime(elm.de), [{ name: "data-time", value: elm.de }]),
        createTd(formatTime(elm.a), [{ name: "data-time", value: elm.a }]),
        createTd("", [],
          createA("Edit", `/api/edit_suiver/${elm.id}`, "btn btn-success edit-button", clickEditButton),
          document.createTextNode(" "),
          createA("Remove", `/api/delete_suiver/${elm.id}`, "btn btn-danger"),
        ),
      )
    );
  });


}

function getDay(dayId) {
  return jours[dayId]
}


function formatTime(timeString = "") {
  const date = new Date();

  const timeArray = timeString.split(":").map(elm => parseInt(elm));

  date.setHours(...timeArray);

  return date.toLocaleTimeString("fr", { hour: '2-digit', minute: '2-digit' });
}
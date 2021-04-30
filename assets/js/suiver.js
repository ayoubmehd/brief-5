const group = document.querySelector("#group");
const ensegniant = document.querySelector("#ensegniant");
const salle = document.querySelector("#salle");
const jour = document.querySelector("#jour");
const de = document.querySelector("#de");

jour.addEventListener("change", getSalls);
de.addEventListener("change", getSalls);

async function main() {
  const group_all = await fetchElm("group_all");
  const ensegniant_all = await fetchElm("ensegniant_all");

  group_all.data.forEach((element) => {
    const option = document.createElement("option");

    option.value = element.id;
    option.textContent = element.effecrif;

    group.appendChild(option);
  });
  ensegniant_all.data.forEach((element) => {
    const option = document.createElement("option");

    option.value = element.id;
    option.textContent = element.nom;

    ensegniant.appendChild(option);
  });
}

main();

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

const buttons = document.querySelectorAll('[data-target="#choix"]');
const choixModel = document.querySelector("#choix");

Array.from(buttons).forEach((button) => {
  button.addEventListener("click", values);
});
/**
 *
 * @param {event} event
 */
async function values(event) {
  const button = event.target.closest("button");
  choixModel.querySelector(
    ".modal-title"
  ).textContent = `Choise a ${button.textContent}`;
  const modelForm = document.querySelector("#modelForm");
  console.log(modelForm);
  modelForm.innerHTML = "";
  const data = await fetchElm(`${button.textContent.toLowerCase()}_all`);
  display(data.data, button.textContent.toLowerCase(), modelForm);
}

function display(data = [], type, modelForm) {
  modelForm.innerHTML = data.reduce(
    (acc, val, index) => `${acc}${input(type, val, index)}`,
    ""
  );
}

function input(type, val, index) {
  let filds = [];

  if (type === "group") {
    filds = ["effecrif"];
  } else if (type === "matiere") {
    filds = ["Matiere_label"];
  } else {
    filds = ["libelle"];
  }
  return `
    <div class="input-group w-100 mb-3">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <input id="${type}_${index}" name="${type}"
          value="
          ${
            val.id
          }" onchange="choiseFrom(event, '${type}')" type="radio" aria-label="Checkbox for following text input">
        </div>
      </div>
      <label class="input-group-text" for="${type}_${index}">${
    val[filds[0]]
  }</label>
    </div>
  `;
}

function choiseFrom(event, type) {
  $("#choix").modal("hide");
  document.querySelector(`#${type}_id`).value = parseInt(event.target.value);
  console.log(parseInt(event.target.value));
}

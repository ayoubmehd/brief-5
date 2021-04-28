const editButtons = document.querySelectorAll(".edit-button");
const editForm = document.querySelector("#editForm");
const addForm = document.querySelector("#addForm");
const tbody = document.querySelector(".tbody");

Array.from(editButtons).forEach((elm) => {
  elm.addEventListener("click", editButtonsClick);
});

editForm.addEventListener("reset", resetEditForm);

// When edit clicked
function editButtonsClick(event) {
  event.preventDefault();
  const tr = Array.from(event.target.parentNode.parentElement.children);
  tr.shift();
  const lastTr = tr.pop();
  editForm.setAttribute("action", lastTr.children[0].href);
  lastTr.innerHTML = `
    <button form="editForm" name="edit" class="btn btn-success edit-button">
        Save
    </button>
    <button form="editForm" type="reset" class="btn btn-danger">
        Cancel
    </button>
  `;
  tr.forEach((elm, index) => {
    const input = document.createElement("input");
    input.type = "text";
    input.value = elm.textContent;
    input.setAttribute("form", "editForm");
    input.name = addForm[index].name;
    elm.innerHTML = "";
    elm.appendChild(input);
  });
  //   console.log();
}

// Reset edit form
function resetEditForm(event) {
  event.preventDefault();
  showGroup(tbody);
}

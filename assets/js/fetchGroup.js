async function fetchGroup() {
  const result = await fetch("/api/group_all");
  const resultJson = await result.json();

  return resultJson;
}

async function showGroup(parentElm) {
  const result = await fetchGroup();
  parentElm.innerHTML = "";
  result.data.forEach((group) => {
    parentElm.innerHTML += `
          <tr>
          <td scope="row">${group.id}</td>
          <td>${group.effecrif}</td>
          <td>
          <a href="/api/edit_group/${group.id}" onclick="editButtonsClick(event)" type="button" class="btn btn-success edit-button">
              Edit
          </a>
          <a href="/api/delete_group/${group.id}" type="button" class="btn btn-danger">
              Remove
          </a>
          </td>
          </tr>
      `;
  });
}

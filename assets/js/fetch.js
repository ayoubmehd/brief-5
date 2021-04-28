async function fetchElm(endpoint) {
  const result = await fetch(`/api/${endpoint}`);
  const resultJson = await result.json();

  return resultJson;
}

async function show(parentElm, endpoint, filds) {
  const result = await fetchElm(endpoint);
  parentElm.innerHTML = "";
  result.data.forEach((elm) => {
    parentElm.innerHTML += `
          <tr>
          <td scope="row">${elm.id}</td>
            ${filds.reduce((acc, fild) => `${acc}<td>${elm[fild]}</td>`, "")}
          <td>
          <a href="/api/edit_group/${
            elm.id
          }" onclick="editButtonsClick(event)" type="button" class="btn btn-success edit-button">
              Edit
          </a>
          <a href="/api/delete_group/${
            elm.id
          }" type="button" class="btn btn-danger">
              Remove
          </a>
          </td>
          </tr>
      `;
  });
}

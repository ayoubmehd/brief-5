async function fetchElm(endpoint) {
  const result = await fetch(`/api/${endpoint}`);
  const resultJson = await result.json();

  return resultJson;
}

async function show(parentElm, endpoint, filds) {
  const result = await fetchElm(endpoint);
  parentElm.innerHTML = "";
  result.data.forEach((elm) => {
    parentElm.appendChild(createTr(
      createTd(elm.id, [{ name: "scope", value: "row" }]),
      ...filds.map(fild => createTd(elm[fild])),
      createTd("", [],
        createA("Edit", `/api/edit_group/${elm.id}`, "btn btn-success edit-button", editButtonsClick),
        document.createTextNode(" "),
        createA("Remove", `/api/delete_group/${elm.id}`, "btn btn-danger")
      ),
    ));
  });
}
